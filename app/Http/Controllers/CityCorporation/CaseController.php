<?php

namespace App\Http\Controllers\CityCorporation;

use App\User;
use App\Category;
use App\CityCase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CaseController extends Controller
{
    public function index()
    {
        $cases = CityCase::with(['category'])->orderBy('id', 'DESC')->get();
        $categories = Category::all();
        return view('city_corporation.case.index', compact(['cases', 'categories']));
    }
    
    public function filter(Request $request)
    {
        $categories = Category::all();
        $start = (is_null($request->start_date)) ? null: $request->start_date.' 00:00:00';
        $end = (is_null($request->end_date)) ? null: $request->end_date.' 00:00:00';
        $category_id = $request->category_id;
        $status = $request->status;
        $cases = CityCase::with(['category'])
            ->when($category_id, function ($query, $category_id) {
                return $query->where('category_id', $category_id);
            })
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->when($start, function ($query, $start) {
                return $query->where('created_at', '>=', $start);
            })          
            ->when($end, function ($query, $end) {
                return $query->where('created_at', '<=', $end);
            })          
            ->orderBy('id', 'DESC')
            ->get();

        toast($cases->count().' Cases Found', 'success')->timerProgressBar();
        return view('city_corporation.case.filter', compact(['cases', 'categories', 'request']));
    }
    
    
    public function pending()
    {
        $cases = CityCase::with(['category'])->whereStatus('pending')->orderBy('id', 'DESC')->get();
        return view('city_corporation.case.pending', compact(['cases']));
    }
    
    
    public function running()
    {
        $cases = CityCase::with(['category'])->whereStatus('running')->orderBy('id', 'DESC')->get();
        return view('city_corporation.case.running', compact(['cases']));
    }
    
    
    public function completed()
    {
        $cases = CityCase::with(['category'])->whereStatus('completed')->orderBy('id', 'DESC')->get();
        return view('city_corporation.case.completed', compact(['cases']));
    }
    
    
    public function canceled()
    {
        $cases = CityCase::with(['category'])->whereStatus('canceled')->orderBy('id', 'DESC')->get();
        return view('city_corporation.case.canceled', compact(['cases']));
    }
    
    
    public function show($id)
    {
        $case = CityCase::with(['category', 'support_staff', 'citizen'])
                        ->whereId($id)
                        ->firstOrFail();

        $support_staffs = User::whereRole('support_staff')
                        ->whereCategoryId($case->category->id)
                        ->whereStatus('active')
                        ->get();

        return view('city_corporation.case.show', compact(['case', 'support_staffs']));
    }


    public function assignSupportStaff(Request $request, $case_id)
    {
        $this->validate($request, array(
            'support_staff_id'     => 'required | integer'
        ));
        // dd($request->all(), $case_id);

        $data = CityCase::whereId($case_id)->firstOrFail();

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
    }


    public function cancelCase($case_id)
    {
        $data = CityCase::whereId($case_id)->firstOrFail();

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
    }
}
