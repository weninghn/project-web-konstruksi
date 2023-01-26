@extends('layouts.master')
@section('title')
    Project-Add
@endsection

@section('content')
 <section class="content">
  <div class="container-fluid">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Project Add</h3>
            </div>
            <form class="js-validation-material" action= "{{ route('project.add')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <form action="">
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
                        <label for="work_date">Work Date</label>
                        <input type="date" class="form-control" id="work_date" name="work_date">
                      </div>
                      <div class="form-group">
                        <label for="date_end">Finish Date</label>
                        <input type="date" class="form-control" id="date_end" name="date_end" >
                      </div>
                      <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" id="location" name="location" placeholder="location">
                      </div>
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                     
                      <!-- /.form-group -->
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="name">
                      </div>
                      <div class="form-group">
                        <label for="status">Status</label>
                         <input type="text" class="form-control" id="status" name="status" placeholder="status">
                       </div>
                      <div class="form-group">
                        <label for="status_payment">Status payment</label>
                        <input type="text" class="form-control" id="status_payment" name="status_payment" placeholder="Status payment">
                      </div>
                       <div class="form-group">
                          <label for="date_offer">Date Offer</label>
                          <input type="date" class="form-control" id="date_offer" name="date_offer" placeholder="date_offer">
                        </div>
                        
                      </div>
                     
                     </div>
                     <div class="card-footer">
                      <button type="submit" class="btn btn-success">Save</button>
                     </div>
              </form>
          </div>
        </div>
      </div>
    </div>



@endsection