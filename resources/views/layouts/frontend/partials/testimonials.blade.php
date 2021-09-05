@php
$testimonials = \App\Models\Testimonial::where('status',1)->get();
@endphp
<!-- Start: Testimonial Area Section -->        
<section class="section testimonial-area" style="background-image: url(assets/frontend/images/home/testi-bg.jpg);">
    <div class="container"> 
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8"> 
                <div class="wow fadeInUp">   
                    <div class="testimonial-carousel owl-carousel owl-theme text-center">
                        @foreach($testimonials as $testimonial)
                        <div class="item"> 
                            <div class="tesimonial-box quote">
                                <div class="head-info py-3 d-flex justify-content-center align-items-center">
                                    <div class="img">
                                        <img src="{{asset('storage')}}/{{$testimonial->avatar}}" alt="{{$testimonial->name}}"/>
                                    </div>
                                    <div class="title-info">
                                        <h3>{{$testimonial->name}}</h3>
                                        <p>{{$testimonial->designation}}</p>
                                    </div>
                                </div>
                                <div class="content-info">{!!$testimonial->review!!}</div>
                            </div>
                        </div>
                        @endforeach 
                    </div>  
                </div>
            </div> 
        </div>  
    </div>
</section>
<!-- End: Testimonial Area Section -->