@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h4 class="card-header d-flex justify-content-between">
                    <div>{{ __('Create Category') }}</div>
                    <div>
                        <a href="{{ route('categories.index') }}" class="btn btn-danger">Back</a>
                    </div>
                </h4>

                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="POST">
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                            <label for=""><b>Category Name</b></label>
                            <input type="text" name="name" class="form-control mt-2" value="{{ old('name') }}" placeholder="Insert Category Name ...">
                        </div>
                        
                        <br>
                        <button type="submit" class="btn btn-success w-100">Save Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
