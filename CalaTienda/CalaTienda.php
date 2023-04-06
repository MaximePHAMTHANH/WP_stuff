<?php
/*
Plugin Name: CalaTienda
Plugin URI: 
Description: CalaTienda
Author: Maxime Pham Thanh
Author URI: 
Version: 1.0
*/

if (!defined('ABSPATH') ){die;}

function CalaTienda($atts, $content=null) { 

       wp_register_style('CalaTienda_namespace', plugins_url('CalaTienda.css',__FILE__ ));
       wp_enqueue_style('CalaTienda_namespace'); 

       $attributes = shortcode_atts( array('id' => 'The Id','type' => 'The Type'), $atts );


       if ($attributes['id']=='Livraison') {
              $text="";
              $cart_amount=WC()->cart->subtotal;
              if ($cart_amount==0) {$text="Bénéficiez de la livraison gratuite à partir de <big><big>100€</big></big>";}
              elseif ($cart_amount<100) {
                     $value=100-$cart_amount;
                     $text="Plus que <big><big>".$value."€</big></big> pour bénéficier de la livraison gratuite !";}
              else $text="Votre panier est éligible à la <big><big>Livraison Gratuite</big></big>";

       echo('
              <div class="CalaTienda Plugin">
                     <div style="display:none">Valeur du panier: '.$cart_amount.'€</div>
                     <h6 class="LivraisonGratuite"><big><big>🏷️</big></big> '.$text.'</h6>
              </div>');              
       }



       elseif ($attributes['id']=='Delais') {
              $days=["0"=>"Lundi","1"=>"Mardi","2"=>"Mercredi","3"=>"Jeudi",
"4"=>"Vendredi", "5"=>"Samedi", "6"=>"Dimanche"];
              $days_en=["Monday"=>"0","Tuesday"=>"1","Wednesday"=>"2","Thursday"=>"3",
"Friday"=>"4", "Saturday"=>"5", "Sunday"=>"6"];
              $today=$days[($days_en[date("l")]+3)%7];
              if ($today=="Samedi" || $today=="Dimanche") {$today="Lundi";}

              echo("
                     <div class='CalaTienda Plugin Livraison'>
                            <h6 class='DelaiLivraison'><big><big>🗓️</big></big> Commandez maintenant et recevez votre commande <big><big>".$today."</big></big></h6></div>");                   
       }



       elseif ($attributes['id']=='Logo'){
              $data_brands=["Banditas"=>"La marque BANDITAS, un style bohème chic et indémodable venant du Sud de la France ! Découvrez des tenues hautes en couleurs","Gulf"=>"Gulf, la mythique marque de course aux couleurs bleues et oranges ! Un hommage à l'âge d'or des sports automobiles"];
              $url= $_SERVER['REQUEST_URI'];  
              $brand="";  
              if (str_contains($url, 'gulf')) {$brand="Gulf";}
              elseif (str_contains($url, 'banditas')) {$brand="Banditas";}
              

              if ($attributes['type']=='Logo'){
                     if ($brand!="") {
                            echo ("
                                   <div class='CalaTienda Plugin Logo'>
                                   <img src=".plugin_dir_url( __FILE__ ).$brand.".png></div>");
                     }
              }
              elseif ($attributes['type']=='Titre'){
                     if ($brand!="") {
                            echo ("
                                   <div class='CalaTienda Plugin Logo Class Title'>
                                   <h6 class='CalaTienda Plugin Logo Title'>Un produit de la marque ".$brand."</h6></div>");
                     }
              }
              else {
                     if ($brand!="") {
                            echo ("
                                   <div class='CalaTienda Plugin Logo Class Text'>
                                   <p class='CalaTienda Plugin Logo Text'>".$data_brands[$brand]."</p></div>");
                     }
              }

       }
}

add_shortcode('CalaTienda', 'CalaTienda');  
