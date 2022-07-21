<?php

include "Sheet_API.php";


function Tools($atts, $content=null) { 

       readSheet('Sheet1!A1');
       writeSheet('Sheet1!A2','Test3');

       if ($atts[0]=="Test"){       
              SQL_exec();
       }

       else return "Erreur de definition du shortcode";

}

function create_product_automatically( ) { 
       $product = new WC_Product_Simple();
       $product->set_name('Generated Product');
       $product->set_status('publish'); 
       $product->set_catalog_visibility('visible');
       $product->set_price( 19.99 );
       $product->set_regular_price( 19.99 );  
       $product->save();

}


function SQL_exec(){
       global $wpdb;
       $id = $wpdb->get_var( 'SELECT id FROM wp_test ORDER BY id DESC LIMIT 1');
       $wpdb->insert('wp_test', array(
       'Value' => $id+1));

}

add_shortcode('Tools', 'Tools');  

add_action( 'woocommerce_new_order', 'create_product_automatically',  1, 1  );





?>
