<?php

function recommended_products($atts) {
	$attri = shortcode_atts(array('rank' => '1'), $atts );
	if ($attri['rank']<1 || $attri['rank']>4)
		$attri['rank']=1;
	$WC_Product_Factory = new WC_Product_Factory();
	$all_products=all_products();
	$result=recommended_algo($all_products);
	$product=$WC_Product_Factory->get_product($result[$attri['rank']-1]);
	display($product);
}

function recommended_algo($args){
	$result=array_rand(array_flip($args),4);
	return $result;
}


function all_products() { 
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 100,
//        'product_cat'    => 'hoodies'
    );
    $loop = new WP_Query( $args );
    $all_products=array();
    while ( $loop->have_posts() ) : $loop->the_post();
        $id=get_the_id();
        array_push($all_products, $id);
    endwhile;
    wp_reset_query();
    //print_r($all_products); 
    $all_products=delete_current($all_products);
    //print_r($all_products); 
    return $all_products; 
}

function delete_current($args){
	$current=current_page();
	$key=array_search($current, $args);
	unset($args[$key]);
	return array_values($args);
}

function current_page(){
	global $wp_query;
	$post = $wp_query->get_queried_object(); 
	$pageID = $post->ID;
	return $pageID;
}

function display($prod){
	$link_address= get_permalink( $prod->get_id() );
	echo "<div class='recommended_image'><a href='".$link_address."'>".$prod->get_image()."</a></div>";
	echo "<div class='recommended_tag'>  ".$prod->get_name()."</div>";
	echo "<div class='recommended_price'>".$prod->get_price()." € </div>";

}

add_shortcode( 'recommended_products', 'recommended_products' );

?>
