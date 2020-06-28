<?php
session_start();

require_once("connection.php");	
$connec=mysqli_connect($_SESSION['page'][0],$_SESSION['page'][1],$_SESSION['page'][2]) or die('Connexion impossible : ' . mysqli_error());
mysqli_query ($connec,'SET NAMES \'UTF8\'');

$db=mysqli_select_db($connec,$_SESSION['page'][3]) or die('Connexion impossible : ' . mysqli_error($connec));
$query0="select * from etablissement";

$result0=mysqli_query($connec,$query0);

?>

<body class="scrollable" >



<div class="row">

<div class="col-sm-10 col-sm-offset-1 " style="border:1px solid #999;
background:rgba(400,200,255,0.2);border-radius:5px;">

 <p style="color:#FFF;font-size:32px;font-family:'Droid Arabic Naskh', serif"><img class='img-thumbnail pull-left' accept='image/gif, image/jpg, image/jpeg, image/png'   type='image' id='photo".$i."' src='logo.png'   style="border-radius: 55px;height:110px;margin-top:20px" /><h3  class="alert alert" style="background-color:#DAF7A6;height:110px" ><strong><?php 
$quer="select * from etablissement";
$resul=mysqli_query($connec,$quer);	
$nom_etab="";
$adres="";
$Add_mail_etab="";
$Num_tele_01="";
while ($row=mysqli_fetch_array($resul)){
	$nom_etab=$row['Nom_etab_ar'];
	$adres=$row['Add_etab_ar'];
	$Add_mail_etab=$row['Add_mail_etab'];
$Num_tele_01=$row['Num_tele_01'];
echo $row['Nom_etab_fr'].'<br>'.$row['Nom_etab_ar'];
}
 ?></h3></p>
 </div></div></div>
 
 <!--<img id="imga" src="Image1.png" class="body full zoom"  >-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl" >
<head>


     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $nom_etab;?></title>

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
#imga {
 overflow: hidden;
}

.full {
  position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
  display: block;
}

.zoom {
	 
  animation: scale 40s  infinite;
}
  
@keyframes scale {
  50% {
 -webkit-transform:scale(1.5);
-moz-transform:scale(1.2);
    -ms-transform:scale(1.2);
    -o-transform:scale(1.2);
  transform:scale(1.5);
  }
}
		 
		 #test{
    animation: Test 2s infinite;

}
@keyframes Test{
    0%{opacity: 1;}
    50%{opacity: 0;}
    100%{opacity: 1;}
}

		 body,td,th {
	font-family: Roboto, sans-serif;
}

         body {
	background-color: #fff;
}
         </style>
         

</head>
<body class="scrollable" >


 

<div class="row">
<div class="col-sm-10 col-sm-offset-1 " style="border:1px solid #999;
background:rgba(400,200,255,0.2);border-radius:5px;">

<?php


$query00="select * from poste where nb_poste!=0 ";
	$nom_poste='';
	$nb_poste='';
	$date_debut='';
		$date_fin='';
		$date_concours='';

$result00=mysqli_query($connec,$query00);	
  $code= mysqli_num_rows($result00); 
  if($code!=0){
?>



  <p style="color:#FFF;font-size:32px;font-family:'Droid Arabic Naskh', serif"><?php while ($row=mysqli_fetch_array($result0)){ echo "&nbsp;"; /*$row['Nom_etab_ar'];*/} ?></p>
  <div class="col-sm-12 col-sm-offset-0" style="border:1px solid #999;border-radius:5px;background:rgba(300,255,255,0.3)">
<br /><br />
<p style="color:#0F3;font-size:24px;font-family:'Droid Arabic Naskh', serif" ><h1 style="" class="alert alert-info" ></span>بوابة التسجيل في مسابقة التوظيف</h1></p>

<table class="table-bordered" style="text-align:center;width:100%;font-weight:bold;border-top:30px" >
<thead  style="border-color:#fff;color:#000;max-height:20px;">
<td height="35">المناصب المفتوحة</td>
<td>عدد المناصب</td>
<td> تاريخ بداية التسجيل </td>
<td> تاريخ نهاية التسجيل </td>
<td>سحب  الاستدعاء و الطعون </td>
<td> تاريخ إجراء المسابقة </td>
</thead>

<?php  
while ($row=mysqli_fetch_array($result00)){
	$nom_poste=$row['Nom_poste'];
		$nb_poste=$row['nb_poste'];
	$date_debut=$row['Date_debut']; 
	$date_fin=$row['Date_fin'];
	$date_concours=$row['date_convocation'];
		$date_debut_conv=$row['date_debut_conv'];
			$date_fin_conv=$row['date_fin_conv'];
	
	$dat_fin=	$row['Date_fin'];
$datedujour = date('y-m-d');
$dfin=explode("-",$dat_fin);
$djour=explode("-",$datedujour);
$finab=$dfin[0].$dfin[1].$dfin[2];

$date_fin_conva=explode("-",$date_fin_conv);
$date_fin_convb=$date_fin_conva[0].$date_fin_conva[1].$date_fin_conva[2];

$date_fin_conca=explode("-",$date_concours);
$date_fin_concb=$date_fin_conca[0].$date_fin_conca[1].$date_fin_conca[2];

$auj=($djour[0]+2000).$djour[1].$djour[2];
if($auj<=$finab || $auj<=$date_fin_concb || $date_fin_conv=="0000-00-00"){
	$test;
	$test1;
	$test2;
	if($auj<=$finab){
	$test="test";
	$test2="test0";
	$test1="test0";
	}else{
	if($auj<=$date_fin_convb){
	$test="test0";
	$test2="test0";
	$test1="test";
	}
	else{
	$test="test0";
	$test2="test";
	$test1="test0";	
	}
	}
?>

<tr height="30" style="border-color:#000;color:#FFF;font-weight:bold">
<td><?php  echo $nom_poste;?></td>
<td><?php  echo $nb_poste;?></td>
<td><?php  echo $date_debut;?></td>
<td style=" <?php if($test=="test") echo "color:#F00;font-size:24px;" ;else echo "color:#FFF"; ?>" id="<?php echo  $test ?>"><?php  echo $date_fin;?></td>
<?php  
if($date_fin_conv=='0000-00-00'){
echo '<td>لم يحدد بعد</td>';	
}
else{?>
<td style=" <?php if($test1=="test") echo "color:#F00;font-size:18px;" ;else echo "color:#FFF"; ?>" id="<?php echo  $test1 ?>"><?php  echo "من ". $date_debut_conv ." الى ".$date_fin_conv;?></td>
<?php
	
	
}
if($date_concours=='0000-00-00' ){
echo '<td>لم يحدد بعد</td>';	
}
else{
	 $query_cond="select *  from condidat,dossier_accept where condidat.grade='".$nom_poste."' and dossier_accept.accept='oui' and condidat.code=dossier_accept.code order by id asc ";
$result_cond=mysqli_query($connec,$query_cond);

$i=0;
//$htmlpersian='';
while ($row=mysqli_fetch_array($result_cond)){ 
//$i=$row['c'];

$i++;
}
$Nbr = strlen ($i-1);
$tot_part=intval($i/100);
$decimal = substr($i-1,$Nbr-2,$Nbr);
$ts = strtotime($date_concours);
$unJour = 3600 * 24;
if($decimal<=30 ){
	$tot_part=$tot_part-1;
}
	
	?>
<td style="  <?php if($test2=="test") echo "color:#F00;font-size:24px;" ;else echo "color:#FFF"; ?>" id="<?php echo  $test2 ?>"><?php  echo $date_concours;?></td>
<?php	
}


?>
</tr>
<?php
 }
 else 
 --$code;

}?>
</table>

<?php
 if($code==0){
	 ?>
	
<p style="color:#F00;font-size:24px" > البوابة مغلقة   لا توجد تسجيلات في انتظار الاعلان عن النتائج لاحقا</p>
<span class="fa fa-lock" style="font-size:50px;color:#F00"></span>

<?php
 }
 else{
	?>
   <br />
    <a href="entre.php" style="font-size:24px" class="btn btn-success">الدخول الى البوابة</a><br /> <br />
      <a href="guide.pdf" style="font-size:24px" class="btn btn-danger"  ><u> طريقة التسجيل</u></a><br /><br />
      <div class="alert alert-danger">
      <h3><strong><b style="color:#F00"><u> ملاحظات هامة  :</u></b></strong></h3><br />
   

  

	<div class="alert alert-info" style="font-weight:bold">
     
1-	التسجيل إلزامي على  موقع التوظيف المؤسسة و لا تقبل الملفات دون بطاقة المعلومات المطبوعة من الموقع بعد التسجيل <br />
2-	تودع الملفات لدى مديرية <span style="color:#F33"><?php echo $nom_etab;?> </span>مقرها  <span style="color:#F33"><?php echo $adres; ?></span> و ذلك يوم إجراء المقابلة<br />
</div>
<div class="alert alert-warning" style="font-weight:bold">
3-	على المترشحين الإطلاع على كافة مراحل التوظيف و التي يعلن عنها عن طريق موقع التوظيف للمؤسسة<br />
<a><?php echo "www.".$_SERVER['HTTP_HOST']."/" ?>concours</a><br />

(لاسيما المترشحين المقبولين و المرفوضين،إيداع الطعون و آجالها ، نتائج دراسة الطعون ، تاريخ و مكان إجراء المقابلة ، إعلان النتائج النهائية).<br />

4-	يجب على كل موظف مترشح في المسابقات على أساس الشهادات إرفاق ملف الترشح بالوثائق  التالية :<br />
    -تعهد بالإستقالة في حالة النجاح في المسابقة ، بالإضافة إلى طلب المشاركة في المسابقة يحمل موافقة الإدارة الأصلية <br />
5- يجب أن ترفق شهادات العمل لدى القطاعات الأخرى غير القطاع الوظيفة العمومية بشهادة انتساب إلى صندوق الضمان الاجتماعي 

      </div> 
	  
<div class="alert alert-" style="background-color:#FAAB7E">
<h4><b style="color:#040404"><u>على المترشحين الدخول إلى البوابة بعد نهاية التسجيلات من أجل :  </u></b> </h4><br />
<b style="color:#040404">1- معرفة قبول أو رفض ملفك في المسابقة . </b> <br />
<b style="color:#040404">2- سحب الإستدعاء من منصة التوظيف للمترشحين الذين تم قبول ملفهم من أجل معرفة تاريخ ومكان المسابقة  .  </b> <br />
<b style="color:#040404">3- إيداع الطعون بالنسبة للمترشحين الذين تم رفض ملفهم . </b>  <br />


      </div> 	 

	 

  <div class="alert alert-info" style="font-weight:bold">
	  <p  class="alert alert"   style="background-color:#5DF996" ><b style="color:#040404">للاستعلام و الاستفسار :</b><b style="color:#040404"><?php echo "<u> البريد الإلكتروني:</u>".$Add_mail_etab." &nbsp;  <u>الهاتف:</u>  0".$Num_tele_01 ?> </b></p>
</div>	  
      </div>  
   
    <?php 
 }
 ?>
    <?php  }else{
	
?>
<div class="row">
<p style="color:#F00;font-size:24px" > البوابة مغلقة   لا توجد تسجيلات</p>
<span class="fa fa-lock" style="font-size:50px;color:#F00"></span>
</div>
<?php  }?>

</div><!--fin col-8-->

<p>&nbsp;<p>

</div></div></div>





</body>

</html>
