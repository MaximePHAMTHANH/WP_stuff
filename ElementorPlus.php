<?php
/*
Plugin Name: ElementorPlus
Plugin URI: 
Description: ElementorPlus blocks
Author: Maxime Pham Thanh
Author URI: 
Version: 0.1
*/

if (!defined('ABSPATH') ){
	die;
}

require_once 'custom-elementor.php';

class ElementorPlusPluging{

	function __construct(){
		add_action('admin_menu',array($this,'ElementorPlusMenu'));
	}

	function ElementorPlusMenu(){
		add_menu_page('Forms','ElementorPlus','manage_options','ElementorPlusMenu',array($this,'ElementorPlusMenu_main'),'dashicons-awards',4);
	}

	function ElementorPlusMenu_main(){
		echo '<div><h2>ElementorPlus is active</h2></div>';
	}


}

if (class_exists('ElementorPlusPluging')){
	$elementorplus = new ElementorPlusPluging();
}

