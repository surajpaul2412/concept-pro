@extends('layouts.frontend.app')
@section('title')
<title>Concept Pro | Case Studies</title>
@endsection

@section('css')
@endsection

@section('content')
<!-- Start: Page Banner --> 
<section class="section page-banner overlay" style="background-image: url('assets/frontend/images/site/site-bg.jpg')">
    <div class="container"> 
        <div class="row justify-content-center align-items-center"> 
            <div class="col-md-8 page-heading text-center"> 
                <h1 class="text-white">Case Studies</h1>  
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
                        <h3 class="text-uppercase">Case <span class="green">Studies</span></h3> 
                    </div>  
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque massa ligula, posuere eu tortor non, efficitur malesuada augue. Maecenas tellus neque, semper eu ex ut, vestibulum blandit lectus. </p> 
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of. </p> 
                </div>  
            </div>   
        </div>  
    </div>
</section>
<!-- Start: End Section -->     

<!-- Start: Section -->  
<section class="bg-gray bg" style="background-image: url('assets/frontend/images/case-studies/1.jpg')">
        <div class="row row-cols-1 row-cols-md-2 align-items-center"> 
            <div class="col py-5"> 
                <div class="container c-px-7">  
                    <div class="section-title mb-0 p-0">
                        <h3 class="text-uppercase">The <span class="txt-green">Client</span></h3> 
                    </div>    
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>     
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release.</p>    
                </div>         
            </div>   
            <div class="col">  
                <img class="img-fluid mb-2" src="assets/frontend/images/case-studies/1.jpg" alt="" />
            </div>   
        </div> 
</section>         
<section class="section-sm">
    <div class="container">   
        <div class="row"> 
            <div class="col-md-12">
                <div class="content"> 
                    <div class="section-title mb-0 p-0">
                        <h3 class="text-uppercase">Our <span class="green">Aim</span></h3> 
                    </div>  
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque massa ligula, posuere eu tortor non, efficitur malesuada augue. Maecenas tellus neque, semper eu ex ut, vestibulum blandit lectus. </p> 
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of. </p> 
                </div>  
            </div>   
        </div>  
    </div>
</section>          
<section class="bg-gray bg" style="background-image: url('assets/frontend/images/case-studies/2.jpg')">
        <div class="row row-cols-1 row-cols-md-2 align-items-center"> 
            <div class="col py-5 bg-gradient"> 
                <div class="container c-px-7 text-white">   
                    <div class="section-title mb-0 p-0">
                        <h3 class="text-uppercase">The Results </h3> 
                    </div>    
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release.</p>     
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release.</p>   
                </div>         
            </div>   
            <div class="col">  
                <img class="img-fluid mb-2" src="assets/frontend/images/case-studies/2.jpg" alt="" />
            </div>   
        </div> 
</section>         
<!-- Start: End Section --> 

<!-- Start: Counter Section -->        
<section class="section-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="counter">
                    <img src="assets/frontend/images/case-studies/i-1.png" alt="">
                    <p><span class="counter-value">92</span>%</p>
                    <h3>Increased Security</h3>
                </div>
            </div> 
            <div class="col-md-4 col-sm-6">
                <div class="counter">
                    <img src="assets/frontend/images/case-studies/i-2.png" alt="">
                    <p><span class="counter-value">72</span>%</p>
                    <h3>Increased Safety</h3>
                </div>
            </div> 
            <div class="col-md-4 col-sm-6">
                <div class="counter">
                    <img src="assets/frontend/images/case-studies/i-3.png" alt="">
                    <p><span class="counter-value">80</span>%</p>
                    <h3>Increased Coverage</h3>
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
