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
                  <input type="text" class="form-control" id="status" name="status">
                </div>
                <div class="form-group">
                  <label for="date">Date Offer</label>
                  <input type="date" class="form-control" id="date" name="date_offer" >
                </div>
                <div class="form-group">
                  <label for="number">Number</label>
                  <input type="text" class="form-control" id="number" name="number" >
                </div>
                {{-- <div class="float-right">
                  <button id="add-category" class="btn btn-primary">Add Category</button>
                </div>
                <table class="table table-striped">
                  <tr>
                    <td>
                      <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" class="form-control" id="category" name="category[]" >
                      </div>
                    </td>
                    <td>
                      <div class="float-right">
                        <button id="add-facility" class="btn btn-sm btn-primary">Add Facility</button>
                      </div>
                      <table class="table table-sm table-striped">
                        <tr>
                          <th>Facility</th>
                          <th>Quantity</th>
                          <th>Price</th>
                        </tr>
                        <tr>
                          <td>
                              <input type="text" class="form-control" name="facility[]" >
                          </td>
                          <td>
                              <input type="text" class="form-control" name="quantity[]" >
                          </td>
                          <td>
                              <input type="text" class="form-control" name="price[]" >
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" class="form-control" id="category" name="category[]" >
                      </div>
                    </td>
                    <td>
                      <div class="float-right">
                        <button id="add-facility" class="btn btn-sm btn-primary">Add Facility</button>
                      </div>
                      <table class="table table-sm table-striped">
                        <tr>
                          <th>Facility</th>
                          <th>Quantity</th>
                          <th>Price</th>
                        </tr>
                        <tr>
                          <td>
                              <input type="text" class="form-control" name="facility[]" >
                          </td>
                          <td>
                              <input type="text" class="form-control" name="quantity[]" >
                          </td>
                          <td>
                              <input type="text" class="form-control" name="price[]" >
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
                <div class="card-body">
                 
                  <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Default Modal</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="category">
                            <div class="m-20">
                                <a href="#" class="addcategory btn btn-primary" style="float: right;">add category</a> 
                            </div>
                            </div> 
                            <div class="form-group">
                              <label for="category">Category</label>
                              <input type="text" class="form-control" id="category" name="category[]" >
                            </div>
                            
                           
                            <div class="form-group">
                              <label for="nama">Facility</label>
                              <input type="text" class="form-control" id="nama" name="nama[]" >
                            </div>
                            <div class="form-group">
                              <label for="quantity">Quantity </label>
                              <input type="number" class="form-control" id="quantity" name="quantity[]" >
                            </div>
                            <div class="form-group">
                              <label for="price">Price </label>
                              <input type="price" class="form-control" id="price" name="price[]" >
                            </div> 
                           <div class="detail">
                               <div class="m-20">
                                  <a href="#" class="adddetail btn btn-primary" style="float: right;">Add Detail</a> 
                              </div>
                            </div>
                                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
                                  <script type="text/javascript">
                                          $('.adddetail').on('click', function(){
                                              adddetail();
                                          });
                                          function adddetail(){
                                              var detail = '<div><div class="form-group"><label for="nama">Facility</label><input type="text" class="form-control" id="nama" name="nama[]" ></div><div class="form-group"><label for="quantity">Quantity </label><input type="number" class="form-control" id="quantity" name="quantity[]" ></div><div class="form-group"><label for="price">Price </label><input type="price" class="form-control" id="price" name="price[]" > </div></div>'
                                              $('.detail').append(detail);
                                          };
                                          $('.addcategory').on('click', function(){
                                            addcategory();
                                          });
                                          function addcategory(){
                                          var category = '<div><div class="detail"><div class="form-group"><label for="category">Category</label><input type="text" class="form-control" id="category" name="category[]" ></div><div class="form-group"><label for="nama">Facility</label><input type="text" class="form-control" id="nama" name="nama[]" > </div><div class="form-group"> <label for="quantity">Quantity </label><input type="number" class="form-control" id="quantity" name="quantity[]" ></div><div class="form-group"><label for="price">Price </label> <input type="price" class="form-control" id="price" name="price[]" >]</div></div>'
                                          $('.category').append(category); 
                                          }
                                        </script>
                                  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> --}}
                        {{-- </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                
              <!-- /.card-body -->
              --}}
              
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