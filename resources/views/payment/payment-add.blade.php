@extends('layouts.master')
@section('title')
    Pembayaran Tambah
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
          <li class="breadcrumb-item active">Pembayaran-Tambah</li>
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
              <h3 class="card-title">Pembayaran</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="payment-add" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Tagihan Project</label>
                  <select name="bill_id" id="bill_id" class="form-control " >

                    @foreach ($bills as $item)
                       <option value="{{ $item->id}}">{{ $item->project->name . ' - ' . $item->number}}</option>
                    @endforeach

                </select>
                </div>
                <div class="form-group">
                  <label for="amount">Jumlah Pembayaran</label>
                  <input type="text" class="form-control" id="amount" name="amount_payment" required>
                </div>
                <div class="form-group">
                  <label for="date">Tanggal Pembayaran</label>
                  <input type="date" class="form-control" id="date" name="payment_date"  required>
                </div>
                <div class="form-group">
                  <label for="payment">Cara Bayar</label>
                  <select name="payment_method_id" id="payment_method_id" class="form-control " required>
                      @foreach ($payments as $item)
                        <option value="{{ $item->id}}">{{ $item->method}}</option>
                      @endforeach
                  </select>

                </div>
                {{-- <div class="form-group">
                  <label for="payment">Pembayaran Ke </label>
                  <select name="payment_to" id="payment_to" class="form-control " >
                    <option value="#"></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                  </select>
                </div> --}}
                <div class="form-group">
                  <label for="status">Status Pembayaran</label>
                  <select name="status" id="status" class="form-control " required>
                    <option value="0">Belum Lunas</option>
                    <option value="1">Lunas</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="note">Catatan</label>
				  {{-- <input type="text" name="note" id="note" class="firm-control" required> --}}
                  <textarea name="note" id="note" class="form-control" cols="20" rows="4" required></textarea>
                </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Save</button>
                  <button type="reset" class="btn btn-warning">Reset</button>
                </div>
              </div>
              <!-- /.card-body -->


            </form>
          </div>
        </div>
      </div>
    </div>
</section>
</div>
@endsection