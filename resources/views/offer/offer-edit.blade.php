
        @extends('layouts.master')

@section('title')
    Edit Data Offer
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
    <li class="breadcrumb-item active">Offer-edit</li>
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
        <h3 class="card-title">Offer Edit</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="/edit-offer/{{ $offer->id }}" method="POST" enctype="multipart/form-data">
       @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="category">Category</label>
            <input type="text" class="form-control" id="category" name="category" value="{{ $offer->category }}">
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" id="status" name="status"value="{{ $offer->status }}" >
          </div>
          <div class="form-group">
            <label for="name">Project</label>
            <input type="project_id" class="form-control" id="project_id" name="project_id" value="{{ $data->project_id }} ">
            @foreach ($project as $item)
                    <option value="{{ $item->id}}">{{ $item->name}}</option>
                    @endforeach
            <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date"value="{{ $offer->date_offer }}" >
          </div> 
          </div> 
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-success">Submit</button>
          
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</section>
</div>
@endsection
