<?php 
header("Content-type: application/vnd-ms-word");
$file="مقبولين ".$_POST['select_admis'].".doc";
header("Content-Disposition: attachment; Filename=".$file."");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" >
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<p>
  <?php
@session_start();
require_once("includes/initialiser.php");
require_once("../connection.php");	
$connec=mysqli_connect($_SESSION['page'][0],$_SESSION['page'][1],$_SESSION['page'][2]) or die('Connexion impossible : ' . mysqli_error());
mysqli_query ($connec,'SET NAMES \'UTF8\'');

$db=mysqli_select_db($connec,$_SESSION['page'][3]) or die('Connexion impossible : ' . mysqli_error($connec));


$user = Personne::trouve_par_id($session->id_utilisateur);
if(isset($_POST['select_admis']) && $_POST['select_admis']!="_          --- إختر المنصب ---    "){

$htmlpersian='<p align="center"><strong><span dir="rtl">الجمهورية  الجزائرية  الديمقرطية الشعبية</span></strong></p>

<p align="center"><strong><span dir="rtl">وزارة الصحة والسكان  و إصلاح المستشفيات</span></strong><strong><span dir="rtl"> </span></strong></p>
<p align="right"><strong><span dir="rtl">مديرية الصحة والسكان لولاية  الشلف</span></strong><br />
  <strong><span dir="rtl"> ';
  //requete ettablissemednt************************
$query2="select * from etablissement ";
$result2=mysqli_query($connec,$query2);
//requete dossier accept*************************
$query3="select * from dossier_accept,condidat     where dossier_accept.code=condidat.code and  accept='oui' and grade='".$_POST['select_admis']."' and condidat.excercice='".$user->excercice."' order by condidat.id ";
$result3=mysqli_query($connec,$query3);

$nom_etab="";
$nom_directeur="";
while ($row=mysqli_fetch_array($result2)){ 
$nom_etab=$row["Nom_etab_ar"];
$nom_directeur=$row["Nom_direc_ar"];
$htmlpersian.=$row["Nom_etab_ar"].'<br>';
}
  $htmlpersian.=' </span></strong><br />
  <strong><span dir="rtl">المديرية الفرعية للموارد  البشرية </span></strong></p>
<br><p align="center"><strong><span dir="rtl">محضر اللجنة التقنية  لانتقاء الترشيحات للمسابقة على أساس الشهادات للإلتحاق</span></strong><br />
  <strong><span dir="rtl">برتبة: '.$_POST['select_admis'].'</span></strong></p>
<br><p align="right"><strong><span dir="rtl">في عام  ألفين و ثمانية عشر ، و في اليوم =====  من شهر ======= ، وطبقا للمقرر رقم :   ====       المؤرخ في :=============== المتضمن فتح المسابقة على أساس الشهادات  للإلتحاق برتبة : ============  ، إجتمعت  اللجنة التقنية المكلفة بإنتقاء ملفات الترشح و البالغ عددها  ===== كما هو مدون في السجل الخاص المفتوح لهذا  الغرض .</span></strong><br />
  <strong><u><span dir="rtl">حضر الأعضاء التالية  أسماؤهم</span></u></strong><strong><span dir="rtl"> :</span></strong><br />
  <strong><span dir="rtl"> * السيد :  '.$nom_directeur.'             مدير  '.$nom_etab.'                                                    رئيسا </span></strong><br />
  <strong><span dir="rtl"> * السيدة: ========              ممثل العمال                                                                                                     عضو </span></strong><br />
  <strong><span dir="rtl">* السيد :   ========             ممثل العمال                                                                                                    عضوا</span></strong><br />
  <strong><span dir="rtl">* السيد :  =========            ممثل الادارة                                                                                                   عضوا</span></strong><br />
  <strong><span dir="rtl">* السيد:   =========            ممثل الادارة                                                                                                   عضوا</span></strong></p>
<p align="right"><strong><span dir="rtl">&nbsp;</span></strong></p>
<p align="right"><strong><span dir="rtl">عند إنتهاء أشغالها ، إعتمدت  اللجنة التقنية لإنتقاء الترشيحات ملفات المترشحين المدون أسماؤهم في الجدول  المرفق طيه .</span></strong></p>
';
echo $htmlpersian;



$htmlpersian = '<br><br><br><br><center><p><strong><span dir="rtl">جدول انتقاء  المترشحين لمسابقات على أساس الشهادات</span></strong></center>';


$htmlpersian.='<ol>
  <li><span dir="rtl"> </span><strong>عدد ملفات الترشح  المقبولة : '.$_POST['select_admis'].'</strong><strong><span dir="ltr"> </span></strong></li>
</ol>';
echo $htmlpersian;
$htmlpersian='<table border="1" cellspacing="0" cellpadding="2"> <tr><th>الرقم التسلسلي </th><th>رقم التسجيل في السجل الخاص</th><th style="width:120px">الاسم المترشح  </th><th style="width:50px">تاريخ الإزدياد</th><th> المؤهل أو الشهادة </th><th> التخصص ( تحديد التخصص المدون في المؤهل أو الشهادة(</th><th> الوضعية اتجاه الخدمة الوطنية (مؤجل /معفى لسبب طبي مؤهل لا يجند(</th><th> تاريخ إنقضاء التأجيل من الخدمة الوطنية (بالنسبة للمؤجل(</th><th> تاريخ إنقضاء سريان صحيفة السوابق القضائية رقم 3 </th><th> ملاحظات </th></tr>';
$htmlpersian.='<tbody>';
$i=1;
while ($row=mysqli_fetch_array($result3)){ 


$query11="select * from condidat where code='".$row['code']."' and grade='".$_POST['select_admis']."'";
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
$sexe="";
while ($row=mysqli_fetch_array($result11)){ 
//$htmlpersian.="<br><b> اللقب و الاسم : </b>".$row["nom"]."    ".$row["prenom"].'';
$cod=$row['code'];
$grade=$row['grade'];
$id=$row['id'];
$sexe=$row['sexe'];
$date_naissance=$row['date_naisance'];
$nom=$row['nom'];
$prenom=$row['prenom'];
$service_national=$row['service_national'];
$date_fin_source_sv=$row['date_fin_source_sv'];
}
//requette diplome******************************
$query12="select * from diplome where code='".$cod."' ";
$result12=mysqli_query($connec,$query12);
$nom_diplom="";
$nom_specialite="";

while ($row1=mysqli_fetch_array($result12)){ 
$nom_diplom=$row1['nom_diplom'];
$nom_specialite=$row1['nom_specialite'];

}
//fin diplome requete*****************************


$htmlpersian.='<tr><td>'.$i.'</td><td>'.$id.'</td><td>'.$nom.' '.$prenom.'</td><td>'.$date_naissance.'</td><td>'.$nom_diplom.'</td><td>'.$nom_specialite.'</td>';
if($sexe=='أنثى'){
$htmlpersian.='<td></td>';	
}
else{
$htmlpersian.='<td>'.$service_national.'</td>';
}
if($date_fin_source_sv!="0000-00-00"){
	$htmlpersian.='<td>'.$date_fin_source_sv.'</td>';
}
else{
	$htmlpersian.='<td></td>';
}

	$htmlpersian.='<td></td><td></td></tr>';
++$i;
}
$htmlpersian.="</tbody></table>";

echo $htmlpersian;

$htmlpersian='<p dir="rtl"><strong>إمضاء ممثلو العمال                                                                    إمضاء  ممثلو الادارة                                                                      إمضاء المدير </strong></p>';
echo $htmlpersian;


}
else{
	header("location: index.php");
}
?>

</body>
</html>
