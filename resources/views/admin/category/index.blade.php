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
@if($categories->count())
<div class="table-responsive px-3 pb-5">
  <h3 class="text-dark" align="center">{{$categories->count()}} Category</h3>
 <table class="table table-striped">
    <thead>
        <tr>
          <th>S. no</th>
          <th>Order no</th>
          <th>Image</th>
          <th>Name</th>
          <th>Sub Category</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
    </thead>
    <tbody>
      @foreach($categories as $index => $category)
      <tr>
        <th>{{$index+1}}.</th>
        <th>{{$category->order}}</th>
        <td><img class="" src="{{asset('storage')}}/{{$category->image}}" width="50px"></td>
        <th>{{$category->name}}</th>
        <th>
          <a href="{{ route('admin.category.show',$category->id)}}" class="badge badge-success">
            {{$category->categoryItems->count()}} item
          </a>
        </th>
        <td>
          <a href="{{ route('admin.category.edit',$category->id)}}">
            <i class="material-icons">edit</i>
          </a>
        </td>
        <td>
          <form action="{{ route('admin.category.destroy', $category->id)}}" method="post">
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
<h3 class="bold text-dark" align="center">No Category</h3>
@endif
@endsection