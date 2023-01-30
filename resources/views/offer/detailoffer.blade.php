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

    <h2><b>Penawaran Harga</b></h2>
    <br>
    <br>
    <p>Berikut adalah penawaran harga dan fasilitas yang kami berikan dalam Pembuatan Istana Negara Madyang:</p>

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <!-- <h3 class="card-title">Detail Offer</h3> -->
          <div class="card-body"> 
           
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                      <th>No</th>
                      <th>Category</th>
                      <th>Facility</th>
                      <th>Quantity</th>
                      <th>Total</th>
                  </tr>
                  @foreach ($offer->detail_offers as $item)
                     
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->offer->category }}</td>
                    <td>{{ $item->facility }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->total }}</td>
                </tr>
                @endforeach
            </table>
            </div>
            </div>
            </div>


            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
@endsection