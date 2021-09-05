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
    <h3 class="heading">Edit Site Solution</h3>
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br/>
    @endif
      <form method="post" action="{{ route('admin.siteSolution.update', $siteSolution->id) }}" enctype="multipart/form-data">
          @method('PATCH')
          @csrf
          <div class="form-group">
              <label class="text-dark" for="heading">Heading :</label>
              <input type="text" class="form-control" name="heading" value="{{$siteSolution->heading}}" />
          </div>
          <div class="form-group">
            <label class="text-dark" for="content">Content :</label>
            <textarea id="summernote" class="form-control" name="content" value="{{ $siteSolution->content }}">{!! $siteSolution->content !!}</textarea>
          </div>

          <div class="form-group">
              <label class="text-dark" for="heading">meta_title :</label>
              <input type="text" class="form-control" name="meta_title" value="{{$siteSolution->meta_title}}" />
          </div>
          <div class="form-group">
              <label class="text-dark" for="heading">meta_keyword :</label>
              <input type="text" class="form-control" name="meta_keyword" value="{{$siteSolution->meta_keyword}}" />
          </div>
          <div class="form-group">
              <label class="text-dark" for="heading">meta_desc :</label>
              <textarea id="summernote1" class="form-control" name="meta_desc">{!!$siteSolution->meta_desc!!}</textarea>
          </div>
          
          <button type="submit" class="btn btn-primary">Edit Content</button>
      </form>
  </div>
</div>

<script>
  $('#summernote').summernote({
    placeholder: 'Edit Content',
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
  $('#summernote1').summernote({
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
