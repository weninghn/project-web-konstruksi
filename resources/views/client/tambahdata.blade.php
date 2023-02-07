
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
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email">
                          </div>
                          
                          <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address">
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