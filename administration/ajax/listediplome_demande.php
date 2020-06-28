<?php 
require_once("../includes/initialiser.php");

if ( (isset($_GET['id']))  ) { 
		 $id = $_GET['id'];
		  $diplome_demmande =  Diplome_demmande::trouve_par_id2($id);
		 
		$diplome_demmande->supprime();

	 } else { 
			$msg_error = '<p class="error">Cette page a été consultée par erreur</p>';
		} 
		
		
?> 
 

                               