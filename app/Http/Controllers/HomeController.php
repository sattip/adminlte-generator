<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acs_sum = Order::whereHas('vouchers')->where('courier_name', 'ACS Courier')->sum('orderprice');
        $elta_sum = Order::whereHas('vouchers')->where('courier_name', 'ELTA Courier')->sum('orderprice');
        return view('home')->with(
            [
                "acs" => $acs_sum,
                "elta" => $elta_sum
            ]
        );
    }
}
