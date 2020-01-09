@extends('backend.layouts.master')
@section('title','Create Product')

@section('headercontent')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">@include('alert')</div>
    </div>

</div>

@endsection

@section('bodycontent')

<div class="container">
    <nav class="navbar navbar-light">
        <a href="{{ url("admin/post") }}"><button class="btn btn-sm btn-info float-right"><i
                    class="fas fa-arrow-circle-left mr-2"></i>Back</button></a>
        <h3>Create Products</h3>
        <form action="{{ url("admin/post/create") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <a href="{{ url("admin/post") }}"><button type="submit" class="btn btn-sm btn-success"><i
                        class="far fa-thumbs-up mr-2"></i>Submit</button></a>
    </nav>

    <div class="col-md-12">
        <table class="table table-striped mt-2">
            <tbody>
                <tr>
                    <th scope="row">Brand</th>
                    <td><input type="name" class="form-control @error('name') is-invalid @enderror" id="inputEmail4"
                            name="name">
                        @error('name')<div class="text-danger">{{ $message }}</div>@enderror</td>
                </tr>
                <tr>
                    <th scope="row">price</th>
                    <td><input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                            placeholder="200 - lkh(example)" name="price">
                        @error('price')<div class="text-danger">{{ $message }}</div>@enderror</td>
                    <input type="hidden" id="user_id" value="{{ auth()->user()->id }}" name="user_id">
                </tr>
                <tr>
                    <th scope="row">Company</th>
                    <td><select id="inputState" class="form-control @error('category') is-invalid @enderror"
                            name="category">
                            <option></option>
                            @foreach ($cats as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        @error('category')<div class="text-danger">{{ $message }}</div>@enderror</td>
                </tr>
                <tr>
                    <th scope="row">Model</th>
                    <td><input type="number" placeholder="2015(example)" class="form-control @error('model') is-invalid @enderror" id="model"
                            name="model">
                        @error('model')<div class="text-danger">{{ $message }}</div>@enderror</td>
                </tr>
                <tr>
                    <th scope="row">License</th>
                    <td><input class="form-control @error('license') is-invalid @enderror" type="text"
                            placeholder="7N/7575(example)" name="license">
                        @error('license')<div class="text-danger">{{ $message }}</div>@enderror</td>
                        <input type="hidden" id="user_id" value="{{ auth()->user()->id }}" name="user_id">
                </tr>
                <tr>
                    <th scope="row">Division</th>
                    <td><select id="city" class="form-control @error('city') is-invalid @enderror" name="city">
                            <option></option>
                            @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                        @error('city')<div class="text-danger">{{ $message }}</div>@enderror</td>
                </tr>
                <tr>
                    <th scope="row">Description</th>
                    <td><textarea class="form-control @error('description') is-invalid @enderror" id="description"
                            rows="1" name="description"></textarea>
                        @error('description')<div class="text-danger">{{ $message }}</div>@enderror</td>
                </tr>
                <tr>
                    <th scope="row">Image Uploads</th>
                    <td><input type="file" class="form-control-file @error('image') is-invalid @enderror"
                            id="exampleFormControlFile1" name="image[]" multiple>
                        @error('image')<div class="text-danger">{{ $message }}</div>@enderror</td>
                </tr>
            </tbody>
        </table>
    </div>
    </form>
</div>

@endsection
