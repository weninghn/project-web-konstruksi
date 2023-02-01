@extends('layouts.master')
@section('title')
    detail Add
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
          <li class="breadcrumb-item active">detail Add</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="content-wrapper">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Offer</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="detail-add" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" class="form-control" id="category" name="category" >
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity </label>
                    <input type="quantity" class="form-control" id="quantity" name="quantity " >
                </div>
                <div class="form-group">
                    <label for="total">Total Price</label>
                    <input type="text" class="form-control" id="total" name="total" >
                </div>
                <div class="form-group">
                    <label for="nama">Facility</label>
                    <input type="text" class="form-control" id="nama" name="nama[]" >
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity </label>
                    <input type="quantity" class="form-control" id="quantity" name="quantity[]" >
                </div>
                <div class="form-group">
                    <label for="price">Price </label>
                    <input type="price" class="form-control" id="price" name="price[]" >
                </div>
   <!-- /.card-body -->

   <div class="card-footer">
    {{-- <a href="add-category" class="btn btn-primary">add category</a>
    <a href="add-facilitas" class="btn btn-danger">add facilities</a> --}}
    <button type="submit" class="btn btn-success">Save</button>
    <button type="reset" class="btn btn-warning">Reset</button>
  </div>
</form>
</div>
</div>
</div>
</div>
</section>
</div>
@endsection