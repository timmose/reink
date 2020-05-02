<?php
$gutenblog_header_settings_signin_btn = gutenblog_get_option('gutenblog_header_settings_signin_btn');
$gutenblog_header_settings_cart_btn = gutenblog_get_option('gutenblog_header_settings_cart_btn');
$gutenblog_header_settings_hidden_sidebar_btn = gutenblog_get_option('gutenblog_header_settings_hidden_sidebar_btn');
$gutenblog_header_settings_search_btn = gutenblog_get_option('gutenblog_header_settings_search_btn');
$gutenblog_section_header_button_design_select = gutenblog_get_option('gutenblog_section_header_button_design_select');
$atleastonecontrol = 0;
$atleastonecontrol_left = 0;
$atleastonecontrol_right = 0;

$menu_class = ' menu-controls-enabled';
$controls_wrap_class_left = ' controls-wrap-enabled';
$controls_wrap_class_right = ' controls-wrap-enabled';
if($gutenblog_header_settings_signin_btn == true){
    $menu_class .= ' menu-control-singin ';
    $controls_wrap_class_right .= ' wrap-control-singin ';
    $atleastonecontrol = 1;
    $atleastonecontrol_right = 1;
}
if($gutenblog_header_settings_cart_btn == true){
    $menu_class .= ' menu-control-cart ';
    $controls_wrap_class_right .= ' wrap-control-cart ';
    $atleastonecontrol = 1;
    $atleastonecontrol_right = 1;
}
if($gutenblog_header_settings_hidden_sidebar_btn == true){
    $menu_class .= ' menu-control-sidebar ';
    $controls_wrap_class_left .= ' wrap-control-sidebar ';
    $atleastonecontrol = 1;
    $atleastonecontrol_left = 1;
}
if($gutenblog_header_settings_search_btn == true){
    $menu_class .= ' menu-control-search ';
    $controls_wrap_class_left .= ' wrap-control-search ';
    $atleastonecontrol = 1;
    $atleastonecontrol_left = 1;
}
?>

<div class="main-wrapper">

    <!-- Header -->
    <div class="header">

        <!-- Side Menu -->
        <div class="b-info fixed-top">

            <!-- Side Menu -->
            <?php get_template_part( 'parts/hidden-sidebar' ); ?>
            <!-- /Side Menu -->

            <?php if (class_exists('WooCommerce')) { ?>
                <?php if(gutenblog_get_option('gutenblog_side_cart_enable') == true){ ?>
                    <!-- Side Cart -->
                    <div class="gutenblog-side-cart">
                        <div class="gutenblog-mini-cart">
                            <?php woocommerce_mini_cart(); ?>
                        </div>
                    </div>
                    <!-- /Side Cart -->
                <?php } ?>
            <?php } ?>

        </div>
        <!-- /Side Menu -->

        <div class="gutenblog-bg-overlay fade"></div>

        <!-- Header Row -->
        <div class="header header-3 header-row-2 desktop-header-wrap">

            <div id="search-menu">
                <div class="wrapper">
                    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <label>
                            <span class="screen-reader-text"><?php echo esc_html__( 'Search for', 'gutenblog-theme' ); ?>&#58;</span>
                            <input type="search" class="search-field"
                                   placeholder="<?php echo esc_attr__( 'Search', 'gutenblog-theme' ) ?> &#46;&#46;&#46;"
                                   value="<?php echo get_search_query() ?>" name="s"
                                   title="<?php echo esc_attr__( 'Search for', 'gutenblog-theme' ) ?> &#58;" />
                        </label>
                        <input type="submit" class="search-submit"
                               value="<?php echo esc_attr__( 'Search', 'gutenblog-theme' ); ?>" />
                    </form>
                </div>
            </div>

            <div class="d-flex justify-content-between align-self-center">
                <!-- Controls Left -->
                <div class="d-flex align-self-center justify-content-start header-icons <?php if($atleastonecontrol_left == 1){ echo esc_attr($controls_wrap_class_left); } ?>">
                    <?php
                    if($gutenblog_header_settings_hidden_sidebar_btn == true){ ?>
                        <?php if ( is_active_sidebar( 'hidden-widgets' ) ) { ?>
                            <div class="header-menu-toggle-wrap bd-highlight align-self-center">
                                <button class="navbar-toggler navbar-toggler-right hamburger header-icon-color circle-hover" type="button" data-toggle="collapse1" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                                    <span class="icon-more-horizontal "></span>
                                    <span class="header-button-label"><?php echo esc_html__( 'Menu', 'gutenblog-theme' ); ?></span>
                                </button>
                            </div>
                        <?php } ?>
                    <?php } ?>

                    <?php
                    if($gutenblog_header_settings_search_btn == true){ ?>
                        <div class="header-search-toggle-wrap bd-highlight header-icon-color align-self-center">
                            <?php if($gutenblog_section_header_button_design_select == 'header-button-design-1'){ ?>
                                <span class="icon-search circle-hover" id="search-icon"></span>
                                <span class="header-button-label"><?php echo esc_html__( 'Search', 'gutenblog-theme' ); ?></span>
                            <?php } ?>
                            <?php if($gutenblog_section_header_button_design_select == 'header-button-design-2'){ ?>
                                <span class="icon-search circle-hover"></span>
                                <span class="header-button-label" id="search-icon"><?php echo esc_html__( 'Search', 'gutenblog-theme' ); ?></span>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <!-- Menu -->
                <div class="d-flex p-2 bd-highlight align-self-center justify-content-start logo menu-width-header-3 menu-width-header <?php if($atleastonecontrol == 1){ echo esc_attr($menu_class); } ?>">
                    
                    <!-- Main Menu -->
                    <?php 
                    $expanded = "";
                    $gutenblog_section_menu_align_select = gutenblog_get_option('gutenblog_section_menu_align_select');
                    if(gutenblog_get_option('gutenblog_expanded_menu_enable') == true){
                        $expanded = 'expanded-menu';
                    } ?>
                    <nav id="navbar" class="navbar navbar-expand-md <?php echo esc_attr($expanded); ?> <?php  echo esc_attr($gutenblog_section_menu_align_select); ?>">
                        <div class=" navbar-nav-container">

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarDropdown" aria-controls="navbarDropdown" aria-label="Toggle navigation">
                                <span class="icon-menu circle-hover"></span>
                            </button>

                            <?php
                            $gutenblog_section_menu_design_select = gutenblog_get_option('gutenblog_section_menu_design_select');
                            $gutenblog_section_menu_align_select = gutenblog_get_option('gutenblog_section_menu_align_select');

                            $gutenblog_stripe_menu = '';
                            if($gutenblog_section_menu_design_select == 'menu-design-3'){
                                $gutenblog_stripe_menu = ' stripe-menu ';
                            } 
                             
                            ?>

                            <div class="<?php echo esc_attr($gutenblog_stripe_menu);  echo esc_attr($gutenblog_section_menu_align_select); ?> collapse navbar-collapse" id="navbarDropdown">
                                <?php if($gutenblog_section_menu_design_select == 'menu-design-3'){ ?>
                                    <div class="stripe-menu-bg-wrapper">
                                        <div class="stripe-menu-bg-arrow"></div>
                                        <div class="stripe-menu-bg"></div>
                                    </div>
                                <?php } ?>

                                <?php wp_nav_menu(
                                    array(
                                        'menu_class' => 'main-header-menu'
                                    )
                                ); ?>

                            </div>

                        </div>
                    </nav>
                </div>

                <!-- Controls Right -->
                <div class="d-flex  align-self-center header-icons justify-content-end <?php if($atleastonecontrol_right == 1){ echo esc_attr($controls_wrap_class_right); } ?>">

                    <?php
                    if (class_exists('WooCommerce')) {
                        if($gutenblog_header_settings_cart_btn == true){ ?>
                            <div class="bd-highlight cart-wrap circle-hover <?php if(gutenblog_get_option('gutenblog_side_cart_enable') == true){ echo "gutenblog-cart-conteiner"; } ?> align-self-center">
                                <span class="icon-shopping-cart align-self-center"></span>
                                <span class="header-button-label"><?php echo esc_html__( 'Cart', 'gutenblog-theme' ); ?></span>
                                <?php if(gutenblog_get_option('gutenblog_side_cart_enable') == false){ ?>
                                <a class="gutenblog-cart-link" href="<?php echo wc_get_cart_url(); ?>" title="<?php echo esc_attr__( 'View your shopping cart', 'gutenblog-theme' ); ?>">
                                    <?php } ?>
                                    <div class="cart-container align-self-center ">
                                        <div class="counter gutenblog-counter-cart">
                                            <span><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                                        </div>
                                    </div>
                                    <?php if(gutenblog_get_option('gutenblog_side_cart_enable') == false){ ?>
                                </a>
                            <?php } ?>

                            </div>
                        <?php } ?>
                    <?php } ?>

                    <?php
                    if($gutenblog_header_settings_signin_btn == true){ ?>
                        <div class="user-wrap header-user-info-wrap bd-highlight align-self-center <?php echo esc_attr($gutenblog_stripe_menu);?>">
                            <?php
                            $user = wp_get_current_user();
                            if ( $user ) { ?>
                                <img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" alt="<?php echo esc_attr__('Avatar', 'gutenblog-theme'); ?>" />
                            <?php } ?>


                            <?php
                            if ( is_user_logged_in() ) {
                                global $current_user; ?>
                                <ul id="mem" class="clearfix">
                                    <li class="user-info"><span>Logged in as</span> <?php $current_user->display_name ?></li>
                                    <li><a href="<?php echo wp_logout_url( get_permalink() ); ?>"><?php echo esc_html__('Logout', 'gutenblog-theme'); ?></a></li>
                                </ul>

                            <?php } else { ?>
                                <ul id="mem" class="clearfix"><li><a href="<?php echo wp_registration_url( get_permalink() ); ?>"><?php _e('Register', 'gutenblog-theme'); ?></a></li>
                                    <li><a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php echo esc_html__('Login', 'gutenblog-theme'); ?></a></li>
                                </ul>
                            <?php } ?>
                        </div>
                    <?php } ?>

                </div>
            </div>

        </div>
        <!-- /Header Row -->


<!-- Mobile Header -->
<div class="mobile-header-wrap">
    <div class="d-flex">
        <div class="p-2 mr-auto align-self-center mobile-logo">
            <?php
            if(gutenblog_get_option('gutenblog_image_logo_show') == 1) {
                if ( function_exists( 'the_custom_logo' ) ) {
                    the_custom_logo();
                }
            } else {
                $gutenblog_text_logo = gutenblog_get_option('gutenblog_text_logo');
                if($gutenblog_text_logo == '') {
                    $gutenblog_text_logo = get_bloginfo('name');
                }
                ?>

                <?php if ( is_front_page() ) { ?>
                    <h1 class="header-logo-text"><a class="header-logo-text-link" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html($gutenblog_text_logo) ?></a></h1>
                    <?php if( display_header_text() ) { ?>
                        <div class="tagline"><?php $tagline = get_bloginfo('description'); if($tagline != '') { ?><p><?php echo esc_html($tagline); ?></p><?php } ?></div>
                    <?php } ?>
                <?php } else { ?>
                    <div class="header-logo-text"><a class="header-logo-text-link" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html($gutenblog_text_logo) ?></a></div>
                <?php } ?>

            <?php } ?>
        </div>
        <div class="p-2 align-self-center">
            <?php
            $gutenblog_section_menu_align_select = gutenblog_get_option('gutenblog_section_menu_align_select');
            ?>
            <div class="mobile-menu">
                <nav id="navbar-mobile" class="navbar navbar-expand-md <?php echo esc_attr($gutenblog_section_menu_align_select); ?>">

                    <button class="navbar-toggler circle-hover" type="button" data-toggle="collapse" data-target="#navbarDropdown-mobile" aria-controls="navbarDropdown-mobile" aria-label="Toggle navigation">
                        <span class="icon-menu "></span>
                    </button>

                    <?php
                    $gutenblog_section_menu_align_select = gutenblog_get_option('gutenblog_section_menu_align_select');

                    ?>
                    <div class="<?php echo esc_attr($gutenblog_section_menu_align_select); ?> collapse navbar-collapse" id="navbarDropdown-mobile">

                        <?php wp_nav_menu(); ?>

                    </div>


                </nav>
            </div>
        </div>
    </div>
</div>
<!-- /Mobile Header -->

    </div>
    <!-- /Header -->

</div>
<!-- /Main Wrapper -->