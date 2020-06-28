<?php include("connection.php");	
	

	$nbr=0;
$connec=mysqli_connect($_SESSION['page'][0],$_SESSION['page'][1],$_SESSION['page'][2]) or die('Connexion impossible : ' . mysqli_error());
mysqli_query ($connec,'SET NAMES \'UTF8\'');

$db=mysqli_select_db($connec,$_SESSION['page'][3]) or die('Connexion impossible : ' . mysqli_error());
$nom="";
if(isset($_POST["email"])){
	//**************************
$query="select * from compte where email='".$_POST["email"]."' and password='".$_POST["pasword"]."'";
$result=mysqli_query($connec,$query);
	  $code= mysqli_num_rows($result);
}
	  
	  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<select  style="color:#009;text-align-last: center;
padding-right:29px;;border-radius:20px"   class="form-control" name="grade"  id="grado"  oninvalid="this.setCustomValidity('الرجاء اختيار الولاية')" oninput="setCustomValidity('')" required />
       <option style="color:#000;text-align-last: center;font-weight:bold;
"  value=""  >إختيار الولاية</option>
       <?php   
	   
$query="select * from wilayas";

$result=mysqli_query($connec,$query);	
while ($row=mysqli_fetch_array($result)){ 
//if(!empty(mysqli_fetch_array($result1))){

echo "<option style=\"color:#000;text-align-last: center;font-weight:bold;\" >".$row["nom"]."</option>";

}
?>
</body>
</html>