<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show($date,$num){
return view("order.show",compact("date","num"));
    }
}
