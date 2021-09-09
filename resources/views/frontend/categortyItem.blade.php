@extends('layouts.frontend.app')
@section('title')
<title>Concept Pro | Categories</title>
@endsection

@section('css')
@endsection

@section('content')
<!-- Start: Page Banner --> 
<section class="section page-banner overlay" style="background-image: url('assets/frontend/images/products/product-bg.jpg')">
    <div class="container"> 
        <div class="row justify-content-center align-items-center"> 
            <div class="col-md-8 page-heading text-center"> 
                <h1 class="text-white">{{$category->name}}</h1>  
            </div>
        </div>
    </div>
</section>
<!-- End: Page Banner -->   

<!-- Start: About Section -->        
<section class="section product-area">
    <div class="container">   
        <div class="row row-cols-1 row-cols-md-3 row-cols-xl-3">
            @foreach($category->categoryItems as $item)
                <div class="col">
                    <div class="product-box">
                        <a href="{{route('categories.product',$item->slug)}}">
                            <img class="img-fluid" src="{{asset('storage')}}/{{$item->image}}" alt="{{$item->name}}"/>
                            <p>{{$item->name}}</p>
                        </a>
                    </div> 
                </div> 
            @endforeach
        </div>  
    </div>
</section>
<!-- End: About Section -->
@include('layouts.frontend.partials.training')  

@endsection

@section('script')
@endsection
