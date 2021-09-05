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
    <h3 class="heading">Add New Section</h3>
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
      <form method="POST" action="{{ route('admin.siteSolutionSection.store') }}" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
              <label class="text-dark" for="heading">Heading :</label>
              <input type="text" class="form-control" name="heading" value="{{old('heading')}}" required/>
              @error('heading')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>

          <div class="form-group">
              <label class="text-dark" for="content">Content :</label>
              <textarea id="summernote" class="form-control @error('content') is-invalid @enderror" name="content">{{old('content')}}</textarea>
              @error('content')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>

          <label class="text-dark" for="image">Upload Image (825x600)px:</label>
          <div class="form-group input-group">
            <label class="text-dark" for="image">Upload Image:</label>
            <input type="file" class="form-control imgInp custom-file-input" name="image" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01"/>
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            <div class="row">
              <div class="col-md-12" id="img_contain">
                <img id="previewImage" align='middle' src="" width="90px"  class="pt-3"/>
              </div>
            </div>
          </div>
          
          <button type="submit" class="btn btn-primary">Add new Section</button>
      </form>
  </div>
</div>

<script>
  $('#summernote').summernote({
    placeholder: 'Add Content',
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
