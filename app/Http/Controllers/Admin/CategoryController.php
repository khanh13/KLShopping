<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
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
        $categories = Category::all();
        return view('admin.category.index-category', compact('categories'));
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
            'category_name' => 'required|unique:categories|max:200'
        ]);

        Category::create([
            'category_name' => $request->category_name
        ]);

        $notification=array(
            'messege'=>'Category Added Successfully',
            'alert-type'=>'success'
        );

        return redirect(route('categories.index'))->with($notification);
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
    public function edit(Category $category)
    {
        return view('admin.category.edit-category')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'category_name' => 'required|unique:categories|max:200'
        ]);

        $category->update([
            'category_name' => $request->category_name
        ]);

        $notification=array(
            'messege'=>'Category Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect(route('categories.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        $notification=array(
            'messege'=>'Category Deleted Successfully',
            'alert-type'=>'success'
        );

        return redirect(route('categories.index'))->with($notification);
        //        $category = Category::find($id);
//        $category ->delete();
//
//        $notification=array(
//            'messege'=>'Category Deleted Successfully',
//            'alert-type'=>'success'
//        );
//        return redirect(route('categories.index'))->with($notification);

//        $category = DB::table('categories')->where('id', $id)->delete();
//
//        $category ->delete();
//
//        $notification=array(
//            'messege'=>'Category Deleted Successfully',
//            'alert-type'=>'success'
//        );
//        return redirect(route('categories.index'))->with($notification);
    }
}
