@extends('backend.layouts.master')
@section('title','City')

@section('headercontent')
@include('alert')
<div class="container">
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
                    <a href="{{ url("admin/city/$data->id/edit") }}" class="btn btn-primary mr-3"><i class="fas fa-edit">Edit City</i></a>
                    <a href="{{ url("admin/city/$data->id/delete") }}" onclick="return confirm('Warning(Not to delete) : That can effect the products that you post in this city')" class="btn btn-danger"><i class="fas fa-trash-alt">Delete City</i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
  </table>

@endsection
