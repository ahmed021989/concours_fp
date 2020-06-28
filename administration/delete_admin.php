<?php require_once("includes/initialiser.php"); ?>
<?php	

if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { 
		 $id = $_GET['id'];
	 } elseif ( (isset($_POST['id'])) &&(is_numeric($_POST['id'])) ) { 
		 $id = $_POST['id'];
	 } else { 
			$msg_error = '<p class="error">Cette page a été consultée par erreur</p>';
		} 
$SQL5 = $bd->requete("DELETE FROM `najah`.`personne` WHERE `personne`.`id` ='$id' ");  

    readresser_a("list_admin.php");
?>
