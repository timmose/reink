<?php
/*
Plugin Name: WT Yandex Metrika
Plugin URI: http://web-technology.biz/cms-wordpress/plugin-wt-yandex-metrika-for-cms-wordpress
Description: Добавление на сайт счетчика "Яндекс Метрика".
Version: 1.0.1
Author: Роман Кусты, АИТ "Web-Techology"
Author URI: http://web-technology.biz
*/

require('admin_panel.php');

class WtYandexMetrika
{
	var $admin;
	var $options;
	var $options_default = array(
		'script' => '',
		'position' => 'header',
		'mode' => 'all'
		);

	function __construct(){	
		add_action('init',array( $this, 'initial' ) );	
		
	}

	public function initial(){
		$this->options = array_merge(
			$this->options_default, 
			(array) get_option('wt_yandex_metrika', array()) 
		);

		if (defined('ABSPATH') && is_admin()) {
		    $this->admin = new WtYandexMetrikaAdmin();
		}

		// Проверяем режим работы плагина
		if (is_user_logged_in() && current_user_can('administrator') && ($this->options['mode'] == 'admin_not_display'))
			return;

		// Определяем расположение кода счетчика
		if ($this->options['position'] == 'header') add_action('wp_head', array($this, 'wp_head'), 4);
		else add_action('wp_footer', array($this, 'wp_footer'), 99);
	}

	public static function basename() {
        return plugin_basename(__FILE__);
    }

    // Подготавливаем код для вывода в подвале
    function wp_head() {
		if (!empty( $this->options['script'])) echo $this->options['script'];
	}

    // Подготавливаем код для вывода в подвале
    function wp_footer() {
		if (!empty( $this->options['script'])) echo $this->options['script'];
	}

}

$wt_yandex_metrika = new WtYandexMetrika();

?>