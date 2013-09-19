/* Author: 
*/

//GLOBAL

var tm = {
	handleResize: function (){
		$('body').attr('data-content', $(window).height() + 'x' +$(window).width());
		($(window).width() > 767) ?
			$('#storeguide, #searchform, #s').removeClass('hidden'):
			$('#storeguide, #searchform, #s, #nav-network, #nav-main').addClass('hidden');
		($(window).width() > 767 && $(window).width() < 1020 ) ?
			$('#nav-main-btn').html('Top Categories'):
			$('#nav-main-btn').html(''); 
	},
	initDirt: function () {
		$('.dirt-thick').each(function(event) {
			 $(this).css('background-position', (Math.floor(Math.random() * 100) + 2 )+ 'px 0px');
		});
		$('.dirt-thin').each(function(event) {
			 $(this).css('background-position', (Math.floor(Math.random() * 300) + 2) + 'px 0px');
		});
	},
	initSocial: function (){
		  $('.twitter-span').sharrre({
			  share: {
			    twitter: true
			  },
			  template: '<a href="#" class="social-link twitter">{total}</a>',
			  enableHover: false,
			  enableTracking: true,
			  buttons: { twitter: {via: 'Highsnob'}},
			  click: function(api, options){
			    api.simulateClick();
			    api.openPopup('twitter');
			  }
			});
			$('.fb-span').sharrre({
			  share: {
			    facebook: true
			  },
			  action: 'like',
			  template: '<a href="#" class="social-link facebook">{total}</a>',
			  enableHover: false,
			  enableTracking: true,
			  click: function(api, options){
			    api.simulateClick();
			    api.openPopup('facebook');
			  }
			});
	}
};

// as soon as DOM is ready
$(document).ready(function() {
	//tm.nextLink = $("link[rel*='next']").attr('href');
	tm.handleResize();
	
	//$('#js-dyn-topad').attr('src', '/wp-content/themes/highsnob/ad-load.php');	
	$(window).on('load resize', function(){
		if (!Modernizr.touch) tm.handleResize();
	});
	$(window).on('orientationchange', function(){
		if (Modernizr.mq('only screen and (min-width: 765px)')) {
			tm.handleResize();
		}
	});

	$('.view-full').on('click', function(e){
		$.cookie('view', 'full', { expires: 365, path: '/' });
	});
	$('.view-list').on('click', function(e){
		$.cookie('view', 'list', { expires: 365, path: '/' });
	});
	$('html').click(function() {
		$('#nav-main').addClass('hidden');
		$('#nav-network').addClass('hidden');
	});
	$('#nav-main').click(function(event){
		event.stopPropagation();
	});
	$('#nav-network').click(function(event){
		event.stopPropagation();
	});

	$('#nav-main-btn').on('click', function(e){
		e.stopPropagation();
		$('#nav-network').addClass('hidden');
		if ($(window).width() < 768) $('#storeguide, #searchform, #s').addClass('hidden');
		$('#nav-main').toggleClass('hidden');
	});

	$('#logo-network').on('click', function(e){
		e.stopPropagation();
		$('#nav-main').addClass('hidden');
		if ($(window).width() < 768) $('#storeguide, #searchform, #s').toggleClass('hidden')
		$('#nav-network').toggleClass('hidden');
	});

;});

// after page is fully loaded
$(window).load(function() {
	if (Modernizr.mq('only screen and (min-width: 765px)')){
		
		tm.initSocial();
			
		$('#js-follow-us-fb').sharrre({
		  share: {
		    facebook:true
		  },
		  action: 'like',
		  click: function(api, options){
		    api.simulateClick();
		    api.openPopup('facebook');
		  },
		  buttons: {
		    facebook: {
		    url: 'http://www.facebook.com/',  //if you need to personalize url button
		    action: 'like',
		    layout: 'button_count',
		    width: '50',
		    send: 'true',
		    faces: 'false',
		    colorscheme: '',
		    font: '',
		    lang: 'en_US'
		    },
		  },
		  enableHover: false,
		  enableCounter: false,
		  enableTracking: true
		}); 

		!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");    

	}
	tm.initDirt();
	$("img").lazyload({
	    event : "sporty"
	}); 
  $("img").trigger("sporty");

});

// HOME
$(document).ready(function() {
	if (Modernizr.touch && Modernizr.csstransforms ){
		window.homeleadslider = new Swipe(
		  document.getElementById('js-home-lead-slider-wrap'),{
		  	speed: 400,
		  	callback: function(event, index, elem) {
		  		$('.home-lead-slide-indicator-bullet.on').removeClass('on');
		  		$('.home-lead-slide-indicator-bullet:eq(' + index + ')').addClass('on');
		  	}
		  }
		);
	} else {
		$('#js-home-lead-slider-wrap').carousel({
			slider: '.home-lead-slider',
			slide: '.home-lead-slide',
			addNav: true,
			addPagination: true,
			namespace: 'home-lead-slider',
			speed: 300 // ms.
		})
		.bind({
		  'home-lead-slider-aftermove' : function() {
		    var tempindex = $('.home-lead-slider-active-slide').data('index');
		    console.log(tempindex);
		    $('.home-lead-slide-indicator-bullet.on').removeClass('on');
		    $('.home-lead-slide-indicator-bullet:eq(' + tempindex+ ')').addClass('on');
		  }
		});
	}

});

(function( win ){
	var doc = win.document;
	
	// If there's a hash, or addEventListener is undefined, stop here
	if( !location.hash && win.addEventListener ){
		
		//scroll to 1
		window.scrollTo( 0, 1 );
		var scrollTop = 1,
			getScrollTop = function(){
				return win.pageYOffset || doc.compatMode === "CSS1Compat" && doc.documentElement.scrollTop || doc.body.scrollTop || 0;
			},
		
			//reset to 0 on bodyready, if needed
			bodycheck = setInterval(function(){
				if( doc.body ){
					clearInterval( bodycheck );
					scrollTop = getScrollTop();
					win.scrollTo( 0, scrollTop === 1 ? 0 : 1 );
				}	
			}, 15 );
		
		win.addEventListener( "load", function(){
			setTimeout(function(){
				//at load, if user hasn't scrolled more than 20 or so...
				if( getScrollTop() < 20 ){
					//reset to hide addr bar at onload
					win.scrollTo( 0, scrollTop === 1 ? 0 : 1 );
				}
			}, 0);
		} );
	}
})( this );


$(document).ready(function() {
	$(".ss-nav-menu-with-img").hide();
	$(window).scroll(function () {
		if($("#megaMenu").width() > 960){
			$(".ss-nav-menu-with-img").show();
		}else{
			$(".ss-nav-menu-with-img").hide();
		}
	});
});








