@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h4 class="card-header d-flex justify-content-between">
                    <div>{{ __('Products') }}</div>
                    <div>
                        <a href="{{ route('products.create') }}" class="btn btn-primary">Create New</a>
                    </div>
                </h4>

                <div class="card-body">
                    <table class="table table-hover table-bordered text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $index => $product)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <img style="width:60px" src="{{ asset($product->image) }}" alt="">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>
                                        @if( $product->status == 0 )
                                            <span class="badge bg-danger">Inactive</span>
                                        @elseif( $product->status == 1 )
                                            <span class="badge bg-success">Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        
                                        @if( $product->status == 0 )
                                            <a href="{{ route('products.activation' , $product->id) }}" class="btn btn-success"><i class="fa fa-check"></i></a>
                                        @else
                                            <a href="{{ route('products.activation' , $product->id) }}" class="btn btn-danger"><i class="fa fa-close"></i></a>
                                        @endif
                                        
                                        <a href="{{ route('products.show' , $product->id) }}" class="btn btn-info">Show</a>

                                        <a href="{{ route('products.edit' , $product->id) }}" class="btn btn-warning">Edit</a>

                                        <form action="{{ route('products.destroy' , $product->id) }}" method="POST" style="display:inline">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit"  class="btn btn-danger delete" style="cursor:pointer">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
