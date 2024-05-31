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

    public function removeCartItem(int $id){
        $cart=session("cart");
        session()->put("cart",[]);

        foreach($cart as $cartItem){
            if($cartItem->id!=$id){
                session()->push("cart",$cartItem);
            }
        }
return redirect()->back()->with('success','CartItem deleted successfully');
}

public function cart(){
    return view("website.cart");
}

public function clearCart(){
    session()->forget("cart");
    return redirect()->back()->with('success','Cart cleared successfully');
}

public function updateCartItem(Request $request){
    $id=(int) $request->id;
    $qty=(int) $request->qty;
    $cart=session("cart");
    foreach($cart as $cartItem){
        if($cartItem->id===$id){
            $cartItem->qty=$qty;
        }
    }

    session()->put("cart",$cart);

    return response()->json(
        [
        'success' => true,
        'message' => 'updated successfully!',
    ],
    200);

}

public function checkout(){
    return view("website.checkout");
}

}
