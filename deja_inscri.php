<?php
@session_start();

		require_once("connection.php");	
	

	$nbr=0;
$connec=mysqli_connect($_SESSION['page'][0],$_SESSION['page'][1],$_SESSION['page'][2]) or die('Connexion impossible : ' . mysqli_error());
mysqli_query ($connec,'SET NAMES \'UTF8\'');

$db=mysqli_select_db($connec,$_SESSION['page'][3]) or die('Connexion impossible : ' . mysqli_error());
	//echo "la session mail est ".$_SESSION['page'][0];	



//creation de la valeur de l'atribut "code"

  ?>
   <h3 style="color:#FFF"><strong><?php 
$quer="select * from etablissement";
$resul=mysqli_query($connec,$quer);	
$nom_etab="";
$Add_mail_etab="";
$Num_tele_01="";
while ($row=mysqli_fetch_array($resul)){
	$nom_etab=$row['Nom_etab_ar'];
echo $row['Nom_etab_fr'].'<br>'.$row['Nom_etab_ar'];
$Add_mail_etab=$row['Add_mail_etab'];
$Num_tele_01=$row['Num_tele_01'];
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
         <script>
		    $(document).ready(function(){
	$.backstretch("assets/img/backgrounds/1.jpg"); 
	   });
	  </script> 
      <style>
	  .btn{
	 font-size:24px;
	 height:100px;
	 width:300px;
	 background:rgba(0,0,0, 0.1);	
	 color:#FFF;  
	 border-radius:0;
	margin:10px;
	  }
	    .btn-update:{
	 font-size:24px;
	 height:100px;
	 width:300px;
	 background:rgba(0,0,0, 0.1);	
	 color:#F60;  
	 border-radius:0;
	margin:10px;
	  }
	 .btn:hover{
		 font-size:30px;
	 height:120px;
	 width:320px;
	 background:rgba(0,0,0, 0.3);  
	 color:#0CF;
	  }
	   .btn-update:hover{
	 font-size:30px;
	 height:120px;
	 width:320px;
	 background:rgba(0,0,0, 0.3);  
	 color:#F60;
	  }
	  
	  
	  </style>
</head>

<body>

<?php 
$query00="select * from condidat where code='".$_SESSION['email1']."'";
	$grade='';
$result00=mysqli_query($connec,$query00);	
while ($row=mysqli_fetch_array($result00)){
	$grade=$row['grade']; 
}

if(isset($_SESSION['email1'])){
	//echo "la session mail est ".$_SESSION['email1'];

//----------------------------
$query00="select * from condidat where code='".$_SESSION['email1']."'";
	$grade='';
$result00=mysqli_query($connec,$query00);	
while ($row=mysqli_fetch_array($result00)){
	$grade=$row['grade']; 
}
//------------------------



//*********************
$query="select * from poste where Nom_poste='".$grade."'";
	   $dat_fin=null;
	   $incr=0;
$result=mysqli_query($connec,$query);	
while ($row=mysqli_fetch_array($result)){ 
//if(!empty(mysqli_fetch_array($result1))){
	
$dat_fin=	$row['Date_fin'];


$datedujour = date('y-m-d');
$dfin=explode("-",$dat_fin);
$djour=explode("-",$datedujour);
$finab=$dfin[0].$dfin[1].$dfin[2];
$auj=($djour[0]+2000).$djour[1].$djour[2];
if($auj<=$finab){
	$incr++;
//echo "<option style=\"color:#000;text-align-last: center;font-weight:bold;\" >".$row["Nom_poste"]."</option>";
}
}
if($incr==0){
	
	
echo "<script>window.location.replace(\"fin.php?poste=".$grade."\&code=".$_SESSION['email1']."\");</script>";

}
//*****************

	$query0="select * from compte where email='".$_SESSION["email1"]."' ";
$result0=mysqli_query($connec,$query0);
$email='';
$id='';
$nom='';
$prenom='';
while($row0=mysqli_fetch_array($result0)){
$email=$row0['email'];
$id=$row0['id_user'];	
$nom=$row0['nom_user'];
$prenom=$row0['prenom_user'];
}


	?>
  
				
                
			
                
				
			
					
  
    <fieldset>
  <div class="row">
             <div class="col-sm-10 col-sm-offset-1 form-box"style="border:1px solid #99F;border-radius: 10px;">  
    <p style="font-size:30px" class="alert alert-success col-sm-6 col-sm-offset-3"> <?php  echo $nom." ".$prenom."  :"?> بياناتك مسجلة</p>
   <br />
    <div class="row">
    <div  class="col-sm-12 col-xs-offset-0 ">
 
    <a class="btn " href="sauvgarde/pdf/imprimer_fiche.php?code=<?php echo $email?>"  target="_blank" ><span class="glyphicon glyphicon-print" > </span><br /> طباعة الإستمارة</a>

 <a style="" class="btn " href="sauvgarde/pdf/imprimer.php?id=<?php echo $id;?>" value="طباعة وصل التسجيل" target="_blank"> <span class="glyphicon glyphicon-print"></span><br /> طباعة وصل التسجيل</a>


      <a  class="btn btn-update" href="index2.php?id=<?php echo $id;?>" value="طباعة وصل التسجيل"  target="_blank"><span class="glyphicon glyphicon-pencil"></span><br /> تحديث البيانات</a>
    <?php 
	$_SESSION['pass']=$_SESSION['pasword1'];
	?>
  
      <br />
      <br />
      </div>
 </div>    
<?php   

}
?>

 <div class="alert alert-danger">
  <strong><b style="color:#6D0706"><u> ملاحظات هامة  :</u></b></strong><br />
<p  class="alert alert-success" ><b style="color:#000303">   على المترشحين الإطلاع على كافة مراحل التوظيف و التي يعلن عنها عن طريق موقع التوظيف للمؤسسة  </b> <a><?php echo $_SERVER['HTTP_HOST']."/" ?>concours</a> </p>
<p  class="alert alert"  style="background-color:#08C43B" > <b style="color:#000303"> عليك الاطلاع باستمرار لمعرفة وضعية ملفك </b> <b style="color:#F6F9F7">(لاسيما المترشحين المقبولين و المرفوضين،إيداع الطعون و آجالها ، نتائج دراسة الطعون ، تاريخ و مكان إجراء المقابلة ، إعلان النتائج النهائية)  </b> </p>
<p  class="alert alert"   style="background-color:#06CBF7" ><b style="color:#000303">للاستعلام و الاستفسار :</b><b style="color:#F6F9F7"><?php echo "<u> ايميل:</u>".$Add_mail_etab." &nbsp;  <u>الهاتف:</u>  ".$Num_tele_01 ?> </b></p>

</div>

</div></div></fieldset>

</body>
</html>