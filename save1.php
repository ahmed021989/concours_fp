
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl" >

<head>

     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>التسجيل في منصة التوظيف</title>

        <!-- CSS -->
        
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
  
 <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        
<script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>   
<script>
function envoi(){
	 $('#myModal').modal({
        show: 'true'
    }); 
	
	
}
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
        <script>
	   $(document).ready(function(){
	$.backstretch("assets/img/backgrounds/1.jpg"); 
	   });
	  </script>   
<script>
function fermer_modal(){
	
	//document.getElementById('myModal').style.visibility='hidden';
	   $('#myModal').modal('hide');
	window.print() ;
}

</script>
</head>
<?php
@session_start();

$tail_tab_logic=$_SESSION['tail11'];
$tail_tab_logic1=$_SESSION['tail12'];
$tail_tab_logic2=$_SESSION['tail13'];
include("connection.php");	
$connec=mysqli_connect($_SESSION['page'][0],$_SESSION['page'][1],$_SESSION['page'][2]) or die('Connexion impossible : ' . mysqli_error());
mysqli_query ($connec,'SET NAMES \'UTF8\'');

$db=mysqli_select_db($connec,$_SESSION['page'][3]) or die('Connexion impossible : ' . mysqli_error($connec));
?>
<style >

.item.active,
        .item.active + .item,
        .item.active + .item  + .item {
          
           display: block;
         
        }         

.printable { display: none; }
@media print {
  .non-printable { display: none; }
    .printable { display: block; }
}


      body {
  background: #cccccc;
  background-image:none;
}



label{
	border:1px black solid;
	width:40px;

}
@media print {
  h2.category { page-break-before: always; }
}
.modal{

 
}
</style>
<body>
<script>
/* window.onload = function(e){
envoi();
}*/
$().ready(function () {
    $('.modal.printable').on('shown.bs.modal', function () {
        $('.modal-dialog', this).addClass('focused');
        $('body').addClass('modalprinter');

        if ($(this).hasClass('autoprint')) {
            window.print();
        }
    }).on('hidden.bs.modal', function () {
        $('.modal-dialog', this).removeClass('focused');
        $('body').removeClass('modalprinter');
    });
});

</script>
<div class="non-printable">
<!--<button type="button" class="btn btn-info" id="btn_apercu" onClick="envoi()" value="معاينة" ><span class="fa fa-search"></span>  معاينة  </button>

<button type="button" class="btn btn-info" id="btn_print" onClick="fermer_modal()" value="طباعة" data-dismiss="modal"> <span class="fa fa-print"></span>  طباعة  </button>-->
	 <h3 style="color:#FFF"><strong><?php 
$quer="select * from etablissement";
$resul=mysqli_query($connec,$quer);	
$Add_mail_etab="";
$Num_tele_01="";
while ($row=mysqli_fetch_array($resul)){
echo $row['Nom_etab_fr'].'<br>'.$row['Nom_etab_ar'];
$Add_mail_etab=$row['Add_mail_etab'];
$Num_tele_01=$row['Num_tele_01'];
}
 ?></strong></h3>
 <?php
 if(!isset($_POST['email'])){
	header("location:entre.php"); 
 }
  $query2="select * from compte where email='".$_SESSION['email1']."'";
 $id="";
 
	  $result2=mysqli_query($connec,$query2);
	  while($raw=mysqli_fetch_array($result2)){
		$id=$raw['id_user'];  
	  }
	  $code2= mysqli_num_rows($result2); ?>

</div>
<div class="row">
             <div class="col-sm-10 col-sm-offset-1 form-box"style="border:1px solid #99F;border-radius: 10px;">  
   
    <div class="row">
    <div  class="col-sm-12 col-xs-offset-0 ">
 
    <a class="btn " href="sauvgarde/pdf/imprimer_fiche.php?code=<?php echo $_SESSION['user'];?>"  target="_blank" ><span class="glyphicon glyphicon-print" > </span><br /> طباعة الإستمارة</a>

 <a style="" class="btn " href="sauvgarde/pdf/imprimer.php?id=<?php echo $id;?>" value="طباعة وصل التسجيل" target="_blank"> <span class="glyphicon glyphicon-print"></span><br /> طباعة وصل التسجيل</a>


   
  
      <br />
      <br />
      </div>
 </div>    


</div>





















<?php


/*echo "la taille de table formation : ".$_SESSION['tail1']." <br>taille table etudes: ".$_SESSION['tail2']." <br>taille table exepriance: ".$_SESSION['tail3'];
echo "<br>";*/




if(isset($_POST["email"]) && !(empty($_POST['email'])) && isset($_SESSION['email1']) && !empty($_SESSION['email1'])){
//verification  de l'existance la valeur user



//"insertion les renseignement dans la base de donnees"."<br>"."*****************************************************"."<br>";
$code= $_SESSION['email1'];
$grade= htmlentities(trim($_POST["grade"]));

$nom_fr= htmlentities(trim($_POST["nom_fr"]));
$prenom_fr=htmlentities(trim( $_POST["prenom_fr"]));
$nom= htmlentities(trim($_POST["nom"]));
$prenom= htmlentities(trim($_POST["prenom"]));
$fils_de=htmlentities(trim( $_POST["fils_de"]));
$sexe=htmlentities(trim($_POST['sexe']));
$et_fils_de= htmlentities(trim($_POST["et_fils_de"]));
$date_naisance= htmlentities(trim($_POST["date_naisance"]));
$lieu_naisance=htmlentities(trim( $_POST["lieu_naisance"]));
$nationalite =htmlentities(trim($_POST["nationalite"]));
$marie=htmlentities(trim($_POST["marie"]));
$nbr_enfant=htmlentities(trim($_POST["nbr_enfant"]));
$fils_chahid=htmlentities(trim($_POST["fils_chahid"]));
$andicape=htmlentities(trim($_POST["andicape"]));
$nature_endicape=htmlentities(trim($_POST["nature_endicape"]));
$commune=htmlentities(trim($_POST["commune"]));
$wilaya=htmlentities(trim($_POST["wilaya"]));
$adresse=htmlentities(trim($_POST["adresse"]));
$n_telephone=htmlentities(trim($_POST["n_telephone"]));
$email=htmlentities(trim($_POST["email"]));
$service_national=htmlentities(trim($_POST["service_national"]));
$n_piece_sv=htmlentities(trim($_POST["n_peiece_sv"]));
$date_delivre_piece_sv=htmlentities(trim($_POST["date_delive_piece_sv"]));
$date_fin_source_sv=htmlentities(trim($_POST['date_fin_source_sv']));

try{
	$query_cont="select * from condidat where code='".$code."'";


$result_cont=mysqli_query($connec,$query_cont);

	  $id1= 0;
	   $excercice= '';
	 
while ($row=mysqli_fetch_array($result_cont)){
	$id1=$row['id'];
	$excercice=$row['excercice'];

}
	  
$sql1s="delete from condidat where code='".$code."'";
mysqli_query($connec,$sql1s) or die ('Erreur SQL !'.'<br />'.mysqli_error($connec));

	
$sql1 = 'INSERT INTO condidat  VALUES ("'.$code.'", '.$id1.',"'.$excercice.'", "'.$grade.'", "'.$nom_fr.'", "'.$prenom_fr.'","'.$nom.'", "'.$prenom.'","'.$sexe.'", "'.$fils_de.'", "'.$et_fils_de.'", "'.$date_naisance.'", "'.$lieu_naisance.'", "'.$nationalite.'", "'.$marie.'", "'.$nbr_enfant.'", "'.$fils_chahid.'","'.$andicape.'", "'.$nature_endicape.'", "'.$commune.'", "'.$wilaya.'", "'.$adresse.'", "'.$n_telephone.'", "'.$email.'", "'.$service_national.'", "'.$n_piece_sv.'", "'.$date_delivre_piece_sv.'", "'.$date_fin_source_sv.'")';

mysqli_query($connec,$sql1) or die ('Erreur SQL !'.'<br />'.mysqli_error($connec));
}catch (SQLException $e){
echo $e;	
}
// "<br>les renseignements inserer";




//"insertion le diplome dans la base de donnees"."<br>"."*****************************************************"."<br>";


$nom_diplome=htmlentities(trim($_POST["nom_diplome"]));
	$nom_filiere=htmlentities(trim($_POST["nom_filiere"]));
$nom_specialite=htmlentities(trim($_POST["nom_specialite"]));
	$date_diplome=htmlentities(trim($_POST["date_diplome"]));
	$numero_diplome=htmlentities(trim($_POST["numero_diplome"]));
	$dure_diplomeA=htmlentities(trim($_POST["dure_diplomeA"]));
	$dure_diplomeM=htmlentities(trim($_POST["dure_diplomeM"]));
	$dure_diplome_de=htmlentities(trim($_POST["dure_diplome_de"]));
	$dure_diplome_jusqua=htmlentities(trim($_POST["dure_diplome_jusqua"]));
	$etablis_diplome=htmlentities(trim($_POST["etablis_diplome"]));
try{	
$sql2s="delete from diplome where code='".$code."'";
mysqli_query($connec,$sql2s) or die ('Erreur SQL !'.'<br />'.mysqli_error($connec));
$sql2 = 'INSERT INTO diplome  VALUES ("'.$code.'", "'.$nom_diplome.'", "'.$nom_filiere.'", "'.$nom_specialite.'", "'.$date_diplome.'", "'.$numero_diplome.'", "'.$dure_diplomeA.'", "'.$dure_diplomeM.'","'.$dure_diplome_de.'", "'.$dure_diplome_jusqua.'", "'.$etablis_diplome.'")';

mysqli_query($connec,$sql2) or die ('Erreur SQL !'.'<br />'.mysqli_error($connec));
}catch (SQLException $e){
echo $e;	
}
//echo "<br>diplome inserer";




//###############################################
//insersion des parcours dans la base de données
//**************************************

$mention_diplome=htmlentities(trim($_POST["mention_diplome"]));
	$anne_major=htmlentities(trim($_POST["anne_major"]));
	$n_piece_major=htmlentities(trim($_POST["n_piece_major"]));
	
	$date_piece_major=htmlentities(trim($_POST["date_piece_major"]));
	$de=htmlentities(trim($_POST["de"]));
	$pr_an1sm=$_POST["pr_an1sm"];$pr_an2sm=$_POST["pr_an2sm"];$pr_anmy=$_POST["pr_anmy"];
	$dz_an1sm=$_POST["dz_an1sm"];$dz_an2sm=$_POST["dz_an2sm"];$dz_anmy=$_POST["dz_anmy"];
	$tr_an1sm=$_POST["tr_an1sm"];$tr_an2sm=$_POST["tr_an2sm"];$tr_anmy=$_POST["tr_anmy"];
	$qt_an1sm=$_POST["qt_an1sm"];$qt_an2sm=$_POST["qt_an2sm"];$qt_anmy=$_POST["qt_anmy"];
	$cq_an1sm=$_POST["cq_an1sm"];$cq_an2sm=$_POST["cq_an2sm"];$cq_anmy=$_POST["cq_anmy"];
	$six_an1sm=$_POST["six_an1sm"];$six_an2sm=$_POST["six_an2sm"];$six_anmy=$_POST["six_anmy"];
	$sept_an1sm=$_POST["sept_an1sm"];$sept_an2sm=$_POST["sept_an2sm"];$sept_anmy=$_POST["sept_anmy"];
	$huit_an1sm=$_POST["huit_an1sm"];$huit_an2sm=$_POST["huit_an2sm"];$huit_anmy=$_POST["huit_anmy"];
	$moyen_general=$_POST["moyen_general"];
	$note_memoire=$_POST["note_memoire"];
	
	try{
	$sql3s="delete from parcours1 where code='".$code."'";
mysqli_query($connec,$sql3s) or die ('Erreur SQL !'.'<br />'.mysqli_error($connec));
$sql3 = 'INSERT INTO parcours1  VALUES ("'.$code.'", "'.$mention_diplome.'", "'.$anne_major.'", "'.$n_piece_major.'", "'.$date_piece_major.'", "'.$de.'", "'.$pr_an1sm.'", "'.$pr_an2sm.'", "'.$pr_anmy.'", "'.$dz_an1sm.'", "'.$dz_an2sm.'", "'.$dz_anmy.'", "'.$tr_an1sm.'","'.$tr_an2sm.'", "'.$tr_anmy.'", "'.$qt_an1sm.'", "'.$qt_an2sm.'", "'.$qt_anmy.'", "'.$cq_an1sm.'", "'.$cq_an2sm.'", "'.$cq_anmy.'", "'.$six_an1sm.'", "'.$six_an2sm.'", "'.$six_anmy.'", "'.$sept_an1sm.'", "'.$sept_an2sm.'", "'.$sept_anmy.'", "'.$huit_an1sm.'", "'.$huit_an2sm.'", "'.$huit_anmy.'", "'.$moyen_general.'", "'.$note_memoire.'")';

mysqli_query($connec,$sql3) or die ('Erreur SQL !'.'<br />'.mysqli_error($connec));
}catch (SQLException $e){
echo $e;	
}
//echo "<br>parcours enregister";	

//###############################################
//insersion des formation continue
//**************************************
//parcourir tout la table formation si elle n'est pas vide
$sql4s="delete from formation where user='".$code."'";
mysqli_query($connec,$sql4s) or die ('Erreur SQL !'.'<br />'.mysqli_error($connec));
if(!empty($_POST['nature_diplome_f'])){
for($i=0;$i<$tail_tab_logic-3;$i++){
	
	$nature_diplome_f='';
	$filiere_f='';
	$specialite_f='';
	$etablissement_f='';
	$numero_diplome_f='';
	$date_diplome_f='';
		$date_f_de='';
			$date_f_jusqua='';
				$date_doctor='';
	if($i==0){
	$nature_diplome_f="nature_diplome_f";
	$filiere_f="filiere_f";
	$specialite_f="specialite_f";
	$etablissement_f="etablissement_f";
	$numero_diplome_f="numero_diplome_f";
	$date_diplome_f="date_diplome_f";
		$date_f_de="date_f_de";
			$date_f_jusqua="date_f_jusqua";
				$date_doctor="date_doctor";
	}
	else{
		
	$nature_diplome_f="nature_diplome_f".$i;	
	$filiere_f="filiere_f".$i;
	$specialite_f="specialite_f".$i;
		$etablissement_f="etablissement_f".$i;
			$specialite_f="specialite_f".$i;
				$numero_diplome_f="numero_diplome_f".$i;
	$date_diplome_f="date_diplome_f".$i;
	$date_f_de="date_f_de".$i;
	$date_f_jusqua="date_f_jusqua".$i;
	$date_doctor="date_doctor".$i;
	}
	if(isset($_POST[$nature_diplome_f])){
$nature_diplome_f1=htmlentities(trim($_POST[$nature_diplome_f]));
$filiere_f1=htmlentities(trim($_POST[$filiere_f]));
$specialite_f1=htmlentities(trim($_POST[$specialite_f]));
$etablissement_f1=htmlentities(trim($_POST[$etablissement_f]));
$numero_diplome_f1=htmlentities(trim($_POST[$numero_diplome_f]));
$date_diplome_f1=htmlentities(trim($_POST[$date_diplome_f]));
$date_f_de1=htmlentities(trim($_POST[$date_f_de]));
$date_f_jusqua1=htmlentities(trim($_POST[$date_f_jusqua]));
$date_doctor=htmlentities(trim($_POST[$date_doctor]));

/*echo "formation continu:<br>".$nature_diplome_f1."<br>"
.$filiere_f1."<br>"
.$specialite_f1."<br>"
.$etablissement_f1."<br>"
.$numero_diplome_f1."<br>"
.$date_diplome_f1."<br>"
.$date_f_de1."<br>"
.$date_f_jusqua1."<br>"
.$date_doctor."<br>";*/

try{
	
$sql4 = 'INSERT INTO formation  VALUES ("'.($i+1).'","'.$code.'", "'.$nature_diplome_f1.'", "'.$filiere_f1.'", "'.$specialite_f1.'", "'.$etablissement_f1.'", "'.$numero_diplome_f1.'", "'.$date_diplome_f1.'","'.$date_f_de1.'", "'.$date_f_jusqua1.'","'.$date_doctor.'")';

mysqli_query($connec,$sql4) or die ('Erreur SQL !'.'<br />'.mysqli_error($connec));
//echo "insertion de la formation continu";
}catch (SQLException $e){
echo $e;	
}
}
}
}
//###############################################
//insersion des travaux et etudes
//**************************************
//parcourir tout la table taravaux et eudes si  n'est pas vide
	$sql5s="delete from travaux where user='".$code."'";
mysqli_query($connec,$sql5s) or die ('Erreur SQL !'.'<br />'.mysqli_error($connec));
if(!empty($_POST['nature_travail'])){
	
for($i=0;$i<$tail_tab_logic1-3;$i++){
	$nature_travail='';
	$date_publication='';
	$nom_journal_publication='';
	$numero_journal_publication='';
	$date_journal_publication='';
	
	if($i==0){
	$nature_travail="nature_travail";
	$date_publication="date_publication";
	$nom_journal_publication="nom_journal_publication";
	$numero_journal_publication="numero_journal_publication";
	$date_journal_publication="date_journal_publication";
	
	}
	else{
	$nature_travail="nature_travail".$i;	
	$date_publication="date_publication".$i;
	$nom_journal_publication="nom_journal_publication".$i;
		$numero_journal_publication="numero_journal_publication".$i;
			$date_journal_publication="date_journal_publication".$i;
			
	}
		if(isset($_POST[$nature_travail])){
$nature_travail1=htmlentities(trim($_POST[$nature_travail]));
$date_publication1=htmlentities(trim($_POST[$date_publication]));
$nom_journal_publication1=htmlentities(trim($_POST[$nom_journal_publication]));
$numero_journal_publication1=htmlentities(trim($_POST[$numero_journal_publication]));
$date_journal_publication1=htmlentities(trim($_POST[$date_journal_publication]));

/*echo "travaux :<br> "
.$nature_travail1."<br>"
.$date_publication1."<br>"
.$nom_journal_publication1."<br>"
.$numero_journal_publication1."<br>"
.$date_journal_publication1."<br>";*/

try{

$sql5 = 'INSERT INTO travaux  VALUES ("'.($i+1).'","'.$code.'", "'.$nature_travail1.'", "'.$date_publication1.'", "'.$nom_journal_publication1.'", "'.$numero_journal_publication1.'", "'.$date_journal_publication1.'")';

mysqli_query($connec,$sql5) or die ('Erreur SQL !'.'<br />'.mysqli_error($connec));
//echo "insertion de des travaux";
}catch (SQLException $e){
echo $e;	
}
}
}
}

//###############################################
//insersion des experiance
//**************************************
//parcourir tout la table experiance si  n'est pas vide
$sql7s="delete from employer where code='".$code."'";
mysqli_query($connec,$sql7s) or die ('Erreur SQL !'.'<br />'.mysqli_error($connec));
$sql6s="delete from experiance where user='".$code."'";
mysqli_query($connec,$sql6s) or die ('Erreur SQL !'.'<br />'.mysqli_error($connec));
if(!empty($_POST['etablis_experiance'])){
for($i=0;$i<$tail_tab_logic2-3;$i++){
	$etablis_experiance='';
	$grade_experiance='';
	$date_experiance_de='';
	$date_experiance_jusqua='';
	$numero_attestation='';
		$date_attestation='';
			$cause_fin_relation='';
	
	if($i==0){
	$etablis_experiance="etablis_experiance";
	$grade_experiance="grade_experiance";
	$date_experiance_de="date_experiance_de";
	$date_experiance_jusqua="date_experiance_jusqua";
	$numero_attestation="numero_attestation";
	$date_attestation="date_attestation";
	$cause_fin_relation="cause_fin_relation";
	
	}
	else{
		
	$etablis_experiance="etablis_experiance".$i;	
	$grade_experiance="grade_experiance".$i;
	$date_experiance_de="date_experiance_de".$i;
		$date_experiance_jusqua="date_experiance_jusqua".$i;
			$numero_attestation="numero_attestation".$i;
			$date_attestation="date_attestation".$i;
			$cause_fin_relation="cause_fin_relation".$i;
			
	}
	if(isset($_POST[$etablis_experiance])){
$etablis_experiance1=htmlentities(trim($_POST[$etablis_experiance]));
$grade_experiance1=htmlentities(trim($_POST[$grade_experiance]));
$date_experiance_de1=htmlentities(trim($_POST[$date_experiance_de]));
$date_experiance_jusqua1=htmlentities(trim($_POST[$date_experiance_jusqua]));
$numero_attestation1=htmlentities(trim($_POST[$numero_attestation]));
$date_attestation1=htmlentities(trim($_POST[$date_attestation]));
$cause_fin_relation1=htmlentities(trim($_POST[$cause_fin_relation]));

/*echo "experiance:<br> "
.$etablis_experiance1."<br>"
.$grade_experiance1."<br>"
.$date_experiance_de1."<br>"
.$date_experiance_jusqua1."<br>"
.$numero_attestation1."<br>"
.$date_attestation1."<br>"
.$cause_fin_relation1."<br>";*/

try{
	
$sql6 = 'INSERT INTO experiance  VALUES ("'.($i+1).'","'.$code.'", "'.$etablis_experiance1.'", "'.$grade_experiance1.'", "'.$date_experiance_de1.'", "'.$date_experiance_jusqua1.'", "'.$numero_attestation1.'", "'.$date_attestation1.'", "'.$cause_fin_relation1.'")';

mysqli_query($connec,$sql6) or die ('Erreur SQL !'.'<br />'.mysqli_error($connec));

}catch (SQLException $e){
echo $e;	
}
}
}
}
//###########insertion pour les employeurs###############
//#######################################################
if(!empty($_POST['nom_emploie'])){
$nom_emploie= htmlentities(trim($_POST["nom_emploie"]));
$date_emploie_initial=htmlentities(trim( $_POST["date_emploie_initial"]));
$date_emploie_actuel=htmlentities(trim( $_POST["date_emploie_actuel"]));
$categorie=htmlentities(trim( $_POST["categorie"]));
$degre=htmlentities(trim( $_POST["degre"]));
$numero_document= htmlentities(trim($_POST["numero_document"]));
$date_document= htmlentities(trim($_POST["date_document"]));
$nature_signateur =htmlentities(trim($_POST["nature_signateur"]));
$adresse_administration=htmlentities(trim($_POST["adresse_administration"]));
$telephone_administration=htmlentities(trim($_POST["telephone_administration"]));
$fax_administration=htmlentities(trim($_POST["fax_administration"]));
$email_administration=htmlentities(trim($_POST["email_administration"]));


try{
	
$sql6 = 'INSERT INTO employer  VALUES ("'.$code.'", "'.$nom_emploie.'", "'.$date_emploie_initial.'", "'.$date_emploie_actuel.'", "'.$categorie.'", "'.$degre.'", "'.$numero_document.'", "'.$date_document.'", "'.$nature_signateur.'", "'.$adresse_administration.'", "'.$telephone_administration.'", "'.$fax_administration.'","'.$email_administration.'")';

mysqli_query($connec,$sql6) or die ('Erreur SQL !'.'<br />'.mysqli_error($connec));

}catch (SQLException $e){
echo $e;	
}
}

try{
$sql11 = 'UPDATE   compte  set inscrit="oui" where email="'.$code.'"';

mysqli_query($connec,$sql11) or die ('Erreur SQL !'.'<br />'.mysqli_error($connec));
echo "<br><div class=\"row\"><div class='alert alert-success col-sm-8 col-sm-offset-2' style=\"font-size:24px;\">لقد تم    تحديث بياناتك المسجلة <p style='color:#f00'> لا تنسى طباعة الوصل و الاستمارة قبل نهاية التسجيلات </p></div></div>";
$_SESSION['pass']=$_SESSION['pasword1'];
unset($_SESSION['email1']);
unset($_SESSION['pasword1']);
		
}catch (SQLException $e){
echo $e;	
}




}
else{
	$_SESSION['login_er']='لم يتم تسجيلك لخطاء تقني ! <br>نعتذر لهذا الخطاء الخارج عن نطاقنا <br> الرجاء اعادة التسجيل ';
echo '<script>window.location.replace("entre.php");</script>';	
}
/*echo "<script>window.location.replace(\"index1.php\")</script>";*/

?>

<?php
 /* echo "<script> 
  window.print();
  </script>";*/
  ?>

<p  class="alert alert-warning"><b> عليك الاطلاع باستمرار لمعرفة وضعية ملفك </b></p>
<p  class="alert alert-info"><b>للاستعلام و الاستفسار :</b><?php echo "<u> ايميل:</u>".$Add_mail_etab." &nbsp; <u>الهاتف:</u>  ".$Num_tele_01 ?> </p>
<!--debut apercu-->

 
 
</body>
</html>