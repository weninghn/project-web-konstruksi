@extends('layouts.master')

@section('title','User')


    @section('content')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Users</h3>
  
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row justify-content-end">
          <a href="#" class="btn btn-primary mb-4 me-3 ">Add</a>

        </div>
       
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
          <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $user->name}}</td>
            <td>{{ $user->email}}</td>
            <td>{ { $user->phone}}</td>
            <td>{{ $user->address}}</td>
            <td>
              {{-- <a href="#" class="btn btn-warning">Update</a> --}}
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" >Update</button>
              <a href="#" class="btn btn-danger" data-confirm="Are you sure to delete this item?">Delete</a>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>

    <!--MOdal-->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="user-update('{{ route('produk.update') }}')" method="POST">
              @csrf
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Name:</label>
                <input type="text" class="form-control" id="recipient-name" name="name">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Email:</label>
                <input type="text" class="form-control" id="recipient-name" name="email">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Password:</label>
                <input type="text" class="form-control" id="recipient-name" name="password">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Phone:</label>
                <input type="text" class="form-control" id="recipient-name" name="phone">
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Address:</label>
                <textarea class="form-control" id="message-text" name="address"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
      </div>
    </div>

    @endsection