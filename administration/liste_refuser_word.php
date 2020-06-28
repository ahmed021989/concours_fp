<?php 
header("Content-type: application/vnd-ms-word");
$file="المرفوضين ".$_POST['select_refuse'].".doc";
header("Content-Disposition: attachment; Filename=".$file."");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" >
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
@session_start();
require_once("includes/initialiser.php");
require_once("../connection.php");	
$connec=mysqli_connect($_SESSION['page'][0],$_SESSION['page'][1],$_SESSION['page'][2]) or die('Connexion impossible : ' . mysqli_error());
mysqli_query ($connec,'SET NAMES \'UTF8\'');

$db=mysqli_select_db($connec,$_SESSION['page'][3]) or die('Connexion impossible : ' . mysqli_error($connec));

$user = Personne::trouve_par_id($session->id_utilisateur);
if(isset($_POST['select_refuse'])){

$htmlpersian = '
<h2 style="text-align:center">الجمهوريــة الجزائريـــــة الديمقراطيـــــة الشعبيــــــة</h2><p style="text-align:center;text-size:9px">وزارة الصحة و السكان و اصلاح المستشفيات</p><br />مديرية الصحة و السكان لولاية الشلف
<br />';
//requete ettablissemednt************************
$query2="select * from etablissement ";
$result2=mysqli_query($connec,$query2);
//requete dossier accept*************************
$query3="select * from dossier_accept,condidat  where dossier_accept.code=condidat.code and  accept='non' and grade='".$_POST['select_refuse']."' and condidat.excercice='".$user->excercice."' order by condidat.id";
$result3=mysqli_query($connec,$query3);


while ($row=mysqli_fetch_array($result2)){ 
$htmlpersian.=$row["Nom_etab_ar"].'<br>';
}

$htmlpersian.='<h2 style="text-align:right"><u>ملفات الترشح المرفوضة'.$_POST['select_refuse'].'</u></h2><br>';
echo $htmlpersian;
$htmlpersian='<table border="1" cellspacing="0" cellpadding="2"> <tr><th> الرقم التسلسلي </th><th> رقم التسجيل في السجل الخاص </th><th> الاسم المترشح  </th><th>  تاريخ الإزدياد </th><th> سبب الرفض بالتفصيل ( وثائق ناقصة أو منتهية الصلاحية أو أي سبب آخر) </th><th> مرجع الرفض ( رقم وتاريخ الرسالة الموصى عليها) </th><th> ملاحظات </th></tr>';
$htmlpersian.='<tbody>';
$i=1;
while ($row=mysqli_fetch_array($result3)){ 
$cause=$row['cause'];

$query11="select * from condidat where code='".$row['code']."' and grade='".$_POST['select_refuse']."'";



$result11=mysqli_query($connec,$query11);

$grade="";
$date_naissance="";
$mail="";
$nom="";
$prenom="";
$id="";
$cod="";
$service_national="";
$date_fin_source_sv="";
while ($row=mysqli_fetch_array($result11)){ 
//$htmlpersian.="<br><b> اللقب و الاسم : </b>".$row["nom"]."    ".$row["prenom"].'';
$cod=$row['code'];
$grade=$row['grade'];
$id=$row['id'];
$date_naissance=$row['date_naisance'];
$nom=$row['nom'];
$prenom=$row['prenom'];
$service_national=$row['service_national'];
$date_fin_source_sv=$row['date_fin_source_sv'];
}

//fin diplome requete*****************************


$htmlpersian.='<tr><td>'.$i.'</td><td>'.$id.'</td><td>'.$nom.' '.$prenom.'</td><td>'.$date_naissance.'</td><td>'.$cause.'</td><td></td><td></td></tr>';


	//$htmlpersian.='<td></td><td></td></tr>';
++$i;
}
$htmlpersian.="</tbody></table>";
echo $htmlpersian;
$htmlpersian='<center><br><p style="text-align:center;">حرر ب:.... في:.........     </center>';
$htmlpersian.='<center><p style="text-align:center;">إمضاء و ختم السلطة التي لها صلاحية التعيين أو ممثليها</center>';
$htmlpersian.='<center><p style="text-align:center;">إمضاء ممثلي المؤسسة أو الإدارة المعنية &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;إمضاء الأعضاء الممثلين المنتخبين عن اللجنة الإدارية المتساوية الأعضاء المختصة <br />إزاء السلك أو الرتبة المعنية</center>';
echo $htmlpersian;
}
else{
	header("location: index.php");
}
?>

</body>
</html>
