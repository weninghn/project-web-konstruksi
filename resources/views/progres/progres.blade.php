@extends('layouts.master')
@section('title')
Progress
@endsection
    
    @section('content')  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
              <li class="breadcrumb-item active">Client</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="container-wrapper">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <h3 class="card-title">Data User</h3>
                <div class="row justify-content-end">
                  <a href="#" class="btn btn-primary"> PDF </a>
                  <a href="add-progres" class="btn btn-success"> + Add </a>
                 </div>
              </div>
              <div class="row g-3 align-items-center mt-2">
              <!-- .card-header -->
              <div class="card-body"> 
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                      <th>Project</th>
                      <th>Persentase</th>
                      <th>Job Detail</th>
                      <th>Date</th>
                      <th>Picture</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($progress as $row)
                    <tr>
                      <th scope="row">{{ $no++ }}</th>
                      <td>{{ $row->project }}</td>
                      <td>{{ $row->persentase }}</td>
                      <td>{{ $row->job_detail }}</td>
                      <td>{{ $row->detail }}</td>
                      <td>{{ $row->picture}}</td>
                      <td>
                      <a href="/edit-data/{{ $row->id }}" class="btn btn-info">Edit</button>
                      <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-name="{{ $row->name }}">Delete</button>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

   
@endsection