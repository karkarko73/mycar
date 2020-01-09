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
    <title>Search Post</title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-light">
                <a href="{{ url("/") }}"><button class="btn btn-sm btn-info float-right">Home</button></a>
            <a href="{{ url()->previous() }}"><button class="btn btn-sm btn-info float-right">Back</button></a>
        </nav>

        <div class="row">

            <div class="col-md-9">
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-md-6 mt-3">
                        <div class="card">
                            <!-- Card image -->

                            <a href="{{ url("showsinglebrand/$product->id") }}"><img class="card-img-top"
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
                                    <a href="{{ url("showsinglebrand/$product->id") }}"
                                        class="btn btn-sm btn-primary"><i class="fas fa-eye mr-2"></i>View Detail</a>
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
                            <a href="{{ url("showsinglebrand/$product->id") }}">{{ $product->name }} -
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
                            <a href="{{ url("show/city/brand/$city->id") }}">{{ $city->name }}</a>
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
                            <a href="{{ url("findbrand/$cat->id") }}">{{ $cat->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

</body>


<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
