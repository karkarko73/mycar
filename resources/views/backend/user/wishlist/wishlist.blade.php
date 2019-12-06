@extends('backend.layouts.master')
@section('title','Wishlist Products')

@section('headercontent')
@include('alert')
<div class="container">
    <nav class="navbar navbar-light justify-content-center">
            <h1>My Wishlist Products</h1>
    </nav>
</div>
@endsection

@section('bodycontent')

<div class="container">
    <div class="row">
        @foreach($results as $result)
        @for($i=0;$i<count($result->products);$i++)

        <div class="col-md-4 mt-3">
                <div class="card">
                        <!-- Card image -->

                    <img class="card-img-top" src="{{ asset('uploads/car_imgs/'. explode('|',$result->products[$i]->images)[0]) }}" style="width:300;height:180px" alt="Card image cap">


                    <!-- Card content -->
                    <div class="card-body">
                        <!-- Title -->
                        <h4 class="card-title"><a>-{{ $result->products[$i]->name }}</a></h4><br>
                        <!-- Text -->
                        <p class="card-text">-{{ $result->products[$i]->price }} lkhs</p>
                        <p>Content : {{ $result->products[$i]->user->phone }}</p>
                        <!-- Button -->
                            <div class="row justify-content-between">
                                <a href="{{ url("user/mywishlist/".$result->products[$i]->id."/show") }}" class="btn btn-sm btn-primary"><i class="fas fa-eye mr-2"></i>View Detail</a>
                                <a href="{{ url("user/mywishlist/".$result->products[$i]->id."/delete") }}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt mr-2"></i>Remove from wishlist</a>
                            </div>
                    </div>
                </div>
        </div>

        @endfor
        @endforeach
    </div>
    {{-- <div class="row">
        {{ $products->links() }}
    </div> --}}
</div>

@endsection
