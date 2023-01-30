@extends('layouts.master')
@section('title')
    Project-Update
@endsection

@section('content')
 <section class="content">
  <div class="container-fluid">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Project Update</h3>
            </div>
            <form action="/update/{{ $project->id }}" method="POST" enctype="multipart/form-data">
              @csrf
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="work_date">Work Date</label>
                        <input type="date" id="work_date" name="work_date" value="{{ $project->work_date }}" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label for="date_end">Date end</label>
                        <input type="date" id="date_end" name="date_end" value="{{ $project->date_end }}" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="{{ $project->name }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" id="location" name="location" value="{{ $project->location }}" class="form-control" required>
                        </div>
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                     
                      <!-- /.form-group -->
                      <div class="form-group">
                        <label for="date_offer" class="form-label">Date Offer</label>
                        <input type="text" id="date_offer" name="date_offer" value="{{ $project->date_offer }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" id="status" name="status" value="{{ $project->status }}" class="form-control" >
                        </div>
                        <div class="form-group">
                        <label for="status_payment" class="form-label">Status Payment</label>
                        <input type="text" id="status_payment" name="status_payment" value="{{ $project->status_payment }}" class="form-control">
                        </div>
                      </div>
                     </div>
                     <div class="card-footer">
                      <button type="submit" class="btn btn-success">Update</button>
                      <button type="reset" class="btn btn-md btn-warning">Reset</button>
                     </div>
              </form>
          </div>
        </div>
      </div>
    </div>

@endsection
