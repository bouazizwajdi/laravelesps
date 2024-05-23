<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function accueil($nom=null,$prenom=null){
        return view("website.accueil",compact("nom", "prenom"));
    }

    public function about(){

        return view("website.about");
    }

    public function products($category_id=null){
        if($category_id>0){
            $products=Product::where('category_id',$category_id)->get();
        }else{
            $products=Product::all();
        }
        return view("website.products",compact('products'));
    }

    public function contact(){
        return view("website.contact");
    }

    public function show(Request $request){

$name=$request->name;
$email=$request->email;
$subject=$request->subject;
$message=$request->message;
return view("website.show",compact("name", "email","subject", "message"));

    }
}
