@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h4 class="card-header d-flex justify-content-between">
                    <div>{{ __('Edit Product') }}</div>
                    <div>
                        <a href="{{ route('products.index') }}" class="btn btn-danger">Back</a>
                    </div>
                </h4>

                <div class="card-body">
                    <form action="{{ route('products.update' , $product->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for=""><b>Category Name</b></label>
                                    <select name="category_id" id="category_id" class="form-control mt-2 {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
                                        <option value="">..........</option>
                                        @foreach($categories as $index => $category)
                                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('category_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for=""><b>Product Name</b></label>
                                    <input type="text" name="name" class="form-control mt-2 {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ $product->name }}">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for=""><b>Product Price</b></label>
                                    <input type="text" name="price" class="form-control mt-2 {{ $errors->has('price') ? 'is-invalid' : '' }}" value="{{ $product->price }}">
                                    @if ($errors->has('price'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for=""><b>Product Stock</b></label>
                                    <input type="number" name="stock" class="form-control mt-2 {{ $errors->has('stock') ? 'is-invalid' : '' }}" value="{{ $product->stock }}">
                                    @if ($errors->has('stock'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('stock') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for=""><b>Product Description</b></label>
                                    <textarea name="description" id="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" rows="4">{{ $product->description }}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <br>
                        <button type="submit" class="btn btn-success w-100">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection