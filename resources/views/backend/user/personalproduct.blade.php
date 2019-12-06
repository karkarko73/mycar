@extends('backend.layouts.master')
@section('title','User')

@section('headercontent')
@include('alert')
<div class="container">
    <nav class="navbar navbar-light justify-content-center">
            <h1>Personal Products</h1>
    </nav>
</div>
@endsection

@section('bodycontent')

<div class="container">
        <div class="row">
                @foreach($products as $product)
            <div class="col-md-4">

                    <div class="card">
                            <!-- Card image -->

                        <img class="card-img-top" src="{{ asset('uploads/car_imgs/'. explode('|',$product->images)[0]) }}" style="width:300;height:180px" alt="Card image cap">


                        <!-- Card content -->
                        <div class="card-body">
                            <!-- Title -->
                            <h4 class="card-title"><a>-{{ $product->name }}</a></h4><br>
                            <!-- Text -->
                            <p class="card-text">-{{ $product->price }} lkhs</p>
                            <p>Content : {{ $product->user->phone }}</p>
                            <i class="text-muted">Created-at - {{ $product->created_at->diffForHumans() }}</i>

                            <!-- Button -->
                                <div class="row justify-content-between mt-3">
                                    <a href="{{ url("user/personalproducts/$product->id/show") }}" class="btn btn-sm btn-info"><i class="fas fa-eye">View</i></a>
                                    <a href="{{ url("admin/post/$product->id/delete") }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt">Delete</i></a>

                                    {{-- <a href="{{ url("admin/post/$product->id/delete") }}" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fas fa-trash-alt">Delete</i></a> --}}
                                </div>
                        </div>
                    </div>

            </div>
            @endforeach
        </div>
    </div>
@endsection

