@extends('layouts.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <a href="{{route('campus.create')}}" class="btn btn-primary">Add Campus</a>
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
                <h3 class="card-title">Intakes List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th> </th>
                    <th>ID</th>
                    <th>Name</th>
                    <th> &nbsp; </th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($count=1)
                    @foreach ($campus as $c)
                    <tr>
                    <td></td>
                    <td>{{$count++}}</td>
                    <td>{{$c->name}}</td>
                    <td>
                        <form action="{{route('campus.destroy', $c->id)}}" method="post">
                    <a class="btn btn-xs btn-primary" href="{{route('campus.show', $c->id)}}">{{'view'}}</a>
                    <a class="btn btn-xs btn-info" href="{{route('campus.edit', $c->id)}}">{{'edit'}}</a>
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
