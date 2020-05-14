<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
class UserRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }



    public function UserRole(){
        $user = DB::table('admins')->where('type',2)->get();
        return view('admin.role.all_role',compact('user'));
    }


    public function UserCreate(){

        return view('admin.role.create_role');

    }



    public function UserStore(Request $request){

        $data = array();
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['category'] = $request->category;
        $data['coupon'] = $request->coupon;
        $data['product'] = $request->product;
        $data['blog'] = $request->blog;
        $data['orders'] = $request->order;
        $data['other'] = $request->other;
        $data['report'] = $request->report;
        $data['role'] = $request->role;
        $data['returns'] = $request->return;
        $data['contact'] = $request->contact;
        $data['comment'] = $request->comment;
        $data['setting'] = $request->setting;
        $data['stock'] = $request->stock;
        $data['type'] = 2;

        DB::table('admins')->insert($data);
        $notification=array(
            'messege'=>'Child Admin Inserted Successfully',
            'alert-type'=>'success'
        );
        return Redirect(route('admin.all.user'))->with($notification);

    }



    public function UserDelete(Admin $admin){
        $admin->delete();

        $notification=array(
            'messege'=>'Admin Deleted Successfully',
            'alert-type'=>'success'
        );

        return redirect(route('admin.all.user'))->with($notification);

//        DB::table('admins')->where('id',$id)->delete();
//        $notification=array(
//            'messege'=>'Child Admin Delete Successfully',
//            'alert-type'=>'success'
//        );
//        return Redirect()->back()->with($notification);
//
//    }
//
//    public function UserEdit($id){
//
//        $user = DB::table('admins')->where('id',$id)->first();
//        return view('admin.role.edit_role',compact('user'));

    }


    public function UserUpdate(Request $request, Admin $admin){

        $id = $request->id;

        $data = array();
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;

        $data['category'] = $request->category;
        $data['coupon'] = $request->coupon;
        $data['product'] = $request->product;
        $data['blog'] = $request->blog;
        $data['orders'] = $request->order;
        $data['other'] = $request->other;
        $data['report'] = $request->report;
        $data['role'] = $request->role;
        $data['returns'] = $request->return;
        $data['contact'] = $request->contact;
        $data['comment'] = $request->comment;
        $data['setting'] = $request->setting;
        $data['stock'] = $request->stock;

//        $admin->update([
//            'name' => $request->name,
//            'phone' => $request->phone,
//            'email' => $request->email,
//            'category' => $request->category,
//            'coupon' => $request->coupon,
//            'product' => $request->product,
//            'blog' => $request->blog,
//            'orders' => $request->order,
//            'other' => $request->other,
//            'report' => $request->report,
//            'role' => $request->role,
//            'returns' => $request->return,
//            'contact' => $request->contact,
//            'comment' => $request->comment,
//            'setting' => $request->setting,
//        ]);
//dd($admin);
        DB::table('admins')->where('id',$id)->update($data);
        $notification=array(
            'messege'=>'Child Admin Updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.all.user')->with($notification);

    }


    public function ProductStock(){

        $products = DB::table('products')
            ->join('categories','products.category_id','categories.id')
            ->join('brands','products.brand_id','brands.id')
            ->select('products.*','categories.category_name','brands.brand_name')
            ->get();
        // return response()->json($product);
        return view('admin.product.stock',compact('products'));
    }
}
