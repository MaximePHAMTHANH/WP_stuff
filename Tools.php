<?php
/*
Plugin Name: Tools
Plugin URI: 
Description: Tools
Author: Maxime Pham Thanh
Author URI: 
Version: 1.0
*/

if (!defined('ABSPATH') ){
	die;
}

include 'Main.php';

class ToolsPluging{

	function __construct(){
		add_action('admin_menu',array($this,'ToolsMenu'));
	}

	function ToolsMenu(){
		add_menu_page('Forms','Tools','manage_options','ToolsMenu',array($this,'ToolsMenu_main'),'dashicons-awards',4);
	}

	function ToolsMenu_main(){
		echo '<div><h2>Vierge Plugin is active</h2></div>';
	}


}


if (class_exists('ToolsPluging')){
	$Tools = new ToolsPluging();
}

