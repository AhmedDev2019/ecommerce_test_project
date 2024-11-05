@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h4 class="card-header d-flex justify-content-between">
                    <div>{{ __('Show Product') }}</div>
                    <div>
                        <a href="{{ route('products.index') }}" class="btn btn-danger">Back</a>
                    </div>
                </h4>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for=""><b>Product Name</b></label>
                            <p>{{ $product->name }}</p>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for=""><b>Product Category</b></label>
                            <p>{{ $product->category->name }}</p>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for=""><b>Product Price</b></label>
                            <p>{{ $product->price }}</p>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for=""><b>Product Stock</b></label>
                            <p>{{ $product->stock }}</p>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for=""><b>Product Image</b></label>
                            <p>
                                <img style="width:300px" src="{{ asset($product->image) }}" alt="">
                            </p>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for=""><b>Product Status Updated At</b></label>
                            <p>{{ Carbon\Carbon::parse($product->status_updated_at)->format('Y-m-d h:i A') }}</p>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for=""><b>Product Description</b></label>
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                    
                        <!-- Button trigger modal add review to product -->
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add Review To Product
                        </button>
                </div>
            </div>
            <br>
            <div class="card">
                <h4 class="card-header d-flex justify-content-between">
                    <div>{{ __('Product Reviews') }}</div>
                </h4>

                <div class="card-body">
                    @foreach($product->reviews as $index => $review)
                        <div class="row text-center">
                            <div class="col-md-4">
                                <img style="width:80px" src="{{ asset('uploads/avatars/default.png') }}" alt="">
                                <p>{{ $review->user->name }}</p>
                            </div>
                            <div class="col-md-8">
                                <span>{{ $review->created_at->diffForHumans() }}</span><br>
                                <span>
                                    @for($i = 1; $i <= $review->rating ; $i++)
                                        <i class="fa fa-star text-warning"></i>
                                    @endfor
                                </span>
                                <p style="padding:15px;background-color:#eee;margin:0;margin:5px 0;border-radius:25px 0 0 25px">{{ $review->comment }}</p>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- // Include modal to add review . -->
    @include('products.modals._add-review-to-product')
@endsection
