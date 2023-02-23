@extends('layouts.master')
@section('title')
    Pembayaran
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
            <li class="breadcrumb-item active">Pembayaran</li>
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
            <h3 class="card-title">Pembayaran</h3>
              <div class="row justify-content-end">
                @if (auth()->user()->name=="admin")
            <a href="add-payment" class="btn btn-success">Tambah</a>
            @endif
            </div>
            <div class="my-3 col-12 col-sm-8 col-md-3">
              <form action="" method="GET">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" id="inputPassword6" name="search">
                  <button class="input-group-text btn btn-primary"><i class="fas fa-search"></i></button>
                </div>
              </form>
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
                    <th>Jumlah Bayar</th>
                    <th>Tanggal Bayar</th>
                    <th>Status</th>
                    {{-- <th>Status Pembayaran</th> --}}
                    <th>Catatan</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                 @foreach ($payment as $item)


                  <tr>
                    <td>{{ $loop->iteration }}</td>
                   <td>{{ $item->bill->offer->project->name . ' - ' . $item->bill->offer->number }}</td>
                   {{-- <td>@currency($item->amount_payment)</td> --}}
				   <td>{{ 'Rp. '. format_uang($item->amount_payment) }}</td>
                   <td>{{ $item->payment_date }}</td>
                   <td>{{ $item->bill->status_text}}</td>
                   <td>{{ $item->note }}</td>
                    <td>
                      @if (auth()->user()->name=="admin")
                      <a href="{{ route('payment.edit', $item->id) }}">Edit</button> |
                      <a href="/paymentdelete/{{ $item->id }}" data-name="{{ $item->name }}">Delete</a> |
                      @endif
                      <a href="{{ route('payment.detail', $item->id) }}">Detail</button>
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