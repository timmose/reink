<?php
/**
 * The Header for the theme.
 *
 * Displays all of the <head> section and logo, navigation, header widgets
 *
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <?php wp_head(); ?>

</head>

<?php
// Echo Preloader if Enable
gutenblog_echo_preloader();

// Fade In/Fade Out Effect 
gutenblog_fadeout_effect();

// Include custom fonts
gutenblog_reinit_kirki_fonts();

// Cursor Effects if Enable
gutenblog_custom_effects();

// Get body classes
?>

<body <?php body_class(); ?> >

<?php
// Background Image Link if Enable in Customizer
gutenblog_background_img_link();
?>

<div class="body-background-inner">

<div class="body-background-inner-before-footer">

<?php
// Output selected header
$gutenblog_section_header_select = gutenblog_get_option('gutenblog_section_header_select');
if($gutenblog_section_header_select == 'header-1') {
    get_template_part( 'inc/headers/header-1' );
} else if($gutenblog_section_header_select == 'header-2') {
    get_template_part( 'inc/headers/header-2' );
} else if($gutenblog_section_header_select == 'header-3'){
    get_template_part( 'inc/headers/header-3' );
} else if($gutenblog_section_header_select == 'header-4'){
    get_template_part( 'inc/headers/header-4' );
}

?>



<?php
// Output Banner or Featured
if(is_front_page() && !is_paged() ) {

    // Output Front Page Element by Order | Before Posts Feed
    gutenblog_output_frontpage_order('before');

}
?>      

