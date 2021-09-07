@extends('layouts.frontend.app')
@section('title')
<title>{{$page->meta_title}}</title>
<meta name="keywords" content="{{$page->meta_keyword}}">
<meta name="description" content="{{$page->meta_desc}}">
@endsection

@section('content')
<!-- Start: Page Banner --> 
<section class="section page-banner overlay" style="background-image: url('{{asset('storage')}}/{{$page->image}}')">
    <div class="container"> 
        <div class="row justify-content-center align-items-center"> 
            <div class="col-md-8 page-heading text-center"> 
                <h1 class="text-white">{{$page->title}}</h1>  
            </div>
        </div>
    </div>
</section>
<!-- End: Page Banner -->   

<!-- Start: About Section -->        
<section class="section product-area">
    <div class="container">   
        <div class="row row-cols-1 row-cols-md-3 row-cols-xl-3">
            {!!$page->content!!}
        </div>  
    </div>
</section>
<!-- End: About Section -->
@include('layouts.frontend.partials.training')  
@endsection