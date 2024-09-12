@extends('layouts.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <a href="{{route('roles.create')}}" class="btn btn-primary">Add Role</a>
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
                <h3 class="card-title">Roles List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th> </th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Permissions</th>
                    <th> &nbsp; </th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($roles as $role)
                    <tr>
                    <td></td>
                    <td>{{$role->id}}</td>
                    <td>{{$role->title}}</td>
                    <td>
                    @foreach ($role->permissions as $permission)
                    <div class="permission " style="background-color:green; display:inline-flex; border-radius:10px; padding-left:3px; padding-right:3px; color:#fff">{{$permission->title}}</div>
                    @endforeach
                    </td>
                    <td>
                    <a class="btn btn-xs btn-primary" href="{{route('roles.show', $role)}}">{{'view'}}</a>
                       
                    <a class="btn btn-xs btn-info" href="{{route('roles.edit', $role)}}">{{'edit'}}</a>
                       
                    <form action="{{route('roles.destroy', $role)}}" method="post">
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
