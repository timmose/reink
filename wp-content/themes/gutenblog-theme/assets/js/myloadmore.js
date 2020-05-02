jQuery(function($){ 
    "use strict"; 

    window.lazySizesConfig = window.lazySizesConfig || {};
    window.lazySizesConfig.lazyClass = 'lazyload';
    window.lazySizesConfig.loadedClass = 'lazyloaded';
    window.lazySizesConfig.preloadClass = 'lazypreload';
    window.lazySizesConfig.loadingClass = 'lazyloading';
    window.lazySizesConfig.srcAttr = 'data-src';
    window.lazySizesConfig.srcsetAttr = 'data-srcset';
    window.lazySizesConfig.sizesAttr = 'data-sizes';
    
    function isFunction(functionToCheck) {
     return functionToCheck && {}.toString.call(functionToCheck) === '[object Function]';
    }


    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
    };

    

    $(window).on("load",function () {
        /* Isotope */
        var isotope = false;
        var masonry = false;
        var grid = false;
        var first_full_grid = false;
        var first_full_list = false;
        var list = false;
        var puzzle = false;
        var isotope_blog;


        if($('.blog-feed-posts[data-format="Masonry"]').length > 0){
            isotope = true;
            isotope_blog = $('.blog-feed-posts[data-format="Masonry"]');
            masonry = true;
            isotope_blog.isotope({
              itemSelector: '.gutenblog-blog-feed-post',
              percentPosition: true,
              masonry: {
                // use element for option
                columnWidth: '.gutenblog-blog-feed-post'
              }
            });

            

        } else if($('.blog-feed-posts[data-format="Small"]').length > 0){
            isotope = true;
            isotope_blog = $('.blog-feed-posts[data-format="Small"]');
            grid = true;
            isotope_blog.isotope({
                itemSelector: '.gutenblog-blog-feed-post',
                layoutMode: 'fitRows',
                transitionDuration: '1s',
                fitRows: {
                    gutter: 0
                },
                hiddenStyle: {
                    opacity: 0
                },
                visibleStyle: {
                    opacity: 1
                }
            });
        } else if($('.blog-feed-posts[data-format="Mixed-Full-Grid"]').length > 0){
            isotope = true;
            isotope_blog = $('.blog-feed-posts[data-format="Mixed-Full-Grid"]');
            first_full_grid = true;
            isotope_blog.isotope({
                itemSelector: '.gutenblog-blog-feed-post',
                layoutMode: 'fitRows',
                fitRows: {
                    gutter: 0
                }
            });
        } else if($('.blog-feed-posts[data-format="Mixed"]').length > 0){
            isotope = true;
            isotope_blog = $('.blog-feed-posts[data-format="Mixed"]');
            grid = true;
            isotope_blog.isotope({
                itemSelector: '.gutenblog-blog-feed-post',
                layoutMode: 'fitRows',
                fitRows: {
                    gutter: 0
                }
            });
        } else if($('.blog-feed-posts[data-format="Mixed-Full-List"]').length > 0){
            isotope = true;
            isotope_blog = $('.blog-feed-posts[data-format="Mixed-Full-List"]');
            first_full_list = true;
            isotope_blog.isotope({
                itemSelector: '.gutenblog-blog-feed-post',
                layoutMode: 'fitRows',
                fitRows: {
                    gutter: 0
                }
            });
        } else if($('.blog-feed-posts[data-format="List"]').length > 0){
            isotope = true;
            isotope_blog = $('.blog-feed-posts[data-format="List"]');
            list = true;
            isotope_blog.isotope({
                itemSelector: '.gutenblog-blog-feed-post',
                layoutMode: 'fitRows',
                fitRows: {
                    gutter: 0
                }
            });
        }  else if($('.blog-feed-posts[data-format="Puzzle"]').length > 0){
            isotope = false;
            isotope_blog = $('.blog-feed-posts[data-format="Puzzle"]');
            puzzle = true;

        }

        var sort_preloader  = $('.blog-feed-sort-preloader');

        // Twitter Embed
        if($('.blog-feed-posts').find('.wp-block-embed-twitter').length > 0){
            setTimeout(function(){
                isotope_blog.isotope('layout');
            }, 1000);
        }

        // Owl Gallery
        var owl_gallery_options = {
            loop:true,
            nav:true,
            dots: false,
            items:1,
            navText: [""]
        };

        var owl_gallery = $(".gutenblog-blog-feed-post .gallery-content-slider ul.wp-block-gallery, .frontpage-featured-posts .gallery-content-slider ul.wp-block-gallery, .frontpage-posts-slider .gallery-content-slider ul.wp-block-gallery");



        owl_gallery.on('initialized.owl.carousel', function(event){
            isotope_blog.isotope('layout');
        });

        owl_gallery.owlCarousel(owl_gallery_options);


        function afterLoad(el){
            // Twitter Embed
            if(el.find('.wp-block-embed-twitter').length > 0){
                twttr.widgets.load().then(function(e){
                    if(isotope){
                        isotope_blog.isotope('layout');
                    }
                });
            }

            el.find('.gallery-content-slider .wp-block-gallery').on('initialized.owl.carousel', function(event) {
                if(isotope){
                    setTimeout(function(){
                        isotope_blog.isotope('layout');
                    }, 1000);
                }
            });

            // Owl Gallery
            if(el.find('.gallery-content-slider .wp-block-gallery').length > 0){
                el.find('.gallery-content-slider .wp-block-gallery').owlCarousel({
                    loop:true,
                    nav:true,
                    dots: false,
                    items:1,
                    navText: [""]
                });

                
            }

            // Video
            if(el.find('.wp-block-video').length > 0){
                var video = el.find('.wp-block-video');
                // Twitter Embed
                if(isotope){
                    setTimeout(function(){
                        isotope_blog.isotope('layout');
                    }, 2000);
                }
            }

            boxRollovers();

            if($('body').hasClass('nicescroll')){
                $("body").getNiceScroll().resize();
            }
        }


        $('.blog-feed-posts').find('.grid-item').each(function(e){
        });

        $('.blog-feed-sort-option').on('click', function(){
            var self = $(this);
            if(!self.hasClass('active')){
                var sorting_order = self.data('sort');
                var sorting_posttype = "";
                var sort_preloader  = $('.blog-feed-sort-preloader');
                if(sorting_order != "" && sorting_order != "undefined"){

                    $('.blog-feed-sort-option').removeClass('active');
                    self.addClass('active');

                    var currentUrl = window.location.href;
                    var new_order_url;
                    var sorting_order_current = getUrlParameter('order');
                    if(sorting_order_current == "undefined" || sorting_order_current == false || sorting_order_current == undefined){
                        if(window.location.href.indexOf("/?") > -1) {
                            new_order_url = window.location.href+"&order="+sorting_order;
                        }else{
                            new_order_url = window.location.href+"?order="+sorting_order;
                        }
                    } else {
                        new_order_url = location.href.replace("order="+sorting_order_current, "order="+sorting_order);
                    }

                    var blog = $('.blog-feed-posts');
                    var last = blog.find('.gutenblog-blog-feed-post').length;
                    var data = {
                        'action': 'loadmore',
                        'real_action' : 'sort',
                        'order' : sorting_order,
                        'query': gutenblog_loadmore_params.posts, 
                        'page' : gutenblog_loadmore_params.current_page,
                        'last' : last,
                    };
                    if(gutenblog_loadmore_params.cat != undefined && gutenblog_loadmore_params.cat != ""){
                        data['cat'] = gutenblog_loadmore_params.cat;
                    }
                    if(gutenblog_loadmore_params.s != undefined && gutenblog_loadmore_params.s != ""){
                        data['s'] = gutenblog_loadmore_params.s;
                    }

                    $.ajax({
                        url: gutenblog_loadmore_params.ajaxurl,
                        data: data,
                        type: 'POST',
                        beforeSend : function ( xhr ) {
                            sort_preloader.fadeIn(100);
                        },
                        success: function(data) {
                            if( data ) {

                                blog.html('');

                                sort_preloader.fadeOut(100,function(){

                                });

                                history.pushState(null, '', new_order_url);

                                var html = $.parseHTML( data );
                                $(html).hide();
                                var count = 0;

                                var img_content = $('html random-text1234');

                                $.each( html, function( i, el ) {
                                    if($(el).hasClass('new-grid-item')){
                                        if(isotope){
                                            var newEl = $(el).addClass('new-el-feed');
                                            var pics_find = $(el).find('.entry-content .entry-thumb, .entry-content .entry-summary');
                                            img_content = img_content.add(pics_find);
                                        } else {
                                            var delay = count*200;
                                            $(el).hide();
                                            $(el).appendTo(blog).delay( delay ).fadeIn(1000, function(){
                                                afterLoad($(el));
                                            });
                                        }
                                        count++;
                                    }
                                });

                                if(isotope){
                                    img_content.imagesLoaded( function(e) {
                                        $.each( html, function( i, el ) {
                                            if($(el).hasClass('new-grid-item')){

                                                isotope_blog.isotope()
                                                .append( $(el) )
                                                .isotope( 'appended', $(el) )
                                                .isotope('layout');

                                                afterLoad($(el));
                                                $(el).removeClass('new-el-feed');
                                            }
                                        });
                                    });
                                }

                                

                            } // else no data
                        },
                        fail: function(e){
                            console.log('Fail Sorting');
                        },
                    });  
                }
            }
        }); 

        

        $('.gutenblog_loadmore').on("click",function(){
            var button = $(this);

            if(!button.hasClass('gutenblog-loadmore-loading')){

                var blog = $('.blog-feed-posts');
                var button_text = button.find('.gutenblog-loadmore-text');
                var button_img = button.find('.gutenblog-loadmore-loading-img');
                var last = blog.find('.gutenblog-blog-feed-post').length;
                var sorting_order = $('.blog-feed-sort-option.active').data('sort');
                if(sorting_order != "" && sorting_order != "undefined"){} else {
                    sorting_order = "new";
                }
                var data = {
                    'action': 'loadmore',
                    'real_action' : 'load',
                    'order' : sorting_order,
                    'query': gutenblog_loadmore_params.posts, // that's how we get params from wp_localize_script() function
                    'page' : gutenblog_loadmore_params.current_page,
                    'last' : last,
                };
                if(gutenblog_loadmore_params.cat != undefined && gutenblog_loadmore_params.cat != ""){
                    data['cat'] = gutenblog_loadmore_params.cat;
                }
                if(gutenblog_loadmore_params.s != undefined && gutenblog_loadmore_params.s != ""){
                    data['s'] = gutenblog_loadmore_params.s;
                }

                $.ajax({ 
                    url : gutenblog_loadmore_params.ajaxurl, // AJAX handler
                    data : data,
                    type : 'POST',
                    beforeSend : function ( xhr ) {
                        button.addClass('gutenblog-loadmore-loading');

                    },
                    success : function( data ){
                        if( data ) {
                            
                            
                            var html = $.parseHTML( data );
                            $(html).hide();
                            var count = 0;

                            var img_content = $('html random-text1234');

                            $.each( html, function( i, el ) {
                                if($(el).hasClass('new-grid-item')){
                                    if(isotope){
                                        var newEl = $(el).addClass('new-el-feed');
                                        var pics_find = $(el).find('.entry-content .entry-thumb, .entry-content .entry-summary');
                                        img_content = img_content.add(pics_find);
                                    } else {
                                        var delay = count*200;
                                        $(el).hide();
                                        $(el).appendTo(blog).delay( delay ).fadeIn(1000, function(){
                                            afterLoad($(el));
                                        });
                                    }
                                    count++;
                                }
                            });

                            if(isotope){
                                img_content.imagesLoaded( function(e) {
                                    $.each( html, function( i, el ) {
                                        if($(el).hasClass('new-grid-item')){

                                            isotope_blog.isotope()
                                            .append( $(el) )
                                            .isotope( 'appended', $(el) )
                                            .isotope('layout');

                                            afterLoad($(el));
                                            $(el).removeClass('new-el-feed');
                                        }
                                    });


                                    button.removeClass('gutenblog-loadmore-loading');

                                });
                            } else {
                                button.removeClass('gutenblog-loadmore-loading');
                            }

                            gutenblog_loadmore_params.current_page++;


                            if ( gutenblog_loadmore_params.current_page == gutenblog_loadmore_params.max_page )
                                button.remove(); // if last page, remove the button

                        } else {
                            button.remove(); // if no data, remove the button as well
                        }
                    }
                });

            }
        });

        


        /* Infinite Loop */
        if($('.gutenblog_loadmore_infinite').length > 0){

            var button = $('.gutenblog_loadmore_infinite');

            // if(!button.hasClass('gutenblog-loadmore-loading')){

                var blog = $('.blog-feed-posts');
                var button_img = button.find('.gutenblog-loadmore-loading-img-infinite');

                var loading = false;
                var allowScroll = true;
                var stop_load = 0;


                if(button.length > 0){
                    $(window).on('scroll', function(){
                        if( loading == false && stop_load == 0 && allowScroll == true) {
                            
                            // setTimeout(scrollHandling.reallow, scrollHandling.delay);
                            var blog_top_h = blog.offset().top + blog.outerHeight(true);
                            var window_scroll_h = $(window).scrollTop() + $(window).outerHeight(true);
                            var offset = blog_top_h - window_scroll_h;
                            var last = blog.find('.gutenblog-blog-feed-post').length;

                            if( 50 > offset ) {
                                loading = true;
                                allowScroll = false;

                                var sorting_order = $('.blog-feed-sort-option.active').data('sort');
                                if(sorting_order != "" && sorting_order != "undefined"){} else {
                                    sorting_order = "new";
                                }

                                var data = {
                                    'action': 'loadmore',
                                    'real_action' : 'load',
                                    'order' : sorting_order,
                                    'query': gutenblog_loadmore_params.posts, // that's how we get params from wp_localize_script() function
                                    'page' : gutenblog_loadmore_params.current_page,
                                    'last' : last,
                                };
                                if(gutenblog_loadmore_params.cat != undefined && gutenblog_loadmore_params.cat != ""){
                                    data['cat'] = gutenblog_loadmore_params.cat;
                                }
                                if(gutenblog_loadmore_params.s != undefined && gutenblog_loadmore_params.s != ""){
                                    data['s'] = gutenblog_loadmore_params.s;
                                }
                                $.ajax({ // you can also use $.post here
                                    url : gutenblog_loadmore_params.ajaxurl, // AJAX handler
                                    data : data,
                                    type : 'POST',
                                    beforeSend : function ( xhr ) {

                                        button.fadeIn(100);
                                    },
                                    success : function( data ){
                                        if( data ) {
                                            button.fadeOut(100);
                                            allowScroll = true;
                                            var html = $.parseHTML( data )
                                            $(html).hide();
                                            var count = 0;
                                            var delay_count = 0;
                                            var length = $(html).length;
                                            var els = length/2;
                                            // console.log(els);
                                            els = Math.floor(els);
                                            

                                            var img_content = $('html random-text1234');

                                            $.each( html, function( i, el ) {
                                                if($(el).hasClass('new-grid-item')){
                                                    if(isotope){
                                                        var newEl = $(el).addClass('new-el-feed');
                                                        var pics_find = $(el).find('.entry-content .entry-thumb, .entry-content .entry-summary');
                                                        img_content = img_content.add(pics_find);
                                                    } else {
                                                        var delay = count*200;
                                                        $(el).hide();
                                                        $(el).appendTo(blog).delay( delay ).fadeIn(1000, function(){
                                                            delay_count++;

                                                            afterLoad($(el));

                                                            if(delay_count == els){
                                                                loading = false;
                                                            }
                                                        });
                                                    }
                                                    count++;
                                                    if(count == els){
                                                        gutenblog_loadmore_params.current_page++;
                                                    }
                                                }
                                            });

                                            if(isotope){
                                                img_content.imagesLoaded( function(e) {
                                                    $.each( html, function( i, el ) {
                                                        if($(el).hasClass('new-grid-item')){

                                                            isotope_blog.isotope()
                                                            .append( $(el) )
                                                            .isotope( 'appended', $(el) )
                                                            .isotope('layout');

                                                            afterLoad($(el));
                                                            $(el).removeClass('new-el-feed');


                                                        }
                                                    });

                                                    loading = false;

                                                });
                                            } else {

                                            }

                                            if ( gutenblog_loadmore_params.current_page == gutenblog_loadmore_params.max_page ){
                                                button.hide(); 
                                                loading = false;
                                                allowScroll = true;
                                                stop_load = 1;
                                            }

                                        } else {
                                            button.hide(); 
                                            loading = false;
                                            allowScroll = true;
                                        }
                                    },
                                    fail: function(e){
                                        button.hide();
                                        console.log('Infinite Loop send data fail');
                                        loading = false;
                                        allowScroll = true;
                                    },
                                });

                            }
                        }
                    });
                }
            // }
        }

    });


    // Rollovers
    var resize_rolls = 0;
    if($(window).width() > 1024){
      boxRollovers();  
      resize_rolls = 1;
    }
    $(window).on('resize', function(){
        if($(window).width() > 1024){
            if(resize_rolls == 0){
                boxRollovers();  
                resize_rolls = 1;
            }
        }
    });

    function boxRollovers(){
        var $selector = $(".rollovers-wrap");
        var XAngle = 0;
        var YAngle = 0;
        var Z = 20;
        if($selector.length > 0){
            $selector.on("mousemove",function(e){
                var $this = $(this);
                var XRel = e.pageX - $this.offset().left;
                var YRel = e.pageY - $this.offset().top;
                var width = $this.width();

                YAngle = -(0.5 - (XRel / width)) * 10;
                XAngle = (0.5 - (YRel / width)) * 10;
                updateView($this.children(".rollovers-item"), Z, XAngle, YAngle);
            });

            $selector.on("mouseleave",function(){
                var oLayer = $(this).children(".rollovers-item");
                oLayer.css({"transform":"perspective(525px) translateZ(0) rotateX(0deg) rotateY(0deg)","transition":"all .2s linear 0s","-webkit-transition":"all .2s linear 0s"});
                oLayer.find("strong").css({"transform":"perspective(725px) translateZ(0) rotateX(0deg) rotateY(0deg)","transition":"all .2s linear 0s","-webkit-transition":"all .2s linear 0s"});
            });
        }
    }

    function updateView(oLayer, Z, XAngle, YAngle)
    {
        oLayer.css({"transform":"perspective(525px) translateZ(" + Z + "px) rotateX(" + XAngle + "deg) rotateY(" + YAngle + "deg)","transition":"all .2s linear 0s","-webkit-transition":"all .2s linear 0s"});
        oLayer.find("strong").css({"transform":"perspective(725px) translateZ(" + Z + "px) rotateX(" + (XAngle / 0.66) + "deg) rotateY(" + (YAngle / 0.66) + "deg)","transition":"all .2s linear 0s","-webkit-transition":"all .2s linear 0s"});
    }


});