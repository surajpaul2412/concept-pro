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
    <h3 class="heading">Add Testimonial</h3>
  </div>
  <div class="card-body">
      <form method="POST" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data">
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
          <div class="form-group">
              <label class="text-dark" for="content">Designation :</label>
              <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" value="{{old('designation')}}" required>
              @error('designation')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
              <label class="text-dark" for="content">Review :</label>
              <textarea id="summernote" class="form-control @error('review') is-invalid @enderror" name="review">{{old('review')}}</textarea>
              @error('review')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
              <label class="text-dark" for="content">Avatar :</label>
              <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror" value="{{old('avatar')}}" required>
              @error('avatar')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          
          <button type="submit" class="btn btn-primary">Add Testimonial</button>
      </form>
  </div>
</div>
@endsection

@section('script')
<script>
  $('textarea#summernote').summernote({
    placeholder: 'Add Review',
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
