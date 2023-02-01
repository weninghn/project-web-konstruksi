@extends('layouts.master')
@section('title')
    Payment Update
@endsection

@section('content') 
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
            <form  action="/payment-update/{{ $payment->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  {{-- <label for="name">Project</label>
                  <select name="project_id" id="project_id" class="form-control " >
    
                    @foreach ($project as $item)
                    <option value="{{ $item->id}}">{{ $item->name}}</option>
                    @endforeach
                    
                </select>
                </div> --}}
                <div class="form-group">
                  <label for="amount">Amount</label>
                  <input type="text" class="form-control" id="amount" value="{{ $payment->amount_payment }}" name="amount_payment" >
                </div>
                <div class="form-group">
                  <label for="date">Date Payment</label>
                  <input type="date" class="form-control" id="date" value="{{ $payment->payment_date }}" name="payment_date" >
                </div>
                <div class="form-group">
                  <label for="payment">Payment Method</label>
                  <select name="payment_method_id" id="payment_method_id" class="form-control " >
    
                    @foreach ($payment as $item)
                    <option value="{{ $item->id}}">{{ $item->method}}</option>
                    @endforeach
                    
                </select>
                </div>
                <div class="form-group">
                  <label for="payment_to">Payment To</label>
                  <input type="text" class="form-control" id="payment_to" value="{{ $payment->payment_to }}" name="payment_to" >
                </div>
                <div class="form-group">
                  <label for="status">Status Payment</label>
                  <input type="text" class="form-control" id="status" value="{{ $payment->status }}" name="payment_to" >
                </div>
                <div class="form-group">
                  <label for="note">Notes</label>
                <textarea name="note" id="note" class="form-control" cols="20" rows="4" value="{{ $payment->note }}"></textarea>
                </div>
                
               
              </div>
  
                </div>
                
               
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="reset" class="btn btn-md btn-warning">Reset</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>
</div>
@endsection