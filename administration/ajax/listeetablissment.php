<?php 
require_once("../includes/initialiser.php");

if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { 
		 $id = $_GET['id'];
		  $etablissement =  Etablissement::trouve_par_id($id);
		 
		$etablissement->supprime();

		//$SQL = $bd->requete("DELETE FROM `etablissement` WHERE `Id_etab` =  '$id'") ;	
		//$SQL = $bd->requete("DELETE FROM `etablissement` WHERE `Id_poste`  =  '$id'") ;	
	 
	 } else { 
			$msg_error = '<p class="error">Cette page a été consultée par erreur</p>';
		} 
		
		
?> 
 

                               