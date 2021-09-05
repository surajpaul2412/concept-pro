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
    color: #6bb51e;
  }
  td{
    font-size: 13px !important;
  }
  button{
    border: none;
    background: transparent;
  }
</style>
@if($siteSolutionSection->count())
<div class="table-responsive px-3 pb-5">
 <table class="table table-striped">
    <thead>
        <tr>
          <th>S. no</th>
          <th>Image</th>
          <th>Heading</th>
          <th>Content</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
    </thead>
    <tbody>
      @foreach($siteSolutionSection as $index => $new)
      <tr>
        <th>{{$index+1}}.</th>
        <td><img src="{{asset('storage')}}/{{$new->image}}" width="80px"></td>
        <td class="text-success bold">{{$new->heading}}</td>
        <td>{!!$new->content!!}</td>
        <td>
          <a href="{{ route('admin.siteSolutionSection.edit',$new->id)}}">
            <i class="material-icons">edit</i>
          </a>
        </td>
        <td>
          <form action="{{ route('admin.siteSolutionSection.destroy', $new->id)}}" method="post">
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
<h3 class="bold text-dark" align="center">Add Site Solution Section</h3>
@endif

<div align="right" style="position: fixed;bottom: 30px;right: 30px;">
  <a href="{{ route('admin.siteSolutionSection.create')}}">
    <button class="btn px-5 pt-3" style="background: #1d1b27;color:#fff;">Add New Site Solution Section 
      <img class="pl-3" src="{{ asset('assets/backend/images/right-arrow.png') }}">
    </button>
  </a>
</div>
@endsection