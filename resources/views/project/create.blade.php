@extends('layouts.master')
@section('title')
    Project-Add
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
                      <h3 class="card-title">Project Add</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="js-validation-material" action= "{{ route('project.add')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                    <form>
                      <div class="card-body">
                        <div class="form-group">
                          <label for="name">Client</label>
                          <select class="form-select" id="client_id" name="client_id" required>
                            <option value="">--Pilih--</option>
                            @foreach($client as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                          <label for="work_date">work_date</label>
                          <input type="date" class="form-control" id="work_date" name="work_date" placeholder="work_date">
                        </div>
                        <div class="form-group">
                          <label for="date_end">date end</label>
                          <input type="date" class="form-control" id="date_end" name="date_end" placeholder="date_end">
                        </div>
                        <div class="form-group">
                          <label for="name">name</label>
                          <input type="text" class="form-control" id="name" name="name" placeholder="name">
                        </div>
                        <div class="form-group">
                          <label for="location">location</label>
                          <input type="text" class="form-control" id="location" name="location" placeholder="location">
                        </div>
                        <div class="form-group">
                            <label for="date_offer">date_offer</label>
                            <input type="date" class="form-control" id="date_offer" name="date_offer" placeholder="date_offer">
                        </div>                        
                        <div class="form-group">
                          <label for="status">status</label>
                          <input type="text" class="form-control" id="status" name="status" placeholder="status">
                        </div>
                        <div class="form-group">
                          <label for="status_payment">status_payment</label>
                          <input type="text" class="form-control" id="status_payment" name="status_payment" placeholder="status_payment">
                        </div>
                       
                           
                          </div>
                        </div>
                       
                      </div>
                      <!-- /.card-body -->
      
                      <div class="card-footer">
                        <center class="m-20">
                            <button type="submit" id="btn-send" class="btn btn-primary" style="border: 0.5rem">Simpan</button>
                            <a href="{{route('project')}}" id="btn-back" class="btn btn-danger" style="border-radius:0.5rem">Kembali</a>
                           </center>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </section>
    </div>
@endsection