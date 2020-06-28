<?php
require_once("connection.php");	
	$code=$_GET['code'];

	$nbr=0;
$connec=mysqli_connect($_SESSION['page'][0],$_SESSION['page'][1],$_SESSION['page'][2]) or die('Connexion impossible : ' . mysqli_error());
mysqli_query ($connec,'SET NAMES \'UTF8\'');

$db=mysqli_select_db($connec,$_SESSION['page'][3]) or die('Connexion impossible : ' . mysqli_error());


  ?>
   <h3 style="color:#FFF"><strong><?php 
$quer="select * from etablissement";
$resul=mysqli_query($connec,$quer);	
$nom_etab="";
while ($row=mysqli_fetch_array($resul)){
	$nom_etab=$row['Nom_etab_ar'];
echo $row['Nom_etab_fr'].'<br>'.$row['Nom_etab_ar'];
}
 ?></strong></h3>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl" >

<head>

     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $nom_etab?></title>

        <!-- CSS -->
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
       <link rel="stylesheet" href="assets/css/keyboard.css">
       
 <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        
<script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>
         <script src="assets/js/keyboard.js"></script>
</head>

<body>
<?php
$query1="select * from recours where code='".$_GET['code']."'";
$result1=mysqli_query($connec,$query1);
	  $code1= mysqli_num_rows($result1); 
	  
	 if($code1==0){ 
	
 if(!empty($_FILES)){
	try{
	
	
//var_dump($_FILES['photo']);
$fichier=$_FILES['photo']['name'];
$fichier_tmp=$_FILES['photo']['tmp_name'];
$fich_exten=strchr($fichier,'.');
$dest='docScan/'.$code.$fich_exten;
echo '<script> alert('.$dest.')</script>';
     if( move_uploaded_file($fichier_tmp,$dest)){
	 
    $date = date("Y-m-d");
                $heure = date("H:i"); 
		
$sql1 = 'INSERT INTO recours  VALUES ("'.$code.'","'.htmlentities(trim($_POST['message'])).'","docScan/'.$code.''.$fich_exten.'","'.$date.'","'.$heure.'")';
mysqli_query($connec,$sql1) or die ('Erreur SQL !'.'<br />'.mysqli_error($connec));
 echo '<div class="row"><br><br><p style="color:#0c0;font-size:34px;">تــــم إرســـال طعنـــــك بنجاح<br><span class="glyphicon glyphicon-ok"></span></p></div>';
 echo "<a class='btn btn-info' style='font-size:18px' href='sauvgarde/pdf/recours.php?id=".$code."'><span class='fa fa-print'></span> طباعة وصل الطعن </a>";
	 }
	 	
}


catch (SQLException $e){
echo $e;	
}
	}
 if($_FILES['photo']['error'] > 0){
	 
		try{
				$date0 = date("Y-m-d");
                $heure0 = date("H:i");

	$sql1 = 'INSERT INTO recours  VALUES ("'.$code.'","'.htmlentities(trim($_POST['message'])).'","non","'.$date0.'","'.$heure0.'")';
mysqli_query($connec,$sql1) or die ('Erreur SQL !'.'<br />'.mysqli_error($connec));
	 echo '<div class="row"><br><br><p style="color:#0c0;font-size:34px;">تــــم إرســـال طعنـــــك بنجاح <br><span class="glyphicon glyphicon-ok"></span></p></div>';
	 echo "<a class='btn btn-info' style='font-size:18px' href='sauvgarde/pdf/recours.php?id=".$code."'><span class='fa fa-print'></span> طباعة وصل الطعن </a>";
	}catch (SQLException $e){
echo $e;	
}
	}
 }
 else{
 echo '<div class="row"><br><br><p style="color:#f00;font-size:34px;">فشل الارسال<br>  قمت بإرســــال طعنـــــك من قبــــل ؟؟!!<br><span class="glyphicon glyphicon-remove"></span></p></div>';	
  echo "<a class='btn btn-info' style='font-size:18px' href='sauvgarde/pdf/recours.php?id=".$code."'><span class='fa fa-print'></span> طباعة وصل الطعن السابق </a>"; 
 }
?>

</body>
</html>