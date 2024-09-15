@extends('layouts.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <a href="{{route('programme.create')}}" class="btn btn-primary">Add programme</a>
          </div>
          <div class="col-sm-6">
          @if(session('success'))
              <div id="success-message" class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">programme List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th> </th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Short</th>
                    <th>Application Level</th>
                    <th>Campus Name</th>
                    <th>Intake</th>
                    <th> &nbsp; </th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($count=1)
                    @foreach ($programs as $c)
                    <tr>
                    <td></td>
                    <td>{{$count++}}</td>
                    <td>{{$c->name}}</td>
                    <td>{{ $c->code}}</td>
                    <td>{{ $c->short }}</td>
                    <td>{{ $c->appname }}</td>
                    <td>{{ $c->cname }}</td>
                    <td>{{ $c->intname }}</td>
                    <td>
                        <form action="{{route('intake.destroy', $c->id)}}" method="post">
                    <a class="btn btn-xs btn-primary" href="{{route('intake.show', $c->id)}}">{{'view'}}</a>
                    <a class="btn btn-xs btn-info" href="{{route('programme.edit', $c->id)}}">{{'edit'}}</a>
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-xs btn-danger" type="submit" onclick="return confirm('Are you Sure?')">{{'delete'}}</button>
                    </form>
                    </td>
                  </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
