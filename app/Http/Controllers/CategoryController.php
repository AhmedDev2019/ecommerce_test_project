<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index' , compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories'
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->save();

        session()->flash('success', 'Category Created Successfully');
        return redirect()->route('categories.index');
    }

    public function show(Category $category)
    {
        return view('categories.show' , compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit' , compact('category'));
    }
    
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id
        ]);

        $category->name = $request->name;
        $category->save();

        session()->flash('success', 'Category Updated Successfully');
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        session()->flash('success', 'Category Deleted Successfully');
        return redirect()->route('categories.index');
    }
}
