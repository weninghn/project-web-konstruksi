@extends('layouts.master')

@section('title')
  Data User
@endsection

    @section('content')
    @if (session('success'))
    <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
      <h4><i class="icon fa fa-check"></i>Alert!</h4>
      {{ session('success')}}  
    </div>        
    @endif
    <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <button onclick="addUser('{{route('user.store')}}')" class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle">Tambah User</i></button>
          </div>
          <div class="box-body table-responsive">
            <table class="table">
              <thead>
                <th width="5%">NO</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Aksi</th>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
    </div>

    @includeIf('user.add')
    @endsection

    @push('scripts')
        <script>
          let table;

          $(function())
          {
            table = $('.table').DataTable({
              processing: true;
              autoWidth: false;
              serverSide: true;
              responsive: true;
              ajax:
              {
                url: '{{ route('user.data') }}',
              },
              columns:
              [
                {data: 'DT_RowIndex', searchable: false},
                {data: 'name'},
                {data: 'email'},
                {data: 'password'}
              ]
            })
          }
        </script>
    @endpush

        {{-- <h3 class="card-title">Users</h3>
  
      </div>

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

              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" >Update</button>
              <a href="#" class="btn btn-danger" data-confirm="Are you sure to delete this item?">Delete</a>
            </td>
          </tr>
          </tbody>
        </table>
      </div>

    </div>



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
    </div> --}}
