
jQuery( function ( $ ) {
    'use strict';  
    
    //PreLoader 
    function preLoader(){  
        if($('.preloader').length){
			//$('body').addClass('page-loaded');
			$('.preloader').delay(100).fadeOut('slow');
		}
    }; preLoader();  

    // Stricky Navigation 
    function strickyNav(){

        window.onscroll = function() {myFunction()}; 
        var navbar = document.getElementById("header");
        var sticky = navbar.offsetTop;

        function myFunction() {
            if (window.pageYOffset > sticky) {
                navbar.classList.add("sticky")
            } else { 
                navbar.classList.remove("sticky");
            }
        }
    }; strickyNav(); 

    //Active Navigation 
    function activeNav() {

        var path = window.location.pathname; 

        $(".navbar-nav a").each(function () {
            var href = $(this).attr('href');  
            if (path === href){ 
                $(this).closest('li').addClass('active');
            }  
        });
    }; activeNav();

    // Desktop Header Aside 
    function desktopheaderAside() { 

        /*Add Toggle Button With Off Desktiop Sub Menu*/ 
        // var navbarNav = $('#desktopNav');
        // var offCanvasNavSubMenu = navbarNav.find('.sub-menu');  
        // offCanvasNavSubMenu.parent().prepend('<span class="menu-expand"><i class="ti ti-angle-down"></i></span>'); 
        
    }; desktopheaderAside();

    // Auto Change submenu direction from right to left according to the width of the screen.  
    function submenuDirection(){ 

        var screenWidth = $(window).width();  

        if (screenWidth > 767) {

            $("ul.navbar-nav > li > ul > li").hover(function () {
                var dropdownPosition = $(this).offset().left + $(this).width() + $(this).find('ul').width();
                var newPosition = $(this).offset().left - $(this).find('ul').width();
                var windowPosition = $(window).width();
                var oldPosition = $(this).offset().left + $(this).width(); 

                if (dropdownPosition > windowPosition) {
                    $(this).find('ul').offset({ "left": newPosition });
                } else {
                    $(this).find('ul').offset({ "left": oldPosition });
                }
            });  
            $("ul.navbar-nav > li > ul > li > ul > li").hover(function () {
                var dropdownPosition = $(this).offset().left + $(this).width() + $(this).find('ul').width();
                var newPosition = $(this).offset().left - $(this).find('ul').width();
                var windowPosition = $(window).width();
                var oldPosition = $(this).offset().left + $(this).width(); 

                if (dropdownPosition > windowPosition) {
                    $(this).find('ul').offset({ "left": newPosition });
                } else {
                    $(this).find('ul').offset({ "left": oldPosition });
                }
            }); 
        } 
    }; submenuDirection(); 
        
    // Mobile Header Aside 
    function mobileheaderAside() {
        var body = $('body'), 
            navbarTrigger = $('#nav-toggle'), 
            offCanvasNav = $('#mobileNav'),
            wrapper = $('.wrapper');  


        if($(window).width() <= 991){
        
            // Append overlay div in under wrapper
            wrapper.prepend('<div class="body-overlay"></div>'); 
            
            navbarTrigger.on('click', function(e) {
                e.preventDefault();
                offCanvasNav.addClass('inside');
                body.addClass('activeMobileNav');
                navbarTrigger.removeClass('collapsed');
                wrapper.addClass('overlay-active');
            }); 
            
            $('.body-overlay').on('click', function() {
                offCanvasNav.removeClass('inside');
                body.removeClass('activeMobileNav');
                navbarTrigger.addClass('collapsed');
                wrapper.removeClass('overlay-active');
            });

           // append Nav in Mobile Nav 
            var mobileMenuContent = $('#desktopNav').html();        
            offCanvasNav.append(mobileMenuContent); 
        
            /*Add Toggle Button With Off Canvas Sub Menu*/ 
            var offCanvasNavSubMenu = offCanvasNav.find('.sub-menu');  
            offCanvasNavSubMenu.parent().prepend('<span class="menu-expand"><i class="ti ti-angle-down"></i></span>');

            
            /*Category Sub Menu Toggle*/
            offCanvasNav.on('click', 'li a, li .menu-expand', function(e) {
                var $this = $(this);
                if ( ($this.parent().attr('class').match(/\b(menu-item-has-children|has-children|has-sub-menu)\b/)) && ($this.attr('href') === '#' || $this.hasClass('menu-expand')) ) {
                    e.preventDefault();
                    if ($this.siblings('ul:visible').length){
                        $this.parent('li').removeClass('show');
                        $this.siblings('ul').slideUp();
                    } else {
                        $this.parent('li').addClass('show');
                        $this.closest('li').siblings('li').removeClass('show').find('li').removeClass('show');
                        $this.closest('li').siblings('li').find('ul:visible').slideUp();
                        $this.siblings('ul').slideDown();
                    }
                }
            });
            
        }


    }; mobileheaderAside();  

    // Elements Animation
    function wowAnimation(){
        if($('.wow').length){
            var wow = new WOW(
            {
                boxClass:     'wow',      // animated element css class (default is wow)
                animateClass: 'animated', // animation css class (default is animated)
                offset:       0,          // distance to the element when triggering the animation (default is 0)
                mobile:       false,       // trigger animations on mobile devices (default is true)
                live:         true       // act on asynchronously loaded content (default is true)
            }
            );
            wow.init();
        }
    }; wowAnimation(); 

    // PopUp Box 
    function PopUp(){
        //LightBox / Fancybox
        if($('.popup-box').length) { 
            $('.popup-box').fancybox({ 
                openEffect  : 'fade',
                closeEffect : 'fade',
                helpers : {
                    media : {}
                }
            });
        }
    }; PopUp();  

    // Owl Carousel Sliders
    function owlCarousel(){ 
        
        var owl = $('.feature-carousel');
        owl.owlCarousel({
            margin: 70,
            loop: true, 
            autoplaySpeed:1000, 
            nav:true,
            navText:[ '<span class="ti ti-angle-left"></span>', '<span class="ti ti-angle-right"></span>' ],
            responsive:{
                0:{ items:1 },
                767:{ items:3 },
                991:{ items:4 }
            }
        })  
        
        var owl = $('.testimonial-carousel');
        owl.owlCarousel({
            margin: 70,
            loop: true, 
            autoplaySpeed:1000, 
            nav:false,
            navText:[ '<span class="ti ti-angle-left"></span>', '<span class="ti ti-angle-right"></span>' ],
            responsive:{
                0:{ items:1 },
                767:{ items:1 },
                991:{ items:1 }
            }
        })  

    };owlCarousel() 
        
    // Mobile Header Aside 
    function productListing() {  
        $('.sidebar-sub-menu').hide();
        $("li:has(ul)").click(function(){
            $('#sideNav li').find('.sidebar-sub-menu').slideUp();
            $(this).find('.sidebar-sub-menu').slideDown();
            
            $('li.sideActive').removeClass('sideActive');
            $(this).addClass('sideActive');
        }); 
        
        // Toggle Button
        $("#hideButton").click(function(){
            $("#sideNav").toggle();
        });
    }; productListing();  
        
    // Counter Style
    function counterStyle() {  
        $('.counter-value').each(function(){
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
            },{
                duration: 3500,
                easing: 'swing',
                step: function (now){
                    $(this).text(Math.ceil(now));
                }
            });
        });
    }; counterStyle();  

}); 