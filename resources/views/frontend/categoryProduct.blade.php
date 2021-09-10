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
                <h1 class="text-white">{{$categoryItem->name}} Product</h1>  
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
                                        <li><a href="{{route('categories.product',$item->slug)}}">{{$item->name}}</a></li>
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
                <div class="row row-cols-1 row-cols-md-3 row-cols-xl-3">
                    @if($products->count())
                    @foreach($products as $item)
                    <div class="col">
                        <div class="product-box">
                            <a href="{{route('product.detail',$item->slug)}}">
                                <img class="img-fluid" src="{{asset('storage')}}/{{$item->image}}" alt="{{$item->name}}"/>
                                <p>{{$item->name}}</p>
                            </a>
                        </div> 
                    </div>
                    @endforeach
                    @else
                    <div class="row">
                        <div class="col" align="center">
                            No Products listed.
                        </div>
                    </div>
                    @endif
                </div> 
            </div>
        </div>  
    </div>
</section>
<!-- Start: End Section -->
@include('layouts.frontend.partials.training')  

@endsection

@section('script')
@endsection
