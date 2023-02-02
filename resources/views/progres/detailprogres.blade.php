@extends('layouts.master')
@section('title')
Detail Progres
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Progres</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Detail Progres</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    

    <!-- Main content -->
    <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h4></h4>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-striped table-bordered">
                            
                                <tr>
                                    <td style="width:20%">Project</td>
                                    <td>{{ $progres->project->name}}</td>
                                </tr>
                                <tr>
                                  <td>presentase</td>
                                  <td>{{ $progres->presentase }}</td>
                                </tr>
                                <tr>
                                  <td>Date </td>
                                  <td>{{ $progres->date}}</td>
                                </tr>
                          
                                <tr>
                                    <td>Job Details</td>
                                    <td>{{ $progres->job_details}}</td>
                                </tr>
                               
                                <tr>
                                    <td>Gambar</td>
                                    <td>
                                      @foreach ($progres->pictures as $picture)
                                      <img src="{{ asset('uploads/progres/'.$picture->image) }}" style="width: 150px; margin-right: 20px">
                                      @endforeach
                                    </td>
                                </tr>
                               
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>








    {{-- <h2><b>Penawaran Harga</b></h2>
   
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <!-- <h3 class="card-title">Detail Offer</h3> -->
          <div class="card-body"> 
           
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                      <th>No</th>
                      <th>Job Detail</th>
                      <th>PIcture</th>
                  </tr>
                  @foreach ($progres as $item)
                     
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->job_details }}</td>
                    <td>
                      @foreach ($item->pictures as $picture)
                        <img src="{{asset('uploads/progres/'.$picture->image) }}" alt="" width="170px">
                        @endforeach
                      </td>
                </tr>
                @endforeach
            </table>
            </div>
            </div>
            </div>


            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div> --}}
@endsection