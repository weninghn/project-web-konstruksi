@extends('layouts.master')
@section('title')
    Offer Add
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
          <li class="breadcrumb-item active">Offer Add</li>
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
              <h3 class="card-title">Offer</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="offer-add" method="POST">
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
                  <label for="status">Status Project</label>
                  <select name="status" id="status" name="status"class="form-control " >
                    <option value="#"></option>
                    <option value="0">Deal</option>
                    <option value="1">Revisi</option>

                    {{-- @foreach ($status as $item)
                    <option value="{{ $item->id}}">{{ $item->name}}</option>
                    @endforeach --}}
                    
                </select>
                </div>
                <div class="form-group">
                  <label for="date">Date Offer</label>
                  <input type="date" class="form-control" id="date" name="date_offer" >
                </div>
                <div class="form-group">
                 
                  <input type="hidden" class="form-control" id="number" name="number" >
                </div>
              
              <div class="card-footer">
                {{-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">tambah detail
                </button> --}}
                <button type="submit" class="btn btn-success">Save</button>
                <button type="reset" class="btn btn-warning">Reset</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
</section>
</div>
@endsection