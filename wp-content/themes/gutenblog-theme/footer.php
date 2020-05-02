<?php
/**
* The template for displaying the footer
*
*
*/
?>
            <?php 
            if(is_front_page() && !is_paged() ) { 

                // Output Front Page Element by Order | After Posts Feed
                gutenblog_output_frontpage_order('after');
                
            }
            ?> 

            <?php get_sidebar('footer'); ?>

                
        </div><!-- /body-background-inner-before-footer -->

        <!-- Footer -->
        <?php 
        $footer_design = gutenblog_get_option('gutenblog_footer_design');
        $footer_design_class = "gutenblog-footer-design-default";
        if($footer_design == "parallax") {
            $footer_design_class = "gutenblog-footer-design-parallax";
        } ?>
        <footer class="footer <?php echo esc_attr($footer_design_class); ?>">

            <div class="row main-wrapper">
                <?php if ( is_active_sidebar( 'footer-sidebar-col-1' ) ) { ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12"><?php dynamic_sidebar( 'footer-sidebar-col-1' ); ?></div>
                <?php } ?>
                <?php if ( is_active_sidebar( 'footer-sidebar-col-2' ) ) { ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12"><?php dynamic_sidebar( 'footer-sidebar-col-2' ); ?></div>
                <?php } ?>
                <?php if ( is_active_sidebar( 'footer-sidebar-col-3' ) ) { ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12"><?php dynamic_sidebar( 'footer-sidebar-col-3' ); ?></div>
                <?php } ?>
                <?php if ( is_active_sidebar( 'footer-sidebar-col-4' ) ) { ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12"><?php dynamic_sidebar( 'footer-sidebar-col-4' ); ?></div>
                <?php } ?>
            </div>




            <?php
            $gutenblog_section_socials_facebook = gutenblog_get_option('gutenblog_section_socials_facebook');
            $gutenblog_section_socials_google = gutenblog_get_option('gutenblog_section_socials_google');
            $gutenblog_section_socials_instagram = gutenblog_get_option('gutenblog_section_socials_instagram');
            $gutenblog_section_socials_twitter = gutenblog_get_option('gutenblog_section_socials_twitter');
            $gutenblog_section_socials_behance = gutenblog_get_option('gutenblog_section_socials_behance');
            ?>

            <?php if ( is_active_sidebar( 'footer-sidebar-col-1' ) ) { ?>
                <div class="footer-separate"></div>
            <?php } else {}?>

            <div class="main-wrapper footer-copyright-wrap">
                <div class="row">

                    <?php $gutenblog_footer_copyright = gutenblog_get_option('gutenblog_footer_copyright'); ?>
                        <?php if($gutenblog_footer_copyright) { ?>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 text-xl-left text-lg-left text-md-left text-sm-left footer-copyright">
                                <div><?php echo wp_kses_post($gutenblog_footer_copyright); ?></div>
                            </div>
                    <?php } ?>
                    <?php $gutenblog_footer_credit = gutenblog_get_option('gutenblog_footer_credit'); ?>
                        <?php if($gutenblog_footer_credit) { ?>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 text-xl-right text-lg-right text-md-right text-sm-right footer-credit">
                                <?php echo wp_kses_post($gutenblog_footer_credit); ?>
                            </div>
                    <?php } ?>
                </div>
            </div>
            <div class="main-wrapper footer-socials-wrap">
                <div class="row">
                    <div>
                        <?php
                        $socials = gutenblog_get_option('gutenblog_section_socials_order_links');
                        if($socials !== false && !empty($socials)){?>
                            <div class="d-flex justify-content-start footer-socials-buttons">
                                        <div class="p-3 align-self-center">
                                            <?php $gutenblog_footer_logo = gutenblog_get_option('gutenblog_footer_logo'); ?>
                                            <?php if($gutenblog_footer_logo) { ?>
                                                <img src="<?php echo esc_url( $gutenblog_footer_logo ); ?>" alt="<?php echo esc_attr__('Footer Logo','gutenblog-theme'); ?>">
                                            <?php } ?>
                                        </div>
                                <?php foreach ($socials as $key => $social) { ?>
                                    <?php if($social == 'facebook'){ ?>
                                        <div class="p-3 bd-highlight align-self-center">
                                            <a href="<?php echo esc_url($gutenblog_section_socials_facebook); ?>">
                                                <span class="icon-facebook1 circle-hover"></span>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <?php if($social == 'google'){ ?>
                                        <div class="p-3 bd-highlight align-self-center">
                                            <a href="<?php echo esc_url($gutenblog_section_socials_google); ?>">
                                                <span class="icon-google circle-hover"></span>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <?php if($social == 'instagram'){ ?>
                                        <div class="p-3 bd-highlight align-self-center">
                                            <a href="<?php echo esc_url($gutenblog_section_socials_instagram); ?>">
                                                <span class="icon-instagram1 circle-hover"></span>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <?php if($social == 'twitter'){ ?>
                                        <div class="p-2 bd-highlight align-self-center">
                                            <a href="<?php echo esc_url($gutenblog_section_socials_twitter); ?>">
                                                <span class="icon-twitter1 circle-hover"></span>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <?php if($social == 'behance'){ ?>
                                        <div class="p-2 bd-highlight align-self-center">
                                            <a href="<?php echo esc_url($gutenblog_section_socials_behance); ?>">
                                                <span class="icon-behance circle-hover"></span>
                                            </a>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /Footer -->

        
    </div><!-- /body-background-inner -->

    <?php wp_footer(); ?>

    <div class="back-to-top">Top</div>

</body>
</html>
