@extends('admin.layouts.default')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Users </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Users</li>
               </ol>
            </div><!-- /.col -->
         </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->

   <!-- Main content -->
   <div class="content">
      <div class="container-fluid">
         <div>
            <div class="card">
               <!-- /.card-header -->
               <div class="card-body">
                  <form method="POST" action="">
                      <div class="row">
                          <div class="col-sm-12">
                              <!-- text input -->
                              <div class="form-group">
                                  <label>Heading</label>
                                  <input type="text" class="form-control" placeholder="Enter Heading" required>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-12">
                              <!-- text input -->
                              <div class="form-group">
                                  <label>Title</label>
                                  <input type="text" class="form-control" placeholder="Enter Title" required>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-12">
                              <!-- textarea -->
                              <div class="form-group">
                                  <label>Description</label>
                                  <textarea class="form-control" rows="3" placeholder="Enter Description" required></textarea>
                              </div>
                          </div>
                      </div>
                      <div class="card-footer">
                          <button type="submit" class="btn btn-primary" style="
                          float: right;
                      ">Add</button>
                      </div>
                  </form>
              </div>
              
               <!-- /.card-body -->
             </div>
             <!-- /.card -->
             <!-- general form elements disabled -->
         </div>
         <!-- /.row -->
      </div><!-- /.container-fluid -->
   </div>
   <!-- /.content -->

</div>
<!-- /.content-wrapper -->

@stop