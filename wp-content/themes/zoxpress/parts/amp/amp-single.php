<!DOCTYPE html>
<html ⚡ <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" >
		<link rel="amphtml" href="<?php echo get_permalink(); ?>amp/" />
    	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { if(get_option('zox_favicon')) { ?><link rel="shortcut icon" href="<?php echo esc_url(get_option('zox_favicon')); ?>" /><?php } } ?>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<meta property="og:type" content="article" />
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
				<?php global $post; if (!empty( $post )) { $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'zox-post-thumb' ); } ?>
				<meta property="og:image" content="<?php echo esc_url( $thumb['0'] ); ?>" />
				<meta name="twitter:image" content="<?php echo esc_url( $thumb['0'] ); ?>" />
			<?php } ?>
			<meta property="og:url" content="<?php the_permalink() ?>" />
			<meta property="og:title" content="<?php the_title_attribute(); ?>" />
			<meta property="og:description" content="<?php echo strip_tags(get_the_excerpt()); ?>" />
			<meta name="twitter:card" content="summary">
			<meta name="twitter:url" content="<?php the_permalink() ?>">
			<meta name="twitter:title" content="<?php the_title_attribute(); ?>">
			<meta name="twitter:description" content="<?php echo strip_tags(get_the_excerpt()); ?>">
		<?php endwhile; endif; ?>
		<script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
		<script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
		<?php do_action( 'amp_post_template_head', $this ); ?>
		<style amp-custom>
			*, ::after, ::before {
				box-sizing: border-box;
			}

			html, body, div, span, applet, object, iframe,
			h1, h2, h3, h4, h5, h6, p, blockquote, pre,
			a, abbr, acronym, address, big, cite, code,
			del, dfn, em, img, ins, kbd, q, s, samp,
			small, strike, strong, sub, sup, tt, var,
			b, u, i, center,
			dl, dt, dd, ol, ul, li,
			fieldset, form, label, legend,
			table, caption, tbody, tfoot, thead, tr, th, td,
			article, aside, canvas, details, embed,
			figure, figcaption, footer, header, hgroup,
			menu, nav, output, ruby, section, summary,
			time, mark, audio, video {
				margin: 0;
				padding: 0;
				border: 0;
				font-size: 100%;
				vertical-align: baseline;
			}
			/* HTML5 display-role reset for older browsers */
			article, aside, details, figcaption, figure,
			footer, header, hgroup, menu, nav, section {
				display: block;
			}
			ol, ul {
				list-style: none;
			}
			blockquote, q {
				quotes: none;
			}
			blockquote:before, blockquote:after,
			q:before, q:after {
				content: '';
				content: none;
			}
			table {
				border-collapse: collapse;
				border-spacing: 0;
			}

			html {
				overflow-x: hidden;
			 	}

			body {
				background: #f0f0f0;
				color: #000;
				font-family: 'Roboto', sans-serif;
				font-size: 1rem;
				-webkit-font-smoothing: antialiased;
				font-weight: 400;
				line-height: 100%;
				margin: 0px auto;
				padding: 0px;
				}

			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {
				-webkit-backface-visibility: hidden;
				color: #000;
				}

			img {
				max-width: 100%;
				height: auto;
				-webkit-backface-visibility: hidden;
				}

			iframe,
			embed,
			object,
			video {
				max-width: 100%;
				}

			#truethemes_container #main {
			float: left;
			}

			.lazy-load {
				-webkit-transition: opacity .25s;
			    transition: opacity .25s;
			    opacity: 0;
			}

			.lazy-load.is-loaded {
			    opacity: 1;
			}
			a,
			a:visited {
				color: #ec2b8c;
				opacity: 1;
				text-decoration: none;
				-webkit-transition: color .25s, background .25s, opacity .25s;
				   -moz-transition: color .25s, background .25s, opacity .25s;
				    -ms-transition: color .25s, background .25s, opacity .25s;
				     -o-transition: color .25s, background .25s, opacity .25s;
						transition: color .25s, background .25s, opacity .25s;
				}

			a:hover {
				text-decoration: none;
				}

			a:active,
			a:focus {
				outline: none;
				}

			#zox-side-wrap a {
				color: #000;
				font-weight: 700;
				}

			.zox-fly-but-wrap span,
			span.zox-nav-search-but,
			h2.zox-s-title1,
			h2.zox-s-title1-feat,
			h2.zox-s-title2,
			h2.zox-s-title3,
			.zox-feat-tech2-main .zox-art-text p.zox-s-graph,
			ul.zox-post-soc-list li,
			.zox-fly-fade,
			#zox-site-main,
			.zox-art-img,
			.zox-art-img img,
			#zox-lead-top-wrap {
				-webkit-transition: all .25s;
				   -moz-transition: all .25s;
				    -ms-transition: all .25s;
				     -o-transition: all .25s;
						transition: all .25s;
				}

			#zox-fly-wrap,
			#zox-search-wrap,
			#zox-lead-top {
				-webkit-transition: -webkit-transform 0.25s ease;
				   -moz-transition: -moz-transform 0.25s ease;
				    -ms-transition: -ms-transform 0.25s ease;
				     -o-transition: -o-transform 0.25s ease;
						transition: transform 0.25s ease;
			}
			.relative,
			.zoxrel {
				position: relative;
				}

			.zox100 {
				width: 100%;
				}

			.zox-p24 {
				padding: 24px;
			}

			.zox-lh0,
			.zoxlh0 {
				line-height: 0;
			}

			.right,
			.alignright {
				float: right;
				}

			.alignright {
				margin: 20px 0 20px 20px;
				}

			.left,
			.alignleft {
				float: left;
				}

			.alignleft {
				margin: 20px 20px 20px 0;
				}

			.aligncenter {
				display: block;
				margin: 0 auto;
				}

			.zox-mob-img {
				display: none;
				}

			#zox-site,
			#zox-site-wall {
				overflow: hidden;
				width: 100%;
			}

			#zox-site-main {
				-webkit-backface-visibility: hidden;
						backface-visibility: hidden;
				width: 100%;
				z-index: 9999;
			}

			#zox-site-grid {
				display: grid;
				grid-template-columns: 100%;
				width: 100%;
			}

			#zox-main-body-wrap {
				margin: 100px 0 0;
				padding: 0 0 30px;
				width: 100%;
				min-height: 600px;
			}

			.zox-body-width,
			.zox-title-width {
				display: grid;
				grid-template-columns: 100%;
				margin: 0 auto;
				padding: 0 30px;
				width: 100%;
				max-width: 1320px;
			}

			.zox-title-width {
				padding: 0;
			}
			#zox-home-main-wrap {
				display: grid;
				grid-column-gap: 30px;
				grid-row-gap: 60px;
				grid-template-columns: 100%;
			}
			#zox-main-head-wrap {
				position: fixed;
					top: 0;
					left: 0;
				width: 100%;
				z-index: 99999;
			}
			#zox-bot-head-wrap {
				width: 100%;
			}

			#zox-bot-head-wrap,
			.zox-bot-head-menu,
			#zox-bot-head,
			#zox-bot-head-left,
			#zox-bot-head-right,
			.zox-bot-head-logo {
				height: 50px;
			}

			#zox-bot-head-wrap {
				background: #fff;
			}

			.zox-head-width {
				display: grid;
				margin: 0 auto;
				padding: 0 30px;
				width: 100%;
				max-width: 1320px;
			}

			#zox-bot-head {
				display: grid;
				grid-gap: 20px;
				grid-template-columns: 24px auto;
			}

			#zox-bot-head-left,
			#zox-bot-head-right {
				display: grid;
				align-content: center;
			}

			#zox-bot-head-left {
				width: 24px;
			}

			#zox-fly-wrap {
				position: relative;
				width: 370px;
				height: 100%;
				z-index: 999999;
			}

			.zox-fly-but-wrap {
				display: grid;
				align-content: center;
				justify-content: center;
				cursor: pointer;
				margin: 18px 0;
				position: relative;
				width: 24px;
				height: 14px;
			}

			.zox-fly-but-wrap span {
				-webkit-border-radius: 2px;
				   -moz-border-radius: 2px;
				    -ms-border-radius: 2px;
				     -o-border-radius: 2px;
						border-radius: 2px;
				background: #000;
				display: block;
				position: absolute;
					left: 0;
				-webkit-transform: rotate(0deg);
				   -moz-transform: rotate(0deg);
				    -ms-transform: rotate(0deg);
				     -o-transform: rotate(0deg);
					transform: rotate(0deg);
				-webkit-transition: .25s ease-in-out;
				   -moz-transition: .25s ease-in-out;
				    -ms-transition: .25s ease-in-out;
				     -o-transition: .25s ease-in-out;
					transition: .25s ease-in-out;
				height: 2px;
				}

			.zox-fly-but-wrap span:nth-child(1) {
				top: 0;
				width: 24px;
				}

			.zox-fly-but-wrap span:nth-child(2),
			.zox-fly-but-wrap span:nth-child(3) {
				top: 12px;
				width: 20px;
				}

			.zox-fly-but-wrap span:nth-child(4) {
				top: 6px;
				width: 16px;
				}

			#zox-fly-menu-top {
				width: 100%;
				height: 50px;
			}

			#zox-fly-menu-top .zox-fly-but-wrap {
				position: absolute;
					right: 20px;
				margin: 13px 0;
				height: 24px;
			}

			#zox-fly-menu-top .zox-fly-but-wrap span:nth-child(1),
			#zox-fly-menu-top .zox-fly-but-wrap span:nth-child(4) {
				top: .5px;
				left: 50%;
				width: 0%;
				}

			#zox-fly-menu-top .zox-fly-but-wrap span:nth-child(2) {
				-webkit-transform: rotate(45deg);
				   -moz-transform: rotate(45deg);
				    -ms-transform: rotate(45deg);
				     -o-transform: rotate(45deg);
					transform: rotate(45deg);
				width: 30px;
				}

			#zox-fly-menu-top .zox-fly-but-wrap span:nth-child(3) {
				-webkit-transform: rotate(-45deg);
				   -moz-transform: rotate(-45deg);
				    -ms-transform: rotate(-45deg);
				     -o-transform: rotate(-45deg);
					transform: rotate(-45deg);
				width: 30px;
			}

			#zox-fly-menu-wrap {
				overflow: hidden;
				width: 100%;
				}

			nav.zox-fly-nav-menu {
				padding: 0 20px;
				overflow: hidden;
				position: absolute;
				width: 100%;
				}

			nav.zox-fly-nav-menu ul {
				float: left;
				position: relative;
				width: 100%;
				}

			nav.zox-fly-nav-menu ul div.zox-mega-dropdown {
				display: none;
				}

			nav.zox-fly-nav-menu ul li {
				border-top: 1px solid rgba(255,255,255,.1);
				cursor: pointer;
				float: left;
				position: relative;
				width: 100%;
				-webkit-tap-highlight-color: rgba(0,0,0,0);
				}

			nav.zox-fly-nav-menu ul li:first-child {
				border-top: none;
				}

			nav.zox-fly-nav-menu ul li ul li:first-child {
				margin-top: 0;
				}

			nav.zox-fly-nav-menu ul li a {
				color: #fff;
				display: inline-block;
				float: left;
				font-size: 20px;
				line-height: 1;
				padding: 14px 0;
				text-transform: uppercase;
				}

			nav.zox-fly-nav-menu ul li ul.sub-menu {
				display: none;
			}

			#zox-bot-head-mid {
				width: 100%;
			}

			.zox-bot-head-logo {
				line-height: 0;
				overflow: hidden;
				padding: 0 44px 0 0;
				position: relative;
				text-align: center;
				width: 100%;
			}

			.zox-bot-head-logo,
			.zox-bot-head-logo-main {
				display: grid;
				align-content: center;
			}

			#zox-soc-mob-wrap {
				background: #fff;
				border-top: 1px solid #ddd;
				padding: 7px 0;
				width: 100%;
				height: 50px;
				}

			amp-social-share.rounded {
				border-radius: 50%;
				background-size: 80%;
				}

			.zox-soc-mob-cont {
				text-align: center;
				width: 100%;
				}

			h1.zox-logo-title,
			h2.zox-logo-title {
				display: block;
				font-size: 0;
			}
			.zox-post-top-wrap,
			.zox-post-bot-wrap {
				display: grid;
				grid-gap: 30px;
				grid-template-rows: auto;
			}

			.zox-post-width {
				margin: 0 auto;
				padding: 0 30px;
				max-width: 900px;
			}

			.zox-post-main {
				float: left;
				width: 100%;
			}

			#zox-article-wrap {
				background: #fff;
				display: grid;
				align-content: start;
				grid-gap: 30px;
				grid-template-columns: 100%;
				grid-template-rows: auto;
				padding: 30px 0;
				min-height: 700px;
			}

			.zox-post-head-wrap {
				padding: 0 40px;
			}

			h3.zox-post-cat {
				float: left;
				margin: 0 0 15px;
				width: 100%;
			}

			span.zox-post-cat {
				font-size: 1.125rem;
				text-transform: uppercase;
			}

			h1.zox-post-title {
				color: #000;
				float: left;
				Font-family: 'Heebo', sans-serif;
				font-size: 2.875rem;
				font-weight: 900;
				letter-spacing: -.02em;
				line-height: 1.15;
				word-wrap: break-word;
				text-transform: capitalize;
				width: 100%;
			}

			span.zox-post-excerpt {
				float: left;
				margin: 20px 0 0;
				width: 100%;
			}

			span.zox-post-excerpt p {
				color: #555;
				font-size: 1.25rem;
				line-height: 1.55;
			}

			.zox-post-info-wrap {
				border-top: 1px solid #ddd;
				display: grid;
				align-content: center;
				float: left;
				grid-gap: 50px;
				grid-template-columns: auto auto;
				margin: 25px 0 0;
				padding: 15px 0 0;
				width: 100%;
			}

			.zox-post-byline-wrap {
				display: grid;
				align-items: center;
				grid-gap: 14px;
				grid-template-columns: 40px auto;
				width: 100%;
			}

			.zox-post-byline-date {
				grid-template-columns: auto;
			}

			.zox-author-thumb {
				border: 3px solid #eee;
				border-radius: 50%;
				overflow: hidden;
				width: 40px;
				height: 40px;
			}

			.zox-author-info-wrap {
				color: #555;
				font-size: .875rem;
				line-height: 1;
			}

			.zox-author-name-wrap,
			.zox-author-name-wrap p,
			.zox-post-date-wrap p {
				margin: 0 5px 0 0;
			}

			.zox-author-info-wrap,
			.zox-author-name-wrap,
			.zox-author-name-wrap p,
			.zox-author-name,
			.zox-post-date-wrap,
			.zox-post-date-wrap p {
				display: inline-block;
				float: left;
			}

			.zox-post-img {
				text-align: center;
				width: 100%;
			}

			span.zox-post-img-cap {
				color: #888;
				float: right;
				font-size: .75rem;
				line-height: 1;
				padding: 8px 20px 0;
				text-align: right;
				width: 100%;
			}

			.zox-post-img-hide {
				display: none;
			}

			.zox-video-embed-wrap {
				margin-bottom: 30px;
				width: 100%;
				}

			.zox-video-embed,
			span.embed-youtube {
				overflow: hidden;
				padding-bottom: 56.25%;
				position: relative;
				text-align: center;
				width: 100%;
				height: 0;
				}

			.zox-video-embed iframe,
			.zox-video-embed object,
			.zox-video-embed embed,
			span.embed-youtube iframe,
			span.embed-youtube object,
			span.embed-youtube embed {
				position: absolute;
					top: 0;
					left: 0;
				width: 100%;
				height: 100%;
				}

			.zox-post-main-wrap {
				display: grid;
				grid-gap: 60px;
				grid-template-columns: calc(100% - 360px) 300px;
			}

			.zox-auto-post-grid .zox-post-main-wrap {
				display: block;
				grid-gap: 0;
				grid-template-columns: 100%;
			}

			.zox-post-main-wide {
				float: left;
				width: 100%;
			}

			.zox-post-bot-wrap {
				float: left;
				margin: 0 0 30px;
				width: 100%;
			}

			.zox-post-body-wrap {
				width: 100%;
			}

			.zox-post-body p {
				color: #000;
				display: block;
				font-size: 1.125rem;
				line-height: 1.55;
				margin: 0 auto 20px;
				max-width: 660px;
			}

			.zox-post-body p a {
				box-shadow: inset 0 -1px 0 0 #fff, inset 0 -2px 0 0 #ec2b8c;
				color: #000;
			}

			.zox-post-body p a:hover {
				color: #ec2b8c;
			}

			.zox-post-body pre {
				background: #f5f5f5;
				margin: 0 auto 20px;
				padding: 20px;
				max-width: 660px;
			}

			.wp-audio-shortcode {
				padding: 0 20px;
				max-width: 740px;
			}

			.page .zox-post-body p {
				max-width: none;
			}

			.zox-post-body .twitter-tweet {
				margin: 0 auto 20px;
				padding: 0 20px;
			}

			.zox-post-body iframe.instagram-media {
				margin: 0 auto 20px;
			}

			.zox-post-body ul {
				list-style: disc outside;
				padding: 0 0 20px;
				}

			.zox-post-body ol {
				list-style: decimal outside;
				padding: 0 0 20px;
				}

			.zox-post-body ul li,
			.zox-post-body ol li {
				font-size: 1.125rem;
				line-height: 1.55;
				margin-left: 50px;
				}

			.zox-post-body ul li ul,
			.zox-post-body ul li ol,
			.zox-post-body ol li ul,
			.zox-post-body ol li ol {
				padding: 0;
			}

			.zox-post-body h1,
			.zox-post-body h2,
			.zox-post-body h3,
			.zox-post-body h4,
			.zox-post-body h5,
			.zox-post-body h6 {
				font-weight: 700;
				letter-spacing: -.02em;
				line-height: 1.2;
				padding: 0 0 10px;
				overflow: hidden;
				width: 100%;
				}

			.zox-post-body h1 {
				font-size: 2rem;
				}

			.zox-post-body h2 {
				font-size: 1.75rem;
				}

			.zox-post-body h3 {
				font-size: 1.5rem;
				}

			.zox-post-body h4 {
				font-size: 1.25rem;
				}

			.zox-post-body h5 {
				font-size: 1.125rem;
				}

			.zox-post-body h6 {
				font-size: 1rem;
				}

			.single .zox-post-body ul,
			.single .zox-post-body ol,
			.single .zox-post-body h1,
			.single .zox-post-body h2,
			.single .zox-post-body h3,
			.single .zox-post-body h4,
			.single .zox-post-body h5,
			.single .zox-post-body h6 {
				margin: 0 auto;
				max-width: 660px;
			}

			.zox-post-body blockquote {
				float: left;
				margin: 20px 20px 20px 40px;
				width: calc(40% - 50px);
				max-width: 300px;
			}

			.zox-post-body blockquote p {
				color: #000;
				font-family: 'Heebo', sans-serif;;
				font-size: 2rem;
				font-weight: 900;
				letter-spacing: -.02em;
				line-height: 1.05;
				margin: 0;
				padding: 0;
				}

			.zox-post-body blockquote p cite {
				color: #555;
				display: inline-block;
				font-size: 1rem;
				font-weight: 400;
				}

			.zox-post-body dl,
			.zox-post-body address {
				margin: 0 auto 20px;
				padding: 0 20px;
				max-width: 660px;
			}

			.zox-post-body dt {
				font-weight: bold;
				margin: 5px 0;
				}

			.zox-post-body dd {
				line-height: 1.5;
				margin-left: 20px;
				}

			.zox-post-body abbr,
			.zox-post-body acronym {
				font-weight: bold;
				text-transform: uppercase;
				}

			.zox-post-body code {
				font-size: 1.1rem;
				}

			.zox-post-body sub {
				font-size: smaller;
				vertical-align: sub;
				}

			.zox-post-body sup {
				font-size: smaller;
				vertical-align: super;
				}

			.zox-post-body table {
				font-size: .9rem;
				margin: 0 auto 20px;
				padding: 0 20px;
				max-width: 740px;
				width: 100%;
				}
			.zox-post-body thead {
				background: #ccc;
				}

			.zox-post-body tbody tr {
				background: #eee;
				}

			.zox-post-body tbody tr:nth-child(2n+2) {
				background: none;
				}

			.zox-post-body td,
			.zox-post-body th {
				padding: 5px 1.5%;
				}

			.zox-post-body tr.odd {
				background: #eee;
				}

			.wp-block-image {
				margin: 30px 0 30px;
			}

			.wp-block-image .alignleft {
				margin: 0 40px 0 0;
			}

			.wp-block-image .alignright {
				margin: 0 0 0 40px;
			}

			.wp-caption {
				display: inline-block;
				line-height: 0;
				margin: 15px 0 0;
				width: 100%;
			}

			.wp-caption.alignleft,
			.wp-caption.alignright {
				margin: 20px 35px;
			}

			.wp-caption.aligncenter {
				display: block;
				margin: 0 auto;
			}

			.wp-caption.alignleft p.wp-caption-text,
			.wp-caption.alignright p.wp-caption-text {
				padding: 8px 0 0;
			}

			.wp-caption,
			.gallery-caption {
				margin-bottom: 20px;
				max-width: 100%;
				text-align: center;
				}

			.zox-post-body p.wp-caption-text,
			.zox-post-body .wp-block-image figcaption {
				color: #888;
				font-size: .75rem;
				line-height: 1;
				margin: 0 0 20px;
				padding: 8px 20px 0;
				text-align: right;
				max-width: none;
				width: 100%;
			}

			.zox-post-body .gallery {
				padding: 0 60px;
			}

			.screen-reader-text {
				clip: rect(1px, 1px, 1px, 1px);
				position: absolute;
				height: 1px;
				width: 1px;
				overflow: hidden;
				}

			.screen-reader-text:focus {
				background-color: #f1f1f1;
				border-radius: 3px;
				box-shadow: 0 0 2px 2px rgba(0, 0, 0, 0.6);
				clip: auto;
				color: #21759b;
				display: block;
				font-size: 14px;
				font-size: 0.875rem;
				font-weight: bold;
				height: auto;
				left: 5px;
				line-height: normal;
				padding: 15px 23px 14px;
				text-decoration: none;
				top: 5px;
				width: auto;
				z-index: 100000; /* Above WP toolbar. */
				}

			.sticky {
				font-weight: 700;
				}

			.posts-nav-link {
				display: none;
				}

			.zox-org-wrap {
				display: none;
				}

			.theiaPostSlider_nav {
				float: left;
				width: 100%;
				}

			.post-password-form label {
				font-size: 1rem;
				font-weight: 700;
				}

			.post-password-form p {
				font-size: 1rem;
				}

			.post-password-form {
				float: left;
				margin: 100px 0;
				text-align: center;
				width: 100%;
				}

			.post-password-form input {
			   	background: #888;
				border: none;
				color: #fff;
			    	cursor: pointer;
				font-size: 12px;
				font-weight: 700;
				line-height: 1;
				padding: 5px 10px;
				text-transform: uppercase;
				}

			.post-password-form label input {
				background: #fff;
				border: 1px solid #ddd;
				color: #000;
				margin: 0 10px;
				}

			.zox-post-body-bot {
				margin: 30px 0 0;
			}

			.zox-post-body-width {
				margin: 0 auto;
				max-width: 660px;
			}

			.zox-post-tags {
				color: #999;
				font-size: 1rem;
				line-height: 1;
				width: 100%;
				}

			.zox-post-tags a,
			.zox-post-tags a:visited {
				color: #999;
				display: inline-block;
				margin: 0 0 5px;
				position: relative;
				}

			.zox-post-tags a:hover {
				color: #333;
				}

			.zox-post-tags-header {
				color: #333;
				float: left;
				font-weight: 700;
				margin-right: 5px;
				}
			.zox-org-wrap {
				display: none;
			}

			.zox-post-ad-wrap {
				line-height: 0;
				margin: 60px auto 50px;
				position: relative;
				text-align: center;
				width: 100%;
			}

			.zox-post-ad {
				background: none;
				overflow: hidden;
				position: relative;
				width: 100%;
			}

			.zox-post-ad-in1 {
				position: relative;
				width: 100%;
			}

			.zox-post-ad-in2 {
				line-height: 0;
				position: relative;
				text-align: center;
				width: 100%;
			}

			.zox-post-ad-in2 img {
				max-height: 100vh;
			}

			.zox-post-ad-wrap span.zox-ad-label {
				color: #bbb;
				float: left;
				font-size: 10px;
				letter-spacing: 1.5px;
				line-height: 1;
				margin: -13px 0 0;
				text-align: center;
				text-transform: uppercase;
				width: 100%;
			}

			.zox-post-ad-wrap span.zox-ad-label {
				margin: -20px 0 0;
				position: absolute;
					left: 0;
					top: 0;
			}

			.editor-post-title__block .editor-post-title__input,
			.editor-styles-wrapper .wp-block-quote p,
			.wp-block-freeform.block-library-rich-text__tinymce blockquote p,
			.editor-styles-wrapper p.has-large-font-size,
			.wp-block-pullquote blockquote>.block-editor-rich-text p {
				font-family: 'Heebo', sans-serif;
				font-weight: 900;
				text-transform: capitalize;
			}

			.editor-styles-wrapper p,
			.editor-styles-wrapper ul li,
			.editor-styles-wrapper ol li,
			.wp-block-image figcaption,
			.editor-styles-wrapper .wp-block-button__link,
			.editor-styles-wrapper .wp-block-quote__citation,
			.wp-block-pullquote__citation,
			.wp-block-pullquote cite,
			.wp-block-pullquote footer,
			.wp-block-audio figcaption,
			.wp-block-video figcaption,
			.wp-block-embed figcaption,
			.wp-block-verse pre,
			pre.wp-block-verse {
				font-family: 'Roboto', sans-serif;
				font-weight: 400;
				text-transform: none;
			}

			.block-editor-rich-text__editable a,
			.wp-block-freeform.block-library-rich-text__tinymce a {
				box-shadow: inset 0 -4px 0 #ed1c24;
			}

			.wp-block-freeform.block-library-rich-text__tinymce h1,
			.wp-block-freeform.block-library-rich-text__tinymce h2,
			.wp-block-freeform.block-library-rich-text__tinymce h3,
			.wp-block-freeform.block-library-rich-text__tinymce h4,
			.wp-block-freeform.block-library-rich-text__tinymce h5,
			.wp-block-freeform.block-library-rich-text__tinymce h6,
			.wp-block-heading h1,
			.wp-block-heading h2,
			.wp-block-heading h3,
			.wp-block-heading h4,
			.wp-block-heading h5,
			.wp-block-heading h6 {
				font-family: 'Roboto', sans-serif;
				font-weight: 700;
				text-transform: uppercase;
			}

			.zox-post-more-wrap {
				margin: 30px 0 0;
			}

			.zox-post-main-head {
				margin: 0 0 20px;
			}

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

			.zox-post-more-grid {
				display: grid;
				grid-gap: 20px;
				grid-template-columns: 1fr 1fr 1fr 1fr;
				width: 100%;
			}

			.zox-post-more-wrap .zox-art-wrap {
				background: #fff;
			}

			.zox-art-text {
				padding: 15px 20px 20px;
			}

			h2.zox-s-title2 {
				font-size: .875rem;
				line-height: 1.125;
			}

			h3.zox-s-cat,
			p.zox-s-graph,
			.zox-byline-wrap {
				display: none;
			}

			.zox-auto-post-main .zox-post-more-grid {
				grid-gap: 20px;
				grid-template-columns: 1fr 1fr 1fr;
			}

			.zox-auto-post-main .zox-div4 .zox-art-img {
				padding: 0;
			}

			.zox-auto-post-main .zox-div4 .zox-art-img img {
				margin: 0;
				position: relative;
					top: auto;
					right: auto;
					bottom: auto;
					left: auto;
				min-width: 0;
			}

			.zox-post-bot-ad {
				padding: 40px 0 0;
				text-align: center;
			}
			#zox-comments-button {
				margin-top: 70px;
				text-align: center;
				width: 100%;
				}

			.zox-disqus-comm-wrap {
				display: none;
				float: left;
				width: 100%;
			}

			#zox-comments-button a,
			#zox-comments-button span.zox-comment-but-text {
				background: #000;
				border-radius: 5px;
				color: #fff;
				cursor: pointer;
				display: inline-block;
				font-size: 1rem;
				line-height: 100%;
				padding: 15px 0;
				width: 100%;
				}

			#zox-comments-button span.zox-comment-but-text i {
				margin: 0 5px 0 0;
			}

			#zox-comments-button span.zox-comment-but-text:hover {
				background: #222;
			}
			#zox-foot-wrap {
				background: #fff;
				padding: 30px;
			}

			#zox-foot-wrap:before {
				content: '';
				background: rgba(0,0,0,.03);
				position: absolute;
					left: 0;
					top: -3px;
				width: 100%;
				height: 3px;
			}

			#zox-foot-wrap p {
				color: #aaa;
				font-size: .75rem;
				line-height: 1.25;
				text-align: center;
			}

			#zox-foot-wrap a {
				color: #aaa;
			}

			.zox-foot-grid {
				display: grid;
				align-content: center;
				grid-gap: 40px;
				grid-template-columns: auto auto;
				justify-content: space-between;
				width: 100%;
			}

			.zox-foot-left-wrap {
				display: grid;
				align-content: center;
				grid-gap: 20px;
				grid-template-columns: auto auto;
				justify-content: start;
			}

			.zox-foot-logo {
				display: grid;
				align-content: center;
				justify-content: center;
			}

			.zox-foot-left {
				display: grid;
				align-content: center;
				grid-gap: 6px;
				grid-template-rows: auto auto;
			}

			.zox-foot-menu ul li {
				display: inline-block;
				float: left;
				margin: 0 0 0 10px;
				}

			.zox-foot-menu ul li:first-child {
				margin: 0;
			}

			.zox-foot-menu ul li a {
				font-size: .75rem;
				font-weight: 700;
				line-height: 1;
			}

			.zox-foot-right-wrap {
				display: grid;
				align-content: center;
			}

			ul.zox-foot-soc-list li {
				float: left;
				margin: 0 0 0 7px;
			}

			ul.zox-foot-soc-list li a {
				border: 1px solid #aaa;
				border-radius: 50%;
				display: grid;
				font-size: 14px;
				align-content: center;
				justify-content: center;
				width: 36px;
				height: 36px;
			}
			@media screen and (max-width: 767px) and (min-width: 660px) {
				.zox-post-more-grid {
					grid-template-columns: 1fr 1fr;
				}
				.zox-post-img-wrap .zox-post-width {
					padding: 0;
				}
			}
			@media screen and (max-width: 659px) and (min-width: 600px) {
				h1.zox-post-title {
					font-size: 2.5rem;
				}
				.zox-post-body blockquote {
					margin: 0;
					padding: 20px 40px;
					width: 100%;
					max-width: none;
				}
				.zox-post-body blockquote p {
					font-size: 1.5rem;
				}
				.zox-post-more-grid {
					grid-template-columns: 1fr 1fr;
				}
				.zox-post-img-wrap .zox-post-width {
					padding: 0;
				}
			}
			@media screen and (max-width: 599px) and (min-width: 480px) {
				.zox-post-head-wrap {
					padding: 0;
				}
				h1.zox-post-title {
					font-size: 2.125rem;
				}
				span.zox-post-excerpt p {
					font-size: 1rem;
				}
				.zox-post-body blockquote {
					margin: 0;
					padding: 20px 40px;
					width: 100%;
					max-width: none;
				}
				.zox-post-body blockquote p {
					font-size: 1.5rem;
				}
				.zox-post-width {
					padding: 0 20px;
				}
				.zox-post-more-grid {
					grid-template-columns: 1fr 1fr;
				}
				.zox-post-img-wrap .zox-post-width {
					padding: 0;
				}
			}
			@media screen and (max-width: 479px) {
				amp-sidebar,
				#zox-fly-wrap {
					width: 100%;
				}
				.zox-post-head-wrap {
					padding: 0;
				}
				h1.zox-post-title {
					font-size: 1.75rem;
				}
				span.zox-post-excerpt p,
				.zox-post-body p,
				.zox-post-body ul li,
				.zox-post-body ol li {
					font-size: 1rem;
				}
				h2.zox-s-title2 {
					font-size: 1.25rem;
				}
				.zox-post-body blockquote {
					margin: 0;
					padding: 20px 40px;
					width: 100%;
					max-width: none;
				}
				.zox-post-body blockquote p {
					font-size: 1.5rem;
				}
				.zox-post-width {
					padding: 0 15px;
				}
				.zox-post-ad-wrap {
					margin: 45px 0 25px -15px;
					width: calc(100% + 30px);
				}
				.zox-post-ad-wrap span.zox-ad-label {
					background: #000;
					padding: 5px 0;
				}
				.zox-post-more-grid {
					grid-template-columns: 100%;
				}
				.zox-post-img-wrap .zox-post-width {
					padding: 0;
				}
			}

			<?php do_action( 'amp_post_template_css', $this ); ?>
		</style>
	</head>
	<body <?php body_class(''); ?>>
		<?php get_template_part('parts/amp/amp', 'menu'); ?>
		<div id="zox-site" class="left zoxrel">
			<div id="zox-site-wall" class="left zoxrel">
				<div id="zox-site-main" class="left zoxrel">
					<header id="zox-main-head-wrap" class="left zoxrel zox-trans-head">
						<div id="zox-bot-head-wrap" class="left zoxrel">
							<div class="zox-post-width">
								<div id="zox-bot-head">
									<div id="zox-bot-head-left">
										<div class="zox-fly-but-wrap zoxrel ampstart-btn caps m2" on="tap:sidebar.toggle" role="button" tabindex="0">
											<span></span>
											<span></span>
											<span></span>
											<span></span>
										</div><!--zox-fly-but-wrap-->
									</div><!--zox-bot-head-left-->
									<div id="zox-bot-head-mid" class="relative">
										<div class="zox-bot-head-logo">
											<div class="zox-bot-head-logo-main">
												<?php if(get_option('zox_logo_nav')) { ?>
													<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><amp-img src="<?php echo esc_url(get_option('zox_logo_nav')); ?>" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" width="<?php echo esc_html(get_option('zox_logow')); ?>" height="30" layout="fixed"></amp-img></a>
												<?php } else { ?>
													<?php $zox_feat_layout = get_option('zox_feat_layout'); $zox_skin = get_option('zox_skin'); if (($zox_skin == "2") || ( $zox_skin == "1" && $zox_feat_layout == "2")) { ?>
														<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><amp-img src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-nav-ent1.png" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" width="<?php echo esc_html(get_option('zox_logow')); ?>" height="30" layout="fixed"></amp-img></a>
													<?php } else if (($zox_skin == "3") || ( $zox_skin == "1" && $zox_feat_layout == "3")) { ?>
														<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><amp-img src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-nav-ent2.png" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" width="<?php echo esc_html(get_option('zox_logow')); ?>" height="30" layout="fixed"></amp-img></a>
													<?php } else if (($zox_skin == "4") || ( $zox_skin == "1" && $zox_feat_layout == "3")) { ?>
														<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><amp-img src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-nav-ent3.png" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" width="<?php echo esc_html(get_option('zox_logow')); ?>" height="30" layout="fixed"></amp-img></a>
													<?php } else if (($zox_skin == "5") || ( $zox_skin == "1" && $zox_feat_layout == "5")) { ?>
														<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><amp-img src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-nav-net1.png" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" width="<?php echo esc_html(get_option('zox_logow')); ?>" height="30" layout="fixed"></amp-img></a>
													<?php } else if (($zox_skin == "6") || ( $zox_skin == "1" && $zox_feat_layout == "6")) { ?>
														<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><amp-img src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-nav-net2.png" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" width="<?php echo esc_html(get_option('zox_logow')); ?>" height="30" layout="fixed"></amp-img></a>
													<?php } else if (($zox_skin == "7") || ( $zox_skin == "1" && $zox_feat_layout == "7")) { ?>
														<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><amp-img src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-nav-net3.png" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" width="<?php echo esc_html(get_option('zox_logow')); ?>" height="30" layout="fixed"></amp-img></a>
													<?php } else if (($zox_skin == "8") || ( $zox_skin == "1" && $zox_feat_layout == "8")) { ?>
														<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><amp-img src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-nav-sport1.png" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" width="<?php echo esc_html(get_option('zox_logow')); ?>" height="30" layout="fixed"></amp-img></a>
													<?php } else if (($zox_skin == "9" || $zox_skin == "10") || ( $zox_skin == "1" && $zox_feat_layout == "9") || ( $zox_skin == "1" && $zox_feat_layout == "10")) { ?>
														<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><amp-img src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-nav-sport2.png" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" width="<?php echo esc_html(get_option('zox_logow')); ?>" height="30" layout="fixed"></amp-img></a>
													<?php } else if (($zox_skin == "11") || ( $zox_skin == "1" && $zox_feat_layout == "11")) { ?>
														<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><amp-img src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-nav-fash1.png" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" width="<?php echo esc_html(get_option('zox_logow')); ?>" height="30" layout="fixed"></amp-img></a>
													<?php } else if (($zox_skin == "12") || ( $zox_skin == "1" && $zox_feat_layout == "11")) { ?>
														<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><amp-img src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-nav-fash2.png" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" width="<?php echo esc_html(get_option('zox_logow')); ?>" height="30" layout="fixed"></amp-img></a>
													<?php } else if ($zox_skin == "13" || ( $zox_skin == "1" && $zox_feat_layout == "13")) { ?>
														<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><amp-img src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-nav-fash3.png" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" width="<?php echo esc_html(get_option('zox_logow')); ?>" height="30" layout="fixed"></amp-img></a>
													<?php } else if ($zox_skin == "14" || ( $zox_skin == "1" && $zox_feat_layout == "13")) { ?>
														<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><amp-img src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-nav-tech1.png" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" width="<?php echo esc_html(get_option('zox_logow')); ?>" height="30" layout="fixed"></amp-img></a>
													<?php } else if ($zox_skin == "15" || ( $zox_skin == "1" && $zox_feat_layout == "15")) { ?>
														<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><amp-img src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-nav-tech2.png" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" width="<?php echo esc_html(get_option('zox_logow')); ?>" height="30" layout="fixed"></amp-img></a>
													<?php } else if ($zox_skin == "16" || ( $zox_skin == "1" && $zox_feat_layout == "16")) { ?>
														<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><amp-img src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-nav-tech3.png" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" width="<?php echo esc_html(get_option('zox_logow')); ?>" height="30" layout="fixed"></amp-img></a>
													<?php } else { ?>
														<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><amp-img src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-nav-ent1.png" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" width="<?php echo esc_html(get_option('zox_logow')); ?>" height="30" layout="fixed"></amp-img></a>
													<?php } ?>
												<?php } ?>
											</div><!--zox-bot-head-logo-main-->
											<h2 class="zox-logo-title"><?php bloginfo( 'name' ); ?></h2>
										</div><!--zox-bot-head-logo-->
									</div><!--zox-bot-head-mid-->
								</div><!--zox-bot-head-->
							</div><!--zox-post-width-->
						</div><!--zox-bot-head-wrap-->
						<div id="zox-soc-mob-wrap" class="left relative">
							<div class="zox-post-width">
								<div class="zox-soc-mob-cont">
									<?php $zox_amp_fb = get_option('zox_amp_fb'); if ($zox_amp_fb) { ?>
										<amp-social-share class="rounded" type="facebook" width="36" height="36" data-param-app_id="<?php echo esc_html($zox_amp_fb); ?>"></amp-social-share>
									<?php } ?>
									<amp-social-share class="rounded" type="twitter" width="36" height="36"></amp-social-share>
									<amp-social-share class="rounded" type="pinterest" data-param-media="<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'zox-post-thumb' ); echo esc_url($thumb['0']); ?>" width="36" height="36"></amp-social-share>
									<amp-social-share class="rounded" type="whatsapp" width="36" height="36"></amp-social-share>
									<amp-social-share class="rounded" type="email" width="36" height="36"></amp-social-share>
								</div><!--zox-soc-mob-cont-->
							</div><!--zox-head-width-->
						</div><!--zox-soc-mob-wrap-->
					</header><!---zox-main-header-wrap-->
					<div id="zox-site-grid">
						<div id="zox-site-wall-small">
							<div id="zox-main-body-wrap" class="left relative">
								<article id="post-<?php echo get_the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/NewsArticle">
									<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
										<div id="zox-article-wrap" class="zoxrel left zox100">
											<meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="<?php the_permalink(); ?>"/>
											<div class="zox-post-top-wrap zoxrel left zox100">
												<div class="zox-post-title-wrap zox-tit2">
													<div class="zox-post-width">
														<header class="zox-post-head-wrap left zoxrel zox100">
															<div class="zox-post-head zoxrel">
																<h3 class="zox-post-cat">
																	<a class="zox-post-cat-link" href="<?php $category = get_the_category(); $category_id = get_cat_ID( $category[0]->cat_name ); $category_link = get_category_link( $category_id ); echo esc_url( $category_link ); ?>"><span class="zox-post-cat"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span></a>
																</h3>
																<h1 class="zox-post-title left entry-title" itemprop="headline"><?php the_title(); ?></h1>
																<?php if ( has_excerpt() ) { ?>
																	<span class="zox-post-excerpt"><?php the_excerpt(); ?></span>
																<?php } ?>
																<div class="zox-post-info-wrap">
																	<?php $zox_author_info = get_option('zox_author_info'); if ($zox_author_info == "2") { ?>
																		<div class="zox-post-byline-wrap zox-post-byline-date">
																			<div class="zox-author-info-wrap">
																				<div class="zox-post-date-wrap">
																					<p><?php esc_html_e( 'Published', 'zoxpress' ); ?></p> <span class="zox-post-date updated"><time class="post-date updated" itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>"><?php if ( zox_post_date(7) ) { ?><?php the_time(get_option('date_format')); ?><?php } else { ?><?php printf( esc_html__( '%s ago', 'zoxpress' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?><?php } ?></time></span>
																					<meta itemprop="dateModified" content="<?php the_modified_date('Y-m-d'); ?>"/>
																				</div><!--zox-post-date-wrap-->
																			</div><!--zox-author-info-wrap-->
																		</div><!--zox-post-byline-wrap-->
																	<?php } else { ?>
																		<div class="zox-post-byline-wrap">
																			<div class="zox-author-thumb">
																				<amp-img src="<?php echo esc_url(get_avatar_url( get_the_author_meta('email') )); ?>" width="40" height="40"  layout="responsive"></amp-img>
																			</div><!--zox-author-thumb-->
																			<div class="zox-author-info-wrap">
																				<div class="zox-author-name-wrap" itemprop="author" itemscope itemtype="https://schema.org/Person">
																					<p><?php esc_html_e( 'By', 'zoxpress' ); ?></p><span class="zox-author-name vcard fn author" itemprop="name"><?php the_author_posts_link(); ?></span>
																				</div><!--zox-author-name-wrap-->
																				<div class="zox-post-date-wrap">
																					<p><?php esc_html_e( 'Published', 'zoxpress' ); ?></p> <span class="zox-post-date updated"><time class="post-date updated" itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>"><?php if ( zox_post_date(7) ) { ?><?php the_time(get_option('date_format')); ?><?php } else { ?><?php printf( esc_html__( '%s ago', 'zoxpress' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?><?php } ?></time></span>
																					<meta itemprop="dateModified" content="<?php the_modified_date('Y-m-d'); ?>"/>
																				</div><!--zox-post-date-wrap-->
																			</div><!--zox-author-info-wrap-->
																		</div><!--zox-post-byline-wrap-->
																	<?php } ?>
																</div><!--zox-post-info-wrap-->
															</div><!--zox-post-head-->
														</header><!--zox-post-head-wrap-->
													</div><!--zox-post-width-->
												</div><!--zox-post-title-wrap-->
												<div class="zox-post-img-wrap">
													<div class="zox-post-width">
														<?php $zox_featured_img = get_option('zox_featured_img'); $zox_show_hide = get_post_meta($post->ID, "zox_featured_image", true);
															if (
																(empty($zox_show_hide) && empty($zox_featured_img)) ||
																(empty($zox_show_hide) && $zox_featured_img == "1") ||
																($zox_show_hide == "global" && empty($zox_featured_img)) ||
																($zox_show_hide == "global" && $zox_featured_img == "1") ||
																$zox_show_hide == "show" ||
																empty($zox_featured_img)
															){ ?>
															<?php if(get_post_meta($post->ID, "zox_video_embed", true)) { ?>
																<div class="zox-video-embed-wrap left zoxrel">
																	<div class="zox-video-embed-cont left zoxrel">
																		<span class="zox-video-close fas fa-times"></span>
																		<div class="zox-video-embed left zoxrel">
																			<?php echo html_entity_decode(get_post_meta($post->ID, "zox_video_embed", true)); ?>
																		</div><!--zox-video-embed-->
																	</div><!--zox-video-embed-cont-->
																</div><!--zox-video-embed-wrap-->
																<div class="zox-post-img-hide" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
																	<?php $thumb_id = get_post_thumbnail_id(); $zox_thumb_array = wp_get_attachment_image_src($thumb_id, 'zox-post-thumb', true); $zox_thumb_url = $zox_thumb_array[0]; $zox_thumb_width = $zox_thumb_array[1]; $zox_thumb_height = $zox_thumb_array[2]; ?>
																	<meta itemprop="url" content="<?php echo esc_url($zox_thumb_url) ?>">
																	<meta itemprop="width" content="<?php echo esc_html($zox_thumb_width) ?>">
																	<meta itemprop="height" content="<?php echo esc_html($zox_thumb_height) ?>">
																</div><!--zox-post-img-hide-->
															<?php } else { ?>
																<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
																	<div class="zox-post-img left zoxrel zoxlh0" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
																		<?php $thumb_id = get_post_thumbnail_id(); $zox_thumb_array = wp_get_attachment_image_src($thumb_id, 'zox-post-thumb', true); $zox_thumb_url = $zox_thumb_array[0]; $zox_thumb_width = $zox_thumb_array[1]; $zox_thumb_height = $zox_thumb_array[2]; ?>
																		<amp-img src="<?php echo esc_url($zox_thumb_url) ?>" width="<?php echo esc_html($zox_thumb_width) ?>" height="<?php echo esc_html($zox_thumb_height) ?>" layout="responsive"></amp-img>
																		<meta itemprop="url" content="<?php echo esc_url($zox_thumb_url) ?>">
																		<meta itemprop="width" content="<?php echo esc_html($zox_thumb_width) ?>">
																		<meta itemprop="height" content="<?php echo esc_html($zox_thumb_height) ?>">
																	</div><!--zox-post-img-->
																<?php } ?>
																<?php if ( $zox_caption = get_post( get_post_thumbnail_id() )->post_excerpt ); { ?>
																	<span class="zox-post-img-cap"><?php echo esc_html($zox_caption); ?></span>
																<?php } ?>
															<?php } ?>
														<?php } else { ?>
															<div class="zox-post-img-hide" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
																<?php $thumb_id = get_post_thumbnail_id(); $zox_thumb_array = wp_get_attachment_image_src($thumb_id, 'zox-post-thumb', true); $zox_thumb_url = $zox_thumb_array[0]; $zox_thumb_width = $zox_thumb_array[1]; $zox_thumb_height = $zox_thumb_array[2]; ?>
																<meta itemprop="url" content="<?php echo esc_url($zox_thumb_url) ?>">
																<meta itemprop="width" content="<?php echo esc_html($zox_thumb_width) ?>">
																<meta itemprop="height" content="<?php echo esc_html($zox_thumb_height) ?>">
															</div><!--zox-post-img-hide-->
														<?php } ?>
													</div><!--zox-post-width-->
												</div><!--zox-post-img-wrap-->
											</div><!--zox-post-top-wrap-->
											<div class="zox-post-main-grid">
												<div class="zox-post-width">
													<div class="zox-post-main">
														<div class="zox-post-body-wrap left zoxrel">
															<div class="zox-post-body left zoxrel zox100">
																<?php echo html_entity_decode($this->get( 'post_amp_content' )); ?>
																<?php wp_link_pages(); ?>
															</div><!--zox-post-body-->
															<div class="zox-post-body-bot left zoxrel zox100">
																<div class="zox-post-body-width">
																	<div class="zox-post-tags left zoxrel zox100">
																		<span class="zox-post-tags-header"><?php esc_html_e( 'In this article:', 'zoxpress' ); ?></span><span itemprop="keywords"><?php the_tags('',', ','') ?></span>
																	</div><!--zox-post-tags-->
																	<div class="zox-org-wrap" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
																		<div class="zox-org-logo" itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
																			<?php if(get_option('zox_logo_nav')) { ?>
																				<amp-img src="<?php echo esc_url(get_option('zox_logo_nav')); ?>" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" width="<?php echo esc_html(get_option('zox_logow')); ?>" height="30" layout="fixed"></amp-img>
																				<meta itemprop="url" content="<?php echo esc_url(get_option('zox_logo_nav')); ?>">
																			<?php } else { ?>
																				<amp-img src="<?php echo get_template_directory_uri(); ?>/images/logos/logo-nav-ent1.png" alt="<?php bloginfo( 'name' ); ?>" data-rjs="2" width="<?php echo esc_html(get_option('zox_logow')); ?>" height="30" layout="fixed"></amp-img>
																				<meta itemprop="url" content="<?php echo get_template_directory_uri(); ?>/images/logos/logo-nav-ent1.png">
																			<?php } ?>
																		</div><!--zox-org-logo-->
																		<meta itemprop="name" content="<?php bloginfo( 'name' ); ?>">
																	</div><!--zox-org-wrap-->
																	<?php if ( comments_open() ) { ?>
																		<?php $disqus_id = get_option('zox_disqus_id'); if ($disqus_id) { if (isset($disqus_id)) {  ?>
																			<a href="<?php the_permalink() ?>/#zox-comments-button">
																			<div id="zox-comments-button" class="left relative">
																				<span class="zox-comment-but-text"><?php comments_number(__( 'Comments', 'zoxpress'), esc_html__('Comments', 'zoxpress'), esc_html__('Comments', 'zoxpress')); ?></span>
																			</div><!--zox-comments-button-->
																			</a>
																		<?php } } else { ?>
																			<a href="<?php the_permalink() ?>/#zox-comments-button">
																			<div id="zox-comments-button" class="left relative">
																				<span class="zox-comment-but-text"><?php comments_number(__( 'Click to comment', 'zoxpress'), esc_html__('1 Comment', 'zoxpress'), esc_html__('% Comments', 'zoxpress'));?></span>
																			</div><!--zox-comments-button-->
																			</a>
																		<?php } ?>
																	<?php } ?>
																</div><!--zox-post-body-width-->
															</div><!--zox-post-body-bot-->
														</div><!--zox-post-body-wrap-->
													</div><!--zox-post-main-->
												</div><!--zox-post-width-->
											</div><!--zox-post-main-grid-->
											<?php setCrunchifyPostViews(get_the_ID()); ?>
										</div><!--zox-article-wrap-->
										<?php $zox_more_posts = get_option('zox_more_posts'); if ($zox_more_posts == "1" || $zox_more_posts == "2") { ?>
											<div class="zox-post-more-wrap left zoxrel zox100">
												<div class="zox-post-width">
													<div class="zox-post-more left zoxrel zox100">
														<div class="zox-post-main-head left zoxrel zox100">
															<h4 class="zox-post-main-title">
																<span class="zox-post-main-title"><?php echo esc_html(get_option('zox_more_head')); ?></span>
															</h4>
														</div><!--zox-widget-main-head-->
														<?php $zox_more_posts = get_option('zox_more_posts'); if ($zox_more_posts == "1") { ?>
															<div class="zox-post-more-grid zox-div4 left zoxrel zox100">
																<?php global $post; $zox_related_num = get_option('zox_related_num'); $pop_days = esc_html(get_option('zox_pop_days')); $popular_days_ago = "$pop_days days ago"; $recent = new WP_Query(array('posts_per_page' => $zox_related_num, 'ignore_sticky_posts'=> 1, 'post__not_in' => array( $post->ID ), 'orderby' => 'meta_value_num', 'order' => 'DESC', 'meta_key' => 'post_views_count', 'date_query' => array( array( 'after' => $popular_days_ago )) )); while($recent->have_posts()) : $recent->the_post(); ?>
																	<div class="zox-art-wrap zoxrel zox-art-mid">
																		<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
																			<div class="zox-art-grid">
																				<div class="zox-art-img zoxrel zox100 zoxlh0">
																					<a href="<?php the_permalink(); ?>" rel="bookmark">
																					<?php $thumb_id = get_post_thumbnail_id(); $zox_thumb_array = wp_get_attachment_image_src($thumb_id, 'zox-mid-thumb', true); $zox_thumb_url = $zox_thumb_array[0]; $zox_thumb_width = $zox_thumb_array[1]; $zox_thumb_height = $zox_thumb_array[2]; ?>
																					<amp-img class="zox-reg-img" src="<?php echo esc_url($zox_thumb_url) ?>" width="<?php echo esc_html($zox_thumb_width) ?>" height="<?php echo esc_html($zox_thumb_height) ?>" layout="responsive"></amp-img>
																					<?php $thumb_id = get_post_thumbnail_id(); $zox_thumb_array = wp_get_attachment_image_src($thumb_id, 'zox-small-thumb', true); $zox_thumb_url = $zox_thumb_array[0]; $zox_thumb_width = $zox_thumb_array[1]; $zox_thumb_height = $zox_thumb_array[2]; ?>
																					<amp-img class="zox-mob-img" src="<?php echo esc_url($zox_thumb_url) ?>" width="<?php echo esc_html($zox_thumb_width) ?>" height="<?php echo esc_html($zox_thumb_height) ?>" layout="responsive"></amp-img>
																					</a>
																				</div><!--zox-art-img-->
																				<div class="zox-art-text">
																					<div class="zox-art-text-cont">
																						<h3 class="zox-s-cat"><span class="zox-s-cat"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span></h3>
																						<div class="zox-art-title">
																							<a href="<?php the_permalink(); ?>" rel="bookmark">
																							<h2 class="zox-s-title2"><?php the_title(); ?></h2>
																							</a>
																						</div><!--zox-art-title-->
																						<p class="zox-s-graph"><?php echo wp_trim_words( get_the_excerpt(), 24, '...' ); ?></p>
																						<div class="zox-byline-wrap">
																							<span class="zox-byline-name"><?php the_author_posts_link(); ?></span><span class="zox-byline-date"><i class="far fa-clock"></i><?php if ( zox_post_date(7) ) { ?><?php the_time(get_option('date_format')); ?><?php } else { ?><?php printf( esc_html__( '%s ago', 'zoxpress' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?><?php } ?></span>
																						</div><!--zox-byline-wrap-->
																					</div><!--zox-art-text-cont-->
																				</div><!--zox-art-text-->
																			</div><!--zox-art-grid-->
																		<?php } else { ?>
																			<div class="zox-art-text">
																				<div class="zox-art-text-cont">
																					<h3 class="zox-s-cat"><span class="zox-s-cat"><?php $category = get_the_category(); echo esc_html( $category[0]->cat_name ); ?></span></h3>
																					<div class="zox-art-title">
																						<a href="<?php the_permalink(); ?>" rel="bookmark">
																						<h2 class="zox-s-title2"><?php the_title(); ?></h2>
																						</a>
																					</div><!--zox-art-title-->
																					<p class="zox-s-graph"><?php echo wp_trim_words( get_the_excerpt(), 24, '...' ); ?></p>
																					<div class="zox-byline-wrap">
																						<span class="zox-byline-name"><?php the_author_posts_link(); ?></span><span class="zox-byline-date"><i class="far fa-clock"></i><?php if ( zox_post_date(7) ) { ?><?php the_time(get_option('date_format')); ?><?php } else { ?><?php printf( esc_html__( '%s ago', 'zoxpress' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?><?php } ?></span>
																					</div><!--zox-byline-wrap-->
																				</div><!--zox-art-text-cont-->
																			</div><!--zox-art-text-->
																		<?php } ?>
																	</div><!--zox-art-wrap-->
																<?php endwhile; wp_reset_postdata(); ?>
															</div><!--zox-post-more-grid-->
														<?php } else if ($zox_more_posts == "2") { ?>
															<?php zox_RelatedPosts(); ?>
														<?php } ?>
													</div><!--zox-post-more-->
												</div><!--zox-post-width-->
											</div><!--zox-post-more-wrap-->
										<?php } ?>
									<?php endwhile; endif; ?>
								</article><!--zox-post-wrap-->
							</div><!--zox-main-body-wrap-->
							<footer id="zox-foot-wrap" class="left zoxrel zox100">
								<div class="zox-body-width">
									<p><?php echo wp_kses_post(get_option('zox_copyright')); ?></p>
								</div>
							</footer><!--zox-foot-wrap-->
						</div><!--zox-site-wall-small-->
					</div><!--zox-site-grid-->
				</div><!--zox-site-main-->
			</div><!--zox-site-wall-->
			<div class="zox-fly-top back-to-top">
				<span class="fas fa-angle-up"></span>
			</div><!--zox-fly-top-->
		</div><!--zox-site-->
		<?php do_action( 'amp_post_template_footer', $this ); ?>
	</body>
</html>