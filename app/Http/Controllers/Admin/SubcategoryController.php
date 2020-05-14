<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::all();
        $categories = Category::all();
        return view('admin.category.index-subcategory', compact('subcategories','categories'));
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
        $this->validate($request, [
            'subcategory_name' => 'required|unique:subcategories|max:200',
            'category_id' => 'required'
        ]);

        Subcategory::create([
            'subcategory_name' => $request->subcategory_name,
            'category_id' => $request->category_id
        ]);

        $notification=array(
            'messege'=>'Sub Category Added Successfully',
            'alert-type'=>'success'
        );

        return redirect(route('subcategories.index'))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();
        return view('admin.category.edit-subCategory', compact('subcategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
//        dd($request->category_id);
        $this->validate($request, [
            'subcategory_name' => 'required|max:200',
            'category_id' => 'required'
        ]);
//        $data = array();
//        $data['category_id'] = $request->category_id;
//        $data['name'] = $request->name;
//        Subcategory::find($id)->update($data);

        $subcategory->update([
            'subcategory_name' => $request->subcategory_name,
            'category_id' => $request->category_id
        ]);
        $notification=array(
            'messege'=>'Sub Category Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect(route('subcategories.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();

        $notification=array(
            'messege'=>'Sub-Category Deleted Successfully',
            'alert-type'=>'success'
        );

        return redirect(route('subcategories.index'))->with($notification);
    }
}
