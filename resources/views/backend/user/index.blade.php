@extends('backend.layouts.master')
@section('title','User')

@section('headercontent')




<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">@include('alert')</div>
    </div>
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

                <a href="{{ url("user/product/$product->id/show") }}"><img class="card-img-top"
                        src="{{ asset('uploads/car_imgs/'. explode('|',$product->images)[0]) }}"
                        style="width:300;height:180px" alt="Card image cap"></a>


                <!-- Card content -->
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">Brand</th>
                                <td><b>{{ $product->name }}</b></td>
                            </tr>
                            <tr>
                                <th scope="row">price</th>
                                <td>{{ $product->price }}-lkhs</td>
                            </tr>
                            <tr>
                                <th scope="row">Content</th>
                                <td>{{ $product->user->phone }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Created at</th>
                                <td><small>{{ $product->created_at->diffForHumans() }}</small></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    <div class="row justify-content-between">
                        <a href="{{ url("user/product/$product->id/show") }}" class="btn btn-sm btn-primary"><i
                                class="fas fa-eye mr-2"></i>View Detail</a>
                        <form action="{{ url("user/wishlist/$product->id") }}">
                            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                            <button type="submit" class="btn btn-sm btn-info"><i class="fas fa-plus mr-2"></i>Add
                                Wishlist</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
        {{ $products->links() }}
    </div>
</div>

@endsection
