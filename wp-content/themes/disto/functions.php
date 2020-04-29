<?php
// max content width
if ( ! isset( $content_width ) ){ $content_width = 1200; }
function disto_post_type(){
    if(has_post_format( 'quote')){
        $post_type_image ='<span class="jl_post_type_icon"><i class="la la-quote-right"></i></span>';
    }elseif(has_post_format( 'gallery')){
        $post_type_image ='<span class="jl_post_type_icon"><i class="la la-camera"></i></span>';
    }elseif(has_post_format('video')){
         $post_type_image = '<span class="jl_post_type_icon"><i class="la la-play-circle"></i></span>';
    }elseif(has_post_format('audio')){
         $post_type_image ='<span class="jl_post_type_icon"><i class="la la-volume-up"></i></span>';
    }elseif(has_post_format('image')){
         $post_type_image = '<span class="jl_post_type_icon"><i class="la la-image"></i></span>';
    }elseif(has_post_format('link')){
         $post_type_image = '<span class="jl_post_type_icon"><i class="la la-link"></i></span>';
    }else{
        $post_type_image ='';
    } 
    return $post_type_image;    
}
//register menu
function disto_register_menu() {
    register_nav_menus(
            array(
                'Top_Menu' => esc_html__('Top menu', 'disto'),
            	'Main_Menu' => esc_html__('Main menu', 'disto'),
                'Footer_Menu' => esc_html__('Footer menu', 'disto')
            )
    );
}
add_action('init', 'disto_register_menu');
add_theme_support( 'post-formats', array('gallery', 'quote', 'video', 'audio') );
add_theme_support( 'automatic-feed-links' );
add_theme_support( "title-tag" );
add_theme_support('post-thumbnails');
add_theme_support( 'align-wide' );
add_editor_style( 'css/editor-style.css' );

// Post thumbnail support
if ( !function_exists( 'disto_image_size' ) ) {
	function disto_image_size() {
	add_image_size('disto_justify_feature', 1000, 0, false);
    add_image_size('disto_small_feature', 120, 120, true);
    add_image_size('disto_large_slider_image', 1920, 982, true);
    add_image_size('disto_large_feature_image', 780, 450, true);
    add_image_size('disto_slider_grid_large', 1000, 520, true);
    add_image_size('disto_grid_single', 400, 220, true);
    add_image_size('disto_slider_grid_small', 400, 280, true);
    add_image_size('disto_carousel_small', 380, 350, true);
}
add_action( 'init', 'disto_image_size' );
}

//body class
add_filter( 'body_class','disto_body_classes' );
function disto_body_classes( $classes ) {
    $classes[] = 'mobile_nav_class';
    if (is_active_sidebar('general-sidebar')) {$classes[] = 'jl-has-sidebar';}
    $jl_remove_top= get_post_custom_values('jl_remove_top', get_the_ID());
    if($jl_remove_top[0] != true){}else{$classes[] = "jl_hide_m_top";}
    $page_slider_options_page_slider_options= get_post_custom_values('page_slider_options_page_slider_options', get_the_ID());
    if ( get_theme_mod('header_layout_design') == '' ){$classes[] = get_theme_mod('header_layout_design');}    
    if ( $page_slider_options_page_slider_options[0] == 'homeslider2' ){$classes[] = "jl_home_full_width";}
    elseif ( $page_slider_options_page_slider_options[0] == 'homeslider_full_tab' ){$classes[] = "homeslider_full_tab";}
    elseif ( $page_slider_options_page_slider_options[0] == 'home_center_slider' ){$classes[] = "jl_home_center_slider";}
    elseif ( $page_slider_options_page_slider_options[0] == 'home_single_slider' ){$classes[] = "jl_home_single_slide";}
    elseif ( $page_slider_options_page_slider_options[0] == 'page_slider_grid_5' ){$classes[] = "jl_home_5_grid";}
    elseif ( $page_slider_options_page_slider_options[0] == 'home_grid_2_post_header' ){$classes[] = "jl_home_car2col";}
    elseif ( $page_slider_options_page_slider_options[0] == 'home_grid_3_post_header' ){$classes[] = "jl_home_car3col";}
    elseif ( $page_slider_options_page_slider_options[0] == 'home_grid_4_post_header' ){$classes[] = "jl_home_car4col";}
    elseif ( $page_slider_options_page_slider_options[0] == 'homefullscreen' ){$classes[] = "jl_home_full_screen_height";}
    return $classes;    
}

//Remove Mobile Menu id
add_filter('nav_menu_item_id', 'disto_my_css_attributes_filter', 100, 1);
function disto_my_css_attributes_filter($var) {
  return is_array($var) ? array() : '';
}

//Category span
add_filter('wp_list_categories', 'disto_cat_count_span');
function disto_cat_count_span($links) {
  $links = str_replace('</a> (', '</a> <span>', $links);
  $links = str_replace(')', '</span>', $links);
  return $links;
}

// Sidebar register
function disto_sidebar_register() {
    register_sidebar(array(
        'name' => esc_html__('General Sidebar', 'disto'),
        'id' => 'general-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-title"><h2>',
        'after_title' => '</h2></div>',
    ));

register_sidebar(array(
        'name' => esc_html__('mobile menu sidebar', 'disto'),
        'id' => 'mobile-menu-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-title"><h2>',
        'after_title' => '</h2></div>',
    ));    

register_sidebar(array(
        'name' => esc_html__('Footer1 Sidebar', 'disto'),
        'id' => 'footer1-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<div class="widget-title"><h2>',
        'after_title' => '</h2></div>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer2 Sidebar', 'disto'),
        'id' => 'footer2-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<div class="widget-title"><h2>',
        'after_title' => '</h2></div>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer3 Sidebar', 'disto'),
        'id' => 'footer3-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<div class="widget-title"><h2>',
        'after_title' => '</h2></div>',
    )); 

    register_sidebar(array(
        'name' => esc_html__('Footer4 Sidebar', 'disto'),
        'id' => 'footer4-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<div class="widget-title"><h2>',
        'after_title' => '</h2></div>',
    ));     

    register_sidebar(array(
        'name' => esc_html__('Woocommerce sidebar', 'disto'),
        'id' => 'woocommerce-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-title"><h2>',
        'after_title' => '</h2></div>',
    ));
    
}
add_action('widgets_init', 'disto_sidebar_register');

// Sidebar register
function disto_sidebar_ads() {
    register_sidebar(array(
        'name' => esc_html__('Ads above feature post', 'disto'),
        'id' => 'jl_ads_above_title',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-title"><h2>',
        'after_title' => '</h2></div>',
    ));

register_sidebar(array(
        'name' => esc_attr__('Ads before post content', 'disto'),
        'id' => 'jl_ads_before_content',
        'before_widget' => '',
        'after_widget' => "",
        'before_title' => '<div class="widget-title"><h2>',
        'after_title' => '</h2></div>',
    ));

register_sidebar(array(
        'name' => esc_html__('Ads after post content', 'disto'),
        'id' => 'jl_ads_after_content',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-title"><h2>',
        'after_title' => '</h2></div>',
    ));    

register_sidebar(array(
        'name' => esc_html__('Ads before single post related post', 'disto'),
        'id' => 'jl_ads_before_related',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<div class="widget-title"><h2>',
        'after_title' => '</h2></div>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Ads before single post comment', 'disto'),
        'id' => 'jl_ads_before_comment',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<div class="widget-title"><h2>',
        'after_title' => '</h2></div>',
    ));  
    register_sidebar(array(
        'name' => esc_html__('Ads under post title', 'disto'),
        'id' => 'jl_ads_under_post_title',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<div class="widget-title"><h2>',
        'after_title' => '</h2></div>',
    ));     
 
}
add_action('widgets_init', 'disto_sidebar_ads');

//gallery hook
if (!function_exists('disto_jlmedia_gallery_upload_get_images')) {
	function disto_jlmedia_gallery_upload_get_images(){
		$ids=$_POST['ids'];
		$ids=explode(",",$ids);
		foreach($ids as $id):
			$image = wp_get_attachment_image_src($id,'thumbnail', true);
			echo '<li class="jlmedia-gallery-image-holder"><img src="'.esc_url($image[0]).'"/></li>';
		endforeach;
		exit;
	}
	add_action( 'wp_ajax_disto_jlmedia_gallery_upload_get_images', 'disto_jlmedia_gallery_upload_get_images');
}


//language part
function disto_setup_language(){
    load_theme_textdomain('disto', get_template_directory() . '/langs');
}
add_action('after_setup_theme', 'disto_setup_language');


//Single  post meta
function disto_post_meta_love_view($post_id) {
if(function_exists('disto_share_footer_link')){
echo '<div class="jl_love_view_social">';
echo '<div class="jl_foot_share_col">';
if(function_exists('disto_getPostLikeLink')){
if(get_theme_mod('disable_post_love') !=1){
echo disto_getPostLikeLink(get_the_ID());
}}
if(function_exists('disto_bac_PostViews')){
if(get_theme_mod('disable_post_view') !=1){echo '<span class="view_options"><i class="fa fa-eye"></i>';
echo disto_bac_PostViews(get_the_ID());
echo '</span>';}}
echo '</div>';
echo '<div class="jl_foot_share_col jl_read_more">';
?>
<a class="jl_foot_con_readding" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'disto'); ?></a>
<?php
echo '</div>';
echo '<div class="jl_foot_share_col jl_foot_last_child">';
if(function_exists('disto_share_footer_link')){
echo disto_share_footer_link(get_the_ID());
}
echo '</div>';
?>
<?php
echo '</div>';
}
}
?>
<?php
function disto_singlepost_meta($post_id) {
                echo'<span class="single-post-meta-wrapper">';
                 if(get_theme_mod('disable_post_author') !=1){ echo '<span class="post-author"><span itemprop="author">';echo get_avatar(get_the_author_meta('ID'), 50); echo the_author_posts_link().'</span></span>';}		
                 if(get_theme_mod('disable_post_date') !=1){ echo '<span class="post-date updated" datetime="'.get_the_date().'" itemprop="datePublished"><i class="fa fa-clock-o"></i>'.get_the_date().'</span>';}
                 if(get_theme_mod('disable_post_comment_meta') !=1){ echo '<span class="meta-comment"><i class="fa fa-comment"></i>'; echo comments_popup_link(esc_html__('0 Comment', 'disto' ), esc_html__('1 Comment', 'disto'), esc_html__('% Comments', 'disto')).'</span>'; }
                if(function_exists('disto_getPostLikeLink')){
                if(get_theme_mod('disable_post_love') !=1){
                echo disto_getPostLikeLink(get_the_ID());
                }}
                if(function_exists('disto_bac_PostViews')){
                if(get_theme_mod('disable_post_view') !=1){echo '<span class="view_options"><i class="fa fa-eye"></i>';
                echo disto_bac_PostViews(get_the_ID());
                echo '</span>';}}
                echo'</span>';	
}

//Single  post meta
function disto_single_post_meta($post_id) {
                echo'<span class="single-post-meta-wrapper">';
                 if(get_theme_mod('disable_post_author') !=1){ echo '<span class="post-author"><span itemprop="author">';echo get_avatar(get_the_author_meta('ID'), 30); echo the_author_posts_link().'</span></span>';}       
                 if(get_theme_mod('disable_post_date') !=1){ echo '<span class="post-date updated" itemprop="datePublished"><i class="fa fa-clock-o"></i>'.get_the_date().'</span>';}
                 if(get_theme_mod('disable_post_comment_meta') !=1){ echo '<span class="meta-comment">'; echo comments_popup_link('<i class="fa fa-comment"></i>0', '<i class="fa fa-comment"></i>1', '<i class="fa fa-comment"></i>%').'</span>'; }
                 echo'</span>';	
}

//Single  post meta
function disto_grid_front_post_meta($post_id) {
                echo'<span class="single-post-meta-wrapper">';
                 if(get_theme_mod('disable_post_author') !=1){ echo '<span class="post-author"><span itemprop="author">';echo get_avatar(get_the_author_meta('ID'), 30); echo the_author_posts_link().'</span></span>';}       
                 if(get_theme_mod('disable_post_date') !=1){ echo '<span class="post-date updated" itemprop="datePublished"><i class="fa fa-clock-o"></i>'.get_the_date().'</span>';}
                 if(get_theme_mod('disable_post_comment_meta') !=1){ echo '<span class="meta-comment">'; echo comments_popup_link('<i class="fa fa-comment"></i>0', '<i class="fa fa-comment"></i>1', '<i class="fa fa-comment"></i>%').'</span>'; }
                 echo'</span>';	
}

//Grid post meta
function disto_meta_none_comment($post_id) {
	if(get_theme_mod('disable_post_author') !=1){?>
				
				<div class="grid_meta_bottom_wrapper">
				<span class="author-avatar-image">
				<?php echo get_avatar(get_the_author_meta('user_email'), 30); ?></span> 
				<span class="author-avatar-link">
			<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>">By <?php the_author_meta( 'display_name' ); ?></a>
			<?php if(get_theme_mod('disable_post_date') !=1){ echo '<span class="post-date updated">Posted on '.get_the_date().'</span>';}?>
			</span>
                 <?php
                 echo '</div>';            
}}

//Grid post meta
function disto_grid_post_meta($post_id) {
	if(get_theme_mod('disable_post_author') !=1){?>
				
				<div class="grid_meta_bottom_wrapper">
				<span class="author-avatar-image">
				<?php echo get_avatar(get_the_author_meta('user_email'), 30); ?></span> 
				<span class="author-avatar-link">
			<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>">By <?php the_author_meta( 'display_name' ); ?></a>
			<?php if(get_theme_mod('disable_post_date') !=1){ echo '<span class="post-date updated">Posted on '.get_the_date().'</span>';}?>
			</span>
                 <?php
                 echo '</div>';            
}}

function disto_header_post_meta_img($post_id) {
							if(get_theme_mod('disable_post_author') !=1){
                               echo'<span class="post-meta meta-main-img auto_image_with_date">';
							?>
				<span class="author-avatar-link">
			<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><i class="fa fa-user"></i><?php the_author_meta( 'display_name' ); ?></a>
			</span><?php }?>
                 <?php
                               if(get_theme_mod('disable_post_date') !=1){echo '<span class="post-date"><i class="fa fa-clock-o"></i>'.get_the_date().'</span>';}
								     echo'</span>';
}

function disto_header_post_meta($post_id) {
							if(get_theme_mod('disable_post_author') !=1){
                               echo'<span class="post-meta meta-main-img auto_image_with_date">';
							?>
				<span class="author-avatar-link">
			<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><i class="fa fa-user"></i><?php the_author_meta( 'display_name' ); ?></a>
			</span><?php }?>
                 <?php
                               if(get_theme_mod('disable_post_date') !=1){echo '<span class="post-date"><i class="fa fa-clock-o"></i>'.get_the_date().'</span>';}
								     echo'</span>';
}

function disto_post_meta_dc($post_id) {
                     echo'<span class="post-meta meta-main-img auto_image_with_date">';
                     if(get_theme_mod('disable_post_date') !=1){echo '<span class="post-date"><i class="fa fa-clock-o"></i>'.get_the_date().'</span>';}
                     if(get_theme_mod('disable_post_comment_meta') !=1){ echo '<span class="meta-comment">'; echo comments_popup_link('<i class="fa fa-comment"></i>0', '<i class="fa fa-comment"></i>1', '<i class="fa fa-comment"></i>%').'</span>'; }
                     echo'</span>';
}

function disto_post_meta($post_id) {
                            echo '<span class="jl_post_meta" itemscope="" itemprop="author" itemtype="http://schema.org/Person">';
							if(get_theme_mod('disable_post_author') !=1){
                                echo '<span class="jl_author_img_w" itemprop="name">';
                                echo get_avatar(get_the_author_meta('ID'), 30);
                                echo the_author_posts_link();
                                echo '</span>';
                            }
                               if(get_theme_mod('disable_post_date') !=1){echo '<span class="post-date"><i class="fa fa-clock-o"></i>'.get_the_date().'</span>';}
								     echo'</span></span>';
}
function disto_post_meta_date($post_id) {
                               echo'<span class="post-meta meta-main-img auto_image_with_date">';?>
                             <?php
                               if(get_theme_mod('disable_post_date') !=1){echo '<span class="post-date"><i class="fa fa-clock-o"></i>'.get_the_date().'</span>';}
                                     echo'</span>';
}


//sidebar post
function disto_post_sidebar() {
$sidebar_post_options = get_post_meta(get_the_ID(), 'sbg_selected_sidebar_replacement', true);	
if(isset($sidebar_post_options[0])){
					$custom_sidebar = $sidebar_post_options[0];
					
					$post_sidebar = get_theme_mod('post_sidebar');
					if(!empty($post_sidebar)) {
						$custom_sidebar = $post_sidebar;
					};
					global $wp_registered_sidebars;
					foreach ( $wp_registered_sidebars as $sidebar ) {
					if($sidebar['name'] == $custom_sidebar)
			  			{
							 $dyn_side = $sidebar['id'];
						}
					} 
				}			

				if(isset($dyn_side)) {
					
					if (is_active_sidebar($dyn_side)) : dynamic_sidebar($dyn_side);
		            endif;								
					
					
				} else{
					if (is_active_sidebar('general-sidebar')) { dynamic_sidebar('general-sidebar'); }
				}						
}

//sidebar page
function disto_page_sidebar() {
	$sidebar_page_options = get_post_meta(get_the_ID(), 'sbg_selected_sidebar_replacement', true);
	if(isset($sidebar_page_options[0])){
					$custom_sidebar = $sidebar_page_options[0];
					
					$page_sidebar = get_theme_mod('page_sidebar','');	
					if(!empty($page_sidebar)) {
						$custom_sidebar = $page_sidebar;
					};
					global $wp_registered_sidebars;
					foreach ( $wp_registered_sidebars as $sidebar ) {
					if($sidebar['name'] == $custom_sidebar)
			  			{
							 $dyn_side = $sidebar['id'];
						}
					} 
				}			

				if(isset($dyn_side)) {
					
					if (is_active_sidebar($dyn_side)) : dynamic_sidebar($dyn_side);
		            endif;								
					
					
				} else{
					if (is_active_sidebar('general-sidebar')) { dynamic_sidebar('general-sidebar'); }
				}		
}

//sidebar category
function disto_category_sidebar() {
$category_sidebar = get_theme_mod('category_sidebar','');	
				$custom_sidebar ='';
				if(!empty($category_sidebar)) {	$custom_sidebar = $category_sidebar;	};				
				
					global $wp_registered_sidebars;
					foreach ( $wp_registered_sidebars as $sidebar ) {
					if($sidebar['name'] == $custom_sidebar)
			  			{
							 $custom_sidebar = $sidebar['id'];
						}
				} 
				
				if(!empty($custom_sidebar)) {
					if (is_active_sidebar($custom_sidebar)) : dynamic_sidebar($custom_sidebar);
		            endif;	
				} else{
					if (is_active_sidebar('general-sidebar')) : dynamic_sidebar('general-sidebar');
		            endif;
				}
}

//sidebar tag
function disto_tag_sidebar() {
$tag_sidebar = get_theme_mod('tag_sidebar','');	
				$custom_sidebar ='';
				if(!empty($tag_sidebar)) {	$custom_sidebar = $tag_sidebar;	};				
				
					global $wp_registered_sidebars;
					foreach ( $wp_registered_sidebars as $sidebar ) {
					if($sidebar['name'] == $custom_sidebar)
			  			{
							 $custom_sidebar = $sidebar['id'];
						}
				} 
				
				if(!empty($custom_sidebar)) {
					if (is_active_sidebar($custom_sidebar)) : dynamic_sidebar($custom_sidebar);
		            endif;	
				} else{
					if (is_active_sidebar('general-sidebar')) : dynamic_sidebar('general-sidebar');
		            endif;
				}
}

//sidebar archive
function disto_archive_sidebar() {
$archive_sidebar = get_theme_mod('archive_sidebar','');	
				$custom_sidebar ='';
				if(!empty($archive_sidebar)) {	$custom_sidebar = $archive_sidebar;	};				
				
					global $wp_registered_sidebars;
					foreach ( $wp_registered_sidebars as $sidebar ) {
					if($sidebar['name'] == $custom_sidebar)
			  			{
							 $custom_sidebar = $sidebar['id'];
						}
				} 
				
				if(!empty($custom_sidebar)) {
					if (is_active_sidebar($custom_sidebar)) : dynamic_sidebar($custom_sidebar);
		            endif;	
				} else{
					if (is_active_sidebar('general-sidebar')) : dynamic_sidebar('general-sidebar');
		            endif;
				}
}

//sidebar author
function disto_author_sidebar() {
$author_sidebar = get_theme_mod('author_sidebar','');	
				$custom_sidebar ='';
				if(!empty($author_sidebar)) {	$custom_sidebar = $author_sidebar;	};				
				
					global $wp_registered_sidebars;
					foreach ( $wp_registered_sidebars as $sidebar ) {
					if($sidebar['name'] == $custom_sidebar)
			  			{
							 $custom_sidebar = $sidebar['id'];
						}
				} 
				
				if(!empty($custom_sidebar)) {
					if (is_active_sidebar($custom_sidebar)) : dynamic_sidebar($custom_sidebar);
		            endif;	
				} else{
					if (is_active_sidebar('general-sidebar')) : dynamic_sidebar('general-sidebar');
		            endif;
				}
}

//sidebar search
function disto_search_sidebar() {
$search_sidebar = get_theme_mod('search_sidebar','');	
				$custom_sidebar ='';
				if(!empty($search_sidebar)) {	$custom_sidebar = $search_sidebar;	};				
				
					global $wp_registered_sidebars;
					foreach ( $wp_registered_sidebars as $sidebar ) {
					if($sidebar['name'] == $custom_sidebar)
			  			{
							 $custom_sidebar = $sidebar['id'];
						}
				} 
				
				if(!empty($custom_sidebar)) {
					if (is_active_sidebar($custom_sidebar)) : dynamic_sidebar($custom_sidebar);
		            endif;	
				} else{
					if (is_active_sidebar('general-sidebar')) : dynamic_sidebar('general-sidebar');
		            endif;
				}
}


//Comment template
if ( ! function_exists( 'disto_comment' ) ){
function disto_comment( $comment, $args, $depth ) {
	global $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php esc_html_e( 'Pingback:', 'disto'); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( '(Edit)', 'disto'), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 80 );
					printf( '<span class="comment-author-name" itemprop="name">%1$s %2$s</span>',
						get_comment_author_link(),
						
						( $comment->user_id === $post->post_author ) ? '<span> ' . esc_html__( 'Post author', 'disto') . '</span>' : ''
					);
					printf( '<a class="comment-author-date" itemprop="datePublished" href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
					
						sprintf( esc_html__( '%1$s at %2$s', 'disto'), get_comment_date(), get_comment_time() )
					);
				?>

			<?php edit_comment_link( esc_html__( 'Edit', 'disto'), '', '' ); ?>
			
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'disto'), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			
			</header>

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'disto'); ?></p>
			<?php endif; ?>

			<section class="comment-content comment" itemprop="text">
				<?php comment_text(); ?>
			</section>

			
		</article>
	<?php
		break;
	endswitch; 
}
}

//NUMERIC PAGE NAVI
if ( ! function_exists( 'disto_pagination' ) ) {
    function disto_pagination( $disto_qry = NULL ) {

        $disto_no_more_articles = esc_html__( 'No more articles', 'disto' );
        $disto_load_more_text = esc_html__( 'Load More', 'disto' );
        $disto_pagination_type = 'numbered';

        if ( is_category() ) {
            
                $disto_cat_id = get_query_var('cat');
                $disto_pagination_type = get_term_meta( $disto_cat_id, 'disto_cat_infinite', true);
            
        }

        if ( is_home() ) {
           
        }

        if ( is_tag() ) {
            
        }

        if ( $disto_qry == NULL ) {
            global $wp_query;
            $disto_total = $GLOBALS['wp_query']->max_num_pages;
            $disto_paged = get_query_var('paged');
        } else {     
            if ( is_page() ) {
                $disto_total = $disto_qry->max_num_pages;
                $disto_pagination_type = 'n';
                $disto_paged = get_query_var('page');
            } else {
                global $wp_query;
                $disto_paged = get_query_var('paged');
                $disto_total = $GLOBALS['wp_query']->max_num_pages;
            }
            
        }

        if ( $disto_pagination_type == 'infinite-load' ) {
            if ( get_next_posts_link() != NULL ) {
                echo '<div class="pagination-more"><div class="more-previous">' . get_next_posts_link( $disto_load_more_text ) . '</div></div>';
            } else {
                echo '<div class="pagination-more"><div class="more-previous">' . $disto_no_more_articles . '</div></div>';
            }
        } elseif ( $disto_pagination_type == 'infinite-scroll' ) {
            if (  get_next_posts_link() != NULL ) {
                echo '<div class="jelly-infinite-load">' . get_next_posts_link( $disto_load_more_text ) . '</div>';
            } else {
                echo '<div class="jelly-infinite-load"><span>' . $disto_no_more_articles . '</span></div>';
            }
        } else {
            $disto_pagination = paginate_links( array(
                'base'     => str_replace( 99999, '%#%', esc_url( get_pagenum_link(99999) ) ),
                'format'   => '',
                'total'    => $disto_total,
                'current'  => max( 1, $disto_paged ),
                'mid_size' => 2,
                'prev_text' => '<i class="fa fa-long-arrow-left"></i>',
                'next_text' => '<i class="fa fa-long-arrow-right"></i>',
                'type' => 'list',
            ) );
            echo '<nav class="jellywp_pagination">' . $disto_pagination . '</nav>';
        }
    }
}

//BLOG STLYE LOOP
if ( ! function_exists( 'disto_get_qry' ) ) {
    function disto_get_qry() {
        if ( is_home() || is_category() ) {
            $disto_paged = get_query_var('paged');
            $disto_grid_size = $disto_current_cat = NULL;
            if ( $disto_paged == false ) {
                $disto_paged = 1;
            }
            if ( is_category() ) {
                $disto_current_cat = get_query_var('cat');
                $disto_grid_size = disto_get_category_offset();
            } elseif ( is_home() ) {
                $disto_grid_size = 0;
            }
            if ( $disto_grid_size != NULL ) {
                $disto_offset_loop = 'on';
            } else {
                $disto_offset_loop = NULL;
            }
            $disto_featured_qry = array( 'cat' => $disto_current_cat, 'offset' => $disto_grid_size, 'orderby' => 'date', 'order' => 'DESC',  'post_status' => 'publish', 'disto_offset_loop' => $disto_offset_loop, 'paged' => $disto_paged );
            $disto_qry = new WP_Query( $disto_featured_qry );
        } elseif ( is_page() ) {
            $disto_paged = get_query_var('page');
            $disto_arr = NULL;
            if ( $disto_paged == false ) {
                $disto_paged = 1;
            }
            $disto_page_id = get_the_ID();
            $disto_hp_category_filter = 'off';
            $disto_lb_offset = 'on';

            if ( $disto_hp_category_filter == 'off' ) {
                $disto_hp_category = '';
                foreach ( $disto_hp_category as $disto_cat ) {
                    $disto_arr .= $disto_cat . ',';
                }
                $disto_arr = rtrim( $disto_arr, ",");
            }
            if ( $disto_lb_offset != NULL ) {
                $disto_offset_loop = 'on';
            } else {
                $disto_offset_loop = NULL;
            }
            $disto_qry = new WP_Query( array('post_status' => 'publish', 'ignore_sticky_posts' => true, 'paged' => $disto_paged, 'cat' => $disto_arr, 'offset' => $disto_lb_offset, 'disto_offset_loop' => $disto_offset_loop  ) );
        } else {
            global $wp_query;
            $disto_qry = $wp_query;
        }
        return $disto_qry;
    }
}

//OFFSETTING QUERY VARIABLE['disto_offset_loop']
if ( ! function_exists( 'disto_offset_loop_pre_get_posts' ) ) {
    function disto_offset_loop_pre_get_posts( $query ){

        if ( isset( $query->query_vars['disto_offset_loop'] ) && ( $query->query_vars['disto_offset_loop'] == 'on' ) ) {
            if ( is_category() ) { $disto_grid_size = disto_get_category_offset(); }
            $disto_posts_per_page = get_option('posts_per_page');
            if ( $query->is_paged == true ) {
                $disto_page_offset = $disto_grid_size + ( ( $query->query_vars['paged'] - 1 ) * $disto_posts_per_page );
                $query->set( 'offset', $disto_page_offset );
            } else {
                $query->set( 'offset', $disto_grid_size );
            }
        }
         if ( ( is_category() || is_tag() || is_home() ) && $query->is_main_query() && ( ! is_admin() ) ) {
            $query->set( 'post_type', 'post' );
        }
        return $query;
    }
}
add_action( 'pre_get_posts', 'disto_offset_loop_pre_get_posts' );

//CATEGORY PAGINATION WITH OFFSET
if ( ! function_exists( 'disto_category_offset' ) ) {
    function disto_get_category_offset() {

        $disto_return = 0;

        
            $disto_cat_id = get_query_var('cat');
            $disto_offset = 'on';

            if ( $disto_offset == 'on' || $disto_offset == 'off' || $disto_offset == '' ) {

                $disto_grid_onoff = "";
             
                if ($disto_grid_onoff == 'style_1'){
                    $disto_return = 0;
                }elseif($disto_grid_onoff == 'style_2'){
                	$disto_return = 0;
                }
                elseif($disto_grid_onoff == 'style_3'){
                	$disto_return = 0;
                }
                elseif($disto_grid_onoff == 'style_4'){
                	$disto_return = 0;
                }
                elseif($disto_grid_onoff == 'style_5'){
                	$disto_return = 0;
                }
                elseif($disto_grid_onoff == 'style_6'){
                	$disto_return = 0;
                }
                elseif($disto_grid_onoff == 'style_7'){
                	$disto_return = 0;
                }
                elseif($disto_grid_onoff == 'style_8'){
                	$disto_return = 0;
                }
                elseif($disto_grid_onoff == 'style_9'){
                	$disto_return = 0;
                }
                elseif($disto_grid_onoff == 'style_10'){
                	$disto_return = 0;
                }
                else{
                	$disto_return = NULL;
                }
            }
        return $disto_return;
    }
}

//PAGINATION WITH OFFSET
if ( ! function_exists( 'disto_pagination_offset' ) ) {
    function disto_pagination_offset($found_posts, $query) {
        $disto_grid_size = 0;
        if ( is_category() ) { $disto_grid_size = disto_get_category_offset(); }

        if ( is_home() ) { $disto_grid_size = 0; }

        if ( is_page() ) { 
            $disto_grid_size = 0;
        }
        return ( $found_posts - $disto_grid_size );
    }
}
add_filter('found_posts', 'disto_pagination_offset', 1, 2 );

//post excerpt
function disto_list_post_excerpt($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content) >= $limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      $content = strip_tags($content);
      return $content;
    }

function disto_post_list_excerpt($text, $chars_limit){
$chars_text = strlen($text);
$text = $text." ";
$text = substr($text,0,$chars_limit);
$text = substr($text,0,strrpos($text,' '));
if ($chars_text > $chars_limit){$text = $text."...";}
return $text;
}    

//Google font load
function disto_fonts() {
	$google_font = '';
    $title_style_text = get_theme_mod('disto_title_font_family') ?: 'Poppins';
    $disto_title_font_weight = get_theme_mod('disto_title_font_weight').',400' ?: ',400,700';
    $paragrap_style_text = get_theme_mod('disto_p_font_family') ?: 'Poppins';
    $disto_p_font_weight = get_theme_mod('disto_p_font_weight').',400' ?: ',400,600';
    $menu_font_style = get_theme_mod('disto_menu_font_family') ?: 'Poppins';
    $disto_menu_font_weight = get_theme_mod('disto_menu_font_weight').',400' ?: ',400,600';
    $disto_sub_menu_font_weight = ','.get_theme_mod('disto_sub_menu_font_weight').',400' ?: ',400,600';
    $subsets  = 'latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese';
    $google_font = add_query_arg( array(
            'family' => urlencode ( $title_style_text.':'.$disto_title_font_weight.'|'.$paragrap_style_text.':'.$disto_p_font_weight.'|'.$menu_font_style.':'.$disto_menu_font_weight.$disto_sub_menu_font_weight),
            'subset' => urlencode ( $subsets ),
        ), '//fonts.googleapis.com/css' );
    return esc_url_raw($google_font);
}

function disto_font_scripts() {
    wp_enqueue_style( 'disto_fonts_url', disto_fonts(), array(), '1.6' );
}
add_action( 'wp_enqueue_scripts', 'disto_font_scripts' );

include get_template_directory() . '/inc/metabox/category-meta.php';
include get_template_directory() . '/inc/functions/sidebar-generator.php';
include get_template_directory() . '/inc/functions/menu-option.php';
include get_template_directory() . '/inc/customizer/customizer.php';
include get_template_directory() . '/inc/functions/tgm-plugin-activation/class-tgm-plugin-activation.php';
include get_template_directory() . '/inc/functions/tgm-plugin-activation/required-plugins.php';

//Theme style
add_action( 'wp_enqueue_scripts', 'disto_load_css' );
function disto_load_css() {
		wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css', false, '1.6' ); 
		wp_enqueue_style( 'disto_style', get_template_directory_uri().'/style.css', false, '1.6' );
		wp_enqueue_style( 'disto_responsive', get_template_directory_uri().'/css/responsive.css', false, '1.6' ); 
		wp_add_inline_style( 'disto_responsive', disto_generate_dynamic_css() );
}

if ( !function_exists( 'disto_generate_dynamic_css' ) ){
	function disto_generate_dynamic_css() {
		ob_start();
		get_template_part( 'dynamic-css' );
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}
}

function disto_custom_inline_script(){
?>
<script type="text/javascript">
jQuery(document).ready(function ($) {
"use strict";
    var resize_full_image = function() {
        $('.jl_full_screen_height').css({
            width: $(window).width(),
            height: $(window).height()
        });
    };
    $(window).on('resize', resize_full_image);
    resize_full_image();
});
</script>
<?php
}
add_action( 'wp_footer', 'disto_custom_inline_script' );

//Theme scripts
function disto_enqueue_script() {
	wp_enqueue_script( 'fluidvids', get_template_directory_uri().'/js/fluidvids.js', array('jquery'), '1.6', true );
    wp_enqueue_script( 'infinitescroll', get_template_directory_uri().'/js/infinitescroll.js', array('jquery'), '1.6', true );
    wp_enqueue_script( 'justified', get_template_directory_uri().'/js/justified.js', array('jquery'), '1.6', true );
    wp_enqueue_script( 'slick', get_template_directory_uri().'/js/slick.js', array('jquery'), '1.6', true );
    wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri().'/js/theia-sticky-sidebar.js', array('jquery'), '1.5', true );
    wp_enqueue_script( 'aos', get_template_directory_uri().'/js/aos.js', array('jquery'), '1.6', true );      
	wp_enqueue_script( 'disto-custom', get_template_directory_uri().'/js/custom.js', array('jquery'), '1.6', true );	    
}
add_action( 'wp_enqueue_scripts', 'disto_enqueue_script' );
?>