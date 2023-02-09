@extends('layouts.master')
@section('title')
    Progres-Edit
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
          <li class="breadcrumb-item active">Progres-Edit</li>
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
                      <h3 class="card-title">Progress Edit</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/update/{{ $progress->slug }}" method="POST" enctype="multipart/form-data">
                      @csrf
                @method('PUT')
                      <div class="card-body">
                
                        <div class="form-group">
                          <label for="persentase">Persentase</label>
                          <input type="persentase" class="form-control" id="persentase" name="persentase" placeholder="Persentase" value="{{ $progress->presentase }}">
                        </div>
                        <div class="form-group">
                          <label for="date">Tanggal Progres</label>
                          <input type="date" class="form-control" id="date" name="date" placeholder="Persentase" value="{{ $progress->date}}">
                        </div>
                        <div class="form-group">
                          <label for="job detail">Detail Pekerjaan</label>
                          <input type="text" class="form-control" id="job_details" name="job_details" placeholder="Job Detail" value="{{ $progress->job_details}}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputFile">File input</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="files[]" class="custom-file-input" id="exampleInputFile" multiple>
                              <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                            </div>
                      
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="Gambar">Gambar</label>
                          <div class="row">
                            
                              @foreach ($progress->pictures as $picture)
                              <div class="col-md-3">
                                <a href="{{ url("picture-destroy/".$picture->id) }}" class="btn btn-sm btn-danger float-right"><i class="fas fa-times"></i></a>
                                <img src="{{ asset('uploads/progres/'.$picture->image) }}" class="w-100">
                              </div>
                              @endforeach
                            
                          </div>
                        </div>
                       
                      </div>
                      <!-- /.card-body -->
      
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                      
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </section>
    </div>
@endsection