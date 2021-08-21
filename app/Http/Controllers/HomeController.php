<?php

namespace App\Http\Controllers;

use App\Category;
use App\CityCase;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function homepage()
    {
        $services = Category::whereStatus('active')->get();
        return view('homepage', compact(['services']));
    }


    public function about()
    {
        return view('about');
    }


    public function service()
    {
        $services = Category::whereStatus('active')->get();
        return view('service', compact(['services']));
    }


    public function contact()
    {
        return view('contact');
    }


    public function case()
    {
        $cases = CityCase::select(['id', 'title', 'status'])->whereStatus('completed')->get();
        return view('case', compact(['cases']));
    }


    public function caseDetails($case_id)
    {
        $case_id = bindec($case_id);

        $case = CityCase::with(['review'])->whereId($case_id)->firstOrFail();

        if ($case->status == 'completed') {
            return view('citizen.case.show', compact(['case']));
        } else {
            toast('There is something wrong. Please try again.', 'warning')->autoClose(false)->timerProgressBar();
            return redirect()->route('homepage');
        }
        
    }
}
