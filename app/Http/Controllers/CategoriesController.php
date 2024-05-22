<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();
        return view("backoffice.categories.index",compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backoffice.categories.create");
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
            $file->move(public_path("images/categories"),$filename);
            $inputs["photo"]=$filename;
        }else{
            $inputs["photo"]="default.jpg";
        }
        Category::create($inputs);
        return redirect()->route("categories.index")->with(['success'=>"Category added successfully"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view("backoffice.categories.show", compact("category"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("backoffice.categories.edit", compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $inputs=$request->all();
        //traitement de la photo
        if($request->hasFile("photo")){
            if(file_exists(public_path("images/categories/".$category->photo)) && $category->photo!=="default.jpg"){
                unlink(public_path("images/categories/".$category->photo));
                }
            $file=$request->file("photo");
            $extension=$file->getClientOriginalExtension();
            $filename=time().uniqid().".".$extension;
            $file->move(public_path("images/categories"),$filename);
            $inputs["photo"]=$filename;
        }else{
            $inputs["photo"]=$category->photo;
        }

        $category->update($inputs);
        return redirect()->route("categories.index")->with(['success'=>"Category updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //suppression du fichier photo
        if(file_exists(public_path("images/categories/".$category->photo)) && $category->photo!=="default.jpg"){
        unlink(public_path("images/categories/".$category->photo));
        }
        $category->delete();
        return redirect()->route("categories.index")->with(['success'=>"Category deleted successfully"]);
    }
}
