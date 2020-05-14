<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;
use DB;
class FrontendController extends Controller
{
    public function SubscriberStore(Request $request){
        $this->validate($request, [
            'email' => 'required|unique:subscribers|max:60',
        ]);
        Subscriber::create([
            'email' => $request->email
        ]);

        $notification=array(
            'messege'=>'Thank you for Subscribing us!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }

    public function OrderTraking(Request $request){
        $code = $request->code;

        $track = DB::table('orders')->where('status_code',$code)->first();
        if ($track) {

            // echo "<pre>";
            // print_r($track);
            return view('pages.tracking',compact('track'));

        }else{
            $notification=array(
                'messege'=>'Status Code Invalid',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function Search(Request $request){

        $item = $request->search;
        // echo "$item";

        $products = DB::table('products')
            ->where('product_name','LIKE',"%$item%")
            ->paginate(20);

        return view('pages.search',compact('products'));


    }
}
