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
                  <input type="text" class="form-control" id="amount" name="amount_payment" required>
                </div>
                <div class="form-group">
                  <label for="date">Date Payment</label>
                  <input type="date" class="form-control" id="date" name="payment_date"  required>
                </div>
                <div class="form-group">
                  <label for="payment">Payment Method</label>
                  <select name="payment_method_id" id="payment_method_id" class="form-control " required>
                   
                      @foreach ($payments as $item)
                        <option value="{{ $item->id}}">{{ $item->method}}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="payment">Payment To</label>
                  <select name="payment_to" id="payment_to" class="form-control " >
                    <option value="#"></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="status">Status Payment</label>
                  <select name="status" id="status" class="form-control " required>
                    <option value="0">Belum Lunas</option>
                    <option value="1">Lunas</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="note">Notes</label>
                  <textarea name="note" id="note" class="form-control" cols="20" rows="4" required></textarea>
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