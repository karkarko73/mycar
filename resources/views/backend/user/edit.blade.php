@extends('backend.layouts.master')
@section('title','Edit User')

@section('headercontent')
@include('alert')
<div class="container">
    <nav class="navbar navbar-light justify-content-center">
            <h1>Edit Users</h1>
    </nav>
</div>
@endsection

@section('bodycontent')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ url("admin/user/$data->id/edit") }}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" name="email" id="staticEmail" value="{{ $data->email }}">
                        </div>
                </div>

                <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="username" name="name" value="{{ $data->name }}">
                        </div>
                </div>

                <div class="form-group row">
                        <label for="contact" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="contact" name="phone" value="{{ $data->phone }}">
                        </div>
                </div>

                <div class="form-group row">
                        <label for="roleuser" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <select id="roleuser" class="form-control @error('city_id') is-invalid @enderror" name="role">
                                    <option>Choose...</option>
                                    @foreach ($datas as $item)
                                        <option @if($data->role ==  $item->role) selected
                                                @endif>{{ $item->role }}</option>
                                    @endforeach
                            </select>
                        </div>
                        @error('city_id')<div class="text-danger">{{ $message }}</div>@enderror
                </div>

                <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Old Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword" name="old_password" placeholder="Password">
                        </div>
                </div>

                <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="inputPassword" name="new_password" placeholder="Password">
                        </div>
                </div>




                <div class="form-group row">
                    <div class="form-group">
                            <label>Profile</label>
                            <input type="file" class="form-control-file" name="image">
                    </div>
                </div>

                <a href="{{ url('admin/user') }}" class="btn btn-primary" >Back</a>
                <button type="submit" class="btn btn-success float-right">Submit</button>
              </form>
        </div>
    </div>
</div>




{{-- <td class="text-center">
    <a href="{{ url("admin/user/$data->id/edit") }}" class="btn btn-primary mr-3"><i class="fas fa-edit">Edit User</i></a>
    <a href="{{ url("admin/user/$data->id/delete") }}" onclick="return confirm('Warning(Not to delete) : That can effect the products that you post in this city')" class="btn btn-danger"><i class="fas fa-trash-alt">Delete User</i></a>
</td> --}}


@endsection
