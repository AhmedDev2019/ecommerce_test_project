<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index' , compact('products'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('products.create' , compact(
            'categories'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required',
            'description' => 'nullable',
        ]);

        $product = new Product;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->save();

        session()->flash('success', 'Product Created Successfully');
        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        return view('products.show' , compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('products.edit' , compact('product','categories'));
    }
    
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required',
            'description' => 'nullable',
        ]);

        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->save();

        session()->flash('success', 'Product Updated Successfully');
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        session()->flash('success', 'Product Deleted Successfully');
        return redirect()->route('products.index');
    }
}
