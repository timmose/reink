<?php 
$gutenblog_section_socials_facebook = gutenblog_get_option('gutenblog_section_socials_facebook'); 
$gutenblog_section_socials_google = gutenblog_get_option('gutenblog_section_socials_google');
$gutenblog_section_socials_instagram = gutenblog_get_option('gutenblog_section_socials_instagram');
$gutenblog_section_socials_twitter = gutenblog_get_option('gutenblog_section_socials_twitter');
$gutenblog_section_socials_behance = gutenblog_get_option('gutenblog_section_socials_behance');
?>

<nav class="gutenblog-side-navigation">

    <div class="gutenblog-side-widget-panel" id="navbarSupportedContent">
        <?php
        $socials = gutenblog_get_option('gutenblog_section_socials_order_links');
        if($socials !== false && !empty($socials)){?>
            <div class="d-flex justify-content-start socials-buttons">
                <?php foreach ($socials as $key => $social) { ?>
                    <?php if($social == 'facebook'){ ?>
                        <div class="p-2 bd-highlight align-self-center">
                            <a href="<?php echo esc_url($gutenblog_section_socials_facebook); ?>">
                                <span class="icon-facebook1 circle-hover"></span>
                            </a>
                        </div>
                    <?php } ?>
                    <?php if($social == 'google'){ ?>
                        <div class="p-2 bd-highlight align-self-center">
                            <a href="<?php echo esc_url($gutenblog_section_socials_google); ?>">
                                <span class="icon-google circle-hover"></span>
                            </a>
                        </div>
                    <?php } ?>
                    <?php if($social == 'instagram'){ ?>
                        <div class="p-2 bd-highlight align-self-center">
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

        <?php if ( is_active_sidebar( 'hidden-widgets' ) ) { ?>
            <?php dynamic_sidebar( 'hidden-widgets' ); ?>
        <?php } ?>

    </div>

</nav>