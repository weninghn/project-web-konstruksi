@extends('layouts.master')
@section('title')
    Offer Add
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
          <li class="breadcrumb-item active">Offer Add</li>
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
            <form action="offer-add" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group">
                <label for="name">Project</label>
                <select name="project_id" id="project_id" name="project_id"class="form-control " >
    
                    @foreach ($project as $item)
                    <option value="{{ $item->id}}">{{ $item->name}}</option>
                    @endforeach
                    
                </select>
                </div>
                <div class="form-group">
                  <label for="status">Status Project</label>
                  <input type="text" class="form-control" id="status" name="status">
                </div>
                <div class="form-group">
                  <label for="category">Category</label>
                  <input type="text" class="form-control" id="category" name="category" >
                </div>
                <div class="form-group">
                  <label for="date">Date Offer</label>
                  <input type="date" class="form-control" id="date" name="date_offer" >
                </div>
                <div class="form-group">
                  <label for="facility">Facility</label>
                  <input type="text" class="form-control" id="facility" name="facility" >
                </div>
                <div class="form-group">
                  <label for="quantity">Quantity</label>
                  <input type="number" class="form-control" id="quantity" name="quantity" >
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
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