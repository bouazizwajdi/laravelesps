<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class ProductsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        return view("backoffice.products.index",compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view("backoffice.products.create",compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs=$request->all();
        //traitement du fichier photo
        if($request->hasFile("photo")){
            $file=$request->file("photo");
            $extension=$file->getClientOriginalExtension();
            $filename=time().uniqid().".".$extension;
            $file->move(public_path("images/products"),$filename);
            $inputs["photo"]=$filename;
        }else{
            $inputs["photo"]="default.jpg";
        }
        Product::create($inputs);
        return redirect()->route("products.index")->with(['success'=>"Product added successfully"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view("backoffice.products.show", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view("backoffice.products.edit", compact("product"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $inputs=$request->all();
        //traitement de la photo
        if($request->hasFile("photo")){
            if(file_exists(public_path("images/products/".$product->photo)) && $product->photo!=="default.jpg"){
                unlink(public_path("images/products/".$product->photo));
                }
            $file=$request->file("photo");
            $extension=$file->getClientOriginalExtension();
            $filename=time().uniqid().".".$extension;
            $file->move(public_path("images/products"),$filename);
            $inputs["photo"]=$filename;
        }else{
            $inputs["photo"]=$product->photo;
        }

        $product->update($inputs);
        return redirect()->route("products.index")->with(['success'=>"Product updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //suppression du fichier photo
        if(file_exists(public_path("images/products/".$product->photo)) && $product->photo!=="default.jpg"){
        unlink(public_path("images/products/".$product->photo));
        }
        $product->delete();
        return redirect()->route("products.index")->with(['success'=>"Product deleted successfully"]);
    }
}
