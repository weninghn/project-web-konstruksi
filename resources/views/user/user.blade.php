@extends('layouts.master')

@section('title')
  Data User
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
              <li class="breadcrumb-item active">User</li>
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
              <h3 class="card-title">Data User</h3>
                <div class="row justify-content-end">
              <a href="/adduser" class="btn btn-success">Add User</a>
              </div>
              </div>
              <div class="row g-3 align-items-center mt-2">
              <!-- .card-header -->
              <div class="card-body"> 
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Aksi</th>
                  </tr>
                  @php
                    $no = 1;
                  @endphp
                  @foreach ($user as $users)
                      <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <th>{{ $users->name }}</th>
                        <th>{{ $users->email }}</th>
                        <th>{{ $users->phone }}</th>
                        <th>{{ $users->address }}</th>
                        <td>
                          <a href="/edituser/{{ $users->id }}" class="btn btn-info">Edit</a>
                          <a href="#" class="btn btn-danger delete" data-id="{{ $users->id }}" data-name="{{ $users->name }}">Delete</a>
                        </td>
                      </tr>
                  @endforeach
                  {{-- </thead>
                  <tbody>
                    <tr>
                      <td>01</td>
                      <td>wening</td>
                      <td>weningnhn@gmail.com</td>
                      <td>085711859746</td>
                      <td>surakarta</td>
                      <td>
                        <a href="#" class="btn btn-info">Edit</button>
                        <a href="#" class="btn btn-danger delete" data-id="">Delete</button>
                        </td>
                    </tr>
                  </tbody> --}}
                  {{-- @foreach($data as $row)
                  <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->phone }}</td>
                    <td>{{ $row->address }}</td> --}}
                    {{-- <td>
                    <a href="#" class="btn btn-info">Edit</button>
                    <a href="#" class="btn btn-danger delete" data-id="">Delete</button>
                    </td> --}}
                  {{-- </tr>
                  @endforeach --}}
                </table>
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