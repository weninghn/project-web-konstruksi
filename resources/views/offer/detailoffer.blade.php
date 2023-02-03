@extends('layouts.master')
@section('title')
Detail Offer
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Offer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Detail Offer</li>
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
                                          <td>{{ $offer->project->name}}</td>
{{-- =======
                                          <td style="width:20%">Category</td>
                                          <td>{{ $offer->facilitys->category}}</td> --}}
                                      </tr>
                                      <tr>
                                          <td>Date Offer</td>
                                          <td>{{ $offer->date_offer }}</td>
                                      </tr>
                                      <tr>
                                          <td>Status</td>
                                          <td>{{ $offer->status}}</td>
                                      </tr>
                                  </table>
                                
                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-category">Add Category</button>
                                  <table class="table table-sm table-striped">
                                    {{-- @foreach($offer->detail_offers as $category)
                                    <tr>
                                      <td>Category</td>
                                      <td>{{ $category->category }}</td>
                                    </tr>
                                    @endforeach --}}
                                    @forelse($offer->detail_offers as $category)
                                    <tr>
                                      <td>{{ $loop->iteration }}</td>
                                      <td>{{ $category->category }}
                                      <button type="button" id="{{ $category->id }}" class="btn btn-primary modal-add-facility" data-toggle="modal" data-target="#modal-add-facility"  style="float: right;">Add Facility</button>
                                      </td>
                                      <td>
                                        <table class="table">
                                          <tr>
                                         <th>Facility</th>   
                                         <th>Quantity</th>   
                                         <th>Price</th>   
                                         <th></th>
                                       </tr>   
                                          @forelse ($category->facilities as $facility)
                                          <tr>
                                            <td>{{ $facility->nama }}</td>
                                            <td>{{ $facility->quantity }}</td>
                                            <td>{{ $facility->price }}</td>
                                            <td>
                                              <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                            </td>
                                          </tr>
                                          @empty                                              
                                          <tr>
                                            <td rowspan="4">Tidak ada Facility</td>
                                          </tr>
                                          @endforelse
                                        </table>
                                      </td>
                                    </tr>
                                    @empty
                                    <tr>
                                      <td>Tidak ada category</td>
                                    </tr>
                                    @endforelse
                                  </table>
                                </div>

                                 
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
          </div>
      </div>
      <div class="modal fade" id="modal-add-category">
        <form class="js-validation-material" action= "{{ route('offer.insertcategory')}}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Category</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" value="{{ $offer->id }}" name="offer_id">
              <div class="form-group">
                <label for="category">Category</label>
                <input type="text" class="form-control" id="category" name="category" >
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Save</button>

              {{-- <button type="" class="btn btn-primary">Save</button> --}}
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
        </form>
      </div>
      <div class="modal fade" id="modal-add-facility">
      <form class="js-validation-material" action= "{{ route('offer.insertfacility')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add  Facilty</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            {{-- <div class="facility">
              <div class="m-20">
                  <a href="#" class="addfacility btn btn-primary" style="float: right;">Add facility</a> 
              </div> 
            </div> --}}
            <div class="modal-body">
              <input type="hidden" id="detail_offer_id" name="detail_offer_id">
            <div class="form-group">
              <label for="nama">Facility</label>
              <input type="text" class="form-control" id="nama" name="nama" >
            </div>
            <div class="form-group">
              <label for="quantity">Quantity </label>
              <input type="number" class="form-control" id="quantity" name="quantity" >
            </div>
            <div class="form-group">
              <label for="price">Price </label>
              <input type="price" class="form-control" id="price" name="price" >
            </div>
            <div class="modal-footer justify-content-between">
              <button type="simpan" class="btn btn-success">Save</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </form>
      </div>
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
              <script type="text/javascript">
              $('.modal-add-facility').on('click', function(){
                $('#detail_offer_id').val(this.id);
              });
              $('.addfacility').on('click', function(){
              addfacility();
              });
              function addfacility(){
              var facility = '<div><div class="modal-body"><label for="nama">Facility</label><input type="text" class="form-control" id="nama" name="nama" > </div><div class="form-group"></div><div class="modal-body"><label for="quantity">Quantity </label><input type="number" class="form-control" id="quantity" name="quantity" > </div></div><div class="form-group"><div class="modal-body"><label for="price">Price </label> <input type="price" class="form-control" id="price" name="price" ></div> </div></div>'
               $('.facility').append(facility);
              };
              </script>
             <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
@endsection