<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;

// Route::get('/nom/prenom/{n?}/{p?}',[WebsiteController::class,"accueil"])
// ->name("website.accueil")
// ->where(['n'=>"[a-zA-Z ]{3,20}",'p'=>"[a-zA-Z ]{3,20}"]);
//Route::get('/{date}/{num}', [OrderController::class, 'show'])->name('order.show')->where(['date'=>"[0-9]{2}-[0-9]{2}-[0-9]{4}",'num'=>"[0-9]{8}"]);
//Route::post("/contact/show",[WebsiteController::class,"show"])->name("website.show");





//website
Route::get('/',[WebsiteController::class,"accueil"])
->name("website.accueil");
Route::get('/about',[WebsiteController::class,"about"])->name("website.about");
Route::get('/productslist/{category_id?}',[WebsiteController::class,"products"])->name("website.products");
Route::get('/contact',[WebsiteController::class,"contact"])->name("website.contact");

//cart
Route::post('/cart/add',[CartController::class,"addToCart"])->name("cart.addtocart");
Route::get('/cart/removeitem/{id}',[CartController::class,"removeCartItem"])
->name("cart.removecartitem")
->where('id',"[0-9]{1,11}");
Route::get('/cart',[CartController::class,"cart"])->name("cart.cart");
Route::get('/clearcart',[CartController::class,"clearCart"])->name("cart.clearcart");
Route::put('/updatecartitem',[CartController::class,"updateCartItem"])->name("cart.updatecartitem");
Route::get('/checkout',[CartController::class,"checkout"])->name("cart.checkout");

//Order
Route::get('/order/store',[OrdersController::class,"store"])->name("orders.store");
Route::get('/order/index',[OrdersController::class,"index"])->name("orders.index");

//admin
Route::middleware(["auth"])->group(function(){
Route::resource("categories",CategoriesController::class);
Route::resource("products",ProductsController::class);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
