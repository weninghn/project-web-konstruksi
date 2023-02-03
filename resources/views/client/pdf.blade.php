@extends('layouts.master')

@section('title')
  Cetak Data Client
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
        <div class="content">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3>Cetak Data Client</h3>
                </div>
                <div class="card-body">
                    <div class="col-md-6">
                    <div class="input-group mb">
                        <p><label for="label">Tanggal Awal   : </label>
                        <input type="date" name="tglawal" id="tglawal" class="form-control">
                    {{-- <div class="input-group mb-3"> --}}
                    <div class="col-md-6">
                        <div class="input-group mb">
                        <p><label for="label">Tanggal Akhir   : </label>
                        <input type="date" name="tglakhir" id="tglakhir" class="form-control">
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <a href="" onclick="this.href='/cetak-data-pertanggal/'+document.getElementById('tglawal').value +
                            '/' + document.getElementById('tglakhir').value" target="_blank" class="btn btn-primary col-md-12">
                            Cetak Data Client   <i class="fas fa-print"></i></a>
                        </div>
                    </div>
                    {{-- <div class="input-group mb-3">
                        <a href="" onclick="this.href='/cetak-data-pertanggal/'+document.getElementById('tglawal').value +
                        '/' + document.getElementById('tglakhir').value" target="_blank" class="btn btn-primary col-md-12">
                        Cetak Data Client   <i class="fas fa-print"></i></a>
                    </div> --}}
                </div>
            </div>
        </div>
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