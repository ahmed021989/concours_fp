<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>بوابة التوظيف</title>
</head>

<body>
<?php
session_start();

include("connection.php");	
$connec=mysqli_connect($_SESSION['page'][0],$_SESSION['page'][1],$_SESSION['page'][2]) or die('Connexion impossible : ' . mysqli_error());
mysqli_query ($connec,'SET NAMES \'UTF8\'');

$db=mysqli_select_db($connec,$_SESSION['page'][3]) or die('Connexion impossible : ' . mysqli_error($connec));

//******************************4
if(isset($_POST["email"])){
	//**************************
$query="select * from compte where email='".$_POST["email"]."' and password='".$_POST["pasword"]."'";
$result=mysqli_query($connec,$query);
	  $code= mysqli_num_rows($result);
	  $id="";
	  while($row=mysqli_fetch_array($result)){
		$id=$row['id_user'];  
	  }
	  
	//*******************************
	$query1="select * from compte where email='".$_POST["email"]."' and password='".$_POST["pasword"]."' and active='oui'";
$result1=mysqli_query($connec,$query1);
	  $code1= mysqli_num_rows($result1); 
	   
	  //***********************
	  $query2="select * from compte where email='".$_POST["email"]."' and password='".$_POST["pasword"]."' and active='oui' and inscrit='oui'";
$result2=mysqli_query($connec,$query2);
	  $code2= mysqli_num_rows($result2);
	  
	  //************************


if($code==1 && $code1==1 && $code2==0){
 $_SESSION['login_er_conv']=" لم تسجل   ؟؟".$_POST['email']."     ";
 header("Location: convocation.php");

}
else{
	if($code==1 && $code1==1 && $code2==1){
		
//********************************		
	
	  $query01="select * from condidat where code='".$_POST['email']."'";
	$grade='';
$result01=mysqli_query($connec,$query01);	
while ($row=mysqli_fetch_array($result01)){
	$grade=$row['grade']; 
}
	$query00="select * from poste where Nom_poste='".$grade."'";
	$date_convocation='';

$result00=mysqli_query($connec,$query00);	
while ($row=mysqli_fetch_array($result00)){
	$date_convocation=$row['date_convocation']; 
	




	
}  
	
	  if($date_convocation=="0000-00-00"){
		$_SESSION['login_er_conv']="لم يتم تحديد تاريخ المسابقة ؟؟";
 header("Location: convocation.php");  
	
	  }else{
	 header("Location: sauvgarde/pdf/convocation.php?id=".$id."");	  
	  } 	


//****************************************


	}
	else{
	
	if($code==1 && $code1==0 ){
	 $_SESSION['login_er_conv']="   لست مسجل مسبقا  ؟؟".$_POST['email']."    ";
 header("Location: convocation.php");	
	}
	else{
 $_SESSION['login_er_conv']="خطأ في إسم البريد الاليكتروني أو كلمة السر خاطئة ؟؟";
 header("Location: convocation.php");
			echo "<br />لم يتم تسجيل دخولك.";
}
}
}




//******************************4








$code= $_POST['email'];

$query1="select * from condidat where code='".$code."'";
$result1=mysqli_query($connec,$query1);
	  $code1= mysqli_num_rows($result1); 
	  
	  //------------------------
	
	  
	  //--------------------------
	
	
	  
}
else{

 header("Location: convocation.php");	


}
?>
</body>
</html>