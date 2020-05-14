<?php

namespace App\Http\Controllers\Admin;

use App\Blogcategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
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
        $blogcategories = Blogcategory::all();
        return view('admin.blog.category.index', compact('blogcategories'));
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
            'category_name_en' => 'required|max:200',
            'category_name_vi' => 'required|max:200'
        ]);

        Blogcategory::create([
            'category_name_en' => $request->category_name_en,
            'category_name_vi' => $request->category_name_vi
        ]);

        $notification=array(
            'messege'=>'Blog Category Added Successfully',
            'alert-type'=>'success'
        );

        return redirect(route('blogcategories.index'))->with($notification);
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
    public function edit(Blogcategory $blogcategory)
    {
        return view('admin.blog.category.edit')->with('blogcategory', $blogcategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blogcategory $blogcategory)
    {
        $this->validate($request, [
            'category_name_en' => 'required|max:200',
            'category_name_vi' => 'required|max:200'
        ]);

        $blogcategory->update([
            'category_name_en' => $request->category_name_en,
            'category_name_vi' => $request->category_name_vi
        ]);

        $notification=array(
            'messege'=>'Blog Category Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect(route('blogcategories.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blogcategory $blogcategory)
    {
        $blogcategory->delete();

        $notification=array(
            'messege'=>'Blog Category Deleted Successfully',
            'alert-type'=>'success'
        );

        return redirect(route('blogcategories.index'))->with($notification);
    }
}
