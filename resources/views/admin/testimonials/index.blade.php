@extends('layouts.backend.app')

@section('content')

@if(session()->get('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}  
  </div><br/>
@endif
@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif
<style>
  th{
    font-size: 13px !important;
    font-weight: bold !important;
    color: #000;
  }
  td{
    font-size: 13px !important;
  }
  button{
    border: none;
    background: transparent;
  }
  .border-rad-50{
    border-radius: 50%;
  }
</style>
@if($testimonials->count())
<div class="table-responsive px-3 pb-5">
  <h3 class="text-dark" align="center">Testimonials</h3>
 <table class="table table-striped">
    <thead>
        <tr>
          <th>S. no</th>
          <th>Image</th>
          <th>Name</th>
          <th>Designation</th>
          <th>status</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
    </thead>
    <tbody>
      @foreach($testimonials as $index => $testimonial)
      <tr>
        <th>{{$index+1}}.</th>
        <td><img class="border-rad-50" src="{{asset('storage')}}/{{$testimonial->avatar}}" width="50px"></td>
        <th>{{$testimonial->name}}</th>
        <th>{!!$testimonial->name!!}</th>
        <td>
          @if($testimonial->status == 1)
          <a class="btn btn-success" href="{{ route('admin.testimonials.deactivate',$testimonial->id)}}">
            Activated
          </a>
          @else
          <a class="btn btn-danger" href="{{ route('admin.testimonials.activate',$testimonial->id)}}">
            De-activated
          </a>
          @endif
        </td>
        <td>
          <a href="{{ route('admin.testimonials.edit',$testimonial->id)}}">
            <i class="material-icons">edit</i>
          </a>
        </td>
        <td>
          <form action="{{ route('admin.testimonials.destroy', $testimonial->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="" type="submit"><i class="material-icons">delete</i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@else
<h3 class="bold text-dark" align="center">No Testimonials</h3>
@endif

@endsection