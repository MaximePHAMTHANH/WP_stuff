<?php
/*
Plugin Name: Crypto
Plugin URI: 
Description: Crypto
Author: Maxime Pham Thanh
Author URI: 
Version: 1.0
*/

if (!defined('ABSPATH') ){die;}

function Crypto($atts, $content=null) { 

       wp_register_style('Crypto_namespace', plugins_url('Crypto.css',__FILE__ ));
       wp_enqueue_style('Crypto_namespace'); 
       wp_register_script('Crypto_namespace_js', plugins_url( 'Crypto.js' , __FILE__ ) );
       wp_enqueue_script('Crypto_namespace_js');
       wp_register_script('Crypto_namespace_js_axios','https://unpkg.com/axios/dist/axios.min.js');
       wp_enqueue_script('Crypto_namespace_js_axios');

       $attributes = shortcode_atts( array('id' => 'The Id','type' => 'The Type'), $atts );
	//https://cryptologos.cc/logos

       echo('
		<div class="content">
			<img class="Crypto_Logo" src="../wp-content/plugins/Crypto/Logos/'.$attributes['id'].'.png"> 
			<div class="Crypto_Name"> '.$attributes['id'].'</div>
			<div class="Crypto_Price" id='.$attributes['id'].'> Price </div>
			<div class="Crypto_UpDown" id='.$attributes['id'].'_UpDown>▲ 8.88%  </div>	
		</div>
       	');
}

add_shortcode('Crypto', 'Crypto');  

