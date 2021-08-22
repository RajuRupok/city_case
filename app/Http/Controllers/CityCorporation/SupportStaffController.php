<?php

namespace App\Http\Controllers\CityCorporation;

use App\User;
use App\Category;
use App\CityCase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class SupportStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $support_staffs = User::with(['category'])->whereRole('support_staff')->get();
        return view('city_corporation.support_staff.index', compact(['support_staffs']));
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function active()
    {
        $support_staffs = User::with(['category'])->whereRole('support_staff')->whereStatus('active')->get();
        return view('city_corporation.support_staff.active', compact(['support_staffs']));
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inactive()
    {
        $support_staffs = User::with(['category'])->whereRole('support_staff')->whereStatus('inactive')->get();
        return view('city_corporation.support_staff.inactive', compact(['support_staffs']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereStatus('active')->get();
        return view('city_corporation.support_staff.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name'     => 'required | string',
            'email'    => 'required | email',
            'mobile'   => 'required | string',
            'nid'   => 'required | string',
            'address'   => 'required | string',
            'category_id'   => 'required | integer',
            'password' => 'required | string | min:8',
        ));
        
        $data = new User();
        $data->category_id = $request->category_id;
        $data->role = 'support_staff';
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->nid = $request->nid;
        $data->address = $request->address;
        $data->password = Hash::make($request->password);

        $data->save();

        if ($data->save()) {
            toast('New Support Staff Created.', 'success')->timerProgressBar();
            return redirect()->back();
        } else {
            toast('Support Staff Not Created.', 'error')->autoClose(false)->timerProgressBar();
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $support_staff = User::with(['category'])
                            ->whereRole('support_staff')
                            ->whereId($id)
                            ->firstOrFail();
                            
        $cases = CityCase::whereSupportStaffId($support_staff->id)->get();
        
        return view('city_corporation.support_staff.show', compact(['support_staff', 'cases']));
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
            $user->status = 'inactive';
            $user->save();
            
            toast('Support Staff Has Been Deactivated.', 'success')->timerProgressBar();
            return redirect()->back();
        } elseif ($status === 'inactive') {
            $user->status = 'inactive';
            $user->save();
            
            toast('Support Staff Has Been Activated.', 'success')->timerProgressBar();
            return redirect()->back();
        } else {
            toast('Something Wrong! Please Try Again.', 'error')->autoClose(false);
            return redirect()->back();
        }
    }
}
