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
    font-size: 12px !important;
  }
  button{
    border: none;
    background: transparent;
  }
</style>
@if($pages->count())
<div class="table-responsive px-3 pb-5">
  <h3 class="text-dark" align="center">{{$pages->count()}} pages</h3>
 <table class="table table-striped">
    <thead>
        <tr>
          <th>S. no</th>
          <th>Title</th>
          <th>Image</th>
          <th>slug</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
    </thead>
    <tbody>
      @foreach($pages as $index => $page)
      <tr>
        <th>{{$index+1}}.</th>
        <th>{{$page->title}}</th>
        <td><img class="" src="{{asset('storage')}}/{{$page->image}}" width="50px"></td>
        <th>{{$page->slug}}</th>
        <td>
          <a href="{{ route('admin.page.edit',$page->id)}}">
            <i class="material-icons">edit</i>
          </a>
        </td>
        <td>
          <form action="{{ route('admin.page.destroy', $page->id)}}" method="post">
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
<h3 class="bold text-dark" align="center">No pages</h3>
@endif
@endsection