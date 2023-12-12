<?php
/*
Plugin Name: Advalians - Cas Clients
Plugin URI: 
Description: Affichage des Cas Clients pour les agences Premium
Author: Maxime Pham Thanh
Author URI: 
Version: 1.0
*/

if (!defined('ABSPATH') ){
	die;
}

include 'Main.php';


class AdvaliansPluging{

	function __construct(){
		add_action('admin_menu',array($this,'AdvaliansMenu'));
	}

	function AdvaliansMenu(){
		add_menu_page('Forms','Advalians','manage_options','AdvaliansMenu',array($this,'AdvaliansMenu_main'),'dashicons-awards',4);
	}

	function AdvaliansMenu_main(){
		echo "
		

		<div><h1>Advalians : Plugin d'affichage des cas clients</h1></div>
		</br>
		<div><h3>Pour définir le shortcode, utiliser la syntaxe suivante :</h3></div>

		<div><h4>[Advalians type='']</h4></div>
		<div><h4>Valeurs par défaut : [Advalians type='Prod']</h4></div>

		<div><h4>type : 'Prod' ou 'Debug' (le type 'debug' renvoie juste les infos récupérées)</h4></div>
		<div><h4>L'affichage ou non des cas clients est fait uniquement sur les pages du site : sur les outils d'administration comme le builder Elementor, les cas clients seront toujours affichés.</h4></div>
		</br>
		<div><h3>Attention : bien respecter l'identifiant qui relie le Google Sheets aux pages d'agence</h3></div>
		<div><h4>L'identifiant doit figurer dans le titre de la page exemple : advalians.fr/1002-Digiweb</h4></div>
		<div><h4>Lien du Google Sheets : https://docs.google.com/spreadsheets/d/1P6FXF-pwfgY5ObvIhPXBvOFQ41EFnjy9wnV3MR2fcl8</h4></div>
		</br>
		<div><h4>Pour tout problème me contacter : maxime.pham.thanh@gmail.com</h4></div>

		";
	}


}


if (class_exists('AdvaliansPluging')){
	$Advalians = new AdvaliansPluging();
}

