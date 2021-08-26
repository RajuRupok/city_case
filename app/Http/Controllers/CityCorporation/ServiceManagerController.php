<?php

namespace App\Http\Controllers\CityCorporation;

use App\Category;
use App\CityCase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ServiceManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service_managers = User::with(['category'])->whereRole('service_manager')->orderBy('created_at', 'DESC')->get();
        return view('city_corporation.service_manager.index', compact(['service_managers']));
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function active()
    {
        $service_managers = User::with(['category'])->whereRole('service_manager')->whereStatus('active')->orderBy('updated_at', 'DESC')->get();
        return view('city_corporation.service_manager.active', compact(['service_managers']));
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inactive()
    {
        $service_managers = User::with(['category'])->whereRole('service_manager')->whereStatus('inactive')->orderBy('updated_at', 'DESC')->get();
        return view('city_corporation.service_manager.inactive', compact(['service_managers']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereStatus('active')->get();
        return view('city_corporation.service_manager.create', compact(['categories']));
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
        $data->role = 'service_manager';
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
        $service_manager = User::with(['category'])
                            ->whereRole('service_manager')
                            ->whereId($id)
                            ->firstOrFail();

        $cases = CityCase::whereCategoryId($service_manager->category_id)->orderBy('updated_at', 'DESC')->get();

        return view('city_corporation.service_manager.show', compact(['service_manager', 'cases']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service_manager = User::with(['category'])
                            ->whereRole('service_manager')
                            ->whereId($id)
                            ->firstOrFail();

        $categories = Category::whereStatus('active')->get();

        return view('city_corporation.service_manager.edit', compact(['service_manager', 'categories']));
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
        $this->validate($request, array(
            'name'     => 'required | string',
            'email'    => 'required | email',
            'mobile'   => 'required | string',
            'nid'   => 'required | string',
            'address'   => 'required | string',
            'category_id'   => 'required | integer',
        ));
        
        $data = User::whereId($id)->firstOrFail();
        $data->category_id = $request->category_id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->nid = $request->nid;
        $data->address = $request->address;

        $data->save();

        if ($data->save()) {
            toast('Service Manager Information Updated.', 'success')->timerProgressBar();
            return redirect()->back();
        } else {
            toast('Service Manager Not Updated.', 'error')->autoClose(false)->timerProgressBar();
            return redirect()->back()->withInput();
        }
    }
    

    public function status($id, $status)
    {
        $user = User::whereId($id)->firstOrFail();

        if ($status === 'active') {
            $user->status = 'active';
            $user->save();
            
            toast('Service Manager Has Been Activated.', 'success')->timerProgressBar();
            return redirect()->back();
        } elseif ($status === 'inactive') {
            $user->status = 'inactive';
            $user->save();
            
            toast('Service Manager Has Been Inactivated.', 'success')->timerProgressBar();
            return redirect()->back();
        } else {
            toast('Something Wrong! Please Try Again.', 'error')->autoClose(false);
            return redirect()->back();
        }
    }
}
