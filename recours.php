<?php

require_once("connection.php");	
	

	$nbr=0;
$connec=mysqli_connect($_SESSION['page'][0],$_SESSION['page'][1],$_SESSION['page'][2]) or die('Connexion impossible : ' . mysqli_error());
mysqli_query ($connec,'SET NAMES \'UTF8\'');

$db=mysqli_select_db($connec,$_SESSION['page'][3]) or die('Connexion impossible : ' . mysqli_error());


  ?>
   <h3 style="color:#FFF"><strong><?php 
$quer="select * from etablissement";
$resul=mysqli_query($connec,$quer);	
$nom_etab="";
while ($row=mysqli_fetch_array($resul)){
	$nom_etab=$row['Nom_etab_ar'];
echo $row['Nom_etab_fr'].'<br>'.$row['Nom_etab_ar'];
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
         <script src="assets/bootstrap/js/bootstrap-filestyle-2.1.0/src/bootstrap-filestyle.min.js"></script>
    <script>
	
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
 });

	</script>     

 <style type="text/css">
 .inputfile {
	width: 0.1px;
	height: 0.1px;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}
	.input-group-addon{
		height:48px;
		border-bottom-width:15px;
		border-color:#eee;
		border-raduis:5px;
		
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
	color:#666;
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
#test{
    animation: Test 1s infinite;
	
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
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}

    </style>
    
    <script>
	function verif_log(){
var email=form1.email.value;
var password=form1.pasword.value;


	if(form1.pasword.value!=form1.pasword_valid.value){
		alert("كلمتا السر مختلفتان");
		form1.pasword_valid.style.backgroundColor="#FF0000";
	
	return false;	
	}
	else{
		return true;
	}
	}
	</script>
</head>

<body>
<?php 


 if(isset($_POST['btn_nvt'])){

//}  
	
}

//creation de la valeur de l'atribut "code"
?>
<?php  
 @session_start();
if(isset($_SESSION['email1'])){
$code=$_SESSION['email1'];

$req="select * from dossier_accept where code='".$code."'";
$resul=mysqli_query($connec,$req);	
$cause="";
while ($row=mysqli_fetch_array($resul)){
	$cause=$row['cause'];
echo "<div class=\"row\"><div  class=\"alert alert-danger col-sm-8 col-sm-offset-2\">\n<u> ملفك مرفوض بسبب:</u>\n<p  style=\"font-size:24px;color:#f00\">".$cause."</p></div></div>";
}


?>
<br /><br />
<fieldset >
                                         <div class="col-sm-6 col-sm-offset-3 form-box" style="border:1px solid #99F;border-radius: 10px;">
                               
            
		                        	<div class="form-top" style="background-color:#26A69A">
                                    
		                        		<div class="form-top-left">
		                        		<center>	<h3  style="color:#FFF">إرســـــال طعـــــن </h3></center>
		                         
		                        		</div>
		                        		<div class="form-top-right">
		                        			<i class="fa fa-comment"></i>
		                        		</div>
		                            </div>
                                    
                           
                           
                                    
		                            <div class="form-bottom">

<form  name="form1" role="form"  action="save_recours.php?code=<?php echo $code?>" class="registration-form" id="buttonGroupForm"  method="post" enctype="multipart/form-data"  accept-charset="utf8_unicode_ci" >
<div class="row">
<div style="color:#F00">
<?php @session_start(); if(isset($_SESSION['login_er'])){  echo  $_SESSION['login_er'];  unset($_SESSION['login_er']);}?></div>

المحتوى <b style="color:#F00">*</b><div dir="ltr" class="text"><textarea  class="form-control keyboardInput" name="message" id="message" oninvalid="this.setCustomValidity('الرجاء ادخال محتوى الطعن')" style="direction:ltr;text-align:right;direction:rtl;  height:150px;font-size:24px;font-weight:bold;color:#000" oninput="setCustomValidity(''); changer_lettre(this.id)" required></textarea>


</div><!--fin col 6offset0-->
</div><!-- fin div class row-->
<br />
<div class="row">
<div class="col-sm-12 col-sm-offset-0 pull-right">		
نسخة من مادة قانونية او مقرر رسمي (<b style="color:#F00">اذا توفرت)</b>		

</div>
</div>


<div dir='ltr' class='input-group'><span class='input-group-addon ' style='width:100px;height:100px;padding:0px'  >
<img class='img-responcive' accept='image/gif, image/jpg, image/jpeg, image/png'   type='image' id='photo' src='http://placehold.it/180'  width='100' height='100' onMouseMove='show();' onMouseOut='hide();' onClick='affiche(this)'> </span><label for="photo"></label> <input type='file' accept='image/*' id="photo1" name='photo' class="filestyle" style="height:100px;background-color:#06F" onchange='readURL(this,"photo");' />


</div>

<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/ratchet/2.0.2/css/ratchet.css" rel="stylesheet"/>-->

				
		<script type="text/javascript" src="assets/bootstrap/js/bootstrap-filestyle-2.1.0/src/bootstrap-filestyle.min.js"></script>
        <script>
		
			$('#photo1').filestyle({
				text : 'تحميل الصورة'
			});
		</script>

<div dir="rtl">                    		 <center>  <button type="submit" class="btn btn-lg btn_mail"   name="btn_nvt" id="btn_etap1" onClick="" ><b>  إرســــال  &nbsp;&nbsp;    <span class="glyphicon glyphicon-send"></span></b> </button></center>
<br />

      </div>

</form>
</div><br /></div></fieldset>
    <div id="modal_apercu" class="modal" role="dialog">
<span  class="close" style="color:#F00" >&times;</span>
                   
  <img class="modal-content" id="img01">
     
      
  <div id="caption"></div>
</div>
</div>      
<?php  } ?>
</body>
</html>
