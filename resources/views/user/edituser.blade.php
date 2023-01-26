@extends('layouts.master')
@section('title')
    Edit User
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">User Edit</h3>
                        </div>
                        <form>
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
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control" id="address" value="{{ $user->address }}">
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
    </section>
@endsection