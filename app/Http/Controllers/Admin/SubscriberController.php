<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subscriber;
use Illuminate\Http\Request;
use DB;
class SubscriberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $subscribers = Subscriber::all();
        return view('admin.others.subscriber',compact('subscribers'));
    }


    public function SubscriberDestroy ($id){
        DB::table('subscribers')->where('id',$id)->delete();
        $notification=array(
            'messege'=>'Subscriber Deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
//        Subscriber::all()
//        $subscriber->delete();
//
//        $notification=array(
//            'messege'=>'Subscriber Deleted Successfully',
//            'alert-type'=>'success'
//        );
//
//        return Redirect()->back()->with($notification);
    }

}
