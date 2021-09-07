@extends('layouts.frontend.app')
@section('title')
<title>{{$page->meta_title}}</title>
<meta name="keywords" content="{{$page->meta_keyword}}">
<meta name="description" content="{{$page->meta_desc}}">
@endsection

@section('content')
<!-- Start: Page Banner --> 
<section class="section-xl page-banner" style="background-image: url('{{asset('storage')}}/{{$page->image}}')">
    <div class="container"> 
        <div class="row justify-content-center align-items-center"> 
            <div class="col-md-8 text-center"> 
                <h1 class="text-white">{{$page->title}}</h1>
            </div>
        </div>
    </div>
</section>
<!-- End: Page Banner -->   

<!-- Start: About Section -->        
{!!$page->content!!}
<!-- End: About Section -->

@include('layouts.frontend.partials.training')  
@endsection