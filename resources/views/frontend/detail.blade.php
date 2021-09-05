@extends('layouts.frontend.app')
@section('title')
<title>Concept Pro</title>
@endsection

@section('css')
@endsection

@section('content')
<!-- Start: Page Banner --> 
<section class="section page-banner overlay" style="background-image: url('assets/frontend/images/products/product-bg.jpg')">
    <div class="container"> 
        <div class="row justify-content-center align-items-center"> 
            <div class="col-md-8 page-heading text-center"> 
                <h1 class="text-white">{{$product->name}}</h1>  
            </div>
        </div>
    </div>
</section>
<!-- End: Page Banner --> 

<!-- Start: About Section -->        
<section class="section-sm single-product-area">
    <div class="container">   
        <div class="row">
            <div class="col-md-3">
                <div id="proList" class="product-filter">   
                    <ul id="sideNav" class="product-listing">
                        @foreach($categories as $key => $item)
                            @if($item->categoryItems->count())
                                <li><a href="javascript:void(0);">{{$item->name}} <i class="it ti-plus"></i></a>
                                    <ul class="sidebar-sub-menu">
                                        @foreach($item->categoryItems as $index => $item)
                                        <li><a href="{{$item->slug}}">{{$item->name}}</a></li>
                                        @endforeach
                                    </ul> 
                                </li>
                            @else
                                <li><a href="javascript:void(0);">{{$item->name}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>  
            <div class="col-md-9">
                <div class="row justify-content-start align-items-center product-detail-box">
                    <div class="col-md-6">
                        <h3>{{$product->name}}</h3>
                        <p><b>SKU:</b> {{$product->SKU}} </p> 
                        <h5>Key Features</h5>
                       {!!$product->description!!}
                       <div class="mt-4">
                            <a href="{{$product->url}}" target="_blank" class="btn text-white" style="background: #000;">HOW TO BUY</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img class="img-fluid" src="{{asset('storage')}}/{{$product->image}}" alt="{{$product->name}}"/>
                    </div> 
                </div> 
            </div>
        </div>  
    </div>
</section>
<!-- Start: End Section -->   

<!-- Start: hr Section -->   
<section class="hr-area">
    <div class="container">  
        <hr>
    </div>
</section>  

<!-- Start: About Section -->        
<section class="section-sm single-product-area">
    <div class="container">   
        <div class="row"> 
            <div class="col-md-3"></div>  
            <div class="col-md-9">
                <div class="overview"> 
                    <h3>Overview</h3>
                    {!!$product->overview!!}
                </div> 
                @if($product->productDownloads->count())
                <div class="downloads-content-area mt-5"> 
                    <h3>Downloads</h3> 
                    <ul class="d-flex justify-content-start align-items-center">
                        @foreach($product->productDownloads as $download)
                        <li>
                            <a class="btn btn-pdf" href="{{asset('storage')}}/{{$download->url}}" download> <img src="{{asset('assets/frontend/images/icons/i-pdf.png')}}" alt="" /> {{$download->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if($product->productVideos->count())
                <div class="videos-content-area mt-5"> 
                    <h3>Product Videos</h3>  

                    <div class="row row-cols-1 row-cols-md-2">
                        @foreach($product->productVideos as $video)
                        <div class="col">
                            @if($video->type == 1)
                                <iframe width="100%" height="300"
                                src="https://www.youtube.com/embed/{{$video->url}}">
                                </iframe>
                            @else
                                <video width="100%" height="300" controls>
                                  <source src="{{asset('storage')}}/{{$video->url}}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>   
        </div>  
    </div>
</section>
<!-- Start: End Section -->
@include('layouts.frontend.partials.training')  

@endsection

@section('script')
@endsection
