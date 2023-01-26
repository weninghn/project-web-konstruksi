
        @extends('layouts.master')

        @section('title')
            Client Add
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
                    <li class="breadcrumb-item active">Client</li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>
          
          <section class="content">
            <div class="container-fluid">
              <div class="content-wrapper">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card card-success">
                      <div class="card-header">
                        <h3 class="card-title">Client Add</h3>
                      </div>
                      <form action="insertdata" method="POST">
                        @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name">
                          </div>
                        
                          <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" id="phone">
                          </div>
                          
                          <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address">
                          </div>
                        </div>
                        <div class="card-footer">
                           <a href="/edituser/{{ $user->id }}" class="btn btn-md btn-info">Edit</button> --}}
                           <button class="btn btn-success" type="submit">Save</button>
                          <button type="reset" class="btn btn-md btn-warning">Reset</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           </section>
        {{-- <h1 class="text-center mb-4">Tambah Data</h1>
        <div class="container">
    
        <div class="row justify-content-center">
            <div class="col-6">
            <div class="card">
                <div class="card-body">
                <form action="/insertdata" method="POST" enctype="multipart/form-data">
                    @csrf 
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" name= "name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text"></div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Phone</label>
            <input type="number" name= "phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text"></div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Address</label>
            <input type="text" name= "address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text"></div>
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
    </div> --}}
          
        @endsection