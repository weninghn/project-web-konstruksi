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
                  <label for="amount">Jumlah Pembayaran</label>
                  <input type="text" class="form-control" id="amount" value="{{ $payment->amount_payment }}" name="amount_payment" >
                </div>
                <div class="form-group">
                  <label for="date">Tanggal Pembayaran</label>
                  <input type="date" class="form-control" id="date" value="{{ $payment->payment_date }}" name="payment_date" >
                </div>
                <div class="form-group">
                  <label for="payment">Cara Bayar</label>
                  <select name="payment_method_id" id="payment_method_id" class="form-control " >

                    @foreach ($method as $item)
                    <option value="{{ $item->id}}">{{ $item->method}}</option>
                    @endforeach

                  </select>
                </div>
                <div class="form-group">
                  <label for="payment">Pembayaran Ke </label>
                  <select name="payment_to" id="payment_to" class="form-control " >
                    <option value="1">1</option>
                    <option value="2">2</option>
                  </select>
                </div>
                  <div class="form-group">
                    <label for="status">Status pembayaran</label>
                    <select name="status" id="status" class="form-control " >
                      <option value="0">Belum Lunas</option>
                      <option value="1">Lunas</option>
                    </select>
                  </div>

                <div class="form-group">
                  <label for="note">Catatan</label>
                  <input type="textarea" name="note" id="note" class="form-control" cols="20" rows="4" value="{{ $payment->note }}">
                  {{-- <textarea name="note" id="note" class="form-control" cols="20" rows="4" value="{{ $payment->note }}"></textarea> --}}
                </div>
              </div>
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