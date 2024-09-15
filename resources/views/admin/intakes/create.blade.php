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
                <h3 class="card-title"> @if(isset($intake))
                    Edit
                    @else
                       Create
                @endif Intake</h3>

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('intake.store')}}" onsubmit="return validateforminputs(this)">
                <input type="hidden" name="intake[id]" value="{{isset($intake)?$intake->id:'' }}">
                @csrf
                <div class="card-body">
                    <div>
                        @foreach ($errors->all() as $error)
                        <span class="fs-10 text-danger">{{ $error }}</span><br/>
                    @endforeach
            </div>
                  <div class="form-group">
                    <label for="intake">Intake Name</label>
                    <select class="form-control select 2" name="intake[name]">
                      <option value=""></option>
                      <option
                          {{selected(isset($intake)?$intake->name:'',\App\Models\Admin\Intake::INTAKE_OCTOBER)}} value="{{\App\Models\Admin\Intake::INTAKE_OCTOBER}}">{{\App\Models\Admin\Intake::INTAKE_OCTOBER}}</option>
                      <option
                          {{selected(isset($intake)?$intake->name:'',\App\Models\Admin\Intake::INTAKE_MARCH)}} value="{{\App\Models\Admin\Intake::INTAKE_MARCH}}">{{\App\Models\Admin\Intake::INTAKE_MARCH}}</option>
                    </select>
                    </div>
                  <div class="form-group">
                    <label for="acy">Acadeintmic Year</label>
                    <select id="acy" class="form-control select 2" name="intake[acy]">
                     <option value=""></option>
                      @foreach ($academic as $acy)
                      <option
                      {{selected(isset($intake)?$intake->acy:'',$acy->id)}} value="{{$acy->id}}">{{$acy->name}}</option>
                      @endforeach
                    </select>

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
