@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h4 class="card-header d-flex justify-content-between">
                    <div>{{ __('Categories') }}</div>
                    <div>
                        <a href="{{ route('categories.create') }}" class="btn btn-primary">Create New</a>
                    </div>
                </h4>

                <div class="card-body">
                    <table class="table table-hover table-bordered text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $index => $category)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        @if( $category->status == 0 )
                                            <span class="badge bg-danger">Inactive</span>
                                        @elseif( $category->status == 1 )
                                            <span class="badge bg-success">Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('categories.edit' , $category->id) }}" class="btn btn-warning">Edit</a>

                                        <form action="{{ route('categories.destroy' , $category->id) }}" method="POST" style="display:inline">
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
