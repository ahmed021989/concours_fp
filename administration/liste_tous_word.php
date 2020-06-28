<?php 
header("Content-type: application/vnd-ms-word");
$file="قائمة المترشحين ".$_POST['select_tous']." .doc";
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
if(isset($_POST['select_tous'])){

$htmlpersian = '
<h2 style="text-align:center">الجمهوريــة الجزائريـــــة الديمقراطيـــــة الشعبيــــــة</h2><p style="text-align:center;text-size:9px">وزارة الصحة و السكان و اصلاح المستشفيات</p><br />مديرية الصحة و السكان لولاية الشلف
<br />';
//requete ettablissemednt************************
$query2="select * from etablissement ";
$result2=mysqli_query($connec,$query2);
//requete dossier accept*************************
$query3="select * from compte,condidat  where compte.email=condidat.code  and condidat.grade='".$_POST['select_tous']."' and condidat.excercice='".$user->excercice."' order by condidat.id";
$result3=mysqli_query($connec,$query3);
$nbr1= mysqli_num_rows($result3);
$nom_etab="";
$nom_directeur="";
while ($row=mysqli_fetch_array($result2)){ 
$nom_etab=$row["Nom_etab_ar"];
$nom_directeur=$row["Nom_direc_ar"];
$htmlpersian.=$row["Nom_etab_ar"].'<br>';
}

$htmlpersian.='<p>تسجيل ملفات الترشح في المسابقة على أساس الشهادة للالتحاق برتبة :'.$_POST['select_tous'].'.</p><br>';
echo $htmlpersian;
$htmlpersian='<table border="1" cellspacing="0" cellpadding="2"> <tr><th>الرقم  </th><th>تاريخ التسجيل الالكتروني</th><th>تاريخ ايداع الملف </th><th>لقب و اسم المترشح</th><th>تاريخ الميلاد</th><th> الملاحظات(الوثائق الناقصة( </th></tr>';
$htmlpersian.='<tbody>';
$i=1;
while ($row=mysqli_fetch_array($result3)){ 
//requette compte******************************
$query12="select * from compte ";
$result12=mysqli_query($connec,$query12);

$date_inscr="";

while ($row1=mysqli_fetch_array($result12)){ 
$date_inscr=$row['date_inscr'];

}
//fin compte requete*****************************


$query11="select * from condidat where code='".$row['code']."' and grade='".$_POST['select_tous']."'";
 
$result11=mysqli_query($connec,$query11);

$cod="";
$i=0;
$nom="";
$date_naissance="";

while ($row=mysqli_fetch_array($result11)){ 
//$htmlpersian.="<br><b> اللقب و الاسم : </b>".$row["nom"]."    ".$row["prenom"].'';
$cod=$row['code'];
$i=$row['id'];
$nom=$row['nom'].' '.$row['prenom'];
$date_naisance=$row['date_naisance'];

}


$htmlpersian.='<tr><td>'.$i.'</td><td>'.$date_inscr.'</td><td></td><td>'.$nom.'</td><td>'.$date_naisance.'</td><td></td>';


	$htmlpersian.='</tr>';

}
$htmlpersian.="</tbody></table>";
echo $htmlpersian;
$htmlpersian='أنا الممضي أسفله السيد: '.$nom_directeur.' مدير '.$nom_etab.'  أشهد .............. لرتبة  '.$_POST['select_tous'].' قد أغلق عند الرقم  '.$nbr1.'  يوم .....على الساعة ...... ';
echo $htmlpersian;
}
else{
	header("location: index.php");
}
?>

</body>
</html>
