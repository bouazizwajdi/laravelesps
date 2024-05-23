<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request){
        $product_id=$request->id;
        $product=Product::find($product_id);
        $product->qty=1;
        if(!session()->has("cart")){
            session()->put("cart",[]);
        }
        session()->push("cart",$product);
        return redirect()->back()->with('success','Cart added successfully');
    }
}
