(function($){
	"use strict";	
    $(document).ready(function() {
        $('.sidebar select').chosen();
        // Mobile Menu
        function az_mobile_menu()
        {
            if ( $('.az-mobile-menu-buton').length )
            {
                $('.az-mobile-menu-buton').click( function(){
                    $('.az-main-menu .sub-menu').hide();
                    $('.az-main-menu .menu-item-has-children > a').removeClass('open');
                    if ( $('.az-main-menu').is(':hidden') ) {
                        $('.az-main-menu').slideDown(360);
                    } else {
                        $('.az-main-menu').slideUp(360);
                    }
                });
            }

            $('.az-main-menu .menu-item-has-children > a').keypress(function(event) {
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if (keycode == '13') {
                    var $submenu = $(this).closest('.menu-item-has-children').find(' > .sub-menu');
                    $submenu.toggle();
                    return false;
                }
            });

            $('.az-main-menu .menu-item-has-children > a').click( function(e) {
                var $submenu = $(this).closest('.menu-item-has-children').find(' > .sub-menu');            
                if ( $submenu.is(':hidden') ) {
                    $submenu.slideDown(360);
                    $(this).addClass('open');
                } else {
                    $submenu.slideUp(360);
                    $(this).removeClass('open');
                }
                return false;
            });
        }
        az_mobile_menu();
    });
})(jQuery);
