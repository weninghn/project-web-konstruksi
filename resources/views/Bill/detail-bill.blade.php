@extends('layouts.master')
@section('title')
Detail Tagihan
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Tagihan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Detail Tagihan</li>
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
                                    <td style="width:20%">Project</td>
                                    <td>{{ $bill->offer->project->name . ' - ' . $bill->offer->number }}</td>
                                </tr>
                               
                                 <tr>
                                  <td>Jumlah Dibayar</td>
                                  <td>@currency($bill->payments()->latest()->first()->amount_payment)</td>
                                </tr>
                                
                               <tr>
                                  <td>Tanggal Bayar</td>
                                  <td>{{ $bill->payments()->latest()->first()->payment_date}}</td>
                                </tr>
                         
                                <tr>
                                  <td>Bukti Bayar</td>
                                  @if ($bill->payments()->latest()->first()->image)
                                    <td>
                                      <img src="{{ asset($bill->payments()->latest()->first()->image) }}" style="width: 150px; margin-right: 20px" alt="">
                                    </td>
                                  @else
                                      <td>
                                        Tidak Ada Bukti Bayar
                                      </td>
                                  @endif
                              </tr>  

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection