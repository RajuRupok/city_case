<?php

namespace App\Http\Controllers;

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
        return view('homepage');
    }


    public function about()
    {
        return view('about');
    }


    public function service()
    {
        return view('service');
    }


    public function contact()
    {
        return view('contact');
    }


    public function case()
    {
        return view('case');
    }
}
