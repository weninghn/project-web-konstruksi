@extends('layouts.master')
@section('title')
    Project-Tambah
@endsection

@section('content')
 <section class="content">
  <div class="container-fluid">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Project Tambah</h3>
            </div>
            <form class="js-validation-material" action= "{{ route('project.add')}}" method="POST" enctype="multipart/form-data">
              @csrf
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Client</label>
                        <select class="form-control" id="client_id" name="client_id" required>
                          <option value="">--Pilih--</option>
                          @foreach($client as $data)
                          <option value="{{$data->id}}">{{$data->name}}</option>
                          @endforeach
                      </select>
                      </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                        <label for="work_date">Tanggal Pengerjaan</label>
                        <input type="date" class="form-control" id="work_date" name="work_date">
                      </div>
                      <div class="form-group">
                        <label for="date_end">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="date_end" name="date_end" >
                      </div>
                      <div class="form-group">
                        <label for="location">Lokasi</label>
                        <input type="text" class="form-control" id="location" name="location" placeholder="Lokasi">
                      </div>
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                     
                      <!-- /.form-group -->
                      <div class="form-group">
                        <label for="name">Nama Project</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="nama" required>
                      </div>
                      <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Harga" required>
                      </div>
                      
                       <div class="form-group">
                          <label for="date_offer">Tanggal Penawaran</label>
                          <input type="date" class="form-control" id="date_offer" name="date_offer" placeholder="Tanggal Penawaran" required>
                        </div>
                        
                      </div>
                     
                     </div>
                     <div class="card-footer">
                      <button type="submit" class="btn btn-success">Save</button>
                      <button type="reset" class="btn btn-md btn-warning">Reset</button>
                     </div>
              </form>
          </div>
        </div>
      </div>
    </div>



@endsection