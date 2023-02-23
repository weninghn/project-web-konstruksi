@extends('layouts.master')
@section('title')
Penawaran
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
              <li class="breadcrumb-item active">Penawaran</li>
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
              <h3 class="card-title">Penawaran</h3>
                <div class="row justify-content-end ">
                  @if (auth()->user()->name=="admin")
                  <a href="add-offer" class="btn btn-success">Tambah</a>
                  @endif
                 </div>
                 <div class="my-3 col-12 col-sm-8 col-md-3">
                  <form action="" method="GET">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" id="inputPassword6" name="search">
                      <button class="input-group-text btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                  </form>
                 </div>
                 <div class="mt-5">
                  @if (session('message'))
                      <div class="alert {{session('alert-class')}}">
                          {{ session('message') }}
                      </div>
                  @endif
              </div>
              </div>
              <div class="row g-3 align-items-center mt-2">
              <!-- .card-header -->
              <div class="card-body"> 
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>No Penawaran</th>
                    <th>Project</th>
                    <th>Status Project</th>
                    <th>Tanggal Penawaran</th>
                    <th>Action</th>
                  </tr>
                  @php
                  $no = 1;
                  @endphp
                    @foreach($offer as $row)
                    <tr>
                      <th scope="row">{{ $no++ }}</th>
                      <td>{{ $row->number }}</td>
                      <td>{{ $row->project?->name }}</td>
                      <td>{{ $row->status_text }}</td>
                      <td>{{ $row->date_offer }}</td>
                      <td>
                      @if (auth()->user()->name=="admin")
                          <a href="/editoffer/{{ $row->id }}">Edit</button>  | 
                        <a href="deleteoffer/{{ $row->id }}" data-name="{{ $row->name }}">Delete</button>    |
                      @endif
                        <a href="{{ route('offer.detail', $row->id) }}">Detail</button>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                
                </table>
              </div>
              {{-- {{$offer->likes()}} --}}
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