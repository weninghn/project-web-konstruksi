@extends('layouts.sidebar');
@extends('layouts.header')
@section('title','User-Add');
@section('content');


<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Tambah User</h3>
    </div>
    <div class="card-body">
        <form action="user-add" method="POST"  enctype="multipart/form-data">
      <!-- Date dd/mm/yyyy -->
      <div class="form-group">
        <label>Name</label>

        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="far fa-user-alt"></i></span>
          </div>
          <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
        </div>
        <!-- /.input group -->
      </div>
      <!-- /.form group -->

      <!-- phone mask -->
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
  <!-- /.card -->
  @endsection