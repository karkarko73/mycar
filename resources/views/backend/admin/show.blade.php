@extends('backend.layouts.master')
@section('title','Product')

@section('headercontent')
<div class="container">
    <nav class="navbar navbar-light justify-content-center">
            <h1>View Product</h1>
    </nav>
</div>

@endsection

@section('bodycontent')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

                <div class="card">
                        <!-- Card image -->
                    <!--Carousel Wrapper-->

                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

                            <ol class="carousel-indicators">
                             @foreach(explode('|',$product->images) as $image)
                             {{-- {{ dd($image) }} --}}
                                <li data-target="#carouselExampleControls" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}">
                                    <img src="{{ asset("/uploads/car_imgs/$image") }}" width="100">
                                </li>
                             @endforeach
                            </ol>

                            <div class="carousel-inner" role="listbox">
                              @foreach(explode('|',$product->images) as $image)
                                 <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                     <img class="d-block img-fluid" src="{{ asset("/uploads/car_imgs/$image") }}">
                                 </div>
                              @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="false"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="false"></span>
                              <span class="sr-only">Next</span>
                            </a>

                    </div>
                    <!--/.Carousel Wrapper-->
                    {{-- <img class="card-img-top" src="{{ asset("uploads/car_imgs/$product->images") }}"> --}}
                    <!-- Card content -->
                    <div class="card-body">
                        <h1 class="card-title">{{ $product->name }}</h1><br><br>

                        <p class="card-text">Price    - {{ $product->price }} lkhs</p>
                        <p class="card-text">Company  - {{ $product->category->name }}</p>
                        <p class="card-text">Model    - {{ $product->model_year }}</p>
                        <p class="card-text">Division - {{ $product->city->name }}</p>
                        <p class="card-text">Seller   - {{ $product->user->name }}</p>


                        <p class="card-text">Contact - {{ $product->user->phone }}</p>

                        <!-- Button -->
                            <div class="row justify-content-between">
                                <a href="{{ url("admin/post") }}" class="btn btn-info"><i class="fas fa-arrow-circle-left">Back</i></a>
                                <a href="{{ url("admin/post/$product->id/edit") }}" class="btn btn-warning"><i class="fas fa-edit">Edit</i></a>
                                <a href="{{ url("admin/post/$product->id/delete") }}" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fas fa-trash-alt">Delete</i></a>
                            </div>
                    </div>
                </div>
        </div>
    </div>
</div>



@endsection

