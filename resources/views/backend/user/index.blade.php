@extends('backend.layouts.master')
@section('title','User')

@section('headercontent')
@include('alert')
<div class="container">
    <nav class="navbar navbar-light justify-content-center">
            <h1>View All Products</h1>
    </nav>
</div>
@endsection

@section('bodycontent')

<div class="container">
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mt-3">
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
                        <!-- Button -->
                            <div class="row justify-content-center">
                                <a href="{{ url("user/product/$product->id/show") }}" class="btn btn-sm btn-primary"><i class="fas fa-eye mr-2"></i>View Detail</a>
                            </div>
                    </div>
                </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        {{ $products->links() }}
    </div>
</div>

@endsection
