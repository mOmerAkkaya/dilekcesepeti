<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total      = $this->total();
        $payments   = $this->payments();
        $members    = $this->members();
        $last5      = Orders::with('user', 'document')->orderBy('id','desc')->take(5)->get();
        $most       = Orders::with('document')->groupBy('document_id')->selectRaw('document_id, count(*) as total')->take(5)->get();       
        return view("panel.index",compact('total', 'payments','members','last5', 'most'));
    }

    public function total(){
        $year = date('Y');
        $array = array();
        $total = "[";
        for ($i = 1; $i <= 12; $i++) {
            if($i<10){ $i="0".$i;}
            $array[$i] = $year."-".$i;
        }
        foreach($array as $key => $value){
            $total = $total . Orders::where('statistics', $value)->count() . ",";
        }
        return $total = rtrim($total,',') ."]";
    }
    public function payments()
    {
        $year = date('Y');
        $array = array();
        $total = "[";
        for ($i = 1; $i <= 12; $i++) {
            if ($i < 10) {
                $i = "0" . $i;
            }
            $array[$i] = $year . "-" . $i;
        }
        foreach ($array as $key => $value) {
            $total = $total . Orders::where('statistics', $value)->where('pay', 1)->count() . ",";
        }
        return $total = rtrim($total, ',') . "]";
    }

    public function members()
    {
        $year = date('Y');
        $array = array();
        $total = "[";
        for ($i = 1; $i <= 12; $i++) {
            if ($i < 10) {
                $i = "0" . $i;
            }
            $array[$i] = $year . "-" . $i;
        }
        foreach ($array as $key => $value) {
            $total = $total . User::where('created_at', 'LIKE', '%' . $value . '%')->count() . ",";
        }
        return $total = rtrim($total, ',') . "]";
    }
}
