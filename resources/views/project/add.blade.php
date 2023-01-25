<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Data  Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <center><h1>Project</h1></center>
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-5">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <form class="js-validation-material" action= "{{route('project.add')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group" style="padding: 5px 0">
                        <div class="form_material">
                            <label for="name" class="form-label">Nama</label>
                            <select class="form-select" id="client_id" name="client_id" required>
                                <option value="">--Pilih--</option>
                                @foreach($client as $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                                @endforeach
                            </select>
                        </div>
                       </div>
                    <div class="form-group" style="padding: 5px 0">
                        <div class="form_material">
                            <label for="work_date" class="form-label">Work_date</label>
                            <input type="date" id="work_date" name="work_date" class="form-control" required>
                        </div>
                       </div>
                    <div class="form-group" style="padding: 5px 0">
                        <div class="form_material">
                            <label for="date_end" class="form-label">Date_end</label>
                            <input type="date" id="date_end" name="date_end" class="form-control" required>
                        </div>
                       </div>
                       
                       <div class="form-group" style="padding: 5px 0">
                        <div class="form_material">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                       </div>
                       <div class="form-group" style="padding: 5px 0">
                        <div class="form_material">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" id="location" name="location" class="form-control" required>
                        </div>
                       </div>
                       <div class="form-group" style="padding: 5px 0">
                        <div class="form_material">
                            <label for="date_offer" class="form-label">Date_offer</label>
                            <input type="date" id="date_offer" name="date_offer" class="form-control" required>
                        </div>
                       </div>
                       <div class="form-group" style="padding: 5px 0">
                        <div class="form_material">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" id="status" name="status" class="form-control" required>
                        </div>
                       </div>
                       <div class="form-group" style="padding: 5px 0">
                        <div class="form_material">
                            <label for="status_payment" class="form-label">Status Payment</label>
                            <input type="text" id="status_payment" name="status_payment" class="form-control" required>
                        </div>
                       </div>
                       <center class="m-20">
                        <button type="submit" id="btn-send" class="btn btn-primary" style="border: 0.5rem">Simpan</button>
                        <a href="{{route('project')}}" id="btn-back" class="btn btn-danger" style="border-radius:0.5rem">Kembali</a>
                       </center>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>




