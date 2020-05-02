jQuery(document).ready(function($){

	"use strict";

	// Sticky Sidebar
	var opts = {
		// enable_bottoming : false,
		inner_scrolling : false,
	}

	if($('.gutenblog-sidebar-sticky').length > 0){
		$('.gutenblog-sidebar-sticky .sidebar').stick_in_parent(opts);
	}

	// Parallax footer
	if($('footer').hasClass('gutenblog-footer-design-parallax')){
		siteFooter();
	}
	$(window).on('resize', function() {
		if($('footer').hasClass('gutenblog-footer-design-parallax')){
			siteFooter();
		}
	});
	function siteFooter() {
		var siteContent = $('.body-background-inner-before-footer');
		var siteContentHeight = siteContent.outerHeight(true);
		var siteContentWidth = siteContent.outerWidth(true);

		var siteFooter = $('footer.gutenblog-footer-design-parallax');
		var siteFooterHeight = siteFooter.outerHeight(true);
		var siteFooterWidth = siteFooter.outerWidth(true);

		var window_height = $(window).height();

		if(window_height >= siteFooterHeight){
			siteFooter.css({
				"top" : 'auto',
				"bottom" : '0',
			});
		} else {
			siteFooter.css({
				"top" : '0',
				"bottom" : 'auto',
			});
		}

		siteContent.css({
			"margin-bottom" : siteFooterHeight
		});
	};
	$(window).on('scroll', function(){
		var siteContent = $('.body-background-inner-before-footer');
		var siteContentHeight = siteContent.outerHeight();

		var siteFooter = $('footer.gutenblog-footer-design-parallax');
		var siteFooterHeight = siteFooter.outerHeight(true);

		var scrollTop = $(window).scrollTop();
		var window_height = $(window).height();
		
		var wpadminbar_margin = 0;
		if($('#wpadminbar').length > 0){
			wpadminbar_margin = 32;
		}


		if(scrollTop - wpadminbar_margin > siteContentHeight){
			siteContent.css({
				"margin-bottom" : '0'
			});
			siteFooter.css({
				"position" : 'relative'
			});
		} else {
			siteContent.css({
				"margin-bottom" : siteFooterHeight
			});
			siteFooter.css({
				"position" : 'fixed'
			});
		}

	});


	// Preloader fade out
    $(".fadeout-preloader").fadeOut(1000);


    // Big menu fix
    $('#navbar ul.menu li.menu-item-has-children').on('mouseenter',function(){
    	if($(window).width() >= 768){
	    	var self = $(this);
	    	var sub = self.children("ul.sub-menu");
	    	sub.addClass('hovered');
	    }
    });

    $('#navbar ul.menu li.menu-item-has-children').on('mouseleave',function(){
    	if($(window).width() >= 768){
	    	var self = $(this);
	    	var sub = self.children("ul.sub-menu");
	    	sub.removeClass('hovered');
	    }
    });

    // menu-design-1 ALL levels LI with child
    $('.menu-design-1 #navbar ul.menu li.menu-item-has-children').on('mouseenter mouseleave',function(){
    	if($(window).width() >= 768){
    		
	    	var self = $(this);
	    	var sub = self.children("ul.sub-menu"); 
	    	var sub_left = sub.offset().left;
	    	var sub_width = sub.outerWidth();
	    	var sub_left_width = sub_width + sub_left;

	    	var timer1;


	    	if(sub_left_width >= $(window).width()){
	    		clearTimeout(timer1);
	    		sub.addClass('sub-big');
	    	} else {

	    		timer1 = setTimeout(function() {
	    			if(!sub.hasClass('hovered')){
			       		sub.removeClass('sub-big');
			       	}
			   	}, 500);
	    	}

		    
	    }
    });

    // menu-design-2 FIRST level LI with child
    $('.menu-design-2 #navbar ul.menu > li.menu-item-has-children').on('mouseenter mouseleave',function(){
    	if($(window).width() >= 768){
    		
	    	var self = $(this);
	    	var sub = self.children("ul.sub-menu"); 
	    	var sub_left = sub.offset().left; // start of sub
	    	var sub_width = sub.outerWidth();
	    	var sub_left_width = sub_width + sub_left; // end of sub

	    	var timer1;

		    console.log(sub_left, sub_left_width, $(window).width());

		    if(sub_left < 0){ // off screen from right

		    	var difference = sub_left*(-1);
	    		clearTimeout(timer1);
	    		sub.addClass('sub-big');

	    		sub.css({
	    			"left": "calc(50% + "+difference+"px + 5px)",
	    		});

		    } else if(sub_left_width >= $(window).width()){ // off screen from left

	    		var difference = sub_left_width - $(window).width();
	    		clearTimeout(timer1);
	    		sub.addClass('sub-big');

	    		sub.css({
	    			"left": "calc(50% - "+difference+"px - 5px)",
	    		});


	    	} else { // start position

	    		timer1 = setTimeout(function() {
	    			if(!sub.hasClass('hovered')){
			       		sub.removeClass('sub-big');

			       		sub.css({
			    			"left": "50%",
			    		});
			       	}
			   	}, 500);
	    	}
		    
	    }
    });

    // menu-design-2 SECOND adn THIRD level LI with child
    $('.menu-design-2 #navbar ul.menu > li.menu-item-has-children li.menu-item-has-children').on('mouseenter mouseleave',function(){
    	if($(window).width() >= 768){
    		
	    	var self = $(this);
	    	var sub = self.children("ul.sub-menu"); 
	    	var sub_left = sub.offset().left;
	    	var sub_width = sub.outerWidth();
	    	var sub_left_width = sub_width + sub_left;

	    	var timer1;

		    
	    	if(sub_left_width >= $(window).width()){
	    		clearTimeout(timer1);
	    		sub.addClass('sub-big');
	    	} else {

	    		timer1 = setTimeout(function() {
	    			if(!sub.hasClass('hovered')){
			       		sub.removeClass('sub-big');
			       	}
			   	}, 500);
	    	}
		    
	    }
    });

    // menu-design-2 SECOND adn THIRD level LI with child
    $('.menu-design-3 #navbar ul.menu > li.menu-item-has-children li.menu-item-has-children').on('mouseenter mouseleave',function(){
    	if($(window).width() >= 768){
    		
	    	var self = $(this);
	    	var sub = self.children("ul.sub-menu"); 
	    	var sub_left = sub.offset().left;
	    	var sub_width = sub.outerWidth();
	    	var sub_left_width = sub_width + sub_left;

	    	var timer1;

		    
	    	if(sub_left_width >= $(window).width()){
	    		clearTimeout(timer1);
	    		sub.addClass('sub-big');
	    	} else {

	    		timer1 = setTimeout(function() {
	    			if(!sub.hasClass('hovered')){
			       		sub.removeClass('sub-big');
			       	}
			   	}, 500);
	    	}
		    
	    }
    });

    


    $(document).on("click", "a", function(event){
    	if($(window).width() > 768){
	    	if($(".fadeout-preloader").length > 0){
		        var hash = event.srcElement.hash;
		        var linkLocation = this.href;

		        if(hash == null || hash == undefined || hash == "") {
		        	if( $(this).attr('target') != "_blank" 
		        		&& !$(this).hasClass('like-button') 
		        		&& !$(this).hasClass('rating-button-minus') 
		        		&& !$(this).hasClass('rating-button-plus')
		        		&& !$(this).hasClass('submenu-btn') ){

		        		if($(this).attr('href') != "#"){
			        		event.preventDefault();
				        	$(".fadeout-preloader").fadeIn(1000, redirectPage(linkLocation));
			        	}  else {
				        	// console.log('3');
				        } 
			        } else {
			        	// console.log('2');
			        }
		        } else {
		        	// console.log('1');
		        }
			    
		    }
		}
    });
        
    function redirectPage(linkLocation) {
        window.location = linkLocation;
    }

    $('.navbar-nav a.submenu-btn').on('click', function () {
        //removing the previous selected menu state
        var nav = $(this).closest('.navbar-nav');
        nav.find('li.active').removeClass('active');
        //adding the state for this parent menu
        $(this).parents("li").addClass('active');

    });



    $("#toggle-main_search").on("click", function (event) {
        var x = setTimeout('jQuery(".main_search .form-control").focus()', 700);
    });


    

});

jQuery(function($){

	"use strict";

    var cvs,ctx;
    var nodes = 10;
    var nodes_mob = 5;
    var waves = [];
    var waveHeight = 100;
    // var colours = ["#ff9900","#66ee00","#ffffff"];
    var color1, color2, color3;


    $(document).on('ready',function(){
    	if($('#canvas-waves').length > 0){
    		init_canvas();
    	}
    });

    $(window).on('resize',function(){
    	if($('#canvas-waves').length > 0){
    		if(cvs != null && cvs != undefined){
    			resizeCanvas(cvs, $(window).outerWidth(), $('.header.header-2').outerHeight());
    		}
    	}
    });

    // Initiator function
    function init_canvas() {
        cvs = document.getElementById("canvas-waves");
        ctx = cvs.getContext("2d");

        ctx.clearRect(0, 0, cvs.width, cvs.height);
        
        color1 = $(cvs).data('color1');
        color2 = $(cvs).data('color2');
        color3 = $(cvs).data('color3');


        resizeCanvas(cvs, $(window).outerWidth(), $('.header.header-2').outerHeight());


        var nodes_use = nodes;
        if($(window).width() > 768){
        	nodes_use = nodes;
        } else {
        	nodes_use = nodes_mob;
        }

        var temp = new wave(color1, 1, nodes_use);
        temp = new wave(color2, 1, nodes_use);
        temp = new wave(color3, 1, nodes_use);


        update();
	    
    }

    function update(array) {

        ctx.clearRect(0, 0, cvs.width, cvs.height);

        var fill;
        if($(window).width() > 768){
        	fill = $(cvs).data('color-background');
        } else {
        	fill = $(cvs).data('color-background-mob');
        }

        var blend = $(cvs).data('blend');

        ctx.fillStyle = fill;
        ctx.globalCompositeOperation = "source-over";

        ctx.fillRect(0,0,cvs.width,cvs.height);

        if(blend == 1){
        	ctx.globalCompositeOperation = "screen";
        }


        for (var i = 0; i < waves.length; i++) {
            for (var j = 0; j < waves[i].nodes.length; j++) {
                bounce(waves[i].nodes[j]);
            }
            drawWave(waves[i]);
        }

        ctx.fillStyle = fill;

        requestAnimationFrame(update);

    }

    function wave(colour, lambda, nodes) {

        this.colour = colour;
        this.lambda = lambda;
        this.nodes = [];
        var tick = 1;

        for (var i = 0; i <= nodes+2; i++) {
            var temp = [(i-1) * cvs.width / nodes, 0, Math.random()*200, .3];
            this.nodes.push(temp);

        }

        waves.push(this);
    }

    function bounce(nodeArr) {
        nodeArr[1] = waveHeight/2*Math.sin(nodeArr[2]/20)+cvs.height/2;
        nodeArr[2] = nodeArr[2] + nodeArr[3];

    }

    function drawWave (obj) {

        var diff = function(a,b) {
            return (b - a)/2 + a;
        }
        ctx.fillStyle = obj.colour;
        ctx.beginPath();
        ctx.moveTo(0,cvs.height);
        ctx.lineTo(obj.nodes[0][0],obj.nodes[0][1]);

        for (var i = 0; i < obj.nodes.length; i++) {
            if (obj.nodes[i+1]) {
                ctx.quadraticCurveTo(
                    obj.nodes[i][0],obj.nodes[i][1],
                    diff(obj.nodes[i][0],obj.nodes[i+1][0]),diff(obj.nodes[i][1],obj.nodes[i+1][1])
                );
            }
            else {
                ctx.lineTo(obj.nodes[i][0],obj.nodes[i][1]);
                ctx.lineTo(cvs.width,cvs.height);
            }
        }
        ctx.closePath();
        ctx.fill();
    }

    function drawNodes (obj) {
        ctx.strokeStyle = "#888";

        for (var i = 0; i < array.length; i++) {
            ctx.beginPath();
            ctx.arc(array[i][0],array[i][1],4,0,2*Math.PI);
            ctx.closePath();
            ctx.stroke();
        }

    }

    function drawLine (obj) {
        ctx.strokeStyle = "#888";

        for (var i = 0; i < array.length; i++) {

            if (array[i+1]) {
                ctx.lineTo(array[i+1][0],array[i+1][1]);
            }
        }

        ctx.stroke();
    }

    function resizeCanvas(canvas,width,height) {

        if (width && height) {
            canvas.width = width;
            canvas.height = height;
        }
        else {

            if (window.innerWidth > 1920) {
                canvas.width = window.innerWidth;
            }
            else {
                canvas.width = 1920;
            }

            canvas.height = waveHeight;
        }

    }


    
});

jQuery(function($){

	"use strict";

	if($('.gutenblog-fadein').length > 0){
		$('.gutenblog-fadein').each(function(index, vid) {
		    var inview = new Waypoint.Inview({
		        element: $(this),
		        enter: function(direction) {
		    		$(this.element).fadeTo( "100" , 1, function() {

					});
		        },
		        exited: function(direction) {

		        }
		    });
		});
	}

	function stripeMenu(){
		var sections = $(".stripe-menu ul.navbar-nav");
		var links = $('.stripe-menu ul.navbar-nav > li.menu-item-has-children');
		var bgWrapper = $(".stripe-menu-bg-wrapper");
		var bg = $(".stripe-menu-bg");
		var bgBCR = bg[0].getBoundingClientRect();

		bgWrapper.addClass('stripe-loaded');

		var prev_link_index = null;
		var subject = null;
		var subject_prev = null;
		var sub = null;
		var translateX = 0;
		var linksBCR = 0;
		var linksBCR_width = 0;
		var linksBCR_height = 0;
		var sub_triggered =0;

		var scaleX = 0;
		var scaleY = 0;

		// <nav> hover
		if(sections.length > 0){
			$(document).on({
		        mouseenter: function () {
		            bg.addClass('is-animatable');
		            
		        },
		        mouseleave: function () {
		        	bg.removeClass('is-animatable');
		        }
		    }, sections);
		}
		
		// First <li> hover
		links.on('mouseover',function(e){
			bgWrapper.addClass("is-visible");
		    var arrow = bgWrapper.find('.stripe-menu-bg-arrow');
			sub = $(this).children("ul.sub-menu");
		    subject  = $(this);
		    var link_index = subject.index();

		    subject.addClass('stripe-active');

		    if(subject_prev != null && !subject_prev.is(subject)){
			    if(prev_link_index > link_index){
			    	subject_prev.removeClass('stripe-left');
			    	subject_prev.removeClass('stripe-active');
			    	subject_prev.addClass('stripe-right');
			    } else if(prev_link_index <= link_index){
			    	subject_prev.removeClass('stripe-right');
			    	subject_prev.removeClass('stripe-active');
			    	subject_prev.addClass('stripe-left');
			    }
			}
		    subject_prev = subject;
		    prev_link_index = link_index;


		    linksBCR = subject.position();
		    linksBCR_width = sub.outerWidth();
		    linksBCR_height = sub.outerHeight();
		    
		    scaleX = linksBCR_width / bgBCR.width;
		    scaleY = linksBCR_height / bgBCR.height;


			if(sub_triggered == 0){
				translateX = (linksBCR.left+(subject.outerWidth()/2) - ( (bg.outerWidth()*scaleX)/2 ) );
				bg.css({
					'transform': 'translateX(' + translateX + 'px) scale(' + scaleX + ', '+scaleY+')',
					'﻿transition': '0.3s'
				});
				bgWrapper.css({
					'top': subject.outerHeight()+subject.position().top
				});


				sub.css({
					'margin-left': '-'+((sub.outerWidth()/2)-(subject.outerWidth()/2))+'px'
				});
				arrow.css({
					'transform': 'translateX(' + (linksBCR.left+(subject.outerWidth()/2)) + 'px)',
					'﻿transition': '0.3s'
				});
			}

		});

		// First <li> leave
		links.on('mouseleave',function(e){
			bgWrapper.removeClass('is-visible');
			if(subject != null && subject.length > 0){
				subject.removeClass('stripe-active');
			}
		});


		// Sub <li> hover
		var links_sub  = links.find('li.menu-item-has-children');
		links_sub.on('mouseover',function(e){
			bgWrapper.addClass("is-visible");

			var this_link = $(this);

			var second_sub = $(this).find('ul.sub-menu');
			var second_sub_top = $(this).position().top;
		    var linksBCR_width_sub = second_sub.outerWidth() + linksBCR_width;
		    var linksBCR_height_sub = second_sub.outerHeight();
		    if((linksBCR_height_sub+second_sub_top) < linksBCR_height){
		    	linksBCR_height_sub = linksBCR_height;
		    } else {
		    	linksBCR_height_sub = linksBCR_height_sub+second_sub_top;
		    }
		    var scaleX_sub = linksBCR_width_sub / bgBCR.width;
		    var scaleY_sub = linksBCR_height_sub / bgBCR.height;

		    // fix 30px padding whene child and parent subs are on each other
		    linksBCR_width_sub = linksBCR_width_sub - 30;
		    scaleX_sub = linksBCR_width_sub / bgBCR.width;

		    if(second_sub.hasClass('sub-big')){
		    	
		    	translateX = (linksBCR.left+(subject.outerWidth()/2) - ( (bg.outerWidth()*scaleX)/2 ) - this_link.outerWidth() - 30);
		    }


			if(second_sub.length > 0){
				sub_triggered = 1;
				bg.css({
					'transform': 'translateX(' + translateX + 'px) scale(' + scaleX_sub + ', '+scaleY_sub+')',
					'﻿transition': '0.3s'
				});
			} 

		});

		// Sub <li> leave
		links_sub.on('mouseleave',function(e){
			sub_triggered = 0;
		});
	}

	/* Stripe Menu */
	if($(window).width() > 768){
		if($('.stripe-menu').length > 0){

			stripeMenu();

		}

	}



	/* Hidden Nav */
	var onetime = 0;
	var onetime_init = 0;
	var atleastone = 0;
	var logo_rechange = 0;
	var stop_error = 0;
	var $li_visible = 0;
	var hiddenNavBar = {
	  $menu: $('#navbar.expanded-menu > .navbar-nav-container'),
	  $preloader: $('#navbar.expanded-menu ul.navbar-nav'),
	  init: function() {

	    
    	if(onetime_init == 0){
		    $('<li class="fake-li"></li>').appendTo($('#navbar.expanded-menu ul.navbar-nav'));
		    $('<div id="on-hidden-menu"><div class="toggle "><span></span></div><ul></ul></div>').hide().appendTo($('#navbar.expanded-menu ul.navbar-nav > li.fake-li:not(".on-hidden"):last'));
		    // toggle
		    $('#on-hidden-menu .toggle').on('click',function() {
		      $('#on-hidden-menu').toggleClass('open');
		    });

		    onetime_init = 1;


	    }
		
		if($(window).width() > 768 ){
	    	hiddenNavBar.resize();
	    } else if($(window).width() <= 768 ){
			this.$preloader.animate({opacity: 1}, 0);
		}
		
	  },
	  resize: function() {
	    // setTimeout(function() {
	    	var menu_nav = $('#navbar.expanded-menu .navbar-nav-container');
	    	var menu_ul = $('#navbar.expanded-menu ul.navbar-nav');

	    	
	        var menuWidth = menu_ul.width();
	        var menuNavWidth = menu_nav.width();
	        var winW = $(window).width();

	        var logo_li = $('#navbar.expanded-menu ul.navbar-nav > li.gutenblog-custom-logo-li');
	        



	        // Stop
	        if(menuWidth == 0 || menuNavWidth == 0 || menuWidth == null || menuNavWidth == null){
	        	stop_error = 1;
	        }

	        if(stop_error == 0){
				if (menuWidth > menuNavWidth) {

					this.$preloader.animate({opacity: 0}, 0);

					atleastone = 1;
					$('#on-hidden-menu').show();
					var $clone = $('#navbar.expanded-menu ul.navbar-nav > li:not(".on-hidden"):not(".fake-li"):not(.gutenblog-custom-logo-li):last').addClass('on-hidden').clone();
					if ($clone.parent().size() == 0) {
					  	$clone.prependTo($('#on-hidden-menu > ul'));
					}

					$li_visible = $('#navbar.expanded-menu ul.navbar-nav > li:not(".on-hidden"):not(".fake-li"):not(.gutenblog-custom-logo-li)').length;
					


					logo_rechange = 1;
					hiddenNavBar.resize();

				} else if (menuWidth + $('li.on-hidden:first').width() < menuNavWidth) {
					if(atleastone == 1){

						this.$preloader.animate({opacity: 0}, 0);
						if($('li.on-hidden:first').length > 0){
							$('li.on-hidden:first').removeClass('on-hidden');
							$('#on-hidden-menu > ul > li:first').remove();

							$li_visible = $('#navbar.expanded-menu ul.navbar-nav > li:not(".on-hidden"):not(".fake-li"):not(.gutenblog-custom-logo-li)').length;
							
							logo_rechange = 1;

							hiddenNavBar.resize();
						} else if($('li.on-hidden:first').length == 0){
							// logo
							if(logo_li.length > 0 && logo_rechange == 1){
								var logo_after_this_index = Math.floor($li_visible/2);

								if($li_visible/logo_after_this_index != 2){
									$clone = $('#navbar.expanded-menu ul.navbar-nav > li:not(".on-hidden"):not(".fake-li"):not(.gutenblog-custom-logo-li):last').addClass('on-hidden').clone();
									if ($clone.parent().size() == 0) {
									  	$clone.prependTo($('#on-hidden-menu > ul'));
									}
								}

								var logo_after_this = $('#navbar.expanded-menu ul.navbar-nav > li:not(".on-hidden"):not(".fake-li"):not(.gutenblog-custom-logo-li)');
								logo_after_this = logo_after_this[logo_after_this_index-1];



								logo_li.insertAfter( logo_after_this );

								logo_rechange = 0;
							}
							if(logo_rechange == 1){
								this.$preloader.animate({opacity: 1}, 0);
							}
						}
					}

				} else {
					
					if(logo_li.length > 0 && logo_rechange == 1){
						var logo_after_this_index = Math.floor($li_visible/2);

						if($li_visible/logo_after_this_index != 2){
							$clone = $('#navbar.expanded-menu ul.navbar-nav > li:not(".on-hidden"):not(".fake-li"):not(.gutenblog-custom-logo-li):last').addClass('on-hidden').clone();
							if ($clone.parent().size() == 0) {
							  	$clone.prependTo($('#on-hidden-menu > ul'));
							}
						}

						var logo_after_this = $('#navbar.expanded-menu ul.navbar-nav > li:not(".on-hidden"):not(".fake-li"):not(.gutenblog-custom-logo-li)');
						logo_after_this = logo_after_this[logo_after_this_index-1];



						logo_li.insertAfter( logo_after_this );

						logo_rechange = 0;
					}
					if(logo_rechange == 1){
						this.$preloader.animate({opacity: 1}, 0);
					}
				}

				if ($('.on-hidden').size() == 0) {
					$('#on-hidden-menu').removeClass('open').hide();
				}
			}
			
	    	this.$preloader.animate({opacity: 1}, 0);

	  }
	};

	if($('#navbar').hasClass('expanded-menu')){
		hiddenNavBar.init();
	}


	$(window).on('resize',function(){
		if($(window).width() >= 1024){
			if($('body').hasClass('nicescroll')){
		        $("body").niceScroll({
		        });
		        $("body").getNiceScroll().show();
		    }
		} else if($(window).width() < 1024){
			if($('body').hasClass('nicescroll')){
		        $("body").getNiceScroll().hide();
		    }
		}

		if($('#navbar').hasClass('expanded-menu')){
			if($(window).width() > 768 ){
		    	hiddenNavBar.resize();
		    } else if($(window).width() <= 768 ){
				hiddenNavBar.$preloader.animate({opacity: 1}, 0);
			}
		}

		if($(window).width() > 768){
			if($('.stripe-menu').length > 0 && !$(".stripe-menu-bg-wrapper").hasClass('stripe-loaded')){
				stripeMenu();
			}
		}

	});

});



jQuery(document).ready(function($){

	"use strict";



	$('body').addClass('js');


	var carousel_posts = $(".frontpage-posts-slider > .main-wrapper > .owl-carousel");
	var carousel_large = $(".frontpage-posts-slider-large > .owl-carousel");

	var owl_options_posts = {
		lazyContent:true,
		loop:true,
		nav:true,
		dots:false,
        margin: 30,
		items: carousel_posts.data('col'),
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:3,
                nav:false
            },
            1000:{
                items:carousel_posts.data('col'),
                nav:true,
                loop:false
            }}
		
	};
	
	carousel_posts.on({
	    'initialized.owl.carousel': function () {
	    	var items = carousel_posts.find('.owl-item');
	    	var h_big = 1;
	    	if(items.length > 0){

	    		items.each(function(e){
	    			var item = $(this);
	    			var h = item.height();
	    			if(h > h_big){
	    				h_big = h;
	    			}
	    		});

	    		items.each(function(e){
	    			var item = $(this);
	    			if(item.height() <= 2){
	    				if(item.find('.entry-thumb').length > 0){
		    				item.find('.entry-thumb').css({
								"min-height" : h_big,
							});
		    			}
	    			}
	    		});
	    	}
	        $('.owl-loading-placeholder').hide();
	    }
	}).owlCarousel(owl_options_posts);


	var owl_options_large = {
		lazyContent:true,
		loop:true,
		nav:true,
		dots:true,
        autoplay: true,
        margin: 30,
		items:1,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		navText: [""]
	};
	carousel_large.on({
	    'initialized.owl.carousel': function () {
	         carousel_large.find('.owl-item').show();
	         $('.owl-loading-placeholder').hide();
	    }
	}).owlCarousel(owl_options_large);


	$("select.form-control").selectpicker();
	$(".header-row-1-toggle").on('click',function(){
		$(this).toggleClass('open');
		$('.header-row-1').toggleClass('open');
		return false;
	});
	$('.checkbox label,.checkbox-inline label,.radio label,.radio-inline label').on('click',function(){
		setupLabel();
	});
	setupLabel();

	$('.search-trigger').on( 'click', function() {
		$(this).siblings('form').find('.search-field').toggleClass('visible').focus();
	});
    
});

jQuery(function($){

	"use strict";

	if($(window).width() >= 992){
		if($('body').hasClass('nicescroll')){
	        $("body").niceScroll({
	        });
	    }
	}

	

});

function setupLabel() {
	if (jQuery('.checkbox,.checkbox-inline').length) {
		jQuery('.checkbox label,.checkbox-inline label').each(function(){
			jQuery(this).removeClass('on');
		});
		jQuery('.checkbox input:checked,.checkbox-inline input:checked').each(function(){
			jQuery(this).parent('label').addClass('on');
		});
	};
	if (jQuery('.radio,.radio-inline').length) {
		jQuery('.radio label,.radio-inline label').each(function(){
			jQuery(this).removeClass('on');
		});
		jQuery('.radio input:checked,.radio-inline input:checked').each(function(){
			jQuery(this).parent('label').addClass('on');
		});
	};
};

function fluidBox(){
	if(jQuery('[data-fluid]').length>0){
		jQuery('[data-fluid]').each(function(){
			var data = jQuery(this).attr('data-fluid');
			var dataFloat = jQuery(this).attr('data-float');
			var _container = jQuery(this);
			var dataSplit = data.split(',');
			if(_container.hasClass('carousel')){
				_container.find('.item').addClass('show');
			}
			for(i=0;i<dataSplit.length;i++){
				if(dataSplit[i]!=''){
					if(jQuery(dataSplit[i],_container).length>0){
						jQuery(dataSplit[i],_container).css('min-height','inherit');
						if( dataFloat=='true' && jQuery(dataSplit[i],_container).parent().css('float')!='none' ){
							var newH = 0;
							if(jQuery(dataSplit[i],_container).length>0){
								jQuery(dataSplit[i],_container).each(function(){
									var thisH = jQuery(this).innerHeight();
									if( newH<thisH ) newH = thisH;
								});
								jQuery(dataSplit[i],_container).css('min-height',newH);
							}
						}else if(dataFloat!='true'){
							var newH = 0;
							if(jQuery(dataSplit[i],_container).length>0){
								jQuery(dataSplit[i],_container).each(function(){
									var thisH = jQuery(this).innerHeight();
									if( newH<thisH ) newH = thisH;
								});
								jQuery(dataSplit[i],_container).css('min-height',newH);
							}
						}
					}
				}
			}
			if(_container.hasClass('carousel')){
				_container.find('.item').removeClass('show');
			}
		});
	}
}






// Progress bar single post

jQuery(function($){

	"use strict";

	// Numbers
    var windowHeight = $(window).height(),
        documentHeight = $(document).height(),
        unit = (documentHeight - windowHeight) / 100,
	// Elements
        progressBar = $('.progress-bar');

    $(window).scroll(function(){
        var currentPosition = $(window).scrollTop(),
            progress = currentPosition / unit;
        $(progressBar).css('width', progress + '%');
    })


    $(document).on('ready',function () {
        $(window).on("scroll", function () {
            var scrollTop = $(window).scrollTop();

            if(scrollTop > 300) {
                $(".single-post-bar").addClass("active-bar");
            } else {
                $(".single-post-bar").removeClass("active-bar");
            }
        });

    });

});




// Top button

jQuery(function($) {
    "use strict";


    var $backToTop = $(".back-to-top");
    $backToTop.hide();


    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 100) {
            $backToTop.fadeIn();
        } else {
            $backToTop.fadeOut();
        }
    });

    $backToTop.on('click', function(e) {
        $("html, body").animate({scrollTop: 0}, 500);
    });

});

// Hidden menu

jQuery(function($){
	"use strict";

	/* Preloader */
	var loaded = 0;
    var out = 0;


    imagesLoaded(document.body, () => {
        loaded = 1;
        setTimeout(function(){
            if(out == 1){
                $('#intro').addClass('loaded').delay(1000).fadeOut(0);
            }
        }, 2000);

    });

    setTimeout(function(){
        out = 1;
        // console.log(loaded);
        if(loaded == 1){
            $('#intro').addClass('loaded').delay(1000).fadeOut(0);
        }
    }, 2000);

	// Side Menu	
    $(".hamburger").on('click',function(){
        $(".gutenblog-side-navigation").toggleClass("open-side-panel");
        $(".gutenblog-bg-overlay").toggleClass("open-bg");
    });

    // Side Cart
    $(".gutenblog-cart-conteiner").on('click',function(){
        $(".gutenblog-side-cart").toggleClass("open-side-cart");
        $(".gutenblog-bg-overlay").toggleClass("open-bg");
    });

    $(document).mouseup(function (e){
        var div = $(".gutenblog-side-navigation, .gutenblog-side-cart");
        if (!div.is(e.target)
            && div.has(e.target).length === 0) {
            $('.gutenblog-side-navigation').removeClass('open-side-panel');
        	$('.gutenblog-side-cart').removeClass('open-side-cart');
            $(".gutenblog-bg-overlay").removeClass("open-bg");
        }


    });


    

    // init();


    $('#search-menu').removeClass('toggled');

    $('#search-icon').on('click',function(e) {
        e.stopPropagation();
        $('#search-menu').toggleClass('toggled');
        $("#popup-search").focus();
    });

    $('#search-menu input').on('click',function(e) {
        e.stopPropagation();
    });

    $('#search-menu, body').on('click',function() {
        $('#search-menu').removeClass('toggled');
    });


	$('.lavalamp-wrap').each(function() {
	    var holder = $(this);
	    var holderPos = holder.offset().left;
	    var links = holder.find('li');
	    var activeLink = links.filter('.active');
	    var animationName = 'easeOutBack';
	    var animSpeed = 700;
	    var animSpeedColor = 400;

	    holder.append('<li class="lavalamp-object"></li>');
	    var lavalamp = holder.find('.lavalamp-object');
	    
	    if(activeLink.length > 0){
	    	lavalampAnimate(activeLink, 0);
	    }

	    links.on('click',function(){
	    	if(!$(this).hasClass('blog-feed-sort-option')){
	    		links.removeClass('active');
	    		$(this).addClass('active');
	    	}
	    });


	    links.on('mouseenter', function() {
	    	if($(this).hasClass('active')){
	    		// $(this).removeClass('active-leave');
	    		window.setTimeout(
    				function(){
    					$(this).removeClass('active-leave');
    				}, animSpeedColor
    			);	
	    	} else {
	    		if(activeLink.length > 0){
	    			window.setTimeout(
	    				function(){
	    					activeLink.addClass('active-leave');	
	    				}, animSpeedColor
	    			);
	    		}
	    	}
	        lavalampAnimate($(this), animSpeed);
	    });

	    links.on('mouseleave', function() {
	    	activeLink = links.filter('.active');
	    	if(activeLink.length > 0){
	    		window.setTimeout(
    				function(){
    					activeLink.removeClass('active-leave');
    				}, animSpeedColor
    			);
		        lavalampAnimate(activeLink, animSpeed);
		    }
	    });

	    function lavalampAnimate(item, duration) {
	        lavalamp.stop().animate({
	            left: item.position().left,
	            width: item.innerWidth(),
	            height: item.innerHeight(),
	            top: item.position().top
	        }, duration);
	    };
	});

	function parallax() {
	    var $slider = document.getElementById("single-post-full-width-parallax-background");
	    if($($slider).length > 0){
		    var yPos = window.pageYOffset / $slider.dataset.speed;
		    yPos = -yPos;
		    var coords = ''+ yPos + 'px';

		    $($slider).css('background-position-y', coords);
		}
	}

	$(window).on("scroll", function () {
        if($(window).width() > 767){
        	parallax();
        }
    });

    $(window).on("resize", function () {
        if($(window).width() < 768){
        	var $slider = document.getElementById("single-post-full-width-parallax-background");
	    	if($($slider).length > 0){
	    		$($slider).css('background-position-y', '0px');
	    	}
        } 
    });




});






