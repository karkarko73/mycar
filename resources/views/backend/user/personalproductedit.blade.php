@extends('backend.layouts.master')
@section('title','Edit Products ')

@section('headercontent')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">@include('alert')</div>
    </div>
    <nav class="navbar navbar-light justify-content-center">
        <h1>Edit Product</h1>
    </nav>
</div>

@endsection

@section('bodycontent')

<div class="container">

    <nav class="navbar navbar-light">
        <a href="{{ url("user/personalproducts/$product->id/show") }}"><button class="btn btn-sm btn-info float-right"><i
                    class="fas fa-arrow-circle-left mr-2"></i>Back</button></a>
        <form action="{{ url("user/personalproducts/$product->id/edit") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <a href="{{ url("admin/post") }}"><button type="submit" class="btn btn-sm btn-success"><i
                        class="far fa-thumbs-up mr-2"></i>Submit</button></a>
    </nav>
    <div class="row mt-3">
        <div class="col-md-5">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach(explode('|',$product->images) as $image)
                    {{-- {{ dd($image) }} --}}
                    <li data-target="#carouselExampleControls" data-slide-to="{{ $loop->index }}"
                        class="{{ $loop->first ? 'active' : '' }}">
                        <img src="{{ asset("/uploads/car_imgs/$image") }}" width="100px">
                    </li>
                    @endforeach
                </ol>

                <div class="carousel-inner" role="listbox">
                    @foreach(explode('|',$product->images) as $image)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img class="d-block img-fluid width:100%;" src="{{ asset("/uploads/car_imgs/$image") }}">
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

        </div>

        <div class="col-md-7">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th scope="row">Brand</th>
                        <td><input type="name" class="form-control @error('name') is-invalid @enderror" id="inputEmail4"
                                placeholder="Name" name="name" value="{{ $product->name }}">
                            @error('name')<div class="text-danger">{{ $message }}</div>@enderror</td>
                    </tr>
                    <tr>
                        <th scope="row">price</th>
                        <td><input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                                placeholder="Amount - lkh" name="price" value="{{ $product->price }}">
                            @error('price')<div class="text-danger">{{ $message }}</div>@enderror</td>
                    </tr>
                    <tr>
                        <th scope="row">Company</th>
                        <td><select id="inputState" class="form-control @error('category') is-invalid @enderror"
                                name="category">
                                <option>Choose...</option>
                                @foreach ($cats as $cat)
                                <option value="{{ $cat->id }}" @if($product->category->id == $cat->id)
                                    selected
                                    @endif>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            @error('category')<div class="text-danger">{{ $message }}</div>@enderror</td>
                    </tr>
                    <tr>
                        <th scope="row">Model</th>
                        <td><input type="number" class="form-control @error('model') is-invalid @enderror" id="model"
                                placeholder="Model" name="model" value="{{ $product->model_year }}">
                            @error('model')<div class="text-danger">{{ $message }}</div>@enderror</td>
                    </tr>
                    <tr>
                        <th scope="row">License</th>
                        <td><input class="form-control @error('license') is-invalid @enderror" type="text"
                                value="{{ $product->license }}" name="license">
                            @error('license')<div class="text-danger">{{ $message }}</div>@enderror</td>
                        <input type="hidden" id="user_id" value="{{ auth()->user()->id }}" name="user_id">
                    </tr>
                    <tr>
                        <th scope="row">Division</th>
                        <td><select id="city" class="form-control @error('city') is-invalid @enderror" name="city">
                                <option>Choose...</option>
                                @foreach ($cities as $city)
                                <option value="{{ $city->id }}" @if($product->city->id == $city->id)
                                    selected
                                    @endif>{{ $city->name }}</option>
                                @endforeach
                            </select>
                            @error('city')<div class="text-danger">{{ $message }}</div>@enderror</td>
                    </tr>
                    <tr>
                        <th scope="row">Description</th>
                        <td><textarea class="form-control @error('description') is-invalid @enderror" id="description"
                                rows="1" name="description">{{ $product->description }}</textarea>
                            @error('description')<div class="text-danger">{{ $message }}</div>@enderror</td>
                    </tr>
                    <tr>
                        <th scope="row">Image Uploads</th>
                        <td><input type="file" class="form-control-file @error('file') is-invalid @enderror"
                                id="exampleFormControlFile1" name="image[]" multiple
                                src="{{ asset("uploads/car_imgs/$product->images") }}">
                            @error('file')<div class="text-danger">{{ $message }}</div>@enderror</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    </form>
</div>
@endsection
