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
                <h3 class="card-title"> @if(isset($level))
                    Edit
                    @else
                       Create
                @endif Application Level</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('level.store')}}" onsubmit="return validateforminputs(this)">
                <input type="hidden" name="level[id]" value="{{isset($level)?$level->id:'' }}">
                @csrf
                <div class="card-body">
                    <div>
                @foreach ($errors->all() as $error)
                    <span class="fs-10 text-danger">{{ $error }}</span><br/>
                @endforeach
            </div>

            <div class="form-group">
                <label for="level">Application Level</label>
                <select class="form-control select 2" name="level[name]">
                  <option value=""></option>
                  <option{{selected(isset($level)?$level->name:'',\App\Models\Admin\Applevel::BACHELOR_LEVEL)}} value="{{\App\Models\Admin\Applevel::BACHELOR_LEVEL}}">{{\App\Models\Admin\Applevel::BACHELOR_LEVEL}}</option>
                  <option{{selected(isset($level)?$level->name:'',\App\Models\Admin\Applevel::MASTER_LEVEL)}} value="{{\App\Models\Admin\Applevel::MASTER_LEVEL}}">{{\App\Models\Admin\Applevel::MASTER_LEVEL}}</option>
                  <option{{selected(isset($level)?$level->name:'',\App\Models\Admin\Applevel::DIPLOMA_LEVEL)}} value="{{\App\Models\Admin\Applevel::DIPLOMA_LEVEL}}">{{\App\Models\Admin\Applevel::DIPLOMA_LEVEL}}</option>
                  <option{{selected(isset($level)?$level->name:'',\App\Models\Admin\Applevel::CERTIFICATE_LEVEL)}} value="{{\App\Models\Admin\Applevel::CERTIFICATE_LEVEL}}">{{\App\Models\Admin\Applevel::CERTIFICATE_LEVEL}}</option>
                  <option{{selected(isset($level)?$level->name:'',\App\Models\Admin\Applevel::POSTGRADUATE_LEVEL)}} value="{{\App\Models\Admin\Applevel::POSTGRADUATE_LEVEL}}">{{\App\Models\Admin\Applevel::POSTGRADUATE_LEVEL}}</option>

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
