@extends('layouts.master')

@section('title')
  Tambah User
@endsection
@section('content');
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
          <li class="breadcrumb-item active">User</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">User Tambah</h3>
            </div>
            <form action="/insertuser" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Nama</label>
                  <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" name="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                  <label for="email">Password</label>
                  <input type="text" name="password" class="form-control" id="password">
                </div>
                <div class="form-group">
                  <label for="phone">Telepon</label>
                  <input type="text" name="phone" class="form-control" id="phone">
                </div>
                <div class="form-group">
                  <label for="addres">Alamat</label>
                  <input type="text" name="addres" class="form-control" id="addres">
                </div>
                <div class="form-group">
                  <label for="role_id">Level</label>
                    <select name="role_id" id="role_id" name="role_id" class="form-control">
                      @foreach ($roles as $item)
                      <option value="{{ $item->id}}">{{ $item->name}}</option>
                      @endforeach
                    </select>
                </div>
              </div>
              </div>
            </div>
              <div class="card-footer">
                {{-- <a href="/edituser/{{ $user->id }}" class="btn btn-md btn-info">Edit</button> --}}
                 <button class="btn btn-success" type="submit">Save</button>
                <button type="reset" class="btn btn-md btn-warning">Reset</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
 </section>
{{-- <h1 class="text-center">Tambah Data User</h1>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-6">
      <div class="card">
        <div class="card-body">
          <form action="/insertuser" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" name="name" class="form-control" id="name">
              <div class="form-text" id="name"></div>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" name="email" class="form-control" id="email">
              <div class="form-text" id="email"></div>
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone</label>
              <input type="text" name="phone" class="form-control" id="phone">
              <div class="form-text" id="phone"></div>
            </div>
            <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <input type="text" name="address" class="form-control" id="address">
              <div class="form-text" id="address"></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div> --}}

{{-- 
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add User</h3>
    </div>
    <div class="card-body">
        <form action="user-add('{{ route('user.store') }}')" method="POST"  enctype="multipart/form-data">
          @csrf
      <!-- Date dd/mm/yyyy -->
      <div class="form-group">
        <label>Name</label>

        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="far fa-user-alt"></i></span>
          </div>
          <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
        </div>
     
      </div>
    
      <div class="form-group">
        <label>Phone:</label>

        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-phone"></i></span>
          </div>
          <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
        </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
        <label>Email:</label>

        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-email"></i></span>
          </div>
          <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
        </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
        <label>Address:</label>

        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-home"></i></span>
          </div>
          <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
        </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
        <label>Role:</label>

        <div class="input-group">
          
          <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
        </div>
        <!-- /.input group -->
      </div>
      <!-- /.form group -->

      <!-- IP mask -->
      <div class="form-group">
        <a href="submit" class="btn btn -primary">Add</a>
      </div>
      <!-- /.form group -->

    </div>
    <!-- /.card-body -->
  </div>
</form>
  <!-- /.card --> --}}
  @endsection