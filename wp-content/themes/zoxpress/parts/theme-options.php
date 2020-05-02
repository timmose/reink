<?php

define('zox', 'white');
require_once get_template_directory() . '/admin/admin-page.php';
require_once get_template_directory() . '/admin/options.php';
$options_page = new WhitelabelOptions( 'ZoxPress Options', 'zoxpress-options', 'zox', 'themes.php', null, 'edit_theme_options', null, true, false, false, $options );

if ( !function_exists( 'zox_fonts_url' ) ) {
function zox_fonts_url() {

$zox_content_font = get_option('zox_content_font');
$zox_para_font = get_option('zox_para_font');
$zox_menu_font = get_option('zox_menu_font');
$zox_feat_font = get_option('zox_feat_font');
$zox_headline_font = get_option('zox_headline_font');
$zox_headm_font = get_option('zox_headm_font');
$zox_heads_font = get_option('zox_heads_font');

if (!empty($zox_content_font)) {
$font_url = '';

    if ( 'off' !== _x( 'on', 'Google font: on or off', 'zoxpress' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Heebo:300,400,500,700,800,900|Alegreya:400,500,700,800,900|Josefin Sans:300,400,600,700|Libre Franklin:300,400,500,600,700,800,900|Frank Ruhl Libre:300,400,500,700,900|Nunito Sans:300,400,600,700,800,900|Montserrat:300,400,500,600,700,800,900|Anton:400|Noto Serif:400,700|Nunito:300,400,600,700,800,900|Rajdhani:300,400,500,600,700|Titillium Web:300,400,600,700,900|PT Serif:400,400i,700,700i|Amiri:400,400i,700,700i|Oswald:300,400,500,600,700|Roboto Mono:400,700|Barlow Semi Condensed:700,800,900|Poppins:300,400,500,600,700,800,900|Roboto Condensed:300,400,700|Roboto:300,400,500,700,900|PT Serif:400,700|Open Sans Condensed:300,700|Open Sans:700|Source Serif Pro:400,600,700|IM Fell French Canon:400,400i|' .  $zox_content_font . ':100,100i,200, 200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|' .  $zox_para_font . ':100,100i,200, 200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|' .  $zox_menu_font . ':100,100i,200, 200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|' .  $zox_feat_font . ':100,100i,200, 200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|' .  $zox_headline_font . ':100,100i,200, 200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|' .  $zox_headm_font . ':100,100i,200, 200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|' .  $zox_heads_font . ':100,100i,200, 200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&subset=latin,latin-ext,cyrillic,cyrillic-ext,greek-ext,greek,vietnamese' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
} else {
$font_url = '';

    if ( 'off' !== _x( 'on', 'Google font: on or off', 'zoxpress' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Alegreya:400,500,700,800,900|Josefin Sans:300,400,600,700|Libre Franklin:300,400,500,600,700,800,900|Frank Ruhl Libre:300,400,500,700,900|Nunito Sans:300,400,600,700,800,900|Montserrat:300,400,500,600,700,800,900|Anton:400|Noto Serif:400,700|Nunito:300,400,600,700,800,900|Rajdhani:300,400,500,600,700|Titillium Web:300,400,600,700,900|PT Serif:400,400i,700,700i|Amiri:400,400i,700,700i|Oswald:300,400,500,600,700|Roboto Mono:400,700|Barlow Semi Condensed:700,800,900|Poppins:300,400,500,600,700,800,900|Roboto Condensed:300,400,700|Roboto:300,400,500,700,900|PT Serif:400,700|Open Sans Condensed:300,700|Open Sans:700|Source Serif Pro:400,600,700|IM Fell French Canon:400,400i&subset=latin,latin-ext,cyrillic,cyrillic-ext,greek-ext,greek,vietnamese' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;

}

}
}

if ( !function_exists( 'zox_styles_method' ) ) {
function zox_styles_method() {
    wp_enqueue_style(
        'zox-custom-style',
        get_stylesheet_uri()
    );

	$zox_skin = get_option('zox_skin');
	$zox_wall_ad = get_option('zox_wall_ad');
	$zox_lead_img1 = get_option('zox_lead_img1');
	$zox_post_adimg = get_option('zox_post_adimg');
	$zox_primary = get_option('zox_primary');
	$zox_secondary = get_option('zox_secondary');
	$zox_top_nav_bg = get_option('zox_top_nav_bg');
	$zox_top_nav_text = get_option('zox_top_nav_text');
	$zox_top_nav_hover = get_option('zox_top_nav_hover');
	$zox_top_navh = get_option('zox_top_navh');
	$zox_top_nav_fs = get_option('zox_top_nav_fs');
	$zox_bot_nav_bg = get_option('zox_bot_nav_bg');
	$zox_bot_nav_text = get_option('zox_bot_nav_text');
	$zox_bot_nav_hover = get_option('zox_bot_nav_hover');
	$zox_link_color = get_option('zox_link_color');
	$zox_headm_color = get_option('zox_headm_color');
	$zox_heads_color = get_option('zox_heads_color');
	$zox_headp_color = get_option('zox_headp_color');
	$zox_foot_bg = get_option('zox_foot_bg');
	$zox_foot_text = get_option('zox_foot_text');
	$zox_foot_link = get_option('zox_foot_link');
	$zox_logo_navp = get_option('zox_logo_navp');
	$zox_bot_navh = get_option('zox_bot_navh');
	$zox_bot_nav_fs = get_option('zox_bot_nav_fs');
	$zox_side_width = get_option('zox_side_width');
	$zox_postw = get_option('zox_postw');
	$zox_px = "px";
	$zox_content_font = get_option('zox_content_font');
	$zox_content_font_style = get_option('zox_content_font_style');
	$zox_content_font_variant = get_option('zox_content_font_variant');
	$zox_para_font = get_option('zox_para_font');
	$zox_para_font_style = get_option('zox_para_font_style');
	$zox_para_font_variant = get_option('zox_para_font_variant');
	$zox_menu_font = get_option('zox_menu_font');
	$zox_menu_font_style = get_option('zox_menu_font_style');
	$zox_menu_font_variant = get_option('zox_menu_font_variant');
	$zox_feat_font = get_option('zox_feat_font');
	$zox_feat_font_style = get_option('zox_feat_font_style');
	$zox_feat_font_variant = get_option('zox_feat_font_variant');
	$zox_headline_font = get_option('zox_headline_font');
	$zox_headline_font_style = get_option('zox_headline_font_style');
	$zox_headline_font_variant = get_option('zox_headline_font_variant');
	$zox_headm_font = get_option('zox_headm_font');
	$zox_headm_font_style = get_option('zox_headm_font_style');
	$zox_headm_font_variant = get_option('zox_headm_font_variant');
	$zox_heads_font = get_option('zox_heads_font');
	$zox_heads_font_style = get_option('zox_heads_font_style');
	$zox_heads_font_variant = get_option('zox_heads_font_variant');
	$zox_headp_font = get_option('zox_headp_font');
	$zox_headp_font_style = get_option('zox_headp_font_style');
	$zox_headp_font_variant = get_option('zox_headp_font_variant');
	$zox_css = get_option('zox_css');

if (!empty($zox_skin)) {
	$zox_theme_options = "

	a,
	a:visited,
	a:hover h2.zox-s-title1,
	a:hover h2.zox-s-title1-feat,
	a:hover h2.zox-s-title2,
	a:hover h2.zox-s-title3,
	.zox-post-body p a,
	h3.zox-post-cat a,
	.sp-template a,
	.sp-data-table a,
	span.zox-author-name a,
	a:hover h2.zox-authors-latest,
	span.zox-authors-name a:hover {
		color: $zox_link_color;
	}

	.zox-s8 a:hover h2.zox-s-title1,
	.zox-s8 a:hover h2.zox-s-title1-feat,
	.zox-s8 a:hover h2.zox-s-title2,
	.zox-s8 a:hover h2.zox-s-title3 {
		box-shadow: 15px 0 0 #fff, -10px 0 0 #fff;
		color: $zox_link_color;
	}

	.woocommerce-message:before,
	.woocommerce-info:before,
	.woocommerce-message:before,
	.woocommerce .star-rating span:before,
	span.zox-s-cat,
	h3.zox-post-cat a,
	.zox-s6 span.zox-s-cat,
	.zox-s8 span.zox-s-cat,
	.zox-widget-side-trend-wrap .zox-art-text:before {
		color: $zox_primary;
	}

	.zox-widget-bgp,
	.zox-widget-bgp.zox-widget-txtw .zox-art-wrap,
	.zox-widget-bgp.zox-widget-txtw .zox-widget-featl-sub .zox-art-wrap,
	.zox-s4 .zox-widget-bgp span.zox-s-cat,
	.woocommerce span.onsale,
	.zox-s7 .zox-byline-wrap:before,
	.zox-s3 span.zox-s-cat,
	.zox-o1 span.zox-s-cat,
	.zox-s3 .zox-widget-side-trend-wrap .zox-art-text:before,
	.sp-table-caption,
	#zox-search-form #zox-search-submit,
	.pagination .current,
	.pagination a:hover,
	.zox-o6 span.zox-s-cat {
		background: $zox_primary;
	}

	.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
	.woocommerce #respond input#submit.alt,
	.woocommerce a.button.alt,
	.woocommerce button.button.alt,
	.woocommerce input.button.alt,
	.woocommerce #respond input#submit.alt:hover,
	.woocommerce a.button.alt:hover,
	.woocommerce button.button.alt:hover,
	.woocommerce input.button.alt:hover {
		background-color: $zox_primary;
	}

	.woocommerce-error,
	.woocommerce-info,
	.woocommerce-message {
		border-top-color: $zox_primary;
	}

	.zox-feat-ent1-left,
	.zox-ent1 .zox-side-widget {
		border-top: 2px solid $zox_primary;
	}

	.zox-feat-ent3-main-wrap h2.zox-s-title2 {
		background-color: $zox_primary;
		box-shadow: 15px 0 0 $zox_primary, -10px 0 0 $zox_primary;
	}

	.zox-widget-side-trend-wrap .zox-art-text:before,
	.pagination .current,
	.pagination a:hover {
		border: 1px solid $zox_primary;
	}

	.zox-post-type {
		border: 3px solid $zox_primary;
	}
	.zox-widget-featl-sub .zox-post-type {
		border: 2px solid $zox_primary;
	}

	.zox-o3 h3.zox-s-cat {
		background: $zox_secondary;
	}

	.zox-widget-bgs,
	.zox-widget-bgs.zox-widget-txtw .zox-art-wrap,
	.zox-widget-bgs.zox-widget-txtw .zox-widget-featl-sub .zox-art-wrap,
	.zox-s4 .zox-widget-bgp span.zox-s-cat {
		background: $zox_secondary;
	}

	#zox-top-head-wrap {
		background: $zox_top_nav_bg;
	}

	span.zox-top-soc-but,
	.zox-top-nav-menu ul li a,
	span.zox-woo-cart-icon {
		color: $zox_top_nav_text;
	}

	span.zox-woo-cart-num {
		background: $zox_top_nav_text;
	}

	.zox-top-nav-menu ul li:hover a {
		color: $zox_bot_nav_hover;
	}

	#zox-top-head-wrap,
	#zox-top-head,
	#zox-top-head-left,
	#zox-top-head-mid,
	#zox-top-head-right,
	.zox-top-nav-menu ul {
		height: $zox_top_navh$zox_px;
	}

	#zox-top-head-mid img {
		max-height: calc($zox_top_navh$zox_px - 20px);
	}

	.zox-top-nav-menu ul li a {
		font-size: $zox_top_nav_fs$zox_px;
	}

	#zox-bot-head-wrap,
	#zox-bot-head-wrap.zox-trans-bot.zox-fix-up,
	#zox-fly-wrap,
	#zox-bot-head-wrap.zox-trans-bot:hover {
		background-color: $zox_bot_nav_bg;
	}

	.zox-nav-menu ul li a,
	span.zox-nav-search-but,
	span.zox-night,
	.zox-trans-bot.zox-fix-up .zox-nav-menu ul li a,
	.zox-trans-bot.zox-fix-up span.zox-nav-search-but,
	nav.zox-fly-nav-menu ul li a,
	span.zox-fly-soc-head,
	ul.zox-fly-soc-list li a {
		color: $zox_bot_nav_text;
	}

	.zox-nav-menu ul li.menu-item-has-children a:after,
	.zox-nav-menu ul li.zox-mega-drop a:after {
		border-right: 1px solid $zox_bot_nav_text;
		border-bottom: 1px solid $zox_bot_nav_text;
	}

	.zox-fly-but-wrap span,
	.zox-trans-bot.zox-fix-up .zox-fly-but-wrap span,
	.zox-fly-but-wrap span {
		background: $zox_bot_nav_text;
	}

	.zox-nav-menu ul li:hover a,
	span.zox-nav-search-but:hover,
	span.zox-night:hover {
		color: $zox_bot_nav_hover;
	}

	.zox-fly-but-wrap:hover span {
		background: $zox_bot_nav_hover;
	}

	span.zox-widget-main-title {
		color: $zox_headm_color;
	}

	#zox-foot-wrap {
		background: $zox_foot_bg;
	}

	#zox-foot-wrap p {
		color: $zox_foot_text;
	}

	#zox-foot-wrap a {
		color: $zox_foot_link;
	}

	ul.zox-foot-soc-list li a {
		border: 1px solid $zox_foot_link;
	}

	span.zox-widget-side-title {
		color: $zox_heads_color;
	}

	span.zox-post-main-title {
		color: $zox_headp_color;
	}

	.zox-top-nav-menu ul li a {
		padding-top: calc(($zox_top_navh$zox_px - $zox_top_nav_fs$zox_px) / 2);
		padding-bottom: calc(($zox_top_navh$zox_px - $zox_top_nav_fs$zox_px) / 2);
	}

	#zox-bot-head-wrap,
	.zox-bot-head-menu,
	#zox-bot-head,
	#zox-bot-head-left,
	#zox-bot-head-right,
	#zox-bot-head-mid,
	.zox-bot-head-logo,
	.zox-bot-head-logo-main,
	.zox-nav-menu,
	.zox-nav-menu ul {
		height: $zox_bot_navh$zox_px;
	}

	.zox-nav-menu ul li ul.sub-menu,
	.zox-nav-menu ul li.menu-item-object-category .zox-mega-dropdown {
		top: $zox_bot_navh$zox_px;
	}

	.zox-nav-menu ul li a {
		font-size: $zox_bot_nav_fs$zox_px;
	}

	.zox-nav-menu ul li a {
		padding-top: calc(($zox_bot_navh$zox_px - $zox_bot_nav_fs$zox_px) / 2);
		padding-bottom: calc(($zox_bot_navh$zox_px - $zox_bot_nav_fs$zox_px) / 2);
	}

	.zox-fix-up {
		top: -$zox_bot_navh$zox_px;
		-webkit-transform: translate3d(0,-$zox_bot_navh$zox_px,0) !important;
	   	   -moz-transform: translate3d(0,-$zox_bot_navh$zox_px,0) !important;
	    	-ms-transform: translate3d(0,-$zox_bot_navh$zox_px,0) !important;
	     	 -o-transform: translate3d(0,-$zox_bot_navh$zox_px,0) !important;
				transform: translate3d(0,-$zox_bot_navh$zox_px,0) !important;
	}

	.zox-fix {
		top: -$zox_bot_navh$zox_px;
		-webkit-transform: translate3d(0,$zox_bot_navh$zox_px,0) !important;
	   	   -moz-transform: translate3d(0,$zox_bot_navh$zox_px,0) !important;
	    	-ms-transform: translate3d(0,$zox_bot_navh$zox_px,0) !important;
	     	 -o-transform: translate3d(0,$zox_bot_navh$zox_px,0) !important;
				transform: translate3d(0,$zox_bot_navh$zox_px,0) !important;
	}

	.zox-fix-up .zox-nav-menu ul li a {
		padding-top: calc((60px - $zox_bot_nav_fs$zox_px) / 2);
		padding-bottom: calc((60px - $zox_bot_nav_fs$zox_px) / 2);
	}

	.zox-feat-ent1-grid,
	.zox-feat-ent2-bot,
	.zox-feat-net1-grid {
		grid-template-columns: auto $zox_side_width$zox_px;
	}

	body,
	span.zox-s-cat,
	span.zox-ad-label,
	span.zox-post-excerpt p,
	.woocommerce ul.product_list_widget li a,
	.woocommerce ul.product_list_widget span.product-title,
	.woocommerce #reviews #comments ol.commentlist li .comment-text p.meta,
	.woocommerce div.product p.price,
	.woocommerce div.product p.price ins,
	.woocommerce div.product p.price del,
	.woocommerce ul.products li.product .price del,
	.woocommerce ul.products li.product .price ins,
	.woocommerce ul.products li.product .price,
	.woocommerce #respond input#submit,
	.woocommerce a.button,
	.woocommerce button.button,
	.woocommerce input.button,
	.woocommerce .widget_price_filter .price_slider_amount .button,
	.woocommerce span.onsale,
	.woocommerce-review-link,
	#woo-content p.woocommerce-result-count,
	.woocommerce div.product .woocommerce-tabs ul.tabs li a,
	.woocommerce .woocommerce-breadcrumb,
	.woocommerce #respond input#submit.alt,
	.woocommerce a.button.alt,
	.woocommerce button.button.alt,
	.woocommerce input.button.alt {
		font-family: '$zox_content_font', sans-serif;
		font-weight: $zox_content_font_style;
		text-transform: $zox_content_font_variant;
	}

	#zox-woo-side-wrap span.zox-widget-side-title,
	span.zox-authors-name a,
	h1.zox-author-top-head {
		font-family: '$zox_content_font', sans-serif;
	}

	p.zox-s-graph,
	.zox-post-body p,
	.zox-post-body blockquote p,
	#woo-content p,
	#zox-404 p,
	.zox-post-body ul li,
	.zox-post-body ol li {
		font-family: '$zox_para_font', sans-serif;
		font-weight: $zox_para_font_style;
		text-transform: $zox_para_font_variant;
	}

	.zox-nav-menu ul li a,
	.zox-top-nav-menu ul li a,
	nav.zox-fly-nav-menu ul li a {
		font-family: '$zox_menu_font', sans-serif;
		font-weight: $zox_menu_font_style;
		text-transform: $zox_menu_font_variant;
	}

	.zox-nav-menu ul li ul.zox-mega-list li a,
	.zox-nav-menu ul li ul.zox-mega-list li a p {
		font-family: '$zox_menu_font', sans-serif;
	}

	h2.zox-s-title1,
	h2.zox-s-title1-feat,
	.woocommerce div.product .product_title,
	.woocommerce .related h2,
	#woo-content .summary p.price,
	.woocommerce div.product .woocommerce-tabs .panel h2,
	#zox-404 h1,
	h1.zox-post-title,
	.zox-widget-side-trend-wrap .zox-art-text:before {
		font-family: '$zox_feat_font', sans-serif;
		font-weight: $zox_feat_font_style;
		text-transform: $zox_feat_font_variant;
	}

	span.zox-widget-main-title {
		font-family: '$zox_headm_font', sans-serif;
		font-weight: $zox_headm_font_style;
		text-transform: $zox_headm_font_variant;
	}

	span.zox-widget-side-title {
		font-family: '$zox_heads_font', sans-serif;
		font-weight: $zox_heads_font_style;
		text-transform: $zox_heads_font_variant;
	}

	span.zox-post-main-title {
		font-family: '$zox_headp_font', sans-serif;
		font-weight: $zox_headp_font_style;
		text-transform: $zox_headp_font_variant;
	}

	h2.zox-s-title2,
	h2.zox-s-title3,
	span.zox-woo-cart-num,
	p.zox-search-p,
	.alp-related-posts .current .post-title,
	.alp-related-posts-wrapper .alp-related-post .post-title,
	.zox-widget-txtw span.zox-widget-main-title {
		font-family: '$zox_headline_font', sans-serif;
		font-weight: $zox_headline_font_style;
		text-transform: $zox_headline_font_variant;
	}

	.zox-post-width {
		margin: 0 auto;
		max-width: calc($zox_postw$zox_px + 60px);
	}


	";
}


	$zox_wall_pages = get_option('zox_wall_pages');
	$zox_wall_ad = get_option('zox_wall_ad');
	if(($zox_wall_pages == "1" && is_front_page()) || ($zox_wall_pages == "2")) {
		if(!empty($zox_wall_ad)) {
			$zox_wall_ad_css = "

			@media screen and (min-width: 1200px) {
				#zox-site-wall {
					float: none;
					margin: 0 auto;
					width: 1200px;
				}
				#zox-wallpaper {
					background: url($zox_wall_ad) no-repeat 50% 0;
				}
				#zox-site-main {
					background: #fff;
				}
				.zox-sport3 #zox-site-main {
					background: #f0f0f0;
				}
				#zox-main-head-wrap,
				#zox-top-head-wrap,
				#zox-bot-head-wrap {
					width: 1200px;
				}

				#zox-bot-head {
					grid-gap: 20px;
				}

				.zox-feat-ent1-cont-wrap {
					grid-template-columns: 240px auto;
				}

				.zox-feat-ent1-left span.zox-widget-side-title {
					font-size: 1.625rem;
				}

				.zox-o3.zox-div1 h2.zox-s-title1-feat,
				.zox-o3.zox-div1t h2.zox-s-title1-feat {
					font-size: 2.75rem;
				}

				#zox-feat-sport2-wrap .zox-body-width {
					margin: -30px 0;
					padding: 0;
					max-width: none;
				}

				#zox-feat-fash2-wrap .zox-body-width {
					padding: 0;
					max-width: none;
				}

				.zox-fash2 .zox-div4 h2.zox-s-title2 {
					font-size: 1.25rem;
				}

				.zox-feat-tech1-main .zox-art-img,
				.zox-feat-tech1-sub .zox-art-img {
					height: 460px;
				}

				.zox-feat-tech1-main .zox-art-img img {
					min-width: 820px;
				}

				.zox-feat-tech1-sub .zox-art-img img {
					min-width: 370px;
				}

				.zox-feat-tech2-main h2.zox-s-title2 {
					font-size: 1.875rem;
				}

				.zox-feat-tech3-main.zox-div2 h2.zox-s-title1-feat {
					font-size: 1.875rem;
				}

				.zox-feat-tech3-sub-wrap .zox-div4 h2.zox-s-title2 {
					font-size: 1rem;
				}
			}
				";
		}
	}

	$zox_skin = get_option('zox_skin');
	if ($zox_skin == "2" || empty($zox_skin) ) {
		$zox_skin_css = "
		body,
		.zox-post-body blockquote p {
			font-family: 'Roboto', sans-serif;
			font-weight: 400;
			text-transform: none;
		}
		body,
		body.custom-background {
			background-color: #f0f0f0 !important;
		}
		.woocommerce-message:before,
		.woocommerce-info:before,
		.woocommerce-message:before,
		.woocommerce .star-rating span:before,
		span.zox-s-cat, h3.zox-post-cat a,
		.zox-s6 span.zox-s-cat,
		.zox-s8 span.zox-s-cat,
		.zox-widget-side-trend-wrap .zox-art-text:before {
			color: #ec2b8c;
		}
		.zox-o6 span.zox-s-cat {
			background: #ec2b8c;
		}
		.zox-fix-up .zox-nav-menu ul li a {
			padding-top: 20px;
			padding-bottom: 20px;
		}
		.zox-nav-menu ul li a {
			color: #000;
			font-family: 'Roboto Condensed', sans-serif;
			font-size: 20px;
			font-weight: 300;
			padding: 30px 10px;
			text-transform: capitalize;
		}
		nav.zox-fly-nav-menu ul li a,
		nav.zox-fly-nav-menu ul li.menu-item-has-children:after,
		span.zox-fly-soc-head,
		ul.zox-fly-soc-list li a {
			color: #000;
		}
		.zox-nav-menu ul li ul.zox-mega-list li a,
		.zox-nav-menu ul li ul.zox-mega-list li a p {
			font-family: 'Roboto Condensed', sans-serif;
			font-weight: 600;
			text-transform: capitalize;
		}
		span.zox-s-cat {
			font-family: 'Roboto', sans-serif;
			font-weight: 700;
			text-transform: uppercase;
		}
		h2.zox-s-title2,
		.zox-widget-side-trend-wrap .zox-art-text:before,
		.alp-related-posts .current .post-title,
		.alp-related-posts-wrapper .alp-related-post .post-title,
		.zox-widget-txtw span.zox-widget-main-title {
			font-family: 'Roboto Condensed', sans-serif;
			font-weight: 700;
			text-transform: capitalize;
		}
		h2.zox-s-title1,
		h2.zox-s-title1-feat,
		h1.zox-post-title {
			font-family: 'Roboto Condensed', sans-serif;
			font-weight: 900;
			text-transform: capitalize;
		}
		.zox-widget-flex1-wrap p.zox-s-graph,
		#zox-main-blog-wrap p.zox-s-graph {
			display: none;
		}
		.zox-feat-ent1-left {
			border-top: 2px solid #ec2b8c;
		}
		.zox-post-width {
			max-width: 1320px;
		}
			";
	} else if ($zox_skin == "3") {
		$zox_skin_css = "
		body,
		body.custom-background {
			background-color: #f0f0f0 !important;
		}
		#zox-bot-head-wrap,
		#zox-fly-wrap {
			background: #000;
		}
		.zox-fly-but-wrap span {
			background: rgba(255,255,255,0.75);
		}
		.zox-nav-menu ul li a,
		span.zox-nav-search-but,
		span.zox-night {
			color: rgba(255,255,255,0.75);
		}
		nav.zox-fly-nav-menu ul li a,
		nav.zox-fly-nav-menu ul li.menu-item-has-children:after,
		span.zox-fly-soc-head,
		ul.zox-fly-soc-list li a {
			color: rgba(255,255,255,0.75);
		}
		.zox-nav-menu ul li:hover a,
		span.zox-nav-search-but:hover,
		span.zox-night:hover {
			color: #fff;
		}
		#zox-foot-wrap {
			background: #000;
		}
		#zox-foot-wrap p {
			color: #777;
		}
		#zox-foot-wrap a {
			color: #777;
		}
		.zox-nav-menu ul li.menu-item-has-children a:after,
		.zox-nav-menu ul li.zox-mega-drop a:after {
			border-right: 2px solid rgba(255,255,255,0.75);
			border-bottom: 2px solid rgba(255,255,255,0.75);
		}
		.zox-nav-menu ul li.menu-item-has-children:hover a:after,
		.zox-nav-menu ul li.zox-mega-drop:hover a:after {
			border-right: 2px solid #fff;
			border-bottom: 2px solid #fff;
		}
		.zox-nav-menu ul li ul.zox-mega-list li a,
		.zox-nav-menu ul li ul.zox-mega-list li a p {
			font-weight: 600;
		}
		h2.zox-s-title1,
		h2.zox-s-title1-feat,
		h2.zox-s-title2,
		h1.zox-post-title,
		.zox-widget-side-trend-wrap .zox-art-text:before,
		.alp-related-posts .current .post-title,
		.alp-related-posts-wrapper .alp-related-post .post-title,
		.zox-widget-txtw span.zox-widget-main-title {
			color: #000;
			font-family: 'Roboto Condensed', sans-serif;
			font-weight: 700;
			text-transform: capitalize;
		}
		.zox-s3 span.zox-s-cat,
		.zox-o1 span.zox-s-cat,
		.zox-s3 .zox-widget-side-trend-wrap .zox-art-text:before,
		#zox-search-form #zox-search-submit {
			background: #111;
		}
		.zox-o3 h3.zox-s-cat {
			background: #ddd;
		}
			";
	} else if ($zox_skin == "4") {
		$zox_skin_css = "
		body {
			font-family: 'Roboto', sans-serif;
		}
		body,
		body.custom-background {
			background-color: #fff !important;
		}
		#zox-bot-head-wrap,
		.zox-bot-head-menu,
		#zox-bot-head,
		#zox-bot-head-left,
		#zox-bot-head-right,
		#zox-bot-head-mid,
		.zox-bot-head-logo,
		.zox-bot-head-logo-main,
		.zox-nav-menu,
		.zox-nav-menu ul {
			height: 76px;
		}
		.zox-nav-menu ul li a {
			color: #000;
			font-family: 'Montserrat', sans-serif;
			font-size: 16px;
			font-weight: 800;
			padding: 30px 10px;
			text-transform: uppercase;
		}
		.zox-nav-menu ul li ul.zox-mega-list li a,
		.zox-nav-menu ul li ul.zox-mega-list li a p {
			font-family: 'Montserrat', sans-serif;
			font-weight: 600;
			text-transform: capitalize;
		}
		nav.zox-fly-nav-menu ul li a,
		nav.zox-fly-nav-menu ul li.menu-item-has-children:after,
		span.zox-fly-soc-head,
		ul.zox-fly-soc-list li a {
			color: #000;
		}
		.zox-fix-up .zox-nav-menu ul li a {
			padding-top: 22px;
			padding-bottom: 22px;
		}
		#zox-foot-wrap {
			background: #fff;
		}
		#zox-foot-wrap p {
			color: #aaa;
		}
		#zox-foot-wrap a {
			color: #aaa;
		}
		.zox-nav-menu ul li ul.sub-menu,
		.zox-nav-menu ul li.menu-item-object-category .zox-mega-dropdown {
			top: 76px;
		}
		h2.zox-s-title1,
		h2.zox-s-title1-feat,
		h2.zox-s-title2,
		h1.zox-post-title,
		.zox-widget-side-trend-wrap .zox-art-text:before,
		.alp-related-posts .current .post-title,
		.alp-related-posts-wrapper .alp-related-post .post-title,
		.zox-widget-txtw span.zox-widget-main-title {
			font-family: 'Montserrat', sans-serif;
			font-weight: 800;
			text-transform: uppercase;
		}
		h2.zox-s-title3 {
			font-family: 'Roboto', sans-serif;
			font-weight: 700;
		}
		.zox-feat-ent3-main-wrap h2.zox-s-title2 {
			background-color: #ec008c;
			box-shadow: 15px 0 0 #ec008c, -10px 0 0 #ec008c;
		}
		#zox-search-form #zox-search-submit {
			background: #ec008c;
		}
		.zox-s8 span.zox-s-cat,
		.zox-s8 .zox-widget-txtw .zox-widget-featl-wrap span.zox-s-cat {
			color: #ec008c;
			font-family: 'Montserrat', sans-serif;
			font-weight: 800;
			letter-spacing: 0;
			text-transform: uppercase;
		}
		.zox-o1 span.zox-s-cat {
			background: #fff;
		}
			";
	} else if ($zox_skin == "5") {
		$zox_skin_css = "
		body,
		body.custom-background {
			background-color: #fff !important;
		}
		#zox-top-head-wrap {
			background: #fff;
		}
		#zox-top-head-wrap,
		#zox-top-head,
		#zox-top-head-left,
		#zox-top-head-mid,
		#zox-top-head-right,
		.zox-top-nav-menu ul {
			height: 40px;
		}
		span.zox-top-soc-but,
		.zox-top-nav-menu ul li a {
			color: #555;
		}
		.zox-nav-menu ul li a,
		span.zox-nav-search-but,
		span.zox-night {
			color: #fff;
		}
		nav.zox-fly-nav-menu ul li a,
		nav.zox-fly-nav-menu ul li.menu-item-has-children:after,
		span.zox-fly-soc-head,
		ul.zox-fly-soc-list li a {
			color: #fff;
		}
		#zox-foot-wrap {
			background: #000;
		}
		#zox-foot-wrap p {
			color: #777;
		}
		#zox-foot-wrap a {
			color: #777;
		}
		.zox-top-nav-menu ul li a,
		.zox-nav-menu ul li a {
			font-family: 'Roboto', sans-serif;
			text-transform: capitalize;
		}
		.zox-nav-menu ul li ul.zox-mega-list li a,
		.zox-nav-menu ul li ul.zox-mega-list li a p {
			font-family: 'Roboto', sans-serif;
			font-weight: 600;
			text-transform: capitalize;
		}
		.zox-top-nav-menu ul li a {
			font-size: 14px;
			font-weight: 400;
			padding: 13px 10px;
		}
		#zox-bot-head-wrap,
		.zox-bot-head-menu,
		#zox-bot-head,
		#zox-bot-head-left,
		#zox-bot-head-right,
		#zox-bot-head-mid,
		.zox-bot-head-logo,
		.zox-bot-head-logo-main,
		.zox-nav-menu,
		.zox-nav-menu ul {
			height: 80px;
		}
		.zox-nav-menu ul li a {
			font-size: 22px;
			font-weight: 400;
			padding: 29px 10px;
		}
		.zox-nav-menu ul li.menu-item-has-children a:after,
		.zox-nav-menu ul li.zox-mega-drop a:after {
			border-right: 2px solid #fff;
			border-bottom: 2px solid #fff;
		}
		.zox-nav-menu ul li ul.sub-menu,
		.zox-nav-menu ul li.menu-item-object-category .zox-mega-dropdown {
			top: 80px;
		}
		.zox-fix-up .zox-nav-menu ul li a {
			padding-top: 19px;
			padding-bottom: 19px;
		}
		.zox-fly-but-wrap span {
			background: #fff;
		}
		.zox-bot-head-logo img {
			position: relative;
				top: 8px;
		}
		@media screen and (max-width: 599px) {
			.zox-bot-head-logo img {
				top: auto;
			}
		}
		.zox-fix-up .zox-bot-head-logo img {
			top: auto;
		}
		#zox-bot-head-wrap,
		#zox-fly-wrap,
		.zox-widget-bgp,
		.zox-widget-bgp.zox-widget-txtw .zox-art-wrap,
		.zox-s4 .zox-widget-bgp span.zox-s-cat,
		.zox-s4 .zox-widget-bgp .zox-art-main span.zox-s-cat,
		#zox-search-form #zox-search-submit {
			background: #23001b;
		}
		#zox-bot-head-mid {
			position: static;
		}
		span.zox-s-cat,
		.zox-byline-wrap span {
			font-family: 'Roboto Condensed', sans-serif;
			font-weight: 400;
		}
		span.zox-s-cat {
			color: #333;
			font-size: 13px;
			letter-spacing: .05em;
			text-transform: uppercase;
		}
		.zox-byline-wrap span,
		span.zox-byline-name a {
			color: #333;
			font-size: .75rem;
			font-weight: 400;
		}
		h2.zox-s-title1,
		h2.zox-s-title1-feat {
			color: #6a0432;
		}
		h2.zox-s-title1,
		h2.zox-s-title1-feat,
		h1.zox-post-title,
		.zox-widget-side-trend-wrap .zox-art-text:before {
			font-family: 'Alegreya', sans-serif;
			font-weight: 900;
			text-transform: capitalize;
		}
		h2.zox-s-title1,
		h2.zox-s-title1-feat {
			letter-spacing: 0;
		}
		h2.zox-s-title2,
		h2.zox-s-title3,
		.alp-related-posts .current .post-title,
		.alp-related-posts-wrapper .alp-related-post .post-title,
		.zox-widget-txtw span.zox-widget-main-title {
			font-family: 'Heebo', sans-serif;
			font-weight: 800;
			text-transform: capitalize;
		}
		.zox-widget-side-trend-wrap .zox-art-text:before {
			color: #bbb;
		}
			";
	} else if ($zox_skin == "6") {
		$zox_skin_css = "
		body,
		body.custom-background {
			background-color: #fff !important;
		}
		#zox-top-head-wrap {
			background: #000;
		}
		#zox-top-head-wrap,
		#zox-top-head,
		#zox-top-head-left,
		#zox-top-head-mid,
		#zox-top-head-right,
		.zox-top-nav-menu ul {
			height: 50px;
		}
		span.zox-top-soc-but,
		.zox-top-nav-menu ul li a {
			color: #888;
		}
		.zox-nav-menu ul li a,
		span.zox-nav-search-but,
		span.zox-night {
			color: #fff;
		}
		nav.zox-fly-nav-menu ul li a,
		nav.zox-fly-nav-menu ul li.menu-item-has-children:after,
		span.zox-fly-soc-head,
		ul.zox-fly-soc-list li a {
			color: #fff;
		}
		.zox-nav-menu ul li.menu-item-has-children a:after,
		.zox-nav-menu ul li.zox-mega-drop a:after {
			border-right: 2px solid #fff;
			border-bottom: 2px solid #fff;
		}
		#zox-foot-wrap {
			background: #000;
		}
		#zox-foot-wrap p {
			color: #777;
		}
		#zox-foot-wrap a {
			color: #777;
		}
		#zox-bot-head-mid {
			border-left: 1px solid rgba(2555,255,255,.2);
		}
		.zox-bot-head-logo {
			margin: 0 0 0 24px;
		}
		@media screen and (max-width: 1023px) {
			#zox-bot-head-mid {
				border-left: 0;
			}
			.zox-bot-head-logo {
				margin: 0;
			}
		}
		.zox-top-nav-menu ul li a,
		.zox-nav-menu ul li a {
			font-family: 'Barlow Semi Condensed', sans-serif;
			text-transform: uppercase;
		}
		.zox-nav-menu ul li ul.zox-mega-list li a,
		.zox-nav-menu ul li ul.zox-mega-list li a p {
			font-family: 'Barlow Semi Condensed', sans-serif;
			font-weight: 600;
			text-transform: capitalize;
		}
		.zox-top-nav-menu ul li a {
			font-size: 16px;
			font-weight: 800;
			padding: 0 10px;
		}
		#zox-bot-head-wrap,
		.zox-bot-head-menu,
		#zox-bot-head,
		#zox-bot-head-left,
		#zox-bot-head-right,
		#zox-bot-head-mid,
		.zox-bot-head-logo,
		.zox-bot-head-logo-main,
		.zox-nav-menu,
		.zox-nav-menu ul {
			height: 80px;
		}
		.zox-nav-menu ul li a {
			font-size: 16px;
			font-weight: 400;
			padding: 32px 15px;
		}
		.zox-nav-menu ul li ul.sub-menu,
		.zox-nav-menu ul li.menu-item-object-category .zox-mega-dropdown {
			top: 80px;
		}
		.zox-fix-up .zox-nav-menu ul li a {
			padding-top: 22px;
			padding-bottom: 22px;
		}
		.zox-fly-but-wrap span {
			background: #fff;
		}
		#zox-bot-head-wrap,
		#zox-fly-wrap,
		#zox-search-form #zox-search-submit {
			background: #102039;
		}
		.zox-s4 span.zox-s-cat {
			color: #3061ff;
			font-family: 'Roboto Mono', sans-serif;
			font-weight: 400;
			text-transform: uppercase;
		}
		h2.zox-s-title1-feat,
		h2.zox-s-title1,
		h2.zox-s-title2,
		h2.zox-s-title3,
		h1.zox-post-title,
		.zox-widget-txtw span.zox-widget-main-title,
		.zox-widget-side-trend-wrap .zox-art-text:before,
		.alp-related-posts .current .post-title,
		.alp-related-posts-wrapper .alp-related-post .post-title,
		.zox-widget-txtw span.zox-widget-main-title {
			font-family: 'Barlow Semi Condensed', sans-serif;
			font-weight: 700;
			text-transform: capitalize;
		}
		.zox-widget-side-trend-wrap .zox-art-text:before {
			color: #bbb;
		}
		.zox-widget-bgp,
		.zox-widget-bgp.zox-widget-txtw .zox-art-wrap,
		.zox-widget-bgp.zox-widget-txtw .zox-widget-featl-sub .zox-art-wrap,
		.zox-s4 .zox-widget-bgp span.zox-s-cat {
			background: #102039;
		}
		.zox-post-type {
			border: 3px solid #3061ff;
		}
		.zox-widget-featl-sub .zox-post-type {
			border: 2px solid #3061ff;
		}
			";
	} else if ($zox_skin == "7") {
		$zox_skin_css = "
		body,
		.zox-widget-side-trend-wrap .zox-art-text:before {
			background: #fff;
			font-family: 'Oswald', sans-serif;
		}
		body,
		body.custom-background {
			background-color: #fff !important;
		}
		#zox-top-head-wrap {
			background: #f0f0f0;
		}
		#zox-top-head-wrap,
		#zox-top-head,
		#zox-top-head-left,
		#zox-top-head-mid,
		#zox-top-head-right,
		.zox-top-nav-menu ul {
			height: 40px;
		}
		span.zox-top-soc-but,
		.zox-top-nav-menu ul li a {
			color: #9f9f9f;
		}
		.zox-top-nav-menu ul li a {
			font-family: 'Oswald', sans-serif;
			font-size: 12px;
			font-weight: 500;
			padding: 0 15px;
			text-transform: uppercase;
		}
		#zox-bot-head-wrap,
		#zox-fly-wrap {
			background: #fff;
		}
		#zox-bot-head-wrap,
		.zox-bot-head-menu,
		#zox-bot-head,
		#zox-bot-head-left,
		#zox-bot-head-right,
		#zox-bot-head-mid,
		.zox-bot-head-logo,
		.zox-bot-head-logo-main,
		.zox-nav-menu,
		.zox-nav-menu ul {
			height: 90px;
		}
		.zox-nav-menu ul li ul.sub-menu,
		.zox-nav-menu ul li.menu-item-object-category .zox-mega-dropdown {
			top: 90px;
		}
		.zox-nav-menu ul {
			height: auto;
		}
		.zox-nav-menu ul li a,
		span.zox-nav-search-but,
		span.zox-night {
			color: #000;
		}
		#zox-foot-wrap {
			background: #fff;
		}
		#zox-foot-wrap p {
			color: #aaa;
		}
		#zox-foot-wrap a {
			color: #aaa;
		}
		nav.zox-fly-nav-menu ul li a,
		nav.zox-fly-nav-menu ul li.menu-item-has-children:after,
		span.zox-fly-soc-head,
		ul.zox-fly-soc-list li a {
			color: #000;
		}
		.zox-fly-but-wrap span {
			background: #000;
		}
		.zox-nav-menu ul {
			float: left;
		}
		.zox-fix-up .zox-nav-menu ul,
		.zox-fix-up span.zox-nav-search-but {
			margin: 0;
		}
		.zox-nav-menu ul li a {
			font-family: 'Amiri', serif;
			font-size: 20px;
			font-weight: 700;
			padding: 35px 10px;
			text-transform: capitalize;
		}
		.zox-nav-menu ul li ul.zox-mega-list li a,
		.zox-nav-menu ul li ul.zox-mega-list li a p {
			font-family: 'Amiri', sans-serif;
			font-weight: 600;
			text-transform: capitalize;
		}
		.zox-fix-up .zox-nav-menu ul li a {
			padding-top: 20px;
			padding-bottom: 20px;
		}
		.zox-fix-up #zox-bot-head-right,
		.zox-fix-up span.zox-nav-search-but {
			align-content: center;
		}
		span.zox-s-cat {
			font-family: 'Oswald', sans-serif;
			font-weight: 700;
			text-transform: uppercase;
		}
		h2.zox-s-title1,
		h2.zox-s-title1-feat,
		h2.zox-s-title2,
		h1.zox-post-title,
		.zox-widget-side-trend-wrap .zox-art-text:before,
		.alp-related-posts .current .post-title,
		.alp-related-posts-wrapper .alp-related-post .post-title,
		.zox-widget-txtw span.zox-widget-main-title {
			font-family: 'Amiri', serif;
			font-weight: 700;
		}
		h2.zox-s-title3 {
			font-family: 'Oswald', sans-serif;
			font-weight: 700;
		}
		.zox-nav-menu ul li ul.zox-mega-list li a,
		.zox-nav-menu ul li ul.zox-mega-list li a p {
			font-size: 1rem;
		}
		p.zox-s-graph {
			font-family: 'PT Serif', serif;
			font-style: italic;
			font-weight: 400;
		}
		.zox-byline-wrap span,
		span.zox-widget-home-title {
			font-family: 'Oswald', sans-serif;
			text-transform: uppercase;
		}
		.zox-net3 span.zox-widget-home-title {
			color: #ec2b8c;
		}
		#zox-search-form #zox-search-submit {
			background: #cc0e0e;
		}
		.zox-widget-side-trend-wrap .zox-art-text:before {
			color: #ddd;
		}
			";
	} else if ($zox_skin == "8") {
		$zox_skin_css = "
		body,
		body.custom-background {
			background-color: #f0f0f0 !important;
		}
		#zox-bot-head-wrap,
		#zox-fly-wrap {
			background: #013369;
		}
		#zox-bot-head-wrap,
		.zox-bot-head-menu,
		#zox-bot-head,
		#zox-bot-head-left,
		#zox-bot-head-right,
		#zox-bot-head-mid,
		.zox-bot-head-logo,
		.zox-bot-head-logo-main,
		.zox-nav-menu,
		.zox-nav-menu ul {
			height: 64px;
		}
		.zox-nav-menu ul li.menu-item-has-children a:after,
		.zox-nav-menu ul li.zox-mega-drop a:after {
			border-right: 2px solid #fff;
			border-bottom: 2px solid #fff;
		}
		.zox-nav-menu ul li ul.sub-menu,
		.zox-nav-menu ul li.menu-item-object-category .zox-mega-dropdown {
			top: 64px;
		}
		.zox-nav-menu ul li a,
		span.zox-nav-search-but,
		span.zox-night {
			color: #eee;
		}
		nav.zox-fly-nav-menu ul li a,
		nav.zox-fly-nav-menu ul li.menu-item-has-children:after,
		span.zox-fly-soc-head,
		ul.zox-fly-soc-list li a {
			color: #eee;
		}
		#zox-foot-wrap {
			background: #000;
		}
		#zox-foot-wrap p {
			color: #777;
		}
		#zox-foot-wrap a {
			color: #777;
		}
		.zox-fly-but-wrap span {
			background: #eee;
		}
		.zox-nav-menu ul li a {
			font-family: 'Rajdhani', sans-serif;
			font-size: 16px;
			font-weight: 600;
			padding: 24px 10px;
			text-transform: uppercase;
		}
		.zox-nav-menu ul li ul.zox-mega-list li a,
		.zox-nav-menu ul li ul.zox-mega-list li a p {
			font-family: 'Rajdhani', sans-serif;
			font-weight: 600;
			text-transform: capitalize;
		}
		.zox-fix-up .zox-nav-menu ul li a {
			padding-top: 22px;
			padding-bottom: 22px;
		}
		.zox-nav-menu ul:hover li a {
			opacity: .7;
		}
		.zox-nav-menu ul li:hover a {
			color: #fff;
			opacity: 1;
		}
		span.zox-s-cat,
		.zox-sport1 span.zox-s-cat {
			color: #fe4020;
			font-family: 'Nunito', sans-serif;
			font-size: .875rem;
			text-transform: uppercase;
		}
		h2.zox-s-title1,
		h2.zox-s-title1-feat,
		h2.zox-s-title2,
		h2.zox-s-title3,
		h1.zox-post-title,
		.zox-widget-side-trend-wrap .zox-art-text:before,
		.alp-related-posts .current .post-title,
		.alp-related-posts-wrapper .alp-related-post .post-title,
		.zox-widget-txtw span.zox-widget-main-title {
			color: #000;
			font-family: 'Rajdhani', sans-serif;
			font-weight: 700;
			text-transform: capitalize;
		}
		.zox-feat-sport1-main-wrap h2.zox-s-title1 {
			font-size: 2.25rem;
			line-height: 1.15;
		}
		.zox-feat-sport1-sub-wrap h2.zox-s-title2 {
			font-size: 1.375rem;
			line-height: 1.15;
		}
		.zox-feat-sport1-sub-wrap p.zox-s-graph {
			display: none;
		}
		p.zox-s-graph {
			color: #888;
			font-family: 'PT Serif', serif;
			font-size: 1.125rem;
			line-height: 1.45;
		}
		.zox-byline-wrap {
			margin: 12px 0 0;
		}
		.zox-byline-wrap span,
		.zox-byline-wrap span a {
			color: #222;
			font-family: 'Nunito', sans-serif;
			font-size: 11px;
		}
		ul.zox-widget-tab-head li a {
			color: #000;
			font-family: 'Rajdhani', sans-serif;
			font-size: 18px;
			font-weight: 700;
			text-transform: capitalize;
		}
		.zox-feat-sport1-side-wrap .zox-widget-tab-wrap h2.zox-s-title3 {
			font-family: 'Rajdhani', sans-serif;
			font-weight: 600;
			text-transform: capitalize;
		}
		.zox-sport1 span.zox-widget-home-title {
			font-family: 'Rajdhani', sans-serif;
			font-weight: 700;
			text-transform: uppercase;
		}
		.zox-s6 .zox-widget-side-trend-wrap .zox-art-text:before {
			color: #bbb;
		}
		#zox-search-form #zox-search-submit {
			background: #000;
		}
			";
	} else if ($zox_skin == "9") {
		$zox_skin_css = "
		body {
			font-family: 'Nunito Sans', sans-serif;
		}
		body,
		body.custom-background {
			background-color: #fff !important;
		}
		#zox-bot-head-wrap,
		#zox-fly-wrap {
			background: #000;
		}
		#zox-bot-head-wrap,
		.zox-bot-head-menu,
		#zox-bot-head,
		#zox-bot-head-left,
		#zox-bot-head-right,
		#zox-bot-head-mid,
		.zox-bot-head-logo,
		.zox-bot-head-logo-main,
		.zox-nav-menu,
		.zox-nav-menu ul {
			height: 60px;
		}
		.zox-nav-menu ul li.menu-item-has-children a:after,
		.zox-nav-menu ul li.zox-mega-drop a:after {
			border-right: 2px solid #fff;
			border-bottom: 2px solid #fff;
		}
		.zox-nav-menu ul li ul.sub-menu,
		.zox-nav-menu ul li.menu-item-object-category .zox-mega-dropdown {
			top: 60px;
		}
		.zox-nav-menu ul li a,
		span.zox-nav-search-but,
		span.zox-night {
			color: #fff;
		}
		nav.zox-fly-nav-menu ul li a,
		nav.zox-fly-nav-menu ul li.menu-item-has-children:after,
		span.zox-fly-soc-head,
		ul.zox-fly-soc-list li a {
			color: #fff;
		}
		.zox-fly-but-wrap span {
			background: #fff;
		}
		.zox-nav-menu ul li a {
			font-family: 'Nunito Sans', sans-serif;
			font-size: 16px;
			font-weight: 700;
			padding: 22px 13px;
			text-transform: capitalize;
		}
		.zox-nav-menu ul li ul.zox-mega-list li a,
		.zox-nav-menu ul li ul.zox-mega-list li a p {
			font-family: 'Nunito Sans', sans-serif;
			font-weight: 600;
			text-transform: capitalize;
		}
		.zox-nav-menu ul:hover li a {
			opacity: .7;
		}
		.zox-nav-menu ul li:hover a {
			color: #fff;
			opacity: 1;
		}
		.zox-fix-up .zox-nav-menu ul li a {
			padding-top: 22px;
			padding-bottom: 22px;
		}
		#zox-foot-wrap,
		#zox-search-form #zox-search-submit {
			background: #000;
		}
		#zox-foot-wrap p {
			color: #777;
		}
		#zox-foot-wrap a {
			color: #777;
		}
		.zox-o3 h3.zox-s-cat {
			background: #03fc96;
		}
		.zox-s6 span.zox-s-cat {
			color: #000;
		}
		span.zox-s-cat,
		.zox-widget-txtw span.zox-widget-main-title {
			font-family: 'Nunito Sans', sans-serif;
			font-weight: 800;
			letter-spacing: .2em;
			text-transform: uppercase;
		}
		.zox-widget-txtw span.zox-widget-main-title {
			font-size: 1.25rem;
		}
		h2.zox-s-title1,
		h2.zox-s-title1-feat,
		h2.zox-s-title2,
		h1.zox-post-title,
		.zox-widget-side-trend-wrap .zox-art-text:before,
		.alp-related-posts .current .post-title,
		.alp-related-posts-wrapper .alp-related-post .post-title {
			color: #000;
			font-family: 'Anton', sans-serif;
			font-weight: 400;
			text-transform: uppercase;
		}
		p.zox-s-graph,
		h2.zox-s-title3 {
			font-family: 'Nunito Sans', sans-serif;
		}
		span.zox-widget-home-title {
			color: #111;
			font-family: 'Nunito Sans', sans-serif;
			font-weight: 700;
			text-transform: uppercase;
		}
		.zox-widget-txtw .zox-widget-main-head {
			margin: 30px 0 20px;
		}
		.zox-s6 .zox-widget-side-trend-wrap .zox-art-text:before {
			color: #bbb;
		}
		.zox_alt_img_widget {
			float: none;
			margin: 0 auto;
			max-width: 1200px;
		}
			";
	} else if ($zox_skin == "10") {
		$zox_skin_css = "
		body {
			font-family: 'Roboto', sans-serif;
		}
		body,
		body.custom-background {
			background-color: #f0f0f0 !important;
		}
		#zox-bot-head-wrap,
		#zox-fly-wrap {
			background: #000;
		}
		#zox-bot-head-wrap,
		.zox-bot-head-menu,
		#zox-bot-head,
		#zox-bot-head-left,
		#zox-bot-head-right,
		#zox-bot-head-mid,
		.zox-bot-head-logo,
		.zox-bot-head-logo-main,
		.zox-nav-menu,
		.zox-nav-menu ul {
			height: 56px;
		}
		.zox-nav-menu ul li.menu-item-has-children a:after,
		.zox-nav-menu ul li.zox-mega-drop a:after {
			border-right: 2px solid #fff;
			border-bottom: 2px solid #fff;
		}
		.zox-nav-menu ul li ul.sub-menu,
		.zox-nav-menu ul li.menu-item-object-category .zox-mega-dropdown {
			top: 56px;
		}
		.zox-nav-menu ul li a,
		span.zox-nav-search-but,
		span.zox-night {
			color: #fff;
		}
		nav.zox-fly-nav-menu ul li a,
		nav.zox-fly-nav-menu ul li.menu-item-has-children:after,
		span.zox-fly-soc-head,
		ul.zox-fly-soc-list li a {
			color: #fff;
		}
		.zox-fly-but-wrap span {
			background: #fff;
		}
		.zox-nav-menu ul li a {
			font-family: 'Roboto', sans-serif;
			font-size: 14px;
			font-weight: 700;
			padding: 21px 10px;
			text-transform: uppercase;
		}
		.zox-nav-menu ul li ul.zox-mega-list li a,
		.zox-nav-menu ul li ul.zox-mega-list li a p {
			font-family: 'Roboto', sans-serif;
			font-weight: 600;
			text-transform: capitalize;
		}
		.zox-nav-menu ul:hover li a {
			opacity: .7;
		}
		.zox-nav-menu ul li:hover a {
			color: #fff;
			opacity: 1;
		}
		.zox-fix-up .zox-nav-menu ul li a {
			padding-top: 23px;
			padding-bottom: 23px;
		}
		#zox-foot-wrap {
			background: #000;
		}
		#zox-foot-wrap p {
			color: #777;
		}
		#zox-foot-wrap a {
			color: #777;
		}
		.zox-sport3 span.zox-s-cat {
			color: #fe4020;
			font-weight: 400;
		}
		h2.zox-s-title1,
		h2.zox-s-title1-feat,
		h1.zox-post-title,
		.zox-widget-side-trend-wrap .zox-art-text:before {
			font-family: 'Poppins', sans-serif;
			font-weight: 800;
		}
		h2.zox-s-title3 {
			font-family: 'Poppins', sans-serif;
		}
		ul.zox-widget-tab-head li a,
		h2.zox-s-title2,
		h2.zox-s-title3,
		p.zox-s-graph,
		.alp-related-posts .current .post-title,
		.alp-related-posts-wrapper .alp-related-post .post-title {
			font-family: 'Roboto', sans-serif;
		}
		span.zox-widget-home-title {
			color: #000;
			font-family: 'Poppins', sans-serif;
			font-weight: 800;
			text-transform: uppercase;
		}
		.zox-widget-side-trend-wrap .zox-art-text:before {
			color: #000;
		}
		#zox-search-form #zox-search-submit {
			background: #000;
		}
			";
	} else if ($zox_skin == "11") {
		$zox_skin_css = "
		body {
			font-family: 'Libre Franklin', sans-serif;
		}
		body,
		body.custom-background {
			background-color: #fff !important;
		}
		#zox-top-head-wrap {
			background: #fff;
		}
		#zox-top-head-wrap,
		#zox-top-head,
		#zox-top-head-left,
		#zox-top-head-mid,
		#zox-top-head-right {
			height: 190px;
		}
		#zox-top-head-mid img {
			position: relative;
				top: 25px;
			max-height: none;
		}
		span.zox-top-soc-but,
		.zox-top-nav-menu ul li a {
			color: #212121;
		}
		.zox-fix-up .zox-nav-menu ul li a {
			padding-top: 24px;
			padding-bottom: 24px;
		}
		#zox-bot-head-wrap,
		#zox-fly-wrap {
			background: #fff;
		}
		#zox-bot-head-wrap,
		.zox-bot-head-menu,
		#zox-bot-head,
		#zox-bot-head-left,
		#zox-bot-head-right,
		#zox-bot-head-mid,
		.zox-bot-head-logo,
		.zox-bot-head-logo-main,
		.zox-nav-menu,
		.zox-nav-menu ul {
			height: 60px;
		}
		.zox-nav-menu ul li a,
		span.zox-nav-search-but,
		span.zox-night {
			color: #000;
		}
		nav.zox-fly-nav-menu ul li a,
		nav.zox-fly-nav-menu ul li.menu-item-has-children:after,
		span.zox-fly-soc-head,
		ul.zox-fly-soc-list li a {
			color: #000;
		}
		.zox-nav-menu ul li ul.sub-menu,
		.zox-nav-menu ul li.menu-item-object-category .zox-mega-dropdown {
			top: 60px;
		}
		.zox-fly-but-wrap span {
			background: #000;
		}
		.zox-nav-menu ul li a {
			font-family: 'Libre Franklin', sans-serif;
			font-size: 12px;
			font-weight: 600;
			letter-spacing: .15em;
			padding: 24px 10px;
			text-transform: uppercase;
		}
		.zox-nav-menu ul li ul.zox-mega-list li a,
		.zox-nav-menu ul li ul.zox-mega-list li a p {
			font-family: 'Libre Franklin', sans-serif;
			font-weight: 600;
			text-transform: capitalize;
		}
		#zox-foot-wrap {
			background: #fff;
		}
		#zox-foot-wrap p {
			color: #aaa;
		}
		#zox-foot-wrap a {
			color: #aaa;
		}
		span.zox-s-cat {
			font-family: 'Libre Franklin', sans-serif;
			text-transform: uppercase;
		}
		.zox-s7 .zox-byline-wrap:before {
			background: rgb(184, 154, 106);
		}
		.zox-o5 .zox-byline-wrap:before {
			background: #fff;
		}
		h2.zox-s-title1,
		h2.zox-s-title1-feat,
		h1.zox-post-title,
		.zox-widget-side-trend-wrap .zox-art-text:before {
			font-family: 'Frank Ruhl Libre', sans-serif;
			font-weight: 400;
		}
		h2.zox-s-title2,
		.alp-related-posts .current .post-title,
		.alp-related-posts-wrapper .alp-related-post .post-title {
			font-family: 'Frank Ruhl Libre', sans-serif;
			font-weight: 500;
		}
		#zox-feat-fash1-wrap p.zox-s-graph,
		span.zox-byline-date {
			display: none;
			}
		.zox-widget-side-trend-wrap .zox-art-text:before {
			border: 1px solid #000;
			color: #000;
		}
		#zox-search-form #zox-search-submit {
			background: #000;
		}
			";
	} else if ($zox_skin == "12") {
		$zox_skin_css = "
		body {
			font-family: 'Libre Franklin', sans-serif;
		}
		body,
		body.custom-background {
			background-color: #fff !important;
		}
		#zox-top-head-wrap {
			background: #fff;
		}
		#zox-top-head-wrap,
		#zox-top-head,
		#zox-top-head-left,
		#zox-top-head-mid,
		#zox-top-head-right {
			height: 100px;
		}
		#zox-top-head-mid img {
			max-height: none;
		}
		span.zox-top-soc-but {
			color: #2f3846;
		}
		#zox-bot-head-wrap,
		#zox-fly-wrap {
			background: #fff;
		}
		#zox-bot-head-wrap,
		.zox-bot-head-menu,
		#zox-bot-head,
		#zox-bot-head-left,
		#zox-bot-head-right,
		#zox-bot-head-mid,
		.zox-bot-head-logo,
		.zox-bot-head-logo-main,
		.zox-nav-menu,
		.zox-nav-menu ul {
			height: 50px;
		}
		.zox-nav-menu ul li ul.sub-menu,
		.zox-nav-menu ul li.menu-item-object-category .zox-mega-dropdown {
			top: 50px;
		}
		.zox-fix-up .zox-nav-menu ul li a {
			padding-top: 24px;
			padding-bottom: 24px;
		}
		.zox-nav-menu ul li a,
		span.zox-nav-search-but,
		span.zox-night {
			color: #2f3846;
		}
		nav.zox-fly-nav-menu ul li a,
		nav.zox-fly-nav-menu ul li.menu-item-has-children:after,
		span.zox-fly-soc-head,
		ul.zox-fly-soc-list li a {
			color: #2f3846;
		}
		.zox-post-type {
			border: 3px solid #5188d9;
		}
		.zox-widget-featl-sub .zox-post-type {
			border: 2px solid #5188d9;
		}
		.zox-fly-but-wrap span {
			background: #000;
		}
		.zox-nav-menu ul li a {
			font-family: 'Roboto', sans-serif;
			font-size: 12px;
			font-weight: 500;
			letter-spacing: .1em;
			padding: 19px 15px;
			text-transform: uppercase;
		}
		.zox-nav-menu ul li ul.zox-mega-list li a,
		.zox-nav-menu ul li ul.zox-mega-list li a p {
			font-family: 'Roboto', sans-serif;
			font-weight: 600;
			text-transform: capitalize;
		}
		#zox-foot-wrap {
			background: #fff;
		}
		#zox-foot-wrap p {
			color: #aaa;
		}
		#zox-foot-wrap a {
			color: #aaa;
		}
		span.zox-s-cat,
		.zox-fash2 span.zox-s-cat {
			color: #002fa7;
			font-family: 'Libre Franklin', sans-serif;
			font-weight: 700;
			text-transform: uppercase;
		}
		.zox-widget-txtw span.zox-widget-main-title {
			font-family: 'Libre Franklin', sans-serif;
			font-weight: 700;
		}
		h2.zox-s-title2,
		h1.zox-post-title,
		.zox-widget-side-trend-wrap .zox-art-text:before,
		.alp-related-posts .current .post-title,
		.alp-related-posts-wrapper .alp-related-post .post-title {
			color: #2f3846;
			font-family: 'Frank Ruhl Libre', sans-serif;
			font-weight: 400;
		}
		span.zox-widget-home-title {
			font-family: 'Frank Ruhl Libre', sans-serif;
			font-weight: 700;
		}
		#zox-feat-fash2-wrap .zox-s-graph {
			display: none;
		}
		.zox-widget-side-trend-wrap .zox-art-text:before {
			border: 1px solid #002fa7;
			color: #002fa7;
		}
		#zox-search-form #zox-search-submit {
			background: #000;
		}
			";
	} else if ($zox_skin == "13") {
		$zox_skin_css = "
		body {
			font-family: 'Libre Franklin', sans-serif;
		}
		body,
		body.custom-background {
			background-color: #f0f0f0 !important;
		}
		#zox-bot-head-wrap,
		.zox-bot-head-menu,
		#zox-bot-head,
		#zox-bot-head-left,
		#zox-bot-head-right,
		#zox-bot-head-mid,
		.zox-bot-head-logo,
		.zox-bot-head-logo-main,
		.zox-nav-menu,
		.zox-nav-menu ul {
			height: 54px;
		}
		.zox-nav-menu ul li ul.sub-menu,
		.zox-nav-menu ul li.menu-item-object-category .zox-mega-dropdown {
			top: 54px;
		}
		.zox-fix-up .zox-nav-menu ul li a {
			padding-top: 24px;
			padding-bottom: 24px;
		}
		.zox-nav-menu ul li a,
		span.zox-nav-search-but,
		span.zox-night {
			color: #000;
		}
		nav.zox-fly-nav-menu ul li a,
		nav.zox-fly-nav-menu ul li.menu-item-has-children:after,
		span.zox-fly-soc-head,
		ul.zox-fly-soc-list li a {
			color: #000;
		}
		#zox-foot-wrap {
			background: #fff;
		}
		#zox-foot-wrap p {
			color: #aaa;
		}
		#zox-foot-wrap a {
			color: #aaa;
		}
		.zox-fly-but-wrap span {
			background: #000;
		}
		.zox-nav-menu ul li a {
			font-family: 'Roboto', sans-serif;
			font-size: 12px;
			font-weight: 500;
			padding: 21px 15px;
			text-transform: uppercase;
		}
		.zox-nav-menu ul li ul.zox-mega-list li a,
		.zox-nav-menu ul li ul.zox-mega-list li a p {
			font-family: 'Roboto', sans-serif;
			font-weight: 600;
			text-transform: capitalize;
		}
		span.zox-s-cat {
			font-family: 'Frank Ruhl Libre', sans-serif;
		}
		.zox-s7 .zox-byline-wrap:before {
			background: rgb(184, 154, 106);
		}
		h2.zox-s-title1,
		h2.zox-s-title1-feat,
		h1.zox-post-title,
		.zox-widget-side-trend-wrap .zox-art-text:before {
			font-family: 'Josefin Sans', sans-serif;
			font-weight: 400;
			text-transform: uppercase;
		}
		h2.zox-s-title2,
		.zox-fash3 .zox-widget-featl-sub h2.zox-s-title3,
		.alp-related-posts .current .post-title,
		.alp-related-posts-wrapper .alp-related-post .post-title {
			font-family: 'Frank Ruhl Libre', sans-serif;
			font-weight: 400;
			text-transform: capitalize;
		}
		#zox-feat-fash3-wrap .zox-s-graph,
		#zox-feat-fash3-wrap .zox-byline-wrap {
			display: none;
		}
		.zox-widget-side-trend-wrap .zox-art-text:before {
			border: 1px solid rgb(184, 154, 106);
			color: rgb(184, 154, 106);
		}
		#zox-search-form #zox-search-submit {
			background: #000;
		}
			";
	} else if ($zox_skin == "14") {
		$zox_skin_css = "
		body {
			font-family: 'Roboto', sans-serif;
		}
		body,
		body.custom-background {
			background-color: #fff !important;
		}
		#zox-bot-head-wrap,
		.zox-bot-head-menu,
		#zox-bot-head,
		#zox-bot-head-left,
		#zox-bot-head-right,
		#zox-bot-head-mid,
		.zox-bot-head-logo,
		.zox-bot-head-logo-main,
		.zox-nav-menu,
		.zox-nav-menu ul {
			height: 70px;
		}
		.zox-nav-menu ul li ul.sub-menu,
		.zox-nav-menu ul li.menu-item-object-category .zox-mega-dropdown {
			top: 70px;
		}
		.zox-nav-menu ul li.menu-item-has-children a:after,
		.zox-nav-menu ul li.zox-mega-drop a:after {
			border-right: 2px solid #fff;
			border-bottom: 2px solid #fff;
		}
		#zox-bot-head-wrap,
		#zox-bot-head-wrap.zox-trans-bot.zox-fix-up,
		#zox-bot-head-wrap.zox-trans-bot:hover,
		#zox-fly-wrap {
			background-color: #000;
		}
		.zox-nav-menu ul li a,
		span.zox-nav-search-but,
		span.zox-night {
			color: #fff;
		}
		nav.zox-fly-nav-menu ul li a,
		nav.zox-fly-nav-menu ul li.menu-item-has-children:after,
		span.zox-fly-soc-head,
		ul.zox-fly-soc-list li a {
			color: #fff;
		}
		.zox-fix-up .zox-nav-menu ul li a {
			padding-top: 24px;
			padding-bottom: 24px;
		}
		.zox-trans-bot.zox-fix-up .zox-nav-menu ul li a,
		.zox-trans-bot.zox-fix-up span.zox-nav-search-but {
			color: #fff;
		}
		.zox-fly-but-wrap span {
			background: #fff;
		}
		.zox-trans-bot.zox-fix-up  .zox-fly-but-wrap span {
			background: #fff;
		}
		#zox-foot-wrap {
			background: #000;
		}
		#zox-foot-wrap p {
			color: #777;
		}
		#zox-foot-wrap a {
			color: #777;
		}
		.zox-nav-menu ul li a {
			font-family: 'Roboto', sans-serif;
			font-size: 12px;
			font-weight: 900;
			padding: 29px 15px;
			text-transform: uppercase;
		}
		.zox-nav-menu ul li ul.zox-mega-list li a,
		.zox-nav-menu ul li ul.zox-mega-list li a p {
			font-family: 'Roboto', sans-serif;
			font-weight: 600;
			text-transform: capitalize;
		}
		.zox-s6 span.zox-s-cat {
			color: #000;
			letter-spacing: .2em;
			text-transform: uppercase;
		}
		h2.zox-s-title1,
		h2.zox-s-title1-feat,
		h2.zox-s-title2,
		h1.zox-post-title,
		.zox-widget-side-trend-wrap .zox-art-text:before,
		.alp-related-posts .current .post-title,
		.alp-related-posts-wrapper .alp-related-post .post-title {
			font-family: 'Poppins', sans-serif;
			font-weight: 700;
			text-transform: capitalize;
		}
		span.zox-widget-home-title {
			font-family: 'Poppins', sans-serif;
			font-weight: 600;
			text-transform: uppercase;
		}
		.zox-widget-side-trend-wrap .zox-art-text:before {
			color: #bbb;
		}
		.zox-post-type {
			border: 3px solid #b80000;
		}
		.zox-widget-featl-sub .zox-post-type {
			border: 2px solid #b80000;
		}
		#zox-search-form #zox-search-submit {
			background: #b80000;
		}
			";
	} else if ($zox_skin == "15") {
		$zox_skin_css = "
		body {
			font-family: 'Roboto', sans-serif;
		}
		body,
		body.custom-background {
			background-color: #f0f0f0 !important;
		}
		#zox-bot-head-wrap,
		#zox-fly-wrap {
			background: #fff;
		}
		#zox-bot-head-wrap,
		.zox-bot-head-menu,
		#zox-bot-head,
		#zox-bot-head-left,
		#zox-bot-head-right,
		#zox-bot-head-mid,
		.zox-bot-head-logo,
		.zox-bot-head-logo-main,
		.zox-nav-menu,
		.zox-nav-menu ul {
			height: 50px;
		}
		.zox-nav-menu ul li ul.sub-menu,
		.zox-nav-menu ul li.menu-item-object-category .zox-mega-dropdown {
			top: 50px;
		}
		.zox-fix-up .zox-nav-menu ul li a {
			padding-top: 23px;
			padding-bottom: 23px;
		}
		.zox-nav-menu ul li a,
		span.zox-nav-search-but,
		span.zox-night {
			color: #000;
		}
		nav.zox-fly-nav-menu ul li a,
		nav.zox-fly-nav-menu ul li.menu-item-has-children:after,
		span.zox-fly-soc-head,
		ul.zox-fly-soc-list li a {
			color: #000;
		}
		.zox-fly-but-wrap span {
			background: #000;
		}
		#zox-foot-wrap {
			background: #fff;
		}
		#zox-foot-wrap p {
			color: #aaa;
		}
		#zox-foot-wrap a {
			color: #aaa;
		}
		.zox-nav-menu ul li a {
			font-family: 'Roboto', sans-serif;
			font-size: 14px;
			font-weight: 400;
			padding: 18px 15px;
			text-transform: capitalize;
		}
		.zox-nav-menu ul li ul.zox-mega-list li a,
		.zox-nav-menu ul li ul.zox-mega-list li a p {
			font-family: 'Roboto', sans-serif;
			font-weight: 600;
			text-transform: capitalize;
		}
		.zox-s6 .zox-art-wrap {
			background: none;
		}
		.zox-feat-tech2-sub .zox-art-text {
			padding: 13px 0 0;
		}
		.zox-s6 span.zox-s-cat {
			color: #000;
			text-transform: uppercase;
		}
		h2.zox-s-title2,
		h1.zox-post-title,
		.zox-widget-side-trend-wrap .zox-art-text:before,
		.alp-related-posts .current .post-title,
		.alp-related-posts-wrapper .alp-related-post .post-title {
			font-family: 'Poppins', sans-serif;
			font-weight: 700;
			text-transform: capitalize;
		}
		span.zox-widget-home-title {
			font-family: 'Poppins', sans-serif;
			font-weight: 700;
			text-transform: uppercase;
		}
		.zox-widget-side-trend-wrap .zox-art-text:before {
			color: #bbb;
		}
		.zox-post-type {
			border: 3px solid #e03800;
		}
		.zox-widget-featl-sub .zox-post-type {
			border: 2px solid #e03800;
		}
		#zox-search-form #zox-search-submit {
			background: #e03800;
		}
			";
	} else if ($zox_skin == "16") {
		$zox_skin_css = "
		body {
			font-family: 'Titillium Web', sans-serif;
		}
		body,
		body.custom-background {
			background-color: #fff !important;
		}
		#zox-top-head-wrap {
			background: #000;
		}
		#zox-top-head-wrap,
		#zox-top-head,
		#zox-top-head-left,
		#zox-top-head-mid,
		#zox-top-head-right,
		.zox-top-nav-menu ul {
			height: 32px;
		}
		span.zox-top-soc-but,
		.zox-top-nav-menu ul li a {
			color: #aaa;
		}
		.zox-top-nav-menu ul li a {
			font-family: 'Titillium Web', sans-serif;
			font-size: 14px;
			font-weight: 600;
			padding: 9px 10px;
			text-transform: capitalize;
		}
		#zox-bot-head-wrap,
		.zox-bot-head-menu,
		#zox-bot-head,
		#zox-bot-head-left,
		#zox-bot-head-right,
		#zox-bot-head-mid,
		.zox-bot-head-logo,
		.zox-bot-head-logo-main,
		.zox-nav-menu,
		.zox-nav-menu ul {
			height: 50px;
		}
		.zox-nav-menu ul li ul.sub-menu,
		.zox-nav-menu ul li.menu-item-object-category .zox-mega-dropdown {
			top: 50px;
		}
		.zox-fix-up .zox-nav-menu ul li a {
			padding-top: 23px;
			padding-bottom: 23px;
		}
		.zox-nav-menu ul li a,
		span.zox-nav-search-but,
		span.zox-night {
			color: #000;
		}
		nav.zox-fly-nav-menu ul li a,
		nav.zox-fly-nav-menu ul li.menu-item-has-children:after,
		span.zox-fly-soc-head,
		ul.zox-fly-soc-list li a {
			color: #000;
		}
		.zox-fly-but-wrap span {
			background: #000;
		}
		.zox-nav-menu ul li a {
			font-family: 'Titillium Web', sans-serif;
			font-size: 14px;
			font-weight: 600;
			padding: 18px 10px;
			text-transform: uppercase;
		}
		.zox-nav-menu ul li ul.zox-mega-list li a,
		.zox-nav-menu ul li ul.zox-mega-list li a p {
			font-family: 'Titillium Web', sans-serif;
			font-weight: 600;
			text-transform: capitalize;
		}
		#zox-foot-wrap {
			background: #fff;
		}
		#zox-foot-wrap p {
			color: #aaa;
		}
		#zox-foot-wrap a {
			color: #aaa;
		}
		.zox-byline-wrap span,
		.zox-byline-wrap span a,
		span.zox-s-cat {
			font-family: 'Titillium Web', sans-serif;
		}
		span.zox-s-cat {
			text-transform: uppercase;
		}
		#zox-feat-tech3-wrap .zox-byline-wrap span,
		#zox-feat-tech3-wrap .zox-byline-wrap span a {
			font-weight: 600;
			text-transform: capitalize;
		}
		.zox-s6 span.zox-s-cat,
		.zox-s6 .zox-widget-side-trend-wrap .zox-art-text:before {
			color: #ff4422;
		}
		h2.zox-s-title1,
		h2.zox-s-title1-feat,
		h2.zox-s-title2,
		h1.zox-post-title,
		.zox-widget-side-trend-wrap .zox-art-text:before,
		.alp-related-posts .current .post-title,
		.alp-related-posts-wrapper .alp-related-post .post-title {
			font-family: 'Poppins', sans-serif;
			font-weight: 700;
			text-transform: capitalize;
		}
		span.zox-widget-home-title {
			font-family: 'Poppins', sans-serif;
			font-weight: 700;
			text-transform: capitalize;
		}
		.zox-post-type {
			border: 3px solid #ff4422;
		}
		.zox-widget-featl-sub .zox-post-type {
			border: 2px solid #ff4422;
		}
		#zox-search-form #zox-search-submit {
			background: #ff4422;
		}
			";
	}

	$zox_head_layout = get_option('zox_head_layout');
	$zox_head_contw = get_option('zox_head_contw');
	$zox_skin = get_option('zox_skin');
	$zox_px = "px";
	if (isset($zox_head_contw)) {
	if ($zox_skin == "3") {
		$zox_head_contw_css = "
		.zox-head-width {
			margin: 0 auto;
			max-width: 1260px;
		}
			";
	} else if ($zox_skin == "2" || $zox_skin == "5" || $zox_skin == "13") {
		$zox_head_contw_css = "
		.zox-head-width {
			margin: 0 auto;
			max-width: 1320px;
		}
			";
	} else if ($zox_skin == "4" || $zox_skin == "6" || $zox_skin == "8" || $zox_skin == "9" || $zox_skin == "10" || $zox_skin == "11" || $zox_skin == "14") {
		$zox_head_contw_css = "
		.zox-head-width {
			margin: 0;
			padding: 0 30px;
			max-width: none;
			width: 100%;
		}
		@media screen and (min-width: 1601px) {
			.zox-head-width {
				max-width: 1600px;
			}
		}
			";
	} else if ($zox_skin == "7") {
		$zox_head_contw_css = "
		.zox-head-width {
			margin: 0 auto;
			max-width: 1340px;
		}
			";
	} else if ($zox_skin == "12" || $zox_skin == "15") {
		$zox_head_contw_css = "
		.zox-head-width {
			margin: 0 auto;
			max-width: 1450px;
		}
			";
	} else if ($zox_skin == "16") {
		$zox_head_contw_css = "
		#zox-top-head-wrap .zox-head-width {
			margin: 0;
			padding: 0 30px;
			max-width: none;
			width: 100%;
		}
		#zox-bot-head-wrap .zox-head-width {
			margin: 0;
			max-width: none;
			width: 100%;
		}
		@media screen and (min-width: 1601px) {
			.zox-head-width {
				max-width: 1600px;
			}
		}
			";
	} else {
		if ($zox_head_layout == "1") {
			$zox_head_contw_css = "
			.zox-head-width {
				margin: 0;
				max-width: none;
			}
			.zox-nav-menu ul li.zox-mega-drop .zox-mega-dropdown {
				left: calc(((100vw - 100%) /2) * -1);
			}
			@media screen and (min-width: 1601px) {
				.zox-head-width {
					max-width: 1600px;
				}
			}
				";
		} else if ($zox_head_layout == "2") {
			$zox_head_contw_css = "
			.zox-head-width {
				margin: 0 auto;
				max-width: calc($zox_head_contw$zox_px + 60px);
			}
				";
		}
	}
	}

	$zox_cont_layout = get_option('zox_cont_layout');
	$zox_contw = get_option('zox_contw');
	$zox_home_rside = get_option('zox_home_rside');
	$zox_skin = get_option('zox_skin');
	$zox_px = "px";
	if (isset($zox_contw)) {
	if ($zox_skin == "3" || $zox_skin == "4" || $zox_skin == "13") {
		$zox_contw_css = "
		.zox-body-width,
		.zox-title-width,
		.zox-widget-feat-wrap.zox-o1 .zox-art-text-cont,
		.zox-widget-feat-wrap.zox-o4 .zox-art-text-cont,
		.zox-widget-feat-main.zox-o1 .zox-art-text-cont,
		.zox-widget-feat-main.zox-o4 .zox-art-text-cont {
			margin: 0 auto;
			max-width: 1260px;
		}
			";
	} else if ($zox_skin == "2" || $zox_skin == "5") {
		$zox_contw_css = "
		.zox-body-width,
		.zox-title-width,
		.zox-widget-feat-wrap.zox-o1 .zox-art-text-cont,
		.zox-widget-feat-wrap.zox-o4 .zox-art-text-cont,
		.zox-widget-feat-main.zox-o1 .zox-art-text-cont,
		.zox-widget-feat-main.zox-o4 .zox-art-text-cont {
			margin: 0 auto;
			max-width: 1320px;
		}
			";
	} else if ($zox_skin == "6" || $zox_skin == "16") {
		$zox_contw_css = "
		.zox-body-width,
		.zox-title-width,
		.zox-widget-feat-wrap.zox-o1 .zox-art-text-cont,
		.zox-widget-feat-wrap.zox-o4 .zox-art-text-cont,
		.zox-widget-feat-main.zox-o1 .zox-art-text-cont,
		.zox-widget-feat-main.zox-o4 .zox-art-text-cont {
			margin: 0 auto;
			max-width: 1220px;
		}
			";
	} else if ($zox_skin == "7" || $zox_skin == "14" || $zox_skin == "15") {
		$zox_contw_css = "
		.zox-body-width,
		.zox-title-width,
		.zox-widget-feat-wrap.zox-o1 .zox-art-text-cont,
		.zox-widget-feat-wrap.zox-o4 .zox-art-text-cont,
		.zox-widget-feat-main.zox-o1 .zox-art-text-cont,
		.zox-widget-feat-main.zox-o4 .zox-art-text-cont {
			margin: 0 auto;
			max-width: 1340px;
		}
			";
	} else if ($zox_skin == "8") {
		$zox_contw_css = "
		.zox-body-width,
		.zox-title-width,
		.zox-widget-feat-wrap.zox-o1 .zox-art-text-cont,
		.zox-widget-feat-wrap.zox-o4 .zox-art-text-cont,
		.zox-widget-feat-main.zox-o1 .zox-art-text-cont,
		.zox-widget-feat-main.zox-o4 .zox-art-text-cont {
			margin: 0 auto;
			max-width: 1290px;
		}
			";
	} else if ($zox_skin == "9" || $zox_skin == "12") {
		$zox_contw_css = "
		.zox-body-width,
		.zox-title-width,
		.zox-widget-feat-wrap.zox-o1 .zox-art-text-cont,
		.zox-widget-feat-wrap.zox-o4 .zox-art-text-cont,
		.zox-widget-feat-main.zox-o1 .zox-art-text-cont,
		.zox-widget-feat-main.zox-o4 .zox-art-text-cont {
			margin: 0 auto;
			max-width: 1500px;
		}
			";
	} else if ($zox_skin == "10") {
		$zox_contw_css = "
		.zox-body-width,
		.zox-title-width,
		.zox-widget-feat-wrap.zox-o1 .zox-art-text-cont,
		.zox-widget-feat-wrap.zox-o4 .zox-art-text-cont,
		.zox-widget-feat-main.zox-o1 .zox-art-text-cont,
		.zox-widget-feat-main.zox-o4 .zox-art-text-cont {
			margin: 0 auto;
			padding: 0 20px;
			max-width: 1200px;
		}
		.zox-widget-feat-main.zox-o4 .zox-art-text-cont {
			padding: 0;
		}
		#zox-feat-sport3-wrap .zox-body-width,
		#zox-feat-sport3-wrap .zox-title-width {
			margin: 0;
			padding: 0;
			max-width: none;
		}
		@media screen and (min-width: 1601px) {
			.zox-body-width,
			.zox-title-width {
				max-width: 1600px;
			}
		}
			";
	} else if ($zox_skin == "11") {
		$zox_contw_css = "
		.zox-body-width,
		.zox-title-width,
		.zox-widget-feat-wrap.zox-o1 .zox-art-text-cont,
		.zox-widget-feat-wrap.zox-o4 .zox-art-text-cont,
		.zox-widget-feat-main.zox-o1 .zox-art-text-cont,
		.zox-widget-feat-main.zox-o4 .zox-art-text-cont {
			margin: 0 auto;
			max-width: 1400px;
		}
			";
	} else {
		if ($zox_cont_layout == "1") {
			$zox_contw_css = "
			.zox-body-width,
			.zox-title-width,
			.zox-widget-feat-wrap.zox-o1 .zox-art-text-cont,
			.zox-widget-feat-wrap.zox-o4 .zox-art-text-cont,
			.zox-widget-feat-main.zox-o1 .zox-art-text-cont,
			.zox-widget-feat-main.zox-o4 .zox-art-text-cont {
				margin: 0;
				padding: 0 30px;
				max-width: none;
			}
			@media screen and (min-width: 1601px) {
				.zox-body-width,
				.zox-title-width {
					max-width: 1600px;
				}
			}
				";
		} else if ($zox_cont_layout == "2" && ($zox_home_rside == "2" || $zox_home_rside == "3") ) {
			$zox_contw_css = "
			#zox-home-main-wrap {
				margin: 0 auto;
				padding: 0 30px;
				max-width: calc($zox_contw$zox_px + 60px);
			}
			.zox-body-width,
			.zox-title-width,
			.zox-widget-feat-wrap.zox-o1 .zox-art-text-cont,
			.zox-widget-feat-wrap.zox-o4 .zox-art-text-cont,
			.zox-widget-feat-main.zox-o1 .zox-art-text-cont,
			.zox-widget-feat-main.zox-o4 .zox-art-text-cont {
				margin: 0 auto;
				max-width: none;
			}
				";
		} else {
			$zox_contw_css = "
			.zox-body-width,
			.zox-title-width,
			.zox-widget-feat-wrap.zox-o1 .zox-art-text-cont,
			.zox-widget-feat-wrap.zox-o4 .zox-art-text-cont,
			.zox-widget-feat-main.zox-o1 .zox-art-text-cont,
			.zox-widget-feat-main.zox-o4 .zox-art-text-cont {
				margin: 0 auto;
				padding: 0 30px;
				max-width: calc($zox_contw$zox_px + 60px);
			}
				";
		}
	}
	}

$zox_rtl = get_option('zox_rtl'); if ($zox_rtl == "true") {
	$zox_top_navl = get_option('zox_top_navl');
	$zox_top_navr = get_option('zox_top_navr');
	$zox_skin = get_option('zox_skin');
	if ($zox_skin == "2" || $zox_skin == "11" || $zox_skin == "12") {

	} else if ($zox_skin == "5" || $zox_skin == "6" || $zox_skin == "7" || $zox_skin == "16") {
		$zox_top_navl_css = "
		#zox-top-head {
			grid-template-columns: auto 250px;
		}
		#zox-top-head-left {
			width: 100%;
		}
		#zox-top-head-mid {
			display: none;
		}
			";
	} else {
		if (($zox_top_navl == "2") && ($zox_top_navr !== "5")) {
			$zox_top_navl_css = "
			#zox-top-head {
				grid-template-columns: auto 250px;
			}
			#zox-top-head-left {
				display: none;
				width: 100%;
			}
			#zox-top-head-mid {
				text-align: right;
			}
				";
		} else if (($zox_top_navl == "2") && ($zox_top_navr == "5")) {
			$zox_top_navl_css = "
			#zox-top-head {
				grid-template-columns: auto auto;
			}
			#zox-top-head-left {
				display: none;
			}
			#zox-top-head-mid {
				text-align: right;
			}
				";
		} else if (($zox_top_navl == "6") && ($zox_top_navr !== "5")) {
			$zox_top_navl_css = "
			#zox-top-head {
				grid-template-columns: auto 250px;
			}
			#zox-top-head-left {
				width: 100%;
			}
			#zox-top-head-mid {
				display: none;
			}
				";
		} else if (($zox_top_navl == "6") && ($zox_top_navr == "5")) {
			$zox_top_navl_css = "
			#zox-top-head {
				grid-template-columns: auto auto;
			}
			#zox-top-head-left,
			#zox-top-head-right {
				width: 100%;
			}
			#zox-top-head-mid {
				display: none;
			}
				";
		} else if (($zox_top_navl !== "6") && ($zox_top_navr == "5")) {
			$zox_top_navl_css = "
			#zox-top-head {
				grid-template-columns: 250px auto;
			}
			#zox-top-head-right {
				width: 100%;
			}
			#zox-top-head-mid {
				display: none;
			}
				";
		}
	}
} else {
	$zox_top_navl = get_option('zox_top_navl');
	$zox_top_navr = get_option('zox_top_navr');
	$zox_skin = get_option('zox_skin');
	if ($zox_skin == "2" || $zox_skin == "11" || $zox_skin == "12") {

	} else if ($zox_skin == "5" || $zox_skin == "6" || $zox_skin == "7" || $zox_skin == "16") {
		$zox_top_navl_css = "
		#zox-top-head {
			grid-template-columns: auto 250px;
		}
		#zox-top-head-left {
			width: 100%;
		}
		#zox-top-head-mid {
			display: none;
		}
			";
	} else {
		if (($zox_top_navl == "2") && ($zox_top_navr !== "5")) {
			$zox_top_navl_css = "
			#zox-top-head {
				grid-template-columns: auto 250px;
			}
			#zox-top-head-left {
				display: none;
				width: 100%;
			}
			#zox-top-head-mid {
				text-align: left;
			}
				";
		} else if (($zox_top_navl == "2") && ($zox_top_navr == "5")) {
			$zox_top_navl_css = "
			#zox-top-head {
				grid-template-columns: auto auto;
			}
			#zox-top-head-left {
				display: none;
			}
			#zox-top-head-mid {
				text-align: left;
			}
				";
		} else if (($zox_top_navl == "6") && ($zox_top_navr !== "5")) {
			$zox_top_navl_css = "
			#zox-top-head {
				grid-template-columns: auto 250px;
			}
			#zox-top-head-left {
				width: 100%;
			}
			#zox-top-head-mid {
				display: none;
			}
				";
		} else if (($zox_top_navl == "6") && ($zox_top_navr == "5")) {
			$zox_top_navl_css = "
			#zox-top-head {
				grid-template-columns: auto auto;
			}
			#zox-top-head-left,
			#zox-top-head-right {
				width: 100%;
			}
			#zox-top-head-mid {
				display: none;
			}
				";
		} else if (($zox_top_navl !== "6") && ($zox_top_navr == "5")) {
			$zox_top_navl_css = "
			#zox-top-head {
				grid-template-columns: 250px auto;
			}
			#zox-top-head-right {
				width: 100%;
			}
			#zox-top-head-mid {
				display: none;
			}
				";
		}
	}
}

	$zox_bot_navc = get_option('zox_bot_navc');
	$zox_skin = get_option('zox_skin');
	if ($zox_skin == "2") {

	} else {
		if ($zox_bot_navc == "1") {
			$zox_bot_navc_css = "
			.zox-bot-head-menu {
				display: none;
			}
				";
		} else if ($zox_bot_navc == "3") {
			$zox_bot_navc_css = "
			.zox-bot-head-menu {
				display: none;
			}
			.zox-bot-head-logo {
				width: 100%;
			}
				";
		}
	}


$zox_rtl = get_option('zox_rtl'); if ($zox_rtl == "true") {
	$zox_menu_align = get_option('zox_menu_align');
	$zox_bot_navc = get_option('zox_bot_navc');
	$zox_skin = get_option('zox_skin');
	if ($zox_skin == "2") {

	} else if ($zox_skin == "4" || $zox_skin == "5" || $zox_skin == "7" || $zox_skin == "8" || $zox_skin == "9" || $zox_skin == "10" || $zox_skin == "14" || $zox_skin == "15" || $zox_skin == "16") {
		$zox_menu_align_css = "
		#zox-bot-head-mid {
			display: grid;
			grid-column-gap: 30px;
			grid-template-columns: auto auto;
			justify-content: start;
			position: static;
		}
		.zox-bot-head-logo {
			position: relative;
				top: auto;
				right: auto;
		}
		#zox-bot-head-wrap .zox-nav-menu ul li:first-child a {
			padding-right: 0;
		}
			";
	} else {
		if ($zox_menu_align == "1" && $zox_bot_navc == "2") {
			$zox_menu_align_css = "
			#zox-bot-head-mid {
				display: grid;
				grid-column-gap: 20px;
				grid-template-columns: auto auto;
				justify-content: start;
				position: static;
			}
			.zox-bot-head-logo {
				position: relative;
					top: auto;
					right: auto;
			}
			#zox-bot-head-wrap .zox-nav-menu ul li:first-child a {
				padding-right: 0;
			}
			.zox-bot-head-menu {
				padding: 0;
			}
				";
		} else if ($zox_menu_align == "3" && $zox_bot_navc == "2") {
			$zox_menu_align_css = "
			#zox-bot-head-mid {
				display: grid;
				grid-column-gap: 20px;
				grid-template-columns: auto auto;
				justify-content: space-between;
				position: static;
			}
			.zox-bot-head-logo {
				position: relative;
					top: auto;
					right: auto;
			}
				";
		}
	}
} else {
	$zox_menu_align = get_option('zox_menu_align');
	$zox_bot_navc = get_option('zox_bot_navc');
	$zox_skin = get_option('zox_skin');
	if ($zox_skin == "2") {

	} else if ($zox_skin == "4" || $zox_skin == "5" || $zox_skin == "7" || $zox_skin == "8" || $zox_skin == "9" || $zox_skin == "10" || $zox_skin == "14" || $zox_skin == "15" || $zox_skin == "16") {
		$zox_menu_align_css = "
		#zox-bot-head-mid {
			display: grid;
			grid-column-gap: 30px;
			grid-template-columns: auto auto;
			justify-content: start;
			position: static;
		}
		.zox-bot-head-logo {
			position: relative;
				top: auto;
				left: auto;
		}
		#zox-bot-head-wrap .zox-nav-menu ul li:first-child a {
			padding-left: 0;
		}
			";
	} else {
		if ($zox_menu_align == "1" && $zox_bot_navc == "2") {
			$zox_menu_align_css = "
			#zox-bot-head-mid {
				display: grid;
				grid-column-gap: 20px;
				grid-template-columns: auto auto;
				justify-content: start;
				position: static;
			}
			.zox-bot-head-logo {
				position: relative;
					top: auto;
					left: auto;
			}
			#zox-bot-head-wrap .zox-nav-menu ul li:first-child a {
				padding-left: 0;
			}
			.zox-bot-head-menu {
				padding: 0;
			}
				";
		} else if ($zox_menu_align == "3" && $zox_bot_navc == "2") {
			$zox_menu_align_css = "
			#zox-bot-head-mid {
				display: grid;
				grid-column-gap: 20px;
				grid-template-columns: auto auto;
				justify-content: space-between;
				position: static;
			}
			.zox-bot-head-logo {
				position: relative;
					top: auto;
					left: auto;
			}
				";
		}
	}
}

$zox_rtl = get_option('zox_rtl'); if ($zox_rtl == "true") {
	$zox_mob_but = get_option('zox_mob_but');
	$zox_menu_align = get_option('zox_menu_align');
	$zox_bot_navc = get_option('zox_bot_navc');
	$zox_skin = get_option('zox_skin');
	if (!empty($zox_mob_but)) {
	if ($zox_skin == "2" || $zox_skin == "3" || $zox_skin == "5") {
		$zox_mob_but_css = "
		@media screen and (max-width: 1023px) {
			#zox-bot-head-left {
				display: grid;
			}
			#zox-bot-head {
				grid-template-columns: 60px auto 60px;
			}
		}
			";
	} else if ($zox_skin == "6") {
		$zox_mob_but_css = "
		#zox-bot-head-left {
			display: grid;
		}
		#zox-bot-head {
			grid-template-columns: 24px auto 60px;
		}
		.zox-bot-head-menu {
			padding: 0 36px 0 0;
		}
			";
	} else if ($zox_skin == "4" || $zox_skin == "7" || $zox_skin == "8" || $zox_skin == "9" || $zox_skin == "10" || $zox_skin == "14" || $zox_skin == "15" || $zox_skin == "16") {
		$zox_mob_but_css = "
		.zox-bot-head-menu {
			padding: 0;
		}
		@media screen and (max-width: 1023px) {
			#zox-bot-head-left {
				display: grid;
			}
			#zox-bot-head {
				grid-template-columns: 60px auto 60px;
			}
		}
			";
	} else if ($zox_skin == "11" || $zox_skin == "12" || $zox_skin == "13") {
		$zox_mob_but_css = "
		#zox-bot-head-left {
			display: grid;
		}
		#zox-bot-head {
			grid-template-columns: 24px auto 60px;
		}
		.zox-bot-head-menu {
			padding: 0 36px 0 0;
		}
		";
	} else {
		if ($zox_mob_but == "1") {
			$zox_mob_but_css = "
			#zox-bot-head-left {
				display: grid;
			}
			#zox-bot-head {
				grid-template-columns: 24px auto 60px;
			}
			.zox-bot-head-menu {
				padding: 0 36px 0 0;
			}
				";
		} else if ($zox_mob_but == "2" && $zox_menu_align !== "2" && $zox_bot_navc == "2") {
			$zox_mob_but_css = "
			@media screen and (min-width: 1024px) {
				#zox-bot-head-left {
					display: none;
				}
				#zox-bot-head {
					grid-template-columns: auto 60px;
				}
			}
			@media screen and (max-width: 1023px) {
				#zox-bot-head-left {
					display: grid;
				}
			}
				";
		} else if ($zox_mob_but == "2" && $zox_menu_align == "2" && $zox_bot_navc == "2") {
			$zox_mob_but_css = "
			@media screen and (min-width: 1024px) {
				#zox-bot-head-left {
					display: none;
				}
				#zox-bot-head {
					grid-template-columns: auto 60px;
				}
				.zox-bot-head-menu {
					display: grid;
					padding: 0 90px 0 0;
				}
			}
			@media screen and (max-width: 1023px) {
				#zox-bot-head-left {
					display: grid;
				}
			}
				";
		} else if ($zox_mob_but == "2" && $zox_bot_navc == "1") {
			$zox_mob_but_css = "
			@media screen and (min-width: 1024px) {
				#zox-bot-head-left,
				.zox-bot-head-menu {
					display: none;
				}
				#zox-bot-head {
					grid-template-columns: auto 60px;
				}
			}
			@media screen and (max-width: 1023px) {
				#zox-bot-head-left {
					display: grid;
				}
			}
				";
		} else if ($zox_mob_but == "2" && $zox_bot_navc == "3") {
			$zox_mob_but_css = "
			@media screen and (min-width: 1024px) {
				#zox-bot-head-left,
				.zox-bot-head-menu {
					display: none;
				}
				#zox-bot-head {
					grid-template-columns: auto 60px;
				}
				#zox-bot-head-mid {
					grid-template-columns: none;
					justify-content: center;
				}
				.zox-bot-head-logo {
					display: grid;
					padding-right: 90px;
				}
			}
			@media screen and (max-width: 1023px) {
				#zox-bot-head-left {
					display: grid;
				}
			}
				";
		}
	}
	}
} else {
	$zox_mob_but = get_option('zox_mob_but');
	$zox_menu_align = get_option('zox_menu_align');
	$zox_bot_navc = get_option('zox_bot_navc');
	$zox_skin = get_option('zox_skin');
	if (!empty($zox_mob_but)) {
	if ($zox_skin == "2" || $zox_skin == "3" || $zox_skin == "5") {
		$zox_mob_but_css = "
		@media screen and (max-width: 1023px) {
			#zox-bot-head-left {
				display: grid;
			}
			#zox-bot-head {
				grid-template-columns: 60px auto 60px;
			}
		}
			";
	} else if ($zox_skin == "6") {
		$zox_mob_but_css = "
		#zox-bot-head-left {
			display: grid;
		}
		#zox-bot-head {
			grid-template-columns: 24px auto 60px;
		}
		.zox-bot-head-menu {
			padding: 0 0 0 36px;
		}
			";
	} else if ($zox_skin == "4" || $zox_skin == "7" || $zox_skin == "8" || $zox_skin == "9" || $zox_skin == "10" || $zox_skin == "14" || $zox_skin == "15" || $zox_skin == "16") {
		$zox_mob_but_css = "
		.zox-bot-head-menu {
			padding: 0;
		}
		@media screen and (max-width: 1023px) {
			#zox-bot-head-left {
				display: grid;
			}
			#zox-bot-head {
				grid-template-columns: 60px auto 60px;
			}
		}
			";
	} else if ($zox_skin == "11" || $zox_skin == "12" || $zox_skin == "13") {
		$zox_mob_but_css = "
		#zox-bot-head-left {
			display: grid;
		}
		#zox-bot-head {
			grid-template-columns: 24px auto 60px;
		}
		.zox-bot-head-menu {
			padding: 0 0 0 36px;
		}
		";
	} else {
		if ($zox_mob_but == "1") {
			$zox_mob_but_css = "
			#zox-bot-head-left {
				display: grid;
			}
			#zox-bot-head {
				grid-template-columns: 24px auto 60px;
			}
			.zox-bot-head-menu {
				padding: 0 0 0 36px;
			}
				";
		} else if ($zox_mob_but == "2" && $zox_menu_align !== "2" && $zox_bot_navc == "2") {
			$zox_mob_but_css = "
			@media screen and (min-width: 1024px) {
				#zox-bot-head-left {
					display: none;
				}
				#zox-bot-head {
					grid-template-columns: auto 60px;
				}
			}
			@media screen and (max-width: 1023px) {
				#zox-bot-head-left {
					display: grid;
				}
			}
				";
		} else if ($zox_mob_but == "2" && $zox_menu_align == "2" && $zox_bot_navc == "2") {
			$zox_mob_but_css = "
			@media screen and (min-width: 1024px) {
				#zox-bot-head-left {
					display: none;
				}
				#zox-bot-head {
					grid-template-columns: auto 60px;
				}
				.zox-bot-head-menu {
					display: grid;
					padding: 0 0 0 90px;
				}
			}
			@media screen and (max-width: 1023px) {
				#zox-bot-head-left {
					display: grid;
				}
			}
				";
		} else if ($zox_mob_but == "2" && $zox_bot_navc == "1") {
			$zox_mob_but_css = "
			@media screen and (min-width: 1024px) {
				#zox-bot-head-left,
				.zox-bot-head-menu {
					display: none;
				}
				#zox-bot-head {
					grid-template-columns: auto 60px;
				}
			}
			@media screen and (max-width: 1023px) {
				#zox-bot-head-left {
					display: grid;
				}
			}
				";
		} else if ($zox_mob_but == "2" && $zox_bot_navc == "3") {
			$zox_mob_but_css = "
			@media screen and (min-width: 1024px) {
				#zox-bot-head-left,
				.zox-bot-head-menu {
					display: none;
				}
				#zox-bot-head {
					grid-template-columns: auto 60px;
				}
				#zox-bot-head-mid {
					grid-template-columns: none;
					justify-content: center;
				}
				.zox-bot-head-logo {
					display: grid;
					padding-left: 90px;
				}
			}
			@media screen and (max-width: 1023px) {
				#zox-bot-head-left {
					display: grid;
				}
			}
				";
		}
	}
	}
}


$zox_rtl = get_option('zox_rtl'); if ($zox_rtl == "true") {
	$zox_logo_nav_vis = get_option('zox_logo_nav_vis');
	$zox_menu_align = get_option('zox_menu_align');
	$zox_skin = get_option('zox_skin');
	if (!empty($zox_skin)) {
	if ($zox_skin == "11" || $zox_skin == "12") {
		$zox_logo_nav_vis_css = "
		.zox-bot-head-logo {
			top: -9999px;
			opacity: 0;
		}
		.zox-fix-up .zox-bot-head-logo {
				top: 0;
				opacity: 1;
			}
		@media screen and (max-width: 1250px) and (min-width: 1024px) {
			.zox-fix-up #zox-bot-head-mid {
				display: grid;
				grid-gap: 20px;
				grid-template-columns: 100%;
				justify-content: start;
			}
			.zox-fix-up .zox-bot-head-logo {
				position: absolute;
					right: 0;
					top: 0;
			}
		}
			";
	} else {
		if ($zox_logo_nav_vis == "1") {
			$zox_logo_nav_vis_css = "
			.zox-bot-head-logo {
				opacity: 0;
				overflow: hidden;
				height: 0;
				width: 0;
			}
				";
		} else if ($zox_logo_nav_vis == "3" && $zox_menu_align == "2") {
			$zox_logo_nav_vis_css = "
			.zox-bot-head-logo {
				top: -9999px;
				opacity: 0;
			}
			@media screen and (max-width: 1250px) and (min-width: 1024px) {
				.zox-fix-up #zox-bot-head-mid {
					display: grid;
					grid-gap: 20px;
					grid-template-columns: auto auto;
					justify-content: end;
				}
				.zox-fix-up .zox-bot-head-logo {
					position: relative;
						right: auto;
						top: auto;
				}
			}
				";
		} else if ($zox_logo_nav_vis == "3" && $zox_menu_align !== "1") {
			$zox_logo_nav_vis_css = "
			.zox-bot-head-logo {
				top: -9999px;
				opacity: 0;
			}
				";
		} else if ($zox_logo_nav_vis == "3" && $zox_menu_align == "1") {
			$zox_logo_nav_vis_css = "
			.zox-bot-head-logo {
				top: -9999px;
				opacity: 0;
				width: 0;
			}
				";
		}
	}
	}
} else {
	$zox_logo_nav_vis = get_option('zox_logo_nav_vis');
	$zox_menu_align = get_option('zox_menu_align');
	$zox_skin = get_option('zox_skin');
	if (!empty($zox_skin)) {
	if ($zox_skin == "11" || $zox_skin == "12") {
		$zox_logo_nav_vis_css = "
		.zox-bot-head-logo {
			top: -9999px;
			opacity: 0;
		}
		.zox-fix-up .zox-bot-head-logo {
				top: 0;
				opacity: 1;
			}
		@media screen and (max-width: 1250px) and (min-width: 1024px) {
			.zox-fix-up #zox-bot-head-mid {
				display: grid;
				grid-gap: 20px;
				grid-template-columns: 100%;
				justify-content: start;
			}
			.zox-fix-up .zox-bot-head-logo {
				position: absolute;
					left: 0;
					top: 0;
			}
		}
			";
	} else {
		if ($zox_logo_nav_vis == "1") {
			$zox_logo_nav_vis_css = "
			.zox-bot-head-logo {
				opacity: 0;
				overflow: hidden;
				height: 0;
				width: 0;
			}
				";
		} else if ($zox_logo_nav_vis == "3" && $zox_menu_align == "2") {
			$zox_logo_nav_vis_css = "
			.zox-bot-head-logo {
				top: -9999px;
				opacity: 0;
			}
			@media screen and (max-width: 1250px) and (min-width: 1024px) {
				.zox-fix-up #zox-bot-head-mid {
					display: grid;
					grid-gap: 20px;
					grid-template-columns: auto auto;
					justify-content: start;
				}
				.zox-fix-up .zox-bot-head-logo {
					position: relative;
						left: auto;
						top: auto;
				}
			}
				";
		} else if ($zox_logo_nav_vis == "3" && $zox_menu_align !== "1") {
			$zox_logo_nav_vis_css = "
			.zox-bot-head-logo {
				top: -9999px;
				opacity: 0;
			}
				";
		} else if ($zox_logo_nav_vis == "3" && $zox_menu_align == "1") {
			$zox_logo_nav_vis_css = "
			.zox-bot-head-logo {
				top: -9999px;
				opacity: 0;
				width: 0;
			}
				";
		}
	}
	}
}

$zox_rtl = get_option('zox_rtl'); if ($zox_rtl == "true") {
	$zox_feat_layout = get_option('zox_feat_layout');
	$zox_trans_menu = get_option('zox_trans_menu');
	$zox_bot_nav_bg = get_option('zox_bot_nav_bg');
	$zox_skin = get_option('zox_skin');
	if ($zox_skin == "2") {

	} else if ($zox_skin == "14" && is_front_page()) {
		$zox_trans_menu_css = "
		#zox-top-head-wrap {
			display: none;
		}
		.zox-trans-head {
			position: absolute;
				top: 0;
				right: 0;
				left: auto;
		}
		#zox-bot-head-wrap.zox-trans-bot {
			background-color: transparent;
		}
		.zox-bot-head-logo-main {
			display: none;
		}
		@media screen and (max-width: 479px) {
			#zox-bot-head-wrap,
			#zox-bot-head-wrap.zox-trans-bot {
				background-color: #000;
			}
		}
			";
	} else {
		if ($zox_trans_menu == "true" && is_front_page()) {
			$zox_trans_menu_css = "
			#zox-top-head-wrap {
				display: none;
			}
			.zox-trans-head {
				position: absolute;
					top: 0;
					right: 0;
					left: auto;
			}
			#zox-bot-head-wrap.zox-trans-bot {
				background-color: transparent;
			}
			.zox-bot-head-logo-main {
				display: none;
			}
			@media screen and (max-width: 479px) {
				#zox-bot-head-wrap,
				#zox-bot-head-wrap.zox-trans-bot {
					background-color: $zox_bot_nav_bg;
				}
			}
				";
		}
	}
} else {
	$zox_feat_layout = get_option('zox_feat_layout');
	$zox_trans_menu = get_option('zox_trans_menu');
	$zox_bot_nav_bg = get_option('zox_bot_nav_bg');
	$zox_skin = get_option('zox_skin');
	if ($zox_skin == "2") {

	} else if ($zox_skin == "14" && is_front_page()) {
		$zox_trans_menu_css = "
		#zox-top-head-wrap {
			display: none;
		}
		.zox-trans-head {
			position: absolute;
				top: 0;
				left: 0;
		}
		#zox-bot-head-wrap.zox-trans-bot {
			background-color: transparent;
		}
		.zox-bot-head-logo-main {
			display: none;
		}
		@media screen and (max-width: 479px) {
			#zox-bot-head-wrap,
			#zox-bot-head-wrap.zox-trans-bot {
				background-color: #000;
			}
		}
			";
	} else {
		if ($zox_trans_menu == "true" && is_front_page()) {
			$zox_trans_menu_css = "
			#zox-top-head-wrap {
				display: none;
			}
			.zox-trans-head {
				position: absolute;
					top: 0;
					left: 0;
			}
			#zox-bot-head-wrap.zox-trans-bot {
				background-color: transparent;
			}
			.zox-bot-head-logo-main {
				display: none;
			}
			@media screen and (max-width: 479px) {
				#zox-bot-head-wrap,
				#zox-bot-head-wrap.zox-trans-bot {
					background-color: $zox_bot_nav_bg;
				}
			}
				";
		}
	}
}

	$zox_nav_border = get_option('zox_nav_border');
	$zox_skin = get_option('zox_skin');
	if ($zox_skin == "2") {

	} else if ($zox_skin == "7") {
		$zox_nav_border_css = "
		#zox-bot-head-wrap {
			border-bottom: 1px solid #ddd;
		}
			";
	} else {
		if ($zox_nav_border == "2") {
			$zox_nav_border_css = "
			#zox-bot-head-wrap {
				border-top: 1px solid #ddd;
			}
				";
		} else if ($zox_nav_border == "3") {
			$zox_nav_border_css = "
			#zox-bot-head-wrap {
				border-bottom: 1px solid #ddd;
			}
				";
		} else if ($zox_nav_border == "4") {
			$zox_nav_border_css = "
			#zox-bot-head-wrap {
				border-top: 1px solid #ddd;
				border-bottom: 1px solid #ddd;
			}
				";
		}
	}

	$zox_nav_shade = get_option('zox_nav_shade');
	$zox_skin = get_option('zox_skin');
	if ($zox_skin == "4" || $zox_skin == "11" || $zox_skin == "16") {
		$zox_nav_shade_css = "
			#zox-bot-head-wrap {
				-webkit-box-shadow: 0 0.5rem 1rem 0 rgba(21,21,30,0.08);
				   -moz-box-shadow: 0 0.5rem 1rem 0 rgba(21,21,30,0.08);
				    -ms-box-shadow: 0 0.5rem 1rem 0 rgba(21,21,30,0.08);
				     -o-box-shadow: 0 0.5rem 1rem 0 rgba(21,21,30,0.08);
						box-shadow: 0 0.5rem 1rem 0 rgba(21,21,30,0.08);
			}
				";
	} else {
		if ($zox_nav_shade == "2") {
			$zox_nav_shade_css = "
			#zox-bot-head-wrap {
				-webkit-box-shadow: 0 0.5rem 1rem 0 rgba(21,21,30,0.08);
				   -moz-box-shadow: 0 0.5rem 1rem 0 rgba(21,21,30,0.08);
					-ms-box-shadow: 0 0.5rem 1rem 0 rgba(21,21,30,0.08);
					 -o-box-shadow: 0 0.5rem 1rem 0 rgba(21,21,30,0.08);
						box-shadow: 0 0.5rem 1rem 0 rgba(21,21,30,0.08);
			}
				";
		} else if ($zox_nav_shade == "3") {
			$zox_nav_shade_css = "
			.zox-fix-up {
				-webkit-box-shadow: 0 0.5rem 1rem 0 rgba(21,21,30,0.08);
				   -moz-box-shadow: 0 0.5rem 1rem 0 rgba(21,21,30,0.08);
				    -ms-box-shadow: 0 0.5rem 1rem 0 rgba(21,21,30,0.08);
				     -o-box-shadow: 0 0.5rem 1rem 0 rgba(21,21,30,0.08);
						box-shadow: 0 0.5rem 1rem 0 rgba(21,21,30,0.08);
			}
				";
		}
	}

	$zox_full_img = get_option('zox_full_img');
	if ($zox_full_img == "true") {
	global $post; if (!empty( $post )) {
	$zox_post_layout = get_option('zox_post_layout');
	$zox_post_temp = get_post_meta($post->ID, "zox_post_template", true);
	if ((empty($zox_post_temp) && $zox_post_layout == '2') || ( $zox_post_temp == "def" && $zox_post_layout == '2' ) || ( $zox_post_temp == "global" && $zox_post_layout == '2' ) || $zox_post_temp == "temp2") {
		$zox_full_img_css = "
		.zox-post-top-wrap .zox-post-img-wrap .zox-post-width {
			padding: 0;
			max-width: 1600px;
		}
		span.zox-post-img-cap {
			padding: 8px 30px 0;
		}
		#zox-lead-bot {
			padding: 20px 0;
		}
				";
	} else if (( empty($zox_post_temp) && $zox_post_layout == '3' ) || ( $zox_post_temp == "def" && $zox_post_layout == '3' ) || ( $zox_post_temp == "global" && $zox_post_layout == '3' ) || ( empty($zox_post_temp) && $zox_post_layout == '4' ) || ( $zox_post_temp == "def" && $zox_post_layout == '4' ) || ( $zox_post_temp == "global" && $zox_post_layout == '4' ) || $zox_post_temp == "temp3" || $zox_post_temp == "temp4") {
		$zox_full_img_css = "
		.single .zox-article-wrap,
		.single #zox-main-body-wrap {
			padding-top: 0;
		}
		span.zox-post-img-cap {
			padding: 8px 30px 0;
		}
		.zox-post-top-wrap .zox-post-img-wrap .zox-post-width {
			padding: 0;
			max-width: 1600px;
		}
		#zox-lead-bot {
			padding: 20px 0;
		}
				";
	}
	}
	}

	$zox_post_center = get_option('zox_post_center');
	if ($zox_post_center == "true") {
		$zox_post_center_css = "
		.zox-post-head-wrap {
			float: none;
			margin: 0 auto;
			padding: 0;
			text-align: center;
			max-width: 800px;
		}
		.zox-post-info-wrap {
			justify-content: center;
		}
				";
	}

$zox_rtl = get_option('zox_rtl'); if ($zox_rtl == "true") {
	global $post; if (!empty( $post )) {
	$zox_alp = get_option('zox_alp');
	$zox_post_alp = get_post_meta($post->ID, "zox_post_alp", true);
	$zox_alp_side = get_option('zox_alp_side');
	$zox_side_width = get_option('zox_side_width');
	if ( ($zox_alp == "true" && ($zox_post_alp == "global" || $zox_post_alp == "on" || (empty($zox_post_alp))) ) || ($zox_alp !== "true" && ($zox_post_alp == "on") ) ) {
		if ($zox_alp_side == "1") {
			$zox_alp_css = "
			.zox-auto-post-grid {
				grid-template-columns: 300px minmax(0, auto);
			}
			";
		} else if ($zox_alp_side == "2") {
			$zox_alp_css = "
			.zox-alp-side {
				display: none;
			}
			.zox-auto-post-grid {
				grid-gap: 20px;
				grid-template-columns: minmax(0, auto) $zox_side_width$zox_px;
			}
			";
		} else {
			$zox_alp_css = "
			.zox-alp-side {
				display: none;
			}
			.zox-auto-post-grid {
				grid-template-columns: 100%;
			}
			";
		}
	} }
} else {
	global $post; if (!empty( $post )) {
	$zox_alp = get_option('zox_alp');
	$zox_post_alp = get_post_meta($post->ID, "zox_post_alp", true);
	$zox_alp_side = get_option('zox_alp_side');
	$zox_side_width = get_option('zox_side_width');
	if ( ($zox_alp == "true" && ($zox_post_alp == "global" || $zox_post_alp == "on" || (empty($zox_post_alp))) ) || ($zox_alp !== "true" && ($zox_post_alp == "on") ) ) {
		if ($zox_alp_side == "1") {
			$zox_alp_css = "
			.zox-auto-post-grid {
				grid-template-columns: 300px minmax(0, auto);
			}
			";
		} else if ($zox_alp_side == "2") {
			$zox_alp_css = "
			.zox-alp-side {
				display: none;
			}
			.zox-auto-post-grid {
				grid-gap: 20px;
				grid-template-columns: $zox_side_width$zox_px minmax(0, auto);
			}
			";
		} else {
			$zox_alp_css = "
			.zox-alp-side {
				display: none;
			}
			.zox-auto-post-grid {
				grid-template-columns: 100%;
			}
			";
		}
	} }
}

	$zox_infinite_scroll = get_option('zox_infinite_scroll');
	if ($zox_infinite_scroll == "true") {
	if (isset($zox_infinite_scroll)) {
	$zox_infinite_scroll_css = "
	.zox-nav-links {
		display: none;
		}
		";
	} }


	global $post; if (!empty( $post )) {
	$zox_glob_side = get_option('zox_post_side');
	$zox_post_side = get_post_meta($post->ID, "zox_post_side", true);
	if (
		(empty($zox_post_side) && $zox_glob_side == "2") ||
		($zox_post_side == "global" && $zox_glob_side == "2") ||
		$zox_post_side == "hide"
	) {
		$zox_post_side_css = "
		.zox-post-main-wrap {
			grid-gap: 0;
			grid-template-columns: 100%;
		}
				";
	} else {

	$zox_skin = get_option('zox_skin');
	$zox_home_rside = get_option('zox_home_rside');
	$zox_post_side = get_option('zox_post_side');
	$zox_side_width = get_option('zox_side_width');
	$zox_px = "px";
	if (!empty($zox_side_width)) {
	if ($zox_skin == "2" || $zox_skin == "5" || $zox_skin == "6" || $zox_skin == "7" || $zox_skin == "9" || $zox_skin == "11" || $zox_skin == "12" || $zox_skin == "13" || $zox_skin == "14" || $zox_skin == "16") {
		$zox_side_width_css = "
		.zox-feat-ent1-grid,
		.zox-feat-net1-grid {
			grid-template-columns: calc(100% - 320px) 300px;
			}
		.zox-post-main-wrap {
			grid-template-columns: calc(100% - 340px) 300px;
		}
		#zox-home-body-wrap {
			grid-template-columns: calc(100% - 340px) 300px;
			}
			";
	} else if ($zox_skin == "10") {
		$zox_side_width_css = "
		.zox-post-main-wrap {
			grid-template-columns: calc(100% - 340px) 300px;
		}
		#zox-home-body-wrap {
			grid-template-columns: calc(100% - 320px) 300px;
			}
			";
	} else if ($zox_skin == "3" || $zox_skin == "8" || $zox_skin == "15") {
		$zox_side_width_css = "
		.zox-post-main-wrap,
		#zox-home-body-wrap {
			grid-template-columns: calc(100% - 380px) 340px;
		}
		.zox-feat-ent2-bot {
			grid-template-columns: auto 340px;
		}
			";
	} else if ($zox_skin == "4") {
		$zox_side_width_css = "
		.zox-post-main-wrap,
		#zox-home-body-wrap {
			grid-template-columns: calc(100% - 380px) 340px;
			}
			";
	} else {
		if ($zox_home_rside !== "1") {
			$zox_side_width1_css = "
			#zox-home-body-wrap {
				grid-template-columns: auto $zox_side_width$zox_px;
				}
				";
		}
		if ($zox_post_side == "true") {
			$zox_side_width2_css = "
			.zox-post-main-wrap {
				grid-template-columns: calc(100% - $zox_side_width$zox_px + 40px) $zox_side_width$zox_px;
				}
				";
		}
	}
	}
	}
	}

	$zox_byline_date = get_option('zox_byline_date');
	$zox_byline_name = get_option('zox_byline_name');
	if ($zox_byline_name == "2" && $zox_byline_date == "2") {
		$zox_byline_name_css = "
		.zox-byline-wrap {
			display: none;
		}
		";
	} else if ($zox_byline_name == "2" && $zox_byline_date == "1") {
		$zox_byline_name_css = "
		span.zox-byline-name {
			display: none;
			}
		span.zox-byline-date {
			margin: 0;
		}
		";
	}

	$zox_byline_date = get_option('zox_byline_date');
	if ($zox_byline_date == "2") {
		$zox_byline_date_css = "
		span.zox-byline-date {
			display: none;
		}
		";
	}

	$zox_home_rside = get_option('zox_home_rside');
	if ($zox_home_rside == "1") {
	$zox_home_rside_css = "
	#zox-home-body-wrap {
		grid-template-columns: 100%;
		}
	.home .zox-blog-grid.zox-div3 {
		grid-template-columns: 1fr 1fr 1fr;
	}
	.home .zox-blog-grid.zox-div4 {
		grid-template-columns: 1fr 1fr 1fr 1fr;
	}
		";
	}

	$zox_skin = get_option('zox_skin');
	$zox_link_style = get_option('zox_link_style');
	$zox_link_color = get_option('zox_link_color');
	if ($zox_skin == "3") {
		$zox_link_style_css = "
		a,
		a:visited,
		a:hover h2.zox-s-title1,
		a:hover h2.zox-s-title1-feat,
		a:hover h2.zox-s-title2,
		a:hover h2.zox-s-title3,
		.zox-post-body p a,
		h3.zox-post-cat a,
		.sp-template a,
		.sp-data-table a,
		span.zox-author-name a {
			color: #bb332f;
		}
		.pagination .current,
		.pagination a:hover {
			background: #bb332f;
			border: 1px solid #bb332f;
		}
		.zox-post-body p a {
			box-shadow: inset 0 -1px 0 0 #fff, inset 0 -2px 0 0 #bb332f;
			color: #000;
		}
		.zox-post-body p a:hover {
			color: #bb332f;
		}
		";
	} else if ($zox_skin == "4") {
		$zox_link_style_css = "
		.zox-s8 a:hover h2.zox-s-title1,
		.zox-s8 a:hover h2.zox-s-title1-feat,
		.zox-s8 a:hover h2.zox-s-title2,
		.zox-s8 a:hover h2.zox-s-title3 {
			box-shadow: 15px 0 0 #fff, -10px 0 0 #fff;
			color: #ec008c;
		}
		.zox-post-body p a,
		h3.zox-post-cat a,
		.sp-template a,
		.sp-data-table a,
		span.zox-author-name a {
			color: #ec008c;
		}
		.pagination .current,
		.pagination a:hover {
			background: #ec008c;
			border: 1px solid #ec008c;
		}
		.zox-feat-ent3-main-wrap a:hover h2.zox-s-title2 {
			color: #000;
		}
		a,
		a:visited,
		.zox-post-body p a,
		h3.zox-post-cat a,
		.sp-template a,
		.sp-data-table a,
		span.zox-author-name a {
			color: #ec008c;
		}
		.zox-post-body p a {
			box-shadow: inset 0 -1px 0 0 #fff, inset 0 -2px 0 0 #ec008c;
			color: #000;
		}
		.zox-post-body p a:hover {
			color: #ec008c;
		}
		";
	} else if ($zox_skin == "5") {
		$zox_link_style_css = "
		a,
		a:visited,
		a:hover h2.zox-s-title1,
		a:hover h2.zox-s-title1-feat,
		a:hover h2.zox-s-title2,
		a:hover h2.zox-s-title3,
		.zox-post-body p a,
		h3.zox-post-cat a,
		.sp-template a,
		.sp-data-table a,
		span.zox-author-name a {
			color: #ff0e50;
		}
		.pagination .current,
		.pagination a:hover {
			background: #ff0e50;
			border: 1px solid #ff0e50;
		}
		.zox-post-body p a {
			box-shadow: inset 0 -1px 0 0 #fff, inset 0 -2px 0 0 #ff0e50;
			color: #000;
		}
		.zox-post-body p a:hover {
			color: #ff0e50;
		}
		";
	} else if ($zox_skin == "6") {
		$zox_link_style_css = "
		a,
		a:visited,
		a:hover h2.zox-s-title1,
		a:hover h2.zox-s-title1-feat,
		a:hover h2.zox-s-title2,
		a:hover h2.zox-s-title3,
		.zox-post-body p a,
		h3.zox-post-cat a,
		.sp-template a,
		.sp-data-table a,
		span.zox-author-name a {
			color: #3061ff;
		}
		.pagination .current,
		.pagination a:hover {
			background: #3061ff;
			border: 1px solid #3061ff;
		}
		.zox-post-body p a {
			box-shadow: inset 0 -1px 0 0 #fff, inset 0 -2px 0 0 #3061ff;
			color: #000;
		}
		.zox-post-body p a:hover {
			color: #3061ff;
		}
		";
	} else if ($zox_skin == "7") {
		$zox_link_style_css = "
		a,
		a:visited,
		a:hover h2.zox-s-title1,
		a:hover h2.zox-s-title1-feat,
		a:hover h2.zox-s-title2,
		a:hover h2.zox-s-title3,
		.zox-post-body p a,
		h3.zox-post-cat a,
		.sp-template a,
		.sp-data-table a,
		span.zox-author-name a {
			color: #cc0e0e;
		}
		.pagination .current,
		.pagination a:hover {
			background: #cc0e0e;
			border: 1px solid #cc0e0e;
		}
		.zox-post-body p a {
			box-shadow: inset 0 -1px 0 0 #fff, inset 0 -2px 0 0 #cc0e0e;
			color: #000;
		}
		.zox-post-body p a:hover {
			color: #cc0e0e;
		}
		";
	} else if ($zox_skin == "8") {
		$zox_link_style_css = "
		a,
		a:visited,
		a:hover h2.zox-s-title1,
		a:hover h2.zox-s-title1-feat,
		a:hover h2.zox-s-title2,
		a:hover h2.zox-s-title3,
		.zox-post-body p a,
		h3.zox-post-cat a,
		.sp-template a,
		.sp-data-table a,
		span.zox-author-name a {
			color: #fe4020;
		}
		.pagination .current,
		.pagination a:hover {
			background: #fe4020;
			border: 1px solid #fe4020;
		}
		.zox-post-body p a {
			box-shadow: inset 0 -1px 0 0 #fff, inset 0 -2px 0 0 #fe4020;
			color: #000;
		}
		.zox-post-body p a:hover {
			color: #fe4020;
		}
		";
	} else if ($zox_skin == "9" || $zox_skin == "10") {
		$zox_link_style_css = "
		a,
		a:visited,
		a:hover h2.zox-s-title1,
		a:hover h2.zox-s-title1-feat,
		a:hover h2.zox-s-title2,
		a:hover h2.zox-s-title3,
		.zox-post-body p a,
		h3.zox-post-cat a,
		.sp-template a,
		.sp-data-table a,
		span.zox-author-name a {
			color: #004d9a;
		}
		.pagination .current,
		.pagination a:hover {
			background: #004d9a;
			border: 1px solid #004d9a;
		}
		.zox-post-body p a {
			box-shadow: inset 0 -1px 0 0 #fff, inset 0 -2px 0 0 #004d9a;
			color: #000;
		}
		.zox-post-body p a:hover {
			color: #004d9a;
		}
		";
	} else if ($zox_skin == "11" || $zox_skin == "13") {
		$zox_link_style_css = "
		a,
		a:visited,
		a:hover h2.zox-s-title1,
		a:hover h2.zox-s-title1-feat,
		a:hover h2.zox-s-title2,
		a:hover h2.zox-s-title3,
		.zox-post-body p a,
		h3.zox-post-cat a,
		.sp-template a,
		.sp-data-table a,
		span.zox-author-name a {
			color: #b89a6a;
		}
		.pagination .current,
		.pagination a:hover {
			background: #b89a6a;
			border: 1px solid #b89a6a;
		}
		.zox-post-body p a {
			box-shadow: inset 0 -1px 0 0 #fff, inset 0 -2px 0 0 #b89a6a;
			color: #000;
		}
		.zox-post-body p a:hover {
			color: #b89a6a;
		}
		";
	} else if ($zox_skin == "12" || $zox_skin == "15") {
		$zox_link_style_css = "
		a,
		a:visited,
		a:hover h2.zox-s-title1,
		a:hover h2.zox-s-title1-feat,
		a:hover h2.zox-s-title2,
		a:hover h2.zox-s-title3,
		.zox-post-body p a,
		h3.zox-post-cat a,
		.sp-template a,
		.sp-data-table a,
		span.zox-author-name a {
			color: #002fa7;
		}
		.pagination .current,
		.pagination a:hover {
			background: #002fa7;
			border: 1px solid #002fa7;
		}
		.zox-post-body p a {
			box-shadow: inset 0 -1px 0 0 #fff, inset 0 -2px 0 0 #002fa7;
			color: #000;
		}
		.zox-post-body p a:hover {
			color: #002fa7;
		}
		";
	} else if ($zox_skin == "14") {
		$zox_link_style_css = "
		a,
		a:visited,
		a:hover h2.zox-s-title1,
		a:hover h2.zox-s-title1-feat,
		a:hover h2.zox-s-title2,
		a:hover h2.zox-s-title3,
		.zox-post-body p a,
		h3.zox-post-cat a,
		.sp-template a,
		.sp-data-table a,
		span.zox-author-name a {
			color: #b80000;
		}
		.pagination .current,
		.pagination a:hover {
			background: #b80000;
			border: 1px solid #b80000;
		}
		.zox-post-body p a {
			box-shadow: inset 0 -1px 0 0 #fff, inset 0 -2px 0 0 #b80000;
			color: #000;
		}
		.zox-post-body p a:hover {
			color: #b80000;
		}
		";
	} else if ($zox_skin == "16") {
		$zox_link_style_css = "
		a,
		a:visited,
		a:hover h2.zox-s-title1,
		a:hover h2.zox-s-title1-feat,
		a:hover h2.zox-s-title2,
		a:hover h2.zox-s-title3,
		.zox-post-body p a,
		h3.zox-post-cat a,
		.sp-template a,
		.sp-data-table a,
		span.zox-author-name a {
			color: #ff4422;
		}
		.pagination .current,
		.pagination a:hover {
			background: #ff4422;
			border: 1px solid #ff4422;
		}
		.zox-post-body p a {
			box-shadow: inset 0 -1px 0 0 #fff, inset 0 -2px 0 0 #ff4422;
			color: #000;
		}
		.zox-post-body p a:hover {
			color: #ff4422;
		}
		";
	} else {
		if ($zox_link_style == "2") {
			$zox_link_style_css = "
			.zox-post-body p a {
				box-shadow: inset 0 -1px 0 0 #fff, inset 0 -2px 0 0 $zox_link_color;
				color: #000;
			}
			.zox-post-body p a:hover {
				color: $zox_link_color;
			}
			";
		} else {
			$zox_link_style_css = "
			.zox-post-body p a {
				color: $zox_link_color;
			}
			.zox-post-body p a:hover {
				color: $zox_link_color;
				box-shadow: inset 0 -1px 0 0 #fff, inset 0 -2px 0 0 $zox_link_color;
			}
			";
		}
	}


$zox_rtl = get_option('zox_rtl'); if ($zox_rtl == "true") {
	$zox_skin = get_option('zox_skin');
	$zox_headm_style = get_option('zox_headm_style');
	$zox_headm_color = get_option('zox_headm_color');
	if ($zox_skin == "2" || $zox_skin == "13") {
		$zox_headm_style_css = "
		span.zox-widget-main-title {
			font-size: 3rem;
			font-style: italic;
		}
		@media screen and (max-width: 599px) {
			span.zox-widget-main-title {
				font-size: 2.125rem;
			}
		}
		";
	} else if ($zox_skin == "3") {
		$zox_headm_style_css = "
		span.zox-widget-main-title {
			color: #999;
			font-family: 'Roboto', sans-serif;
			font-size: 3rem;
			font-weight: 300;
			letter-spacing: .05em;
			text-transform: uppercase;
		}
		@media screen and (max-width: 599px) {
			span.zox-widget-main-title {
				font-size: 2.125rem;
			}
		}
		";
	} else if ($zox_skin == "4") {
		$zox_headm_style_css = "
		span.zox-widget-main-title {
			color: #000;
			font-family: 'Montserrat', sans-serif;
			font-size: 2rem;
			font-weight: 900;
			letter-spacing: .05em;
			text-transform: uppercase;
		}
		@media screen and (max-width: 599px) {
			span.zox-widget-main-title {
				font-size: 1.125rem;
			}
		}
		";
	} else if ($zox_skin == "5") {
		$zox_headm_style_css = "
		h4.zox-widget-main-title {
			text-align: right;
		}
		span.zox-widget-main-title {
			color: #6a0432;
			font-family: 'Heebo', sans-serif;
			font-size: 1.5rem;
			font-weight: 900;
			letter-spacing: .1em;
			text-transform: uppercase;
		}
		@media screen and (max-width: 599px) {
			span.zox-widget-main-title {
				font-size: 1.125rem;
			}
		}
		";
	} else if ($zox_skin == "6") {
		$zox_headm_style_css = "
		.zox-widget-main-head {
			margin: 0 0 15px;
		}
		h4.zox-widget-main-title {
			border-top: 1px solid #ccc;
			margin: 0;
			position: relative;
			text-align: right;
		}
		.zox-net2 h4.zox-widget-main-title:after {
			content: '';
			background: #3061ff;
			position: absolute;
				left: 0;
				top: -1px;
			height: 8px;
			width: 100px;
		}
		span.zox-widget-main-title {
			color: #111;
			float: left;
			font-family: 'Barlow Semi Condensed', sans-serif;
			font-size: 1.375rem;
			font-weight: 800;
			padding: 25px 0 0;
			text-transform: capitalize;
			width: 100%;
		}
		";
	} else if ($zox_skin == "7") {
		$zox_headm_style_css = "
		.zox-widget-main-head {
			margin: 0 0 15px;
		}
		h4.zox-widget-main-title {
			border-top: 1px solid #ccc;
			position: relative;
			text-align: center;
		}
		span.zox-widget-main-title {
			background: #fff;
			border: 1px solid #ddd;
			color: #cc0e0e;
			display: inline-block;
			font-family: 'Oswald', sans-serif;
			font-size: 18px;
			font-weight: 700;
			letter-spacing: .05em;
			padding: 5px 10px 7px;
			position: relative;
				top: -16px;
			text-transform: uppercase;
		}
		.zox_feat_widget .zox-widget-main-head {
			margin: 0;
		}
		.zox_feat_widget h4.zox-widget-main-title {
			height: 1px;
			z-index: 10;
		}
		";
	} else if ($zox_skin == "8") {
		$zox_headm_style_css = "
		.zox-widget-main-head {
			margin: 0 0 20px;
		}
		h4.zox-widget-main-title {
			border-bottom: 1px solid #ddd;
			position: relative;
			text-align: right;
		}
		span.zox-widget-main-title {
			color: #111;
			border-bottom: 3px solid #111;
			display: inline-block;
			font-family: 'Rajdhani', sans-serif;
			font-size: 1.75rem;
			font-weight: 700;
			padding: 0 0 5px;
			position: relative;
				bottom: -1px;
			text-transform: uppercase;
		}
		";
	} else if ($zox_skin == "9") {
		$zox_headm_style_css = "
		span.zox-widget-main-title {
			font-family: 'Nunito Sans', sans-serif;
			font-size: 2.5rem;
			font-weight: 700;
			letter-spacing: .2em;
			text-transform: uppercase;
		}
		";
	} else if ($zox_skin == "10") {
		$zox_headm_style_css = "
		.zox-widget-main-head {
			margin: 0 0 15px;
		}
		h4.zox-widget-main-title {
			text-align: right;
		}
		span.zox-widget-main-title {
			font-family: 'Poppins', sans-serif;
			font-size: 1rem;
			font-weight: 700;
			letter-spacing: .02em;
			text-transform: uppercase;
		}
		";
	} else if ($zox_skin == "11") {
		$zox_headm_style_css = "
		h4.zox-widget-main-title {
			border-top: 1px solid #000;
			text-align: right;
		}
		span.zox-widget-main-title {
			border-top: 10px solid #000;
			color: #000;
			display: inline-block;
			font-family: 'Frank Ruhl Libre', sans-serif;
			font-size: 4rem;
			font-weight: 400;
			margin: -1px 0 0;
			padding: 5px 0 0;
		}
		@media screen and (max-width: 599px) {
			span.zox-widget-main-title {
				border-top: 4px solid #000;
				font-size: 1.25rem;
			}
		}
		";
	} else if ($zox_skin == "12") {
		$zox_headm_style_css = "
		.zox-widget-main-head {
			margin: 0 0 50px;
		}
		span.zox-widget-main-title {
			color: #333;
			font-family: 'Frank Ruhl Libre', sans-serif;
			font-size: 2rem;
			font-weight: 700;
			position: relative;
		}
		span.zox-widget-main-title:after {
			content: '';
			background: #5188d9;
			margin: 0 0 0 -50px;
			position: absolute;
				bottom: -15px;
				left: 50%;
			width: 100px;
			height: 5px;
		}
		@media screen and (max-width: 1023px) and (min-width: 600px) {
			.zox-widget-main-head {
				margin: 0 0 40px !important;
			}
		}
		@media screen and (max-width: 599px) {
			.zox-widget-main-head {
				margin: 0 0 40px !important;
			}
			span.zox-widget-main-title {
				font-size: 1.25rem;
			}
		}
		";
	} else if ($zox_skin == "14") {
		$zox_headm_style_css = "
		h4.zox-widget-main-title {
			text-align: right;
		}
		span.zox-widget-main-title {
			color: #000;
			font-family: 'Poppins', sans-serif;
			font-size: 1.5rem;
			font-weight: 700;
			letter-spacing: .1em;
			text-transform: uppercase;
		}
		";
	} else if ($zox_skin == "15") {
		$zox_headm_style_css = "
		.zox-widget-main-head {
			margin: 0 0 20px;
		}
		.zox-tech2 h4.zox-widget-main-title {
			overflow: hidden;
			position: relative;
			text-align: right;
			width: 100%;
		}
		.zox-tech2 span.zox-widget-main-title {
			color: #111;
			font-family: 'Poppins', sans-serif;
			font-size: 1rem;
			font-weight: 700;
			letter-spacing: .1em;
			text-transform: uppercase;
		}
		.zox-tech2 span.zox-widget-main-title:after {
			content:'';
			background: #ccc;
			margin: -1px 0 0 15px;
			position: absolute;
				top: 50%;
			width: 100%;
			height: 1px;
		}
		";
	} else if ($zox_skin == "16") {
		$zox_headm_style_css = "
		.zox-widget-main-head {
			margin: 0 0 20px;
		}
		h4.zox-widget-main-title {
			text-align: right;
		}
		span.zox-widget-main-title {
			color: #ff4422;
			font-family: 'Poppins', sans-serif;
			font-size: 1.625rem;
			font-weight: 700;
			letter-spacing: 0;
			text-transform: capitalize;
		}
		";
	} else {
		if ($zox_headm_style == "1") {
			$zox_headm_style_css = "
			span.zox-widget-main-title {
				font-size: 3rem;
				font-style: italic;
			}
			@media screen and (max-width: 599px) {
				.zox-widget-main-head {
					margin: 0 0 15px;
				}
				span.zox-widget-main-title {
					font-size: 2.125rem;
				}
			}
			";
		} else if ($zox_headm_style == "2") {
			$zox_headm_style_css = "
			span.zox-widget-main-title {
				font-size: 4rem;
				letter-spacing: .05em;
			}
			@media screen and (max-width: 599px) {
				.zox-widget-main-head {
					margin: 0 0 15px;
				}
				span.zox-widget-main-title {
					font-size: 2.125rem;
				}
			}
			";
		} else if ($zox_headm_style == "3") {
			$zox_headm_style_css = "
			span.zox-widget-main-title {
				font-size: 1.5rem;
				letter-spacing: .05em;
			}
			";
		} else if ($zox_headm_style == "4") {
			$zox_headm_style_css = "
			h4.zox-widget-main-title {
				text-align: right;
			}
			span.zox-widget-main-title {
				font-size: 1.5rem;
				letter-spacing: .1em;
			}
			";
		} else if ($zox_headm_style == "5") {
			$zox_headm_style_css = "
			.zox-widget-main-head {
				margin: 0 0 15px;
				}
			h4.zox-widget-main-title {
				border-top: 1px solid #ccc;
				margin: 0;
				position: relative;
				text-align: right;
			}
			.zox-net2 h4.zox-widget-main-title:after {
				content: '';
				background: $zox_headm_color;
				position: absolute;
					left: 0;
					top: -1px;
				height: 8px;
				width: 100px;
			}
			span.zox-widget-main-title {
				color: #111;
				float: right;
				font-size: 1.375rem;
				padding: 25px 0 0;
				width: 100%;
			}
			";
		} else if ($zox_headm_style == "6") {
			$zox_headm_style_css = "
			.zox-widget-main-head {
				margin: 0 0 15px;
			}
			h4.zox-widget-main-title {
				border-top: 1px solid #ccc;
				position: relative;
				text-align: center;
			}
			span.zox-widget-main-title {
				background: #fff;
				border: 1px solid #ddd;
				color: $zox_headm_color;
				display: inline-block;
				font-size: 18px;
				letter-spacing: .05em;
				padding: 5px 10px 7px;
				position: relative;
					top: -16px;
				text-transform: uppercase;
			}
			.zox_feat_widget .zox-widget-main-head {
				margin: 0;
			}
			.zox_feat_widget h4.zox-widget-main-title {
				height: 1px;
				z-index: 10;
			}
			";
		} else if ($zox_headm_style == "7") {
			$zox_headm_style_css = "
			.zox-widget-main-head {
				margin: 0 0 20px;
			}
			h4.zox-widget-main-title {
				border-bottom: 1px solid #ddd;
				position: relative;
				text-align: right;
			}
			span.zox-widget-main-title {
				color: $zox_headm_color;
				border-bottom: 3px solid $zox_headm_color;
				display: inline-block;
				font-size: 1.75rem;
				padding: 0 0 5px;
				position: relative;
					bottom: -1px;
				text-transform: uppercase;
			}
			";
		} else if ($zox_headm_style == "8") {
			$zox_headm_style_css = "
			span.zox-widget-main-title {
				font-size: 2.5rem;
				letter-spacing: .2em;
				text-transform: uppercase;
			}
			";
		} else if ($zox_headm_style == "9") {
			$zox_headm_style_css = "
			.zox-widget-main-head {
				margin: 0 0 15px;
			}
			h4.zox-widget-main-title {
				text-align: right;
			}
			span.zox-widget-main-title {
				font-size: 1rem;
				letter-spacing: .02em;
				text-transform: uppercase;
			}
			";
		} else if ($zox_headm_style == "10") {
			$zox_headm_style_css = "
			h4.zox-widget-main-title {
				border-top: 1px solid #000;
				text-align: right;
			}
			span.zox-widget-main-title {
				border-top: 10px solid $zox_headm_color;
				color: $zox_headm_color;
				display: inline-block;
				font-size: 4rem;
				margin: -1px 0 0;
				padding: 5px 0 0;
			}
			@media screen and (max-width: 599px) {
				span.zox-widget-main-title {
					font-size: 1.125rem;
				}
			}
			";
		} else if ($zox_headm_style == "11") {
			$zox_headm_style_css = "
			.zox-widget-main-head {
				margin: 0 0 50px;
			}
			span.zox-widget-main-title {
				color: #333;
				font-size: 2rem;
				position: relative;
			}
			span.zox-widget-main-title:after {
				content: '';
				background: $zox_headm_color;
				margin: 0 0 0 -50px;
				position: absolute;
					bottom: -15px;
					right: 50%;
					left: auto;
				width: 100px;
				height: 5px;
			}
			@media screen and (max-width: 1023px) and (min-width: 600px) {
				.zox-widget-main-head {
					margin: 0 0 40px !important;
				}
			}
			@media screen and (max-width: 599px) {
				.zox-widget-main-head {
					margin: 0 0 40px !important;
				}
				span.zox-widget-main-title {
					font-size: 1.25rem;
				}
			}
			";
		} else if ($zox_headm_style == "12") {
			$zox_headm_style_css = "
			.zox-widget-main-head {
				margin: 0 0 20px;
			}
			.zox-tech2 h4.zox-widget-main-title {
				overflow: hidden;
				position: relative;
				text-align: right;
				width: 100%;
			}
			.zox-tech2 span.zox-widget-main-title {
				font-size: 1rem;
				letter-spacing: .1em;
				text-transform: uppercase;
			}
			.zox-tech2 span.zox-widget-main-title:after {
				content:'';
				background: #ccc;
				margin: -1px 15px 0 0;
				position: absolute;
					top: 50%;
				width: 100%;
				height: 1px;
			}
			";
		} else {
			$zox_headm_style_css = "
				span.zox-widget-main-title {
					font-size: 3rem;
					font-style: italic;
				}
				@media screen and (max-width: 599px) {
					span.zox-widget-main-title {
						font-size: 2.125rem;
					}
				}
				";
		}
	}
} else {
	$zox_skin = get_option('zox_skin');
	$zox_headm_style = get_option('zox_headm_style');
	$zox_headm_color = get_option('zox_headm_color');
	if ($zox_skin == "2" || $zox_skin == "13") {
		$zox_headm_style_css = "
		span.zox-widget-main-title {
			font-size: 3rem;
			font-style: italic;
		}
		@media screen and (max-width: 599px) {
			span.zox-widget-main-title {
				font-size: 2.125rem;
			}
		}
		";
	} else if ($zox_skin == "3") {
		$zox_headm_style_css = "
		span.zox-widget-main-title {
			color: #999;
			font-family: 'Roboto', sans-serif;
			font-size: 3rem;
			font-weight: 300;
			letter-spacing: .05em;
			text-transform: uppercase;
		}
		@media screen and (max-width: 599px) {
			span.zox-widget-main-title {
				font-size: 2.125rem;
			}
		}
		";
	} else if ($zox_skin == "4") {
		$zox_headm_style_css = "
		span.zox-widget-main-title {
			color: #000;
			font-family: 'Montserrat', sans-serif;
			font-size: 2rem;
			font-weight: 900;
			letter-spacing: .05em;
			text-transform: uppercase;
		}
		@media screen and (max-width: 599px) {
			span.zox-widget-main-title {
				font-size: 1.125rem;
			}
		}
		";
	} else if ($zox_skin == "5") {
		$zox_headm_style_css = "
		h4.zox-widget-main-title {
			text-align: left;
		}
		span.zox-widget-main-title {
			color: #6a0432;
			font-family: 'Heebo', sans-serif;
			font-size: 1.5rem;
			font-weight: 900;
			letter-spacing: .1em;
			text-transform: uppercase;
		}
		@media screen and (max-width: 599px) {
			span.zox-widget-main-title {
				font-size: 1.125rem;
			}
		}
		";
	} else if ($zox_skin == "6") {
		$zox_headm_style_css = "
		.zox-widget-main-head {
			margin: 0 0 15px;
		}
		h4.zox-widget-main-title {
			border-top: 1px solid #ccc;
			margin: 0;
			position: relative;
			text-align: left;
		}
		.zox-net2 h4.zox-widget-main-title:after {
			content: '';
			background: #3061ff;
			position: absolute;
				left: 0;
				top: -1px;
			height: 8px;
			width: 100px;
		}
		span.zox-widget-main-title {
			color: #111;
			float: left;
			font-family: 'Barlow Semi Condensed', sans-serif;
			font-size: 1.375rem;
			font-weight: 800;
			padding: 25px 0 0;
			text-transform: capitalize;
			width: 100%;
		}
		";
	} else if ($zox_skin == "7") {
		$zox_headm_style_css = "
		.zox-widget-main-head {
			margin: 0 0 15px;
		}
		h4.zox-widget-main-title {
			border-top: 1px solid #ccc;
			position: relative;
			text-align: center;
		}
		span.zox-widget-main-title {
			background: #fff;
			border: 1px solid #ddd;
			color: #cc0e0e;
			display: inline-block;
			font-family: 'Oswald', sans-serif;
			font-size: 18px;
			font-weight: 700;
			letter-spacing: .05em;
			padding: 5px 10px 7px;
			position: relative;
				top: -16px;
			text-transform: uppercase;
		}
		.zox_feat_widget .zox-widget-main-head {
			margin: 0;
		}
		.zox_feat_widget h4.zox-widget-main-title {
			height: 1px;
			z-index: 10;
		}
		";
	} else if ($zox_skin == "8") {
		$zox_headm_style_css = "
		.zox-widget-main-head {
			margin: 0 0 20px;
		}
		h4.zox-widget-main-title {
			border-bottom: 1px solid #ddd;
			position: relative;
			text-align: left;
		}
		span.zox-widget-main-title {
			color: #111;
			border-bottom: 3px solid #111;
			display: inline-block;
			font-family: 'Rajdhani', sans-serif;
			font-size: 1.75rem;
			font-weight: 700;
			padding: 0 0 5px;
			position: relative;
				bottom: -1px;
			text-transform: uppercase;
		}
		";
	} else if ($zox_skin == "9") {
		$zox_headm_style_css = "
		span.zox-widget-main-title {
			font-family: 'Nunito Sans', sans-serif;
			font-size: 2.5rem;
			font-weight: 700;
			letter-spacing: .2em;
			text-transform: uppercase;
		}
		";
	} else if ($zox_skin == "10") {
		$zox_headm_style_css = "
		.zox-widget-main-head {
			margin: 0 0 15px;
		}
		h4.zox-widget-main-title {
			text-align: left;
		}
		span.zox-widget-main-title {
			font-family: 'Poppins', sans-serif;
			font-size: 1rem;
			font-weight: 700;
			letter-spacing: .02em;
			text-transform: uppercase;
		}
		";
	} else if ($zox_skin == "11") {
		$zox_headm_style_css = "
		h4.zox-widget-main-title {
			border-top: 1px solid #000;
			text-align: left;
		}
		span.zox-widget-main-title {
			border-top: 10px solid #000;
			color: #000;
			display: inline-block;
			font-family: 'Frank Ruhl Libre', sans-serif;
			font-size: 4rem;
			font-weight: 400;
			margin: -1px 0 0;
			padding: 5px 0 0;
		}
		@media screen and (max-width: 599px) {
			span.zox-widget-main-title {
				border-top: 4px solid #000;
				font-size: 1.25rem;
			}
		}
		";
	} else if ($zox_skin == "12") {
		$zox_headm_style_css = "
		.zox-widget-main-head {
			margin: 0 0 50px;
		}
		span.zox-widget-main-title {
			color: #333;
			font-family: 'Frank Ruhl Libre', sans-serif;
			font-size: 2rem;
			font-weight: 700;
			position: relative;
		}
		span.zox-widget-main-title:after {
			content: '';
			background: #5188d9;
			margin: 0 0 0 -50px;
			position: absolute;
				bottom: -15px;
				left: 50%;
			width: 100px;
			height: 5px;
		}
		@media screen and (max-width: 1023px) and (min-width: 600px) {
			.zox-widget-main-head {
				margin: 0 0 40px !important;
			}
		}
		@media screen and (max-width: 599px) {
			.zox-widget-main-head {
				margin: 0 0 40px !important;
			}
			span.zox-widget-main-title {
				font-size: 1.25rem;
			}
		}
		";
	} else if ($zox_skin == "14") {
		$zox_headm_style_css = "
		h4.zox-widget-main-title {
			text-align: left;
		}
		span.zox-widget-main-title {
			color: #000;
			font-family: 'Poppins', sans-serif;
			font-size: 1.5rem;
			font-weight: 700;
			letter-spacing: .1em;
			text-transform: uppercase;
		}
		";
	} else if ($zox_skin == "15") {
		$zox_headm_style_css = "
		.zox-widget-main-head {
			margin: 0 0 20px;
		}
		.zox-tech2 h4.zox-widget-main-title {
			overflow: hidden;
			position: relative;
			text-align: left;
			width: 100%;
		}
		.zox-tech2 span.zox-widget-main-title {
			color: #111;
			font-family: 'Poppins', sans-serif;
			font-size: 1rem;
			font-weight: 700;
			letter-spacing: .1em;
			text-transform: uppercase;
		}
		.zox-tech2 span.zox-widget-main-title:after {
			content:'';
			background: #ccc;
			margin: -1px 0 0 15px;
			position: absolute;
				top: 50%;
			width: 100%;
			height: 1px;
		}
		";
	} else if ($zox_skin == "16") {
		$zox_headm_style_css = "
		.zox-widget-main-head {
			margin: 0 0 20px;
		}
		h4.zox-widget-main-title {
			text-align: left;
		}
		span.zox-widget-main-title {
			color: #ff4422;
			font-family: 'Poppins', sans-serif;
			font-size: 1.625rem;
			font-weight: 700;
			letter-spacing: 0;
			text-transform: capitalize;
		}
		";
	} else {
		if ($zox_headm_style == "1") {
			$zox_headm_style_css = "
			span.zox-widget-main-title {
				font-size: 3rem;
				font-style: italic;
			}
			@media screen and (max-width: 599px) {
				.zox-widget-main-head {
					margin: 0 0 15px;
				}
				span.zox-widget-main-title {
					font-size: 2.125rem;
				}
			}
			";
		} else if ($zox_headm_style == "2") {
			$zox_headm_style_css = "
			span.zox-widget-main-title {
				font-size: 4rem;
				letter-spacing: .05em;
			}
			@media screen and (max-width: 599px) {
				.zox-widget-main-head {
					margin: 0 0 15px;
				}
				span.zox-widget-main-title {
					font-size: 2.125rem;
				}
			}
			";
		} else if ($zox_headm_style == "3") {
			$zox_headm_style_css = "
			span.zox-widget-main-title {
				font-size: 1.5rem;
				letter-spacing: .05em;
			}
			";
		} else if ($zox_headm_style == "4") {
			$zox_headm_style_css = "
			h4.zox-widget-main-title {
				text-align: left;
			}
			span.zox-widget-main-title {
				font-size: 1.5rem;
				letter-spacing: .1em;
			}
			";
		} else if ($zox_headm_style == "5") {
			$zox_headm_style_css = "
			.zox-widget-main-head {
				margin: 0 0 15px;
				}
			h4.zox-widget-main-title {
				border-top: 1px solid #ccc;
				margin: 0;
				position: relative;
				text-align: left;
			}
			.zox-net2 h4.zox-widget-main-title:after {
				content: '';
				background: $zox_headm_color;
				position: absolute;
					left: 0;
					top: -1px;
				height: 8px;
				width: 100px;
			}
			span.zox-widget-main-title {
				color: #111;
				float: left;
				font-size: 1.375rem;
				padding: 25px 0 0;
				width: 100%;
			}
			";
		} else if ($zox_headm_style == "6") {
			$zox_headm_style_css = "
			.zox-widget-main-head {
				margin: 0 0 15px;
			}
			h4.zox-widget-main-title {
				border-top: 1px solid #ccc;
				position: relative;
				text-align: center;
			}
			span.zox-widget-main-title {
				background: #fff;
				border: 1px solid #ddd;
				color: $zox_headm_color;
				display: inline-block;
				font-size: 18px;
				letter-spacing: .05em;
				padding: 5px 10px 7px;
				position: relative;
					top: -16px;
				text-transform: uppercase;
			}
			.zox_feat_widget .zox-widget-main-head {
				margin: 0;
			}
			.zox_feat_widget h4.zox-widget-main-title {
				height: 1px;
				z-index: 10;
			}
			";
		} else if ($zox_headm_style == "7") {
			$zox_headm_style_css = "
			.zox-widget-main-head {
				margin: 0 0 20px;
			}
			h4.zox-widget-main-title {
				border-bottom: 1px solid #ddd;
				position: relative;
				text-align: left;
			}
			span.zox-widget-main-title {
				color: $zox_headm_color;
				border-bottom: 3px solid $zox_headm_color;
				display: inline-block;
				font-size: 1.75rem;
				padding: 0 0 5px;
				position: relative;
					bottom: -1px;
				text-transform: uppercase;
			}
			";
		} else if ($zox_headm_style == "8") {
			$zox_headm_style_css = "
			span.zox-widget-main-title {
				font-size: 2.5rem;
				letter-spacing: .2em;
				text-transform: uppercase;
			}
			";
		} else if ($zox_headm_style == "9") {
			$zox_headm_style_css = "
			.zox-widget-main-head {
				margin: 0 0 15px;
			}
			h4.zox-widget-main-title {
				text-align: left;
			}
			span.zox-widget-main-title {
				font-size: 1rem;
				letter-spacing: .02em;
				text-transform: uppercase;
			}
			";
		} else if ($zox_headm_style == "10") {
			$zox_headm_style_css = "
			h4.zox-widget-main-title {
				border-top: 1px solid #000;
				text-align: left;
			}
			span.zox-widget-main-title {
				border-top: 10px solid $zox_headm_color;
				color: $zox_headm_color;
				display: inline-block;
				font-size: 4rem;
				margin: -1px 0 0;
				padding: 5px 0 0;
			}
			@media screen and (max-width: 599px) {
				span.zox-widget-main-title {
					font-size: 1.125rem;
				}
			}
			";
		} else if ($zox_headm_style == "11") {
			$zox_headm_style_css = "
			.zox-widget-main-head {
				margin: 0 0 50px;
			}
			span.zox-widget-main-title {
				color: #333;
				font-size: 2rem;
				position: relative;
			}
			span.zox-widget-main-title:after {
				content: '';
				background: $zox_headm_color;
				margin: 0 0 0 -50px;
				position: absolute;
					bottom: -15px;
					left: 50%;
				width: 100px;
				height: 5px;
			}
			@media screen and (max-width: 1023px) and (min-width: 600px) {
				.zox-widget-main-head {
					margin: 0 0 40px !important;
				}
			}
			@media screen and (max-width: 599px) {
				.zox-widget-main-head {
					margin: 0 0 40px !important;
				}
				span.zox-widget-main-title {
					font-size: 1.25rem;
				}
			}
			";
		} else if ($zox_headm_style == "12") {
			$zox_headm_style_css = "
			.zox-widget-main-head {
				margin: 0 0 20px;
			}
			.zox-tech2 h4.zox-widget-main-title {
				overflow: hidden;
				position: relative;
				text-align: left;
				width: 100%;
			}
			.zox-tech2 span.zox-widget-main-title {
				font-size: 1rem;
				letter-spacing: .1em;
				text-transform: uppercase;
			}
			.zox-tech2 span.zox-widget-main-title:after {
				content:'';
				background: #ccc;
				margin: -1px 0 0 15px;
				position: absolute;
					top: 50%;
				width: 100%;
				height: 1px;
			}
			";
		} else {
			$zox_headm_style_css = "
				span.zox-widget-main-title {
					font-size: 3rem;
					font-style: italic;
				}
				@media screen and (max-width: 599px) {
					span.zox-widget-main-title {
						font-size: 2.125rem;
					}
				}
				";
		}
	}
}

$zox_rtl = get_option('zox_rtl'); if ($zox_rtl == "true") {
	$zox_skin = get_option('zox_skin');
	$zox_heads_color = get_option('zox_heads_color');
	$zox_heads_style = get_option('zox_heads_style');
	if ($zox_skin == "2" || $zox_skin == "13") {
		$zox_heads_style_css = "
		span.zox-widget-side-title {
			font-size: 2.125rem;
			font-style: italic;
		}
		#zox-side-wrap .zox-widget-side-head a.rsswidget {
			font-weight: 400;
		}
			";
	} else if ($zox_skin == "3") {
		$zox_heads_style_css = "
		span.zox-widget-side-title {
			color: #111;
			font-family: 'Roboto', sans-serif;
			font-size: 2.125rem;
			font-weight: 900;
			letter-spacing: .05em;
			text-transform: uppercase;
		}
			";
	} else if ($zox_skin == "4") {
		$zox_heads_style_css = "
		h4.zox-widget-side-title {
			border-bottom: 2px solid #ec2b8c;
			text-align: right;
		}
		span.zox-widget-side-title {
			background: #ec2b8c;
			color: #fff;
			font-family: 'Montserrat', sans-serif;
			font-size: .875rem;
			font-weight: 800;
			letter-spacing: -.02em;
			padding: 5px 10px 3px 10px;
			text-transform: uppercase;
		}
		#zox-woo-side-wrap span.zox-widget-side-title {
			font-size: .875rem;
		}
			";
	} else if ($zox_skin == "5") {
		$zox_heads_style_css = "
		h4.zox-widget-side-title {
			text-align: right;
		}
		span.zox-widget-side-title {
			color: #6a0432;
			font-family: 'Heebo', sans-serif;
			font-size: 1.125rem;
			font-weight: 900;
			letter-spacing: .1em;
			text-transform: uppercase;
		}
			";
	} else if ($zox_skin == "6") {
		$zox_heads_style_css = "
		.zox-widget-side-head {
			margin: 0 0 15px;
		}
		h4.zox-widget-side-title {
			border-top: 1px solid #ccc;
			margin: 0;
			position: relative;
			text-align: right;
		}
		.zox-net2 h4.zox-widget-side-title:after {
			content: '';
			background: #3061ff;
			position: absolute;
				right: 0;
				left: auto;
				top: -1px;
			height: 5px;
			width: 100px;
		}
		span.zox-widget-side-title {
			color: #111;
			float: left;
			font-family: 'Barlow Semi Condensed', sans-serif;
			font-size: 1.125rem;
			font-weight: 800;
			padding: 20px 0 0;
			text-transform: capitalize;
		}
			";
	} else if ($zox_skin == "7") {
		$zox_heads_style_css = "
		.zox-widget-side-head {
			margin: 0 0 15px;
		}
		h4.zox-widget-side-title {
			border-top: 1px solid #ccc;
			position: relative;
			text-align: center;
		}
		span.zox-widget-side-title {
			background: #fff;
			border: 1px solid #ddd;
			color: #cc0e0e;
			display: inline-block;
			font-family: 'Oswald', sans-serif;
			font-size: 16px;
			font-weight: 700;
			letter-spacing: .05em;
			padding: 4px 8px 5px;
			position: relative;
				top: -13px;
			text-transform: uppercase;
		}
		.zox_feat_widget .zox-widget-side-head {
			margin: 0;
		}
		.zox_feat_widget h4.zox-widget-side-title {
			height: 1px;
			z-index: 10;
		}
		#zox-woo-side-wrap h4.zox-widget-side-title {
			text-align: center;
		}
		#zox-woo-side-wrap span.zox-widget-side-title {
			font-size: 14px;
		}
			";
	} else if ($zox_skin == "8") {
		$zox_heads_style_css = "
		.zox-widget-side-head {
			margin: 0 0 20px;
		}
		h4.zox-widget-side-title {
			border-bottom: 1px solid #ddd;
			position: relative;
			text-align: right;
		}
		span.zox-widget-side-title {
			color: #111;
			border-bottom: 3px solid #111;
			display: inline-block;
			font-family: 'Rajdhani', sans-serif;
			font-size: 1.125rem;
			font-weight: 700;
			padding: 0 0 5px;
			position: relative;
				bottom: -1px;
			text-transform: uppercase;
		}
		#zox-woo-side-wrap span.zox-widget-side-title {
			font-size: 1rem;
		}
			";
	} else if ($zox_skin == "9") {
		$zox_heads_style_css = "
		span.zox-widget-side-title {
			font-family: 'Nunito Sans', sans-serif;
			font-size: 1.125rem;
			font-weight: 700;
			letter-spacing: .2em;
			text-transform: uppercase;
		}
		#zox-woo-side-wrap span.zox-widget-side-title {
			font-size: .875rem;
		}
		";
	} else if ($zox_skin == "10") {
		$zox_heads_style_css = "
		.zox-widget-side-head {
			margin: 0 0 15px;
		}
		h4.zox-widget-side-title {
			text-align: right;
		}
		span.zox-widget-side-title {
			font-family: 'Poppins', sans-serif;
			font-size: .875rem;
			font-weight: 700;
			letter-spacing: .02em;
			text-transform: uppercase;
		}
		";
	} else if ($zox_skin == "11") {
		$zox_heads_style_css = "
		.zox-fash1 h4.zox-widget-side-title {
			border-top: 1px solid #000;
			text-align: right;
		}
		.zox-fash1 span.zox-widget-side-title {
			border-top: 4px solid #000;
			color: #000;
			display: inline-block;
			font-family: 'Frank Ruhl Libre', sans-serif;
			font-size: 1.25rem;
			font-weight: 400;
			margin: -1px 0 0;
			padding: 5px 0 0;
		}
		";
	} else if ($zox_skin == "12") {
		$zox_heads_style_css = "
		.zox-widget-side-head {
			margin: 0 0 40px;
		}
		span.zox-widget-side-title {
			color: #333;
			font-family: 'Frank Ruhl Libre', sans-serif;
			font-size: 1.125rem;
			font-weight: 700;
			position: relative;
		}
		span.zox-widget-side-title:after {
			content: '';
			background: #5188d9;
			margin: 0 0 0 -25px;
			position: absolute;
				bottom: -10px;
				left: 50%;
			width: 50px;
			height: 3px;
		}
		#zox-woo-side-wrap .zox-widget-side-head {
			margin: 0 0 35px;
		}
		#zox-woo-side-wrap span.zox-widget-side-title:after {
			right: 0;
			left: auto;
			margin: 0;
		}
			";
	} else if ($zox_skin == "14") {
		$zox_heads_style_css = "
		h4.zox-widget-side-title {
			text-align: right;
		}
		span.zox-widget-side-title {
			color: #000;
			font-family: 'Poppins', sans-serif;
			font-size: 1.125rem;
			font-weight: 700;
			letter-spacing: .1em;
			text-transform: uppercase;
		}
		#zox-woo-side-wrap span.zox-widget-side-title {
			font-size: .875rem;
		}
		";
	} else if ($zox_skin == "15") {
		$zox_heads_style_css = "
		.zox-widget-side-head {
			margin: 0 0 15px;
		}
		.zox-tech2 h4.zox-widget-side-title {
			overflow: hidden;
			position: relative;
			text-align: right;
			width: 100%;
		}
		.zox-tech2 span.zox-widget-side-title {
			color: #111;
			font-family: 'Poppins', sans-serif;
			font-size: .875rem;
			font-weight: 700;
			letter-spacing: .1em;
			text-transform: uppercase;
		}
		.zox-tech2 span.zox-widget-side-title:after {
			content:'';
			background: #ccc;
			margin: -1px 0 0 15px;
			position: absolute;
				top: 50%;
			width: 100%;
			height: 1px;
		}
		#zox-woo-side-wrap span.zox-widget-side-title {
			font-size: .75rem;
		}
		";
	} else if ($zox_skin == "16") {
		$zox_heads_style_css = "
		.zox-widget-side-head {
			margin: 0 0 15px;
		}
		h4.zox-widget-side-title {
			text-align: right;
		}
		span.zox-widget-side-title {
			color: #ff4422;
			font-family: 'Poppins', sans-serif;
			font-size: 1.125rem;
			font-weight: 700;
			letter-spacing: 0;
			text-transform: capitalize;
		}
		#zox-woo-side-wrap span.zox-widget-side-title {
			font-size: 1rem;
		}
		";
	} else {
		if ($zox_heads_style == "1") {
			$zox_heads_style_css = "
			span.zox-widget-side-title {
				font-size: 2.125rem;
				font-style: italic;
			}
			#zox-side-wrap .zox-widget-side-head a.rsswidget {
				font-weight: 400;
			}
			";
		} else if ($zox_heads_style == "2") {
			$zox_heads_style_css = "
			span.zox-widget-side-title {
				font-size: 2.125rem;
				letter-spacing: .05em;
			}
			";
		} else if ($zox_heads_style == "3") {
			$zox_heads_style_css = "
			h4.zox-widget-side-title {
				border-bottom: 2px solid $zox_heads_color;
				text-align: right;
			}
			span.zox-widget-side-title {
				background: $zox_heads_color;
				color: #fff;
				letter-spacing: -.02em;
				padding: 5px 10px 3px 10px;
				text-transform: uppercase;
			}
			#zox-woo-side-wrap span.zox-widget-side-title {
				font-size: .875rem;
			}
			";
		} else if ($zox_heads_style == "4") {
			$zox_heads_style_css = "
			h4.zox-widget-main-title {
				text-align: right;
			}
			span.zox-widget-main-title {
				font-size: 1.125rem;
				letter-spacing: .1em;
			}
			";
		} else if ($zox_heads_style == "5") {
			$zox_heads_style_css = "
			.zox-widget-side-head {
				margin: 0 0 15px;
			}
			h4.zox-widget-side-title {
				border-top: 1px solid #ccc;
				position: relative;
				text-align: right;
			}
			.zox-net2 h4.zox-widget-side-title:after {
				content: '';
				background: $zox_heads_color;
				position: absolute;
					right: 0;
					left: auto;
					top: -1px;
				height: 5px;
				width: 100px;
			}
			span.zox-widget-side-title {
				color: #111;
				float: right;
				font-size: 1.125rem;
				margin: 0 0 15px;
			}
			";
		} else if ($zox_heads_style == "6") {
			$zox_heads_style_css = "
			.zox-widget-main-head {
				margin: 0 0 15px;
			}
			h4.zox-widget-main-title {
				border-top: 1px solid #ccc;
				position: relative;
				text-align: center;
			}
			span.zox-widget-main-title {
				background: #fff;
				border: 1px solid #ddd;
				color: $zox_heads_color;
				display: inline-block;
				font-size: 16px;
				letter-spacing: .05em;
				padding: 4px 8px 5px;
				position: relative;
					top: -13px;
				text-transform: uppercase;
			}
			.zox_feat_widget .zox-widget-main-head {
				margin: 0;
			}
			.zox_feat_widget h4.zox-widget-main-title {
				height: 1px;
				z-index: 10;
			}
			";
		} else if ($zox_heads_style == "7") {
			$zox_heads_style_css = "
			.zox-widget-main-head {
				margin: 0 0 20px;
			}
			h4.zox-widget-main-title {
				border-bottom: 1px solid #ddd;
				position: relative;
				text-align: right;
			}
			span.zox-widget-main-title {
				color: $zox_headm_color;
				border-bottom: 3px solid $zox_headm_color;
				display: inline-block;
				font-size: 1.125rem;
				padding: 0 0 5px;
				position: relative;
					bottom: -1px;
				text-transform: uppercase;
			}
			#zox-woo-side-wrap span.zox-widget-side-title {
				font-size: 1rem;
			}
			";
		} else if ($zox_heads_style == "8") {
			$zox_heads_style_css = "
			span.zox-widget-side-title {
				font-size: 1.125rem;
				letter-spacing: .2em;
				text-transform: uppercase;
			}
			#zox-woo-side-wrap span.zox-widget-side-title {
				font-size: .875rem;
			}
			";
		} else if ($zox_heads_style == "9") {
			$zox_heads_style_css = "
			.zox-widget-side-head {
				margin: 0 0 15px;
			}
			h4.zox-widget-side-title {
				text-align: right;
			}
			span.zox-widget-side-title {
				font-size: .875rem;
				letter-spacing: .02em;
				text-transform: uppercase;
			}
			";
		} else if ($zox_heads_style == "10") {
			$zox_heads_style_css = "
			.zox-fash1 h4.zox-widget-side-title {
				border-top: 1px solid #000;
				text-align: right;
			}
			.zox-fash1 span.zox-widget-side-title {
				border-top: 4px solid $zox_headm_color;
				color: $zox_headm_color;
				display: inline-block;
				font-size: 1.25rem;
				margin: -1px 0 0;
				padding: 5px 0 0;
			}
			";
		} else if ($zox_headm_style == "11") {
			$zox_headm_style_css = "
			.zox-widget-main-head {
				margin: 0 0 40px;
			}
			span.zox-widget-main-title {
				color: #333;
				font-size: 1.125rem;
				position: relative;
			}
			span.zox-widget-main-title:after {
				content: '';
				background: $zox_heads_color;
				margin: 0 0 0 -25px;
				position: absolute;
					bottom: -10px;
					left: 50%;
				width: 50px;
				height: 3px;
			}
			#zox-woo-side-wrap .zox-widget-side-head {
				margin: 0 0 35px;
			}
			#zox-woo-side-wrap span.zox-widget-side-title:after {
				left: 0;
				margin: 0;
			}
			";
		} else if ($zox_heads_style == "12") {
			$zox_heads_style_css = "
			.zox-widget-side-head {
				margin: 0 0 20px;
			}
			.zox-tech2 h4.zox-widget-side-title {
				overflow: hidden;
				position: relative;
				text-align: right;
				width: 100%;
			}
			.zox-tech2 span.zox-widget-side-title {
				font-size: .875rem;
				letter-spacing: .1em;
				text-transform: uppercase;
			}
			.zox-tech2 span.zox-widget-side-title:after {
				content:'';
				background: #ccc;
				margin: -1px 0 0 15px;
				position: absolute;
					top: 50%;
				width: 100%;
				height: 1px;
			}
			#zox-woo-side-wrap span.zox-widget-side-title {
				font-size: .75rem;
			}
			";
		} else {
			$zox_heads_style_css = "
			span.zox-widget-side-title {
				font-size: 2.125rem;
				font-style: italic;
			}
			";
		}
	}
} else {
	$zox_skin = get_option('zox_skin');
	$zox_heads_color = get_option('zox_heads_color');
	$zox_heads_style = get_option('zox_heads_style');
	if ($zox_skin == "2" || $zox_skin == "13") {
		$zox_heads_style_css = "
		span.zox-widget-side-title {
			font-size: 2.125rem;
			font-style: italic;
		}
		#zox-side-wrap .zox-widget-side-head a.rsswidget {
			font-weight: 400;
		}
			";
	} else if ($zox_skin == "3") {
		$zox_heads_style_css = "
		span.zox-widget-side-title {
			color: #111;
			font-family: 'Roboto', sans-serif;
			font-size: 2.125rem;
			font-weight: 900;
			letter-spacing: .05em;
			text-transform: uppercase;
		}
			";
	} else if ($zox_skin == "4") {
		$zox_heads_style_css = "
		h4.zox-widget-side-title {
			border-bottom: 2px solid #ec2b8c;
			text-align: left;
		}
		span.zox-widget-side-title {
			background: #ec2b8c;
			color: #fff;
			font-family: 'Montserrat', sans-serif;
			font-size: .875rem;
			font-weight: 800;
			letter-spacing: -.02em;
			padding: 5px 10px 3px 10px;
			text-transform: uppercase;
		}
		#zox-woo-side-wrap span.zox-widget-side-title {
			font-size: .875rem;
		}
			";
	} else if ($zox_skin == "5") {
		$zox_heads_style_css = "
		h4.zox-widget-side-title {
			text-align: left;
		}
		span.zox-widget-side-title {
			color: #6a0432;
			font-family: 'Heebo', sans-serif;
			font-size: 1.125rem;
			font-weight: 900;
			letter-spacing: .1em;
			text-transform: uppercase;
		}
			";
	} else if ($zox_skin == "6") {
		$zox_heads_style_css = "
		.zox-widget-side-head {
			margin: 0 0 15px;
		}
		h4.zox-widget-side-title {
			border-top: 1px solid #ccc;
			margin: 0;
			position: relative;
			text-align: left;
		}
		.zox-net2 h4.zox-widget-side-title:after {
			content: '';
			background: #3061ff;
			position: absolute;
				left: 0;
				top: -1px;
			height: 5px;
			width: 100px;
		}
		span.zox-widget-side-title {
			color: #111;
			float: left;
			font-family: 'Barlow Semi Condensed', sans-serif;
			font-size: 1.125rem;
			font-weight: 800;
			padding: 20px 0 0;
			text-transform: capitalize;
		}
			";
	} else if ($zox_skin == "7") {
		$zox_heads_style_css = "
		.zox-widget-side-head {
			margin: 0 0 15px;
		}
		h4.zox-widget-side-title {
			border-top: 1px solid #ccc;
			position: relative;
			text-align: center;
		}
		span.zox-widget-side-title {
			background: #fff;
			border: 1px solid #ddd;
			color: #cc0e0e;
			display: inline-block;
			font-family: 'Oswald', sans-serif;
			font-size: 16px;
			font-weight: 700;
			letter-spacing: .05em;
			padding: 4px 8px 5px;
			position: relative;
				top: -13px;
			text-transform: uppercase;
		}
		.zox_feat_widget .zox-widget-side-head {
			margin: 0;
		}
		.zox_feat_widget h4.zox-widget-side-title {
			height: 1px;
			z-index: 10;
		}
		#zox-woo-side-wrap h4.zox-widget-side-title {
			text-align: center;
		}
		#zox-woo-side-wrap span.zox-widget-side-title {
			font-size: 14px;
		}
			";
	} else if ($zox_skin == "8") {
		$zox_heads_style_css = "
		.zox-widget-side-head {
			margin: 0 0 20px;
		}
		h4.zox-widget-side-title {
			border-bottom: 1px solid #ddd;
			position: relative;
			text-align: left;
		}
		span.zox-widget-side-title {
			color: #111;
			border-bottom: 3px solid #111;
			display: inline-block;
			font-family: 'Rajdhani', sans-serif;
			font-size: 1.125rem;
			font-weight: 700;
			padding: 0 0 5px;
			position: relative;
				bottom: -1px;
			text-transform: uppercase;
		}
		#zox-woo-side-wrap span.zox-widget-side-title {
			font-size: 1rem;
		}
			";
	} else if ($zox_skin == "9") {
		$zox_heads_style_css = "
		span.zox-widget-side-title {
			font-family: 'Nunito Sans', sans-serif;
			font-size: 1.125rem;
			font-weight: 700;
			letter-spacing: .2em;
			text-transform: uppercase;
		}
		#zox-woo-side-wrap span.zox-widget-side-title {
			font-size: .875rem;
		}
		";
	} else if ($zox_skin == "10") {
		$zox_heads_style_css = "
		.zox-widget-side-head {
			margin: 0 0 15px;
		}
		h4.zox-widget-side-title {
			text-align: left;
		}
		span.zox-widget-side-title {
			font-family: 'Poppins', sans-serif;
			font-size: .875rem;
			font-weight: 700;
			letter-spacing: .02em;
			text-transform: uppercase;
		}
		";
	} else if ($zox_skin == "11") {
		$zox_heads_style_css = "
		.zox-fash1 h4.zox-widget-side-title {
			border-top: 1px solid #000;
			text-align: left;
		}
		.zox-fash1 span.zox-widget-side-title {
			border-top: 4px solid #000;
			color: #000;
			display: inline-block;
			font-family: 'Frank Ruhl Libre', sans-serif;
			font-size: 1.25rem;
			font-weight: 400;
			margin: -1px 0 0;
			padding: 5px 0 0;
		}
		";
	} else if ($zox_skin == "12") {
		$zox_heads_style_css = "
		.zox-widget-side-head {
			margin: 0 0 40px;
		}
		span.zox-widget-side-title {
			color: #333;
			font-family: 'Frank Ruhl Libre', sans-serif;
			font-size: 1.125rem;
			font-weight: 700;
			position: relative;
		}
		span.zox-widget-side-title:after {
			content: '';
			background: #5188d9;
			margin: 0 0 0 -25px;
			position: absolute;
				bottom: -10px;
				left: 50%;
			width: 50px;
			height: 3px;
		}
		#zox-woo-side-wrap .zox-widget-side-head {
			margin: 0 0 35px;
		}
		#zox-woo-side-wrap span.zox-widget-side-title:after {
			left: 0;
			margin: 0;
		}
			";
	} else if ($zox_skin == "14") {
		$zox_heads_style_css = "
		h4.zox-widget-side-title {
			text-align: left;
		}
		span.zox-widget-side-title {
			color: #000;
			font-family: 'Poppins', sans-serif;
			font-size: 1.125rem;
			font-weight: 700;
			letter-spacing: .1em;
			text-transform: uppercase;
		}
		#zox-woo-side-wrap span.zox-widget-side-title {
			font-size: .875rem;
		}
		";
	} else if ($zox_skin == "15") {
		$zox_heads_style_css = "
		.zox-widget-side-head {
			margin: 0 0 15px;
		}
		.zox-tech2 h4.zox-widget-side-title {
			overflow: hidden;
			position: relative;
			text-align: left;
			width: 100%;
		}
		.zox-tech2 span.zox-widget-side-title {
			color: #111;
			font-family: 'Poppins', sans-serif;
			font-size: .875rem;
			font-weight: 700;
			letter-spacing: .1em;
			text-transform: uppercase;
		}
		.zox-tech2 span.zox-widget-side-title:after {
			content:'';
			background: #ccc;
			margin: -1px 0 0 15px;
			position: absolute;
				top: 50%;
			width: 100%;
			height: 1px;
		}
		#zox-woo-side-wrap span.zox-widget-side-title {
			font-size: .75rem;
		}
		";
	} else if ($zox_skin == "16") {
		$zox_heads_style_css = "
		.zox-widget-side-head {
			margin: 0 0 15px;
		}
		h4.zox-widget-side-title {
			text-align: left;
		}
		span.zox-widget-side-title {
			color: #ff4422;
			font-family: 'Poppins', sans-serif;
			font-size: 1.125rem;
			font-weight: 700;
			letter-spacing: 0;
			text-transform: capitalize;
		}
		#zox-woo-side-wrap span.zox-widget-side-title {
			font-size: 1rem;
		}
		";
	} else {
		if ($zox_heads_style == "1") {
			$zox_heads_style_css = "
			span.zox-widget-side-title {
				font-size: 2.125rem;
				font-style: italic;
			}
			#zox-side-wrap .zox-widget-side-head a.rsswidget {
				font-weight: 400;
			}
			";
		} else if ($zox_heads_style == "2") {
			$zox_heads_style_css = "
			span.zox-widget-side-title {
				font-size: 2.125rem;
				letter-spacing: .05em;
			}
			";
		} else if ($zox_heads_style == "3") {
			$zox_heads_style_css = "
			h4.zox-widget-side-title {
				border-bottom: 2px solid $zox_heads_color;
				text-align: left;
			}
			span.zox-widget-side-title {
				background: $zox_heads_color;
				color: #fff;
				letter-spacing: -.02em;
				padding: 5px 10px 3px 10px;
				text-transform: uppercase;
			}
			#zox-woo-side-wrap span.zox-widget-side-title {
				font-size: .875rem;
			}
			";
		} else if ($zox_heads_style == "4") {
			$zox_heads_style_css = "
			h4.zox-widget-main-title {
				text-align: left;
			}
			span.zox-widget-main-title {
				font-size: 1.125rem;
				letter-spacing: .1em;
			}
			";
		} else if ($zox_heads_style == "5") {
			$zox_heads_style_css = "
			.zox-widget-side-head {
				margin: 0 0 15px;
			}
			h4.zox-widget-side-title {
				border-top: 1px solid #ccc;
				position: relative;
				text-align: left;
			}
			.zox-net2 h4.zox-widget-side-title:after {
				content: '';
				background: $zox_heads_color;
				position: absolute;
					left: 0;
					top: -1px;
				height: 5px;
				width: 100px;
			}
			span.zox-widget-side-title {
				color: #111;
				float: left;
				font-size: 1.125rem;
				margin: 0 0 15px;
			}
			";
		} else if ($zox_heads_style == "6") {
			$zox_heads_style_css = "
			.zox-widget-main-head {
				margin: 0 0 15px;
			}
			h4.zox-widget-main-title {
				border-top: 1px solid #ccc;
				position: relative;
				text-align: center;
			}
			span.zox-widget-main-title {
				background: #fff;
				border: 1px solid #ddd;
				color: $zox_heads_color;
				display: inline-block;
				font-size: 16px;
				letter-spacing: .05em;
				padding: 4px 8px 5px;
				position: relative;
					top: -13px;
				text-transform: uppercase;
			}
			.zox_feat_widget .zox-widget-main-head {
				margin: 0;
			}
			.zox_feat_widget h4.zox-widget-main-title {
				height: 1px;
				z-index: 10;
			}
			";
		} else if ($zox_heads_style == "7") {
			$zox_heads_style_css = "
			.zox-widget-main-head {
				margin: 0 0 20px;
			}
			h4.zox-widget-main-title {
				border-bottom: 1px solid #ddd;
				position: relative;
				text-align: left;
			}
			span.zox-widget-main-title {
				color: $zox_headm_color;
				border-bottom: 3px solid $zox_headm_color;
				display: inline-block;
				font-size: 1.125rem;
				padding: 0 0 5px;
				position: relative;
					bottom: -1px;
				text-transform: uppercase;
			}
			#zox-woo-side-wrap span.zox-widget-side-title {
				font-size: 1rem;
			}
			";
		} else if ($zox_heads_style == "8") {
			$zox_heads_style_css = "
			span.zox-widget-side-title {
				font-size: 1.125rem;
				letter-spacing: .2em;
				text-transform: uppercase;
			}
			#zox-woo-side-wrap span.zox-widget-side-title {
				font-size: .875rem;
			}
			";
		} else if ($zox_heads_style == "9") {
			$zox_heads_style_css = "
			.zox-widget-side-head {
				margin: 0 0 15px;
			}
			h4.zox-widget-side-title {
				text-align: left;
			}
			span.zox-widget-side-title {
				font-size: .875rem;
				letter-spacing: .02em;
				text-transform: uppercase;
			}
			";
		} else if ($zox_heads_style == "10") {
			$zox_heads_style_css = "
			.zox-fash1 h4.zox-widget-side-title {
				border-top: 1px solid #000;
				text-align: left;
			}
			.zox-fash1 span.zox-widget-side-title {
				border-top: 4px solid $zox_headm_color;
				color: $zox_headm_color;
				display: inline-block;
				font-size: 1.25rem;
				margin: -1px 0 0;
				padding: 5px 0 0;
			}
			";
		} else if ($zox_headm_style == "11") {
			$zox_headm_style_css = "
			.zox-widget-main-head {
				margin: 0 0 40px;
			}
			span.zox-widget-main-title {
				color: #333;
				font-size: 1.125rem;
				position: relative;
			}
			span.zox-widget-main-title:after {
				content: '';
				background: $zox_heads_color;
				margin: 0 0 0 -25px;
				position: absolute;
					bottom: -10px;
					left: 50%;
				width: 50px;
				height: 3px;
			}
			#zox-woo-side-wrap .zox-widget-side-head {
				margin: 0 0 35px;
			}
			#zox-woo-side-wrap span.zox-widget-side-title:after {
				left: 0;
				margin: 0;
			}
			";
		} else if ($zox_heads_style == "12") {
			$zox_heads_style_css = "
			.zox-widget-side-head {
				margin: 0 0 20px;
			}
			.zox-tech2 h4.zox-widget-side-title {
				overflow: hidden;
				position: relative;
				text-align: left;
				width: 100%;
			}
			.zox-tech2 span.zox-widget-side-title {
				font-size: .875rem;
				letter-spacing: .1em;
				text-transform: uppercase;
			}
			.zox-tech2 span.zox-widget-side-title:after {
				content:'';
				background: #ccc;
				margin: -1px 0 0 15px;
				position: absolute;
					top: 50%;
				width: 100%;
				height: 1px;
			}
			#zox-woo-side-wrap span.zox-widget-side-title {
				font-size: .75rem;
			}
			";
		} else {
			$zox_heads_style_css = "
			span.zox-widget-side-title {
				font-size: 2.125rem;
				font-style: italic;
			}
			";
		}
	}
}

$zox_rtl = get_option('zox_rtl'); if ($zox_rtl == "true") {
	$zox_skin = get_option('zox_skin');
	$zox_headp_style = get_option('zox_headp_style');
	$zox_headp_color = get_option('zox_headp_color');
	if ($zox_skin == "2" || $zox_skin == "3" || $zox_skin == "4" || $zox_skin == "5" || $zox_skin == "6" || $zox_skin == "7" || $zox_skin == "8" || $zox_skin == "9" || $zox_skin == "10" || $zox_skin == "11" || $zox_skin == "12" || $zox_skin == "13" || $zox_skin == "14" || $zox_skin == "15" || $zox_skin == "16") {
		$zox_headp_style_css = "
		h4.zox-post-main-title {
			text-align: right;
		}
		span.zox-post-main-title {
			color: #000;
			font-family: 'Roboto', sans-serif;
			font-size: 1.5rem;
			font-weight: 800;
			text-transform: capitalize;
		}
		";
	} else {
		if ($zox_headp_style == "1") {
			$zox_headp_style_css = "
			span.zox-post-main-title {
				font-size: 3rem;
				font-style: italic;
			}
			";
		} else if ($zox_headp_style == "2") {
			$zox_headp_style_css = "
			span.zox-post-main-title {
				font-size: 4rem;
				letter-spacing: .05em;
			}
			";
		} else if ($zox_headp_style == "3") {
			$zox_headp_style_css = "
			span.zox-post-main-title {
				font-size: 1.5rem;
				letter-spacing: .05em;
			}
			";
		} else if ($zox_headp_style == "4") {
			$zox_headp_style_css = "
			h4.zox-post-main-title {
				text-align: right;
			}
			span.zox-post-main-title {
				font-size: 1.5rem;
				letter-spacing: .1em;
			}
			";
		} else if ($zox_headp_style == "5") {
			$zox_headp_style_css = "
			.zox-post-main-head {
				margin: 0 0 15px;
				}
			h4.zox-post-main-title {
				border-top: 1px solid #ccc;
				margin: 0;
				position: relative;
				text-align: right;
			}
			.zox-net2 h4.zox-post-main-title:after {
				content: '';
				background: $zox_headp_color;
				position: absolute;
					right: 0;
					left: auto;
					top: -1px;
				height: 8px;
				width: 100px;
			}
			span.zox-post-main-title {
				color: #111;
				float: right;
				font-size: 1.375rem;
				padding: 25px 0 0;
				width: 100%;
			}
			";
		} else if ($zox_headp_style == "6") {
			$zox_headp_style_css = "
			.zox-post-main-head {
				margin: 0 0 15px;
			}
			h4.zox-post-main-title {
				border-top: 1px solid #ccc;
				position: relative;
				text-align: center;
			}
			span.zox-post-main-title {
				background: #fff;
				border: 1px solid #ddd;
				color: $zox_headp_color;
				display: inline-block;
				font-size: 18px;
				letter-spacing: .05em;
				padding: 5px 10px 7px;
				position: relative;
					top: -16px;
				text-transform: uppercase;
			}
			.zox_feat_widget .zox-post-main-head {
				margin: 0;
			}
			.zox_feat_widget h4.zox-post-main-title {
				height: 1px;
				z-index: 10;
			}
			";
		} else if ($zox_headp_style == "7") {
			$zox_headp_style_css = "
			.zox-post-main-head {
				margin: 0 0 20px;
			}
			h4.zox-post-main-title {
				border-bottom: 1px solid #ddd;
				position: relative;
				text-align: right;
			}
			span.zox-post-main-title {
				color: $zox_headp_color;
				border-bottom: 3px solid $zox_headp_color;
				display: inline-block;
				font-size: 1.75rem;
				padding: 0 0 5px;
				position: relative;
					bottom: -1px;
				text-transform: uppercase;
			}
			";
		} else if ($zox_headp_style == "8") {
			$zox_headp_style_css = "
			span.zox-post-main-title {
				font-size: 2.5rem;
				letter-spacing: .2em;
				text-transform: uppercase;
			}
			";
		} else if ($zox_headp_style == "9") {
			$zox_headp_style_css = "
			.zox-post-main-head {
				margin: 0 0 15px;
			}
			h4.zox-post-main-title {
				text-align: right;
			}
			span.zox-post-main-title {
				font-size: 1rem;
				letter-spacing: .02em;
				text-transform: uppercase;
			}
			";
		} else if ($zox_headp_style == "10") {
			$zox_headp_style_css = "
			.zox-fash1 h4.zox-post-main-title {
				border-top: 1px solid #000;
				text-align: right;
			}
			.zox-fash1 span.zox-post-main-title {
				border-top: 10px solid $zox_headp_color;
				color: $zox_headp_color;
				display: inline-block;
				font-size: 4rem;
				margin: -1px 0 0;
				padding: 5px 0 0;
			}
			";
		} else if ($zox_headp_style == "11") {
			$zox_headp_style_css = "
			.zox-post-main-head {
				margin: 0 0 50px;
			}
			span.zox-post-main-title {
				color: #333;
				font-size: 2rem;
				position: relative;
			}
			span.zox-post-main-title:after {
				content: '';
				background: $zox_headp_color;
				margin: 0 0 0 -50px;
				position: absolute;
					bottom: -15px;
					left: 50%;
				width: 100px;
				height: 5px;
			}
			";
		} else if ($zox_headp_style == "12") {
			$zox_headp_style_css = "
			.zox-post-main-head {
				margin: 0 0 20px;
			}
			.zox-tech2 h4.zox-post-main-title {
				overflow: hidden;
				position: relative;
				text-align: right;
				width: 100%;
			}
			.zox-tech2 span.zox-post-main-title {
				font-size: 1rem;
				letter-spacing: .1em;
				text-transform: uppercase;
			}
			.zox-tech2 span.zox-post-main-title:after {
				content:'';
				background: #ccc;
				margin: -1px 0 0 15px;
				position: absolute;
					top: 50%;
				width: 100%;
				height: 1px;
			}
			";
		}
	}
} else {
	$zox_skin = get_option('zox_skin');
	$zox_headp_style = get_option('zox_headp_style');
	$zox_headp_color = get_option('zox_headp_color');
	if ($zox_skin == "2" || $zox_skin == "3" || $zox_skin == "4" || $zox_skin == "5" || $zox_skin == "6" || $zox_skin == "7" || $zox_skin == "8" || $zox_skin == "9" || $zox_skin == "10" || $zox_skin == "11" || $zox_skin == "12" || $zox_skin == "13" || $zox_skin == "14" || $zox_skin == "15" || $zox_skin == "16") {
		$zox_headp_style_css = "
		h4.zox-post-main-title {
			text-align: left;
		}
		span.zox-post-main-title {
			color: #000;
			font-family: 'Roboto', sans-serif;
			font-size: 1.5rem;
			font-weight: 800;
			text-transform: capitalize;
		}
		";
	} else {
		if ($zox_headp_style == "1") {
			$zox_headp_style_css = "
			span.zox-post-main-title {
				font-size: 3rem;
				font-style: italic;
			}
			";
		} else if ($zox_headp_style == "2") {
			$zox_headp_style_css = "
			span.zox-post-main-title {
				font-size: 4rem;
				letter-spacing: .05em;
			}
			";
		} else if ($zox_headp_style == "3") {
			$zox_headp_style_css = "
			span.zox-post-main-title {
				font-size: 1.5rem;
				letter-spacing: .05em;
			}
			";
		} else if ($zox_headp_style == "4") {
			$zox_headp_style_css = "
			h4.zox-post-main-title {
				text-align: left;
			}
			span.zox-post-main-title {
				font-size: 1.5rem;
				letter-spacing: .1em;
			}
			";
		} else if ($zox_headp_style == "5") {
			$zox_headp_style_css = "
			.zox-post-main-head {
				margin: 0 0 15px;
				}
			h4.zox-post-main-title {
				border-top: 1px solid #ccc;
				margin: 0;
				position: relative;
				text-align: left;
			}
			.zox-net2 h4.zox-post-main-title:after {
				content: '';
				background: $zox_headp_color;
				position: absolute;
					left: 0;
					top: -1px;
				height: 8px;
				width: 100px;
			}
			span.zox-post-main-title {
				color: #111;
				float: left;
				font-size: 1.375rem;
				padding: 25px 0 0;
				width: 100%;
			}
			";
		} else if ($zox_headp_style == "6") {
			$zox_headp_style_css = "
			.zox-post-main-head {
				margin: 0 0 15px;
			}
			h4.zox-post-main-title {
				border-top: 1px solid #ccc;
				position: relative;
				text-align: center;
			}
			span.zox-post-main-title {
				background: #fff;
				border: 1px solid #ddd;
				color: $zox_headp_color;
				display: inline-block;
				font-size: 18px;
				letter-spacing: .05em;
				padding: 5px 10px 7px;
				position: relative;
					top: -16px;
				text-transform: uppercase;
			}
			.zox_feat_widget .zox-post-main-head {
				margin: 0;
			}
			.zox_feat_widget h4.zox-post-main-title {
				height: 1px;
				z-index: 10;
			}
			";
		} else if ($zox_headp_style == "7") {
			$zox_headp_style_css = "
			.zox-post-main-head {
				margin: 0 0 20px;
			}
			h4.zox-post-main-title {
				border-bottom: 1px solid #ddd;
				position: relative;
				text-align: left;
			}
			span.zox-post-main-title {
				color: $zox_headp_color;
				border-bottom: 3px solid $zox_headp_color;
				display: inline-block;
				font-size: 1.75rem;
				padding: 0 0 5px;
				position: relative;
					bottom: -1px;
				text-transform: uppercase;
			}
			";
		} else if ($zox_headp_style == "8") {
			$zox_headp_style_css = "
			span.zox-post-main-title {
				font-size: 2.5rem;
				letter-spacing: .2em;
				text-transform: uppercase;
			}
			";
		} else if ($zox_headp_style == "9") {
			$zox_headp_style_css = "
			.zox-post-main-head {
				margin: 0 0 15px;
			}
			h4.zox-post-main-title {
				text-align: left;
			}
			span.zox-post-main-title {
				font-size: 1rem;
				letter-spacing: .02em;
				text-transform: uppercase;
			}
			";
		} else if ($zox_headp_style == "10") {
			$zox_headp_style_css = "
			.zox-fash1 h4.zox-post-main-title {
				border-top: 1px solid #000;
				text-align: left;
			}
			.zox-fash1 span.zox-post-main-title {
				border-top: 10px solid $zox_headp_color;
				color: $zox_headp_color;
				display: inline-block;
				font-size: 4rem;
				margin: -1px 0 0;
				padding: 5px 0 0;
			}
			";
		} else if ($zox_headp_style == "11") {
			$zox_headp_style_css = "
			.zox-post-main-head {
				margin: 0 0 50px;
			}
			span.zox-post-main-title {
				color: #333;
				font-size: 2rem;
				position: relative;
			}
			span.zox-post-main-title:after {
				content: '';
				background: $zox_headp_color;
				margin: 0 0 0 -50px;
				position: absolute;
					bottom: -15px;
					left: 50%;
				width: 100px;
				height: 5px;
			}
			";
		} else if ($zox_headp_style == "12") {
			$zox_headp_style_css = "
			.zox-post-main-head {
				margin: 0 0 20px;
			}
			.zox-tech2 h4.zox-post-main-title {
				overflow: hidden;
				position: relative;
				text-align: left;
				width: 100%;
			}
			.zox-tech2 span.zox-post-main-title {
				font-size: 1rem;
				letter-spacing: .1em;
				text-transform: uppercase;
			}
			.zox-tech2 span.zox-post-main-title:after {
				content:'';
				background: #ccc;
				margin: -1px 0 0 15px;
				position: absolute;
					top: 50%;
				width: 100%;
				height: 1px;
			}
			";
		}
	}
}

$zox_rtl = get_option('zox_rtl'); if ($zox_rtl == "true") {
	$zox_post_ad = get_option('zox_post_ad');
	$zox_post_adimg = get_option('zox_post_adimg');
	$zox_post_para = get_option('zox_post_para');
	if (($zox_post_para == "true" && !empty($zox_post_adimg)) || ($zox_post_para == "true" && !empty($zox_post_ad))) {
	$zox_post_para_css = "
		.zox-post-ad {
			height: calc(100vh - 100px);
		}
		.zox-post-ad-in1 {
			clip: rect(0,auto,auto,0);
			overflow: hidden;
			position: absolute;
				right: 0;
				left: auto;
				top: 0;
			z-index: 1;
			zoom: 1;
			height: 100%;
		}
		.zox-post-ad-in2 {
			position: fixed;
				right: auto;
				top: 0;
			transform: translateZ(0);
		}
		";
	}
} else {
	$zox_post_ad = get_option('zox_post_ad');
	$zox_post_adimg = get_option('zox_post_adimg');
	$zox_post_para = get_option('zox_post_para');
	if (($zox_post_para == "true" && !empty($zox_post_adimg)) || ($zox_post_para == "true" && !empty($zox_post_ad))) {
	$zox_post_para_css = "
		.zox-post-ad {
			height: calc(100vh - 100px);
		}
		.zox-post-ad-in1 {
			clip: rect(0,auto,auto,0);
			overflow: hidden;
			position: absolute;
				left: 0;
				top: 0;
			z-index: 1;
			zoom: 1;
			height: 100%;
		}
		.zox-post-ad-in2 {
			position: fixed;
				left: auto;
				top: 0;
			transform: translateZ(0);
		}
		";
	}
}

$zox_rtl = get_option('zox_rtl'); if ($zox_rtl == "true") {
	$zox_para_lead = get_option('zox_para_lead');
	if ($zox_para_lead == "true") {
	$zox_para_lead_css = "
		#zox-lead-top-wrap {
			position: relative;
			height: 0;
		}
		#zox-lead-top-in {
			clip: rect(0,auto,auto,0);
			overflow: hidden;
			position: absolute;
				right: 0;
				left: auto;
				top: 0;
			z-index: 1;
			zoom: 1;
			width: 100%;
			height: 100%;
		}
		#zox-lead-top {
			position: fixed;
				top: 0;
				right: 0;
				left: auto;
		}
		";
	}
} else {
	$zox_para_lead = get_option('zox_para_lead');
	if ($zox_para_lead == "true") {
	$zox_para_lead_css = "
		#zox-lead-top-wrap {
			position: relative;
			height: 0;
		}
		#zox-lead-top-in {
			clip: rect(0,auto,auto,0);
			overflow: hidden;
			position: absolute;
				left: 0;
				top: 0;
			z-index: 1;
			zoom: 1;
			width: 100%;
			height: 100%;
		}
		#zox-lead-top {
			position: fixed;
				top: 0;
				left: 0;
		}
		";
	}
}

	$zox_home_rside = get_option('zox_home_rside');
	if ($zox_home_rside !== "1") {
	if ( !is_active_sidebar( 'zox-home-sidebar-widget' ) ) {
	$zox_home_side_empty_css = "
		.home #zox-home-body-wrap {
			grid-gap: 0;
			grid-template-columns: 100%;
		}
		.home #zox-home-right-wrap {
			display: none;
		}
		";
	}
	}

	if ( !is_active_sidebar( 'zox-sidebar-widget' ) ) {
	$zox_def_side_empty_css = "
		.archive #zox-home-body-wrap {
			grid-gap: 0;
			grid-template-columns: 100%;
		}
		.archive #zox-home-right-wrap {
			display: none;
		}
		";
	}

$zox_rtl = get_option('zox_rtl'); if ($zox_rtl == "true") {
	$zox_soc_style = get_option('zox_soc_style');
	if ($zox_soc_style == "2") {
	$zox_soc_style_css = "
		ul.zox-post-soc-list {
			display: grid;
			grid-gap: 5px;
			right: 5px;
			left: auto;
		}
		ul.zox-post-soc-list li {
			background: #888;
			border: none;
			border-radius: 5px;
			-webkit-transition: none;
			   -moz-transition: none;
			    -ms-transition: none;
				 -o-transition: none;
					transition: none;
			width: 40px;
			height: 40px;
		}
		ul.zox-post-soc-stat-list li,
		ul.zox-alp-soc-list li {
			background: #888;
			border: none;
			border-radius: 5px;
			color: #fff;
			-webkit-transition: none;
			   -moz-transition: none;
			    -ms-transition: none;
				 -o-transition: none;
					transition: none;
		}
		ul.zox-post-soc-stat-list li:hover,
		ul.zox-alp-soc-list li:hover {
			background: #888;
			font-size: 18px;
		}
		ul.zox-post-soc-list li:hover,
		ul.zox-post-soc-list li.zox-post-soc-email:hover,
		ul.zox-post-soc-list li.zox-post-soc-com:hover {
			background: #888;
			font-size: 18px;
		}
		.zox-dark ul.zox-post-soc-stat-list li,
		.zox-dark ul.zox-alp-soc-list li,
		.zox-dark ul.zox-post-soc-stat-list li.zox-post-soc-fb,
		.zox-dark ul.zox-alp-soc-list li.zox-alp-soc-fb,
		.zox-dark ul.zox-post-soc-stat-list li.zox-post-soc-twit,
		.zox-dark ul.zox-alp-soc-list li.zox-alp-soc-twit,
		.zox-dark ul.zox-post-soc-stat-list li.zox-post-soc-flip,
		.zox-dark ul.zox-alp-soc-list li.zox-alp-soc-flip {
			background: #333;
		}
		ul.zox-post-soc-list li.zox-post-soc-fb,
		ul.zox-post-soc-stat-list li.zox-post-soc-fb,
		ul.zox-alp-soc-list li.zox-alp-soc-fb {
			background: #3b5998;
		}
		ul.zox-post-soc-list li.zox-post-soc-twit,
		ul.zox-post-soc-stat-list li.zox-post-soc-twit,
		ul.zox-alp-soc-list li.zox-alp-soc-twit {
			background: #55acee;
		}
		ul.zox-post-soc-list li.zox-post-soc-flip,
		ul.zox-post-soc-stat-list li.zox-post-soc-flip,
		ul.zox-alp-soc-list li.zox-alp-soc-flip {
			background: #f52828;
		}
		@media screen and (max-width: 1023px) {
			.zox-post-soc-scroll {
				height: 40px !important;
			}
			ul.zox-post-soc-list {
				display: inline;
				right: 0;
				left: auto;
			}
			ul.zox-post-soc-list li {
				border-right: 1px solid #fff !important;
				border-left: none !important;
				border-radius: 0;
			}
		}
		";
	}
} else {
	$zox_soc_style = get_option('zox_soc_style');
	if ($zox_soc_style == "2") {
	$zox_soc_style_css = "
		ul.zox-post-soc-list {
			display: grid;
			grid-gap: 5px;
			left: 5px;
		}
		ul.zox-post-soc-list li {
			background: #888;
			border: none;
			border-radius: 5px;
			-webkit-transition: none;
			   -moz-transition: none;
			    -ms-transition: none;
				 -o-transition: none;
					transition: none;
			width: 40px;
			height: 40px;
		}
		ul.zox-post-soc-stat-list li,
		ul.zox-alp-soc-list li {
			background: #888;
			border: none;
			border-radius: 5px;
			color: #fff;
			-webkit-transition: none;
			   -moz-transition: none;
			    -ms-transition: none;
				 -o-transition: none;
					transition: none;
		}
		ul.zox-post-soc-stat-list li:hover,
		ul.zox-alp-soc-list li:hover {
			background: #888;
			font-size: 18px;
		}
		ul.zox-post-soc-list li:hover,
		ul.zox-post-soc-list li.zox-post-soc-email:hover,
		ul.zox-post-soc-list li.zox-post-soc-com:hover {
			background: #888;
			font-size: 18px;
		}
		.zox-dark ul.zox-post-soc-stat-list li,
		.zox-dark ul.zox-alp-soc-list li,
		.zox-dark ul.zox-post-soc-stat-list li.zox-post-soc-fb,
		.zox-dark ul.zox-alp-soc-list li.zox-alp-soc-fb,
		.zox-dark ul.zox-post-soc-stat-list li.zox-post-soc-twit,
		.zox-dark ul.zox-alp-soc-list li.zox-alp-soc-twit,
		.zox-dark ul.zox-post-soc-stat-list li.zox-post-soc-flip,
		.zox-dark ul.zox-alp-soc-list li.zox-alp-soc-flip {
			background: #333;
		}
		ul.zox-post-soc-list li.zox-post-soc-fb,
		ul.zox-post-soc-stat-list li.zox-post-soc-fb,
		ul.zox-alp-soc-list li.zox-alp-soc-fb {
			background: #3b5998;
		}
		ul.zox-post-soc-list li.zox-post-soc-twit,
		ul.zox-post-soc-stat-list li.zox-post-soc-twit,
		ul.zox-alp-soc-list li.zox-alp-soc-twit {
			background: #55acee;
		}
		ul.zox-post-soc-list li.zox-post-soc-flip,
		ul.zox-post-soc-stat-list li.zox-post-soc-flip,
		ul.zox-alp-soc-list li.zox-alp-soc-flip {
			background: #f52828;
		}
		@media screen and (max-width: 1023px) {
			.zox-post-soc-scroll {
				height: 40px !important;
			}
			ul.zox-post-soc-list {
				display: inline;
				left: 0;
			}
			ul.zox-post-soc-list li {
				border-left: 1px solid #fff !important;
				border-radius: 0;
			}
		}
		";
	}
}

	$zox_top_nav_soc_style = get_option('zox_top_nav_soc_style');
	$zox_top_nav_text = get_option('zox_top_nav_text');
	$zox_skin = get_option('zox_skin');
	if ($zox_skin == "5" || $zox_skin == "6" || $zox_skin == "7" || $zox_skin == "12" || $zox_skin == "16") {

	} else if ($zox_skin == "11") {
		$zox_top_nav_soc_style_css = "
		span.zox-top-soc-but {
			border: 1px solid $zox_top_nav_text;
			border-radius: 50%;
			font-size: 16px;
			display: grid;
			align-content: center;
			text-align: center;
			width: 40px;
			height: 40px;
		}
			";
	} else {
		if ($zox_top_nav_soc_style == "2") {
			$zox_top_nav_soc_style_css = "
			span.zox-top-soc-but {
				border: 1px solid $zox_top_nav_text;
				border-radius: 50%;
				font-size: 16px;
				display: grid;
				align-content: center;
				text-align: center;
				width: 40px;
				height: 40px;
			}
				";
		} else {
			$zox_top_nav_soc_style_css = "

				";
		}
	}

	if ($zox_css) {
	$zox_css_css = "
 	$zox_css
		";
	}

	if (isset($zox_theme_options)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_theme_options )); }
	if (isset($zox_wall_ad_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_wall_ad_css )); }
	if (isset($zox_skin_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_skin_css )); }
	if (isset($zox_head_contw_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_head_contw_css )); }
	if (isset($zox_contw_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_contw_css )); }
	if (isset($zox_top_navl_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_top_navl_css )); }
	if (isset($zox_bot_navc_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_bot_navc_css )); }
	if (isset($zox_menu_align_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_menu_align_css )); }
	if (isset($zox_mob_but_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_mob_but_css )); }
	if (isset($zox_logo_nav_vis_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_logo_nav_vis_css )); }
	if (isset($zox_feat_network_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_feat_network_css )); }
	if (isset($zox_trans_menu_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_trans_menu_css )); }
	if (isset($zox_nav_border_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_nav_border_css )); }
	if (isset($zox_nav_shade_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_nav_shade_css )); }
	if (isset($zox_full_img_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_full_img_css )); }
	if (isset($zox_post_center_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_post_center_css )); }
	if (isset($zox_post_side_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_post_side_css )); }
	if (isset($zox_alp_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_alp_css )); }
	if (isset($zox_infinite_scroll_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_infinite_scroll_css )); }
	if (isset($zox_side_width_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_side_width_css )); }
	if (isset($zox_side_width1_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_side_width1_css )); }
	if (isset($zox_side_width2_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_side_width2_css )); }
	if (isset($zox_byline_name_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_byline_name_css )); }
	if (isset($zox_byline_date_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_byline_date_css )); }
	if (isset($zox_home_rside_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_home_rside_css )); }
	if (isset($zox_link_style_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_link_style_css )); }
	if (isset($zox_headm_style_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_headm_style_css )); }
	if (isset($zox_heads_style_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_heads_style_css )); }
	if (isset($zox_headp_style_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_headp_style_css )); }
	if (isset($zox_post_para_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_post_para_css )); }
	if (isset($zox_para_lead_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_para_lead_css )); }
	if (isset($zox_home_side_empty_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_home_side_empty_css )); }
	if (isset($zox_def_side_empty_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_def_side_empty_css )); }
	if (isset($zox_soc_style_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_soc_style_css )); }
	if (isset($zox_top_nav_soc_style_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_top_nav_soc_style_css )); }
	if (isset($zox_css_css)) { wp_kses_post(wp_add_inline_style( 'zox-custom-style', $zox_css_css )); }
}
}

add_action( 'wp_enqueue_scripts', 'zox_styles_method' );

?>