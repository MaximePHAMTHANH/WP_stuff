<?php
/*
Plugin Name: Tabs
Plugin URI: 
Description: Tabs
Author: Maxime Pham Thanh
Author URI: 
Version: 1.0
*/

if (!defined('ABSPATH') ){
	die;
}




function Tabs($atts, $content=null) { 

       wp_register_style('Tabs_namespace', plugins_url('Tabs.css',__FILE__ ));
       wp_enqueue_style('Tabs_namespace'); 
       wp_register_script( 'Tabs_namespace_js', plugins_url( 'Tabs.js' , __FILE__ ) );
       wp_enqueue_script( 'Tabs_namespace_js' );
       
       echo('
		<div class="tab">
		  <button class="tablinks" onclick="openCity(event, \'London\')">London</button>
		  <button class="tablinks" onclick="openCity(event, \'Paris\')">Paris</button>
		  <button class="tablinks" onclick="openCity(event, \'Tokyo\')">Tokyo</button>
		</div>
		<div id="London_title" class="tabcontent"> Test London </div>
		<div id="London" class="tabcontent">
		  <p>0</p>

		</div>
		<div id="Paris_title" class="tabcontent"> Test Paris</div>
		<div id="Paris" class="tabcontent">
		  <p>0</p>
		</div>
		<div id="Tokyo_title" class="tabcontent"> Test Tokyo</div>
		<div id="Tokyo" class="tabcontent">
		  <p>0</p>
		</div>
	');


}


add_shortcode('Tabs', 'Tabs');  