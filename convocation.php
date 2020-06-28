 <?php

include("connection.php");	
	

	$nbr=0;
$connec=mysqli_connect($_SESSION['page'][0],$_SESSION['page'][1],$_SESSION['page'][2]) or die('Connexion impossible : ' . mysqli_error());
mysqli_query ($connec,'SET NAMES \'UTF8\'');

$db=mysqli_select_db($connec,$_SESSION['page'][3]) or die('Connexion impossible : ' . mysqli_error());

 if(isset($_POST['btn_nvt'])){
    
	
}

//creation de la valeur de l'atribut "code"

  ?>
  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl" >

<head>

     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>الإستدعاء</title>

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

 <style type="text/css">
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

<br /> 
    
 <h3 style="color:#FFF"><strong><?php 
$quer="select * from etablissement";
$resul=mysqli_query($connec,$quer);	
while ($row=mysqli_fetch_array($resul)){
echo $row['Nom_etab_fr'].'<br>'.$row['Nom_etab_ar'];
}
 ?></strong></h3>
 <br /> 
<form  name="form1"   action="redirect.php" class="registration-form" id="buttonGroupForm"  method="post">

<fieldset>
                                   <div class="col-sm-4 col-sm-offset-4 form-box" style="border:1px solid #99F;border-radius: 10px;">   

                          
                               
            
		                        	<div class="form-top" style="background-color:#26A69A">
                                    
		                        		<div class="form-top-left">
		                        		<center>	<h3  style="color:#FFF">تسجيـــــل الدخول لإستخراج الاستدعاء </h3></center>
		                         
		                        		</div>
		                        		<div class="form-top-right">
		                        			<i class="fa fa-user"></i>
		                        		</div>
		                            </div>
                                    
                           
                           
                                    
		                            <div class="form-bottom">


           	<div dir="rtl" class="form-group ">
            

<div style="color:#F00">
<?php @session_start(); if(isset($_SESSION['login_er_conv'])){  echo  $_SESSION['login_er_conv'];  unset($_SESSION['login_er_conv']);}?></div>
<div class="row">
<div class="col-sm-12 col-sm-offset-0 pull-right">
عنوان البريد الاليكتروني <b style="color:#F00">*</b> <div dir="ltr" class="input-group"><input type="email" class="form-control" name="email" id="email" oninvalid="this.setCustomValidity('الرجاء ادخال بريد اليكتروني صحيح')" style="direction:ltr;text-align:right" oninput="setCustomValidity('');"  placeholder="exemple@mail.com"required/>
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="email1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="email2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-envelope" style="font-size:20px"></span></span>
</div>
</div>
<div class="col-sm-12 col-sm-offset-0 pull-right">		
كلمة السر <b style="color:#F00">*</b>		
<div dir="ltr" class="input-group"><input style="text-align:right"type="password" id="pasword" class="form-control" name="pasword"  oninvalid="this.setCustomValidity('حقل إجباري')" oninput="setCustomValidity('')" required/> 
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-lock" style="font-size:20px"></span></span>
</div>


<div dir="rtl">                    		                      <center>  <button type="SUBMIT" class="btn btn-lg btn_mail"   name="btn_nvt" id="btn_etap1" onclick="return verif_log()" ><b>   دخــــول  &nbsp;&nbsp;    <span class="glyphicon glyphicon-log-in"></span></b> </button></center>
<br />

<div ><u><a href="mail.php"> نسيت كلمة السر</a></u></div>
<br />
                  </div>



</div><br /></div>
  </div>    </div>  <br /></div>
 
   </div>
 </fieldset>

 </form>

</body>
</html>