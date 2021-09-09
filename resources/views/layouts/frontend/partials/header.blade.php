@php
$categories = \App\Models\Category::orderBy('order','asc')->get();
@endphp
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