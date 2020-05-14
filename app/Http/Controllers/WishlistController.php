<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Whishlist;
use DB;
use Auth;

class WishlistController extends Controller
{

    public function addWishlist($id){

        $userid = Auth::id();
        $check = DB::table('wishlists')->where('user_id',$userid)->where('product_id',$id)->first();

        $data = array(
            'user_id' => $userid,
            'product_id' => $id,

        );

        if(Auth::Check()){

            if ($check){
                return \Response::json(['error' => 'This Product has already added!']);;
            }else{
                DB::table('wishlists')->insert($data);
                return \Response::json(['success' => 'Product added to wishlish']);
            }

        }else{
            return \Response::json(['error' => 'You need to login first!']);
        }

    }

}
