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
                <h1 class="text-white">{{$category->name}} Product</h1>  
            </div>
        </div>
    </div>
</section>
<!-- End: Page Banner -->    

<!-- Start: fliter Bar Section -->   
<section class="filter-bar">
    <div class="container">  
        <div class="d-flex justify-content-between align-items-center">
            <div class="left">
                <p class="text-uppercase"> <a id="hideButton" href="#">Hide Filters</a></p>
            </div>
            <div class="right">
                <label for="">SORT BY:</label>
                <select>
                    <option value=""> Price Low To High</option>
                    <option value=""> Price High To Low</option> 
                </select>
            </div>
        </div>
    </div>
</section>    

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
                <div class="row row-cols-1 row-cols-md-3 row-cols-xl-3">
                    @if($category->categoryItems->count())
                    @else
                        @if($products->count())
                            @foreach($products as $product)
                            <div class="col">
                                <div class="product-box">
                                    <a href="{{route('product.detail',$product->slug)}}">
                                        <img class="img-fluid" src="{{asset('storage')}}/{{$product->image}}" alt="{{$product->name}}"/>
                                        <p>{{$product->name}}</p>
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
