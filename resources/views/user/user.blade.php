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
                  <br>
                  @if (auth()->user()->name=="admin")
                  <a href="/adduser" class="btn btn-success">Tambah</a>
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
               </div>
              <div class="row g-3 align-items-center mt-2">
                <div class="mt-5">
                  @if (session('message'))
                      <div class="alert {{session('alert-class')}}">
                          {{ session('message') }}
                      </div>
                  @endif
              </div>
              <!-- .card-header -->
              <div class="card-body"> 
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>User</th>
                    @if (auth()->user()->name=="admin")
                    <th>Action</th>
                    @endif
                  </tr>
                  @php
                    $no = 1;
                  @endphp
                  @foreach ($user as $index => $users)
                      <tr>
                        <td scope="users">{{ $index + $user->firstItem() }}</td>
                        <td>{{ $users->name }}</td>
                        <td>{{ $users->email }}</td>
                        <td>{{ $users->phone }}</td>
                        <td>{{ $users->addres }}</td>
                        <td>{{ $users->role?->name }}</td>
                        @if (auth()->user()->name=="admin")
                        <td>
                          <a href="/edituser/{{ $users->id }}">Edit</a>  | 
                          <a href="/deleteuser/{{ $users->id }}" data-name="{{ $users->name }}">Delete</a>
                        </td>
                        @endif
                      </tr>
                  @endforeach
                  
                </table>
                {{ $user->links() }}
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="text/javascript">
    function deleteData(id)
    {
      event.prefentDefault();
      var url = "{{ route('deleteuser', ':id') }}";
      console.log(url);
      swal.fire({
        type: 'warning',
        title: 'Hapus Data',
        text: 'Apakah anda yakin menghapus data?',
        showCancelButton: true,
        confirmButtonColor: '$f5084a',
        cancelCuttonColor: '$42b6b3'
      }).then(function (result) {
        if (result.dismiss) return
          $.ajax({
            headers:{
              @csrf
            },
            url: url.replace(':id', id),
            type: 'DELETE'
          })
      })
    }
    $(document).ajaxStop(function(){
      window.location.reload();
    });
  </script>
  {{-- <script>
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
  </script> --}}
</body>
</html>

      @endsection