@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create update</h3>
              </div>
              <!-- /.card-header -->
              @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
              <!-- form start -->
              <form method="post" action="{{route('updates.update', $update)}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$update->title}}">
                  </div>

                  <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" class="form-control-file" id="photo" name="photo">
                    <img src="/storage/{{$update->photo}}" alt="update" height="100px" width="300px">
                  </div>

                  <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{$update->description}}">
                  </div>

                  <div class="form-group">
                    <label for="is_published">Is_Published</label>
                    <input type="hidden" name="is_published" value="0">
                    <input type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', $update->is_published) ? 'checked' : '' }}>
                </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection