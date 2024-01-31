<?php 
$pagename = 'products'
?>
@extends('layouts.admin')

@section('maincontent')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.products')}}">Products</a></li>
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
                          <h3 class="card-title">Edit Products</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('admin.products.update',[$prodata->id])}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Name</label>
                              <input type="text" name="name" value="{{old('name',$prodata->name)}}" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                             @if($errors->has('name'))
                                <span class="error">{{ $errors->first('name') }}</span>
                             @endif
                            </div>
                          
                              <div class="form-group">
                                <label for="inputMrp">Mrp</label>
                                <input type="text" id="mrp" name="mrp" onblur="mrpprice()" value="{{old('mrp',$prodata->mrp)}}" placeholder="Enter product MRP" class="form-control">
                                @if($errors->has('mrp'))
                                <span class="error">{{ $errors->first('mrp') }}</span>
                             @endif
                              </div>

                              <div class="form-group">
                                <label for="inputPrice">Price</label>
                                <input type="text" id="price" name="price" onblur="mrpprice()" value="{{old('price',$prodata->price)}}" placeholder="Enter product price" class="form-control">
                                @if($errors->has('price'))
                                <span class="error">{{ $errors->first('price') }}</span>
                             @endif
                              </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Description</label>
                              <textarea name="description" class="form-control" placeholder="Description" rows="5">{{old('description',$prodata->description)}}</textarea>
                             @if($errors->has('description'))
                                <span class="error">{{ $errors->first('description') }}</span>
                             @endif
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Category</label>
                              <select name="category" onChange="getsubcategory(this.value)" class="form-control">
                                <option value="">Select Category</option>
                                @foreach ($categorydata as $catelist)
                                  <option value="{{$catelist->id}}" {{$prodata->category_id == $catelist->id ?'selected':''}}>{{$catelist->name}}</option>
                                @endforeach
                                
                              </select>
                              @if($errors->has('category'))
                                <span class="error">{{ $errors->first('category') }}</span>
                             @endif
                            </div>
                            
                            <div class="form-group">
                              <label for="exampleInputEmail1">Subcategory</label>
                              <select name="subcategory" id="subcate" class="form-control">
                                <option value="">Select Subcategory</option>
                                
                              </select>
                              @if($errors->has('subcategory'))
                                <span class="error">{{ $errors->first('subcategory') }}</span>
                             @endif
                            </div>

                            <div class="form-group">
                              <label for="exampleInputFile">Image</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                              </div>
                              @if($errors->has('image'))
                                <p class="error">{{ $errors->first('image') }}</p>
                             @endif
                            </div>
                            <img src="{{asset('uploads/products/'.$prodata->image)}}" width="80" height="120">

                              <div class="form-group">
                                <label for="galleryImage">Gallery</label>
                                <input type="file" multiple name="gallery[]" id="gallery" class="form-control">
                                @if($errors->has('gallery'))
                                  <p class="error">{{ $errors->first('gallery') }}</p>
                                @endif
                              </div>
                              @foreach ($productimage as $proimg)
                                  <div class="row p-3" id="gal_{{$proimg->id}}">
                                    <div class="col-md-10">
                                      <img src="{{asset('uploads/products/gallary/'.$proimg->image)}}" width="300" height="200">
                                    </div>
                                    <div class="col-md-2">
                                      <a onclick="return deletegal({{$proimg->id}})" href="javascript:void(0)" class="btn btn-danger">Delete</a>
                                    </div>
                                  </div>
                              @endforeach
                                <div class="form-group">
                              <label for="exampleInputEmail1">Featured</label>
                              <select name="featured" class="form-control">
                                <option value="">Select featured</option>
                                <option value="1"{{$prodata->is_featured == 1?'selected':''}}>Yes</option>
                                <option value="2"{{$prodata->is_featured == 2?'selected':''}}>No</option>
                              </select>
                              @if($errors->has('featured'))
                                <span class="error">{{ $errors->first('featured') }}</span>
                             @endif
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Latest</label>
                              <select name="latest" class="form-control">
                                <option value="">Select Latest</option>
                                <option value="1"{{ $prodata->is_latest == 1?'selected':''}}>Yes</option>
                                <option value="2"{{ $prodata->is_latest  == 2?'selected':''}}>No</option>
                              </select>
                              @if($errors->has('latest'))
                                <span class="error">{{ $errors->first('latest') }}</span>
                             @endif
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Status</label>
                              <select name="status" class="form-control">
                                <option value="">Select Status</option>
                                <option value="1"{{$prodata->status == 1?'selected':''}}>Active</option>
                                <option value="2"{{$prodata->status == 2?'selected':''}}>Deactive</option>
                              </select>
                              @if($errors->has('status'))
                                <span class="error">{{ $errors->first('status') }}</span>
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