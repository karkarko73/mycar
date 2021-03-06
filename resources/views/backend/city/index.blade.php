@extends('backend.layouts.master')
@section('title','City')

@section('headercontent')
<div class="container">
        <div class="row justify-content-center">
                <div class="col-md-4">@include('alert')</div>
        </div>
    <nav class="navbar navbar-light justify-content-center">
            <h1>View All Cities</h1>
    </nav>
</div>
@endsection

@section('bodycontent')

<table class="table table-bodered bg-light">
        <thead>
            <tr>
                <td><h4>ID</h4></td>
                <td><h4>City</h4></td>
                <td class="text-center"><h4>Action</h4></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->name }}</td>
                <td class="text-center">
                    <a href="{{ url("admin/city/$data->id/edit") }}" class="btn btn-sm btn-primary mr-3"><i class="fas fa-edit mr-2"></i>Edit City</a>
                    <a href="{{ url("admin/city/$data->id/delete") }}" onclick="return confirm('Warning(Not to delete) : That can effect the products that you post in this city')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt mr-2"></i>Delete City</a>
                </td>
            </tr>
            @endforeach
        </tbody>
  </table>

@endsection
