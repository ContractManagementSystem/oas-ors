@extends('layouts.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <a href="{{route('updates.create')}}" class="btn btn-primary">Add update</a>
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
                <h3 class="card-title">update List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th> </th>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Photo</th>
                    <th>Description</th>
                    <th>Published</th>
                    <th> &nbsp; </th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($updates as $update)
                    <tr>
                    <td>
                        <form action="">
                        <input type="hidden" name="" value="0">
                        <input type="checkbox" id="" name="" value="1" {{ old('') ? 'checked' : '' }}>
                        </form>
                    </td>
                    <td>{{$update->id}}</td>
                    <td>{{$update->title}}</td>
                    <td>
                        <img src="/storage/{{$update->photo}}" alt="update" height="50px" width="100px">
                    </td>
                    <td>{{$update->description}}</td>
                    <td>{{$update->is_published == 1 ? 'Yes' : 'No' }}</td>
                    <td>
                    <a class="btn btn-xs btn-primary" href="{{route('updates.show', $update)}}">{{'view'}}</a>
                       
                    <a class="btn btn-xs btn-info" href="{{route('updates.edit', $update)}}">{{'edit'}}</a>
                       
                    <form action="{{route('updates.destroy', $update)}}" method="post">
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
