<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders=Order::all();
        return view("orders.index",compact("orders"));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
$inputs['user_id']=Auth::user()->id;
$inputs['num']=1;
$max=Order::max('num');
if($max){
    $inputs['num']=$max+1;
}
$inputs['date']=date("Y-m-d");
$inputs['amount']=0;
foreach(session()->get("cart") as $cartItem){
    $inputs['amount']+=$cartItem->price * $cartItem->qty;
}
$order=Order::create($inputs);
//ajouter les ligne
foreach(session()->get("cart") as $cartItem){
    $line['order_id']=$order->id;
    $line['product_id']=$cartItem->id;
    $line['qty']=$cartItem->qty;
    $line['price']=$cartItem->price;
    $line['vat']=$cartItem->vat;
    $line['amount']=$cartItem->qty * $cartItem->price;
    Orderproduct::create($line);
}

session()->forget("cart");

return redirect()->route("orders.index")->with('success', "Order added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
