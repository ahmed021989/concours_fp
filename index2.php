<?php
@session_start();

require_once("connection.php");	
	

	$nbr=0;
$connec=mysqli_connect($_SESSION['page'][0],$_SESSION['page'][1],$_SESSION['page'][2]) or die('Connexion impossible : ' . mysqli_error());
mysqli_query ($connec,'SET NAMES \'UTF8\'');

$db=mysqli_select_db($connec,$_SESSION['page'][3]) or die('Connexion impossible : ' . mysqli_error());
$nom="";

if(isset($_SESSION['email1'])){
	

if(isset($_GET["id"])  ){
	 function escape_value($conne, $value ) {
		if( function_exists( "mysqli_real_escape_string" ) ) { // PHP v4.3.0 or higher
			// undo any magic quote effects so mysql_real_escape_string can do the work
			if( get_magic_quotes_gpc()) { $value = stripslashes( $value ); }
			$value = mysqli_real_escape_string($conne, $value );
		} else { // before PHP v4.3.0
			// if magic quotes aren't already on then add slashes manually
			if( !get_magic_quotes_gpc() ) { $value = addslashes( $value ); }
			// if magic quotes are active, then the slashes already exist
		}
		return $value;
	}
	$id=	escape_value($connec,$_GET["id"]);

	//**************************
	$query0="select * from compte where id_user='".$id."' ";
$result0=mysqli_query($connec,$query0);
$email='';
$password='';
while($row0=mysqli_fetch_array($result0)){
$email=$row0['email'];
$_SESSION['user']=$_SESSION['email1'];
$password=$row0['password'];	

}
$query="select * from compte where id_user='".$id."' and password='".$password."'";
$result=mysqli_query($connec,$query);
	  $code= mysqli_num_rows($result);
	  
	//*******************************
	$query1="select * from compte where id_user='".$id."' and password='".$password."'";
$result1=mysqli_query($connec,$query1);
	  $code1= mysqli_num_rows($result1); 
	   
	  //***********************
	  $query2="select * from compte where id_user='".$id."' and password='".$password."' and inscrit='oui'";
$result2=mysqli_query($connec,$query2);
	  $code2= mysqli_num_rows($result2);
	  
	  //************************
	   
while ($row=mysqli_fetch_array($result)){ 
//if(!empty(mysqli_fetch_array($result1))){
//echo "ici";	
$nom=	$row['nom_user']."  ".$row['prenom_user'];
}
if($code==1 && $code2==0){
 header("Location: entre.php");	
}
else{
	if($code==1  && $code2==1){
	$_SESSION['email1']=$email;
$_SESSION['pasword1']=$password;
$_SESSION['nom1']=$nom;
	 }
	   
	       else{
 $_SESSION['login_er']="خطأ في اسم المستخدم أو كلمة السر خاطئة ؟؟";
 header("Location: entre.php");
		
               }
}
}


else{
if(isset($_SESSION['email1'])){
echo "voila"	;
}
else{
 header("Location: entre.php");	

}
}
}

else{
header("Location: entre.php");		
}


/*if(isset($_POST['email']) and isset($_POST['pasword'])){

}

if( !isset($_SESSION['email'])){
echo "<script>window.location.replace(\"entre.php\");</script>";
}
else{
 	
}*/


//creation de la valeur de l'atribut "code"

  ?>
   
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl" >

<head>

     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>eph zighoud youcef tenes</title>

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
         <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<!-- polyfiller file to detect and load polyfills -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script>
  webshims.setOptions('waitReady', false);
  webshims.setOptions('forms-ext', {types: 'date'});
  webshims.polyfill('forms forms-ext');
</script>



        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
      <!--  <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   
    <style type="text/css">
	.input-group-addon{
		height:48px;
		border-bottom-width:15px;
		border-color:#eee;
		border-raduis:5px;
		
	}
	.input-group .form-control,select{
	color:#000;	
	border-color:#0C0;
	
	}
	select{
	color:#000;	
	border-color:#0C0;
	
	}
	img{
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

img:hover {opacity: 0.5;}

    body,td,th {
	font-family: "MS Serif", "New York", serif;
	color: #000;
	font-weight: bold;
}
.form-control-feedback {width:100%;text-align:left;right:-15px}

body {
	background-image:url(assets/wall_1.jpg);
	  
}
input.form-control[name=nom_fr]:focus{
background-color:#FFF;
}
input.form-control[name=prenom_fr]:focus{
background-color:#FFF;
}
input.form-control[name=nom_fr]{
border-color:#999;	
background-color:#eee;
}
input.form-control[name=prenom_fr]{
border-color:#999;	
background-color:#eee;
}
::-webkit-input-placeholder {
   font-style: italic;
}
:-moz-placeholder {
   font-style: italic;  
}
::-moz-placeholder {
   font-style: italic;  
}
:-ms-input-placeholder {  
   font-style: italic; 
}
input.form-control{
font-size:14px ;
font-weight:bold;
	direction:rtl;
	
}

input.form-control[readonly]{
border:1px solid #999;
padding-bottom:0px;
font-size:16px;
text-align:center;
	
}

th,td,tr{
	text-align:center;
	
}

 table {
      width: 695px;
    }
    .table-wrapper {
      overflow: hidden;
      border-right: 1px solid #ccc;
    }
    .pinned {
      width: 30%;
      border-right: 1px solid #ccc;
      float: left;
    }
    .scrollable {
      float: right;
      width: 100%;
      overflow: scroll;
      overflow-y: hidden;
    }
    
    td {
      text-align: center;
      vertical-align: middle;
      overflow: hidden;
      height: 30px;
      white-space: nowrap;
	  padding:0px;
    }
    .pinned td {
      position: relative;
      font-weight: bold;
      line-height: 18px;
      text-align: left;
      overflow: hidden;
    }
    .pinned td.wrap {
      white-space: normal;
    }
    td .outer {
      position: relative;
      height: 30px;
    }
    td .inner {
      overflow: hidden;
      white-space: nowrap;
      position: absolute;
      width: 100%;
    }
    .pinned td .inner.wrap {
      white-space: normal;
    }
	
	
	
	
	::-webkit-scrollbar {
    -webkit-appearance: none;
}

::-webkit-scrollbar:vertical {
    width: 20px;
}

::-webkit-scrollbar:horizontal {
    height: 20px;
}

::-webkit-scrollbar-thumb {
    background-color: rgba(0, 0, 0, .5);
    border-radius: 10px;
    border: 2px solid #FFF;
}

::-webkit-scrollbar-track {
    border-radius: 10px;  
    background-color: #FFF; 
	
}
test{
    animation: Test 1s infinite;
	
}

.modal {
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}
/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
	
	top:70px;
	
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
	position:relative;
	padding-top:70px;
}
/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #F00;
    font-size: 40px;
    font-weight: bold;

}

.close:hover,
.close:focus {
    color: #F00;
    text-decoration: none;
    cursor: pointer;
}


    </style>
    
    

</head>
 <script>
 window.onload = function(e){
	 var a=Math.floor(Math.random() * 10);
	 var b=Math.floor(Math.random() * 10);
	 var c=a+b;
	// alert(a);
document.getElementById("captcha").value=a;
document.getElementById("captcha1").value=b;
//$('#captcha').val("a");	 
 }

 </script> 
<script language="javascript">

  function readURL(input,imag) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
					var img='#'+imag;
                    $(img)
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
function affiche(img){
	
	var modal = document.getElementById('modal_apercu');
	var modalImg = document.getElementById('img01')
	var captionText = document.getElementById("caption");
	
    modal.style.display = "block";
    modalImg.src = img.src;
	
//alert(modalImg.src);
    captionText.innerHTML = img.alt;
	//alert(captionText.innerHTML);
	// img.id.css('visibility','hidden');
	
}


 $(document).ready(function(){
	$.backstretch("assets/img/backgrounds/1.jpg"); 
	var modal = document.getElementById('modal_apercu');
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick= function() {	

    modal.style.display = "none";
	 $('#img1').css('visibility','visible');
	$('#img2').css('visibility','visible');
	
}
 
	
	 
	 
	 var tail_tab_logic_initil = document.getElementById('tab_logic').rows.length;
	 	var tail_tab_logic_initil1 = document.getElementById('tab_logic1').rows.length;
			var tail_tab_logic_initil2 = document.getElementById('tab_logic2').rows.length;
	
	
		
	 var tail_tab_logic = document.getElementById('tab_logic').rows.length;
	var tail_tab_logic1 = document.getElementById('tab_logic1').rows.length;
	var tail_tab_logic2 = document.getElementById('tab_logic2').rows.length;
		
		

	//tab_logic
	$("#add_row").click(function(){
	tail_tab_logic=	tail_tab_logic+1;
	});
	$("#delete_row").click(function(){
		if(parseInt(tail_tab_logic_initil)<parseInt(tail_tab_logic)){
	tail_tab_logic=	tail_tab_logic-1;
		}
	});
	
	
	//tab_logic1
	$("#add_row1").click(function(){
	
	tail_tab_logic1=	tail_tab_logic1+1;
	});
	$("#delete_row1").click(function(){
		if(parseInt(tail_tab_logic_initil1)<parseInt(tail_tab_logic1)){
	tail_tab_logic1=	tail_tab_logic1-1;
		}
	});
	//tab_logic2
	$("#add_row2").click(function(){
	tail_tab_logic2=	tail_tab_logic2+1;
	});
	$("#delete_row2").click(function(){
		if(parseInt(tail_tab_logic_initil2)<parseInt(tail_tab_logic2)){
	tail_tab_logic2=	tail_tab_logic2-1;
		}
	});

  	

$("#btn_valid").click(function(){

	//alert(userid);
	$.ajax({
	method:"post",
	url:"sav1.php",
	data: {name1:tail_tab_logic,name2:tail_tab_logic1,name3:tail_tab_logic2},
	success:function(resultData){
	

	}
	
	})

	/*.done(function(data){
	$("#divmodal").html(data);
		
	});*/
//	alert("cc"+tail_tab_logic);		

});

 });
function verif_log(){

		var a=parseInt($('#captcha').val());
		var b=parseInt($('#captcha1').val());
		var c=parseInt($('#result_captcha').val());
		if(c==(a+b)){
			
		return true;
		}
		else{
			alert("العملية خاطئة");
document.getElementById('result_captcha').style.borderColor='#F00';

		return false;	
		}
		

}
function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
}

function calculdatejusq(field1,field2,field3){
var dateA=new Date(field1.value);
var dateB=dateA;
var nbr=Number(field2.value);
dateB.setFullYear(dateA.getFullYear()+nbr);
dateB.setMonth (dateA.getMonth());
dateB.setDate(dateA.getDate()-1); 



//alert(formatDate(dateB));

field3.value=formatDate(dateB);

//alert(field1.value);

	
}
function calculdatede(field1,field2,field3){
var dateA=new Date(field1.value);
var dateB=dateA;
var nbr=Number(field2.value);
dateB.setFullYear(dateA.getFullYear()-nbr);
dateB.setMonth (dateA.getMonth());
dateB.setDate(dateA.getDate()+1); 



//alert(formatDate(dateB));

field3.value=formatDate(dateB);

//alert(field1.value);

	
}
function maxval(field, x){
	var ok=field.getAttribute('id')+1;
		var remove=field.getAttribute('id')+2;
		
	if(field.value>x || field.value<0 || field.value==''){	
		field.style.borderColor="#F00";
		field.value="";
		document.getElementById(ok).style.visibility='hidden';
		document.getElementById(remove).style.visibility='visible';
		document.getElementById(remove).style.color='#F00';
	}
	
	else
	
	field.style.borderColor="#ccc";	
		
	
}



function CheckArabicOnly(field)
    {     
        var sNewVal = "";
        var sFieldVal = field.value;
        
        for(var i = 0; i < sFieldVal.length; i++) {
            
            var ch = sFieldVal.charAt(i);;
            var c = ch.charCodeAt(0);
            
            if(c < 1536 || c > 1791 ) {
				if(c<=57 && c>=48 || c==32){
					 sNewVal += ch;
				}
				else{
                // Discard
		$('#myModal').modal({
        show: 'true'
    }); 
	$('#deletnon').hide();
	$('#deletoui').hide();
	  $("#deletoui2").hide();
	   $("#langok").show();
		     $("#deletoui1").hide();
	$('#supr_ln').hide();
		$('#change_lag').show();	
				}
            }
            else {
                sNewVal += ch;
            }
        }  
        field.value = sNewVal;
    }
    

function show(){
document.getElementById("divmaj").style.display="";
document.getElementById("mention_diplome").value="";
document.getElementById("anne_major").value="";
document.getElementById("n_piece_major").value="";
document.getElementById("date_piece_major").value="";
}

function noshow(){
document.getElementById("divmaj").style.display="none";
document.getElementById("mention_diplome").value="/";
document.getElementById("anne_major").value="/";
document.getElementById("n_piece_major").value="/";
document.getElementById("date_piece_major").value="0001-01-01";
	
}
function moyenne(){
	var array = [];
	//1ere anne
var pr1=form1.pr_an1sm.value;
var pr2=form1.pr_an2sm.value;
if(form1.pr_an1sm.value!='' |form1.pr_an2sm.value!='' ){

	form1.pr_anmy.value=((parseFloat(pr1)+parseFloat(pr2))/2).toFixed(2);;
	if(form1.pr_anmy.value!=0){
		array.push(form1.pr_anmy.value);
	}

}
//2eme anne
var dz1=form1.dz_an1sm.value;
var dz2=form1.dz_an2sm.value;
if(form1.dz_an1sm.value!='' |form1.dz_an2sm.value!='' ){

form1.dz_anmy.value=((parseFloat(dz1)+parseFloat(dz2))/2).toFixed(2);
if(form1.dz_anmy.value!=0){
		array.push(form1.dz_anmy.value);
	}
}
//3eme anne
var tr1=form1.tr_an1sm.value;
var tr2=form1.tr_an2sm.value;
if(form1.tr_an1sm.value!='' |form1.tr_an2sm.value!='' ){

form1.tr_anmy.value=((parseFloat(tr1)+parseFloat(tr2))/2).toFixed(2);
if(form1.tr_anmy.value!=0){
		array.push(form1.tr_anmy.value);
	}
}
//4eme anne
var qt1=form1.qt_an1sm.value;
var qt2=form1.qt_an2sm.value;
if(form1.qt_an1sm.value!='' |form1.qt_an2sm.value!='' ){

form1.qt_anmy.value=((parseFloat(qt1)+parseFloat(qt2))/2).toFixed(2);
if(form1.qt_anmy.value!=0){
		array.push(form1.qt_anmy.value);
	}
}
//5eme anne
var cq1=form1.cq_an1sm.value;
var cq2=form1.cq_an2sm.value;
if(form1.cq_an1sm.value!='' |form1.cq_an2sm.value!='' ){

form1.cq_anmy.value=((parseFloat(cq1)+parseFloat(cq2))/2).toFixed(2);
if(form1.cq_anmy.value!=0){
		array.push(form1.cq_anmy.value);
	}
}
//6eme anne
var six1=form1.six_an1sm.value;
var six2=form1.six_an2sm.value;
if(form1.six_an1sm.value!='' |form1.six_an2sm.value!='' ){

form1.six_anmy.value=((parseFloat(six1)+parseFloat(six2))/2).toFixed(2);
if(form1.six_anmy.value!=0){
		array.push(form1.six_anmy.value);
	}
}
//7eme anne
var sept1=form1.sept_an1sm.value;
var sept2=form1.sept_an2sm.value;
if(form1.sept_an1sm.value!='' |form1.sept_an2sm.value!='' ){

form1.sept_anmy.value=((parseFloat(sept1)+parseFloat(sept2))/2).toFixed(2);
if(form1.sept_anmy.value!=0){
		array.push(form1.sept_anmy.value);
	}
}
//8eme anne
var huit1=form1.huit_an1sm.value;
var huit2=form1.huit_an2sm.value;
if(form1.huit_an1sm.value!='' |form1.huit_an2sm.value!='' ){

form1.huit_anmy.value=((parseFloat(huit1)+parseFloat(huit2))/2).toFixed(2);
if(form1.huit_anmy.value!=0){
		array.push(form1.huit_anmy.value);
	}
}
//moyen general
var moyen_general=0;
var somm=0;
for(var i=0;i<array.length;i++){
somm=somm+parseFloat(array[i]);	
}
if(array.length!=0){
moyen_general=somm/array.length;
}
else{
moyen_general=somm;
}
form1.moyen_general.value=moyen_general.toFixed(2);

}

</script>

<body>




		<!-- Top menu -->
		<nav class="navbar navbar-default col-sm-12 col-sm-offset-0 " role="navigation" style="border:1px #96F;border-radius: 5px;background:none;position:relative">
			<div class="container" style="border:1px #96F;border-radius: 5px;background-color:#26A69A">
				<div class="nav navbar-header pull-left" >
				<img class='img-thumbnail' accept='image/gif, image/jpg, image/jpeg, image/png'   type='image' id='photo".$i."' src='logo.png'  width='110' height='100' style="border-radius: 55px;height:110px" />
                
					
				</div>
				
                
			
                
					<ul class="nav navbar-nav navbar-right col-sm-4 col-sm-offset-0" >
					 <h3 style="color:#FFF"><?php 
$quer="select * from etablissement";
$resul=mysqli_query($connec,$quer);	
while ($row=mysqli_fetch_array($resul)){
echo $row['Nom_etab_fr'].'<br>'.$row['Nom_etab_ar'];
}
 ?></strong></h3>
					</ul>
                    <ul class="nav navbar-nav navbar-right">
            <h2>
             <p style="color:#FFF"><u>بوابة التسجيل في مسابقة التوظيف 
           	  </u></p></h2>
              </ul>
                    
               
			</div>
            
		</nav>
        

 <!--       Top content -->
   
   
  
<div class="container" >

<div class="inner-bg"  >
  <div class="container">
          
       <div class="row">
          <div  class="col-sm-12 col-sm-offset-0 text"  >
<div  class="col-sm-12 col-sm-offset-0 text"  >

                            
                           
                     	
                             
                            </div>
                        </div>
                        
 <div class="pull-right" style="color:#06F;font-size:24px"><u>  <?php echo "   مرحبـــا بـــك : ".$_SESSION['nom1']."";?>  </h3></div> <br />
                    </div>
                         
    
      
                
                   
                 
                     
                 
                        	
                        	<form  name="form1"   action="save1.php" class="registration-form" id="buttonGroupForm" enctype="multipart/form-data" method="post" accept-charset="utf8_unicode_ci">
          
                              		
       
                                     
			                    
                                
    
    
                    
                                
                                
                        		<fieldset >
             <?php  
			 
			   $query_condi="select * from condidat where code='".$email."'";
$result_condit=mysqli_query($connec,$query_condi);  
 $grade="";
$nom="";
$prenom="";
$nom_fr="";
$prenom_fr="";
$sexe="";
$fils_de="";
$et_fils_de="";
$date_naisance="";
$lieu_naisance="";
$nationalite="";
$marie="";
$nbr_enfants="";
$fils_chahid="";
$andicape="";
$nature_endicape="";
$commune="";
$wilaya="";
$adresse="";
$n_telephone="";
$emaila="";
$service_national="";
$n_piece_sv="";
$date_deliv_piece_sv="";
$date_fin_source_sv="";
while ($row1=mysqli_fetch_array($result_condit)){ 
$grade=$row1["grade"];
$nom_fr=$row1["nom_fr"];
$prenom_fr=$row1["prenom_fr"];
$nom=$row1["nom"];
$prenom=$row1["prenom"];
$sexe=$row1["sexe"];
$fils_de=$row1["fils_de"];
$et_fils_de=$row1["et_fils_de"];
$date_naisance=$row1["date_naisance"];
$lieu_naisance=$row1["lieu_naisance"];
$nationalite=$row1["nationalite"];
$marie=$row1["marie"];
$nbr_enfants=$row1["nbr_enfants"];
$fils_chahid=$row1["fils_chahid"];
$andicape=$row1["andicape"];
$nature_endicape=$row1["nature_endicape"];
$commune=$row1["commune"];
$wilaya=$row1["wilaya"];
$adresse=$row1["adresse"];
$n_telephone=$row1["n_telephone"];
$emaila=$row1["email"];
$service_national=$row1["service_national"];
$n_piece_sv=$row1["n_piece_sv"];
$date_deliv_piece_sv=$row1["date_deliv_piece_sv"];
$date_fin_source_sv=$row1["date_fin_source_sv"];



}

?>            
 
                                         <div class="col-sm-10 col-sm-offset-1 form-box" style="border:1px solid #99F;border-radius: 10px;">
                               
            
		                        	<div class="form-top" style="background-color:#26A69A">
                                    
		                        		<div class="form-top-left">
		                        			<h3  style="color:#FFF">المرحلة 1 / 7</h3>
		                            		<p style="color:#FFF"> المعلومات الشخصية:</p>
		                        		</div>
		                        		<div class="form-top-right">
		                        			<i class="fa fa-user"></i>
		                        		</div>
		                            </div>
                                    
                           
                           
                                    
		                            <div class="form-bottom">
                               
				                    	<div dir="rtl" class="form-group ">
            
<div  class="form-group">
				                    		 <select  style="color:#009;text-align-last: center;
padding-right:29px;;border-radius:20px"   class="form-control" name="grade"  id="grado"  oninvalid="this.setCustomValidity('الرجاء اختيار رتبة المسابقة')" oninput="setCustomValidity('')" value required>
       <option style="color:#000;text-align-last: center;font-weight:bold;
"  value="<?php  echo $grade;?>"  > <?php  echo $grade;?></option>
       <?php   
	   
$query="select * from poste";
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
	/*if($grade==$row["Nom_poste"]){
	}else
echo "<option style=\"color:#000;text-align-last: center;font-weight:bold;\" >".$row["Nom_poste"]."</option>";*/
}
}
if($incr==0){
	
echo "<script> alert(\"انتهت فترة التسجيلات\")</script>"	;	
echo "<script>window.location.replace(\"index.php\");</script>";
}
 
/* while ($row=mysqli_fetch_array($result)){ 
 echo "<option style=\"color:#000;text-align-last: center;font-weight:bold;\" >".$row["nom"]."</option>";
 }*/
     
	?>
     </select>
     </div> 
<hr>
<div class="row">
<div class="col-sm-6 col-sm-offset-0">
<div style="text-align:left;font-size:12px" dir="ltr">Nom <b style="color:#F00">*</b>   </div> <div dir="ltr" class="input-group"> 
<span class="input-group-addon glyphicon glyphicon-user " style="background-color:#000;color:#FFF" ></span>                    
<input  type="text"  id="nom_fr" class="form-control"   name="nom_fr"  oninvalid="this.setCustomValidity('حقل إجباري')" oninput="setCustomValidity('');changer_lettre_fr(this.id)"  style="text-align:left;direction:ltr;border-radius:4px" placeholder='اللقب باللاتنية'  value="<?php echo $nom_fr?>"/>   <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback" style="visibility:hidden;width:100%;text-align:right;right:15px" id="nom_fr1"></span> <span  class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden;width:100%;text-align:right;right:15px" id="nom_fr2"></span>
</div>
                 		        
<div style="text-align:left;font-size:12px" dir="ltr">Prénom <b style="color:#F00">*</b></div><div dir="ltr" class="input-group"> 
<span class="input-group-addon glyphicon glyphicon-user " style="background-color:#000;color:#FFF" ></span>
 <input type="text" id="prenom_fr"  class="form-control" name="prenom_fr"  oninvalid="this.setCustomValidity('حقل إجباري')"  oninput="setCustomValidity('');changer_lettre_fr(this.id)" style="text-align:left;direction:ltr;border-radius:4px;" placeholder='الاسم باللاتنية'  value="<?php echo $prenom_fr ?>" />   <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback" style="visibility:hidden;width:100%;text-align:right;right:15px" id="prenom_fr1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden;width:100%;text-align:right;right:15px" id="prenom_fr2"></span>
</div>
</div><!--fin div col06-offset-0-->

<div class="col-sm-6 col-sm-offset-0 pull-right">
اللقب <b style="color:#F00;padding-bottom:-5px">*</b>    <div  dir="ltr" class="input-group ">  
                 
<input  type="text"  id="nom" class="form-control keyboardInput"   name="nom"  oninvalid="this.setCustomValidity('حقل إجباري')" oninput="setCustomValidity('');changer_lettre(this.id)"   required  value="<?php echo $nom ?> " /> <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="nom1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="nom2"></span> <span class="input-group-addon glyphicon glyphicon-user" style="background-color:#000;color:#FFF;" ></span>
</div>


                    		        
الاسم <b style="color:#F00">*</b><div dir="ltr" class="input-group ">  <input type="text" id="prenom"  class="form-control keyboardInput" name="prenom"  oninvalid="this.setCustomValidity('حقل إجباري')" oninput="setCustomValidity('');changer_lettre(this.id)" required value="<?php echo $prenom ?> "/>		
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="prenom1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="prenom2"></span>
<span class="input-group-addon glyphicon glyphicon-user" style="background-color:#000;color:#FFF;border-bottom-width: 15px #eee" ></span>
</div>	
</div><!--fin div col06-offset-0-->
</div><!-- fin div class row-->
         
 <b style="color:#F00"></b><div  class="input-group" dir="rtl" >
الجنس :<input type="radio" name="sexe"  id="sexeh"  value="ذكر" style="width:20px;background-color:#399" <?php  if($sexe=='ذكر') echo 'checked';?>="checked" /> &nbsp;ذكـر &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="sexe" id="sexef"  value="أنثى" style="width:20px;background-color:#399" <?php  if($sexe=='أنثى') echo 'checked';?>/>&nbsp;أنثـى  
</div>  

<div class="row">
<div class="col-sm-6 col-sm-offset-0 pull-right">         	
ابن  <b style="color:#F00">*</b>  <div dir="ltr" class="input-group"> <input type="text" id="fils_de"  name="fils_de" class="form-control keyboardInput" oninvalid="this.setCustomValidity('حقل إجباري')" oninput="setCustomValidity('');changer_lettre(this.id)"  required  value="<?php echo $fils_de ?> "/>
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="fils_de1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="fils_de2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-child" style="font-size:20px"></span></span>
</div>	
</div><!-- fin col6 offset0 -->
<div class="col-sm-6 col-sm-offset-0">
وابن <b style="color:#F00">*</b>   <div dir="ltr" class="input-group "><input type="text"  id="et_fils_de" class="form-control keyboardInput" name="et_fils_de"  oninvalid="this.setCustomValidity('حقل إجباري')" oninput="setCustomValidity('');changer_lettre(this.id)"required value="<?php echo $et_fils_de ?> "/>
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="et_fils_de1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="et_fils_de2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-child" style="font-size:20px"></span></span>
</div>	
</div><!--fin div col06-offset-0-->
</div><!-- fin div class row-->

<div class="row " >
<div class="col-sm-4 col-sm-offset-0 pull-right">              
ناريخ الميلاد <b style="color:#F00">*</b> <div dir="ltr" class="input-group "><input type="date"  style="text-align:right" class="form-control" id="date_naisance"  name="date_naisance"  oninvalid="this.setCustomValidity('أدخل تاريخ الازدياد ')" oninput="setCustomValidity('')"   required value="<?php echo $date_naisance ?>" />
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="date_naisance1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="date_naisance2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-calendar" style="font-size:16px"></span></span>
</div>	
</div><!-- fin col6 offset0 -->
<div class="col-sm-4 col-sm-offset-0 pull-right">			
مكان الميلاد <b style="color:#F00">*</b> <div dir="ltr" class="input-group"><input type="text" id="lieu_naisance" class="form-control keyboardInput"  name="lieu_naisance"  oninvalid="this.setCustomValidity('حقل إجباري')" oninput="setCustomValidity('');changer_lettre(this.id)"required value="<?php echo $lieu_naisance ?> " />
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="lieu_naisance1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="lieu_naisance2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-street-view" style="font-size:20px"></span></span>
</div>	
</div><!--fin div col06-offset-0-->
<div class="col-sm-4 col-sm-offset-0 pull-right">


الجنسية <b style="color:#F00">*</b>  <div dir="ltr" class="input-group "><input type="text"  class="form-control"id="nationalite" name="nationalite" oninvalid="this.setCustomValidity('حقل إجباري')" oninput="setCustomValidity('')" required  value="<?php echo $nationalite ?> "/>
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="nationalite1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="nationalite2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-flag" style="font-size:18px"></span></span>
</div>	
</div><!--fin col-->
</div><!-- fin div class row-->
<p></p>
   <div class="row">
<div class="col-sm-6 col-sm-offset-0 pull-right">
&nbsp;<div class="input-group" >
  
 الوضعية العائلية: متزوج(ة) &nbsp;&nbsp; <input type="radio" name="marie" id="marie1"  value="لا" <?php if($marie=="لا")echo"checked";?> style="width:20px;background-color:#399"> لا 
&nbsp;&nbsp; 
    <input type="radio" name="marie" id="marie2"  value="نعم" <?php if($marie=="نعم") echo"checked" ; ?> style="width:20px;background-color:#399"> نعم 
</div>          
</div><!--fin col6 offset 0-->
<div class="col-sm-6 col-sm-offset-0 pull-right">	                        	

 <label for="nbr_enfant"> عدد الأولاد </label> <div dir="ltr" class="input-group"><input type="number" class="form-control"    id="nbr_enfant" name="nbr_enfant" value="<?php echo $nbr_enfants ?>" /><span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-users" style="font-size:20px"></span></span>
  
			</div>	
</div><!--col6 offset0-->               
</div><!--row-->  
    
  هل لك صفة ذوي حقوق الشهيد: &nbsp;&nbsp;<div class="btn-group" >

    <input type="radio" name="fils_chahid" id="option11"  value="لا" style="width:20px;background-color:#399" <?php if($fils_chahid=="لا") echo"checked" ; ?> >  لا
&nbsp;&nbsp;
    <input type="radio" name="fils_chahid" id="option12" value="نعم" <?php if($fils_chahid=="نعم") echo"checked" ; ?> style="width:20px;background-color:#399"> نعم

 </div> 
<div class="row">
<div class="col-sm-6 col-sm-offset-0 pull-right">
               
 <label>   &nbsp;</label><div class="input-group" >
 هل أنت من ذوي الإحتياجات الخاصة:   <input type="radio" name="andicape" id="option01" autocomplete="off" value="لا" style="width:20px;background-color:#399"  <?php if($andicape=="لا") echo "checked" ; ?> > لا 

    <input type="radio" name="andicape" id="option02" autocomplete="off" value="نعم"  <?php if($andicape=="نعم") echo "checked" ; ?> style="width:20px;background-color:#399"> نعم

  
</div> 
</div><!--fin col6 offset0-->
<div class="col-sm-6 col-sm-offset-0 pull-right">
طبيعة الإعاقة 
<div dir="ltr" class="input-group"><input type="text" class="form-control keyboardInput" id="nature_endicape" oninput="changer_lettre(this.id)" name="nature_endicape" value="<?php echo $nature_endicape ?> "/>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-wheelchair" style="font-size:20px"></span></span>
</div>	
</div><!--fin col6 offset0-->
</div><!--fin row-->
مكان الاقامة:
<div class="row">
<div class="col-sm-6 col-sm-offset-0 pull-right">

البلدية <b style="color:#F00"> *</b> <div dir="ltr" class="input-group"><input type="text" class="form-control keyboardInput" name="commune" id="commune"  oninvalid="this.setCustomValidity('حقل إجباري')" oninput="setCustomValidity('');changer_lettre(this.id)" required value="<?php echo $commune ?> "/>
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="commune1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="commune2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-map-marker" style="font-size:20px"></span></span>
</div>	
</div><!--fin col6 ofsset0-->
<div class="col-sm-6 col-sm-offset-0"> 
الولاية <b style="color:#F00"> *</b> <div dir="ltr" class="input-group"><input type="text" class="form-control keyboardInput" name="wilaya" id="wilaya"  oninvalid="this.setCustomValidity('حقل إجباري')" oninput="setCustomValidity('');changer_lettre(this.id)" required value="<?php echo $wilaya ?> "/>
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="wilaya1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="wilaya2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-map-marker" style="font-size:20px"></span></span>
</div>
</div><!--fin col6 offset0-->
</div><!--fin row-->
العنوان <b style="color:#F00">*</b> <div dir="ltr" class="input-group"><input type="text" class="form-control keyboardInput" name="adresse" id="adresse" oninvalid="this.setCustomValidity('حقل إجباري')" oninput="setCustomValidity('');changer_lettre(this.id)" required value="<?php echo $adresse ?>"/>
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="adresse1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="adresse2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-home" style="font-size:20px"></span></span>
</div>
  <div class="row">
<div class="col-sm-6 col-sm-offset-0 pull-right">
رقم الهاتف <b style="color:#F00">*</b> <div dir="ltr" class="input-group"><input type="number" class="form-control" name="n_telephone" id="n_telephone" oninvalid="this.setCustomValidity('حقل إجباري')" oninput="setCustomValidity('')" placeholder="0X XX XX XX XX"required value="<?php echo $n_telephone ?>"/>
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="n_telephone1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="n_telephone2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-phone" style="font-size:20px"></span></span>
</div>
</div><!-- fin col6offset0-->
<div class="col-sm-6 col-sm-offset-0 pull-right">
عنوان البريد الاليكتروني <b style="color:#F00">*</b> <div dir="ltr" class="input-group"><input type="email" class="form-control" name="email" id="email" oninvalid="this.setCustomValidity('الرجاء ادخال بريد اليكتروني صحيح')" style="direction:ltr;text-align:right" oninput="setCustomValidity('');"  placeholder="exemple@mail.com"required value="<?php echo $emaila  ?>" />
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="email1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="email2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-envelope" style="font-size:20px"></span></span>
</div>
</div><!--fin col 6offset0-->
 </div><!--fin row-->
 <p></p>
<div id='div_service'>
الوضعية اتجاه الخدمة الوطنية:&nbsp;&nbsp; <div class="btn-group" >

    <input type="radio" name="service_national" id="option4" style="width:20px;background-color:#399"  value="مسجل" <?php if($service_national=="مسجل") echo"checked" ; ?> > مسجل
&nbsp;&nbsp;
    <input type="radio" name="service_national" id="option3" style="width:20px;background-color:#399"  value="مؤجل" <?php if($service_national=="مؤجل") echo"checked" ; ?> > مؤجل
&nbsp;&nbsp;
    <input type="radio" name="service_national" id="option2" style="width:20px;background-color:#399"  value="معفى" <?php if($service_national=="معفى") echo"checked" ; ?> > معفى
&nbsp;&nbsp;
    <input type="radio" name="service_national" id="option1"style="width:20px;background-color:#399"  value="مؤدى"  <?php if($service_national=="مؤدى") echo"checked" ; ?> > مؤدى 

 
 
  </div>
  
  <div class="row">
<div class="col-sm-4 col-sm-offset-0 pull-right">
 
مرجع الوثيقة: الرقم <b style="color:#F00">*</b> <div dir="ltr" class="input-group" ><input type="text" class="form-control n_peiece_sv" name="n_peiece_sv"  id="n_peiece_sv" value="<?php echo $n_piece_sv ?>"  />
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="nn_peiece_sv1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="n_peiece_sv2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-file-code-o" style="font-size:20px"></span></span>
</div>
</div><!-- fin col6 ofsset 0-->
<div class="col-sm-4 col-sm-offset-0 pull-right">
تاريخ الإصدار <b style="color:#F00">*</b> <div dir="ltr" class="input-group"><input type="date" style="text-align:right" class="form-control date_delive_piece_sv" name="date_delive_piece_sv"  value="<?php echo $date_deliv_piece_sv ?>"  id="date_delive_piece_sv"  />
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="date_delive_piece_sv1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="date_delive_piece_sv2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-calendar" style="font-size:20px"></span></span>
</div>
 </div> 


 <div class="col-sm-4 col-sm-offset-0 " id="date_sourci">
تاريخ نهاية التأجيل <b style="color:#F00">*</b> <div dir="ltr" class="input-group"><input type="date" style="text-align:right" class="form-control date_fin_source_sv" name="date_fin_source_sv"  value="<?php echo $date_fin_source_sv ?>"  id="date_fin_source_sv"  />
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="date_fin_source_sv1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="date_fin_source_sv2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-calendar" style="font-size:20px"></span></span>
</div>
 </div> 

 </div><!--fin col 6offset0-->
 </div><!--fin row-->

        </div>                         
          </b>    
                    
                    <div dir="rtl">                    		                        <button type="SUBMIT" class="btn btn-next_etap1"   name="btn_nvt" id="btn_etap1" ><b>التالي</b> <span class="glyphicon glyphicon-chevron-left"></span></button>
                    </div>
				                    </div>
                                     </div>
                                  
			                    </fieldset>
                     
                     
                     
                      
                               
			                    
 <!--/////////////////partie02//////////////////-->                               
                                      
			                    <fieldset>
  <?php 
     $query_diplome="select * from diplome where code='".$email."'";
$result_diplome=mysqli_query($connec,$query_diplome); 
  $nom_diplom="";
$nom_filiere="";
$nom_specialite="";
$date_diplome="";
$numero_diplome="";
$dure_diplomeA="";
$dure_diplomeM="";
$dure_diplome_de="";
$dure_diplome_jusqua="";
$etablis_diplome="";
while ($row1=mysqli_fetch_array($result_diplome)){ 
$nom_diplom=$row1["nom_diplom"];
$nom_filiere=$row1["nom_filiere"];
$nom_specialite=$row1["nom_specialite"];
$date_diplome=$row1["date_diplome"];
$numero_diplome=$row1["numero_diplome"];
$dure_diplomeA=$row1["dure_diplomeA"];
$dure_diplomeM=$row1["dure_diplomeM"];
$dure_diplome_de=$row1["dure_diplome_de"];
$dure_diplome_jusqua=$row1["dure_diplome_jusqua"];
$etablis_diplome=$row1["etablis_diplome"];
}
?>
                                   <div class="col-sm-10 col-sm-offset-1 form-box" style="border:1px solid #99F;border-radius: 10px;"> 
                        	  <div class="form-top" style="background-color:#26A69A">
		                        		<div class="form-top-left">
		                        			<h3  style="color:#FFF">المرحلة 2 / 7</h3>
		                            		<p  style="color:#FFF">معلومات حول الشهادة:</p>
		                        		</div>
		                        		<div class="form-top-right">
		                        			<i class="fa fa-graduation-cap"></i>
		                        		</div>
		                            </div>
                      <div class="form-bottom">
				                        <div class="form-group">
<div class="row">
<div class="col-sm-6 col-sm-offset-0 pull-right">
تسمية الشهادة  <b style="color:#F00">*</b>			
<div dir="ltr" class="input-group"><select type="text" id="nom_diplome" class="form-control keyboardInput" name="nom_diplome"  oninvalid="this.setCustomValidity('حقل إجباري')" oninput="setCustomValidity('');changer_lettre(this.id)" required /><option> <?php  echo $nom_diplom;?> </option>
<?php $quer=mysqli_query($connec,"select * from diplome_demmande where poste='".$grade."'"); 
while($row=mysqli_fetch_array($quer)){ ?>
	<option value="<?php  echo $row['diplome']; ?>"><?php  echo $row['diplome']; ?></option>

<?php } ?>
</select>

<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="nom_diplome1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="nom_diplome2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-graduation-cap" style="font-size:20px"></span></span>
</div>
</div><!-- fin col-->
</div><!-- fin row-->
<div class="row">
<div class="col-sm-6 col-sm-offset-0 pull-right">			
الشعبة <b style="color:#F00">*</b>		
<div dir="ltr" class="input-group">
<?php  
$quer1=mysqli_query($connec,"select * from filliere_demmande where poste='".$grade."'");
//calculer le nobr des fillieres pour le poste selectionner
$count=mysqli_num_rows($quer1);
if($count==0){
   ?>
 <input type="text" id="nom_filiere" class="form-control keyboardInput" name="nom_filiere"  oninvalid="this.setCustomValidity('حقل إجباري')" oninput="setCustomValidity('');changer_lettre(this.id)" required value="<?php  echo $nom_filiere;?>"  />  
 
 <?php } else{
	 
	
		 ?>

<select type="text" id="nom_filiere" class="form-control keyboardInput" name="nom_filiere"  oninvalid="this.setCustomValidity('حقل إجباري')"  required >
<option value="<?php echo $nom_filiere ?>"><?php echo $nom_filiere ?></option> 
<?php  while($row=mysqli_fetch_array($quer1)){?>
<option value="<?php echo $row['filliere'];?>"><?php echo $row['filliere'];?></option><?php } ?></select><?php }?>
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="nom_filiere1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="nom_filiere2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-graduation-cap" style="font-size:20px"></span></span>
</div>
</div><!--fin col6 offset0-->
<div class="col-sm-6 col-sm-offset-0 ">           
التخصص <b style="color:#F00">*</b>			
<div dir="ltr" class="input-group">

<?php  
$quer2=mysqli_query($connec,"select * from specialite_demmande where poste='".$grade."'");
//calculer le nobr des fillieres pour le poste selectionner
$count1=mysqli_num_rows($quer2);
if($count1==0){
   ?>
 <input type="text" id="nom_specialite" class="form-control keyboardInput" name="nom_specialite"  oninvalid="this.setCustomValidity('حقل إجباري')" oninput="setCustomValidity('');changer_lettre(this.id)" required value="<?php  echo $nom_specialite;?>"  />  
 
 <?php } else{
	 
	
		 ?>

<select  id="nom_specialite" class="form-control keyboardInput" name="nom_specialite"  oninvalid="this.setCustomValidity('حقل إجباري')"  required >
<option value="<?php echo $nom_specialite ?>"><?php echo $nom_specialite ?></option> 
<?php  while($row=mysqli_fetch_array($quer2)){?>
<option value="<?php echo $row['specialite'];?>"><?php echo $row['specialite'];?></option><?php } ?></select><?php } ?>





<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="nom_specialite1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="nom_specialite2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-graduation-cap" style="font-size:20px"></span></span>
</div>
</div><!--fin col 6 ofsset 0-->
</div><!--fin row-->

<div class="row">
<div class="col-sm-6 col-sm-offset-0 pull-right">			
تاريخ الحصول على الشهادة (أو المؤهل) <b style="color:#F00">*</b>		
<div dir="ltr" class="input-group"><input type="date" id="date_diplome" class="form-control" name="date_diplome"  oninvalid="this.setCustomValidity('حقل إجباري')" oninput="setCustomValidity('')" style="text-align:right" required value="<?php  echo $date_diplome;?>"/><span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="date_diplome1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="date_diplome2"></span> 
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-calendar" style="font-size:20px"></span></span>
</div>

</div><!--fin col6 offset0-->
<div class="col-sm-6 col-sm-offset-0 pull-right">
رقم <b style="color:#F00">*</b>			
<div dir="ltr" class="input-group"><input type="text" id="numero_diplome" class="form-control" name="numero_diplome"  oninvalid="this.setCustomValidity('حقل إجباري')" oninput="setCustomValidity('')" required value="<?php  echo $numero_diplome;?>"/>
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="numero_diplome1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="numero_diplome2"></span>
 <span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-file" style="font-size:20px"></span></span>
</div>
</div><!-- fin col 6 offset0-->
</div><!--fin row-->

<div class="row">
<div class="col-sm-4 col-sm-offset-0 pull-right">

<label>مدة التكوين للحصول على الشهادة </label><b style="color:#F00">*</b>
<div class="row">

<div class="col-sm-6 col-sm-offset-0 pull-right">

<div dir="ltr" class="input-group"><input type="number" id="dure_diplomeA" class="form-control" name="dure_diplomeA"  oninvalid="this.setCustomValidity('حقل إجباري')" oninput="setCustomValidity('')" onBlur="maxval(this,10);"  required value="<?php  echo $dure_diplomeA;?>"/> 
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="dure_diplomeA1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="dure_diplomeA2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span  style="font-size:14px">سنوات</span></span>
</div>
</div>

<div class="col-sm-6 col-sm-offset-0 pull-right">

<div dir="ltr" class="input-group"><input type="number" id="dure_diplomeM" class="form-control" name="dure_diplomeM"  oninvalid="this.setCustomValidity('حقل إجباري')" oninput="setCustomValidity('')" onBlur="maxval(this,11);" value="<?php  echo $dure_diplomeM;?>" required/> 
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="dure_diplomeM1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="dure_diplomeM2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span  style="font-size:14px"> أشهر</span></span>
</div>
</div>
</div><!--fin row01-->
</div><!--fin col4 offset0-->
<div class="col-sm-4 col-sm-offset-0 pull-right">
<label>من <b style="color:#F00">*</b></label>			
<div dir="ltr" class="input-group"><input type="date" id="dure_diplome_de" class="form-control" name="dure_diplome_de"  oninvalid="this.setCustomValidity('حقل إجباري')" oninput="setCustomValidity('')"  style="text-align:right" required value="<?php  echo $dure_diplome_de;?>"/>
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="dure_diplome_de1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="dure_diplome_de2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-calendar" style="font-size:20px"></span></span>
</div> 
</div><!--fin col4 offset0-->
<div class="col-sm-4 col-sm-offset-0 pull-right">
<label>إلى <b style="color:#F00">*</b></label>			
<div dir="ltr" class="input-group"><input type="date" id="dure_diplome_jusqua" class="form-control" name="dure_diplome_jusqua"  oninvalid="this.setCustomValidity('حقل إجباري')" oninput="setCustomValidity('')"  style="text-align:right" required value="<?php  echo $dure_diplome_jusqua;?>"/> 
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="dure_diplome_jusqua1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="dure_diplome_jusqua2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-calendar" style="font-size:20px"></span></span>
</div>
</div><!--fin col6 offset0-->
</div><!--fin row-->
 <div class="row">
<div class="col-sm-8 col-sm-offset-0 pull-right">       	
<label>المؤسسة المسلمة للشهادة <b style="color:#F00">*</b></label>			
<div dir="ltr" class="input-group"><input type="text" id="etablis_diplome" class="form-control keyboardInput" name="etablis_diplome"  oninvalid="this.setCustomValidity('حقل إجباري')" oninput="setCustomValidity('');changer_lettre(this.id)" required value="<?php  echo $etablis_diplome;?>"/>
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="etablis_diplome1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="etablis_diplome2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-university" style="font-size:20px"></span></span>
</div> 
</div><!--fin col6 offset0-->
</div><!--fin row-->
		<p></p>		                   
		<p></p>		 
                          
                        
                                        
<button type="button" class="btn btn-previous"><b><span class="glyphicon glyphicon-chevron-right"></span>السابق</b></button>
<button type="submit" class="btn btn-next"><b>التالي<span class="glyphicon glyphicon-chevron-left"></span></b></button>
			                      </div>
                                  </div>
                                   </div>
			                    </fieldset> 
                               
                                
                                <!--/////////////////partie03//////////////////-->                               
                                 
			                    <fieldset>
     <?php    
	    $query_parcours1="select * from parcours1 where code='".$email."'";
$query_parcours1=mysqli_query($connec,$query_parcours1);                        
    $mention_diplome="";
	$anne_major;
	$n_piece_major;
	
	$date_piece_major;
	$de;
	$pr_an1sm;$pr_an2sm;$pr_anmy;
	$dz_an1sm;$dz_an2sm;$dz_anmy;
	$tr_an1sm;$tr_an2sm;$tr_anmy;
	$qt_an1sm;$qt_an2sm;$qt_anmy;
	$cq_an1sm;$cq_an2sm;$cq_anmy;
	$six_an1sm;$six_an2sm;$six_anmy;
	$sept_an1sm;$sept_an2sm;$sept_anmy;
	$huit_an1sm;$huit_an2sm;$huit_anmy;
	$moyen_general;
	$note_memoire;
	while($row2=mysqli_fetch_array($query_parcours1)){
		$mention_diplome=$row2["mention_diplome"];
	$anne_major=$row2["anne_major"];
	$n_piece_major=$row2["n_piece_major"];
	
	$date_piece_major=$row2["date_piece_major"];
	$de=$row2["de"];
	$pr_an1sm=$row2["pr_an1sm"];$pr_an2sm=$row2["pr_an2sm"];$pr_anmy=$row2["pr_anmy"];
	$dz_an1sm=$row2["dz_an1sm"];$dz_an2sm=$row2["dz_an2sm"];$dz_anmy=$row2["dz_anmy"];
	$tr_an1sm=$row2["tr_an1sm"];$tr_an2sm=$row2["tr_an2sm"];$tr_anmy=$row2["tr_anmy"];
	$qt_an1sm=$row2["qt_an1sm"];$qt_an2sm=$row2["qt_an2sm"];$qt_anmy=$row2["qt_anmy"];
	$cq_an1sm=$row2["cq_an1sm"];$cq_an2sm=$row2["cq_an2sm"];$cq_anmy=$row2["cq_anmy"];
	$six_an1sm=$row2["six_an1sm"];$six_an2sm=$row2["six_an2sm"];$six_anmy=$row2["six_anmy"];
	$sept_an1sm=$row2["sept_an1sm"];$sept_an2sm=$row2["sept_an2sm"];$sept_anmy=$row2["sept_anmy"];
	$huit_an1sm=$row2["huit_an1sm"];$huit_an2sm=$row2["huit_an2sm"];$huit_anmy=$row2["huit_anmy"];
	$moyen_general=$row2["moyen_general"];
	$note_memoire=$row2["note_memoire"];
	}
?>
        <div class="col-sm-10 col-sm-offset-1 form-box" style="border:1px solid #99F;border-radius: 10px;">  
                        	  <div class="form-top" style="background-color:#26A69A" >
		                        		<div class="form-top-left">
		                        			<h3  style="color:#FFF">المرحلة 3 / 7</h3>
		                            		<p  style="color:#FFF">معلومات حول المسار الدراسي:</p>
		                        		</div>
		                        		<div class="form-top-right">
		                        			<i class="fa fa-archive"></i>
		                        		</div>
		                            </div>
	                              <div class="form-bottom">
				                        <div class="form-group">
                                        
      
 هل انت طالب الاول في الدفعة  :&nbsp;&nbsp;
 <?php   ?>
    <input type="radio" name="major" id="major0" style="width:20px;background-color:#399" value="لا"  /> لا 
&nbsp;&nbsp;
    <input type="radio" name="major" id="major1" style="width:20px;background-color:#399" value="نعم" checked /> نعم
 
  
      
  
  <div id="divmaj">
<div class="row">
<div class="col-sm-6 col-sm-offset-0 pull-right">
   تقدير الشهادة <b style="color:#F00">*</b>    <div dir="ltr" class="input-group">                     
<input  type="text"  id="mention_diplome" class="form-control"   name="mention_diplome"   oninput="changer_lettre(this.id)" value="<?php echo $mention_diplome;?>"   />
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="mention_diplome1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="mention_diplome2"></span>
<span class="input-group-addon glyphicon glyphicon-education" style="background-color:#000;color:#FFF" ></span>
</div>
</div><!--fin col6 -->
</div><!-- fin row-->
<div class="row">
<div class="col-sm-6 col-sm-offset-0 pull-right">                    		        
السنة الدراسية <b style="color:#F00">*</b><div dir="ltr" class="input-group">  <input type="text" id="anne_major"  class="form-control" name="anne_major"   value="<?php echo $anne_major;?>"   />		
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="anne_major1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="anne_major2"></span>
<span class="input-group-addon glyphicon glyphicon-calendar" style="background-color:#000;color:#FFF" ></span>          
</div>
</div><!--fin col6 offset0 -->
<div class="col-sm-6 col-sm-offset-0 pull-right ">
  رقم الوثيقة<b style="color:#F00">*</b><div dir="ltr" class="input-group">  <input type="text" id="n_piece_major"  class="form-control" name="n_piece_major"   value="<?php echo $n_piece_major;?>"  />		
  <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="n_piece_major1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="n_piece_major2"></span>
<span class="input-group-addon glyphicon glyphicon-file" style="background-color:#000;color:#FFF" ></span>
</div>	
</div><!--fin col6 offset0 -->  
</div><!-- fin row --> 
<div class="row">
<div class="col-sm-6 col-sm-offset-0 pull-right">
 تاريخ الإصدار<b style="color:#F00">*</b><div dir="ltr" class="input-group">  <input type="date" id="date_piece_major"  class="form-control" name="date_piece_major" style="text-align:right"  value="<?php echo $date_piece_major;?>"  />	
 <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="date_piece_major1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="date_piece_major2"></span>	
<span class="input-group-addon glyphicon glyphicon-calendar" style="background-color:#000;color:#FFF" ></span>
</div>	      
 </div><!--fin col6 offset0 --> 
 
 <div class="col-sm-6 col-sm-offset-0 pull-right">
 من قبل<b style="color:#F00">*</b><div dir="ltr" class="input-group"><input type="text" id="de" class="form-control keyboardInput" name="de"  oninput="changer_lettre(this.id)" value="<?php echo $de;?>"  />
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="de1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="de2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-university" style="font-size:20px"></span></span>
</div> 
 </div><!--fin col6 offset0 -->  
</div><!-- fin row -->       
</div>
   <p></p>     
   
    <p>معدل المسار الدراسي (كما هو مبين في كشوف النقاط السنوية أو السداسية)

 <div class="scrollable" style="border:1px solid #999;overflow:scroll;">                                   
   <table  dir="ltr" class="table-hover table-bordered" id="table1">
   <tr>
    <th  rowspan="2" valign="top">المعدل العام
مجموع معدل السنوات</th>
    <th  rowspan="2" valign="top">المعدل السنوي</th>
    <th  colspan="2" valign="top">معدل السداسي</th>
    <th  rowspan="2" valign="top">السنة</th>
  </tr>
  <tr>
    <th  valign="top">السداسي الثاني</th>
    <th  valign="top">السداسي الأول</th>
  </tr>
  <tr>
    <td rowspan="8" valign="top"><input type="number" class="form-control" step="0.01" id="txtf" name="moyen_general"  onblur="maxval(this,20); " onfocus="this.select()" value="<?php echo $moyen_general;?>" required /></td>
   <td  valign="top"><input type="number"  class="form-control" name="pr_anmy"  onblur="maxval(this,20); " step="0.01" onfocus="this.select()" id="txtf1" value="<?php echo $pr_anmy;?>" /></td>
   <td  valign="top"><input type="number"  class="form-control" name="pr_an2sm"  onblur="maxval(this,20); "step="0.01" value="<?php echo $pr_an2sm;?>" onfocus="this.select()"/></td>
   <td  valign="top"><input type="number" min="0" max="20"     class="form-control" name="pr_an1sm" onblur="maxval(this,20); "  step="0.01" value="<?php echo $pr_an1sm;?>" onfocus="this.select()"/> </td>
        
    <td valign="top">01</td>
  </tr>
  
   <tr>
     <td  valign="top"><input type="number"  class="form-control" step="0.01" name="dz_anmy"  onblur="maxval(this,20); " onfocus="this.select()" id="txtf1" value="<?php echo $dz_anmy;?>"/></td>
     <td  valign="top"><input type="number" class="form-control" step="0.01" name="dz_an2sm" value="<?php echo $dz_an2sm;?>" onblur=" maxval(this,20);" onfocus="this.select()"/></td>
     <td  valign="top"><input type="number" class="form-control" step="0.01" name="dz_an1sm" value="<?php echo $dz_an1sm;?>" onblur="maxval(this,20); " onfocus="this.select()" /></td>
    <td valign="top">02</td>
  </tr>
    <tr>
   <td valign="top"><input type="number" class="form-control" step="0.01" name="tr_anmy" onblur="maxval(this,20); " onfocus="this.select()" id="txtf1" value="<?php echo $tr_anmy;?>" /></td>
   <td  valign="top"><input type="number" class="form-control" step="0.01" name="tr_an2sm" value="<?php echo $tr_an2sm;?>" onblur="maxval(this,20); " onfocus="this.select()" /></td>
    <td valign="top"><input type="number" class="form-control" step="0.01" name="tr_an1sm" value="<?php echo $tr_an1sm;?>" onblur="maxval(this,20); " onfocus="this.select()"/></td>
    <td valign="top">03</td>
  </tr>
    <tr>
   <td  valign="top"><input type="number" class="form-control" step="0.01" name="qt_anmy" onblur="maxval(this,20); " onfocus="this.select()" id="txtf1" value="<?php echo $qt_anmy;?>"/></td>
         <td  valign="top"><input type="number" class="form-control" step="0.01" name="qt_an2sm"  value="<?php echo $qt_an2sm;?>" onblur="maxval(this,20); "onfocus="this.select()"/></td>
         <td  valign="top"><input type="number" class="form-control" step="0.01" name="qt_an1sm"  value="<?php echo $qt_an1sm;?>" onblur="maxval(this,20); "onfocus="this.select()"/></td>
          <td valign="top">04</td>
  </tr>
  <tr>
     <td valign="top"><input type="number" class="form-control" step="0.01"  name="cq_anmy" onblur="maxval(this,20); " onfocus="this.select()" id="txtf1" value="<?php echo $cq_anmy;?>"/></td>
         <td  valign="top"><input type="number" class="form-control" step="0.01" name="cq_an2sm"  value="<?php echo $cq_an2sm;?>" onblur="maxval(this,20);"onfocus="this.select()"/></td>
         <td  valign="top"><input type="number" class="form-control" step="0.01" name="cq_an1sm" value="<?php echo $cq_an1sm;?>" onblur="maxval(this,20); "onfocus="this.select()" /></td>
    <td valign="top">05</td>
  </tr>
   <tr>
    <td  valign="top"><input type="number" class="form-control" step="0.01" name="six_anmy"  onblur="maxval(this,20); " onfocus="this.select()" id="txtf1" value="<?php echo $six_anmy;?>"/></td>
         <td  valign="top"><input type="number" class="form-control" step="0.01" name="six_an2sm" value="<?php echo $six_an2sm;?>" onblur="maxval(this,20); "onfocus="this.select()"/></td>
         <td  valign="top"><input type="number" class="form-control" step="0.01" name="six_an1sm" value="<?php echo $six_an1sm;?>" onblur="maxval(this,20); "onfocus="this.select()" /></td>
    <td valign="top">06</td>
  </tr>
   <tr>
   <td  valign="top"><input type="number" class="form-control" step="0.01" name="sept_anmy"  onblur="maxval(this,20); " onfocus="this.select()" id="txtf1" value="<?php echo $sept_anmy;?>"/></td>
         <td  valign="top"><input type="number" class="form-control" step="0.01" name="sept_an2sm" value="<?php echo $sept_an2sm;?>" onblur=" maxval(this,20);)"onfocus="this.select()"/></td>
         <td  valign="top"><input type="number" class="form-control" step="0.01" name="sept_an1sm"  value="<?php echo $sept_an1sm;?>" onblur="maxval(this,20); "onfocus="this.select()" /></td>
    <td valign="top">07</td>
  </tr>
   <tr>
   <td  valign="top"><input type="number" class="form-control" step="0.01" name="huit_anmy" onblur="maxval(this,20); " onfocus="this.select()" id="txtf1" value="<?php echo $huit_anmy;?>"/></td>
         <td  valign="top"><input type="number" class="form-control" step="0.01" name="huit_an2sm" value="<?php echo $huit_an2sm;?>" onblur="maxval(this,20); "onfocus="this.select()" /></td>
         <td  valign="top"><input type="number" class="form-control" step="0.01" name="huit_an1sm"  value="<?php echo $huit_an1sm;?>" onblur=" maxval(this,20);"onfocus="this.select()"/></td>
    <td valign="top">08</td>
  </tr>
  
</table>                                   
                                     
                                       
  </div>                                     
                                        
                        
                        
 <p></p>		                        	
<div class="form-inline">
علامة مذكرة نهاية الدراسة إن لم تكن محسوبة في معدل السداسي الأخير أو المعدل العام <div dir="ltr" class="input-group"><input type="number" step="0.01" class="form-control"    id="note_memoire" name="note_memoire" value="<?php echo $note_memoire;?>" onblur="maxval(this,20); "onfocus="this.select()" /><span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-flickr" style="font-size:20px"></span></span>
</div>	
    <br>                                 <button type="button" class="btn btn-previous"><b><span class="glyphicon glyphicon-chevron-right"></span>السابق</b></button>
				                        <button type="submit" class="btn btn-next_etap3"><b>التالي<span class="glyphicon glyphicon-chevron-left"></span></b></button>
				                    </div>
                                 
          </div>
          
          </div>
          </div>
              
			                    </fieldset>
			                  
                                
    
    <!-- ///////////partie 04 //////////-->
                         
                                      
		                      <fieldset>
                                <div class="col-sm-12 col-sm-offset-0 form-box" style="border:1px solid #99F;border-radius: 10px;"> 
                        	  <div class="form-top" style="background-color:#26A69A" >
		                        		<div class="form-top-left">
		                        			<h3  style="color:#FFF">المرحلة 4 / 7</h3>
                                       
		                            		<p style="color:#FFF">معلومات حول التكوين المكمل للشهادة في نفس التخصص( ان وجدت):</p>
		                        		</div>
		                        		<div class="form-top-right">
		                        			<i class="fa fa-indent"></i>
		                        		</div>
	                              </div>
<div class="form-bottom">

        
        
        
       <div class="row clearfix">
		<div class="col-md-12 column">
         <div  class="scrollable" style="border:1px solid #999">
         <div dir="rtl" id="rwah"> 
			<table class="table table-bordered table-hover tab_logic" id="tab_logic">
				<thead>
				 <tr>
   <td  rowspan="2" valign="top"><p style="width:130px">طبيعة الشهاد</p></td>
<td  rowspan="2" valign="top"><p style="width:130px">الشعبة </p></td>
   <td  rowspan="2" valign="top"><p style="width:130px">التخصص</p></td>
   <td  rowspan="2" valign="top"><p style="width:130px">المؤسسة المسلمة للشهادة</p></td>
     <td  rowspan="2" valign="top">رقم الشهادة</td>
      <td rowspan="2" valign="top">تاريخ إصدار الشهادة</td>
       <td  colspan="2" valign="top"><p style="width:170px">مدة التكوين</p></td>        
      <td  valign="top">تاريخ الحصول على الشهادة أو <br>تاريخ التسجيل في الدكتوراه</td>  
    </tr>
    <tr>
      <td  valign="top">من</td>
     <td  valign="top">إلى</td>
   
      
      
     
    </tr>
				</thead>
				<tbody>
                <?php
				//requete formation
$query4="select * from formation where user='".$email."'";
$result4=mysqli_query($connec,$query4);
	  $code4= mysqli_num_rows($result4);
$i=0;
	  if($code4==0){
	  ?>
	  	<tr id='addr0'>
						<td>
                    <div  dir="ltr" class="input-group ">     
						 <input type="text" name='nature_diplome_f' id="nature_diplome_f" class="form-control"   />
                         <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="nature_diplome_f1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="nature_diplome_f2"></span>
                    </div>  
						</td>
						<td>
                        <div  dir="ltr" class="input-group ">
						<input type="text" name='filiere_f' class="form-control" />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="filiere_f1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="filiere_f2"></span>
                        </div>
						</td>
						<td>
                        <div  dir="ltr" class="input-group ">
						<input type="text" name="specialite_f" id="specialite_f" class="form-control" />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="specialite_f1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="specialite_f2"></span>
                        </div>
						</td>
						<td>
                        <div  dir="ltr" class="input-group ">
						<input type="text" name='etablissement_f' id="etablissement_f"  class="form-control" />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="etablissement_f1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="etablissement_f2"></span>
                        </div>
						</td>
                        	<td>
                        <div  dir="ltr" class="input-group ">
						<input type="number" name='numero_diplome_f' id="numero_diplome_f"  class="form-control"  />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="numero_diplome_f1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="numero_diplome_f2"></span>
                        </div>
						</td>
                         	<td>
                        <div  dir="ltr" class="input-group ">                     <input type="date"  name='date_diplome_f' id="date_diplome_f"  class="form-control"  />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;width:100%;text-align:right;right:15px"  id="date_diplome_f1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden;width:100%;text-align:right;right:15px"id="date_diplome_f2"></span>
                        </div>
						</td>
                        <td>
                        <div  dir="ltr" class="input-group ">
                        <input type="number" name='date_f_de'id="date_f_de" placeholder='0000' class="form-control"  />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="date_f_de1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="date_f_de2"></span>
                        </div>
						</td>
                         <td>
                         <div  dir="ltr" class="input-group ">
                        <input type="number" placeholder='0000' name= 'date_f_jusqua' id="date_f_jusqua" class="form-control"  />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="date_f_jusqua1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="date_f_jusqua2"></span>
                        </div>
						</td>
                         <td>
                         <div  dir="ltr" class="input-group ">
                        <input type="date" max="today"  name='date_doctor' id="date_doctor"  class="form-control"  />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;width:100%;text-align:right;right:15px"  id="date_doctor1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;width:100%;text-align:right;right:15px" id="date_doctor2"></span>
                        </div>
						</td>
                     
                     
					</tr>
                        
	  <?php
	  }
	  
	  else{
	  $i=0;
      while ($row4=mysqli_fetch_array($result4)){
	
	$nature_diplome_f=$row4["nature_diplome_f"];	
	$filiere_f=$row4["filiere_f"];
	$specialite_f=$row4["specialite_f"];
	$etablissement_f=$row4["etablissement_f"];
	$specialite_f=$row4["specialite_f"];
	$numero_diplome_f=$row4["numero_diplome_f"];
	$date_diplome_f=$row4["date_diplome_f"];
	$date_f_de=$row4["date_f_de"];
	$date_f_jusqua=$row4["date_f_jusqua"];
	$date_doctor=$row4["date_doctor"];
	if($i==0){
	
	?>
            <tr id='addr<?php echo $i?>'>
						<td>
                    <div  dir="ltr" class="input-group ">     
						 <input type="text" name='nature_diplome_f' id="nature_diplome_f" class="form-control"  value="<?php  echo $nature_diplome_f;?>" />
                         <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="nature_diplome_f1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="nature_diplome_f2"></span>
                    </div>  
						</td>
						<td>
                        <div  dir="ltr" class="input-group ">
						<input type="text" name='filiere_f'  id="filiere_f" class="form-control" value="<?php echo $filiere_f;?>" />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="filiere_f1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="filiere_f2"></span>
                        </div>
						</td>
						<td>
                        <div  dir="ltr" class="input-group ">
						<input type="text" name='specialite_f' id="specialite_f" class="form-control" value="<?php echo $specialite_f;?>"/>
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="specialite_f1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="specialite_f2"></span>
                        </div>
						</td>
						<td>
                        <div  dir="ltr" class="input-group ">
						<input type="text" name='etablissement_f' id="etablissement_f"  class="form-control"value="<?php echo $etablissement_f;?>" />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="etablissement_f1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="etablissement_f2"></span>
                        </div>
						</td>
                        	<td>
                        <div  dir="ltr" class="input-group ">
						<input type="number" name='numero_diplome_f' id="numero_diplome_f"  class="form-control" value="<?php echo $numero_diplome_f;?>" />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="numero_diplome_f1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="numero_diplome_f2"></span>
                        </div>
						</td>
                         	<td>
                        <div  dir="ltr" class="input-group ">                     <input type="date"  name='date_diplome_f' id="date_diplome_f"  class="form-control" value="<?php  echo $date_diplome_f;?>" />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;width:100%;text-align:right;right:15px"  id="date_diplome_f1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden;width:100%;text-align:right;right:15px"id="date_diplome_f2"></span>
                        </div>
						</td>
                        <td>
                        <div  dir="ltr" class="input-group ">
                        <input type="number" name='date_f_de'id="date_f_de" placeholder='0000' class="form-control"  value="<?php echo $date_f_de;?>"/>
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="date_f_de1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="date_f_de2"></span>
                        </div>
						</td>
                         <td>
                         <div  dir="ltr" class="input-group ">
                        <input type="number" placeholder='0000' name= 'date_f_jusqua' id="date_f_jusqua" class="form-control" value="<?php echo $date_f_jusqua;?>" />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="date_f_jusqua1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="date_f_jusqua2"></span>
                        </div>
						</td>
                         <td>
                         <div  dir="ltr" class="input-group ">
                        <input type="date" max="today"  name='date_doctor' id="date_doctor"  class="form-control" value="<?php  echo $date_doctor;?>" />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;width:100%;text-align:right;right:15px"  id="date_doctor1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;width:100%;text-align:right;right:15px" id="date_doctor2"></span>
                        </div>
						</td>
                     
                     
					</tr>
             
             <?php }
			 else{
             ?>
                
					<tr id='addr<?php echo $i?>'>
						<td>
                    <div  dir="ltr" class="input-group ">     
						 <input type="text" name='nature_diplome_f<?php echo $i?>' id="nature_diplome_f<?php echo $i?>" class="form-control"  value="<?php  echo $nature_diplome_f;?>" />
                         <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="nature_diplome_f1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="nature_diplome_f2"></span>
                    </div>  
						</td>
						<td>
                        <div  dir="ltr" class="input-group ">
						<input type="text" name='filiere_f<?php echo $i?>'  id="filiere_f<?php echo $i?>" class="form-control" value="<?php echo $filiere_f;?>" />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="filiere_f1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="filiere_f2"></span>
                        </div>
						</td>
						<td>
                        <div  dir="ltr" class="input-group ">
						<input type="text" name='specialite_f<?php echo $i?>' id="specialite_f<?php echo $i?>" class="form-control" value="<?php echo $specialite_f;?>"/>
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="specialite_f1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="specialite_f2"></span>
                        </div>
						</td>
						<td>
                        <div  dir="ltr" class="input-group ">
						<input type="text" name='etablissement_f<?php echo $i?>' id="etablissement_f<?php echo $i?>"  class="form-control"value="<?php echo $etablissement_f;?>" />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="etablissement_f1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="etablissement_f2"></span>
                        </div>
						</td>
                        	<td>
                        <div  dir="ltr" class="input-group ">
						<input type="number" name='numero_diplome_f<?php echo $i?>' id="numero_diplome_f<?php echo $i?>"  class="form-control" value="<?php echo $numero_diplome_f;?>" />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="numero_diplome_f1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="numero_diplome_f2"></span>
                        </div>
						</td>
                         	<td>
                        <div  dir="ltr" class="input-group ">                     <input type="date"  name='date_diplome_f<?php echo $i;?>' id="date_diplome_f<?php echo $i;?>"  class="form-control" value="<?php  echo $date_diplome_f;?>" />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;width:100%;text-align:right;right:15px"  id="date_diplome_f1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden;width:100%;text-align:right;right:15px"id="date_diplome_f2"></span>
                        </div>
						</td>
                        <td>
                        <div  dir="ltr" class="input-group ">
                        <input type="number" name='date_f_de<?php echo $i?>'id="date_f_de<?php echo $i?>" placeholder='0000' class="form-control"  value="<?php echo $date_f_de;?>"/>
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="date_f_de1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="date_f_de2"></span>
                        </div>
						</td>
                         <td>
                         <div  dir="ltr" class="input-group ">
                        <input type="number" placeholder='0000' name= 'date_f_jusqua<?php echo $i?>' id="date_f_jusqua<?php echo $i?>" class="form-control" value="<?php echo $date_f_jusqua;?>" />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="date_f_jusqua1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="date_f_jusqua2"></span>
                        </div>
						</td>
                         <td>
                         <div  dir="ltr" class="input-group ">
                        <input type="date" max="today"  name='date_doctor<?php echo $i?>' id="date_doctor<?php echo $i?>"  class="form-control" value="<?php  echo $date_doctor;?>" />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;width:100%;text-align:right;right:15px"  id="date_doctor1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;width:100%;text-align:right;right:15px" id="date_doctor2"></span>
                        </div>
						</td>
                     
                     
					</tr>
                        
                    <?php } ++$i; }} ?>
                   <tr id='addr<?php echo $i?>'></tr>
                     
				</tbody>
			</table>
            </div>
		</div>
         <div></div>
	
 
	<a id="add_row" class="btn btn-success pull-left"> شهادة أخرى </a><a id='delete_row' class="pull-right btn btn-danger">حذف</a>
</div>
    
    </div>



   <br>
        
          	<p style="color:#F00;">ملاحظة:<strong> إذا لم يكن لديك التكوين المكمل للشهادة في نفس التخصص أنقر على الزر <span style="background:#0CC ;color:#FFF" > غير معني </span> بالأسفل لتخطي المرحلة</strong></p>		 
          <br /><br />
                             
                              <button type="button" class="btn btn-previous"><b><span class="glyphicon glyphicon-chevron-right"></span>السابق</b></button>
				              <button type="button" class="btn btn-forget"><b>غير معني<span class="glyphicon glyphicon-chevron-left"></span></b></button>
                               <button type="submit" class="btn btn-next"><b>التالي<span class="glyphicon glyphicon-chevron-left"></span></b></button>
                                                   
				                     
                                        
				                        <!--<button type="submit" class="btn">Sign me up!</button>-->
			                      </div>
                                  </div>
                                  
			                    </fieldset>
                              
                                
                                
      <!--///////// partie 05//////////////////-->                          
                                
                                
                                
                                     
                                 <fieldset>
                            
                                      <div class="col-sm-10 col-sm-offset-1 form-box" style="border:1px solid #99F;border-radius: 10px;">
                        	  <div class="form-top" style="background-color:#26A69A" >
		                        		<div class="form-top-left">
		                        			<h3  style="color:#FFF">المرحلة 5 / 7</h3>
                                       
		                            		<p style="color:#FFF">معلومات حول الأشغال والدراسات المنجزة (إن وجدت):</p>
		                        		</div>
		                        		<div class="form-top-right">
		                        			<i class="fa fa-tags"></i>
		                        		</div>
		                            </div>
<div class="form-bottom">
  
        
        
        
       <div class="row clearfix">
		<div class="col-md-12 column">
         <div class="scrollable" style="border:1px solid #999">
			<table class="table table-bordered table-hover" id="tab_logic1">
				<thead>
				 <tr>
   <td  rowspan="2" valign="top"><p style="width:200px">طبيعة العمل أو الدراسة</p></td>
<td  rowspan="2" valign="top"><p style="width:70px">تاريخ النشر </p></td>
 

       <td  colspan="3" valign="top"><p style="width:300px">المجلة أو الدورية المنشور بها</p></td>        
     
    </tr>
    <tr>
      <td  valign="top"><p style="width:150px">التسمية</p></td>
     <td  valign="top"><p style="width:70px">العدد</p></td>
     <td  valign="top"><p style="width:70px">التاريخ</p></td>
   
      
      
     
    </tr>
				</thead>
				<tbody>
                    <?php  
								  //requete travaux*****************
$query5="select * from travaux where user='".$email."'";
$result5=mysqli_query($connec,$query5);
	  $code5= mysqli_num_rows($result5); 
	   if($code5==0){
								  ?>
					<tr id='trave0'>
						<td>
                        <div class="input-group">
						<input type="text" name='nature_travail' id="nature_travail"   class="form-control"   />
                         <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden"  id="nature_travail1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden" id="nature_travail2"></span>
                         </div>
						</td>
						<td>
                        <div class="input-group">
						<input type="date" name='date_publication' id="date_publication"  class="form-control"  />
                       <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;width:100%;text-align:right;right:15px"  id="date_publication1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;width:100%;text-align:right;right:15px" id="date_publication2"></span>
                         </div>
						</td>
                        <td>
                        <div class="input-group">
						<input type="text" name='nom_journal_publication' id="nom_journal_publication"  class="form-control"  />
                         <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="nom_journal_publication1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;" id="nom_journal_publication2"></span>
                         </div>
						</td>
						<td>
                        <div class="input-group">
						<input type="number" name='numero_journal_publication' id="numero_journal_publication"  class="form-control" />
                         <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="numero_journal_publication1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;" id="numero_journal_publication2"></span>
                         </div>
						</td>
						<td>
                        <div class="input-group">
						<input type="date" name='date_journal_publication' id="date_journal_publication"  class="form-control"  />
                         <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;width:100%;text-align:right;right:15px"  id="date_journal_publication1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;width:100%;text-align:right;right:15px" id="date_journal_publication2"></span>
                         </div>
						</td>
                        	
                     
                        
                        
					</tr>
                    <?php  }
					else{
						$i=0;
			while ($row5=mysqli_fetch_array($result5)){
	
	$nature_travail=$row5["nature_travail"];
	$date_publication=$row5["date_publication"];
	$nom_journal_publication=$row5["nom_journal_publication"];
	$numero_journal_publication=$row5["numero_journal_publication"];
	$date_journal_publication=$row5["date_journal_publication"];
	
	if($i==0){
	 ?>
     <tr id='trave0'>
						<td>
                        <div class="input-group">
						<input type="text" name='nature_travail' id="nature_travail"   class="form-control"  value="<?php echo $nature_travail;?>" />
                         <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden"  id="nature_travail1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden" id="nature_travail2"></span>
                         </div>
						</td>
						<td>
                        <div class="input-group">
						<input type="date" name='date_publication' id="date_publication"  class="form-control" value="<?php echo $date_publication;?>" />
                       <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;width:100%;text-align:right;right:15px"  id="date_publication1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;width:100%;text-align:right;right:15px" id="date_publication2"></span>
                         </div>
						</td>
                        <td>
                        <div class="input-group">
						<input type="text" name='nom_journal_publication' id="nom_journal_publication"  class="form-control" value="<?php echo $nom_journal_publication;?>" />
                         <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="nom_journal_publication1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;" id="nom_journal_publication2"></span>
                         </div>
						</td>
						<td>
                        <div class="input-group">
						<input type="number" name='numero_journal_publication' id="numero_journal_publication"  class="form-control" value="<?php echo $numero_journal_publication;?>" />
                         <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="numero_journal_publication1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;" id="numero_journal_publication2"></span>
                         </div>
						</td>
						<td>
                        <div class="input-group">
						<input type="date" name='date_journal_publication' id="date_journal_publication"  class="form-control" value="<?php echo $date_journal_publication;?>"  />
                         <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;width:100%;text-align:right;right:15px"  id="date_journal_publication1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;width:100%;text-align:right;right:15px" id="date_journal_publication2"></span>
                         </div>
						</td>
                        	
                     
                        
                        
					</tr>
                    
                    <?php
	}
	else{
		?>
         <tr id='trave<?php echo $i;?>'>
						<td>
                        <div class="input-group">
						<input type="text" name='nature_travail<?php echo $i;?>' id="nature_travail<?php echo $i;?>"   class="form-control"  value="<?php echo $nature_travail;?>" />
                         <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden"  id="nature_travail1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden" id="nature_travail2"></span>
                         </div>
						</td>
						<td>
                        <div class="input-group">
						<input type="date" name='date_publication<?php echo $i;?>' id="date_publication<?php echo $i;?>"  class="form-control" value="<?php echo $date_publication;?>" />
                       <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;width:100%;text-align:right;right:15px"  id="date_publication1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;width:100%;text-align:right;right:15px" id="date_publication2"></span>
                         </div>
						</td>
                        <td>
                        <div class="input-group">
						<input type="text" name='nom_journal_publication<?php echo $i;?>' id="nom_journal_publication<?php echo $i;?>"  class="form-control" value="<?php echo $nom_journal_publication;?>" />
                         <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="nom_journal_publication1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;" id="nom_journal_publication2"></span>
                         </div>
						</td>
						<td>
                        <div class="input-group">
						<input type="number" name='numero_journal_publication<?php echo $i;?>' id="numero_journal_publication<?php echo $i;?>"  class="form-control" value="<?php echo $numero_journal_publication;?>" />
                         <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="numero_journal_publication1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;" id="numero_journal_publication2"></span>
                         </div>
						</td>
						<td>
                        <div class="input-group">
						<input type="date" name='date_journal_publication<?php echo $i;?>' id="date_journal_publication<?php echo $i;?>"  class="form-control" value="<?php echo $date_journal_publication;?>"  />
                         <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;width:100%;text-align:right;right:15px"  id="date_journal_publication1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;width:100%;text-align:right;right:15px" id="date_journal_publication2"></span>
                         </div>
						</td>
                        	
                     
                        
                        
					</tr>
					
                    <?php } ++$i; }}?>
     
     
     
                    <tr id='trave<?php echo $i?>'></tr>
				</tbody>
			</table>
		</div>
         <div></div>
	
 
	<a id="add_row1" class="btn btn-success pull-left"> إضافة أخرى </a><a id='delete_row1' class="pull-right btn btn-danger">حذف</a>
</div>
    
    </div>


   <br>
   	<p style="color:#F00">ملاحظة:<strong> إذا لم يكن لديك الأشغال والدراسات المنجزة أنقر على الزر <span style="background:#0CC ;color:#FFF" > غير معني </span> بالأسفل لتخطي المرحلة</strong></p>		 
          <br /><br />
                             
                              <button type="button" class="btn btn-previous"><b><span class="glyphicon glyphicon-chevron-right"></span>السابق</b></button>
				              <button type="button" class="btn btn-forget" id="btn_en"><b>غير معني<span class="glyphicon glyphicon-chevron-left"></span></b></button>
                               <button type="submit" class="btn btn-next"><b>التالي<span class="glyphicon glyphicon-chevron-left"></span></b></button>
                                                   
				                     
                                        
				                        <!--<button type="submit" class="btn">Sign me up!</button>-->
				                    </div>
                                   
                                    </div> 
			                    </fieldset>
                                
                                
                                
                                
                                
    <!-- ///////////////////parier 6//////////////////////-->
		         
                                 <fieldset>
                                      <div class="col-sm-12 col-sm-offset-0 form-box" style="border:1px solid #99F;border-radius: 10px;">
                        	  <div class="form-top" style="background-color:#26A69A" >
		                        		<div class="form-top-left">
		                        			<h3  style="color:#FFF">المرحلة 6 / 7</h3>
                                       
		                            		<p style="color:#FFF">معلومات حول الخبرة المهنية (إن وجدت):</p>
		                        		</div>
		                        		<div class="form-top-right">
		                        			<i class="fa fa-tags"></i>
		                        		</div>
		                            </div>
<div class="form-bottom">
  
        
        
        
       <div class="row clearfix">
		<div class="col-md-12 column">
         <div class="scrollable" style="border:1px solid #999">
			<table class="table table-bordered table-hover tab_logic2" id="tab_logic2">
				<thead>
				 <tr>
   <td  rowspan="2" valign="top"><p style="width:150px">تسمية
<p>الإدارة أو المؤسسة </p> 
(الهيئة المستخدمة)</p></td>
<td rowspan="2" valign="top"><p style="width:150px"><p>الوظيفة أو المنصب</p><p>المشغول</p></p></td>
 

       <td  colspan="2" valign="top"><p style="width:200px"><p>االفترة</p></p></td>   
         <td  colspan="2" valign="top"><p style="width:300px"><p>شهادة العمل أو عقد العمل</p></p></td>  
           <td  rowspan="2" valign="top"><p style="width:200px"><p>سبب إنهاء علاقة العمل</p></p></td>     
     
    </tr>
    <tr>
 
     <td  valign="top">من</td>
     <td  valign="top"><p style="width:70px">الى</p></td>
       <td  valign="top">الرقم</td>
     <td  valign="top"><p style="width:70px"><p>التاريخ</p></p></td>
   
      
      
     
    </tr>
				</thead>
				<tbody>
                <?php
                	  	  //requete experiance*****************
$query6="select * from experiance where user='".$email."'";
$result6=mysqli_query($connec,$query6);
	  $code6= mysqli_num_rows($result6);
	  if($code6==0){
	  ?>
					<tr id='exper0'>
						<td>
                        <div class="input-group">
						<input type="text" name='etablis_experiance' id="etablis_experiance"  class="form-control"  />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="etablis_experiance1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;" id="etablis_experiance2"></span>
                        </div>
						</td>
                        <td>
                        <div class="input-group">
						<input type="text" name='grade_experiance' id="grade_experiance"  class="form-control"   />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="grade_experiance1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;" id="grade_experiance2"></span>
                       </div>
						</td>
						<td>
                        <div class="input-group">
						<input type="date" name='date_experiance_de' id="date_experiance_de"  class="form-control"  />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;width:100%;text-align:right;right:15px"  id="date_experiance_de1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;width:100%;text-align:right;right:15px" id="date_experiance_de2"></span>
                      </div>
						</td>
                        	<td>
                            <div class="input-group">
						<input type="date" name='date_experiance_jusqua' id="date_experiance_jusqua"  class="form-control" />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;width:100%;text-align:right;right:15px"  id="date_experiance_jusqua1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;width:100%;text-align:right;right:15px" id="date_experiance_jusqua2"></span>
                        </div>
						</td>
                        <td>
                        <div class="input-group">
						<input type="number" name='numero_attestation' id="numero_attestation"  class="form-control"  />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="numero_attestation1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;" id="numero_attestation2"></span>
                        </div>
						</td>
						<td>
                        <div class="input-group">
						<input type="date" name='date_attestation'  class="form-control" id="date_attestation" />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;width:100%;text-align:right;right:15px"  id="date_attestation1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;width:100%;text-align:right;right:15px" id="date_attestation2"></span>
                        </div>
						</td>
						<td>
                        <div class="input-group">
						<input type="text" name='cause_fin_relation'  class="form-control"  id="cause_fin_relation"/>
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="cause_fin_relation1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;" id="cause_fin_relation2"></span>
                        </div>
						</td>
                        	
                     
                        
                        
					</tr>
                    <?php  }
					else{
						$i=0;
while ($row6=mysqli_fetch_array($result6)){

	$etablis_experiance=$row6["etablis_experiance"];
	$grade_experiance=$row6["grade_experiance"];
	$date_experiance_de=$row6["date_experiance_de"];
	$date_experiance_jusqua=$row6["date_experiance_jusqua"];
	$numero_attestation=$row6["numero_attestation"];
	$date_attestation=$row6["date_attestation"];
	$cause_fin_relation=$row6["cause_fin_relation"];
	if($i==0){
?>
<tr id='exper<?php echo $i?>'>
						<td>
                        <div class="input-group">
						<input type="text" name="etablis_experiance" id="etablis_experiance" value="<?php echo $etablis_experiance;?>"  class="form-control"  />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="etablis_experiance1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;" id="etablis_experiance2"></span>
                        </div>
						</td>
                        <td>
                        <div class="input-group">
						<input type="text" name='grade_experiance' id="grade_experiance"  class="form-control" value="<?php echo $grade_experiance;?>"  />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="grade_experiance1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;" id="grade_experiance2"></span>
                       </div>
						</td>
						<td>
                        <div class="input-group">
						<input type="date" name='date_experiance_de' id="date_experiance_de" value="<?php echo $date_experiance_de;?>" class="form-control"  />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;width:100%;text-align:right;right:15px"  id="date_experiance_de1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;width:100%;text-align:right;right:15px" id="date_experiance_de2"></span>
                      </div>
						</td>
                        	<td>
                            <div class="input-group">
						<input type="date" name='date_experiance_jusqua' id="date_experiance_jusqua"  class="form-control" value="<?php echo $date_experiance_jusqua;?>" />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;width:100%;text-align:right;right:15px"  id="date_experiance_jusqua1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;width:100%;text-align:right;right:15px" id="date_experiance_jusqua2"></span>
                        </div>
						</td>
                        <td>
                        <div class="input-group">
						<input type="number" name='numero_attestation' id="numero_attestation" value="<?php echo $numero_attestation;?>" class="form-control"  />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="numero_attestation1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;" id="numero_attestation2"></span>
                        </div>
						</td>
						<td>
                        <div class="input-group">
						<input type="date" name='date_attestation'  class="form-control" id="date_attestation" value="<?php echo $date_attestation;?>" />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;width:100%;text-align:right;right:15px"  id="date_attestation1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;width:100%;text-align:right;right:15px" id="date_attestation2"></span>
                        </div>
						</td>
						<td>
                        <div class="input-group">
						<input type="text" name='cause_fin_relation'  class="form-control"  id="cause_fin_relation" value="<?php echo $cause_fin_relation;?>" />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="cause_fin_relation1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;" id="cause_fin_relation2"></span>
                        </div>
						</td>
                        	
                     
                        
                        
					</tr>
                    <?php }
					else{
						?>
                        <tr id='exper<?php echo $i?>'>
						<td>
                        <div class="input-group">
						<input type="text" name="etablis_experiance<?php echo $i?>" id="etablis_experiance<?php echo $i?>" value="<?php echo $etablis_experiance;?>"  class="form-control"  />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="etablis_experiance1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;" id="etablis_experiance2"></span>
                        </div>
						</td>
                        <td>
                        <div class="input-group">
						<input type="text" name='grade_experiance<?php echo $i?>' id="grade_experiance<?php echo $i?>"  class="form-control" value="<?php echo $grade_experiance;?>"  />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="grade_experiance1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;" id="grade_experiance2"></span>
                       </div>
						</td>
						<td>
                        <div class="input-group">
						<input type="date" name='date_experiance_de<?php echo $i?>' id="date_experiance_de<?php echo $i?>" value="<?php echo $date_experiance_de;?>" class="form-control"  />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;width:100%;text-align:right;right:15px"  id="date_experiance_de1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;width:100%;text-align:right;right:15px" id="date_experiance_de2"></span>
                      </div>
						</td>
                        	<td>
                            <div class="input-group">
						<input type="date" name='date_experiance_jusqua<?php echo $i?>' id="date_experiance_jusqua<?php echo $i?>"  class="form-control" value="<?php echo $date_experiance_jusqua;?>" />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;width:100%;text-align:right;right:15px"  id="date_experiance_jusqua1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;width:100%;text-align:right;right:15px" id="date_experiance_jusqua2"></span>
                        </div>
						</td>
                        <td>
                        <div class="input-group">
						<input type="number" name='numero_attestation<?php echo $i?>' id="numero_attestation<?php echo $i?>" value="<?php echo $numero_attestation;?>" class="form-control"  />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="numero_attestation1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;" id="numero_attestation2"></span>
                        </div>
						</td>
						<td>
                        <div class="input-group">
						<input type="date" name='date_attestation<?php echo $i?>'  class="form-control" id="date_attestation<?php echo $i?>" value="<?php echo $date_attestation;?>" />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;width:100%;text-align:right;right:15px"  id="date_attestation1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;width:100%;text-align:right;right:15px" id="date_attestation2"></span>
                        </div>
						</td>
						<td>
                        <div class="input-group">
						<input type="text" name='cause_fin_relation<?php echo $i?>'  class="form-control"  id="cause_fin_relation<?php echo $i?>" value="<?php echo $cause_fin_relation;?>" />
                        <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="cause_fin_relation1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;" id="cause_fin_relation2"></span>
                        </div>
						</td>
                        	
                     
                        
                        
					</tr>
                    <?php } ++$i;  } }?>
                    <tr id='exper<?php echo $i?>'></tr>
				</tbody>
			</table>
		</div>
         <div></div>
	
 
	<a id="add_row2" class="btn btn-success pull-left "> خبرة أخرى </a><a id='delete_row2' class="pull-right btn btn-danger">حذف</a>
</div>
    
    </div>


   <br>
    
    	<p style="color:#F00">ملاحظة:<strong> إذا لم يكن لديك خبرة مهنية أنقر على الزر <span style="background:#0CC ;color:#FFF" > غير معني </span> بالأسفل لتخطي المرحلة</strong></p>		 
          <br /><br />                         
                              <button type="button" class="btn btn-previous"><b><span class="glyphicon glyphicon-chevron-right"></span>السابق</b></button>
				              <button type="button" class="btn btn-forget"><b>غير معني<span class="glyphicon glyphicon-chevron-left"></span></b></button>
                               <button type="submit" class="btn btn-next"><b>التالي<span class="glyphicon glyphicon-chevron-left"></span></b></button>
                                                   
				                     
                                        
				                        <!--<button type="submit" class="btn">Sign me up!</button>-->
				                    </div>
                                   
                                    </div> 
			                    </fieldset>   
                                
                                
                                
   <!-- ////////////////partie 7///////////    -->
           
			                    <fieldset>
            <?php  
				  $query7="select * from employer where code='".$email."'";
                  
             $result7=mysqli_query($connec,$query7);
	  $code7= mysqli_num_rows($result7);                     $nom_emploie="";
$date_emploie_initial="";
$date_emploie_actuel="";
$categorie="";
$degre="";
$numero_document="";
$date_document="";
$nature_signateur="";
$adresse_administration="";
$telephone_administration="";
$fax_administration="";
$email_administration="";

while ($row7=mysqli_fetch_array($result7)){ 
$nom_emploie=$row7["nom_emploie"];
$date_emploie_initial=$row7["date_emploie_initial"];
$date_emploie_actuel=$row7["date_emploie_actuel"];
$categorie=$row7["categorie"];
$degre=$row7["degre"];
$numero_document=$row7["numero_document"];
$date_document=$row7["date_document"];
$nature_signateur=$row7["nature_signateur"];
$adresse_administration=$row7["adresse_administration"];
$telephone_administration=$row7["telephone_administration"];
$fax_administration=$row7["fax_administration"];
$email_administration=$row7["email_administration"];

}
 ?>
                                   <div class="col-sm-10 col-sm-offset-1 form-box"style="border:1px solid #99F;border-radius: 10px;" > 
                        	  <div class="form-top" style="background-color:#26A69A">
		                        		<div class="form-top-left">
		                        			<h3  style="color:#FFF">المرحلة 7 / 7</h3>
		                            		<p  style="color:#FFF">معلومات حول الوضعية المهنية الحالية (بالنسبة للمترشحين العاملين):</p>
		                        		</div>
		                        		<div class="form-top-right">
		                        			<i class="fa fa-briefcase"></i>
		                        		</div>
		                            </div>
                      <div class="form-bottom">
                     <div class="form-group"> 
 <div class="row">
<div class="col-sm-6 col-sm-offset-0 pull-right">          
تسمية الوظيفة أو الرتبة المشغولة عند تاريخ الترشح للمسابقة <b style="color:#F00">*</b>			
<div dir="ltr" class="input-group"><input type="text" class="form-control" name="nom_emploie" id="nom_emploie" oninput="changer_lettre(this.id)" value="<?php  echo $nom_emploie;?>" /> 
 <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="nom_emploie1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;" id="nom_emploie2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-briefcase" style="font-size:20px"></span></span>
</div>
</div><!--fin col-->
<div class="col-sm-6 col-sm-offset-0 pull-right">				
تاريخ أول تعيين <b style="color:#F00">*</b>		
<div dir="ltr" class="input-group"><input style="text-align:right"type="date" id="date_emploie_initial" class="form-control" name="date_emploie_initial"  value="<?php  echo $date_emploie_initial;?>" /> 
 <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="date_emploie_initial1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;" id="date_emploie_initial2"></span>
  <span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-calendar" style="font-size:20px"></span></span>
</div>
</div><!--fin col-->
</div><!--fin row-->

<div class="row">
<div class="col-sm-6 col-sm-offset-0 pull-right">			
تاريخ التعيين في  الرتبة أو المنصب المشغول حاليا <b style="color:#F00">*</b>			
<div dir="ltr" class="input-group"><input style="text-align:right"type="date" id="date_emploie_actuel" class="form-control" name="date_emploie_actuel" value="<?php  echo $date_emploie_actuel;?>" /> 
 <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="date_emploie_actuel1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;" id="date_emploie_actuel2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-calendar" style="font-size:20px"></span></span>
</div>
</div><!--fin col-->
<div class="col-sm-3 col-sm-offset-0 pull-right">			
الصنف <b style="color:#F00">*</b>		
<div dir="ltr" class="input-group"><input type="number" id="categorie" class="form-control" name="categorie"   style="text-align:right" value="<?php  echo $categorie;?>"/>
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="categorie1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;" id="categorie2"></span> 
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-level-up" style="font-size:20px"></span></span>
</div>
</div><!--fin col-->
<div class="col-sm-3 col-sm-offset-0 pull-right">                
الدرجة <b style="color:#F00">*</b>			
<div dir="ltr" class="input-group"><input type="number" id="degre" class="form-control" name="degre" value="<?php  echo $degre;?>" /> 
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="degre1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;" id="degre2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-level-up" style="font-size:20px"></span></span>
</div>
</div><!--fin col-->
</div><!--fin row-->			                       

</p>مرجع موافقة الإدارة المستخدمة للمشاركة في  المسابقة</p>

<div class="row">
<div class="col-sm-6 col-sm-offset-0 pull-right">
الرقم <b style="color:#F00">*</b>			
<div dir="ltr" class="input-group"><input type="number" id="numero_document" class="form-control" name="numero_document"  style="text-align:right" value="<?php  echo $numero_document;?>"/>
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="numero_document1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;" id="numero_document2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-file" style="font-size:20px"></span></span>
</div> 
</div><!--fin col-->
<div class="col-sm-6 col-sm-offset-0 pull-right">
التاريخ <b style="color:#F00">*</b>		
<div dir="ltr" class="input-group"><input type="date" id="date_document" class="form-control" name="date_document"    style="text-align:right" value="<?php  echo $date_document;?>" /> 
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="date_document1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;" id="date_document2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-calendar" style="font-size:20px"></span></span>
</div>
</div><!--fin col-->
</div><!--fin row-->

  <div class="row">
<div class="col-sm-6 col-sm-offset-0 pull-right">     	
صفة السلطة صاحبةالإمضاء <b style="color:#F00">*</b>			
<div dir="ltr" class="input-group"><input type="text" id="nature_signateur" class="form-control" name="nature_signateur"   oninput="changer_lettre(this.id)" value="<?php  echo $nature_signateur;?>" />
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="nature_signateur1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;" id="nature_signateur2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-university" style="font-size:20px"></span></span>
</div> 
</div><!-- fin col-->
<div class="col-sm-6 col-sm-offset-0 pull-right">
عنوان الإدارة <b style="color:#F00">*</b>			
<div dir="ltr" class="input-group"><input type="text" id="adresse_administration" class="form-control" name="adresse_administration" oninput="changer_lettre(this.id)" value="<?php  echo $adresse_administration;?>"/>
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="adresse_administration1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;" id="adresse_administration2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-street-view" style="font-size:20px"></span></span>
</div> 
</div><!--fin col-->
</div><!--fin row-->
<br>
<div class="row">
<div class="col-sm-4 col-sm-offset-0 pull-right">
الهاتف <b style="color:#F00">*</b>			
<div dir="ltr" class="input-group"><input type="number" id="telephone_administration" class="form-control" name="telephone_administration"  style="text-align:right" value="<?php  echo $telephone_administration;?>"/>
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="telephone_administration1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;" id="telephone_administration2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-phone" style="font-size:20px"></span></span>
</div> 
</div><!--fin col-->
<div class="col-sm-4 col-sm-offset-0 pull-right">
فاكس <b style="color:#F00">*</b>			
<div dir="ltr" class="input-group"><input type="number" id="fax_administration" class="form-control" name="fax_administration"  style="text-align:right" value="<?php  echo $fax_administration;?>" /> 
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="fax_administration1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;" id="fax_administration2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-fax" style="font-size:20px"></span></span>
</div>
</div><!--fin col-->
<div class="col-sm-4 col-sm-offset-0 ">
البريد الإلكتروني <b style="color:#F00">*</b>			
<div dir="ltr" class="input-group"><input type="mail" id="email_administration" class="form-control" name="email_administration"    style="text-align:right" value="<?php  echo $email_administration;?>" /> 
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="email_administration1"></span> <span class="glyphicon glyphicon-remove form-control-feedback "style="visibility:hidden;" id="email_administration2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-envelope" style="font-size:20px"></span></span>
</div>
</div><!--fin col-->
</div><!--fin row -->
</div>	
		<p></p>		                   
		<p style="color:#F00">ملاحظة:<strong> إذا كنت غير عامل حاليا أنقر على الزر <span style="background:#0CC ;color:#FFF" > غير معني </span> بالأسفل لتخطي المرحلة</strong></p>		 
          <br /><br />	                      
				                     
                              <button type="button" class="btn btn-previous"><b><span class="glyphicon glyphicon-chevron-right"></span>السابق</b></button>
				                 <button type="button" class="btn btn-forget"><b>غير معني<span class="glyphicon glyphicon-chevron-left"></span></b></button>
                               <button type="submit" class="btn btn-next"><b>التالي<span class="glyphicon glyphicon-chevron-left"></span></b></button>
			                    
                                  </div>
                                 </div>
                                
			                    </fieldset>  
		               	          
                     
                                             
   <!-- ////////////////partie final///////////    -->
       
		                      <fieldset>
                                <div class="col-sm-10 col-sm-offset-1 form-box" style="border:1px solid #99F;border-radius: 10px;"> 
                        	  <div class="form-top" style="background-color:#26A69A">
		                        		<div class="form-top-left">
		                        			<h3  style="color:#FFF">المرحلة الاخيرة</h3>
		                            		<p  style="color:#FFF;float:left">التعهد و تأكيد التسجيل<br> </p>
		                        		</div>
		                        		<div class="form-top-right">
		                        			<i class="fa fa-check"></i>
		                        		</div>
	                              </div>
                 
				     <div class="form-bottom">
                     
<!--<form action="image_zoom.php" enctype="multipart/form-data" method="post"> -->
<?php /*
$sql_doc_demmande="select * from document_demmande";
$result_doc=mysqli_query($connec,$sql_doc_demmande);
$i=0;
while ($row=mysqli_fetch_array($result_doc)){ 
if(($i%2)==1){
	echo "<div class='row'>";
}
echo "<div class='col-sm-6 col-sm-offset-0 pull-right'>";
$nom_img=$row['code'];
echo $row['nom_doc_demmande'];
echo "<div dir='ltr' class='input-group'><span class='input-group-addon ' style='width:100px;height:100px;padding:0px'  >
<img class='img-responcive' accept='image/gif, image/jpg, image/jpeg, image/png'   type='image' id='photo".$i."' src='http://placehold.it/180'  width='100' height='100' onMouseMove='show();' onMouseOut='hide()' onClick='affiche(this)'> </span> <input type='file' accept='image/gif, image/jpg, image/jpeg, image/png' id='".$nom_img."' name='".$nom_img."' class='form-control' onchange='readURL(this,\"photo".$i."\");' style='height:100px' />


</div>";

echo "</div>";
if(($i%2)==1){
	echo "</div>";
	
}
$i=$i+1;
}
	*/?>
   

 <!-- <div class="row">
<div class="col-sm-6 col-sm-offset-0 pull-right">
 الصورة الشخصية<div dir="ltr" class="input-group"><span class="input-group-addon " style="width:100px;height:100px;padding:0px"  ><img class="img-responcive" accept="image/gif, image/jpg, image/jpeg, image/png"   type="image" id="photo" src="http://placehold.it/180" alt="" width="100" height="100" onMouseMove="show();" onMouseOut="hide()" onClick="affiche(this)"> </span> <input type='file' accept="image/gif, image/jpg, image/jpeg, image/png" id="img1"name="img1" class="form-control" onchange="readURL(this,'photo');" style="height:100px" alt="hhhh" />
 <span  class="form-control-feedback fa fa-eye fa-2x bl1 " style="visibility:hidden;width:100px;height:70px;color:#0FF" id="prenom2"></span>

</div>
</div><!--fin col-->
<!--<div class="col-sm-6 col-sm-offset-0 ">
 الشهادة<div dir="ltr" class="input-group"><span class="input-group-addon " style="width:100px;height:100px;padding:0px"  ><img class="img-responcive" accept="image/gif, image/jpg, image/jpeg, image/png"   type="image" id="blah" src="http://placehold.it/180" alt="" width="100" height="100" onMouseMove="show();" onMouseOut="hide()" onClick="affiche(this)"> </span> <input type='file' accept="image/gif, image/jpg, image/jpeg, image/png" id="img1"name="img1" class="form-control" onchange="readURL(this,'blah');" style="height:100px" alt="hhhh" />
 <span  class="form-control-feedback fa fa-eye fa-2x bl1 " style="visibility:hidden;width:100px;height:70px;color:#0FF" id="prenom2"></span>

</div>
</div><!--fin col-->
<!--</div><!--fin row-->
<!--<br>
الخبرة<div dir="ltr" class="input-group">
<span class="input-group-addon " style="width:100px;height:100px;padding:0px"  ><img class="img-responcive"  id="myImg1" src="http://placehold.it/180" alt="خبرة مهنية" width="100" height="100" onMouseMove="show();" onMouseOut="hide()" onClick="affiche(this)"> </span> <input type='file' accept="image/gif, image/jpg, image/jpeg, image/png"  id="img2"name="img2" class="form-control" onchange="readURL(this,'myImg1');" style="height:100px" alt="خبرة مهنية" />
<span class="form-control-feedback fa fa-eye fa-2x bl2 "   style="visibility:hidden;width:100px;height:100px;color:#0fF" id="prenom2"></span>	
 
</div>


 بطاقة التعريف الوطنية<div dir="ltr" class="input-group"><span class="input-group-addon " style="width:100px;height:100px;padding:0px"  ><img class="img-responcive" accept="image/gif, image/jpg, image/jpeg, image/png"   type="image" id="carte" src="http://placehold.it/180" alt="" width="100" height="100" onMouseMove="show();" onMouseOut="hide()" onClick="affiche(this)"> </span> <input type='file' accept="image/gif, image/jpg, image/jpeg, image/png" id="carte_natio"name="carte" class="form-control" onchange="readURL(this,'carte');" style="height:100px" alt="hhhh" />
 <span  class="form-control-feedback fa fa-eye fa-2x bl1 " style="visibility:hidden;width:100px;height:70px;color:#0FF" id="prenom2"></span>

</div>
<br>
كشف النقاط<div dir="ltr" class="input-group">
<span class="input-group-addon " style="width:100px;height:100px;padding:0px"  ><img class="img-responcive"  id="releve" src="http://placehold.it/180" alt="خبرة مهنية" width="100" height="100" onMouseMove="show();" onMouseOut="hide()" onClick="affiche(this)"> </span> <input type='file' accept="image/gif, image/jpg, image/jpeg, image/png"  id="img2"name="img2" class="form-control" onchange="readURL(this,'releve');" style="height:100px" alt="كشف النقاط" />
<span class="form-control-feedback fa fa-eye fa-2x bl2 "   style="visibility:hidden;width:100px;height:100px;color:#0fF" id="prenom2"></span>	
 
</div>


<!--</form> -->
    <br />    <br />                   
     <div class="" style="color:#F60;font-size:18px;border:">
   <p > <input style="height:20px;width:30px;color:#F00"  type="checkbox" nom="delare_honeur" class="btn btn-info" value="أصرح" required  oninvalid="this.setCustomValidity('يجب التعهد قبل التسجيل')" onchange="setCustomValidity('');"/>   أصرح بشرفي  بصحة المعلومات المبينة في  هذه الوثيقة وأتحمل كل تبعات 
عدم صحة أو دقة المعلومات بما في  ذلك إلغاء نجاحي ي  المسابقة</p>
    
     </div>                
       <br /><br />              
          
<center><div style="color:#900"><p style="color:#F00"> أكتب حاصل العملية الحسابية التالية</p><input id="captcha" style="background:#eee;border:0px;text-align:center;color:#900;width:50px"  readonly="readonly">+<input id="captcha1" style="background:#eee;border:0px;text-align:center;color:#900;width:50px"  readonly="readonly">=<br /><input id="result_captcha" type="number" onblur='verif_log()' required/>  </div></center>
</div>

	
		<p></p>		                   
		<p></p>		 
                          
                  
                 
                                 
				                          <button type="button" class="btn btn-previous"><b><span class="glyphicon glyphicon-chevron-right"></span>السابق</b></button>
                              
				              <button   type="submit" class="btn btn-envoi" name="btn_envoi "  id="btn_valid" onclick="return verif_log()" oninvalid="this.setCustomValidity('يجب التعهد قبل التسجيل')"><b> التحديث<span class="glyphicon glyphicon-ok"></span></b></button>
                   </div>
               
        
              
			                    </fieldset>  
                                
     
          
              
		 
	                  </form>
   
                      
                    </div>
                     
                </div>
</div>
    </div>        
       
        

                            
        <!-- Javascript -->
       
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
       
 
<!-- Modal HTML -->
<div id="myModal" class="modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg " role="dialog" >
        <div class="modal-content">
            <div class="modal-header">
               
            </div>
            <div class="modal-body">
               <div id="divmodal">
                <p id="supr_ln"> سيتم حذف السطر الاخير</p>
                <p id="change_lag">رجاءا اختارا اللغة العربية </p>
               </div>
             

   
              
            <div class="modal-footer">
     <center>            
           <button type="submit" id='deletoui' class="btn btn-default" data-dismiss="modal">نعم</button>  
            <button type="submit" id='deletoui1' class="btn btn-default" data-dismiss="modal">نعم</button>  
             <button type="submit" id='deletoui2' class="btn btn-default" data-dismiss="modal">نعم</button>  
           <button type="submit" id='langok' class="btn btn-default" data-dismiss="modal">حسنا</button>  
          
               <button type="submit" id='deletnon' class="btn btn-default" data-dismiss="modal">لا</button>   
               </center>
            </div>
        </div>
    </div>
</div>
</div>

 <!-- The Modal document scanner -->
</p>
<div id="modal_apercu" class="modal" role="dialog">
<span  class="close" style="color:#F00" >&times;</span>
                   
  <img class="modal-content" id="img01">
     
      
  <div id="caption"></div>
</div>
</div>
<br>
</body>

</html>