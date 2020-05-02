<?php
$gutenblog_header_settings_signin_btn = gutenblog_get_option('gutenblog_header_settings_signin_btn');
$gutenblog_header_settings_cart_btn = gutenblog_get_option('gutenblog_header_settings_cart_btn');
$gutenblog_header_settings_hidden_sidebar_btn = gutenblog_get_option('gutenblog_header_settings_hidden_sidebar_btn');
$gutenblog_header_settings_search_btn = gutenblog_get_option('gutenblog_header_settings_search_btn');
$gutenblog_section_header_button_design_select = gutenblog_get_option('gutenblog_section_header_button_design_select');
$gutenblog_stripe_menu = gutenblog_get_option('gutenblog_stripe_menu');


?>

<div class="main-wrapper">

<!-- Header -->
<div class="header header-1">
<div id="search-menu">
    <div class="wrapper">
        <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <label>
                <span class="screen-reader-text"><?php echo esc_html__( 'Search for', 'gutenblog-theme' ); ?>&#58;</span>
                <input type="search" class="search-field"
                       placeholder="<?php echo esc_attr__( 'Search', 'gutenblog-theme' ); ?> &#46;&#46;&#46;"
                       value="<?php echo get_search_query() ?>" name="s"
                       title="<?php echo esc_attr__( 'Search for', 'gutenblog-theme' ); ?>&#58;" />
            </label>
            <input type="submit" class="search-submit"
                   value="<?php echo esc_attr__( 'Search', 'gutenblog-theme' ); ?>" />
        </form>
    </div>
</div>



    <div class="b-info fixed-top">
        <!-- Side Menu -->
        <nav class="gutenblog-side-navigation">
            <div class="gutenblog-side-widget-panel" id="navbarSupportedContent">

                <?php
                $socials = gutenblog_get_option('gutenblog_section_socials_order_links');
                if($socials !== false && !empty($socials)){?>
                    <div class="d-flex justify-content-start socials-buttons">
                        <?php foreach ($socials as $key => $social) { ?>
                            <?php if($social == 'facebook'){ ?>
                                <div class="p-2 bd-highlight align-self-center">
                                    <?php $gutenblog_section_socials_facebook = gutenblog_get_option('gutenblog_section_socials_facebook');
                                    echo ('<a href="');
                                    echo gutenblog_get_option( 'gutenblog_section_socials_facebook', '' );
                                    echo ('"><span class="icon-facebook1 circle-hover"></a>');
                                    ?>
                                </div>
                            <?php } ?>
                            <?php if($social == 'google'){ ?>
                                <div class="p-2 bd-highlight align-self-center">
                                    <?php $gutenblog_section_socials_google = gutenblog_get_option('gutenblog_section_socials_google');
                                    echo ('<a href="');
                                    echo gutenblog_get_option( 'gutenblog_section_socials_google', '' );
                                    echo ('"><span class="icon-google circle-hover"></a>');
                                    ?>
                                </div>
                            <?php } ?>
                            <?php if($social == 'instagram'){ ?>
                                <div class="p-2 bd-highlight align-self-center">
                                    <?php $gutenblog_section_socials_instagram = gutenblog_get_option('gutenblog_section_socials_instagram');
                                    echo ('<a href="');
                                    echo gutenblog_get_option( 'gutenblog_section_socials_instagram', '' );
                                    echo ('"><span class="icon-instagram1 circle-hover"></a>');
                                    ?>
                                </div>
                            <?php } ?>
                            <?php if($social == 'twitter'){ ?>
                                <div class="p-2 bd-highlight align-self-center">
                                    <?php $gutenblog_section_socials_twitter = gutenblog_get_option('gutenblog_section_socials_twitter');
                                    echo ('<a href="');
                                    echo gutenblog_get_option( 'gutenblog_section_socials_twitter', '' );
                                    echo ('"><span class="icon-twitter1 circle-hover"></a>');
                                    ?>
                                </div>
                            <?php } ?>
                            <?php if($social == 'behance'){ ?>
                                <div class="p-2 bd-highlight align-self-center">
                                    <?php $gutenblog_section_socials_behance = gutenblog_get_option('gutenblog_section_socials_behance');
                                    echo ('<a href="');
                                    echo gutenblog_get_option( 'gutenblog_section_socials_behance', '' );
                                    echo ('"><span class="icon-behance circle-hover"></a>');
                                    ?>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                <?php } ?>

                <?php if ( is_active_sidebar( 'hidden-widgets' ) ) { ?>
                    <?php dynamic_sidebar( 'hidden-widgets' ); ?>
                <?php } ?>

            </div>
        </nav>

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
    <div class="gutenblog-bg-overlay fade"></div>


    <!-- Header Row 2 -->
    <div class="header-row-2">


        <div class="d-flex justify-content-between">
            <div class="d-flex justify-content-start header-icons width-200">
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
            <div class="p-2 bd-highlight align-self-center logo">
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
            <div class="d-flex justify-content-end width-200 header-icons">
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
                            <ul id="mem" class="clearfix"><li><a href="<?php echo wp_registration_url( get_permalink() ); ?>"><?php echo esc_html__('Register', 'gutenblog-theme'); ?></a></li>
                                <li><a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php echo esc_html__('Login', 'gutenblog-theme'); ?></a></li>
                            </ul>
                        <?php } ?>
                    </div>
                <?php } ?>


            </div>
        </div>

        <!-- </div> -->

    </div>
    <!-- /Header Row 2 -->


    <!-- Header Row 3 -->
    <?php $expanded = "";
    $gutenblog_section_menu_align_select = gutenblog_get_option('gutenblog_section_menu_align_select');
    if(gutenblog_get_option('gutenblog_expanded_menu_enable') == true){
        $expanded = 'expanded-menu';
    } ?>
    <div class="header-row-3">
        <nav id="navbar" class="navbar navbar-expand-md <?php echo esc_attr($expanded); ?> <?php echo esc_attr($gutenblog_section_menu_align_select); ?>">
            <div class=" navbar-nav-container">

                <button class="navbar-toggler circle-hover" type="button" data-toggle="collapse" data-target="#navbarDropdown" aria-controls="navbarDropdown" aria-label="Toggle navigation">
                    <span class="icon-menu "></span>
                </button>

                <?php
                $gutenblog_section_menu_design_select = gutenblog_get_option('gutenblog_section_menu_design_select');
                $gutenblog_stripe_menu = '';
                if($gutenblog_section_menu_design_select == 'menu-design-3'){
                    $gutenblog_stripe_menu = 'stripe-menu';
                } ?>
                <div class="<?php echo esc_attr($gutenblog_stripe_menu); ?> collapse navbar-collapse <?php echo esc_attr($gutenblog_section_menu_align_select); ?>" id="navbarDropdown">
                    <?php if($gutenblog_section_menu_design_select == 'menu-design-3'){ ?>
                        <div class="stripe-menu-bg-wrapper">
                            <div class="stripe-menu-bg-arrow"></div>
                            <div class="stripe-menu-bg"></div>
                        </div>
                    <?php } ?>
                    <?php
                        wp_nav_menu(
                    );
                    ?>

                </div>

            </div>
        </nav>
    </div>
    <!-- /Header Row 3 -->

</div>
</div>
<!-- /Header -->