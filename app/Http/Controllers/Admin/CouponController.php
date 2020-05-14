<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
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
        $coupons = Coupon::all();
        return view('admin.others.index-coupon', compact('coupons'));
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
            'others' => 'required|unique:coupons|max:20',
            'discount' => 'required'
        ]);

        Coupon::create([
            'others' => $request->coupon,
            'discount' => $request->discount
        ]);

        $notification=array(
            'messege'=>'Coupon Added Successfully',
            'alert-type'=>'success'
        );

        return redirect(route('coupons.index'))->with($notification);
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
    public function edit(Coupon  $coupon)
    {
        return view('admin.others.edit-coupon')->with('others', $coupon);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        $this->validate($request, [
            'others' => 'required:coupons|max:20',
            'discount' => 'required'
        ]);

        $coupon->update([
            'others' => $request->coupon,
            'discount' => $request->discount
        ]);

        $notification=array(
            'messege'=>'Coupon Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect(route('coupons.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();

        $notification=array(
            'messege'=>'Coupon Deleted Successfully',
            'alert-type'=>'success'
        );

        return redirect(route('coupons.index'))->with($notification);
    }
}
