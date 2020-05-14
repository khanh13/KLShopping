<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function TodayOrder(){
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $today = $dt->format('d-m-Y');
        $order = DB::table('orders')->where('status',0)->where('date',$today)->get();
        return view('admin.report.today_order',compact('order'));
    }

    public function TodayDelivery(){
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $today = $dt->format('d-m-Y');
        $order = DB::table('orders')->where('status',3)->where('date',$today)->get();
        return view('admin.report.today_delivery',compact('order'));
    }

    public function ThisMonth(){
        $month = date('F');
        $order = DB::table('orders')->where('status',3)->where('month',$month)->get();
        return view('admin.report.this_month',compact('order'));
    }

    public function Search(){
        return view('admin.report.search');
    }

    public function SearchByYear(Request $request){
        $year = $request->year;
        $total = DB::table('orders')->where('status',3)->where('year',$year)->sum('total');
        $order = DB::table('orders')->where('status',3)->where('year',$year)->get();
        return view('admin.report.search_year',compact('order','total'));


    }


    public function SearchByMonth(Request $request){
        $month = $request->month;
//        $c = DB::table('orders')->where('month',$month)->get();;
//        dd($month,$c);
        $total = DB::table('orders')->where('status',3)->where('month',$month)->sum('total');
        $order = DB::table('orders')->where('status',3)->where('month',$month)->get();
        return view('admin.report.search_month',compact('order','total'));
    }


    public function SearchByDate(Request $request){
        $date = $request->date;
        //echo "$date";
        $newdate = date('d-m-y',strtotime($date));
//        echo "$newdate";

        $total = DB::table('orders')->where('status',3)->where('date',$newdate)->sum('total');
        $a = DB::table('orders')->where('status',3)->get();
        $b= DB::table('orders')->where('date',$newdate)->get();
        $order = DB::table('orders')->where('status',3)->where('date',$newdate)->get();
        dd($newdate, $a,$b);
//        return view('admin.report.search_date',compact('order','total'));
    }
}
