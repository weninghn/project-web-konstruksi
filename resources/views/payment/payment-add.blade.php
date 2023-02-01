@extends('layouts.master')
@section('title')
    Payment Add
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
          <li class="breadcrumb-item active">Payment-add</li>
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
              <h3 class="card-title">Payment</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="payment-add" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Project</label>
                  <select name="project_id" id="project_id" class="form-control " >
    
                    @foreach ($project as $item)
                    <option value="{{ $item->id}}">{{ $item->name}}</option>
                    @endforeach
                    
                </select>
                </div>
                <div class="form-group">
                  <label for="amount">Payment Amount</label>
                  <input type="text" class="form-control" id="amount" name="amount_payment">
                </div>
                <div class="form-group">
                  <label for="date">Date Payment</label>
                  <input type="date" class="form-control" id="date" name="payment_date" >
                </div>
                <div class="form-group">
                  <label for="payment">Payment Method</label>
                  <select name="payment_method_id" id="payment_method_id" class="form-control " >
    
                    @foreach ($payments as $item)
                    <option value="{{ $item->id}}">{{ $item->method}}</option>
                    @endforeach
                    
                </select>
                </div>
                <div class="form-group">
                  <label for="payment">Payment To</label>
                  <input type="text" class="form-control" id="payment" name="payment_to" >
                </div>
                <div class="form-group">
                  <label for="note">Notes</label>
                <textarea name="note" id="note" class="form-control" cols="20" rows="4"></textarea>
                </div>
                <div class="form-group">
                  <label for="status">Status Payment</label>
                  <input type="text" class="form-control" id="status" name="status" >

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