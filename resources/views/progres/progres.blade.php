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
                  @if (auth()->user()->name=="admin")
                  <a href="add-progres" class="btn btn-success">Add Progres</a>
                  @endif
                 </div>
                 <div class="my-3 col-12 col-sm-8 col-md-3">
                  <form action="" method="GET">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" id="inputPassword6" name="search">
                      <button class="input-group-text btn btn-primary">Search</button>
                    </div>
                  </form>
                 </div>
              </div>
              <div class="row g-3 align-items-center mt-2">
              <!-- .card-header -->
              <div class="card-body"> 
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>No Offer</th>
                      <th>Project</th>
                      <th>Payment</th>
                      <th>Persentase</th>
                      <th>Job Detail</th>
                      <th>Date Progres</th>
                      <th>Action</th>
                  </tr>
                  @php
                  $no = 1;
                  @endphp
                  @foreach($progress as $index => $item)
                    <tr>
                    <td>{{ $index + $progress->firstItem() }}</td>
                    <td>{{ $item->offer->number }}</td>
                    <td>{{ $item->project->name }}</td>
                    <td>{{ $item->project?->payments()->latest()->first()?->status_text ?? '-' }}</td>
                    {{-- <td>{{ $item->payment->status}}</td> --}}
                    <td>{{ $item->presentase }}</td>
                    <td>{{ $item->job_details }}</td>
                    <td>{{ $item->date }}</td>
                    {{-- <td>
                      @foreach ($item->pictures as $picture)
                        <img src="{{asset('uploads/progres/'.$picture->image) }}" alt="" width="170px">
                        @endforeach
                      </td> --}}
                      <td>
                        @if (auth()->user()->name=="admin")
                        <a href="/progres-edit/{{ $item->slug }}">Edit</a>  |
                        <a href="/progresdelete/{{ $item->id }}" data-name="{{ $item->name }}">Delete</a>    |
                        @endif
                        <a href="/detailprogres/{{$item->id}}">Detail</button>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <div class="my-3">
                  {{$progress->links()}}
                </div>
                {{-- {{$progress->links()}} --}}
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