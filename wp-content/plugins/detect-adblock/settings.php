<?php

defined('ABSPATH') or die('Silence is Golden.');


function oba_dab_options_submenu() {
    add_submenu_page("options-general.php", 'Detect AdBlock Settings', 'Detect AdBlock', 'manage_options', 'oba_detect_adblock_settings', 'oba_detect_adblock_callback' );
}
add_action('admin_menu', 'oba_dab_options_submenu');


function oba_dab_options_fields(){
    add_settings_section('oba_dab_section', false, false, 'oba_dab_options');

    add_settings_field(
        "oba_dab_op_title",
        'Title',
        "oba_dab_op_title_cb",
        "oba_dab_options",
        "oba_dab_section",
        array('label_for' => 'oba_dab_op_title')
    );
    register_setting( 'oba_dab_section', 'oba_dab_op_title' );

    add_settings_field(
        "oba_dab_op_message",
        'Message',
        "oba_dab_op_message_cb",
        "oba_dab_options",
        "oba_dab_section",
        array('label_for' => 'oba_dab_op_message')
    );
    register_setting( 'oba_dab_section', 'oba_dab_op_message' );

    add_settings_field(
        "oba_dab_op_exclude",
        'Exclude Users',
        "oba_dab_op_exclude_cb",
        "oba_dab_options",
        "oba_dab_section"
    );
    register_setting( 'oba_dab_section', 'oba_dab_ex_admin' );
    register_setting( 'oba_dab_section', 'oba_dab_ex_editor' );
    register_setting( 'oba_dab_section', 'oba_dab_ex_author' );
    register_setting( 'oba_dab_section', 'oba_dab_ex_con' );
    register_setting( 'oba_dab_section', 'oba_dab_ex_sub' );
    register_setting( 'oba_dab_section', 'oba_dab_ex_any_logged' );
    register_setting( 'oba_dab_section', 'oba_dab_ex_any_visitor' );
}
add_action('admin_init', 'oba_dab_options_fields');


function oba_detect_adblock_callback(){
    ?>
        <div class="wrap">
            <h1>Detect AdBlock Settings</h1>
            <form method="post" action="options.php">
                <?php
                    settings_fields("oba_dab_section");
                    do_settings_sections("oba_dab_options");
                    submit_button();
                ?>
            </form>

            <div class="tool-box">
                <h2>Recommended</h2>
                <p><a href="http://www.elegantthemes.com/affiliates/idevaffiliate.php?id=24967&url=19686&tid1=inside_plugin_settings" target="_blank"><img style="max-width:100% !important;" src="<?php echo plugins_url('/banners/elegantthemes.jpg', __FILE__); ?>"></a></p>
                <p><a href="https://www.bluehost.com/track/wptime" target="_blank"><img style="max-width:100% !important;" src="<?php echo plugins_url('/banners/bluehost.png', __FILE__); ?>"></a></p>
            </div>
        </div>
    <?php
}


function oba_dab_op_title_cb(){
    if( get_option('oba_dab_op_title') ){
        $value = get_option('oba_dab_op_title');
    }else{
        $value = "AdBlock Detected!";
    }
    ?>
        <input id="oba_dab_op_title" type="text" name="oba_dab_op_title" class="regular-text" value="<?php echo esc_attr( $value ); ?>">
        <p class="description">Enter the message title.</p>
    <?php
}


function oba_dab_op_message_cb(){
    if( get_option('oba_dab_op_message') ){
        $value = get_option('oba_dab_op_message');
    }else{
        $value = "Please disable AdBlock in the browser and %_click here_% to visit my website.";
    }

    if( get_option('oba_dab_op_message') and ( !preg_match("/(%_)/", $value) or !preg_match("/(_%)/", $value) ) ){
        $descr = '<p class="description">Please enter text link! For example %_click here_% . <a target="_blank" href="'.esc_url( home_url('/?alobaidi_detect_adblock=preview') ).'">Preview</a> (the preview is working after save changes).</p>';
    }else{
        $descr = '<p class="description">Enter the message and %_Here enter text link_% . <a target="_blank" href="'.esc_url( home_url('/?alobaidi_detect_adblock=preview') ).'">Preview</a> (the preview is working after save changes).</p>';
    }
    ?>
        <input id="oba_dab_op_message" type="text" name="oba_dab_op_message" class="regular-text" style="width:100%;" value="<?php echo esc_attr( $value ); ?>">
        <?php echo $descr; ?></p>
    <?php
}


function oba_dab_op_exclude_cb(){
    $ex_admin = get_option('oba_dab_ex_admin');
    $ex_editor = get_option('oba_dab_ex_editor');
    $ex_author = get_option('oba_dab_ex_author');
    $ex_con = get_option('oba_dab_ex_con');
    $ex_sub = get_option('oba_dab_ex_sub');
    $ex_any_logged = get_option('oba_dab_ex_any_logged');
    $ex_any_visitor = get_option('oba_dab_ex_any_visitor');
    ?>
        <p>If you want to prevent Detect AdBlock from some users:</p>
        <br>
        <label for="oba_dab_ex_admin" style="display:block;"><input type="checkbox" id="oba_dab_ex_admin" name="oba_dab_ex_admin" value="1" <?php checked($ex_admin, 1, true); ?>>Exclude Admins.</label>
        <br>
        <label for="oba_dab_ex_editor" style="display:block;"><input type="checkbox" id="oba_dab_ex_editor" name="oba_dab_ex_editor" value="1" <?php checked($ex_editor, 1, true); ?>>Exclude Editors.</label>
        <br>
        <label for="oba_dab_ex_author" style="display:block;"><input type="checkbox" id="oba_dab_ex_author" name="oba_dab_ex_author" value="1" <?php checked($ex_author, 1, true); ?>>Exclude Authors.</label>
        <br>
        <label for="oba_dab_ex_con" style="display:block;"><input type="checkbox" id="oba_dab_ex_con" name="oba_dab_ex_con" value="1" <?php checked($ex_con, 1, true); ?>>Exclude Contributors.</label>
        <br>
        <label for="oba_dab_ex_sub" style="display:block;"><input type="checkbox" id="oba_dab_ex_sub" name="oba_dab_ex_sub" value="1" <?php checked($ex_sub, 1, true); ?>>Exclude Subscribers.</label>
        <br>
        <label for="oba_dab_ex_any_logged" style="display:block;"><input type="checkbox" id="oba_dab_ex_any_logged" name="oba_dab_ex_any_logged" value="1" <?php checked($ex_any_logged, 1, true); ?>>Exclude any user who is logged in (including a custom user roles).</label>
        <br>
        <label for="oba_dab_ex_any_visitor" style="display:block;"><input type="checkbox" id="oba_dab_ex_any_visitor" name="oba_dab_ex_any_visitor" value="1" <?php checked($ex_any_visitor, 1, true); ?>>Exclude any visitor.</label>
    <?php
}