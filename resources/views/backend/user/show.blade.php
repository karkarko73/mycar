@extends('backend.layouts.master')
@section('title','Product')

@section('headercontent')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">@include('alert')</div>
    </div>
    <nav class="navbar navbar-light justify-content-between">
        <h1>View Product</h1>
        <a href="{{ url("user/product") }}"><button class="btn btn-sm btn-info"><i
                    class="fas fa-arrow-circle-left mr-2"></i>Back</button></a>
    </nav>
</div>

@endsection

@section('bodycontent')

<div class="container">
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

            <div class="mt-3">
                <table class="table table-striped">

                    <thead>
                        <form method="post" action="{{ url('user/comment/store') }}">
                            @csrf
                            <tr>
                                <td colspan="2">
                                    <input type="text" name="body" placeholder="Comment" class="form-control" />
                                    <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                </td>
                                <td>
                                    <input type="submit" class="btn btn-sm btn-success" value="Leave Comment" />
                                </td>
                            </tr>
                        </form>
                        <tr>
                            <td><b>Name</b></td>
                            <td><b>Comment</b></td>
                            <td><b>Action</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product->comments as $comment)
                        <tr>
                            <th><strong>{{ $comment->user->name }}</strong>
                                <span
                                    class="badge badge-pill badge-success"><small>{{ $comment->created_at->diffForHumans() }}</small></span>
                            </th>
                            <td>
                                <p>{{ $comment->body }}</p>
                            </td>
                            <td>
                                <a href="{{ url("user/deletecomment/$comment->id") }}" class="btn btn-sm btn-danger"><i
                                        class="fas fa-trash-alt mr-2"></i>Delete</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>

        <div class="col-md-7">
            <table class="table table-striped">
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
                        <th scope="row">Company</th>
                        <td>{{ $product->category->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Model</th>
                        <td>{{ $product->model_year }}</td>
                    </tr>
                    <tr>
                        <th scope="row">License</th>
                        <td>{{ $product->license }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Division</th>
                        <td>{{ $product->city->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Description</th>
                        <td>{{ $product->description }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Seller</th>
                        <td>{{ $product->user->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Contact</th>
                        <td>{{ $product->user->phone }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Created at</th>
                        <td><small>{{ $product->created_at->diffForHumans() }}</small></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
