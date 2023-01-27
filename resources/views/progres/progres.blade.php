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
              <li class="breadcrumb-item active">Progres</li>
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
              <h3 class="card-title">Progress</h3>
                <div class="row justify-content-end">
                  <a href="add-progres" class="btn btn-success">Add Progres</a>
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
                  @php
                  $no = 1;
                  @endphp
                  @foreach($progress as $item)
                    <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $item->project }}</td>
                    <td>{{ $item->presentase }}</td>
                    <td>{{ $item->job_detail }}</td>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->picture }}</td>
                      <td>
                        <a href="/progres-edit">Edit</a>
                        <a href="/progres-destroy" class="delete" data-confirm="Are you sure to delete this item?">Delete</a>
                        </td>
                    </tr>
                    @endforeach
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