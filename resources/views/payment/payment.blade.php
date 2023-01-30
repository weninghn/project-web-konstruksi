@extends('layouts.master')
@section('title')
    Payment
@endsection

@section('content')  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item active">Payment</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
    <div class="container-wrapper">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            <h3 class="card-title">Payment</h3>
              <div class="row justify-content-end">
            <a href="add-payment" class="btn btn-success">Add</a>
            </div>
            </div>
            <div class="row g-3 align-items-center mt-2">
            <!-- .card-header -->
            <div class="card-body"> 
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                    <th>Project</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Payment To</th>
                    <th>Status</th>
                    <th>Notes</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 
                 @foreach ($payment as $item)
                     
              
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                   <td>{{ $item->project->name }}</td>
                   <td>{{ $item->amount_payment }}</td>
                   <td>{{ $item->payment_date }}</td>
                   <td>{{ $item->payment_to }}</td>
                   <td>{{ $item->status }}</td>
                   <td>{{ $item->note }}</td>


                    <td>
                      <a href="/payment-edit/{{ $item->id }}">Edit</button> |                              
                      <a href="/paymentdelete/{{ $item->id }}" data-name="{{ $item->name }}">Delete</a> 
                      </td>
                  </tr>
                  @endforeach
                </tbody>
              

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

 
@endsection