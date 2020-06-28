<?php 
require_once("../includes/initialiser.php");

if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { 
		 $id = $_GET['id'];
		  $direction =  Direction::trouve_par_id($id);
		 
		$direction->supprime();

		$SQL = $bd->requete("DELETE FROM `direction` WHERE `Id_derc` =  '$id'") ;	
		$SQL = $bd->requete("DELETE FROM `etablissement` WHERE `Id_derc`  =  '$id'") ;	
	 
	 } else { 
			$msg_error = '<p class="error">Cette page a été consultée par erreur</p>';
		} 
		
				
		
?> 
 

                               