<?php

namespace App\Http\Controllers\CityCorporation;

use App\User;
use App\CityCase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CitizenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citizens = User::whereRole('citizen')->get();
        return view('city_corporation.citizen.index', compact(['citizens']));
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function approved()
    {
        $citizens = User::whereRole('citizen')->whereStatus('active')->get();
        return view('city_corporation.citizen.approved', compact(['citizens']));
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function banned()
    {
        $citizens = User::whereRole('citizen')->whereStatus('banned')->get();
        return view('city_corporation.citizen.banned', compact(['citizens']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $citizen = User::whereRole('citizen')->whereId($id)->firstOrFail();
                            
        $cases = CityCase::whereCitizenId($citizen->id)->get();
        
        return view('city_corporation.citizen.show', compact(['citizen', 'cases']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    
    

    public function status($id, $status)
    {
        $user = User::whereId($id)->firstOrFail();

        if ($status === 'active') {
            $user->status = 'active';
            $user->save();
            
            toast('Citizen Has Been Activated.', 'success')->timerProgressBar();
            return redirect()->back();
        } elseif ($status === 'banned') {
            $user->status = 'banned';
            $user->save();
            
            toast('Citizen Has Been Banned.', 'success')->timerProgressBar();
            return redirect()->back();
        } else {
            toast('Something Wrong! Please Try Again.', 'error')->autoClose(false);
            return redirect()->back();
        }
    }
}
