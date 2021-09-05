@extends('layouts.backend.app')

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
    <h3 class="heading">Edit Sub Category</h3>
  </div>
  <div class="card-body">
      <form method="POST" action="{{ route('admin.category.updateSubCategory',$id) }}" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          <div class="form-group">
              <label class="text-dark" for="content">Name :</label>
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$category->name}}" required>
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <input type="hidden" name="id" class="form-control @error('id') is-invalid @enderror" value="{{$category->category_id}}" required>
          <div class="form-group">
              <label class="text-dark" for="content">Sort Order :</label>
              <input type="number" name="order" class="form-control @error('order') is-invalid @enderror" value="{{$category->order}}" required>
              @error('order')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
              <label class="text-dark" for="content">Product Image :</label>
              <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
              <input type="hidden" name="hidden_image" value="{{ $category->image }}">
              <div>
                <label class="text-dark">Old Image : </label>
                <img src="{{asset('storage')}}/{{$category->image}}" width="120px">
              </div>
              @error('image')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>

          <div class="form-group">
              <label class="text-dark" for="content">Slug :</label>
              <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{$category->slug}}" required>
              @error('slug')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
              <label class="text-dark" for="content">Meta Title :</label>
              <input type="text" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror" value="{{$category->meta_title}}">
              @error('meta_title')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
              <label class="text-dark" for="content">Meta Keyword :</label>
              <input type="text" name="meta_keyword" class="form-control @error('meta_keyword') is-invalid @enderror" value="{{$category->meta_keyword}}">
              @error('meta_keyword')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
              <label class="text-dark" for="content">Meta Description :</label>
              <textarea id="summernote" class="form-control @error('meta_desc') is-invalid @enderror" name="meta_desc">{{$category->meta_desc}}</textarea>
              @error('meta_desc')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          
          <button type="submit" class="btn btn-primary">Update Sub Category</button>
      </form>
  </div>
</div>

<script>
  $('#summernote').summernote({
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
</script>
@endsection
