@extends('layouts.master')
@section('title')
Detail Pembayaran
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Pembayaran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Detail Pembayaran</li>
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
                                    <td>{{ $payment->bill->offer->project->name}}</td>
                                </tr>
                                <tr>
                                    <td style="width:20%">Harga Project</td>
                                    <td>@currency($payment->bill->offer->project->price)</td>
                                </tr>
                                {{-- <tr>
                                  <td>Cara Pembayaran</td>
                                  <td>{{ $payment->method->method}}</td>
                                </tr> --}}
                                <tr>
                                  <td>Jumlah Dibayar</td>
                                  <td>@currency($payment->amount_payment)</td>
                                </tr>
                                <tr>
                                  <td>Pembayaran ke</td>
                                  <td>{{ $payment->payment_to}}</td>
                                </tr>
                                <tr>
                                  <td>Tanggal Bayar</td>
                                  <td>{{ $payment->payment_date}}</td>
                                </tr>
                                {{-- <tr>
                                    <td>Status</td>
                                    <td>{{ $payment->status_text}}</td>
                                </tr> --}}
                                <tr>
                                    <td>Catatan</td>
                                    <td>{{ $payment->note}}</td>
                                </tr>
                            
                                <tr>
                                  <td>Bukti Bayar</td>
                                  @if ($payment->image)
                                    <td>
                                      <img src="{{ asset($payment->image) }}" style="width: 150px; margin-right: 20px" alt="">
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