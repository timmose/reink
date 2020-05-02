<?php
/*
Plugin Name: Detect AdBlock
Plugin URI: http://wp-plugins.in/DetectAdBlock
Description: Detect AdBlock and prevent browsing using PHP Cookie and Session when the visitor has AdBlock in the browser. Easy to use, just install the plugin and activate it.
Version: 1.0.0
Author: Alobaidi
Author URI: http://wp-plugins.in
License: GPLv2 or later
*/

/*  Copyright 2016 Alobaidi (email: wp-plugins@outlook.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


defined('ABSPATH') or die('Silence is Golden.');


function Detect_AdBlock_plugin_row_meta($links, $file) {
	if ( strpos( $file, 'detect-adblock.php' ) !== false ) {
		$new_links = array(
							'<a href="http://wp-plugins.in/DetectAdBlock" target="_blank">Explanation of Use</a>',
							'<a href="https://profiles.wordpress.org/alobaidi#content-plugins" target="_blank">More Plugins</a>',
							'<a href="http://www.elegantthemes.com/affiliates/idevaffiliate.php?id=24967&url=19686&tid1=inside_plugin_meta" target="_blank">Elegant Themes</a>',
							'<a href="https://www.bluehost.com/track/wptime" target="_blank">Bluehost</a>'
						);
		
		$links = array_merge( $links, $new_links );
	}
	return $links;
}
add_filter( 'plugin_row_meta', 'Detect_AdBlock_plugin_row_meta', 10, 2 );


function Detect_AdBlock_plugin_action_links($actions, $plugin_file){
	static $plugin;

	if ( !isset($plugin) ){
		$plugin = plugin_basename(__FILE__);
	}
		
	if ($plugin == $plugin_file) {
		$settings_link = '<a href="'.admin_url('options-general.php?page=oba_detect_adblock_settings').'">Settings</a>';
		$settings = array($settings_link);
		$actions = array_merge($settings, $actions);
	}
	
	return $actions;
}
add_filter( 'plugin_action_links', 'Detect_AdBlock_plugin_action_links', 10, 5 );


require_once dirname( __FILE__ ). '/settings.php';


function Detect_AdBlock_session(){
	if( !session_id() ){
		session_start();
	}
}
add_action('init', 'Detect_AdBlock_session', 0);


function Detect_AdBlock_user_role($role_name){
    if( is_user_logged_in() ){
        $get_user_id = get_current_user_id();
        $get_user_data = get_userdata($get_user_id);
        $get_roles = implode($get_user_data->roles);
        if( $role_name == $get_roles ){
            return true;
        }
    }
}


function Detect_AdBlock_head_script(){

	if( get_option('oba_dab_ex_admin') and Detect_AdBlock_user_role('administrator') ){
		return false;
	}

	if( get_option('oba_dab_ex_editor') and Detect_AdBlock_user_role('editor') ){
		return false;
	}

	if( get_option('oba_dab_ex_author') and Detect_AdBlock_user_role('author') ){
		return false;
	}

	if( get_option('oba_dab_ex_con') and Detect_AdBlock_user_role('contributor') ){
		return false;
	}

	if( get_option('oba_dab_ex_sub') and Detect_AdBlock_user_role('subscriber') ){
		return false;
	}

	if( get_option('oba_dab_ex_any_logged') and is_user_logged_in() ){
		return false;
	}

	if( get_option('oba_dab_ex_any_visitor') and !is_user_logged_in() ){
		return false;
	}

	$url_js = esc_js( home_url('/?alobaidi_detect_adblock=true') );

	$url_attr = esc_attr( home_url('/?alobaidi_detect_adblock=true') );

	?>
		<script type="text/javascript" src="<?php echo plugins_url( '/js/ads.js', __FILE__ ); ?>"></script>
		<script type="text/javascript">
			if( window.AlobaidiDetectAdBlock === undefined ){
        		window.location = "<?php echo $url_js; ?>";
      		}
		</script>
	<?php

}
add_action('wp_head', 'Detect_AdBlock_head_script', 0);


function Detect_AdBlock_message(){
	ob_start();

	$url = home_url('/?alobaidi_detect_adblock=false');
	$title = get_option('oba_dab_op_title');

	if( get_option('oba_dab_op_title') ){
		$title = get_option('oba_dab_op_title');
	}else{
		$title = "AdBlock Detected!";
	}

	$link_b = '<a href="'.esc_url($url).'">';
	$link_a = '</a>';

	if( get_option('oba_dab_op_message') ){
		$get_message = get_option('oba_dab_op_message');
		$str_replace = str_replace(array('%_', '_%'), array($link_b, $link_a), $get_message);
		$message = $str_replace;
	}else{
		$message = 'Please disable AdBlock in the browser and <a href="'.esc_url($url).'">click here</a> to visit my website.';
	}

	if( isset($_GET['alobaidi_detect_adblock']) and $_GET['alobaidi_detect_adblock'] == 'preview' ){
		$preview = ' (preview)';
	}else{
		$preview = null;
	}

	?>
		<h1><?php echo $title.$preview; ?></h1>
		<p><?php echo $message; ?></p>
	<?php

	return ob_get_clean();
}


function Detect_AdBlock_redirect(){

	if( !get_option('adab_cookie_name') ){
		$cookie = md5( home_url()."alobaidi_detect_adblock" );
		update_option('adab_cookie_name', $cookie);
	}

	if( isset($_GET['alobaidi_detect_adblock']) and $_GET['alobaidi_detect_adblock'] == 'preview' ){
		if( get_option('oba_dab_op_title') ){
			$title = get_option('oba_dab_op_title');
		}else{
			$title = "AdBlock Detected!";
		}

		$message = Detect_AdBlock_message();

		wp_die($message, $title." (preview)");
	}

	if( isset($_GET['alobaidi_detect_adblock']) and $_GET['alobaidi_detect_adblock'] == 'false' ){
		$cookie_name = get_option('adab_cookie_name');
		setcookie($cookie_name, $cookie_name, time() - 3600 * 24, '/');
		unset($_SESSION['alobaidi_detect_adblock']);
		wp_redirect( home_url(), 301 );
		exit();
	}

	$cookie_name = get_option('adab_cookie_name');

	if( isset($_SESSION['alobaidi_detect_adblock']) or isset($_COOKIE[$cookie_name]) ){
		if( get_option('oba_dab_op_title') ){
			$title = get_option('oba_dab_op_title');
		}else{
			$title = "AdBlock Detected!";
		}

		$message = Detect_AdBlock_message();

		wp_die($message, $title);
	}

	if( isset($_GET['alobaidi_detect_adblock']) and $_GET['alobaidi_detect_adblock'] == 'true' ){
		if( !isset($_SESSION['alobaidi_detect_adblock']) ){
			$_SESSION['alobaidi_detect_adblock'] = 1;
		}

		if( !isset($_COOKIE[$cookie_name]) ){
			setcookie($cookie_name, $cookie_name, time() + 3600 * 24, '/');
		}

		if( get_option('oba_dab_op_title') ){
			$title = get_option('oba_dab_op_title');
		}else{
			$title = "AdBlock Detected!";
		}
			
		$message = Detect_AdBlock_message();
		wp_die($message, $title);
	}

}
add_action('template_redirect', 'Detect_AdBlock_redirect');