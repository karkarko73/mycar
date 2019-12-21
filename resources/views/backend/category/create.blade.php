@extends('backend.layouts.master')
@section('title','Category')

@section('headercontent')

<div class="container">
        <div class="row justify-content-center">
                <div class="col-md-4">@include('alert')</div>
        </div>
    <nav class="navbar navbar-light justify-content-center">
            <h1>Create Category</h1>
    </nav>
</div>
@endsection

@section('bodycontent')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ url('admin/category/create') }}" method="post">
                    @csrf
                    <div class="form-group">
                            <label for="category">Add Category</label>
                            <input type="name" class="form-control @error('category') is-invalid @enderror" id="category" name="name" placeholder="Enter Category">
                            @error('category')<div class="alert text-danger">{{ $message }}</div>@enderror
                    </div>
                    <a href="{{ url('admin/category') }}" class="btn btn-sm btn-info">Back</a>
                    <button type="submit" class="btn btn-sm btn-primary float-right">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
