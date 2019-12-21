@extends('backend.layouts.master')
@section('title','Search Products')

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
        <div class="col-md-6 ">
            <form action="{{ url("user/findbrand") }}" method="get">
            <label for="category">Search By Company</label>
            <div class="input-group md-form form-sm form-2 pl-0">
                    <select id="category" class="form-control" name="category">
                        <option selected>Choose Brand</option>
                        @foreach ($cats as $cat)
                        <option>{{ $cat->id }}.{{ $cat->name }}</option>
                        @endforeach
                    </select>
                <div class="input-group-append">
                    <button class="btn btn-primary"><i class="fas fa-search text-grey" aria-hidden="true"></i></button>
                </div>
            </div>
            </form>
        </div>

        <div class="col-md-6 ">
            <form action="{{ url("user/searchbyname") }}" method="get">
            <label for="category">Search By Brand Name</label>
            <div class="input-group md-form form-sm form-2 pl-0">
                    <select id="single" class="form-control select2-single"  aria-hidden="true" name="name">
                        <option selected>Search</option>
                        @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                <div class="input-group-append">
                    <button class="btn btn-primary"><i class="fas fa-search text-grey" aria-hidden="true"></i></button>
                </div>
            </div>
            </form>
        </div>

    </div>

    <div class="row mt-5">
            <div class="col-md-6 ">
                <form action="#" method="get">
                <label for="category">Search By Price</label>
                <div class="input-group md-form form-sm form-2 pl-0">
                        <select id="single" class="form-control select2-single"  aria-hidden="true" name="name">
                            <option selected>Search</option>
                            <option value="100">100  - lkh</option>
                            <option value="200">200  - lkh</option>
                            <option value="300">300  - lkh</option>
                            <option value="400">400  - lkh</option>
                            <option value="500">500  - lkh</option>
                            <option value="600">600  - lkh</option>
                            <option value="700">700  - lkh</option>
                            <option value="800">800  - lkh</option>
                            <option value="900">900  - lkh</option>
                            <option value="1000">1000 - lkh</option>
                            <option value="5000">1000 above - lkh</option>
                        </select>
                    <div class="input-group-append">
                        <button class="btn btn-primary"><i class="fas fa-search text-grey" aria-hidden="true"></i></button>
                    </div>
                </div>
                </form>
            </div>
    </div>
</div>


@endsection


