<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <title>View Post</title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-light">
            <a class="navbar-brand ml-2">Welcome to our group</a>
            <a href="{{ url("/#about") }}"><button class="btn btn-sm btn-info float-right">Back</button></a>
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

                <div class="mt-3">
                    <table class="table table-striped">

                        <thead>
                            <tr>
                                <td><b>Name</b></td>
                                <td><b>Comment</b></td>
                                <td><b>About</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product->comments as $comment)
                            <tr>
                                <th><strong>{{ $comment->user->name }}</strong></th>
                                <td>
                                    <p>{{ $comment->body }}</p>
                                </td>
                                <td><small>{{ $comment->created_at->diffForHumans() }}</small></td>
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

                <table class="table table-striped">
                    <tbody>
                        <form>
                            @csrf
                            <tr>
                                <td>
                                    <input type="text" name="body" placeholder="Comment"
                                        class="form-control col-md-7 mr-4" />
                                </td>
                                <td>
                                    <input type="submit" onclick="return confirm('Please Register to comment!')"
                                        class="btn btn-sm btn-success" value="Leave Comment" />
                                </td>
                            </tr>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
