<?php
@session_start();
require_once("connection.php");	


//Create a new PHPMailer instance


	$nbr=0;
$connec=mysqli_connect($_SESSION['page'][0],$_SESSION['page'][1],$_SESSION['page'][2]) or die('Connexion impossible : ' . mysqli_error());
mysqli_query ($connec,'SET NAMES \'UTF8\'');

$db=mysqli_select_db($connec,$_SESSION['page'][3]) or die('Connexion impossible : ' . mysqli_error());



//creation de la valeur de l'atribut "code"

  ?>
  <h3 style="color:#FFF"> <strong><?php 
$quer="select * from etablissement";
$resul=mysqli_query($connec,$quer);	
$nom_etab="";
while ($row=mysqli_fetch_array($resul)){
	$nom_etab=$row['Nom_etab_ar'];
echo "". $row['Nom_etab_fr'].'   <br>    '.$row['Nom_etab_ar'];
}
 ?>

 </strong></h3>
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
		
		 </script>
        <script>
	   $(document).ready(function(){
		  $('#pasword0').on('click', function() {
			 
			  if($('#pasword').attr('type')=='password'){	 
		    $('#pasword').attr('type', 'text');
			 $('#pasword_valid').attr('type', 'text');
			      $('#pasword0').text('إخفاء');
		
			   

			
  $('#pasword0').removeClass("glyphicon-eye-open");
   $('#pasword0').addClass("glyphicon-eye-close");
			  }
			  else{
				  	  if($('#pasword').attr('type')=='text'){
				$('#pasword').attr('type', 'password');
				$('#pasword_valid').attr('type', 'password');
  $('#pasword0').removeClass("glyphicon-eye-close");
   $('#pasword0').addClass("glyphicon-eye-open");  
	   $('#pasword0').text('عرض');
			  }
			  }
		  })
	
		   function  affiche_pass(){
		document.getElementById("pasword").type = 'text';
		//  document.getElementById('hybrid').type = 'password';	
		}
	$.backstretch("assets/img/backgrounds/1.jpg"); 
	
	$('#user').on('input', function() {	
  // $(this).val().replace('a','b');
   var txt = $(this).val();
$(this).val(txt.replace(' ', ''));
  // alert($(this).val());
    
       });
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
	function empeche_car_special(event){
	
        if(!event && window.event) {
		event=window.event;
		
	}
	// IE
	if( (event.keyCode == 232 ) || (event.keyCode == 249 ) || (event.keyCode == 224 ) || (event.keyCode == 233 ) || (event.keyCode >= 33 && event.KeyCode <=44) || (event.keyCode >= 58 && event.KeyCode <=63) || (event.keyCode >= 92 && event.KeyCode <=95) || (event.keyCode >= 123 && event.KeyCode <=126)|| event.keyCode ==94|| event.keyCode ==176|| event.keyCode ==178|| event.keyCode ==47|| event.keyCode ==91|| event.keyCode ==167|| event.keyCode ==231|| event.keyCode ==1567) {
		event.returnValue = false;
		event.cancelBubble = true;
	}
	// DOM
	if((event.which == 232) || (event.which == 249) || (event.which == 224) || (event.which == 233) ||(event.which >= 33 && event.which <=44) || (event.which >= 58 && event.which <=63) || (event.which >= 92 && event.which <=95) || (event.which >= 123 && event.which <=126)) {
		event.preventDefault();
		event.stopPropagation();
	}
    
	}
	
	
	function verif_log(){

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

<form  name="form1"   action="index1.php" class="registration-form" id="buttonGroupForm"  method="post">
<fieldset>
 <div class="col-sm-4 col-sm-offset-4 form-box" style="border:1px solid #99F;border-radius: 10px;">
                               
            
		                        	<div class="form-top" style="background-color:#26A69A">
                                    
		                        		<div class="form-top-left">
		                        			<h3  style="color:#FFF">فتح حساب </h3>
		                            		<p style="color:#FFF"> للتسجيل في المسابقة</p>
		                        		</div>
		                        		<div class="form-top-right">
		                        			<i class="fa fa-user"></i>
		                        		</div>
		                            </div>
                                    
                           
                           
                                    
		                            <div class="form-bottom">
    	<div dir="rtl" class="form-group ">

<div  <?php if(isset($_SESSION['inscri_er'])) echo "class='alert alert-danger alert-dismissible'"; ?>  style="color:#F00; float:right;" id='error'><?php if(isset($_SESSION['inscri_er'])) echo $_SESSION['inscri_er']; unset($_SESSION['inscri_er']);?></div>
<div class="row">
<div class="col-sm-6 col-sm-offset-0 pull-right">
اللقب <b style="color:#F00;padding-bottom:-5px">*</b>    <div  dir="ltr" class="input-group ">  
                 
<input  type="text"  id="nom" class="form-control keyboardInput "   name="nom"  oninvalid="this.setCustomValidity('حقل إجباري')" oninput="setCustomValidity('');changer_lettre(this.id)" placeholder=" بالعربية"  required   /> <span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="nom1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="nom2"></span> <span class="input-group-addon glyphicon glyphicon-user" style="background-color:#000;color:#FFF;" ></span>
</div>
</div><!--fin div col06-offset-0-->

<div class="col-sm-6 col-sm-offset-0 pull-right">                    		        
الاسم <b style="color:#F00">*</b><div dir="ltr" class="input-group ">  <input type="text" id="prenom"  class="form-control keyboardInput" name="prenom"  oninvalid="this.setCustomValidity('حقل إجباري')" placeholder=" بالعربية"oninput="setCustomValidity('');changer_lettre(this.id)" required />		
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="prenom1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="prenom2"></span>
<span class="input-group-addon glyphicon glyphicon-user" style="background-color:#000;color:#FFF;border-bottom-width: 15px #eee" ></span>
</div>	
</div><!--fin div col06-offset-0-->

<div class="col-sm-12 col-sm-offset-0 pull-right" >
اختر اسم المستخدم <b style="color:#F00">*</b> <div dir="ltr" class="input-group" ><input type="text" class="form-control" name="user" id="user" oninvalid="this.setCustomValidity('اسم المستخدم اجباري')" style="direction:ltr;text-align:right" oninput="setCustomValidity('');changer_lettre_fr(this.id);" onpaste="return false;" onkeypress="return empeche_car_special(event)" placeholder="user021989 :مثل" required />
<span  class="glyphicon glyphicon-ok form-control-sucsses form-control-feedback pull-left" style="visibility:hidden;"  id="email1"></span> <span class="glyphicon glyphicon-remove form-control-feedback " style="visibility:hidden" id="email2"></span>
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-user" style="font-size:20px"></span></span>
</div>
</div><!--fin col 6offset0-->
</div><!-- fin div class row-->
<div class="row">
<div class="col-sm-12 col-sm-offset-0 pull-right">		
كلمة السر <b style="color:#F00">*</b>		
<div dir="ltr" class="input-group"><input style="text-align:right"type="password" id="pasword" class="form-control" name="pasword"  oninvalid="this.setCustomValidity('حقل إجباري')"  required/> 

<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-lock" style="font-size:20px"></span></span>
</div><label  class="glyphicon glyphicon-eye-open  pull-left"  style="margin-top:0px;color:#03C;font-size:16px;direction:ltr!important"  id="pasword0">عرض</label>



تأكيد كلمة السر <b style="color:#F00">*</b>		
<div dir="ltr" class="input-group"><input style="text-align:right"type="password" id="pasword_valid" class="form-control" name="pasword_valid"  oninvalid="this.setCustomValidity('حقل إجباري')" oninput="setCustomValidity('')"  required/> 
<span class="input-group-addon " style="background-color:#000;color:#FFF" ><span class="fa fa-lock" style="font-size:20px"></span></span>
</div>
</div><!--fin col 6offset0-->
</div><!-- fin row-->

<div dir="rtl">                    		                      <button type="SUBMIT" class="btn btn_mail"  name="btn_nvt" id="btn_etap1" onClick="return verif_log()" ><b>التسجيل</b> <span class="glyphicon glyphicon-send"></span></button>
<a href="entre.php" style="float:left!important;margin-top:10px" >  <u >أنا مسجل لدي حســـاب  </u></a>
                    </div>



          
<?php
if(isset($_POST['btn_nvt'])){
    
	$query="select * from compte where email='".$_POST["email"]."'";
	   $email=null;

$result=mysqli_query($connec,$query);

	  $code= mysqli_num_rows($result);
	
	  
	   
//while ($row=mysqli_fetch_array($result)){ 
//if(!empty(mysqli_fetch_array($result1))){
//echo "ici";	
//$email=	$row['email'];

if($code==1){
echo "<script> alert('  اسم المستخدم: ".$_POST["email"]." مسجل مسبقا  '); document.getElementById('error').innerHTML = '  اسم المستخدم  ".$_POST["email"]."  مسجل مسبقا  ';document.getElementById('error').style.backgroundColor =\"rgb(255,0,0,0.2)\";</script>";

}
else{
  $query1="select * from compte";


$result1=mysqli_query($connec,$query1);

	  $id= mysqli_num_rows($result1);
 
 //----------------------------------


                 

  ++$id;
	  $id=$id+32516;		
				try{
	
$sql1 = 'INSERT INTO compte  VALUES ("'.$_POST['email'].'", "'.$_POST['nom'].'", "'.$_POST['prenom'].'", "'.$_POST['pasword'].'", "'.$_POST["email"].":".$id.'","non")';

mysqli_query($connec,$sql1) or die ('Erreur SQL !'.'<br />'.mysqli_error($connec));
//$_SESSION['email']=$_POST['email'];
//$_SESSION['pasword']=$_POST['pasword'];
header("Location: index1.php");

}catch (SQLException $e){
echo $e;	
}

					
		
 
}
}

?> 
</div></div> <br /></div></fieldset></form>
</body>
</html>