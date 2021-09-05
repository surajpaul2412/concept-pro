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
@if($products->count())
<div class="table-responsive px-3 pb-5">
  <h3 class="text-dark" align="center">{{$products->count()}} Products</h3>
 <table class="table table-striped">
    <thead>
        <tr>
          <th>S. no</th>
          <th>Order no</th>
          <th>Image</th>
          <th>Name</th>
          <th>Category</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
    </thead>
    <tbody>
      @foreach($products as $index => $category)
      <tr>
        <th>{{$index+1}}.</th>
        <th>{{$category->order}}</th>
        <td><img class="" src="{{asset('storage')}}/{{$category->image}}" width="50px"></td>
        <th>{{$category->name}}</th>
        <th>
          <a class="badge badge-success">
            {{$category->category->name}}
            @if($category->categoryItem)
              > {{$category->categoryItem->name}}
            @endif
          </a>
        </th>
        <td>
          <a href="{{ route('admin.product.edit',$category->id)}}">
            <i class="material-icons">edit</i>
          </a>
        </td>
        <td>
          <form action="{{ route('admin.product.destroy', $category->id)}}" method="post">
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
<h3 class="bold text-dark" align="center">No Products</h3>
@endif
@endsection