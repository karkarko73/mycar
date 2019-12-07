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
                <div class="row justify-content-center mt-3">
                    <div class="col-md-6">

                        <div class="card">
                                    <!-- Card image -->
                                <!--Carousel Wrapper-->

                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

                                        <ol class="carousel-indicators">
                                         @foreach(explode('|',$product->images) as $image)
                                         {{-- {{ dd($image) }} --}}
                                            <li data-target="#carouselExampleControls" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}">
                                                <img src="{{ asset("/uploads/car_imgs/$image") }}" width="100">
                                            </li>
                                         @endforeach
                                        </ol>

                                        <div class="carousel-inner" role="listbox">
                                          @foreach(explode('|',$product->images) as $image)
                                             <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                 <img class="d-block img-fluid" src="{{ asset("/uploads/car_imgs/$image") }}">
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

                                <div class="card-body">
                                    <h1 class="card-title">{{ $product->name }}</h1><br><br>

                                    <p class="card-text">Price    - {{ $product->price }} lkhs</p>
                                    <p class="card-text">Company  - {{ $product->category->name }}</p>
                                    <p class="card-text">Model    - {{ $product->model_year }}</p>
                                    <p class="card-text">Division - {{ $product->city->name }}</p>
                                    <p class="card-text">Desctiption - {{ $product->description }}</p>
                                    <p class="card-text">Seller   - {{ $product->user->name }}</p>
                                    <p class="card-text">Contact - {{ $product->user->phone }}</p>
                                    <i class="text-muted">Created-at - {{ $product->created_at->diffForHumans() }}</i><br>

                                    <hr>
                                    <h4 class="text text-center">Add comment</h4>
                                    <form>
                                        @csrf
                                        <div class="form-group">
                                            <div class="row">
                                                <input type="text" name="body" class="form-control col-md-8 mr-4" />
                                                <input type="submit" onclick="return confirm('Please Register to comment!')" class="btn btn-secondary" value="Add Comment"/>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="card-footer">
                                        <div class="row float-right">
                                            <a href="{{ url("/#about") }}" class="btn btn-info"><i class="fas fa-arrow-circle-left mr-2"></i>Back</a>
                                        </div>
                                </div>

                            </div>
                    </div>
                </div>
            </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
