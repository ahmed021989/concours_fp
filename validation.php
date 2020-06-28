<?php

include("connection.php");	
	

	$nbr=0;
$connec=mysqli_connect($_SESSION['page'][0],$_SESSION['page'][1],$_SESSION['page'][2]) or die('Connexion impossible : ' . mysqli_error());
mysqli_query ($connec,'SET NAMES \'UTF8\'');

$db=mysqli_select_db($connec,$_SESSION['page'][3]) or die('Connexion impossible : ' . mysqli_error());



//creation de la valeur de l'atribut "code"

  ?>
 
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
if(isset($_GET["id"])){
$tab=explode( ':', $_GET["id"] );
echo "<br><br><p style=\"font-size:20px;color:#900\">".$tab[0]."</p>";
try{
$sql1 = 'UPDATE   compte  set active="oui" where email="'.$tab[0].'"';

mysqli_query($connec,$sql1) or die ('Erreur SQL !'.'<br />'.mysqli_error($connec));
echo "<br> <h2><b style=\"color:#0C0\">لقد تم تأكيد حسابك  <br> <span class=\"fa fa-check-circle\"></span></b></h2>";

echo "<a href=\"index1.php\"> <h2>الدخول للتسجيل </h2></a>";
}catch (SQLException $e){
echo $e;	
}
}
?>
</body>
</html>