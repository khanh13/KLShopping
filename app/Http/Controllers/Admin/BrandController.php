<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
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
        $brands = Brand::all();
        return view('admin.category.index-brand', compact('brands'));
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
//        Store image to Storage\brands folder in laravel, which is secure and localhost
//        we need to add FILESYSTEM_DRIVER=public to .env to be able to public(not local)
//        then php artisan storage:link to our public folder
//        $image = $request->image->store('brands');
//
        $this->validate($request, [
            'brand_name' => 'required|unique:brands|max:100',
            'image'=> 'required|image'
        ]);

        $image = $request->image->store('brands');
        Brand::create([
            'brand_name' => $request->brand_name,
            'image' => $image
        ]);

        $notification=array(
            'messege'=>'Brand Added Successfully',
            'alert-type'=>'success'
        );

        return redirect(route('brands.index'))->with($notification);

//        $brand = array();
//        $brand['name'] = $request->name;
//        $image = $request->file('image');
//        if ($image){
//            $image_name = date('dmy_H_s_i');
//            $ext = strtolower($image->getClientOriginalExtension());
//            $image_full_name = $image_name.'.'.$ext;
//            $upload_path = 'public/images/brand/';
//            $image_url = $upload_path.$image_full_name;
//            $image->move($upload_path,$image_full_name);
//
//            $brand['image'] = $image_url;
//            Brand::create($brand);
//            $notification=array(
//                'messege'=>'Brand Added Successfully',
//                'alert-type'=>'success'
//            );
//            return redirect(route('brands.index'))->with($notification);
//        }else{
//            Brand::create($brand);
//            $notification=array(
//                'messege'=>'Nothing!',
//                'alert-type'=>'success'
//            );
//            return redirect(route('brands.index'))->with($notification);
//        }

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
    public function edit(Brand $brand)
    {
        return view('admin.category.edit-brand')->with('brand', $brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $this->validate($request, [
            'brand_name' => 'required|max:100'
        ]);

        $data = $request->only(['brand_name']);

        if ($request->hasFile('image')){
            //upload it

            $image = $request->image->store('brands');
            Storage::delete($brand->image);
            $data['image'] = $image;
        }

        $brand->update($data);

        $notification=array(
            'messege'=>'Brand Updated Successfully',
            'alert-type'=>'success'
        );

        return redirect(route('brands.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        Storage::delete($brand->image);
        $brand->delete();

        $notification=array(
            'messege'=>'Brand Deleted Successfully',
            'alert-type'=>'success'
        );

        return redirect(route('brands.index'))->with($notification);
    }
}
