@extends('backend.layouts.master')
@section('title','User profile')

@section('headercontent')
<div class="container">
        <div class="row justify-content-center">
                <div class="col-md-4">@include('alert')</div>
        </div>
    <nav class="navbar navbar-light justify-content-center">
            <h1>Profile</h1>
    </nav>
</div>
@endsection

@section('bodycontent')

<table class="table table-bodered bg-light">
        <thead>
            <tr>
                <td><h4>ID</h4></td>
                <td></td>
                <td><h4>Name</h4></td>
                <td><h4>Email</h4></td>
                <td><h4>Phone</h4></td>
                <td class="text-center"><h4>Action</h4></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $data->id }}</td>
                <td><img src="{{ asset("uploads/user_imgs/".$data->image) }}" class="img-circle elevation-2" width="50" height="40"></td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->phone }}</td>

                <td class="text-center">
                    <a href="{{ url("user/personalaccount/$data->id/edit") }}" class="btn btn-sm btn-primary mr-3"><i class="fas fa-edit mr-2"></i>Edit User</a>
                    <a href="{{ url("user/personalaccount/$data->id/delete") }}" onclick="return confirm('Warning(Not to delete) : That can effect the products that you post with you!')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt mr-2"></i>Delete User</a>
                </td>
            </tr>
        </tbody>
  </table>

@endsection
