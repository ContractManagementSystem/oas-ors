@extends('layouts.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
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
          <!-- right column -->
          <div class="col-md-12">
            
            <!-- general form elements disabled -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">General Form Components</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" placeholder="Enter Name" minlength="3" maxlength="20" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" class="form-control" data-inputmask="'mask' :'(999) 999-999-999'" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" data-inputmask="'mask' :'*{1,20}[.*{1,20}][.*{1,20}]@*{1,20}.*{2,4}[.*{1,2}]'" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Fourm Four Index Number</label>
                        <input type="text" class="form-control" data-inputmask="'mask' :'A9999/9999/9999'" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>AVN NUmber</label>
                        <input type="text" class="form-control" data-inputmask="'mask' :'99AA99999AA'" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Physical Address</label>
                        <input type="text" class="form-control" minlength="5" maxlength="20" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" minlength="4" maxlength="8" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>File</label>
                        <input type="file" class="form-control" minlength="4" maxlength="8" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label>Select</label>
                    <select class="form-control">
                      <option selected="selected">Alabama</option>
                      <option>Alaska</option>
                      <option>California</option>
                      <option>Delaware</option>
                      <option>Tennessee</option>
                      <option>Texas</option>
                      <option>Washington</option>
                    </select>
                  </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label>Select With Search</label>
                    <select class="form-control select2">
                      <option selected="selected">Alabama</option>
                      <option>Alaska</option>
                      <option>California</option>
                      <option>Delaware</option>
                      <option>Tennessee</option>
                      <option>Texas</option>
                      <option>Washington</option>
                    </select>
                  </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                      <label>Multiple</label>
                      <select class="select2 form-control" multiple="multiple" data-placeholder="Select a State">
                        <option>Alabama</option>
                        <option>Alaska</option>
                        <option>California</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option>
                      </select>
                    </div>
                    </div>
                    <div class="col-sm-6 d-flex" style="justify-content: space-between;">
                     <div class="icheck-primary d-inline form-group">
                        <input type="checkbox" id="checkboxPrimary2">
                        <label for="checkboxPrimary2">
                          primary
                        </label>
                      </div>
                      <div class="icheck-success d-inline form-group">
                        <input type="checkbox" id="checkboxPrimary3">
                        <label for="checkboxPrimary3">
                          success
                        </label>
                      </div>
                      <div class="icheck-warning d-inline form-group">
                        <input type="checkbox" id="checkboxPrimary4">
                        <label for="checkboxPrimary4">
                          warning
                        </label>
                      </div>
                      <div class="icheck-danger d-inline form-group">
                        <input type="checkbox" id="checkboxPrimary5">
                        <label for="checkboxPrimary5">
                          danger
                        </label>
                      </div>
                    </div>
                  </div>
                    <div class="row text-center">
                      <div class="col-sm-3">
                      <button type="submit" class="btn btn-primary btn-block">Submit</button>
                      </div>
                      <div class="col-sm-3">
                      <button type="cancel" class="btn btn-warning btn-block">Previous</button>
                      </div>
                      <div class="col-sm-3">
                      <button type="submit" class="btn btn-success btn-block">Next</button>
                      </div>
                      <div class="col-sm-3">
                      <button type="submit" class="btn btn-danger btn-block">Cancel</button>
                      </div>
                    </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
   
  </div>
  <!-- /.content-wrapper -->
@endsection
