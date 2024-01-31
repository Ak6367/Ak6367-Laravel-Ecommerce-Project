@php 
    $pagename = 'sitesetting'
@endphp
@extends('layouts.admin')

@section('maincontent')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Site settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.sitesetting')}}">Site setting</a></li>
              <li class="breadcrumb-item active">Add/Edit Sitesettings</li>
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
                          <h3 class="card-title">View/Edit Sitesettings</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('admin.sitesetting.store',[1])}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Name</label>
                              <input type="text" name="name" value="{{old('name',$sitesetting->name)}}" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                             @if($errors->has('name'))
                                <span class="error">{{ $errors->first('name') }}</span>
                             @endif
                            </div>
                            {{-- @php
                              dd($sitesetting->all());
                            @endphp --}}
                              <div class="form-group">
                                <label for="inputMrp">email</label>
                                <input type="text" id="email" name="email" value="{{old('email',$sitesetting->email)}}" placeholder="Enter email" class="form-control">
                                @if($errors->has('email'))
                                <span class="error">{{ $errors->first('email') }}</span>
                             @endif
                              </div>

                              <div class="form-group">
                                <label for="inputPrice">Contact</label>
                                <input type="text" id="contact" name="contact" value="{{old('contact',$sitesetting->contact_no)}}" placeholder="Enter your contact number" class="form-control">
                                @if($errors->has('contact'))
                                <span class="error">{{ $errors->first('contact') }}</span>
                             @endif
                              </div>
                            

                            <div class="form-group">
                              <label for="exampleInputFile">Logo</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="logo" class="custom-file-input" id="logo">
                                  <input type="hidden" value="{{$sitesetting->logo}}" name="old_logo">
                                  <label class="custom-file-label" for="logo">Choose file</label>
                                </div>
                              </div>
                              @if($errors->has('logo'))
                                <p class="error">{{ $errors->first('logo') }}</p>
                             @endif
                            </div>
                            <img src="{{asset('uploads/sitesetting/'.$sitesetting->logo)}}" width="80" height="120">
                            <div class="form-group">
                                <label for="exampleInputFile">Favicon</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" name="fav" class="custom-file-input" id="fav">
                                    <input type="hidden" value="{{$sitesetting->fav_image}}" name="old_fav">
                                    <label class="custom-file-label" for="fav">Choose file</label>
                                  </div>
                                </div>
                                @if($errors->has('fav'))
                                  <p class="error">{{ $errors->first('fav') }}</p>
                               @endif
                              </div>
                              <img src="{{asset('uploads/sitesetting/'.$sitesetting->fav_image)}}" width="80" height="80">
                             
                                <div class="form-group">
                              <label for="exampleInputEmail1">Address</label>
                              <input type="address" name="address" value="{{old('address',$sitesetting->address)}}" class="form-control" id="address">
                              @if($errors->has('address'))
                                <span class="error">{{ $errors->first('address') }}</span>
                             @endif
                            </div>
                                <div class="form-group">
                              <label for="exampleInputEmail1">Facebook page</label>
                              <input type="text" name="fblink" value="{{old('fblink',$sitesetting->facebook_page_link)}}" class="form-control" id="fblink">
                              @if($errors->has('fblink'))
                                <span class="error">{{ $errors->first('fblink') }}</span>
                             @endif
                            </div>
                                <div class="form-group">
                              <label for="exampleInputEmail1">Youtube</label>
                              <input type="text" name="ytlink" value="{{old('ytlink',$sitesetting->youtube_page_link)}}" class="form-control" id="ytlink">
                              @if($errors->has('ytlink'))
                                <span class="error">{{ $errors->first('ytlink') }}</span>
                             @endif
                            </div>
                                <div class="form-group">
                              <label for="exampleInputEmail1">twitter</label>
                              <input type="text" name="twit" value="{{old('twit',$sitesetting->twiter_link)}}" class="form-control" id="twit">
                              @if($errors->has('twit'))
                                <span class="error">{{ $errors->first('twit') }}</span>
                             @endif
                            </div>
                                <div class="form-group">
                              <label for="exampleInputEmail1">Instagram</label>
                              <input type="text" name="iglink" value="{{old('ytlink',$sitesetting->instagram_page_link)}}" class="form-control" id="iglink">
                              @if($errors->has('iglink'))
                                <span class="error">{{ $errors->first('iglink') }}</span>
                             @endif
                            </div>
                            

                            
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="exampleCheck1">
                              <label class="form-check-label" for="exampleCheck1">Check me out</label>
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
@section('scripts')
<script>
  function mrpprice(){
  var mrp = parseFloat($('#mrp').val());
  var price = parseFloat($('#price').val());
  if(price >= mrp){
    $('#price').val('');
    $('#priceerr').html('Price not greater than mrp');
  }
}

function getsubcategory(cateogryid){
  //alert(7674657)
  $.ajax({
          url: '{{route("admin.ajaxsubcategory")}}',
          type: 'POST',
          data: {_token:"{{ csrf_token() }}", category_id:cateogryid},
          dataType: 'JSON',
          success: function (response) { 
              $("#subcate").html(response.data); 
          }
      }); 
}

function deletegal(galleryid){
  //alert(gallaryid)
  bootbox.confirm('Are You Sure To Delete ? Please confirm!',
      function(result) {
      console.log('This was logged in the callback: ' + result);
      if(result){
        //alert(5657);
        $.ajax({
          url: '{{route("admin.gallerydelete")}}',
          type: 'POST',
          data: {_token:"{{ csrf_token() }}", gallery_id:galleryid},
          success: function(response) {
            $('#gal_'+galleryid).remove();
          }
        });
      }
      });
}
</script>

@endsection