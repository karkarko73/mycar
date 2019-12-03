@extends('backend.layouts.master')
@section('title','All Products ')

@section('headercontent')
<div class="container">

        <nav class="navbar navbar-light justify-content-center">
                <a class="navbar-brand" href="#"><h1>Create Product</h1></a>
        </nav>

</div>

@endsection

@section('bodycontent')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ url('user/personalproduct/create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="name">Enter Car Name</label>
                    <input type="name" class="form-control @error('name') is-invalid @enderror" id="inputEmail4" placeholder="Name" name="name">
                    @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                </div>


                  <div class="form-group col-md-6">
                    <label for="model">Model Year</label>
                    <input type="number" class="form-control @error('model_year') is-invalid @enderror" id="model" placeholder="Model" name="model">
                    @error('model_year')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                </div>


                <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="city">City</label>
                            <select id="city" class="form-control @error('city_id') is-invalid @enderror" name="city">
                                <option selected>Choose...</option>
                                @foreach ($cities as $city)
                                <option>{{ $city->id }}.{{ $city->name }}</option>
                                @endforeach
                            </select>
                            @error('city_id')<div class="text-danger">{{ $message }}</div>@enderror

                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Brand</label>
                            <select id="inputState" class="form-control @error('cat_id') is-invalid @enderror" name="category" >
                            <option selected>Choose...</option>
                            @foreach ($cats as $cat)
                            <option>{{ $cat->id }}.{{ $cat->name }}</option>
                            @endforeach
                            </select>
                            @error('cat_id')<div class="text-danger">{{ $message }}</div>@enderror

                        </div>
                      <div class="form-group col-md-4">
                        <label for="price">Price</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Amount - lkh" name="price">
                        @error('price')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                      <input type="hidden" id="user_id" value="{{ auth()->user()->id }}" name="user_id">
                    </div>

                <div class="form-group">
                    <label for="description">Enter Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" name="description"></textarea>
                    @error('description')<div class="text-danger">{{ $message }}</div>@enderror
                </div>


                <div class="form-group">
                    <label for="exampleFormControlFile1">Image Uploads</label>
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="exampleFormControlFile1" name="image[]" multiple>
                    @error('image')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                <a href="{{ url("admin/post") }}" class="btn btn-info float-right"><i class="fas fa-arrow">Back</i></a>
                <button type="submit" class="btn btn-success mr-3 float-right">Submit</button>
              </form>
        </div>
    </div>
</div>
@endsection
