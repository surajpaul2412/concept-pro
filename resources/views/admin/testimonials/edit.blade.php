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
    <h3 class="heading">Edit Testimonial</h3>
  </div>
  <div class="card-body">
      <form method="POST" action="{{ route('admin.testimonials.update', $testimonial->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          <div class="form-group">
              <label class="text-dark" for="content">Name :</label>
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$testimonial->name}}" required>
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
              <label class="text-dark" for="content">Designation :</label>
              <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" value="{{$testimonial->designation}}" required>
              @error('designation')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="form-group">
              <label class="text-dark" for="content">Review :</label>
              <textarea id="summernote" class="form-control @error('review') is-invalid @enderror" name="review">{{$testimonial->review}}</textarea>
              @error('review')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <input type="hidden" name="status" class="form-control @error('status') is-invalid @enderror" value="{{$testimonial->status}}">

          <div class="form-group">
              <label class="text-dark" for="content">Avatar :</label>
              <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror">
              <input type="hidden" name="hidden_avatar" value="{{ $testimonial->avatar }}">
              <div>
                <label class="text-dark">Old Avatar : </label>
                <img src="{{asset('storage')}}/{{$testimonial->avatar}}" width="120px">
              </div>
              @error('avatar')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          
          <button type="submit" class="btn btn-primary">Update Testimonial</button>
      </form>
  </div>
</div>

<script>
  $('#summernote').summernote({
    placeholder: 'Edit Review',
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
