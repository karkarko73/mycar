@extends('backend.layouts.master')
@section('title','User')

@section('headercontent')
@include('alert')
<div class="container">
    <nav class="navbar navbar-light justify-content-center">
            <h1>View All Users</h1>
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
            @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td><img src="{{ asset("uploads/user_imgs/".$data->image) }}" class="img-circle elevation-2" width="50" height="40"></td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->phone }}</td>

                <td class="text-center">
                    <a href="{{ url("admin/user/$data->id/edit") }}" class="btn btn-primary mr-3"><i class="fas fa-edit">Edit User</i></a>
                    <a href="{{ url("admin/user/$data->id/delete") }}" onclick="return confirm('Warning(Not to delete) : That can effect the products that you post in this city')" class="btn btn-danger"><i class="fas fa-trash-alt">Delete User</i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
  </table>

@endsection
