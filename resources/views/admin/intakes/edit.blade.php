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
                <h3 class="card-title">Edit Campus</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('intake.update',$intake->id)}}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div>
                @foreach ($errors->all() as $error)
                    <span class="fs-10 text-danger">{{ $error }}</span><br/>
                @endforeach
            </div>
            <div class="form-group">
                <label>Intake Name</label>
                <select class="form-control select 2" name="name">
                 <option value="">Select intake Name</option>
                  <option value="{{$intake->name }}">{{\App\Models\Admin\Intake::INTAKE_OCTOBER}}</option>
                  <option value="{{$intake->name }}">{{\App\Models\Admin\Intake::INTAKE_MARCH}}</option>
                </select>

                </div>
              <div class="form-group">
                <label>Academic Year</label>
                <select class="form-control select 2" name="acy">
                 <option value="">Select Academic Year</option>
                  @foreach ($academic as $acy)
                  <option value="{{$acy->id}}">{{$acy->name}}</option>
                  @endforeach
                </select>

                </div>
            </div>

                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
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
