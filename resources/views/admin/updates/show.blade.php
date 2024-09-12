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
            <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-info" href="{{ route('updates.index') }}">
                                Back To List
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{'update id'}}
                                    </th>
                                    <td>
                                        {{ $update->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ 'update title' }}
                                    </th>
                                    <td>
                                        {{ $update->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ 'update path' }}
                                    </th>
                                    <td>
                                        {{ $update->photo }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ 'update description' }}
                                    </th>
                                    <td>
                                        {{ $update->description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ 'Is Published?' }}
                                    </th>
                                    <td>
                                        {{ $update->is_published == 1 ? 'Yes' : 'No' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ 'photo' }}
                                    </th>
                                    <td>
                                        <img src="/storage/{{ $update->photo }}" alt="">
                                    </td>
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>
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