@extends('layouts.master')
@section('title')
Project
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
              <li class="breadcrumb-item active">Project</li>
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
              <h3 class="card-title">Project</h3>
                <div class="row justify-content-end">
                  <br>
                  @if (auth()->user()->name=="admin")
              <a href="{{route('project.create')}}" class="btn btn-success">Tambah</a>
              @endif
              </div>
              <div class="my-3 col-12 col-sm-8 col-md-3">
                <form action="" method="GET">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" id="inputPassword6" name="search">
                    <button class="input-group-text btn btn-primary"><i class="fas fa-search"></i></button>
                  </div>
                </form>
               </div>
              </div>
              <div class="row g-3 align-items-center mt-2">
              <!-- .card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                        <tr>
                          <th>No</th>
                          <th>Client</th>
                          <th>Tanggal Pengerjaan</th>
                          <th>Tanggal Selesai</th>
                          <th>Nama Project</th>
                          <th>Lokasi</th>
                          <th>Tanggal Penawaran</th>
                          <th>Harga</th>
                          <th>Status Project</th>
                          {{-- <th>Status</th>
                          <th>Status Payment</th> --}}
                          @if (auth()->user()->name=="admin")
                          <th>Action</th>
                          @endif
                        </tr>
                        </thead>
                        <tbody>
                             
                              @foreach($pro as $index => $project)
                              <tr>
                                  <td >{{$loop ->iteration}} </td>
                                  <td>
                                      {{ $project->client?->name }}
                                  </td>
                                  <td>
                                      {{ $project->work_date }}
                                  </td>
                                  <td>
                                      {{ $project->date_end }}
                                  </td>
                                  <td>
                                      {{ $project->name }}
                                  </td>
                                  <td>
                                      {{ $project->location }}
                                  </td>
                                  <td>
                                      {{ $project->offer()->first()?->date_offer ?? '-' }}
                                  </td>
                                  <td>
                                    Rp.{{ $project->price }}
                                </td>
                                <td>
                                  {{ $project->offer()->latest()->first()?->status_text ?? '-' }}
                                </td>
                                @if (auth()->user()->name=="admin")
                                  <td>
                                  <a href="/edit/{{ $project->id }}">Edit</button> |
                                  <a href="/delete/{{ $project->slug }}" data-name="{{ $project->name }}">Delete</a>
                                  </td>
                                  @endif
                    </tr>
                  </tbody>
                 @endforeach
                </table>
                {{ $pro->links() }}
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