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
        Category::create($inputs);
        return redirect()->route("categories.index")->with(['success'=>"Category added successfully"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view("backoffice.category.show", compact("category"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("backoffice.category.edit", compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $inputs=$request->all();
        $category->update($inputs);
        return redirect()->route("categories.index")->with(['success'=>"Category updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route("categories.index")->with(['success'=>"Category deleted successfully"]);
    }
}
