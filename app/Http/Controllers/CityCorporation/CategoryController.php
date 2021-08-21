<?php

namespace App\Http\Controllers\CityCorporation;

use App\User;
use App\Category;
use App\CityCase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('city_corporation.category.index', compact(['categories']));
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function active()
    {
        $categories = Category::whereStatus('active')->get();
        return view('city_corporation.category.active', compact(['categories']));
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inactive()
    {
        $categories = Category::whereStatus('inactive')->get();
        return view('city_corporation.category.inactive', compact(['categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('city_corporation.category.create');
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
            'name'     => 'required | string'
        ));
        
        $category = new Category();
        $category->name = $request->name;

        $category->save();

        if ($category->save()) {
            toast('New Category Created.', 'success')->timerProgressBar();
            return redirect()->back();
        } else {
            toast('Category Not Created.', 'error')->autoClose(false)->timerProgressBar();
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
        $category = Category::whereId($id)->firstOrFail();
                            
        $cases = CityCase::whereCategoryId($category->id)->get();
        
        return view('city_corporation.category.show', compact(['category', 'cases']));
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
