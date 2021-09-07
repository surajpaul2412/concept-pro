@extends('layouts.frontend.app')
@section('title')
@if($siteSolution)
<title>Concept Pro | {{$siteSolution->meta_title}}</title>
<meta name="keyword" content="{!!$siteSolution->meta_keyword!!}">
<meta name="description" content="{!!$siteSolution->meta_desc!!}">
@endif
@endsection

@section('css')
@endsection

@section('content')
<!-- Start: Page Banner --> 
<section class="section page-banner overlay" style="background-image: url('assets/frontend/images/site/site-bg.jpg')">
    <div class="container"> 
        <div class="row justify-content-center align-items-center"> 
            <div class="col-md-8 page-heading text-center"> 
                <h1 class="text-white">Site Solutions</h1>  
            </div>
        </div>
    </div>
</section>
<!-- End: Page Banner -->   

<!-- Start: About Section -->
@if($siteSolution)
<section class="section-sm">
    <div class="container">   
        <div class="row"> 
            <div class="col-md-12">
                <div class="content"> 
                    <div class="section-title mb-0 p-0">
                        <h3 class="text-uppercase"><span class="green">{{$siteSolution->heading}}</span></h3>
                    </div>  
                    {!!$siteSolution->content!!}
                </div>  
            </div>   
        </div>  
    </div>
</section>
@endif
<!-- Start: End Section -->     

<!-- Start: Section -->           
<section class="bg-gray bg" style="background-image: url('assets/frontend/images/site/1.jpg')">
    <div class="container">   
        <div class="row align-items-center"> 
            <div class="col-md-6 py-5">  
                <ul>
                    <li> <h3 class="text-uppercase"><i class="ti ti-angle-right txt-green"></i> CCTV</h3></li>
                    <li> <h3 class="text-uppercase"><i class="ti ti-angle-right txt-green"></i> Site Connect</h3></li>
                    <li> <h3 class="text-uppercase"><i class="ti ti-angle-right txt-green"></i> Fencing</h3></li>
                    <li> <h3 class="text-uppercase"><i class="ti ti-angle-right txt-green"></i> Access Control</h3></li>
                    <li> <h3 class="text-uppercase"><i class="ti ti-angle-right txt-green"></i> Temp Screening</h3></li>
                </ul> 
            </div>   
            <div class="col-md-6 d-block d-md-none">  
                <img class="img-fluid mb-2" src="assets/frontend/images/site/1.jpg" alt="" /> 
            </div>   
        </div>  
    </div>
</section>
@if($siteSolutionSection->count())
    @foreach($siteSolutionSection as $key => $item)
    @if($key % 2 == 0)
    <section class="section-sm">
        <div class="container">   
            <div class="row"> 
                <div class="col-md-6"> 
                    <div class="section-title mb-0 p-0">
                        <h3 class="text-uppercase">{{$item->heading}} </h3>
                    </div>    
                    {!!$item->content!!}
                </div>   
                <div class="col-md-6"> 
                    <img class="img-fluid mb-2" src="{{asset('storage')}}/{{$item->image}}" alt="{{$item->heading}}" />
                </div>   
            </div>  
        </div>
    </section>
    @else
    <section class="section-sm">
        <div class="container">   
            <div class="row">  
                <div class="col-md-6"> 
                    <img class="img-fluid mb-2" src="{{asset('storage')}}/{{$item->image}}" alt="{{$item->heading}}" />
                </div>  
                <div class="col-md-6"> 
                    <div class="section-title mb-0 p-0">
                        <h3 class="text-uppercase"><span class="green">{{$item->heading}}</span></h3> 
                    </div>   
                    {!!$item->content!!}
                </div>   
            </div>  
        </div>
    </section>
    @endif
    @endforeach
@endif

<section class="bg-gray bg" style="background-image: url('assets/frontend/images/site/7.jpg')">
    <div class="container">   
        <div class="row align-items-center"> 
            <div class="col-md-6 py-5"> 
                <div class="section-title mb-0 p-0">
                    <h3 class="text-uppercase">The Results </h3> 
                </div>    
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of. </p>     
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of. </p>   
            </div>   
            <div class="col-md-6 d-block d-md-none">  
                <img class="img-fluid mb-2" src="assets/frontend/images/site/7.jpg" alt="" />
            </div>   
        </div>  
    </div>
</section>         
<!-- Start: End Section -->
@include('layouts.frontend.partials.training')  
@endsection

@section('script')
@endsection
