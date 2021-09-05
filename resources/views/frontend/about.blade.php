@extends('layouts.frontend.app')
@section('title')
<title>About Us</title>
@endsection

@section('content')
<!-- Start: Page Banner --> 
<section class="section-xl page-banner" style="background-image: url('assets/frontend/images/about/about-bg.jpg')">
    <div class="container"> 
        <div class="row justify-content-center align-items-center"> 
            <div class="col-md-8 text-center"> 
                <h1 class="text-white">ABOUT CONCEPT PRO</h1>
            </div>
        </div>
    </div>
</section>
<!-- End: Page Banner -->   

<!-- Start: About Section -->        
<section class="section about-area">
    <div class="container"> 
        <div class="row align-items-center">
            <div class="col-md-6"> 
                <div class="heading style-1 py-3 text-center text-md-start">
                    <h2>THE CONCEPT<br />
                    IS SIMPLE<br />
                    <span class="green"> WE’RE THE BEST<br />
                    AT WHAT WE DO<br />
                    </span>
                    </h2>
                    <p>Get secure today with the best in tech. Whatever you need we’ve got you covered</p> 
                </div>
            </div>
            <div class="col-md-6">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of </p>
                <p></p>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to.</p>
            </div>  
        </div> 

        <div class="row align-items-center mt-5">
            <div class="col-md-6"> 
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of </p>
                <p></p>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to.</p> 
            </div>
            <div class="col-md-6 text-center">  
                <img class="img-fluid" src="assets/frontend/images/about/about-concept.jpg" alt="" />
            </div>  
        </div>  
    </div>
</section>
<!-- End: About Section -->

@include('layouts.frontend.partials.training')  

<!-- Start: Our Journey Section -->        
<section class="section our-journey-area">
    <div class="container"> 
        <div class="row justify-content-center align-items-center"> 
            <div class="col-md-12">  
                <div class="section-title text-center">
                    <h1>Our <span>Journey</span></h1> 
                </div>
            </div>
        </div>
        <div class="row justify-content-center align-items-center"> 
            <div class="col-md-10">  
                <img class="img-fluid" src="assets/frontend/images/about/about-videos.jpg" alt="" />
            </div>  
        </div> 
        
        <div class="row justify-content-center align-items-center mt-5"> 
            <div class="col-md-12">  
                <div class="section-title text-center mb-0 p-0">
                    <h1>What our clients say <span>about us?</span></h1> 
                </div>
            </div>
        </div> 
    </div>
</section>
<!-- End: Our Journey Section -->

@include('layouts.frontend.partials.testimonials')  

@endsection