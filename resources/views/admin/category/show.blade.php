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
@if($category->categoryItems->count())
<div class="table-responsive px-3 pb-5">
  <h3 class="text-dark" align="center">{{$category->categoryItems->count()}} Sub Category</h3>
 <table class="table table-striped">
    <thead>
        <tr>
          <th>S. no</th>
          <th>Order no</th>
          <th>Image</th>
          <th>Name</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
    </thead>
    <tbody>
      @foreach($category->categoryItems as $index => $item)
      <tr>
        <th>{{$index+1}}.</th>
        <td>{{$item->order}}.</td>
        <td><img class="" src="{{asset('storage')}}/{{$item->image}}" width="50px"></td>
        <td>{{$item->name}}.</td>
        <td>
          <a href="{{ route('admin.category.editSubCategory',$item->id)}}">
            <i class="material-icons">edit</i>
          </a>
        </td>
        <td>
          <form action="{{ route('admin.category.destroySubCategory', $item->id)}}" method="post">
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
<h3 class="bold text-dark" align="center">No Sub Category</h3>
@endif

<div align="right" style="position: fixed;bottom: 30px;right: 30px;">
  <a href="{{ route('admin.category.createSubCategory',$category->id)}}">
    <button class="btn px-5 pt-3" style="background: #1d1b27;color:#fff;">Add Sub Category 
      <img class="pl-3" src="{{ asset('assets/backend/images/right-arrow.png') }}">
    </button>
  </a>
</div>
@endsection