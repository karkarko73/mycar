@extends('frontend.mywelcome')
@section('title','Introduction')

@section('content')

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
                        <p>Content : 09693533352</p>
                        <i class="text-muted">Created-at - {{ $product->created_at->diffForHumans() }}</i>
                        <!-- Button -->
                            <div class="row justify-content-center">
                                <a href="{{ url("post/$product->id/show") }}" class="btn btn-sm btn-primary"><i class="fas fa-eye mr-2"></i>View Detail</a>
                            </div>
                    </div>
                </div>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center mt-3">
        {{ $products->links() }}
    </div>
</div>

@endsection
