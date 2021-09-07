@extends('layouts.backend.app')

@section('css')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
@endsection

@section('content')
<style>
  .card-body{
    padding: 40px;
  }
  .form-control{
    border-bottom: 1px solid #888 !important;
  }
  .heading{
    color: #6bb51e;padding-top: 0px;text-align: center;
  }
</style>
<div class="card uper">
  <div class="card-header">
    <h3 class="heading">Add New Product</h3>
  </div>
  <div class="card-body">
      <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label class="text-dark" for="content">Name :</label>
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" required>
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-row mb-3">
            <div class="col-6">
              <label class="text-dark" for="content">Select Category :</label>
              <select class="form-control" name="category_id" required>
                <option value="">-- Please select category --</option>
                @foreach($categories as $key => $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
              @error('category_id')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="col-6">
              <label class="text-dark" for="content">Select Sub Category :</label>
              <select class="form-control" name="categoryItem_id">
                <option value="">-- Please select sub category --</option>
                @foreach($categoriesItems as $key => $item)
                <option value="{{$item->id}}" id="{{$item->category_id}}">{{$item->name}}</option>
                @endforeach
              </select>
              @error('categoryItem_id')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>
          <div class="form-group">
              <label class="text-dark" for="content">SKU :</label>
              <input type="text" name="SKU" class="form-control @error('SKU') is-invalid @enderror" value="{{old('SKU')}}" required>
              @error('SKU')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
              <label class="text-dark" for="content">Sort Order :</label>
              <input type="number" name="order" class="form-control @error('order') is-invalid @enderror" value="{{old('order')}}" required>
              @error('order')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
              <label class="text-dark" for="content">Product Image :</label>
              <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{old('image')}}" required>
              @error('image')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
              <label class="text-dark" for="content">Description :</label>
              <textarea id="summernoteDesc" class="form-control @error('description') is-invalid @enderror" name="description">{{old('description')}}</textarea>
              @error('description')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
              <label class="text-dark" for="content">Overview :</label>
              <textarea id="summernoteOverview" class="form-control @error('overview') is-invalid @enderror" name="overview">{{old('overview')}}</textarea>
              @error('overview')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
              <label class="text-dark" for="content">Buy now url :</label>
              <input type="text" name="buy" class="form-control @error('buy') is-invalid @enderror" value="{{old('buy')}}">
              @error('buy')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <br><hr><hr>
          <h5 class="font-weight-bold text-dark">Add Downloads</h5>
          <div class="form-group wrapper">
                <input type="file" class="form-control element mt-3" name="downloads[]" placeholder="Upload Pdf" accept="application/pdf">
                <div class="results"></div>
                @error('download')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror

                <div class="buttons mt-2">
                  <a class="btn btn-info clone text-white">Add More</a>
                  <a class="btn btn-danger remove text-white">Remove Last</a>
                </div>
          </div>
          <br><hr><hr>
          <h5 class="font-weight-bold text-dark">Add Videos</h5>
          <div class="form-group row">
            <div class="col-md-6 col-12">
              <h5 class="font-weight-bold text-dark">Add Youtube Url :</h5>
              <div id="youtube_fields"></div>
                <div class="form-row d-flex">
                  <div class="col-sm-9 nopadding col-3">
                    <div class="form-group">
                      <input type="text" class="form-control" name="youtube_url[]" value="" placeholder="Enter Url">
                    </div>
                  </div>
                  <div class="col-sm-3 nopadding col-3">
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" value="Youtube" class="form-control" disabled>
                        <input type="hidden" name="type[]" value="1">
                        <div class="input-group-btn">
                          <button class="btn btn-success" type="button"  onclick="youtube_fields();"> <span class="fa fa-plus" aria-hidden="true"></span> </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @error('youtube_url')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="col-md-6 col-12">
              <h5 class="font-weight-bold text-dark">Upload Video :</h5>
              <div id="upload_fields"></div>
                <div class="form-row d-flex">
                  <div class="col-sm-9 nopadding col-3">
                    <div class="form-group">
                      <input type="file" class="form-control" name="upload_url[]" value="" placeholder="Upload Video">
                    </div>
                  </div>
                  <div class="col-sm-3 nopadding col-3">
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" value="Upload" class="form-control" disabled>
                        <input type="hidden" name="type1[]" value="2">
                        <div class="input-group-btn">
                          <button class="btn btn-success" type="button"  onclick="upload_fields();"> <span class="fa fa-plus" aria-hidden="true"></span> </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @error('upload_url')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
          </div>


          <br><hr><hr>
          <h5 class="font-weight-bold text-dark">Add Metas</h5>
          <div class="form-group">
              <label class="text-dark" for="content">Slug :</label>
              <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{old('slug')}}" required>
              @error('slug')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
              <label class="text-dark" for="content">Meta Title :</label>
              <input type="text" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror" value="{{old('meta_title')}}">
              @error('meta_title')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
              <label class="text-dark" for="content">Meta Keyword :</label>
              <input type="text" name="meta_keyword" class="form-control @error('meta_keyword') is-invalid @enderror" value="{{old('meta_keyword')}}">
              @error('meta_keyword')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
              <label class="text-dark" for="content">Meta Description :</label>
              <textarea id="summernote" class="form-control @error('meta_desc') is-invalid @enderror" name="meta_desc">{{old('meta_desc')}}</textarea>
              @error('meta_desc')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          
          <button type="submit" class="btn btn-primary">Add Product</button>
      </form>
  </div>
</div>
@endsection

@section('script')
<script>
  $('textarea#summernote').summernote({
    placeholder: 'Edit Meta Description',
    tabsize: 2,
    height: 150,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'codeview', 'help']]
    ]
  });
  $('textarea#summernoteDesc').summernote({
    placeholder: 'Edit Description',
    tabsize: 2,
    height: 150,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'codeview', 'help']]
    ]
  });
  $('textarea#summernoteOverview').summernote({
    placeholder: 'Edit Overview',
    tabsize: 2,
    height: 150,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'codeview', 'help']]
    ]
  });
</script>
<script>
  $('.wrapper').on('click', '.remove', function() {
    $('.remove').closest('.wrapper').find('.element').not(':first').last().remove();
  });
  $('.wrapper').on('click', '.clone', function() {
    $('.clone').closest('.wrapper').find('.element').first().clone().appendTo('.results');
  });
</script>
<script type="text/javascript">
var room = 1;
function youtube_fields() {
    room++;
    var objTo = document.getElementById('youtube_fields')
    var divtest = document.createElement("div");
  divtest.setAttribute("class", "form-group removeclass"+room);
  var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="form-row d-flex"><div class="col-sm-9 nopadding col-3"><div class="form-group"><input type="text" class="form-control" name="youtube_url[]" value="" placeholder="Enter Url"></div></div><div class="col-sm-3 nopadding col-3"><div class="form-group"><div class="input-group"><input type="text" value="Youtube" class="form-control" disabled><input type="hidden" name="type[]" value="1"><div class="input-group-btn"><button class="btn btn-danger" type="button" onclick="remove_youtube_fields('+ room +');"> <span class="fa fa-minus" aria-hidden="true"></span> </button></div></div></div></div></div>';    
    objTo.appendChild(divtest)
}
   function remove_youtube_fields(rid) {
     $('.removeclass'+rid).remove();
   }
// 
var room1 = 1;
function upload_fields() {
    room1++;
    var objTo = document.getElementById('upload_fields')
    var divtest = document.createElement("div");
  divtest.setAttribute("class", "form-group removeclassUpload"+room1);
  var rdiv = 'removeclassUpload'+room1;
    divtest.innerHTML = '<div class="form-row d-flex"><div class="col-sm-9 nopadding col-3"><div class="form-group"><input type="file" class="form-control" name="upload_url[]" placeholder="Upload Video"></div></div><div class="col-sm-3 nopadding col-3"><div class="form-group"><div class="input-group"><input type="text" value="Upload" class="form-control" disabled><input type="hidden" name="type1[]" value="2"><div class="input-group-btn"><button class="btn btn-danger" type="button" onclick="remove_upload_fields('+ room1 +');"> <span class="fa fa-minus" aria-hidden="true"></span> </button></div></div></div></div></div>';    
    objTo.appendChild(divtest)
}
   function remove_upload_fields(rid) {
     $('.removeclassUpload'+rid).remove();
   }
</script>
@endsection