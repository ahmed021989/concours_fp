<?php
@session_start();
if(isset($_SESSION['count']) ){
$_SESSION['count']=$_SESSION['count']+1;
unset($_SESSION['pass']);	
unset($_SESSION['count']);
 header("Location: ../../entre.php");
}
else{
	if(isset($_SESSION['pass'])){
$_SESSION['count']=1;	
}
}

ob_start(); 


//============================================================+
// File name   : example_006.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 006 for TCPDF class
//               WriteHTML and RTL support
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML and RTL support
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).


require_once("connection.php");	
$connec=mysqli_connect($_SESSION['page'][0],$_SESSION['page'][1],$_SESSION['page'][2]) or die('Connexion impossible : ' . mysqli_error());
mysqli_query ($connec,'SET NAMES \'UTF8\'');

$db=mysqli_select_db($connec,$_SESSION['page'][3]) or die('Connexion impossible : ' . mysqli_error($connec));
$tab=explode( ':', $_GET["id"] );
$code= $tab[0];
$query1="select * from condidat where code='".$code."'";
$result1=mysqli_query($connec,$query1);
	  $code1= mysqli_num_rows($result1); 
	  $query2="select * from compte where id_user='".$_GET['id']."'";
	  $result2=mysqli_query($connec,$query2);
	  $code2= mysqli_num_rows($result2); 

require_once('tcpdf_include.php');


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('author');
$pdf->SetTitle('وصل التسجيل');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');





// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor



// set some language dependent data:
$lg = Array();
$lg['a_meta_charset'] = 'UTF-8';
$lg['a_meta_dir'] = 'rtl';
$lg['a_meta_language'] = 'fa';
$lg['w_page'] = 'page';

// set some language-dependent strings (optional)
$pdf->setLanguageArray($lg);
$pdf->SetFont('aealarabiya', '', 18);

// ---------------------------------------------------------

// set font


// add a page
$pdf->AddPage();




// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

// create some HTML content


/*$htmlpersian = '
<h2 style="text-align:center">الجمهوريــة الجزائريــة الديمقراطيـة الشعبيـة<span dir="ltr"><br />
  </span>نموذج رقم<span dir="ltr"> </span><span dir="ltr"><span dir="ltr"> </span> </span><strong><span dir="ltr">(2)</span></strong><span dir="ltr"> </span><span dir="ltr"><br />
  </span>استمارة معلومات للمشاركة في المسابقة على أساس الشهادة <span dir="ltr"><br />
</span>للإلتحاق برتبة:
';
while ($row=mysqli_fetch_array($result1)){ 
$htmlpersian.=$row["grade"].'</h2>';
}*/
if($code2!=0 && isset($_SESSION['pass']) ){


$htmlpersian = '
<h2 style="text-align:center">الجمهوريــة الجزائريـــــة الديمقراطيـــــة الشعبيــــــة</h2><br /><p style="text-align:center;text-size:9px">وزارة الصحة و السكان و اصلاح المستشفيات</p><br />مديرية الصحة و السكان لولاية الشلف
<br />';
//requete ettablissemednt************************
$query2="select * from etablissement ";
$result2=mysqli_query($connec,$query2);
//requete compte*************************
$query3="select * from compte  where email='".$code."'";
$result3=mysqli_query($connec,$query3);

while ($row=mysqli_fetch_array($result2)){ 
$htmlpersian.=$row["Nom_etab_ar"].'<br>';
}
$htmlpersian.='<h2 style="text-align:center"><u>وصل التسجيل</u></h2>';
$grade="";
while ($row=mysqli_fetch_array($result1)){ 
$htmlpersian.="<br><b> اللقب و الاسم:</b>".$row["nom"]."   ".$row["prenom"].'<br>';
$grade=$row['grade'];
}
while ($row=mysqli_fetch_array($result3)){ 
$htmlpersian.="<br><b> اسم المستخدم :</b>".$row["email"]."<b> كلمة السر :</b>".$row["password"].'</h2>';

}

$htmlpersian.="<b>مسابقة على أساس الشهادة للإلتحاق برتبة :</b>     ".$grade."<br><br><br><br><br><br>الرجاء الاحتفاظ بهذا الوصل فهو يحتوي على اسم المستخدم وكلمة السر للدخول إلى البوابة ";

$pdf->WriteHTML($htmlpersian, true, 0, true, 0);
$pdf->SetFont('aealarabiya', 'I', 14);
$pdf->setRTL(false);
// set LTR direction for english translation

$querydate="select * from compte  where email='".$code."'";
$resultdate=mysqli_query($connec,$querydate);
$date = "";
$heure = "";
while ($row=mysqli_fetch_array($resultdate)){ 
$date=$row["date_inscr"];
$heure=$row["heure_inscr"];
}

//$mine = date("i");
$html='<br><br><br><div style="text-align:center;float:right"><u>www.'.$_SERVER['HTTP_HOST']."/concours : ";
$html.='</u>  يوم   '.$date.' | الساعة '.$heure.' </div>';
$pdf->WriteHTML($html, true, 0, true, 0);
$pdf->setRTL(false);
// set LTR direction for english translation
$html='<img src="images/logo.JPG" style="left:10px; width:110px;height:110px;float:left" />';
$pdf->WriteHTML($html, true, 0, true, 0);
$pdf->SetFontSize(10);

// print newline
//$pdf->Ln();
}
else{
 header("Location: ../../entre.php");	
}


 

// ---------------------------------------------------------
ob_end_clean();
//Close and output PDF document
$pdf->Output('quitance.pdf', 'I');



//============================================================+
// END OF FILE
//============================================================+
?>