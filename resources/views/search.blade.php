@extends('backend.layouts.master')
@section('title','City')

@section('headercontent')
@include('alert')
<div class="container">
    <nav class="navbar navbar-light justify-content-center">
            <h1>Search Products</h1>
    </nav>
</div>
@endsection

@section('bodycontent')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ url('user/finditem') }}" method="get">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="city">City</label>
                        <select id="city" class="form-control" name="city">
                            <option selected>Any City</option>
                            @foreach ($cities as $city)
                            <option>{{ $city->id }}.{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="category">Brand</label>
                        <select id="category" class="form-control" name="category">
                            <option selected>Any Brand</option>
                            @foreach ($cats as $cat)
                            <option>{{ $cat->id }}.{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="model">Model</label>
                        <select id="model" class="form-control" name="model">
                            <option selected>Any Model</option>
                            @foreach ($products as $product)
                            <option>{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="price">Price</label>
                        <select id="price" class="form-control" name="price">
                            <option selected>Any Price</option>
                            <option>100 - 200 - lkh</option>
                            <option>200 - 300 - lkh</option>
                            <option>300 - 400 - lkh</option>
                            <option>400 - 500 - lkh</option>
                            <option>500 - 600 - lkh</option>
                            <option>600 - 700 - lkh</option>
                            <option>700 - 800 - lkh</option>
                            <option>800 - 900 - lkh</option>
                            <option>900 - 1000 - lkh</option>
                            <option>above - 1000 lkh</option>
                        </select>
                    </div>

                </div>
                <button class="btn btn-success btn-rounded float-right" type="submit">Search</button>
            </form>
        </div>
    </div>
</div>
{{-- https://stackoverflow.com/questions/43637848/laravel-and-php-best-multiple-search-method/43638023#43638023 --}}
@endsection
