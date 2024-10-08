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
                <h3 class="card-title"> @if(isset($campus))
                    Edit
                    @else
                       Create
                @endif Campus</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('campus.store')}}" onsubmit="return validateforminputs(this)">
                <input type="hidden" name="campus[id]" value="{{isset($campus)?$campus->id:'' }}">
                @csrf
                <div class="card-body">
                    <div>
                @foreach ($errors->all() as $error)
                    <span class="fs-10 text-danger">{{ $error }}</span><br/>
                @endforeach
            </div>
                  <div class="form-group">
                    <label for="title">Campus Name</label>
                    <input type="text" class="form-control" id="title" name="campus[name]" required
                    value="{{isset($campus)?$campus->name:''}}">
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
