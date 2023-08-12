<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('categoryName');
        $category->save();
        if($category->save()){
            return redirect()->back()->with('success', 'Saved Successfully!');
        }
        return redirect()->back()->with('failed', 'Could not save!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->input('categoryName');
        if($category->save()){
            return redirect()->back()->with('success', 'Updated Successfully!');
        }
        return redirect()->back()->with('failed', 'Could not update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(Category::destroy($id)){
            return redirect()->back()->with('success', 'Deleted Successfully!');
        }
        return redirect()->back()->with('failed', 'Could not delete!');
    }
}
