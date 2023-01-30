@extends('layouts.master')
@section('title')
Project
@endsection
    {{-- @section('content')

    </section> --}}
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
              <li class="breadcrumb-item active">Project</li>
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
              <h3 class="card-title">Project</h3>
                <div class="row justify-content-end">
              <a href="{{route('project.create')}}" class="btn btn-success">Add Project</a>
              </div>
              </div>
              <div class="row g-3 align-items-center mt-2">
              <!-- .card-header -->
              <div class="card-body"> 
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                        <tr>
                          <th>No</th>
                          <th>Client</th>
                          <th>Work Date</th>
                          <th>Date End</th>
                          <th>Name Project</th>
                          <th>Location</th>
                          <th>Date offer</th>
                          {{-- <th>Status</th>
                          <th>Status Payment</th> --}}
                          <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                              @php
                              $no=1; 
                              @endphp
                              @foreach($pro as $project)
                              <tr>
                                  <td scope="project">{{$no++}} </td>
                                  <td>
                                      {{ $project->client?->name }}
                                  </td>
                                  <td>
                                      {{ $project->work_date }}
                                  </td>
                                  <td>
                                      {{ $project->date_end }}
                                  </td>
                                  <td>
                                      {{ $project->name }}
                                  </td>
                                  <td>
                                      {{ $project->location }}
                                  </td>
                                  <td>
                                      {{ $project->date_offer }}
                                  </td>
                                  {{-- <td>
                                    {{-- {{ $loop->iteration }} --}}
                                      {{-- {{ $project->status }} --}}
                                  {{-- </td> --}}
                                  {{-- <td>
                                      {{ $project->status_payment }}
                                  </td>--}}
                                  <td>
                                  <a href="/edit/{{ $project->id }}">Edit</button> | 
                                  <a href="/delete/{{ $project->id }}" data-name="{{ $project->name }}">Delete</a>
                                  </td>
                    </tr>
                  </tbody>
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
  
</body>
</html>
@endsection