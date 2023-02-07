@extends('layouts.master')

@section('title')
  Data Client
@endsection

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
              <li class="breadcrumb-item active">Client</li>
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
              <h3 class="card-title">Data Client</h3>
                <div class="row justify-content-end">
                  <a href="/cetak-form" class="btn btn-primary"><i class="fa fa-file-excel-o"></i>Cetak Client</a>
                  {{-- <a href="client-deleted" class="btn btn-secondary me-3">View Deleted</a> --}}
                  @if (auth()->user()->name=="admin")
              <a href="/tambahdata" class="btn btn-success">Add Client</a>
              <a href="client-deleted" class="btn btn-secondary me-3">View Deleted</a>
              @endif
              </div>
              <div class="my-3 col-12 col-sm-8 col-md-3">
                <form action="" method="GET">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" id="inputPassword6" name="search">
                    <button class="input-group-text btn btn-primary">Search</button>
                  </div>
                </form>
               </div>
              {{-- <div class="box-header with-border">
                <button onclick="updatePeriode()" class="btn btn-info btn-xs btn-flat"><i class="fa fa-plus-circle"></i> Ubah Periode</button>
                <a href="{{ route('laporan.export_pdf', [$tanggalAwal, $tanggalAkhir]) }}" target="_blank" class="btn btn-success btn-xs btn-flat"><i class="fa fa-file-excel-o"></i> Export PDF</a>
            </div> --}}
              </div>
              <div class="row g-3 align-items-center mt-2">
              <!-- .card-header -->
              <div class="card-body"> 
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    @if (auth()->user()->name=="admin")
                    <th>Action</th>
                    @endif
                  </tr>
                  @php
                  $no = 1;
                  @endphp
                  @foreach($data as $index => $row)
                  <tr>
                    <th scope="row">{{ $index + $data->firstItem() }}</th>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->phone }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->address }}</td>
                    @if (auth()->user()->name=="admin")
                    <td>
                    <a href="/tampilkandata/{{ $row->slug }}">Edit</button>  | 
                    <a href="/client-delete/{{$row->slug}}" data-name="{{ $row->name }}" class="delete" data-confirm="Are you sure to delete this item?">Delete</a>
                   
                    <!-- <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-name="{{ $row->name }}">Delete</button> -->
                    </td>
                    @endif
                  </tr>
                  @endforeach
                </table>
                {{ $data->links() }}
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
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>

      @endsection