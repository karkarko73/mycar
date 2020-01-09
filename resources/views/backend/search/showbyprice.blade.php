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
                @foreach($products as $product)
                <div class="col-md-6 mt-3">
                    <div class="card">
                        <!-- Card image -->

                        <a href="{{ url("user/showsinglebrand/$product->id") }}"><img class="card-img-top"
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
                                <a href="{{ url("user/showsinglebrand/$product->id") }}"
                                    class="btn btn-sm btn-primary"><i class="fas fa-eye mr-2"></i>View Detail</a>
                                <form action="{{ url("user/wishlist/$product->id") }}">
                                    <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                                    <button type="submit" class="btn btn-sm btn-info"><i
                                            class="fas fa-plus mr-2"></i>Add
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

        <div class="col-md-3">
            <div class="related-car-model">
                <div class="header">
                    <h3>Related Car Model</h3>
                </div>
                <ul style="list-style-type:none;">
                    @foreach($products as $product)
                    <li>
                        <a href="{{ url("user/showsinglebrand/$product->id") }}">{{ $product->name }} -
                            {{ $product->model_year }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="filter-by-location mt-2">
                <div class="header">
                    <h3>Location Filter</h3>
                </div>
                <ul style="list-style-type:none;">
                    @foreach($cities as $city)
                    <li>
                        <a href="{{ url("user/show/city/brand/$city->id") }}">{{ $city->name }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="other-brand mt-2">
                <div class="header">
                    <h3>Other Brand</h3>
                </div>
                <ul style="list-style-type:none;">
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
