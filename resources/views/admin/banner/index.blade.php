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
              <li class="breadcrumb-item active">Banners List</li>
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
                    <div class="card">
                      <div class="card-header">
                        <div class="row">
                                <div class="col-md-11">
                                    <h3 class="card-title">Banners List</h3>
                                </div>
                                <div class="col-md-1">
                                    <a href="{{route('admin.banner.add')}}" class="btn btn-success pull-right">Add New</a>
                                </div>
                        </div>
                        
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th style="width: 10px">#</th>
                              <th class="text-center">Title</th>
                              <th class="text-center">Status</th>
                              <th class="text-center">Image</th>
                              <th style="width: 160px">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($banner as $banners)
                            <tr>
                              <td>{{ $serialNumberStart++ }}</td>
                              <td class="text-center">{{ $banners->title}}</td>
                              <td class="text-center"> 
                              @if($banners->status == 1)
                              {{ $status = 'Active' }}
                              @else
                                {{ $status = 'Deactive' }}
                              @endif 
                              </td class="text-center">
                              <td class="text-center">
                                <a href="{{asset('uploads/banners')}}/{{$banners->image}}" download>
                                <img src="{{asset('uploads/banners/'.$banners->image) }}" class="rounded-circle" width="50" height="50"> 
                                </a>
                              </td>
                              <td class="text-center">
                                <a href="{{ route('admin.banner.edit',[$banners->id]) }}" class="btn btn-success">Edit</a>
                                <a onclick="confirm('Are You Sure To Delete')" href="{{ route('admin.banner.delete',[$banners->id]) }}" class="btn btn-danger deleteitem">Delete</a>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                          {{$banner->links();}}
                        </ul>
                      </div>
                    </div>
             
                  </div>

            </div>



      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
@section('scripts')
  <script>
    function confirmbox(){
    //   bootbox.confirm('This is the default confirm!',
    //       function(result) {
    //       console.log('This was logged in the callback: ' + result);
    //       });
    // }
  </script>
@endsection