<?php

namespace App\Http\Controllers\Citizen;

use App\Category;
use App\CityCase;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Review;

class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cases = CityCase::select('id', 'title')->whereCitizenId(auth()->user()->id)->orderBy('created_at', 'DESC')->get();
        return view('citizen.case.index', compact(['cases']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('citizen.case.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, array(
            'category'     => 'required | integer',
            'title'     => 'required | string',
            'details'     => 'required | string',
        ));

        $case =  new CityCase();

        $category_short_name = Category::select(['id', 'short_name'])->whereId($request->category)->firstOrFail();

        $case->ticket = 'CCM' . '-' . substr(date('Y'), -2) . '-' . $category_short_name->short_name . '-' . dechex(auth()->user()->id) . strtotime(now());

        $case->title = $request->title;
        $case->location = $request->location;
        $case->details = $request->details;
        $case->status = 'pending';
        $case->citizen_id = auth()->user()->id;
        $case->category_id = $request->category;

        $case->save();

        if ($case->save()) {
            toast('New Case Created Successfully.', 'success')->timerProgressBar();
            return redirect()->route('citizen.case.show', ['case_id' => decbin($case->id)]);
        } else {
            toast('Case Not Created.', 'error')->autoClose(false)->timerProgressBar();
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($case_id)
    {
        $case_id = bindec($case_id);

        $case = CityCase::with(['review'])->whereId($case_id)->firstOrFail();
        
        return view('citizen.case.show', compact(['case']));
    }

    
    public function review(Request $request, $case_id, $reviewer_id)
    {
        $this->validate($request, array(
            'rating'     => [
                'required',
                'string',
                Rule::in(['bad', 'average', 'good', 'best']),
            ],
            'review'     => 'required | string',
        ));
        $case = CityCase::whereId($case_id)->firstOrFail();

        if ($reviewer_id == $case->citizen_id) {
            $review = new Review();

            $review->reviewer_id = $reviewer_id;
            $review->case_id = $case_id;
            $review->rating = $request->rating;
            $review->review = $request->review;

            $review->save();

            if ($review->save()) {
                toast('Review Created Successfully.', 'success')->timerProgressBar();
                return redirect()->back();
            } else {
                toast('Review Not Created.', 'error')->autoClose(false)->timerProgressBar();
                return redirect()->back()->withInput();
            }
        } else {
            toast('You Can Not Review in This Case', 'warning')->autoClose(false)->timerProgressBar();
            return redirect()->back()->withInput();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
