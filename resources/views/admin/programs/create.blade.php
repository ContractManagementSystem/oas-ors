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
                <h3 class="card-title"> @if(isset($program))
                    Edit
                    @else
                       Create
                @endif Programme</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('programme.store')}}" onsubmit="return validateforminputs(this)">
                <input type="hidden" name="program[id]" value="{{isset($program)?$program->id:'' }}">
                @csrf
                <div class="card-body">
                    <div>
                @foreach ($errors->all() as $error)
                    <span class="fs-10 text-danger">{{ $error }}</span><br/>
                @endforeach
            </div>
                  <div class="form-group">
                    <label for="title">Programme Name</label>
                    <input type="text" class="form-control" id="title" name="program[name]" required
                    value="{{isset($program)?$program->name:''}}">
                  </div>
                  <div class="form-group">
                    <label for="title">Programme Code</label>
                    <input type="text" class="form-control" id="title" name="program[code]" required
                    value="{{isset($program)?$program->code:''}}">
                  </div>
                  <div class="form-group">
                    <label for="title">Programme Short</label>
                    <input type="text" class="form-control" id="title" name="program[short]" required
                    value="{{isset($program)?$program->short:''}}">
                  </div>
                  <div class="form-group">
                    <label for="level">Application Level</label>
                    <select id="app_level" class="form-control select 2" name="program[app_level]">
                     <option value=""></option>
                      @foreach ($level as $acy)
                      <option
                      {{selected(isset($program)?$program->app_level:'',$acy->id)}} value="{{$acy->id}}">{{$acy->name}}</option>
                 @endforeach
                    </select>

                    </div>
                  <div class="form-group">
                    <label for="acy">Academic Year</label>
                    <select id="acy" class="form-control select 2" name="program[acyr]">
                     <option value=""></option>
                      @foreach ($aca as $acy)
                      <option
                      {{selected(isset($program)?$program->acyr:'',$acy->id)}} value="{{$acy->id}}">{{$acy->name}}</option>
                      @endforeach
                    </select>

                    </div>
                    <div class="form-group">
                        <label for="acy">Campus</label>
                        <select id="acy" class="form-control select 2" name="program[campus_id]">
                         <option value=""></option>
                          @foreach ($campus as $acy)
                          <option
                          {{selected(isset($program)?$program->campus_id:'',$acy->id)}} value="{{$acy->id}}">{{$acy->name}}</option>
                          @endforeach
                        </select>

                        </div>
                        <div class="form-group">
                            <label for="acy">Intake</label>
                            <select id="acy" class="form-control select 2" name="program[intake_id]">
                             <option value=""></option>
                              @foreach ($intake as $acy)
                              <option
                              {{selected(isset($program)?$program->intake_id:'',$acy->id)}} value="{{$acy->id}}">{{$acy->name}}</option>
                              @endforeach
                            </select>

                            </div>
                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                            <button class="btn btn-success btn-load btn-lg save-btn" type="submit">
                                        <span class="d-flex align-items-center">
                                            <span class="spinner-border flex-shrink-0 me-2 save-spinner" role="status"
                                                  style="display: none"></span>
                                            <span class="flex-grow-1">{{ !isset($user->id) ? 'Save' : 'Update' }}</span>
                                        </span>
                            </button>

                        </div>
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
