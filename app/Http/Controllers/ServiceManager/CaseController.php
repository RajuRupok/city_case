<?php

namespace App\Http\Controllers\ServiceManager;

use App\CityCase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class CaseController extends Controller
{
    public function index()
    {
        $cases = CityCase::with(['category'])
                        ->whereCategoryId(auth()->user()->category_id)
                        ->get();

        return view('service_manager.case.index', compact(['cases']));
    }
    
    
    public function pending()
    {
        $cases = CityCase::with(['category'])->whereCategoryId(auth()->user()->category_id)->whereStatus('pending')->get();
        return view('service_manager.case.pending', compact(['cases']));
    }
    
    
    public function running()
    {
        $cases = CityCase::with(['category'])->whereCategoryId(auth()->user()->category_id)->whereStatus('running')->get();
        return view('service_manager.case.running', compact(['cases']));
    }
    
    
    public function completed()
    {
        $cases = CityCase::with(['category'])->whereCategoryId(auth()->user()->category_id)->whereStatus('completed')->get();
        return view('service_manager.case.completed', compact(['cases']));
    }
    
    
    public function canceled()
    {
        $cases = CityCase::with(['category'])->whereCategoryId(auth()->user()->category_id)->whereStatus('canceled')->get();
        return view('service_manager.case.canceled', compact(['cases']));
    }
    
    
    public function show($id)
    {
        $case = CityCase::with(['category', 'support_staff', 'citizen'])
                        ->whereId($id)
                        ->whereCategoryId(auth()->user()->category_id)
                        ->firstOrFail();

        $support_staffs = User::whereRole('support_staff')
                        ->whereCategoryId($case->category->id)
                        ->whereStatus('active')
                        ->get();

        return view('service_manager.case.show', compact(['case', 'support_staffs']));
    }


    public function assignSupportStaff(Request $request, $case_id)
    {
        $this->validate($request, array(
            'support_staff_id'     => 'required | integer'
        ));

        $data = CityCase::whereId($case_id)
                        ->whereCategoryId(auth()->user()->category_id)
                        ->firstOrFail();

        if ($data->category_id == auth()->user()->category_id) {
            $data->support_staff_id = $request->support_staff_id;
            $data->started_at = now();
            $data->status = 'running';

            $data->save();

            if ($data->save()) {
                toast('Support Staff Assigned Successfully.', 'success')->timerProgressBar();
                return redirect()->back();
            } else {
                toast('Support Staff Not Assigned.', 'error')->autoClose(false)->timerProgressBar();
                return redirect()->back()->withInput();
            }
        } else {
            toast('You are not authorise to assign supporter on this case.', 'error')->autoClose(false);
            return redirect()->back();
        }
        
    }


    public function cancelCase($case_id)
    {
        $data = CityCase::whereId($case_id)
                        ->whereCategoryId(auth()->user()->category_id)
                        ->firstOrFail();

        if ($data->category_id == auth()->user()->category_id) {
            $data->status = 'canceled';
            $data->ended_at = now();

            $data->save();

            if ($data->save()) {
                toast('Case Has Been Canceled Successfully.', 'success')->timerProgressBar();
                return redirect()->back();
            } else {
                toast('Case Has Not Canceled.', 'error')->autoClose(false)->timerProgressBar();
                return redirect()->back()->withInput();
            }
        } else {
            toast('You are not authorise to cancel this case.', 'error')->autoClose(false);
            return redirect()->back();
        }
    }
}
