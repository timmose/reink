<?php

defined( 'ABSPATH' ) or die( 'Silence is Golden.' );

/* Uninstall Plugin */

// if not uninstalled plugin
if( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) 
	exit(); // out!


/*esle:
	if uninstalled plugin, this options will be deleted
*/
delete_option('oba_dab_op_title');
delete_option('oba_dab_op_message');
delete_option('oba_dab_ex_admin');
delete_option('oba_dab_ex_editor');
delete_option('oba_dab_ex_author');
delete_option('oba_dab_ex_con');
delete_option('oba_dab_ex_sub');
delete_option('oba_dab_ex_any_logged');
delete_option('oba_dab_ex_any_visitor');