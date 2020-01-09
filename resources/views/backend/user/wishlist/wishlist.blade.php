@extends('backend.layouts.master')
@section('title','Wishlist Products')

@section('headercontent')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">@include('alert')</div>
    </div>
    <nav class="navbar navbar-light justify-content-center">
        <h1>My Wishlist Products</h1>
    </nav>
</div>
@endsection

@section('bodycontent')

<div class="container">
    <div class="row">
        @foreach($results as $result)
        @for($i=0;$i<count($result->products);$i++)

            <div class="col-md-4 mt-3">
                <div class="card">
                    <!-- Card image -->
                    <a href="{{ url("user/mywishlist/".$result->products[$i]->id."/show") }}"><img class="card-img-top"
                            src="{{ asset('uploads/car_imgs/'. explode('|',$result->products[$i]->images)[0]) }}"
                            style="width:300;height:180px" alt="Card image cap">
                    </a>

                    <!-- Card content -->
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">Brand</th>
                                    <td><b>{{ $result->products[$i]->name }}</b></td>
                                </tr>
                                <tr>
                                    <th scope="row">price</th>
                                    <td>{{ $result->products[$i]->price }}-lkhs</td>
                                </tr>
                                <tr>
                                    <th scope="row">Content</th>
                                    <td>{{ $result->products[$i]->user->phone }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Created at</th>
                                    <td><small>{{ $result->products[$i]->created_at->diffForHumans() }}</small></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">

                        <div class="row justify-content-between">
                            <a href="{{ url("user/mywishlist/".$result->products[$i]->id."/show") }}"
                                class="btn btn-sm btn-primary"><i class="fas fa-eye mr-2"></i>View Detail</a>
                            <a href="{{ url("user/mywishlist/".$result->products[$i]->id."/delete") }}"
                                class="btn btn-sm btn-danger"><i class="fas fa-trash-alt mr-2"></i>Remove from
                                wishlist</a>
                        </div>
                    </div>
                </div>
            </div>

            @endfor
            @endforeach
    </div>
    {{-- <div class="row">
        {{ $products->links() }}
</div> --}}
</div>

@endsection
