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
@if($banners->count())
<div class="table-responsive px-3 pb-5">
  <h3 class="text-dark" align="center">All Banners</h3>
 <table class="table table-striped">
    <thead>
        <tr>
          <th>S. no</th>
          <th>Image</th>
          <th>Sub Heading</th>
          <th>Button</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
    </thead>
    <tbody>
      @foreach($banners as $index => $banner)
      <tr>
        <th>{{$index+1}}.</th>
        <td><img class="border-rad-50" src="{{asset('storage')}}/{{$banner->image}}" width="50px"></td>
        <th>{{$banner->sub_heading}}</th>
        <th>{{$banner->url}}</th>
        <td>
          <a class="badge badge-info p-2 text-white" href="{{ route('admin.banner.edit',$banner->id)}}">
            <i class="material-icons">edit</i>
          </a>
        </td>
        <td>
          <form class="badge badge-danger p-2" action="{{ route('admin.banner.destroy', $banner->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="text-white" type="submit"><i class="material-icons">delete</i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@else
<h3 class="bold text-dark" align="center">No banners</h3>
@endif

@endsection