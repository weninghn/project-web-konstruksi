<!DOCTYPE html>
@extends('layouts.master')
@section('title')
    Project-Add
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
          <li class="breadcrumb-item active">Project-Add</li>
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
              <h3 class="card-title">Project Add</h3>
            </div>
            <form class="js-validation-material" action= "{{ route('project.add')}}" method="POST" enctype="multipart/form-data">
              @csrf
            <form>
		    <input type="number" id="id" name="id" value="{{ $karyawan->id }}" class="d-none">
              <div class="card-body">
                <div class="form-group">
                <label for="work_date" class="form-label">Work date</label>
				<input type="text" id="name" name="name" value="{{ $project->name }}" class="form-control" required>
                </div>
                <div class="form-group">
                <label for="work_date" class="form-label">Work date</label>
				<input type="text" id="name" name="name" value="{{ $project->name }}" class="form-control" required>
                </div>
                <div class="form-group">
                <label for="work_date" class="form-label">Work date</label>
				<input type="text" id="name" name="name" value="{{ $project->name }}" class="form-control" required>
                </div>

                  <div class="card-footer">
                {{-- <a href="/edituser/{{ $user->id }}" class="btn btn-md btn-info">Edit</button> --}}
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
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Karyawan</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<center><h2>Edit Karyawan</h2></center>
	<div class="content">
		<div class="row justify-content-center">
			<div class="col-xl-10">
				<form class="js-validation-material" action="{{ route('karyawan.update') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<input type="number" id="id" name="id" value="{{ $karyawan->id }}" class="d-none">
					<div class="form-group" style="padding: 10px 0">
						<div class="form-material">
							<label for="nama" class="form-label">Nama</label>
							<input type="text" id="name" name="name" value="{{ $karyawan->name }}" class="form-control" required>
						</div>
					</div>
					<center class="m-20">
						<button type="submit" id="btn-send" class="btn btn-primary" style="border-radius: 0.5rem">Simpan</button>
						<a href="{{ route('karyawan') }}" id="btn-back" class="btn btn-danger" style="border-radius: 0.5rem">Kembali</a>
					</center>
				</form>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<script type="text/javascript">
		
	</script>
</body>
</html>