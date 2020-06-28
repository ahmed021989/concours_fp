<?php 
require_once("../includes/initialiser.php");

if ( (isset($_GET['id']))  ) { 
		 $id = $_GET['id'];
		  $specialite_demmande =  Specialite_demmande::trouve_par_id2($id);
		 
		$specialite_demmande->supprime();

	 } else { 
			$msg_error = '<p class="error">Cette page a été consultée par erreur</p>';
		} 
		
		
?> 
 

                               