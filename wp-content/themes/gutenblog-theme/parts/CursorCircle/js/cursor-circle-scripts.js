jQuery(document).ready(function($){

    var mouseX, mouseY;

    function func() {

    }   
    var trig = 0;
    $(document).on('mousemove', function(e) {

        
        setTimeout(function(){
            captureMousePosition(e);
        }, 50);

    }).mouseover();

    $(document).on({
        mouseenter: function (e) {
            
            var thumb = $(e.currentTarget).parent('.has_thumb').attr('data-thumb');
            if(thumb != "undefined" && thumb != undefined && thumb != ""){
                $('#ggt-circle').css('background-image', 'url('+thumb+')');
                $('#ggt-circle').addClass('thumb');
            }

            $('#ggt-circle').removeClass('arrow');
            $('#ggt-circle').removeClass('hover');

            $('#ggt-circle').removeClass('left');
            $('#ggt-circle').removeClass('right');
        },
        mouseleave: function (e) {
            $('#ggt-circle').removeClass('thumb');

            $('#ggt-circle').css('background-image', '');

            $('#ggt-circle').removeClass('arrow');
            $('#ggt-circle').removeClass('hover');

            $('#ggt-circle').removeClass('left');
            $('#ggt-circle').removeClass('right');
        }
    }, ".previous_post.has_thumb a[rel='prev'], .next_post.has_thumb a[rel='next']");

    // All Links and etc.
    $(document).on({
        mouseenter: function () {
            $('#ggt-circle').addClass('hover');
            $('#ggt-circle').removeClass('arrow');
        },
        mouseleave: function () {
            $('#ggt-circle').removeClass('hover');
            $('#ggt-circle').removeClass('arrow');
        }
    }, "a, .circle-hover, .icon-span");

    $(document).on({
        mouseenter: function () {
            $('#ggt-circle').addClass('arrow');
            $('#ggt-circle').removeClass('hover');

            $('#ggt-circle').addClass('left');
            $('#ggt-circle').removeClass('right');
        },
        mouseleave: function () {
            $('#ggt-circle').removeClass('arrow');
            $('#ggt-circle').removeClass('hover');

            $('#ggt-circle').removeClass('left');
            $('#ggt-circle').removeClass('right');
        }
    }, ".gutenblog-blog-feed-post .owl-nav > div.owl-prev, .frontpage-featured-posts .owl-nav > div.owl-prev,.frontpage-posts-slider ul.wp-block-gallery  .owl-nav > div.owl-prev,.frontpage-posts-slider-large .frontpage-large-owl-carousel .owl-nav > div.owl-prev");

    $(document).on({
        mouseenter: function () {
            $('#ggt-circle').addClass('arrow');
            $('#ggt-circle').removeClass('hover');

            $('#ggt-circle').addClass('right');
            $('#ggt-circle').removeClass('left');
        },
        mouseleave: function () {
            $('#ggt-circle').removeClass('arrow');
            $('#ggt-circle').removeClass('hover');

            $('#ggt-circle').removeClass('left');
            $('#ggt-circle').removeClass('right');
        }
    }, ".gutenblog-blog-feed-post .owl-nav > div.owl-next,.frontpage-featured-posts .owl-nav > div.owl-next,.frontpage-posts-slider ul.wp-block-gallery  .owl-nav > div.owl-next,.frontpage-posts-slider-large .frontpage-large-owl-carousel .owl-nav > div.owl-next");




    var xMousePos = 0;
    var yMousePos = 0;
    var lastScrolledLeft = 0;
    var lastScrolledTop = 0;
    $(window).scroll(function(event) {
        if(lastScrolledLeft != $(document).scrollLeft()){
            xMousePos -= lastScrolledLeft;
            lastScrolledLeft = $(document).scrollLeft();
            xMousePos += lastScrolledLeft;
        }
        if(lastScrolledTop != $(document).scrollTop()){
            yMousePos -= lastScrolledTop;
            lastScrolledTop = $(document).scrollTop();
            yMousePos += lastScrolledTop;
        }
        window.status = "x = " + xMousePos + " y = " + yMousePos;

        var circle = anime({
    	  targets: '#ggt-circle',
    	  translateX: xMousePos,
    	  translateY: yMousePos,
    	  duration: 50,
      	  easing: 'linear',
    	  direction: '',
    	});
    });
    
    function captureMousePosition(event){
        xMousePos = event.pageX;
        yMousePos = event.pageY;
        window.status = "x = " + xMousePos + " y = " + yMousePos;

        var circle = anime({
    	  targets: '#ggt-circle',
    	  translateX: xMousePos,
    	  translateY: yMousePos,
    	  duration: 1,
      	  easing: 'linear',
    	  direction: '',
    	});
    }

}(jQuery));