@extends('frontend.mywelcome')
@section('title','Introduction')

@section('content')

<div class="container">
    <div class="row justify-content-center mt-2">
        <div class="col-md-4">
            <form action="{{ url("findbrand") }}" method="get">
                <label for="category">Search By Company</label>
                <div class="input-group md-form form-sm form-2 pl-0">
                    <select id="category" class="form-control" name="category">
                        <option selected>Choose Brand</option>
                        @foreach ($cats as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-info"><i class="fas fa-search text-grey"
                                aria-hidden="true"></i></button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-4">
            <form action="{{ url("searchbyname") }}" method="get">
                <label for="category">Search By Brand Name</label>
                <div class="input-group md-form form-sm form-2 pl-0">
                    <select id="single" class="form-control select2-single" aria-hidden="true" name="name">
                        <option selected>Search</option>
                        @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-info"><i class="fas fa-search text-grey"
                                aria-hidden="true"></i></button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-4">
            <form action="{{ url("searchbyprice") }}" method="get">
                <label for="price">Search By Price</label>
                <div class="input-group md-form form-sm form-2 pl-0">
                    <select id="single" class="form-control select2-single" aria-hidden="true" name="price">
                        <option selected>Search</option>
                        <option value="100.200">100 to 200 - lakh</option>
                        <option value="200.300">200 to 300 - lakh</option>
                        <option value="300.400">300 to 400 - lakh</option>
                        <option value="400.500">400 to 500 - lakh</option>
                        <option value="500.600">500 to 600 - lakh</option>
                        <option value="600.700">600 to 700 - lakh</option>
                        <option value="700.800">700 to 800 - lakh</option>
                        <option value="800.900">800 to 900 - lakh</option>
                        <option value="900.1000">900 to 1000 - lakh</option>
                        <option value="1000.10000">1000 above - lakh</option>
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-info"><i class="fas fa-search text-grey"
                                aria-hidden="true"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="row mt-3">
        @foreach($idproducts as $product)
        <div class="col-md-4 mt-3">
            <div class="card">
                <!-- Card image -->

                <a href="{{ url("post/$product->id/show") }}">
                    <img class="card-img-top" src="{{ asset('uploads/car_imgs/'. explode('|',$product->images)[0]) }}"
                        style="width:300;height:180px" alt="Card image cap">
                </a>

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
                    <div class="row justify-content-center mt-2">
                        <a href="{{ url("post/$product->id/show") }}" class="btn btn-sm btn-info"><i
                                class="fas fa-eye mr-2"></i>View Detail</a>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center mt-3">
        {{ $idproducts->links() }}
    </div>
</div>

@endsection
