<?php

namespace App\Http\Controllers\SupportStaff;

use Exception;
use App\CityCase;
use App\Mail\CaseReportMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class CaseController extends Controller
{
    public function index()
    {
        $cases = CityCase::whereCategoryId(auth()->user()->category_id)
                        ->whereSupportStaffId(auth()->user()->id)
                        ->orderBy('started_at', 'DESC')
                        ->get();

        return view('support_staff.case.index', compact(['cases']));
    }
    
    
    public function new_assigned()
    {
        $cases = CityCase::whereCategoryId(auth()->user()->category_id)
                        ->whereSupportStaffId(auth()->user()->id)
                        ->whereStatus('running')
                        ->orderBy('started_at', 'DESC')
                        ->get();

        return view('support_staff.case.running', compact(['cases']));
    }
    
    
    public function completed()
    {
        $cases = CityCase::whereCategoryId(auth()->user()->category_id)
                        ->whereSupportStaffId(auth()->user()->id)
                        ->whereStatus('completed')
                        ->orderBy('ended_at', 'DESC')
                        ->get();
                        
        return view('support_staff.case.completed', compact(['cases']));
    }
    
    
    public function canceled()
    {
        $cases = CityCase::whereCategoryId(auth()->user()->category_id)
                        ->whereSupportStaffId(auth()->user()->id)
                        ->whereStatus('canceled')
                        ->orderBy('ended_at', 'DESC')
                        ->get();

        return view('support_staff.case.canceled', compact(['cases']));
    }
    
    
    public function show($id)
    {
        $case = CityCase::with(['category', 'citizen'])
                        ->whereId($id)
                        ->whereCategoryId(auth()->user()->category_id)
                        ->whereSupportStaffId(auth()->user()->id)
                        ->firstOrFail();

        return view('support_staff.case.show', compact(['case']));
    }


    public function cancelCase(Request $request, $case_id)
    {
        $this->validate($request, array(
            'cancelation_reason'     => 'required | string',
        ));

        $data = CityCase::whereId($case_id)
                        ->whereCategoryId(auth()->user()->category_id)
                        ->whereSupportStaffId(auth()->user()->id)
                        ->firstOrFail();

        if ($data->category_id == auth()->user()->category_id && $data->support_staff_id == auth()->user()->id) {
            $data->status = 'canceled';
            $data->cancelation_reason = $request->cancelation_reason;
            $data->ended_at = now();

            $data->save();

            if ($data->save()) {
                try {
                    Mail::send(new CaseReportMail($data));
                } catch (Exception $e) {
                    toast('Failed to sending mail. Please try again.', 'warning')->autoClose(false);
                    return redirect()->back();
                }
                toast('Case Has Been Canceled Successfully.', 'success')->timerProgressBar();
            } else {
                toast('Case Has Not Canceled.', 'error')->autoClose(false)->timerProgressBar();
                return redirect()->back()->withInput();
            }
        } else {
            toast('You are not authorise to cancel this case.', 'error')->autoClose(false);
            return redirect()->back();
        }
        return redirect()->back();
    }


    public function completeCase(Request $request, $case_id)
    {
        $this->validate($request, array(
            'completion_report'     => 'required | string',
        ));

        $data = CityCase::whereId($case_id)
                        ->whereCategoryId(auth()->user()->category_id)
                        ->whereSupportStaffId(auth()->user()->id)
                        ->firstOrFail();

        if ($data->category_id == auth()->user()->category_id && $data->support_staff_id == auth()->user()->id) {
            $data->status = 'completed';
            $data->completion_report = $request->completion_report;
            $data->ended_at = now();

            $data->save();

            if ($data->save()) {
                try {
                    Mail::send(new CaseReportMail($data));
                } catch (Exception $e) {
                    toast('Failed to sending mail. Please try again.', 'warning')->autoClose(false);
                    return redirect()->back();
                }
                toast('Case Has Been Marked as Completed.', 'success')->timerProgressBar();
            } else {
                toast('Case Has Not Marked as Completed! Please Try Again.', 'error')->autoClose(false)->timerProgressBar();
                return redirect()->back()->withInput();
            }
        } else {
            toast('You are not authorise to update this case.', 'error')->autoClose(false);
            return redirect()->back();
        }
        return redirect()->back();
    }
}
