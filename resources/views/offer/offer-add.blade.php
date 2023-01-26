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
              <div class="card-body">
                <div class="form-group">
                  <label for="projek">Project</label>
                  <select name="projects[]" id="projects" class="form-control " >
    
                    @foreach ($project as $item)
                    <option value="{{ $item->id}}">{{ $item->name}}</option>
                    @endforeach
                    
                </select>
                </div>
                <div class="form-group">
                  <label for="status">Status</label>
                  <input type="text" class="form-control" id="persentase" name="status">
                </div>
                <div class="form-group">
                  <label for="date">Category</label>
                  <input type="text" class="form-control" id="category" name="category" >
                </div>
                <div class="form-group">
                  <label for="date">Payment To</label>
                  <input type="text" class="form-control" id="date" name="payment_to" >
                </div>
                <div class="form-group">
                  <label for="date">Notes</label>
                <textarea name="notes" id="notes" class="form-control" cols="20" rows="4"></textarea>
                </div>
                
               
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-success">Submit</button>
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