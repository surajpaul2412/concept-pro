@php
    $categories = \App\Models\Category::orderBy('order','asc')->get();
    $banners = \App\Models\Banner::orderBy('order','asc')->get();
@endphp
<!doctype html>
<html class="no-js" lang="en"> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>Home | Concept Pro</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/frontend/images/favicon.png')}}" />
    <!-- All CSS Here --> 
    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}" />  
    <link rel="stylesheet" href="{{asset('assets/frontend/css/animate.css')}}" />  
    <link rel="stylesheet" href="{{asset('assets/frontend/css/themify-icons.css')}}" /> 
    <link rel="stylesheet" href="{{asset('assets/frontend/css/jquery.fancybox.min.css')}}" />   
    <link rel="stylesheet" href="{{asset('assets/frontend/css/owl.carousel.min.css')}}" /> 
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}" />
</head>
<body>
    <div id="wrapper" class="wrapper">
        <!-- Start: Header Section -->
        <header id="header" class="main-header">
            <div class="top-header"> </div>
            <div id="main-nav" class="main-nav">
                <div class="container"> 
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="./">
                            <img class="img-fluid" src="{{asset('assets/frontend/images/logo.png')}}" />
                        </a> 
                        <button id="nav-toggle" class="navbar-toggler navbar-light collapsed" type="button">
                            <span class="ti-minus top-bar"></span>
                            <span class="ti-minus middle-bar"></span>
                            <span class="ti-minus bottom-bar"></span>
                        </button>  
                        <div id="desktopNav" class="collapse navbar-collapse navbar-light justify-content-end d-none d-lg-block">  
                            <ul class="navbar-nav">
                                <li class="nav-item active"><a class="nav-link" href="{{url('/')}}">Home</a></li>
                                <li class="nav-item has-children">
                                    <a class="nav-link" href="#">Products</a>
                                    <ul class="sub-menu">
                                        @foreach($categories as $category)
                                        <li class="nav-item has-children">
                                            <a class="nav-link" href="{{url('categories')}}">{{$category->name}}</a>
                                            @if($category->categoryItems->count())
                                            <ul class="sub-menu">
                                                @foreach($category->categoryItems as $item)
                                                <li class="nav-item"><a class="nav-link" href="{{url('categories')}}/{{$category->slug}}">{{$item->name}}</a></li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item has-children">
                                    <a class="nav-link" href="{{url('site-solutions')}}">Solutions</a>
                                    <ul class="sub-menu">
                                        <li class="nav-item"><a class="nav-link" href="{{url('site-solutions')}}">Site solutions</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{url('site-solutions')}}">Home Solutions</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{url('site-solutions')}}">Mobile Solutions</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{url('site-solutions')}}">Enterprise Solutions</a></li>
                                        <li class="nav-item has-children">
                                            <a class="nav-link" href="{{url('site-solutions')}}">Retail solutions</a>
                                            <ul class="sub-menu">
                                                <li class="nav-item"><a class="nav-link" href="{{url('site-solutions')}}">Office solutions</a></li> 
                                                <li class="nav-item"><a class="nav-link" href="{{url('site-solutions')}}">Entertainment/Leisure venue solutions</a></li> 
                                                <li class="nav-item"><a class="nav-link" href="{{url('site-solutions')}}">Health and Safety</a></li> 
                                                <li class="nav-item"><a class="nav-link" href="{{url('site-solutions')}}">Small Business Solutions</a></li> 
                                            </ul>
                                        </li>  
                                    </ul>
                                </li>
                                <li class="nav-item has-children">
                                    <a class="nav-link" href="{{url('about')}}">About Us</a>
                                    <ul class="sub-menu">
                                        <li class="nav-item"><a class="nav-link" href="{{url('company-profile')}}">Company Profile</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{url('about')}}">NDAA Compliance</a></li>  
                                        <li class="nav-item"><a class="nav-link" href="{{url('about')}}">Quality standards</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{url('about')}}">Case Studies / Testimonials</a></li>  
                                    </ul>
                                </li> 
                                <li class="nav-item has-children">
                                    <a class="nav-link" href="#">Support</a>
                                    <ul class="sub-menu">
                                        <li class="nav-item"><a class="nav-link" href="#">Quick Reference Guide</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#">Bracket Compatibility Matrix</a></li> 
                                        <li class="nav-item has-children">
                                            <a class="nav-link" href="{{url('downloads')}}">Downloads</a>
                                            <ul class="sub-menu"> 
                                                <li class="nav-item has-children">
                                                    <a class="nav-link" href="#">Product Literature</a>
                                                    <ul class="sub-menu">
                                                        <li class="nav-item"><a class="nav-link" href="#">Datasheets</a></li>  
                                                        <li class="nav-item"><a class="nav-link" href="#">User Manuals</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="#">Quick Start Guides</a></li>  
                                                        <li class="nav-item"><a class="nav-link" href="#">Guide to CCTV and terminology</a></li>  
                                                    </ul>
                                                </li>    
                                                <li class="nav-item"><a class="nav-link" href="#">Brochures</a></li>  
                                                <li class="nav-item"><a class="nav-link" href="#">Demo Sites</a></li>  
                                                <li class="nav-item has-children">
                                                    <a class="nav-link" href="#">Software</a>
                                                    <ul class="sub-menu">
                                                        <li class="nav-item"><a class="nav-link" href="#">iOS</a></li>  
                                                        <li class="nav-item"><a class="nav-link" href="#">Android</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="#">PC</a></li>  
                                                        <li class="nav-item"><a class="nav-link" href="#">MAC</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="#">Video Management Software</a></li>    
                                                    </ul>
                                                </li>  
                                                <li class="nav-item"><a class="nav-link" href="#">Product Videos</a></li>  
                                                <li class="nav-item"><a class="nav-link" href="#">Example footage</a></li>    
                                            </ul>
                                        </li>  
                                        <li class="nav-item has-children">
                                            <a class="nav-link" href="#">Technical support</a>
                                            <ul class="sub-menu">  
                                                <li class="nav-item"><a class="nav-link" href="#">Talk to the Techdesk team </a></li>  
                                                <li class="nav-item"><a class="nav-link" href="#">How To Videos</a></li>   
                                            </ul>
                                        </li>  
                                        <li class="nav-item has-children">
                                            <a class="nav-link" href="#">Fire Team Support</a>
                                            <ul class="sub-menu">  
                                                <li class="nav-item"><a class="nav-link" href="#">Design Service</a></li>   
                                            </ul>
                                        </li>  
                                    </ul>
                                </li>
                                <li class="nav-item has-children">
                                    <a class="nav-link" href="#">Buy</a>
                                    <ul class="sub-menu">
                                        <li class="nav-item"><a class="nav-link" href="#">Installer order</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#">Find an installer</a></li>  
                                    </ul>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li> 
                            </ul> 
                            <div class="header-search-area">
                                <input type="text" placeholder="SEARCH" /> <i class="ti ti-search"></i>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header> 
        <div class="stricky-content"></div>
        <div id="mobileNav"></div>

        <!-- preloader start -->
        <div class="preloader">
          <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
          </div>
        </div>
        <!-- preloader end -->

        <!-- Start: Slider Section -->
        <section class="slider-area">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach($banners as $bannerKey => $banner)
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$bannerKey}}" class="{{ $bannerKey == 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide {{$bannerKey+1}}"></button>
                    @endforeach 
                </div>
                <div class="carousel-inner"> 
                    @foreach($banners as $index => $banner)
                    <div class="carousel-item {{ $index == 0 ? ' active' : '' }}">
                        <div class="slide d-flex align-items-center justify-content-lg-center align-items-lg-center" style="background-image: url('{{asset('storage')}}/{{$banner->bg}}');">
                            <div class="container">
                                <div class="row row-cols-1 row-cols-md-2 align-items-center justify-content-center"> 
                                    <div class="col d-flex align-items-center justify-content-center">
                                        <div class="carousel-info text-center text-md-start">
                                            {!!$banner->heading!!}
                                            <p class="wow fadeInLeft">{{$banner->sub_heading}}</p>
                                            <a class="btn btn-reverse-default text-white text-uppercase wow fadeInLeft" href="{{$banner->btn_url}}">{{$banner->url}}</a>
                                        </div>  
                                    </div>
                                    <div class="col">
                                        <div class="carousel-img text-center text-md-start wow fadeInRight"> 
                                            <img class="img-fluid" src="{{asset('storage')}}/{{$banner->image}}" alt="" /> 
                                        </div>  
                                    </div>
                                    <div class="col-md-12">
                                        <div class="carousel-label text-end"> 
                                            <img src="{{asset('assets/frontend/images/slider/label.png')}}" alt="" /> 
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    @endforeach 
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="ti ti-angle-left"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="ti ti-angle-right"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        <!-- End: Slider Section --> 

        <!-- Start: featured-area Section -->        
        <section class="section-xl featured-area">
            <div class="container">
                <!-- <div class="section-title text-center">
                    <h3 class="wow fadeInLeft">Our Solutions</h3>
                </div> -->
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-12"> 
                        <div class="wow fadeInUp">   
                            <div class="feature-carousel owl-carousel owl-theme text-center">   
                                <div class="item"> 
                                    <img src="{{asset('assets/frontend/images/home/f1.jpg')}}" alt="" />
                                </div>  
                                <div class="item"> 
                                    <img src="{{asset('assets/frontend/images/home/f2.jpg')}}" alt="" />
                                </div>     
                                <div class="item"> 
                                    <img src="{{asset('assets/frontend/images/home/f3.jpg')}}" alt="" />
                                </div>   
                                <div class="item"> 
                                    <img src="{{asset('assets/frontend/images/home/f4.jpg')}}" alt="" />
                                </div>  
                                <div class="item"> 
                                    <img src="{{asset('assets/frontend/images/home/f2.jpg')}}" alt="" />
                                </div>     
                            </div>  
                        </div>
                    </div> 
                </div>  
            </div>
        </section>
        <!-- End: featured-area Section -->

        <!-- Start: Best Products Area Section -->        
        <section class="section-xl best-products-area bg-gray">
            <div class="container"> 
                <div class="row">
                    <div class="col-md-6 bg" style="background-image: url(assets/frontend/images/home/find-pro.png);">  
                    </div> 
                    <div class="col-md-6"> 
                        <div class="heading style-1 py-3 text-center text-md-start">
                            <h2>
                                FIND A THE BEST<br />
                                PRODUCTS FOR<br />
                                <span>YOUR SECURITY<br />
                                NEEDS</span>
                            </h2>
                            <p>We have tailored set ups that can meet all your security needs click below to find out more.</p>
                            <a href="#" class="btn btn-default text-white text-uppercase">TALK TO A PRO</a>
                        </div>
                    </div> 
                </div>  
            </div>
        </section>
        <!-- End: Best Products Area Section --> 

        <!-- Start: Our Specialist Section -->        
        <section class="section-xl our-specialist-area">
            <div class="container"> 
                <div class="row align-items-center">
                    <div class="col-md-6"> 
                        <div class="heading style-1 py-3 text-center text-md-start">
                            <h2>
                            OUR SPECIALIST<br />
                            KNOW EXACTLY<br />
                            <span class="green">HOW TO HELP<br />
                            YOU GET SECURE</span>
                            </h2>
                            <p>Get secure today with the best in tech.<br> 
                            Whatever you need we’ve got you covered.</p>
                            <a href="#" class="btn btn-default text-white text-uppercase">TALK TO A PRO</a>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">  
                        <img class="img-fluid" src="{{asset('assets/frontend/images/home/mobile.png')}}" alt="" />
                    </div>  
                </div>  
            </div>
        </section>
        <!-- End: Our Specialist Section -->

        @include('layouts.frontend.partials.testimonials')

        <!-- Start: CTA Are Section -->        
        <section class="section cta-area" style="background-image: url(assets/frontend/images/home/cta.jpg);">
            <div class="container"> 
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-8"> 
                        <div class="cta-content text-center py-5">
                            <h2 class="pb-2">WE’RE COMMITED TO BUILDING<br>
                            A MORE SECURE FUTURE</h2>
                            <p class="pb-2">As a company we pledge to create a more secure future for our clients.<br>
                            With great customer experience and the best in technology you’re in safe hands. </p>
                            <a href="#" class="btn btn-outline-default text-white text-uppercase">GET IN TOUCH</a>
                        </div>
                    </div> 
                </div>  
            </div>
        </section>
        <!-- End: CTA Are Section -->

        <!-- Start: Our Specialist Section -->        
        <section class="section-xl our-specialist-area">
            <div class="container"> 
                <div class="row row-cols-1 row-cols-md-4 align-items-center">
                    <div class="col"> 
                        <a href="{{url('categories')}}">
                            <div class="box bg overlay d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/home/serve-1.jpg);"> 
                                <h3>PRODUCTS</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="{{url('site-solutions')}}">
                            <div class="box bg overlay d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/home/serve-2.jpg);"> 
                                <h3>SOLUTIONS</h3>
                            </div>
                        </a>
                    </div>  
                    <div class="col">
                        <a href="{{url('downloads')}}">
                            <div class="box bg overlay d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/home/serve-3.jpg);"> 
                                <h3>DOWNLOADS</h3>
                            </div>
                        </a>
                    </div>  
                    <div class="col"> 
                        <a href="#">
                            <div class="box bg overlay d-flex justify-content-center align-items-center" style="background-image: url(assets/frontend/images/home/serve-4.jpg);"> 
                                <h3>SUPPORT</h3>
                            </div>
                        </a>
                    </div>    
                </div>  
            </div>
        </section>
        <!-- End: Our Specialist Section --> 

        @include('layouts.frontend.partials.training')

        <footer id="footer" class="main-footer"> 
          <div class="footer-top">  
              <div class="container"> 
                  <div class="row row-cols-1 row-cols-md-4">
                      <div class="col">
                          <div class="widgets">
                              <img src="{{asset('assets/frontend/images/logo.png')}}" alt="" />
                              <div class="footer-bottom-social py-3 d-flex flex-wrap justify-content-start justify-content-md-start">  
                                  <ul class="d-flex">  
                                      <li><a href="#" alt="Facebook"><i class="ti ti-facebook"></i></a></li> 
                                      <li><a href="#" alt="twitter"><i class="ti ti-twitter"></i></a></li>
                                      <li><a href="#" alt="twitter"><i class="ti ti-instagram"></i></a></li> 
                                  </ul> 
                              </div>
                          </div>
                      </div>
                      <div class="col">
                          <div class="widgets">
                              <div class="widget-title">Help & Support</div>
                              <div class="widget-content">
                                  <ul class="widget-menu">
                                      <li><a href="about.php">About Us</a></li>
                                      <li><a href="#">Delivery Information</a></li>
                                      <li><a href="#">Site Solutions</a></li>
                                      <li><a href="#">Downloads</a></li>
                                      <li><a href="#">Find An Installer</a></li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                      <div class="col">
                          <div class="widgets">
                              <div class="widget-title">Contact Us</div>
                              <div class="widget-content">
                                  <ul class="widget-menu">
                                      <li>Concept Pro<br>
                                          Unit 1 Concept Bus. Park<br>
                                          Smithies Lane,<br>
                                          Heckmondwike<br>
                                          West Yorkshire, WF16 0PN</a></li>  
                                  </ul>
                              </div>
                          </div>
                      </div>
                      <div class="col">
                          <div class="widgets">
                              <div class="widget-title">Mailing List</div>
                              <div class="widget-content widget-suscribe">
                                  <p class="m-0 pb-2">Get the latest info</p>
                                  <div class="suscribe-input">
                                      <input type="text" placeholder="Enter your Email" />
                                      <i class="ti ti-control-play"></i>
                                  </div>
                                  <div class="terms-box py-2 d-flex justify-content-center align-items-start">
                                      <span><input type="checkbox" />&nbsp;</span>
                                      <p><small>Yes, I want to receive news and product emails. Read our Privacy Policy.</small></p>
                                  </div> 
                              </div>
                          </div>
                      </div> 
                  </div>
              </div>
          </div>
          
          <div class="footer-bottom"> 
              <div class="container"> 
                  <div class="row">
                      <div class="col">
                          <div class="copyright d-flex justify-content-end"> 
                              <p> &copy; <a href="#">Concept Pro</a>. All Rights Reserved.</p>
                          </div>
                      </div>  
                      </div>  
                  </div>
              </div>
          </div>
        </footer>

        <!-- scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{asset('assets/frontend/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/frontend/js/jquery.fancybox.js')}}"></script> 
        <script src="{{asset('assets/frontend/js/owl.carousel.js')}}"></script>
        <script src="{{asset('assets/frontend/js/wow.min.js')}}"></script>
        <script src="{{asset('assets/frontend/js/script.js')}}"></script>
    </div>
</body> 
</html>  