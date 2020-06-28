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
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { 
		 $id = $_GET['id'];
		 $edit =  Filiere::trouve_par_id($id);
	 } elseif ( (isset($_POST['id'])) &&(is_numeric($_POST['id'])) ) { 
		 $id = $_POST['id'];
		 $edit =  Filiere::trouve_par_id($id);
	 } else { 
			$msg_error = '<p class="error">Cette page a été consultée par erreur</p>';
		} 
		
	if(isset($_POST['submit'])){
		$errors = array();
		
	
		
		
	// new object document
	
	$edit->Nom_filiere = htmlentities(trim($_POST['Nom_filiere']));
	

	

	
	
	
 	$msg_positif= '';
 	$msg_error= '';
	if (empty($errors)){
					

 		if ($edit->save()){
		$msg_positif .= '<p style= "font-size: 20px; ">   بنجاح "  ' . html_entity_decode($edit->Nom_filiere) . ' "  تم تحديـــث   </p><br />';
		}else{
		$msg_error .= "<h1>!!! خطأ في البرنـــامج </h1>
                  <p class=\"error\" style= \"font-size: 20px; \" >   ! من فضلك أعد التحديــث من جديـــد  <br/> !!  لم يتم التحديــث بنجاح نظراً لخطأ غير معين ، نحن نتأسف عن هذا الخطأ </p>";
		}
 		
 		}else{
		// errors occurred
		$msg_error = '<h1>!!!خطأ </h1>';
	    foreach ($errors as $msg) { // Print each error.
	    	$msg_error .= " $msg\n";
	    }
	    $msg_error .= '</p>';	  
		}
	
}

?>
<?php
$titre = "تحديث الشعبة";
$active_menu = "index";
$header = array('filiere');
if ($user->type =='administrateur' or 'sous-directeur' or 'gestionnaire' or 'agent'){
	require_once("composit/header.php");
}
?>
        

                 
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
					  <li><a href="index.php">الصفحة الرئيسية</a></li>  
					  <li class="active"><?php echo $titre ?></li>  
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2> تحديث الشعبة <span class="fa fa-plus-square"></span> </h2>
					<a href="ajouter_filiere.php"><button type="button" class="btn btn-success "> رجــوع </button></a>
                </div>   
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap"  style = "text-align: right;">
                 <div class="row">
                        <div class="col-md-2">
						</div>
                        <div class="col-md-10">
                            
                            <form class="form-horizontal" role="form"  name="edit_filiere" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   
                                    <ul class="panel-controls">
                                        <li> <h3 class="panel-title"><strong> المعلــومــات الخــاصة بالشعبة</strong></h3></li>
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
                                   
                                  
                                   
									
                                    <div class="form-group" style ="dir:rtl;" >
                                        <div class="col-md-6 col-xs-12">   
										
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-briefcase"></span></span>
                                                <input type="text" name ="Nom_filiere" class="form-control" required  style= "text-align:right;" value = "<?php echo $edit->Nom_filiere;?>" />
                                            </div>                                            
                                        </div>
                                        <label class="col-md-3 col-xs-12 control-label">(*)إسم الشعبة</label>
                                    </div>
                                    
                                   
									
									  
									
                                  
                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-default pull-right" type = "reset">مسح جميــع الخــانات</button> 
                                    <button class="btn btn-info pull-left" type = "submit" name = "submit">تحديـــث</button> 
										<?php echo '<input type="hidden" name="id" value="' .$id . '" />';?>
                                    
                                </div>
                            </div>
                            </form>
                            
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
        
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-datepicker.js"></script>                
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
        <!-- END THIS PAGE PLUGINS -->       
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE -->
			
    <!-- END SCRIPTS -->           
    </body>
</html>






