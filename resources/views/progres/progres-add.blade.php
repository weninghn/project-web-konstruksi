@extends('layouts.master')
@section('title')
    Progress-Tambah
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
          <li class="breadcrumb-item active">Progres-Tambah</li>
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
                      <h3 class="card-title">Progress Tambah</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="progres-add" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <label for="name">Project</label>
                          <select name="project_id" id="project_id" name="project_id"class="form-control " >
                            @foreach ($project as $item)
                              <option value="{{ $item->id}}">{{ $item->name }}</option>
                            @endforeach

                        </select>
                        </div>
                        {{-- <div class="form-group">
                          <label for="name">Number</label>
                          <select name="offer_id" id="offer_id" name="offer_id"class="form-control " >
                            
                          </select>
                        </div> --}}
                    
                        <div class="form-group">
                          <label for="presentase">Persentase</label>
                          <input type="text" class="form-control" id="presentase" name="presentase" placeholder="presentase" required>
                        </div>
                        <div class="form-group">
                          <label for="job">Detail Pekerjaan</label>
                          <input type="job_details" class="form-control" id="job_details" name="job_details" placeholder="Job_Details" required>
                        </div>
                        <div class="form-group">
                          <label for="date">Tanggal Progres</label>
                          <input type="date" class="form-control" id="date" name="date" placeholder="date" required>
                        </div>

						<div class="row" id="image-preview-container">

						</div>

                        {{-- @php
                            $files = DB::table('progres')->where('id', 1)->first();
                            $filess = explode('|', $files->$files);
                        @endphp
                        {{-- @php
                            $file = DB::table('progres')->where('id', 1)->first();
                            $files = explode('|', $file->file);
                        @endphp
                        @foreach ($filess as $item)
                            <img src="{{URL::to($item)}}" style="height:60px;" alt="">
                        @endforeach --}}
                        <div class="form-group">
                          <label for="upload_file">File input</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="files[]" class="custom-file-input" id="upload_file" multiple>
                              <label class="custom-file-label" for="upload_file">Pilih file</label>
                            </div>
                            {{-- @foreach ($progress->pictures as $picture)
                            <div class="col-md-3">
                              <a href="{{ url("picture-destroy/".$picture->id) }}" class="btn btn-sm btn-danger float-right"><i class="fas fa-times"></i></a>
                              <img src="{{ asset('uploads/progres/'.$picture->image) }}" class="w-100">
                            </div>
                            @endforeach
                          </div> --}}
                          </div>
                              {{-- @foreach ($progress->pictures as $picture)
                              <div class="col-md-3">
                                <a href="{{ url("picture-destroy/".$picture->id) }}" class="btn btn-sm btn-danger float-right"><i class="fas fa-times"></i></a>
                                <img src="{{ asset('uploads/progres/'.$picture->image) }}" class="w-100">
                              </div>
                              @endforeach --}}
                        {{-- @foreach ($progres->pictures as $picture)
                          <img src="{{ asset('uploads/progres/'.$picture->image) }}" style="width: 150px; margin-right: 20px">
                        @endforeach --}}

                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </section>
    </div>

    <script>
      var loadFile = function(event)
      {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
      };


    </script>
@endsection

@push('script')
    <script>
      $('#upload_file').on('change', function() {
		//get all image files
		var files = $(this)[0].files;
		//check file length
		if (files.length > 0) {
			$('#image-preview-container').html('');
			var index = 0;
			var total_file_size = 0;
			//loop through all files
			$.each(files, function(i, file) {
				//add to total size
				total_file_size = total_file_size + file.size;
				//make sure file is image
				if (file.type.match(/image.*/)) {
					// initialize file reader
					var reader = new FileReader();
					//image loaded
					reader.onload = function(e) {
						//create image element
						var img = $('<img/>');
						console.log(img);
						img.attr('src', e.target.result);
						img.attr('class', 'img-fluid mr-2');
						//set styling properties, height 100px and width auto
						img.css('height', '100px');
						img.css('width', 'auto');
						//append image to output element
						$('#image-preview-container').append(img);
					}
					//read the image
					reader.readAsDataURL(file);
				}
			});
		}
	});
    </script>
@endpush