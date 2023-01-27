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
                    <form action="progres-add" method="POST">
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
                          <label for="persentase">Persentase</label>
                          <input type="persentase" class="form-control" id="persentase" name="persentase" placeholder="persentase">
                        </div>
                        <div class="form-group">
                          <label for="job">Job Detail</label>
                          <input type="job_details" class="form-control" id="job_details" name="job_details" placeholder="job_details">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputFile">File input</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="" class="custom-file-input" id="exampleInputFile">
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