
        @extends('layouts.master')

        @section('title')
            Tambah Client
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
                    <li class="breadcrumb-item active">Client-tambah</li>
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
                        <h3 class="card-title">Tambah Client</h3>
                      </div>
                      <form action="insertdata" method="POST">
                        @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                          </div>
                        
                          <div class="form-group">
                            <label for="phone">Telepon</label>
                            <input type="text" name="phone" class="form-control" id="phone" required>
                          </div>
                          
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email" required>
                          </div>
                          
                          <div class="form-group">
                            <label for="address">Alamat</label>
                            <input type="text" name="address" class="form-control" id="address" required>
                          </div>
                        </div>
                        <div class="card-footer">
                         
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
        @endsection