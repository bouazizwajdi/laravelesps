<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function accueil($nom=null,$prenom=null){
        return view("website.accueil",compact("nom", "prenom"));
    }

    public function about(){

        return view("website.about");
    }

    public function products(){
        return view("website.products");
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
