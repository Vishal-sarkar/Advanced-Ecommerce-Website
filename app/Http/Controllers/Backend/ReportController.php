<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use DateTime;

class ReportController extends Controller
{
    public function ReportView(){
        return view('backend.report.report_view');
    }

    public function ReporthByDate(Request $request){
        // return $request->all();
        $date = new DateTime($request->date);
        $formatDate = $date->format('d F Y');
        $orders = Order::where('order_date',$formatDate)->latest()->get();
        return view('backend.report.report_show', compact('orders'));
    }

    public function ReporthByMonth(Request $request){
        // return $request->all();
        $orders = Order::where('order_month',$request->month)->where('order_year',$request->year_name)->latest()->get();
        return view('backend.report.report_show', compact('orders'));
    }

    public function ReporthByYear(Request $request){
        // return $request->all();
        $orders = Order::where('order_year',$request->year)->latest()->get();
        return view('backend.report.report_show', compact('orders'));
    }
}
