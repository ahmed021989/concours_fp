<?php
require_once("includes/initialiser.php");
if(!$session->is_logged_in()) {

	readresser_a("login.php");

}else{
	$user = Personne::trouve_par_id($session->id_utilisateur);
	$accestype = array('administrateur' or 'sous-directeur' or 'gestionnaire' or 'agent');
	if( !in_array($user->type,$accestype)){ 
		//contenir_composition_template('simple_header.php'); 
		$msg_system ="vous n'avez pas le droit d'accéder a cette page <br/><img src='../images/AccessDenied.jpg' alt='Angry face' />";
		echo system_message($msg_system);
		// contenir_composition_template('simple_footer.php');
		exit();
	} 
}
?>

<?php
$titre = "إعدادات المؤسسة";
$active_menu = "index";
$header = array('etablissement');
if ($user->type =='administrateur' or 'sous-directeur' or 'gestionnaire' or 'agent'){
	require_once("composit/header.php");
}
else {
	readresser_a("profile_utils.php");
	 $personnes = Personne::not_admin();
}
?>
<?php 
			
		if(isset($_POST['submit'])){
			
			if(!empty($_FILES)){
		
	try{
	
	
//var_dump($_FILES['photo']);
$fichier=$_FILES['photo']['name'];
		
$fichier_tmp=$_FILES['photo']['tmp_name'];
$fich_exten=strchr($fichier,'.');
$dest='../logo.png';

    if( move_uploaded_file($fichier_tmp,$dest)){
		echo "<script>alert('تم تغيير شعار المؤسسة');window.load();</script>";
	}
	
	
	$fichier=$_FILES['photo2']['name'];
		
$fichier_tmp=$_FILES['photo2']['tmp_name'];
$fich_exten=strchr($fichier,'.');
$dest='../sauvgarde/pdf/images/logo.JPG';

    if( move_uploaded_file($fichier_tmp,$dest)){
		echo "<script>alert('تم تغيير الختم');window.load();</script>";
	}
	
	}

			catch (SQLException $e){
echo $e;	
}
			}
				
			}
		?>
     
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
					  <li><a href="index.php">الصفحة الرئيسية</a></li>  
					  <li class="active"><?php echo $titre ?></li>  
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2>إعدادات الختم و الشعار المؤسسة <span class="fa fa-cogs"></span> </h2>
                </div>   
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap"  style = "text-align: right;">
                 <div class="row">
                        <div class="col-md-2">
						</div>
                        <div class="col-md-10"> 
						
							
								
								
								 <form class="form-horizontal" role="form"  name="ajout_admin" action="<?php echo $_SERVER['PHP_SELF']?>"method="post" enctype="multipart/form-data"  accept-charset="utf8_unicode_ci" >
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   
                                    <ul class="panel-controls">
                                        <li> <h3 class="panel-title"><strong>المعلومات الخاصة بالختم و الشعار بالمؤسسة</strong></h3></li>
                                    </ul>
                                </div>
                                <div class="panel-body">
                                <?php 
										if (!empty($msg_error)){
											echo error_message($msg_error); 
										}elseif(!empty($msg_positif)){ 
											echo positif_message($msg_positif);	
										}elseif(!empty($msg_system)){ 
											echo system_message($msg_system);
										} ?>
										
                                <div class="panel-body">  

                                    
								    
								
                                    
                                   
                                   
                                   
                                   <div class="row">


<div> شعار المؤسسة </div>

<div dir='ltr' class='input-group'><span class='input-group-addon ' style='width:100px;height:100px;padding:0px'  >
<img class='img-responcive' accept='image/gif, image/jpg, image/jpeg, image/png'   type='image' id='photo' src='../logo.png?time=<?php echo time(); ?>" '  width='100' height='100' onMouseMove='show();' onMouseOut='hide();' onClick='affiche(this)'> </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="photo"> </label> <input  type='file' accept='image/*' id="photo1" name='photo' style="height:100px;" class="filestyle" data-buttonText="تحميل" data-classButton="btn btn-primary" data-input="false" data-icon="false" onchange='readURL(this,"photo");' />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


</div>




<div>الختم</div>
<div dir='ltr' class='input-group'><span class='input-group-addon ' style='width:100px;height:100px;padding:0px'  >
<img class='img-responcive' accept='image/gif, image/jpg, image/jpeg, image/png'   type='image' id='photo01' src='../sauvgarde/pdf/images/logo.JPG?time=<?php echo time(); ?>" '  width='100' height='100' onMouseMove='show();' onMouseOut='hide();' onClick='affiche(this)'> </span><label for="photo2"></label> <input type='file' accept='image/*' id="photo2" name='photo2' class="filestyle" data-buttonText="تحميل" data-classButton="btn btn-primary" data-input="false" data-icon="false" style="height:100px;background-color:#06F;color:#000" onchange='readURL(this,"photo01");' />


</div>

</div>

                                    
                                  
									
                                  
                          
                                <div class="panel-footer">
                                
                                 
                                   
                                   <button type="submit" name="submit" class="btn btn-success pull-left "> تعديــل </button>
                                </div>
                                    
                                </div>
                            </div>
                            </form>
							
								<?php
							
								?>	
								
								
								   
								
								
								
								
                        </div>
                    </div>                    
                    
             
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

       <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout" dir ="ltr" >
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span></span> تسجيل <strong> الخروج </strong> ؟ </div>
					 <div class="pull-right">
                        <p><h3 class="text-muted" style = "text-align :right;">هل أنت متأكد أنك تريد تسجيل الخروج ؟</h3></p>                    
                        <p><h3 class="text-muted">اضغط لا إذا كنت ترغب في الاستمرار في العمل. اضغط نعم لخروج المستخدم الحالي</h3></p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-left">
                            <a href="logout.php" class="btn btn-success btn-lg">نعم</a>
                            <button class="btn btn-default btn-lg mb-control-close">لا</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>                
        <!-- END PLUGINS -->
        
        <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
             <script type="text/javascript" src="js/demo_tables.js"></script>   
			  <script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>    
        <!-- END THIS PAGE PLUGINS-->        
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-datepicker.js"></script>                
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
		  <script type='text/javascript' src='js/plugins/maskedinput/jquery.maskedinput.min.js'></script>
        <!-- END THIS PAGE PLUGINS -->       
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>
        
        
        
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
function hida(){
var modal = document.getElementById('modal_apercu');
   modal.style.display = "none";
	 $('#img1').css('visibility','visible');
	$('#img2').css('visibility','visible');
// When the user clicks on <span> (x), close the modal

}
</script>    
 
        
              <script type="text/javascript" src="../assets/js/bootstrap-filestyle.min.js"></script>
        
        
        
        
        
        
        
        <!-- MODAL APERCU-->
         
 <div class="modal "  id="modal_apercu" dir ="ltr" style="background:rgba(1,1,1,0.9);" >
         <div class="modal-dialog scroll" >
 
<button id="ferm"  style="color:#F00; float:right;background:none;border:none;font-size:24px;font-weight:bold"  onclick="hida()">X</button>
 <br /> 
<div class="scrollable">
             
  <img id="img01" class="img-thumbnail" alt="sddsd" style="height:635px" >
    </div>
      
  <div id="caption" style="color:#F00"></div>
</div>
</div>
<!--FIN MODAL APERCU-->   
        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->           
    </body>
</html>






