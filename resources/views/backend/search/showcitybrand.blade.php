@extends('backend.layouts.master')
@section('title','Products')

@section('headercontent')
<div class="container">
        <div class="row justify-content-center">
                <div class="col-md-4">@include('alert')</div>
        </div>
    <nav class="navbar navbar-light justify-content-center">
        <h1>Search Products</h1>
    </nav>
</div>
@endsection

@section('bodycontent')

<div class="container">
    <div class="row">

        <div class="col-md-9">
            <div class="row">
                @foreach($city->products as $product)
                <div class="col-md-6">
                    <div class="card mr-2">
                            <!-- Card image -->
                        <img class="card-img-top" src="{{ asset('uploads/car_imgs/'. explode('|',$product->images)[0]) }}" style="width:400;height:180px" alt="Card image cap">

                        <!-- Card content -->
                        <div class="card-body">
                            <!-- Title -->
                            <h4 class="card-title"><a>-{{ $product->name }}</a></h4><br>
                            <!-- Text -->
                            <p class="card-text">-{{ $product->price }} lkhs</p>
                            <p>Content : {{ $product->user->phone }}</p>
                            <!-- Button -->
                            <div class="row justify-content-between">
                                <a href="{{ url("user/showsinglebrand/$product->id") }}" class="btn btn-sm btn-primary"><i class="fas fa-eye mr-2"></i>View Detail</a>

                                <form action="{{ url("user/wishlist/$product->id") }}">
                                    <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                                    <button type="submit" class="btn btn-sm btn-info"><i class="fas fa-plus mr-2"></i>Add Wishlist</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{-- <div class="row justify-content-center">
                {{ $city->links() }}
            </div> --}}
        </div>

        <div class="col-md-3">
            <div class="related-car-model">
                <div class="header">
                    <h3>Related Car Model</h3>
                </div>
                <ul>
                    @foreach($city->products as $product)
                    <li>
                        <a href="{{ url("user/showsinglebrand/$product->id") }}">{{ $product->name }} - {{ $product->model_year }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="filter-by-location">
                <div class="header">
                    <h3>Location Filter</h3>
                </div>
                <ul>
                    @foreach($cities as $city)
                    <li>
                        <a href="{{ url("user/show/city/brand/$city->id") }}">{{ $city->name }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="other-brand">
                <div class="header">
                    <h3>Other Brand</h3>
                </div>
                <ul>
                    @foreach($cats as $cat)
                        <li>
                            <a href="{{ url("user/findbrand/$cat->id") }}">{{ $cat->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
