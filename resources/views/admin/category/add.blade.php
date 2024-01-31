  <?php 
    $pagename = 'category'
  ?>
@extends('layouts.admin')

@section('maincontent')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.category')}}">Category</a></li>
              <li class="breadcrumb-item active">Add Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Add Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Name</label>
                              <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                             @if($errors->has('name'))
                                <span class="error">{{ $errors->first('name') }}</span>
                             @endif
                            </div>
                            
                            <div class="form-group">
                              <label for="exampleInputFile">Image</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                  <span class="input-group-text">Upload</span>
                                </div>
                              </div>
                              @if($errors->has('image'))
                                <p class="error">{{ $errors->first('image') }}</p>
                             @endif
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Status</label>
                              <select name="status" class="form-control">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="2">Deactive</option>
                              </select>
                              @if($errors->has('status'))
                                <span class="error">{{ $errors->first('status') }}</span>
                             @endif
                            </div>
                            
                          </div>
                          <!-- /.card-body -->
          
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                      </div>
             
                  </div>

            </div>



      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection