<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Products\CreateProductRequest;
use App\Product;
use App\Subcategory;
use Illuminate\Http\Request;
use DB;
use Image;

class ProductController extends Controller
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
        $brands = Brand::all();
        $products = Product::all();

        return view('admin.product.index', compact('categories','brands', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create', compact('categories','brands'));
    }

    public function GetSubcat($category_id){
//        $categories = Subcategory::find($category_id)->get();;
        $cat = DB::table('subcategories')->where('category_id',$category_id)->get();
        return json_encode($cat);

    }
//    public function GetSubcat($category_id){
//        $cat = DB::table('subcategories')->where('category_id',$category_id)->get();
//        return json_encode($cat);
//
//    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {

//        $this->validate($request, [
//            'product_name' => 'required|unique:products|max:200'
//        ]);
//        $data = $request->only(['category_id', 'subcategory_id', 'brand_id', 'name', 'code', 'quantity', 'description', 'detail', 'price']);
//        dd($request->price);
        $data = ([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'brand_id' => $request->brand_id,
            'product_name' => $request->product_name,
            'code' => $request->code,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'detail' => $request->detail,
            'price' => $request->price,
            'discount' => $request->discount,
            'main_slider' => $request->main_slider,
            'video_link' => $request->video_link,
            'now_trending' => $request->now_trending,
            'new_releases' => $request->new_releases,
            'mid_slider' => $request->mid_slider,
            'coming_soon' => $request->coming_soon,
            'best_rated' => $request->best_rated,
            'hot_deal' => $request->hot_deal,
            'color' => $request->color,
            'size' => $request->size,
            'status' => 1,
        ]);

        $image_one = $request->image_one;
        $image_two = $request->image_two;
        $image_three = $request->image_three;
        $image_four = $request->image_four;

        if ($image_one && $image_two && $image_three && $image_four) {

            $image_one_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            $path1 = 'public/images/product/'.$image_one_name;
            Image::make($image_one)->save($path1);
            $data['image_one'] = $path1;

            $image_two_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            $path2 = 'public/images/product/'.$image_two_name;
            Image::make($image_two)->save($path2);
            $data['image_two'] = $path2;


            $image_three_name = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
            $path3 = 'public/images/product/'.$image_three_name;
            Image::make($image_three)->save($path3);
            $data['image_three'] = $path3;

            $image_four_name = hexdec(uniqid()).'.'.$image_four->getClientOriginalExtension();
            $path4 = 'public/images/product/'.$image_four_name;
            Image::make($image_four)->save($path4);
            $data['image_four'] = $path4;

            Product::create($data);

            $notification=array(
                'messege'=>'Product Added Successfully',
                'alert-type'=>'success'
            );
            return redirect(route('products.index'))->with($notification);
        }

//        return response()->json($data);
//        dd($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, Category $category, Brand $brand, Subcategory $subcategory)
    {

        return view('admin.product.show', compact('category', 'product', 'subcategory', 'brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        return view('admin.product.edit',compact('categories', 'subcategories', 'product', 'brands'));
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

    public function UpdateProductNoPhoto(Request $request,$id){
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_name'] = $request->product_name;
        $data['code'] = $request->code;
        $data['quantity'] = $request->quantity;
        $data['description'] = $request->description;
        $data['detail'] = $request->detail;
        $data['price'] = $request->price;
        $data['discount'] = $request->discount;
        $data['video_link'] = $request->video_link;
        $data['main_slider'] = $request->main_slider;
        $data['now_trending'] = $request->now_trending;
        $data['new_releases'] = $request->new_releases;
        $data['best_rated'] = $request->best_rated;
        $data['mid_slider'] = $request->mid_slider;
        $data['coming_soon'] = $request->coming_soon;
        $data['hot_deal'] = $request->hot_deal;
        $data['color'] = $request->color;
        $data['size'] = $request->size;

        $update = DB::table('products')->where('id',$id)->update($data);
        if ($update) {
            $notification=array(
                'messege'=>'Product Successfully Updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('products.index')->with($notification);
        }else{
            $notification=array(
                'messege'=>'Nothing TO Update',
                'alert-type'=>'success'
            );
            return Redirect()->route('products.index')->with($notification);

        }

    }

    public function UpdateProductPhoto(Request $request, $id){

        $old_one = $request->old_one;
        $old_two = $request->old_two;
        $old_three = $request->old_three;
        $old_four = $request->old_four;

        $data = array();

        $image_one = $request->file('image_one');
        $image_two = $request->file('image_two');
        $image_three = $request->file('image_three');
        $image_four = $request->file('image_four');

        if ($image_one) {
            unlink($old_one);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image_one->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/images/product/';
            $image_url = $upload_path.$image_full_name;
            $success = $image_one->move($upload_path,$image_full_name);

            $data['image_one'] = $image_url;
            $productimg = DB::table('products')->where('id',$id)->update($data);
            $notification=array(
                'messege'=>'Image One Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('products.index')->with($notification);
        }
        if ($image_two) {
            unlink($old_two);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image_two->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/images/product/';
            $image_url = $upload_path.$image_full_name;
            $success = $image_two->move($upload_path,$image_full_name);

            $data['image_two'] = $image_url;
            $productimg = DB::table('products')->where('id',$id)->update($data);
            $notification=array(
                'messege'=>'Image Two Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('products.index')->with($notification);

        }
        if ($image_three) {
            unlink($old_three);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image_three->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/images/product/';
            $image_url = $upload_path.$image_full_name;
            $success = $image_three->move($upload_path,$image_full_name);

            $data['image_three'] = $image_url;
            $productimg = DB::table('products')->where('id',$id)->update($data);
            $notification=array(
                'messege'=>'Image Three Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('products.index')->with($notification);
        }

        if ($image_four) {
            unlink($old_four);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image_four->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/images/product/';
            $image_url = $upload_path.$image_full_name;
            $success = $image_three->move($upload_path,$image_full_name);

            $data['image_four'] = $image_url;
            $productimg = DB::table('products')->where('id',$id)->update($data);
            $notification=array(
                'messege'=>'Image Four Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('products.index')->with($notification);
        }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function DeleteProduct($id){
        $product = DB::table('products')->where('id',$id)->first();

        $img1 = $product->image_one;
        $img2 = $product->image_two;
        $img3 = $product->image_three;
        $img4 = $product->image_four;

        unlink($img1);
        unlink($img2);
        unlink($img3);
        unlink($img4);

        DB::table('products')->where('id',$id)->delete();

        $notification=array(
            'messege'=>'Product Successfully Deleted',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function deactivated ($id){
        DB::table('products')->where('id',$id)->update(['status'=>0]);
        $notification=array(
            'messege'=>'Product deactivated Successfully!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }


    public function activated($id){
        DB::table('products')->where('id',$id)->update(['status'=>1]);
        $notification=array(
            'messege'=>'Product Activated Successfully!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
