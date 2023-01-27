@extends('layouts.master')
@section('title')
    Edit User
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active">User Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">User Edit</h3>
                            </div>
                            <form action="/updateuser/{{ $user->id }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" class="form-control" id="email" value="{{ $user->email }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" name="phone" class="form-control" id="phone" value="{{ $user->phone }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="addres">Address</label>
                                            <input type="text" name="addres" class="form-control" id="addres" value="{{ $user->addres }}">
                                        </div>
                                        </div>
                                        <div class="card-footer">
                                          <button type="submit" class="btn btn-md btn-primary">Update</button>
                                          <button type="reset" class="btn btn-md btn-warning">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
            </div>
        </div>
    </section>
@endsection