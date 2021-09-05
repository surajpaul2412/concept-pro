@extends('layouts.frontend.app')
@section('title')
<title>Concept Pro | Company Profile</title>
@endsection

@section('css')
@endsection

@section('content')
<!-- Start: Page Banner --> 
<section class="section page-banner overlay" style="background-image: url('assets/frontend/images/products/product-bg.jpg')">
    <div class="container"> 
        <div class="row justify-content-center align-items-center"> 
            <div class="col-md-8 page-heading text-center"> 
                <h1 class="text-white">Company Profile</h1>  
            </div>
        </div>
    </div>
</section>
<!-- End: Page Banner -->   

<!-- Start: About Section -->        
<section class="section-sm">
    <div class="container">   
        <div class="row"> 
            <div class="col-md-12">
                <div class="content"> 
                    <div class="section-title mb-0 p-0">
                        <h3 class="text-uppercase">Our <span class="green">Story</span></h3> 
                    </div>  
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque massa ligula, posuere eu tortor non, efficitur malesuada augue. Maecenas tellus neque, semper eu ex ut, vestibulum blandit lectus. </p> 
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of. </p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to.</p> 
                </div> 
                <div class="content mt-5"> 
                    <div class="section-title mb-0 p-0">
                        <h3 class="text-uppercase">Our <span class="green">Mission</span></h3> 
                    </div>  
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque massa ligula, posuere eu tortor non, efficitur malesuada augue. Maecenas tellus neque, semper eu ex ut, vestibulum blandit lectus. </p> 
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of. </p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to.</p> 
                </div> 
                <div class="content mt-5"> 
                    <div class="section-title mb-0 p-0">
                        <h3 class="text-uppercase">Our <span class="green">Timeline</span></h3> 
                    </div>  
                    
                    <div class="timeline py-5"> 
                        <ul class="d-flex justify-content-center align-items-center text-center">
                            <li>
                                <p>Lorem Ipsum Dolor Sit Amet</p>
                                <i></i>
                                <h3>2002</h3>
                            </li>
                            <li>
                                <h3>2008</h3>
                                <i></i>
                                <p>Lorem Ipsum Dolor Sit Amet</p>
                            </li>
                            <li>
                                <p>Lorem Ipsum Dolor Sit Amet</p>
                                <i></i>
                                <h3>2012</h3>
                            </li>
                            <li>
                                <h3>2014</h3>
                                <i></i>
                                <p>Lorem Ipsum Dolor Sit Amet</p>
                            </li>
                            <li>
                                <p>Lorem Ipsum Dolor Sit Amet</p>
                                <i></i>
                                <h3>2020</h3>
                            </li>
                        </ul> 
                    </div>  
                    
                    <div class="row justify-content-center align-items-start mt-5"> 
                        <div class="col-md-6">
                            <div class="row"> 
                                <div class="col-md-12"><img class="img-fluid mb-3" src="assets/frontend/images/c-profile/1.jpg" alt="" /></div>
                                <div class="col-md-12"><img class="img-fluid mb-3" src="assets/frontend/images/c-profile/2.jpg" alt="" /></div>
                            </div>
                        </div> 
                        <div class="col-md-6"><img class="img-fluid" src="assets/frontend/images/c-profile/3.jpg" alt="" /></div>
                    </div>

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
