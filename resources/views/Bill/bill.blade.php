@extends('layouts.master')
@section('title')
Tagihan
@endsection
    {{-- @section('content')

    </section> --}}
    @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
              <li class="breadcrumb-item active">Tagihan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="container-wrapper">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <h3 class="card-title">Tagihan</h3>
                <div class="row justify-content-end">
                  <br>
                  @if (auth()->user()->name=="admin")
              {{-- <a href="{{route('project.create')}}" class="btn btn-success">Tambah</a> --}}
              @endif
              </div>
              {{-- <div class="my-3 col-12 col-sm-8 col-md-3">
                <form action="" method="GET">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" id="inputPassword6" name="search">
                    <button class="input-group-text btn btn-primary">Search</button>
                  </div>
                </form>
               </div>
              </div> --}}
              <div class="row g-3 align-items-center mt-2">
              <!-- .card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                        <tr>
                          {{-- <th>No</th> --}}
                          <th>Tagihan</th>
                          <th>Harga</th>
                          <th>Status</th>
                          {{-- <th>Status</th>
                          <th>Status Payment</th> --}}
                          @if (auth()->user()->name=="admin")
                          {{-- <th>Action</th> --}}
                          @endif
                        </tr>
                        </thead>
                        <tbody>
                              @php
                              $no=1;
                              @endphp
                              @foreach($emp as $index)
                              <tr>
                                <td>{{ $index->offer->project->name . ' - ' . $index->offer->number }}</td>
                                  <td>
									@currency($index->total)
                                      {{-- @currency{{ $index->total }} --}}
                                  </td>
                                  <td>
                                      {{ $index->status_text}}
                                  </td>
                                @if (auth()->user()->name=="admin")

                                  @endif
                    </tr>
                  </tbody>
                 @endforeach
                </table>
                {{-- {{ $pro->links() }} --}}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

</body>
</html>
@endsection