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
                    <form action="/progres-edit/{{ $progress->id }}" method="POST">
                      <div class="card-body">
                        <div class="form-group">
                          <label for="projek">Project</label>
                          <select name="projects[]" id="projects" class="form-control select-multiple" multiple>
            
                            @foreach ($project as $item)
                            <option value="{{ $item->id}}">{{ $item->name}}</option>
                            @endforeach
                            
                        </select>
                        </div>
                        <div class="form-group">
                          <label for="persentase">Persentase</label>
                          <input type="persentase" class="form-control" id="persentase" name="persentase" placeholder="Persentase">
                        </div>
                        <div class="form-group">
                          <label for="date">Date</label>
                          <input type="date" class="form-control" id="date" name="date" placeholder="Persentase">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputFile">File input</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input"name="image" id="exampleInputFile">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                           
                          </div>
                        </div>
                       
                      </div>
                      <!-- /.card-body -->
      
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