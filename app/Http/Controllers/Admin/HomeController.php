<?php

namespace App\Http\Controllers\Admin;

use App\Charts\LineChart;
use App\Http\Controllers\Controller;
use App\Models\Tender;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('admin.layouts.home');
    }

//    private function tendersPerMonth($request)
//    {
//        $tenders = Tender::where(function ($query) use($request){
//
//        })->selectRaw('count(id) as total_tenders,DATE_FORMAT(published_date,"%Y-%m") as month')
//            ->groupBy('month')->orderBy('month','asc')->get();
//        $tendersMonthly = new LineChart;
//        $tendersMonthly
//            ->labels($tenders->pluck('month')->toArray())
//            ->dataset('عدد المناقصات شهريا','line',$tenders->pluck('total_tenders')->toArray())
//            ->color("rgb(54, 162, 235)")->backgroundColor("rgb(54, 162, 235)")->fill(false);
//
//        return $tendersMonthly;
//    }
}
