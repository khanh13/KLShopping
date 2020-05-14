<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Blogcategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blogs\CreateBlogRequest;
use Illuminate\Http\Request;
use Image;
use DB;

class BlogController extends Controller
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
        $blogs = Blog::all();
        $blogcategories =Blogcategory::all();
        return view('admin.blog.index', compact('blogs', 'blogcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blogcategories = Blogcategory::all();
        return view('admin.blog.create', compact('blogcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Blog $blog)
    {
        $data=([
            'category_id' => $request->category_id,
            'title_en' => $request->title_en,
            'title_vi' => $request->title_vi,
            'image' => $request->image,
            'details_en' => $request->details_en,
            'details_vi' => $request->details_vi,
        ]);

        $image = $request->file('image');
        if ($image) {

            $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $path = 'public/images/blog/'.$image_name;
            Image::make($image)->save($path);
            $data['image'] = $path;
            Blog::create($data);

            $notification=array(
                'messege'=>'Blog Added Successfully',
                'alert-type'=>'success'
            );
            return redirect(route('blogs.index'))->with($notification);
        }else{
            $data['image'] = '';
            Blog::create($data);

            $notification=array(
                'messege'=>'Blog Added without image Successfully',
                'alert-type'=>'success'
            );
            return redirect(route('blogs.index'))->with($notification);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $blogcategories = Blogcategory::all();
        return view('admin.blog.edit', compact('blogcategories', 'blog'));
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

    }

    public function UpdateBlog(Request $request,$id){

        $oldimage = $request->old_image;

        $data = array();
        $data['category_id'] = $request->category_id;
        $data['title_en'] = $request->title_en;
        $data['title_vi'] = $request->title_vi;
        $data['details_en'] = $request->details_en;
        $data['details_vi'] = $request->details_vi;

        $blog_image = $request->file('image');

        if ($blog_image) {
            unlink($oldimage);
            $image_name = hexdec(uniqid()).'.'.$blog_image->getClientOriginalExtension();
            $path = 'public/images/blog/'.$image_name;
            Image::make($blog_image)->resize(400,200)->save($path);
            $data['image'] = $path;

            DB::table('blogs')->where('id',$id)->update($data);
            $notification=array(
                'messege'=>'Blog Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('blogs.index')->with($notification);

        }else{
            $data['image']= $oldimage;
            DB::table('blogs')->where('id',$id)->update($data);
            $notification=array(
                'messege'=>'Blog Updated Without Image',
                'alert-type'=>'success'
            );
            return Redirect()->route('blogs.index')->with($notification);

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
        //
    }

    public function DeleteBlog($id){
        $product = DB::table('blogs')->where('id',$id)->first();

        $image = $product->image;
        unlink($image);


        DB::table('blogs')->where('id', $id)->delete();

        $notification=array(
            'messege'=>'Blog Deleted Successfully ',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
