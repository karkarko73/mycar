@extends('backend.layouts.master')
@section('title','City Edit')

@section('headercontent')
<div class="container">
        <div class="row justify-content-center">
                <div class="col-md-4">@include('alert')</div>
        </div>
    <nav class="navbar navbar-light justify-content-center">
            <h1>Edit Cities</h1>
    </nav>
</div>
@endsection

@section('bodycontent')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ url("admin/city/$data->id/edit") }}" method="post">
                    @csrf
                    <div class="form-group">
                            <label for="city">Add city</label>
                            <input type="name" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ $data->name }}">
                            @error('city')<div class="alert text-danger">{{ $message }}</div>@enderror
                    </div>
                    <a href="{{ url('admin/city') }}" class="btn btn-sm btn-info">Back</a>
                    <button type="submit" class="btn btn-sm btn-primary float-right">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
