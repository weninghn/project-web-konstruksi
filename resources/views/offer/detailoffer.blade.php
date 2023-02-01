@extends('layouts.master')
@section('title')
Detail Offer
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Offer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Detail Offer</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
          
      
          <!-- Main content -->
          <section class="content">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="box box-success">
                              <div class="box-header with-border">
                                  <h4></h4>
                              </div>
                              <!-- /.box-header -->
                              <div class="box-body">
                                  <table class="table table-striped table-bordered">
                                  
                                      <tr>
                                          <td style="width:20%">Category</td>
                                          <td>{{ $offer->name}}</td>
                                      </tr>
                                      <tr>
                                          <td>Facility</td>
                                          <td>{{ $offer->facility}}</td>
                                      </tr>
                                      <tr>
                                          <td>Quantity</td>
                                          <td>{{ $offer->qty}}</td>
                                      </tr>
                                      <tr>
                                          <td>presentase</td>
                                          <td>{{ $offer->total }}</td>
                                      </tr>
                                      
                
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
          </div>
      </div>
@endsection