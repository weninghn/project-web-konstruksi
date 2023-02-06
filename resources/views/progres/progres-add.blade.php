@extends('layouts.master')
@section('title')
    Progress-Add
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
          <li class="breadcrumb-item active">Progres-add</li>
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
                      <h3 class="card-title">Progress Add</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="progres-add" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <label for="name">Project</label>
                          <select name="project_id" id="project_id" name="project_id"class="form-control " >
                            @foreach ($project as $item)
                            <option value="{{ $item->id}}">{{ $item->name}}</option>
                            @endforeach
                            
                        </select>
                        </div>
                        <div class="form-group">
                          <label for="name">Number</label>
                          <select name="offer_id" id="offer_id" name="offer_id"class="form-control " >
                            @foreach ($offer as $item)
                            <option value="{{ $item->id}}">{{ $item->number}}</option>
                            @endforeach
                            
                        </select>
                        </div>
                        <div class="form-group">
                          <label for="name">Payment</label>
                          <select name="payment_id" id="payment_id" name="payment_id"class="form-control " >
                            @foreach ($payment as $item)
                            <option value="{{ $item->id}}">{{ $item->status}}</option>
                            @endforeach
                            
                        </select>
                        </div>
                        <div class="form-group">
                          <label for="presentase">Persentase</label>
                          <input type="text" class="form-control" id="presentase" name="presentase" placeholder="presentase">
                        </div>
                        <div class="form-group">
                          <label for="job">Job Detail</label>
                          <input type="job_details" class="form-control" id="job_details" name="job_details" placeholder="Job_Details">
                        </div>
                        <div class="form-group">
                          <label for="date">Date Progres</label>
                          <input type="date" class="form-control" id="date" name="date" placeholder="date">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputFile">File input</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="files[]" class="custom-file-input" id="exampleInputFile" multiple>
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                           
                          </div>
                        </div>
                       
                      </div>
                      <!-- /.card-body -->
      
                      <div class="card-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </section>
    </div>
@endsection