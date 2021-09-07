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
    <h3 class="heading">Edit Page</h3>
  </div>
  <div class="card-body">
      <form method="POST" action="{{ route('admin.page.update', $page->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          <div class="form-group">
              <label class="text-dark" for="title">Title :</label>
              <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{$page->title}}" required>
              @error('title')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
              <label class="text-dark" for="content">Content :</label>
              <textarea id="summernote" class="form-control @error('content') is-invalid @enderror" name="content">{{$page->content}}</textarea>
              @error('content')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
              <label class="text-dark" for="image">Banner Image :</label>
              <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
              <input type="hidden" name="hidden_image" value="{{ $page->image }}">
              <div>
                <label class="text-dark">Old Image : </label>
                <img src="{{asset('storage')}}/{{$page->image}}" width="120px">
              </div>
              @error('image')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <br><hr><br>

          <div class="form-group">
              <label class="text-dark" for="slug">Slug :</label>
              <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{$page->slug}}" required>
              @error('slug')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
              <label class="text-dark" for="meta_title">Meta Title :</label>
              <input type="text" name="name" class="form-control @error('meta_title') is-invalid @enderror" value="{{$page->meta_title}}">
              @error('meta_title')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
              <label class="text-dark" for="meta_keyword">Meta Keyword :</label>
              <textarea id="summernote1" class="form-control @error('meta_keyword') is-invalid @enderror" name="meta_keyword">{{$page->meta_keyword}}</textarea>
              @error('meta_keyword')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
              <label class="text-dark" for="meta_desc">Meta Description :</label>
              <textarea id="summernote2" class="form-control @error('meta_desc') is-invalid @enderror" name="meta_desc">{{$page->meta_desc}}</textarea>
              @error('meta_desc')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          
          <button type="submit" class="btn btn-primary">Update Page</button>
      </form>
  </div>
</div>
@endsection

@section('script')
<script>
  $('textarea#summernote').summernote({
    placeholder: 'Edit Content',
    tabsize: 2,
    height: 400,
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
  $('textarea#summernote1').summernote({
    placeholder: 'Edit Keyword',
    tabsize: 2,
    height: 200,
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
  $('textarea#summernote2').summernote({
    placeholder: 'Edit Description',
    tabsize: 2,
    height: 200,
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
