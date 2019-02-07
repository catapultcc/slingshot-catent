// JavaScript Document

jQuery(document).ready(function(){

    jQuery(".menu-link").click(function() {
		jQuery(".menu-overlay").toggleClass("open");
		jQuery(".menu").toggleClass("open");
	});
    
	jQuery("#uitklapper").click(function() {
		jQuery("ul.hoofdmenu").toggle();
	});
    
	jQuery("#introLeesmeer").click(function() {
		jQuery("#intro-leesmeer").toggle('slow');
	});
	
	setTimeout(function() {
		jQuery('#preloader').fadeOut('slow',function(){
		  jQuery(this).remove();
		});
	}, 800);
    
    jQuery('.navbar-nav>li>a').on('click', function(){
        jQuery('.navbar-collapse').collapse('hide');
    });

	// slider ervaringen
    jQuery("#ervaringen-slider").owlCarousel({ 
        margin: 0,
        loop: true,
        autoWidth: false,
        singleItem: true,
        items: 1,
        nav: true,
        dots:false,
        autoplay: false,
        smartSpeed: 500,
        navText: [
            '<span class="fa-stack fa-sm"><i class="fa fa-circle fa-stack-2x"></i><i class="fal fa-arrow-left fa-stack-1x fa-inverse"></i></span>',
            '<span class="fa-stack fa-sm"><i class="fa fa-circle fa-stack-2x"></i><i class="fal fa-arrow-right fa-stack-1x fa-inverse"></i></span>'
        ]
    });
	// slider jong
    jQuery("#jong-slider").owlCarousel({ 
        margin: 0,
        loop: true,
        autoWidth: false,
        singleItem: true,
        items: 1,
        nav: false,
        dots: true,
        autoplay: false,
        smartSpeed: 500,
        navText: [
            '<span class="fa-stack fa-sm"><i class="fa fa-circle fa-stack-2x"></i><i class="fal fa-arrow-left fa-stack-1x fa-inverse"></i></span>',
            '<span class="fa-stack fa-sm"><i class="fa fa-circle fa-stack-2x"></i><i class="fal fa-arrow-right fa-stack-1x fa-inverse"></i></span>'
        ]
    });	
	
	
});

// Veranderen van icoon bij openklappen toekomstvisie
jQuery(".btn-link").click(function() {
	if(jQuery(this).attr('aria-expanded') === "false") {
		jQuery(".btn-link").removeClass('minus');
		jQuery(this).addClass("minus");
	} else {
		jQuery(this).removeClass('minus');
	}
});


//scroll to Top
jQuery(document).ready(function($){
	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 300,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1200,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//grab the "back to top" link
		$back_to_top = $('.cd-top');

	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});

});


