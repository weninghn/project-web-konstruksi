
        @extends('layouts.master')

        @section('title')
            Edit Data Client
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
            <li class="breadcrumb-item active">Payment-add</li>
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
                <h3 class="card-title">Payment</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
    
                  <div class="form-group">
                    <label for="persentase">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}">
                  </div>
                  <div class="form-group">
                    <label for="date">Phone</label>
                    <input type="number" class="form-control" id="phone" name="phone"value="{{ $data->phone }}" >
                  </div>
                  <div class="form-group">
                    <label for="date">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $data->name }} ">
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





            {{-- <h1 class="text-center mb-4">Edit Data</h1>
    <div class="container">

    <div class="row justify-content-center">
        <div class="col-6">
        <div class="card">
            <div class="card-body">
            <form action="/updatedata/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                @csrf 
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" name= "name" class="form-control" id="exampleInputEmail1" 
        aria-describedby="emailHelp" ">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Phone</label>
        <input type="number" name= "phone" class="form-control" id="exampleInputEmail1" 
        aria-describedby="emailHelp" value="{{ $data->phone }}">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Address</label>
        <input type="text" name= "address" class="form-control" id="exampleInputEmail1" 
        aria-describedby="emailHelp"  value="{{ $data->address }}">
    </div>
  </div>
</div>
<div class="col-auto">
      <button type="submit" class="btn btn-md btn-primary">Simpan</button>
      <button type="reset" class="btn btn-md btn-warning">Reset</button>
    </div>
    </form>
            </div>
        </div>
    </div>
    </div>
        </div>
</div>
      --}}