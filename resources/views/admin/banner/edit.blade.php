<?php 
$pagename = 'banner'
?>
@extends('layouts.admin')

@section('maincontent')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Banners</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.banner')}}">Banners</a></li>
              <li class="breadcrumb-item active">Edit Banners</li>
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
                          <h3 class="card-title">Edit Banners</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/admin/banner/update/{{$bannersdata->id}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Name</label>
                              <input type="text" name="name" value="{{old('name',$bannersdata->name) }}" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                             @if($errors->has('name'))
                                <span class="error">{{ $errors->first('name') }}</span>
                             @endif
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Title</label>
                              <input type="text" name="title" value="{{old('title',$bannersdata->title)}}" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
                             @if($errors->has('title'))
                                <span class="error">{{ $errors->first('title') }}</span>
                             @endif
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Sub Title</label>
                              <input type="text" name="sub_title" value="{{old('sub_title',$bannersdata->sub_title)}}" class="form-control" id="exampleInputEmail1" placeholder="Enter sub tilte">
                             @if($errors->has('sub_title'))
                                <span class="error">{{ $errors->first('sub_title') }}</span>
                             @endif
                            </div><div class="form-group">
                              <label for="exampleInputEmail1">Description</label>
                              <textarea name="description" class="form-control" rows="5">{{old('description',$bannersdata->description)}}</textarea>
                             @if($errors->has('description'))
                                <span class="error">{{ $errors->first('description') }}</span>
                             @endif
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Category</label>
                              <select name="category" class="form-control">
                                <option value="">Select Category</option>
                                @foreach ($categorydata as $catelist)
                                  <option value="{{$catelist->id}}" {{$catelist->id == $bannersdata->category_id?'selected':''}}>{{$catelist->name}}</option>
                                @endforeach
                                
                              </select>
                              @if($errors->has('category'))
                                <span class="error">{{ $errors->first('category') }}</span>
                             @endif
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Link</label>
                              <input type="text" name="link" value="{{old('link',$bannersdata->link)}}" class="form-control" id="link" placeholder="Enter link">
                             @if($errors->has('link'))
                                <span class="error">{{ $errors->first('link') }}</span>
                             @endif
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Button Text</label>
                              <input type="text" name="button_text" value="{{old('name',$bannersdata->button_text)}}" class="form-control" id="button-text" placeholder="Enter button text">
                             @if($errors->has('button_text'))
                                <span class="error">{{ $errors->first('button_text') }}</span>
                             @endif
                            </div>
                            <div class="form-group">
                              <label for="exampleInputFile">Image</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                  <input type="hidden" name="old_pic" value="{{ $bannersdata->image }}">
                                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                  <span class="input-group-text">Upload</span>
                                </div>
                              </div>
                              @if($errors->has('image'))
                              <p class="error">{{ $errors->first('image') }}</p>
                              @endif
                              <div class="text-center">
                              <img class="mt-3" src="{{asset('uploads/banners/'.$bannersdata->image)}}" width="800" height="400">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Status</label>
                              <select name="status" class="form-control">
                                <option value="">Select Status</option>
                                <option value="1"{{$bannersdata->status == 1?'selected':''}}>Active</option>
                                <option value="2"{{$bannersdata->status ==2?'selected':''}}>Deactive</option>
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