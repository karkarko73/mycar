@extends('backend.layouts.master')
@section('title','Edit Products ')

@section('headercontent')
<div class="container">
        <nav class="navbar navbar-light justify-content-center">
                <h1>Edit Product</h1>
        </nav>
</div>

@endsection

@section('bodycontent')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ url("user/personalproducts/$product->id/edit") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="name">Enter Car Name</label>
                    <input type="name" class="form-control @error('name') is-invalid @enderror" id="inputEmail4" placeholder="Name" name="name" value="{{ $product->name }}">
                    @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                </div>


                  <div class="form-group col-md-6">
                    <label for="model">Model Year</label>
                    <input type="number" class="form-control @error('model_year') is-invalid @enderror" id="model" placeholder="Model" name="model" value="{{ $product->model_year }}">
                    @error('model_year')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                </div>


                <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="city">City</label>
                            <select id="city" class="form-control @error('city_id') is-invalid @enderror" name="city">
                                <option>Choose...</option>
                                @foreach ($cities as $city)
                                <option @if($product->city->id == $city->id)
                                            selected
                                        @endif>{{ $city->id }}.{{ $city->name }}</option>
                                @endforeach
                            </select>
                            @error('city_id')<div class="text-danger">{{ $message }}</div>@enderror

                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Brand</label>
                            <select id="inputState" class="form-control @error('cat_id') is-invalid @enderror" name="category" >
                            <option>Choose...</option>
                            @foreach ($cats as $cat)
                            <option @if($product->city->id == $cat->id)
                                    selected
                                    @endif>{{ $cat->id }}.{{ $cat->name }}</option>
                            @endforeach
                            </select>
                            @error('cat_id')<div class="text-danger">{{ $message }}</div>@enderror

                        </div>
                      <div class="form-group col-md-4">
                        <label for="price">Price</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Amount - lkh" name="price" value="{{ $product->price }}">
                        @error('price')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                      <input type="hidden" id="user_id" value="{{ auth()->user()->id }}" name="user_id">
                    </div>

                <div class="form-group">
                    <label for="description">Enter Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" name="description">{{ $product->description }}</textarea>
                    @error('description')<div class="text-danger">{{ $message }}</div>@enderror
                </div>


                <div class="form-group">
                    <label for="exampleFormControlFile1">Image Uploads</label>
                    <input type="file" class="form-control-file @error('file') is-invalid @enderror" id="exampleFormControlFile1" name="image[]" multiple src="{{ asset("uploads/car_imgs/$product->images") }}">
                    @error('file')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                <div class="row justify-content-center">
                    <a href="{{ url("admin/post/$product->id/show") }}" class="btn btn-info mr-3"><i class="fas fa-arrow-circle-left">Back</i></a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
                <div class="row justify-content-center mt-3">
                    <div class="col-md-6">
                        <div class="card">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @foreach(explode('|',$product->images) as $image)
                                    <li data-target="#carouselExampleControls" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}">
                                        <img src="{{ asset("/uploads/car_imgs/$image") }}" width="100">
                                    </li>
                                    @endforeach
                                </ol>

                                <div class="carousel-inner" role="listbox">
                                    @foreach(explode('|',$product->images) as $image)
                                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                            <img class="d-block img-fluid"  src="{{ asset("/uploads/car_imgs/$image") }}">
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
                    </div>
                </div>
              </form>
        </div>
    </div>
</div>







@endsection
