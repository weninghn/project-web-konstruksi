@extends('layouts.master')
@section('title')
Progress
@endsection
    @section('content')


    <section class="content">
        <div class="container-fluid">
            <div class="content-wrapper">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Progress</h3>
                  <div class="row justify-content-end">
                      <a href="add-progres" class="btn btn-primary">Add</a>
                  </div>
                </div>
                <!-- /.card-header -->
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
                        @foreach ($progress as $item)
                            
                        <tr>
                            <th>{{ $loop->iteration}}</th>
                            <td>{{ $item->projects}}</td>
                            <td>{{ $item->persentase}}</td>
                            <td>{{ $item->job_detail}}</td>
                            <td>{{ $item->date}}</td>
                            <td>
                                @foreach ($item->pictures as $picture)
                                    {{ $picture ->id}}<br>
                                @endforeach    
                            </td>
                            <td>
                        
                                <a href="/progres-edit/{{$id}}">Edit</a>
                               
                                <a href="/progres-destroy/{{$item->slug}}" class="delete" data-confirm="Are you sure to delete this item?">Delete</a>
                                
                             </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
    </section>
   
@endsection