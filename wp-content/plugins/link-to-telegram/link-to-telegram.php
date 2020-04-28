<?php
/*
Plugin Name: Link To Telegram
Version: 1.0.6
Description: Popup For Your Telegram Channel
Plugin URI: http://www.barfaraz.ir
Author: Mohammad Reza Javadi
Author URI: http://www.mohammad-reza.ir
*/

ob_start();

function ltteleg_get_general_default_options() {
	$options = array(
		'enable' => 0,
		'channel_type' => 1,
		'popup_type' => 2,
		'channel_username' => 'tcanal',
		'private_link' => 'https://t.me/joinchat/AAAAAEQFPJaDTygYmcrFfA',
		'once' => 1,
		'only_on_mobile' => 0,
	);
	return $options;
}

function ltteleg_get_modal_default_options() {
	$options = array(
		'modal_skin' => 1,
		'overlay_background' => 'rgba(1,1,1,0.75)',
		'modal_image' => plugins_url( 'assets/images/modal-img.jpg', __FILE__ ),
		'modal_title' => 'ALLCHANNELS',
		'modal_text' => 'You can now follow us on telegram channel.',
		'button_text' => 'JOIN CHANNEL',
		'close_text' => 'CLOSE',
	);
	return $options;
}

$general_opt = get_option( 'ltteleg_general' );
$modal_opt = get_option( 'ltteleg_modal' );

add_action( 'admin_enqueue_scripts', 'ltteleg_admin_enqueue_scripts' );
function ltteleg_admin_enqueue_scripts() {
	if (isset($_GET['page']) && $_GET['page'] == 'ltteleg-modal-settings') {
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker-alpha', plugins_url( 'assets/js/wp-color-picker-alpha.js', __FILE__ ), array( 'wp-color-picker' ) );
		
		wp_enqueue_media();
		wp_enqueue_script( 'ltteleg-backend', plugins_url( 'assets/js/backend.js', __FILE__ ), array( 'jquery' ) );
	}
}

add_action( 'wp_enqueue_scripts', 'ltteleg_enqueue_scripts' );
function ltteleg_enqueue_scripts() {
	if( ltteleg_once_check() == true ) return;
	
	global $general_opt;

	if( $general_opt['popup_type'] == 2 ) {
		if( $general_opt['only_on_mobile'] == 1 ) {
			if( wp_is_mobile() ) {
				wp_enqueue_style( 'ltteleg-frontend', plugins_url( 'assets/css/frontend.css', __FILE__ ) );
				if( get_locale() == 'fa_IR' ) {
					wp_enqueue_style( 'ltteleg-fa', plugins_url( 'assets/css/fa.css', __FILE__ ) );
				} else {
					wp_enqueue_style( 'ltteleg-google-font', 'https://fonts.googleapis.com/css?family=Lato:300' );
				}
				wp_enqueue_script( 'ltteleg-frontend', plugins_url( 'assets/js/frontend.js', __FILE__ ) , array( 'jquery' ), '', true );
			}
		} else {
			wp_enqueue_style( 'ltteleg-frontend', plugins_url( 'assets/css/frontend.css', __FILE__ ) );
			if( get_locale() == 'fa_IR' ) {
				wp_enqueue_style( 'ltteleg-fa', plugins_url( 'assets/css/fa.css', __FILE__ ) );
			} else {
				wp_enqueue_style( 'ltteleg-google-font', 'https://fonts.googleapis.com/css?family=Lato:300' );
			}
			wp_enqueue_script( 'ltteleg-frontend', plugins_url( 'assets/js/frontend.js', __FILE__ ) , array( 'jquery' ), '', true );
		}
	}
}

add_action( 'init', 'ltteleg_load_textdomain' );
function ltteleg_load_textdomain() {
	load_plugin_textdomain( 'link-to-telegram', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}

add_action( 'admin_menu', 'ltteleg_add_admin_menu' );
function ltteleg_add_admin_menu() {
	add_menu_page( __( 'Link To Telegram', 'link-to-telegram' ), 'Link To Telegram', '', 'ltteleg', 'ltteleg_options_page', plugins_url( '/assets/images/icon.png', __FILE__ ) );
	add_submenu_page( 'ltteleg', 'Link To Telegram' . ' - ' . __( 'General Settings', 'link-to-telegram' ), __( 'General Settings', 'link-to-telegram' ), 'manage_options', 'ltteleg-general-settings', 'ltteleg_general_settings_page' );
	add_submenu_page( 'ltteleg', 'Link To Telegram' . ' - ' . __( 'Modal Settings', 'link-to-telegram' ), __( 'Modal Settings', 'link-to-telegram' ), 'manage_options', 'ltteleg-modal-settings', 'ltteleg_modal_settings_page' );
	add_submenu_page( 'ltteleg', 'Link To Telegram' . ' - ' . __( 'About', 'link-to-telegram' ), __( 'About', 'link-to-telegram' ), 'manage_options', 'ltteleg-about-us', 'ltteleg_about_page' );
}

add_action( 'admin_init', 'ltteleg_general_init' );
function ltteleg_general_init() { 
	register_setting( 'ltteleg_general_settings', 'ltteleg_general', 'ltteleg_general_options_validate' );

	add_settings_section(
		'ltteleg_general_settings_section', 
		'',
		'', 
		'ltteleg_general_settings'
	);

	add_settings_field( 
		'ltteleg_enable', 
		__( 'Enable', 'link-to-telegram' ), 
		'ltteleg_enable_render', 
		'ltteleg_general_settings', 
		'ltteleg_general_settings_section' 
	);

	add_settings_field( 
		'channel_type', 
		__( 'Channel Type', 'link-to-telegram' ), 
		'ltteleg_channel_type_render', 
		'ltteleg_general_settings', 
		'ltteleg_general_settings_section' 
	);

	add_settings_field( 
		'popup_type', 
		__( 'Popup Type', 'link-to-telegram' ), 
		'ltteleg_popup_type_render', 
		'ltteleg_general_settings', 
		'ltteleg_general_settings_section' 
	);

	add_settings_field( 
		'channel_username', 
		__( 'Username', 'link-to-telegram' ), 
		'ltteleg_channel_username_render', 
		'ltteleg_general_settings', 
		'ltteleg_general_settings_section' 
	);
	
	add_settings_field( 
		'private_link', 
		__( 'Private Link', 'link-to-telegram' ), 
		'ltteleg_private_link_render', 
		'ltteleg_general_settings', 
		'ltteleg_general_settings_section' 
	);
	
	add_settings_field( 
		'ltteleg_once', 
		__( 'Once for each user', 'link-to-telegram' ), 
		'ltteleg_once_render', 
		'ltteleg_general_settings', 
		'ltteleg_general_settings_section' 
	);
	
	add_settings_field( 
		'only_on_mobile', 
		__( 'display only on mobile and tablet', 'link-to-telegram' ), 
		'ltteleg_only_on_mobile_render', 
		'ltteleg_general_settings', 
		'ltteleg_general_settings_section' 
	);
}

function ltteleg_enable_render() { 
	global $general_opt;
	?>
	<input type='checkbox' name='ltteleg_general[enable]' <?php checked( $general_opt['enable'], 1 ); ?> value='1'>
	<?php
}

function ltteleg_channel_type_render(  ) { 
	global $general_opt;
	?>
	<select name='ltteleg_general[channel_type]'>
		<option value='1' <?php selected( $general_opt['channel_type'], 1 ); ?>><?php echo __( 'Public', 'link-to-telegram' ); ?></option>
		<option value='2' <?php selected( $general_opt['channel_type'], 2 ); ?>><?php echo __( 'Private', 'link-to-telegram' ); ?></option>
	</select>
<?php
}

function ltteleg_popup_type_render(  ) { 
	global $general_opt;
	?>
	<select name='ltteleg_general[popup_type]'>
		<option value='1' <?php selected( $general_opt['popup_type'], 1 ); ?>><?php echo __( 'Direct', 'link-to-telegram' ); ?></option>
		<option value='2' <?php selected( $general_opt['popup_type'], 2 ); ?>><?php echo __( 'Modal', 'link-to-telegram' ); ?></option>
	</select>
<?php
}

function ltteleg_channel_username_render(  ) { 
	global $general_opt;
	?>
	<input type='text' name='ltteleg_general[channel_username]' value='<?php echo $general_opt['channel_username']; ?>'>
	<p class="description"><?php echo __( 'Without @', 'link-to-telegram' ); ?></p>
	<?php
}

function ltteleg_private_link_render() { 
	global $general_opt;
	?>
	<input type='text' name='ltteleg_general[private_link]' value='<?php echo $general_opt['private_link']; ?>'>
	<?php
}

function ltteleg_once_render() { 
	global $general_opt;
	?>
	<input type='checkbox' name='ltteleg_general[once]' <?php checked( $general_opt['once'], 1 ); ?> value='1'>
	<?php
}

function ltteleg_only_on_mobile_render() { 
	global $general_opt;
	?>
	<input type='checkbox' name='ltteleg_general[only_on_mobile]' <?php checked( $general_opt['only_on_mobile'], 1 ); ?> value='1'>
	<?php
}

add_action( 'admin_init', 'ltteleg_modal_init' );
function ltteleg_modal_init() { 
	register_setting( 'ltteleg_modal_settings', 'ltteleg_modal', 'ltteleg_modal_options_validate' );
	
	add_settings_section(
		'ltteleg_modal_settings_section', 
		'',
		'',
		'ltteleg_modal_settings'
	);
	
	add_settings_field( 
		'modal_skin', 
		__( 'Modal Skin', 'link-to-telegram' ), 
		'ltteleg_modal_skin_render', 
		'ltteleg_modal_settings', 
		'ltteleg_modal_settings_section' 
	);
	
	add_settings_field( 
		'overlay_background', 
		__( 'Overlay Background', 'link-to-telegram' ), 
		'ltteleg_overlay_background_render', 
		'ltteleg_modal_settings', 
		'ltteleg_modal_settings_section' 
	);
	
	add_settings_field(
		'modal_image',
		__( 'Modal Image', 'link-to-telegram' ),
		'ltteleg_modal_image_render',
		'ltteleg_modal_settings',
		'ltteleg_modal_settings_section'
	);
	
	add_settings_field( 
		'modal_title', 
		__( 'Modal Title', 'link-to-telegram' ),
		'ltteleg_modal_title_render', 
		'ltteleg_modal_settings', 
		'ltteleg_modal_settings_section' 
	);
	
	add_settings_field( 
		'modal_text', 
		__( 'Modal Description', 'link-to-telegram' ),
		'ltteleg_modal_text_render', 
		'ltteleg_modal_settings', 
		'ltteleg_modal_settings_section' 
	);
	
	add_settings_field( 
		'button_text', 
		__( 'Button Text', 'link-to-telegram' ), 
		'ltteleg_button_text_render', 
		'ltteleg_modal_settings', 
		'ltteleg_modal_settings_section' 
	);
	
	add_settings_field( 
		'close_text', 
		__( 'Close Text', 'link-to-telegram' ), 
		'ltteleg_close_text_render', 
		'ltteleg_modal_settings', 
		'ltteleg_modal_settings_section' 
	);
}

function ltteleg_modal_skin_render() { 
	global $modal_opt;
	?>
	<select name='ltteleg_modal[modal_skin]'>
		<option value='1' <?php selected( $modal_opt['modal_skin'], 1 ); ?>><?php echo __( 'Skin', 'link-to-telegram' ); ?> 1</option>
		<option value='2' <?php selected( $modal_opt['modal_skin'], 2 ); ?>><?php echo __( 'Skin', 'link-to-telegram' ); ?> 2</option>
		<option value='3' <?php selected( $modal_opt['modal_skin'], 3 ); ?>><?php echo __( 'Skin', 'link-to-telegram' ); ?> 3</option>
	</select>
<?php
}

function ltteleg_overlay_background_render() { 
	global $modal_opt;
	?>
	<input type='text' name='ltteleg_modal[overlay_background]' value='<?php echo $modal_opt['overlay_background']; ?>' class="color-picker" data-alpha="true">
	<?php
}

function ltteleg_modal_image_render() {
	global $modal_opt;
	?>
	<input type="text" id="modal_image" name="ltteleg_modal[modal_image]" value="<?php echo $modal_opt['modal_image']; ?>" />
	<input id="modal_image_button" type="button" class="button" value="<?php echo __( 'Upload Image', 'link-to-telegram' ); ?>" />
	<span class="description"><?php echo __( 'Upload an image for the modal.', 'link-to-telegram' ); ?></span>
	<?php
}

function ltteleg_modal_title_render(  ) { 
	global $modal_opt;
	?>
	<input type='text' name='ltteleg_modal[modal_title]' value='<?php echo $modal_opt['modal_title']; ?>'>
	<?php
}

function ltteleg_modal_text_render(  ) { 
	global $modal_opt;
	?>
	<input type='text' name='ltteleg_modal[modal_text]' value='<?php echo $modal_opt['modal_text']; ?>'>
	<?php
}

function ltteleg_button_text_render(  ) { 
	global $modal_opt;
	?>
	<input type='text' name='ltteleg_modal[button_text]' value='<?php echo $modal_opt['button_text']; ?>'>
	<?php
}

function ltteleg_close_text_render(  ) { 
	global $modal_opt;
	?>
	<input type='text' name='ltteleg_modal[close_text]' value='<?php echo $modal_opt['close_text']; ?>'>
	<?php
}

function ltteleg_general_settings_page() { 
	?>
	<form action='options.php' method='post' enctype='multipart/form-data'>
		<h1><?php echo __( 'General Settings', 'link-to-telegram' ); ?></h1>
		<?php
		settings_fields( 'ltteleg_general_settings' );
		do_settings_sections( 'ltteleg_general_settings' );
		?>
		<p class="submit">
			<input name="ltteleg_general[submit]" id="submit" type="submit" class="button-primary" value="<?php echo __( 'Save Settings', 'link-to-telegram' ); ?>" />
			<input name="ltteleg_general[reset]" type="submit" class="button-secondary" value="<?php echo __( 'Reset Defaults', 'link-to-telegram' ); ?>"
		</p>
	</form>
	<?php

}

function ltteleg_modal_settings_page() {
	?>
	<form action='options.php' method='post'>
		<h1><?php echo __( 'Modal Settings', 'link-to-telegram' ); ?></h1>
		<?php
		settings_fields( 'ltteleg_modal_settings' );
		do_settings_sections( 'ltteleg_modal_settings' );
		?>
		<p class="submit">
			<input name="ltteleg_modal[submit]" id="submit" type="submit" class="button-primary" value="<?php echo __( 'Save Settings', 'link-to-telegram' ); ?>" />
			<input name="ltteleg_modal[reset]" type="submit" class="button-secondary" value="<?php echo __( 'Reset Defaults', 'link-to-telegram' ); ?>" />
		</p>
	</form>
	<?php
}

function ltteleg_general_options_validate( $input ) {
	$default_options = ltteleg_get_general_default_options();
	$valid_input = $default_options;
	
	$submit = ! empty( $input['submit'] ) ? true : false;
	$reset = ! empty( $input['reset'] ) ? true : false;
	
	if( $submit ) {
		return $input;
	} elseif( $reset ) {
		return $valid_input;
	}
}

function ltteleg_modal_options_validate( $input ) {
	$default_options = ltteleg_get_modal_default_options();
	$valid_input = $default_options;
	
	$submit = ! empty( $input['submit'] ) ? true : false;
	$reset = ! empty( $input['reset'] ) ? true : false;
	
	if( $submit ) {
		return $input;
	} elseif( $reset ) {
		return $valid_input;
	}
}

function ltteleg_about_page() {
	?>
	<div class="wrap">
		<h1><?php echo __( 'About', 'link-to-telegram' ); ?></h1>
		<p>نسخه 1.0.0</p>
		<p>توسط <a href="http://www.barfaraz.com" target="_blank">خدمات تحت وب برفراز</a></p>
		<p>برنامه نویس <a href="http://www.mohammad-reza.ir" target="_blank">محمدرضا</a></p>
	</div>
	<?php
}

function ltteleg_telegram_url() {
	$url = 'https://t.me';
	return $url;
}

function ltteleg_get_url() {
	global $general_opt;
	$channel_username = $general_opt['channel_username'];
	$private_link = $general_opt['private_link'];
	$telegram_url = ltteleg_telegram_url();
	
	if( $general_opt['popup_type'] == '1' ) {
		if( $general_opt['channel_type'] == '1' ) {
			$url = $channel_username;
		} elseif( $general_opt['channel_type'] == '2' ) {
			if( strpos( $private_link, '/joinchat/' ) !== false ) {
				$url = substr($private_link, strripos($private_link,'/joinchat/')+strlen('/joinchat/'));
			} else {
				$url = $private_link;
			}
		}
	} elseif( $general_opt['popup_type'] == '2' ) {
		if( $general_opt['channel_type'] == '1' ) {
			$url = $telegram_url . '/' . $channel_username;
		} elseif( $general_opt['channel_type'] == '2' ) {
			$url = $private_link;
		}
	}
	
	return $url;
}

add_action( 'wp_footer', 'ltteleg_modal_html' );

function ltteleg_modal_html() {
	global $general_opt, $modal_opt;
	
	if( $general_opt['enable'] != 1 || ltteleg_once_check() == true ) return;
	
	$popup_type = $general_opt['popup_type'];
	$overlay_background = $modal_opt['overlay_background'];
	
	if( $popup_type == 2 )  {
		if( ( $general_opt['only_on_mobile'] == 1 && wp_is_mobile() ) || ( $general_opt['only_on_mobile'] != 1 ) ) {
			?>
			<div class="ltteleg-overlay" style="background-color: <?php echo $overlay_background; ?>;">
				<div class="ltteleg-overlay-inner">
					<?php
					$skin = $modal_opt['modal_skin'];
					$img_src = $modal_opt['modal_image'];
					$title = $modal_opt['modal_title'];
					$description = $modal_opt['modal_text'];
					$link = ltteleg_get_url();
					$button_text = $modal_opt['button_text'];
					$close_text = $modal_opt['close_text'];
					?>
					<?php include( "skins/modal-skin-$skin.php" ); ?>
				</div>
			</div>
			<?php
		}
	}
}

add_action( 'wp_head', 'ltteleg_frontend_js' );

function ltteleg_frontend_js() {
	global $general_opt;
	
	if( $general_opt['enable'] != 1 || ltteleg_once_check() == true ) return;
	
	$channel_type = $general_opt['channel_type'];
	$popup_type = $general_opt['popup_type'];
	$only_on_mobile = $general_opt['only_on_mobile'];
	
	if( $popup_type == 1 ) {
		echo '<script type="text/javascript">';
		if( $only_on_mobile == 1 ) { echo 'if( /android|webos|iphone|ipad|ipod|blackberry|opera mini|Windows Phone|iemobile|WPDesktop|XBLWP7/i.test(navigator.userAgent.toLowerCase()) ) {'; }
		if( $channel_type == 1 ) {
			echo 'var tg_url = "tg://resolve?domain=' . ltteleg_get_url() . '";';
		} elseif( $channel_type == 2 ) {
			echo 'var tg_url = "tg:\/\/join?invite=' . ltteleg_get_url() . '";';
		}
		if( $only_on_mobile == 1 ) { echo '}'; }
		echo 'document.write(\'<iframe src="\'+tg_url+\'" border="0" scrolling="no" frameborder="0" style="display: none;"></iframe>\');';
		echo '</script>';
	}
}

function ltteleg_once_check() {
	global $general_opt;
	
	if( $general_opt['once'] == 1 ) {
		if( isset( $_COOKIE['ltteleg_visited'] ) && $_COOKIE['ltteleg_visited'] == "true" ) {
			return true;
		} else {
			setcookie( 'ltteleg_visited', 'true', time()+60*60*24*365 );
			return false;
		}
	}
	
	return false;
}

register_activation_hook( __FILE__, 'ltteleg_set_up_options' );
function ltteleg_set_up_options() {
	add_option( 'ltteleg_general', ltteleg_get_general_default_options() );
	add_option( 'ltteleg_modal', ltteleg_get_modal_default_options() );
}

?>