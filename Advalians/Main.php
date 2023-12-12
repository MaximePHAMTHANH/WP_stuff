<?php

include "Sheet_API.php";

function Advalians($atts, $content=null) { 
       $attributes = shortcode_atts( array(
              'type' => 'Prod'
       ), $atts );

       $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
       if (str_contains($actual_link,"wp-admin")) {
              $statut="Optimum";
              $admin_page="<p>Vous êtes sur un outil d'administration du site ; Fonctionnalités disponibles uniquement sur les pages du site ; Les cas clients seront toujours affichés ici";
       }
       else {
              preg_match_all('!\d+!', $actual_link, $id);
              $case_id=($id)[0][0]-1000;
              if ($case_id<1000) $statut=SinglereadSheet('Agences!C'.$case_id);
              else $statut="Optimum";
       }


       if ($attributes['type']=="Debug"){       
              echo "<b>Debuging de l'affichage des cas clients</b>";
              echo "</br>";
              if (isset($admin_page)) echo $admin_page;
              else {
                     echo "Id de l'agence : ".$id[0][0];
                     echo "</br>";
                     echo "Case du tableau : C".$case_id;
                     echo "</br>";
                     echo "Statut de l'agence : ".$statut;
                     echo "</br>";
              }
              return ;
       }
       elseif ($attributes['type']=="Prod"){
              if (isset($admin_page)) {
                     echo "<b>Affichage des cas clients</b>";
                     echo "</br>";
                     echo($admin_page);
              }
              if ($statut=="Optimum") echo ("<style> .cas_clients{display:block!important}</style>");
              else echo ("<style> .cas_clients{display:none!important}</style>");
              return;            
       }

       else echo "Erreur de déclaration du Shortcode";


       return ;



}


add_shortcode('Advalians', 'Advalians');  


?>
