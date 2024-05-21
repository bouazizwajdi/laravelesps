<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\CategoriesController;

// Route::get('/nom/prenom/{n?}/{p?}',[WebsiteController::class,"accueil"])
// ->name("website.accueil")
// ->where(['n'=>"[a-zA-Z ]{3,20}",'p'=>"[a-zA-Z ]{3,20}"]);

Route::get('/',[WebsiteController::class,"accueil"])
->name("website.accueil");
Route::get('/about',[WebsiteController::class,"about"])->name("website.about");
Route::get('/products',[WebsiteController::class,"products"])->name("website.products");
Route::get('/contact',[WebsiteController::class,"contact"])->name("website.contact");


Route::get('/{date}/{num}', [OrderController::class, 'show'])->name('order.show')->where(['date'=>"[0-9]{2}-[0-9]{2}-[0-9]{4}",'num'=>"[0-9]{8}"]);

Route::post("/contact/show",[WebsiteController::class,"show"])->name("website.show");

Route::resource("categories",CategoriesController::class);
