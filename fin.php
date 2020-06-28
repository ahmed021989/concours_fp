<?php
@session_start();

		
		



//creation de la valeur de l'atribut "code"

  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl" >

<head>

     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>نهاية التسجيلات</title>

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
   <style>
 .gly-spin {
  -webkit-animation: spin 2s infinite linear;
  -moz-animation: spin 2s infinite linear;
  -o-animation: spin 2s infinite linear;
  animation: spin 2s infinite linear;
}
@-moz-keyframes spin {
  0% {
    -moz-transform: rotate(0deg);
  }
  100% {
    -moz-transform: rotate(359deg);
  }
}
@-webkit-keyframes spin {
  0% {
    -webkit-transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(359deg);
  }
}
@-o-keyframes spin {
  0% {
    -o-transform: rotate(0deg);
  }
  100% {
    -o-transform: rotate(359deg);
  }
}
@keyframes spin {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(359deg);
    transform: rotate(359deg);
  }
}
.gly-rotate-90 {
  filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=1);
  -webkit-transform: rotate(90deg);
  -moz-transform: rotate(90deg);
  -ms-transform: rotate(90deg);
  -o-transform: rotate(90deg);
  transform: rotate(90deg);
}
.gly-rotate-180 {
  filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=2);
  -webkit-transform: rotate(180deg);
  -moz-transform: rotate(180deg);
  -ms-transform: rotate(180deg);
  -o-transform: rotate(180deg);
  transform: rotate(180deg);
}
.gly-rotate-270 {
  filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
  -webkit-transform: rotate(270deg);
  -moz-transform: rotate(270deg);
  -ms-transform: rotate(270deg);
  -o-transform: rotate(270deg);
  transform: rotate(270deg);
}
.gly-flip-horizontal {
  filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=0, mirror=1);
  -webkit-transform: scale(-1, 1);
  -moz-transform: scale(-1, 1);
  -ms-transform: scale(-1, 1);
  -o-transform: scale(-1, 1);
  transform: scale(-1, 1);
}
.gly-flip-vertical {
  filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=2, mirror=1);
  -webkit-transform: scale(1, -1);
  -moz-transform: scale(1, -1);
  -ms-transform: scale(1, -1);
  -o-transform: scale(1, -1);
  transform: scale(1, -1);
}

   </style>      
</head>

<body>

<?php 
if(isset($_GET['poste'])){
	
include("connection.php");	
	

	$nbr=0;
$connec=mysqli_connect($_SESSION['page'][0],$_SESSION['page'][1],$_SESSION['page'][2]) or die('Connexion impossible : ' . mysqli_error());
mysqli_query ($connec,'SET NAMES \'UTF8\'');

$db=mysqli_select_db($connec,$_SESSION['page'][3]) or die('Connexion impossible : ' . mysqli_error());
//----------------------------
$query00="select * from poste where Nom_poste='".$_GET['poste']."'";
	$date_convocation='';
	  $dat_fin=null;
	   $incr=0;
$result00=mysqli_query($connec,$query00);	
while ($row=mysqli_fetch_array($result00)){
	$date_convocation=$row['date_convocation']; 
	
	$dat_fin=	$row['Date_fin'];
$date_fin_conv=$row['date_fin_conv'];

$datedujour = date('y-m-d');
$dfin=explode("-",$dat_fin);
$djour=explode("-",$datedujour);
$finab=$dfin[0].$dfin[1].$dfin[2];
$auj=($djour[0]+2000).$djour[1].$djour[2];

$date_fin_conva=explode("-",$date_fin_conv);
$date_fin_convb=$date_fin_conva[0].$date_fin_conva[1].$date_fin_conva[2];


if($auj<$finab){
	$incr++;
//echo "<option style=\"color:#000;text-align-last: center;font-weight:bold;\" >".$row["Nom_poste"]."</option>";
}
	
}

if(($date_convocation=='' || $date_convocation=='0000-00-00') &&$incr==0){
	 echo "<br><br><p style=\"font-size:24px;color:#c00\">انتهت فترة التسجيل في منصب :".$_GET['poste']."<br>"	;
	 
	 $query_accept="select * from dossier_accept where code='".$_GET['code']."' ";
$result_accept=mysqli_query($connec,$query_accept);
$accept="";
while ($row=mysqli_fetch_array($result_accept)){
	$accept=$row['accept']; 
	$cause=$row['cause'];
}
if($accept=="non"){
	echo "ملفك مرفوض <span class='fa fa-remove'></span><br><u>السبب</u> <br>".$cause."<br><p style=\"font-size:26px;color:#c0c\"> يمنك ارسال طعن عند تحديد تاريخ  فترة الطعون</p><span style=\"font-size:50px;color:#009\" class=\"glyphicon glyphicon-hourglass gly-spin\"></span><br>";
}
	if($accept=="oui"){
	echo "<p style=\"font-size:26px;color:#0c0\">ملفك مقبول<span class='fa fa-check'></span></p>";
 
echo "<p style=\"font-size:26px;color:#c0c\">لم يتم تحديد موعد المسابقة<br> يمكنك سحب الاستدعاء عند تحديد التاريخ</p><span style=\"font-size:50px;color:#009\" class=\"glyphicon glyphicon-hourglass gly-spin\"></span><br>";
}
unset($_SESSION['email1']);
unset($_SESSION['password1']);
}
else{
$query_accept="select * from dossier_accept where code='".$_GET['code']."' ";
$result_accept=mysqli_query($connec,$query_accept);
$accept="";
while ($row=mysqli_fetch_array($result_accept)){
	$accept=$row['accept']; 
}
//********************************
$query_compte="select * from compte where email='".$_GET['code']."' ";
$result_compte=mysqli_query($connec,$query_compte);
$id="";
while ($row=mysqli_fetch_array($result_compte)){
	$id=$row['id_user']; 
}
//********************************
	if($accept=="oui"){
echo "<script>window.location.replace(\"sauvgarde/pdf/convocation.php?id=".$id."\");</script>";	
	}
	else{
			if($accept=="non" && $auj<=$date_fin_convb){
				

echo "<script>window.location.replace(\"recours.php\");</script>";	
	}
	else if($accept=="non" && $auj>$date_fin_convb){
	
		echo "<script>alert('  ملفك م  رفوض   انتهت فترة الطعون')</script>";
		echo "<script>window.location.replace(\"entre.php\");</script>";
	}
		else{
		
		echo "<br><p style=\"font-size:24px;color:#c00\">ملفك لم يعالج بعد من طرف الإدارة </p>";
		}
	}
}
//------------------------
}


//*********************


//*****************

	
	?>
    <br  /><br />
   
</body>
</html>