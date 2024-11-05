<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
        if( $request->image ){
            Image::make($request->image)->save('uploads/products/'. $request->image->hashName());
            $product->image = 'uploads/products/'. $request->image->hashName();
        }
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

        if( $request->image ){
            if( $product->image != 'uploads/products/default.png' && file_exists($product->image) ){
                unlink($product->image);
            }
            Image::make($request->image)->save('uploads/products/'. $request->image->hashName());
            $product->image = 'uploads/products/'. $request->image->hashName();
        }
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

    // Function to add review to product . 
    public function addReviewToProduct(Request $request)
    {
        $request->validate([
            'rating' => 'required',
            'comment' => 'required',
        ]);

        $review = new Review;
        $review->user_id = auth()->user()->id;
        $review->product_id = $request->product_id;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->save();

        session()->flash('success', 'Product Review Created Successfully');
        return redirect()->back();
    }

    public function activation(Product $product)
    {
        if( $product->status == 0 ){

            $product->status = 1;
            $product->status_updated_at = now();
            $product->save();

            session()->flash('success' , 'Product Activated Successfully ...');
            return redirect()->back();

        }elseif( $product->status == 1 ){

            $product->status = 0;
            $product->status_updated_at = now();
            $product->save();

            session()->flash('success' , 'Product Disabled Successfully ...');
            return redirect()->back();
        }
    }
}
