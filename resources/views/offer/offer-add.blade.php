@extends('layouts.master')
@section('title')
    Tambah|penawaran
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
          <li class="breadcrumb-item active">Penawaran-tambah</li>
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
              <h3 class="card-title">Penawaran</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="offer-add" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                <label for="name">Project</label>
                <select name="project_id" id="project_id" name="project_id"class="form-control " >
                  <option value="#"></option>
				  {{-- @if ($pay->status != 0) --}}
				  @foreach ($project as $item)
				  <option value="{{ $item->id}}">{{ $item->name}}</option>
				  @endforeach
				  {{-- @endif --}}

                </select>
                </div>


                {{-- <div class="form-group">
                  <label for="status">Status Project</label>
                  <select name="status" id="status" name="status"class="form-control " >
                    <option value="#"></option>
                    <option value="0">Deal</option>
                    <option value="1">Revisi</option>


                </select>
                </div> --}}
                <div class="form-group">
                  <label for="date">Tanggal Penawaran</label>
                  <input type="date" class="form-control" id="date" name="date_offer" required >
                </div>
                <div class="form-group">
                  <input type="hidden" class="form-control" id="number" name="number" required >
                </div>
				<div class="form-group">
					<label for="file">Upload File*</label>
					{{-- <a href="{{ url('/uploadpage')}}" class="btn-btn-primary">Upload File</a> --}}
					<input type="file" class="form-control" name="file">
				</div>
				{{-- <div class="form-group">
					<label for="dokumen">Dokumen</label>
					<a href="{{ url('/uploadpage')}}">
						<input type="file" class="form-control">
					</a>
				</div> --}}
			  </div>

              <div class="card-footer">
                {{-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">tambah detail
                </button> --}}
                <button type="submit" class="btn btn-success">Save</button>
                <button type="reset" class="btn btn-warning">Reset</button>
				{{-- <button class="btn btn-primary" href="{{ url('/uploadpage') }}">Upload File</button> --}}
				{{-- <a href="{{ url('/uploadpage')}}" class="btn-btn-primary">Upload File</a> --}}
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