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
    <h3 class="heading">Edit Banner</h3>
  </div>
  <div class="card-body">
      <form method="POST" action="{{ route('admin.banner.update',$banner->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          <div class="form-group">
              <label class="text-dark" for="heading">Heading :</label>
              <textarea id="summernote" class="form-control @error('heading') is-invalid @enderror" name="heading">{{$banner->heading}}</textarea>
              @error('heading')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
              <label class="text-dark" for="sub_heading">Sub Heading :</label>
              <input type="text" name="sub_heading" class="form-control @error('sub_heading') is-invalid @enderror" value="{{$banner->sub_heading}}" required>
              @error('sub_heading')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
              <label class="text-dark" for="order">Order :</label>
              <input type="number" name="order" class="form-control" value="{{$banner->order}}" required>
              @error('order')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
            <label class="text-dark" for="bg">Background :</label>
            <input type="file" name="bg" class="form-control @error('bg') is-invalid @enderror">
            <input type="hidden" name="hidden_bg" value="{{ $banner->bg }}">
            <div>
              <label class="text-dark">Old Background : </label>
              <img src="{{asset('storage')}}/{{$banner->bg}}" width="120px">
            </div>
            @error('bg')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
              <label class="text-dark" for="image">Product Image (800x544)px :</label>
              <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
              <input type="hidden" name="hidden_image" value="{{ $banner->image }}">
              <div>
                <label class="text-dark">Old Product Image : </label>
                <img src="{{asset('storage')}}/{{$banner->image}}" width="120px">
              </div>
              @error('image')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
              <label class="text-dark" for="url">Button Text :</label>
              <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" value="{{$banner->url}}" required>
              @error('url')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
              <label class="text-dark" for="btn_url">Button Url Redirection :</label>
              <input type="text" name="btn_url" class="form-control @error('btn_url') is-invalid @enderror" value="{{$banner->btn_url}}" required>
              @error('btn_url')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          
          <button type="submit" class="btn btn-primary">Update banner</button>
      </form>
  </div>
</div>
@endsection

@section('script')
<script>
  $('textarea#summernote').summernote({
    placeholder: 'Update Heading',
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
@endsection
