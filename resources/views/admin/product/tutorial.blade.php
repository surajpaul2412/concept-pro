@extends('layouts.backend.app')

@section('content')
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

<div class="table-responsive px-3 pb-5">
  <h4 align="center">How to add product ?</h4>
    <video width="100%" height="400" controls>
      <source src="/screen-capture.mp4" type="video/mp4">
      <source src="/screen-capture.mp4" type="video/ogg">
    Your browser does not support the video tag.
    </video>
    <br/><br/><br/>
    <div>
        <b>Step1 :</b> Add category if your desired category not present by clicking "add category" from left-side menu.<br/>
        <b>Step2 :</b> Add sub category if you thing you need any sub category inside category by clicking "add sub-category" from left-side menu.<br/>
        <b>Step3 :</b> Start adding product by clicking "add product" from menu.
    </div>
</div>
@endsection