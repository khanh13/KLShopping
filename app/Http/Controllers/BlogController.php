<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class BlogController extends Controller
{
    public function blog(){
        $blog = DB::table('blogs')
            ->join('blogcategories','blogs.category_id','blogcategories.id')
            ->select('blogs.*','blogcategories.category_name_en','blogcategories.category_name_vi')
            ->get();
        //return response()->json($blog);
        return view('pages.blog',compact('blog'));
    }


    public function English(){
        Session::get('lang');
        Session()->forget('lang');
        Session::put('lang','english');
        return redirect()->back();

    }

    public function Vietnam(){
        Session::get('lang');
        Session()->forget('lang');
        Session::put('lang','vietnam');
        return redirect()->back();

    }

    public function BlogSingle($id){
        $blogs = DB::table('blogs')->where('id',$id)->get();
        return view('pages.blog_single',compact('blogs'));

    }
}
