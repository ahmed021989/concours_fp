<?php
require_once("includes/initialiser.php");
if(!$session->is_logged_in()) {

	readresser_a("login.php");

}else{
	$user = Personne::trouve_par_id($session->id_utilisateur);
	$accestype = array('administrateur' or 'sous-directeur' or 'gestionnaire' or 'agent');
	if( !in_array($user->type,$accestype)){ 
		//contenir_composition_template('simple_header.php'); 
		$msg_system ="vous n'avez pas le droit d'accéder a cette page <br/><img src='../imag/access denied.png' alt='Angry face' />";
		echo system_message($msg_system);
		// contenir_composition_template('simple_footer.php');
		exit();
	} 
}
?>
<?php
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { 
		 $id = $_GET['id'];
		 $edit =  Etablissement::trouve_par_id($id);
	 } elseif ( (isset($_POST['id'])) &&(is_numeric($_POST['id'])) ) { 
		 $id = $_POST['id'];
		 $edit =  Etablissement::trouve_par_id($id);
	 } else { 
			$msg_error = '<p class="error">Cette page a été consultée par erreur</p>';
		} 
		
	if(isset($_POST['submit'])){
		$errors = array();
		
			
	// verification de données 

		
		
	// new object document
	
	
	
	$edit->Nom_etab_fr = htmlentities(trim($_POST['Nom_etab_fr']));
	$edit->Nom_etab_ar = htmlentities(trim($_POST['Nom_etab_ar']));
	$edit->Nom_direc_ar = htmlentities(trim($_POST['Nom_direc_ar']));
	$edit->Nom_direc_fr = htmlentities(trim($_POST['Nom_direc_fr']));
		$edit->excercice = htmlentities(trim($_POST['excercice']));
	$edit->Add_etab_fr = htmlentities(trim($_POST['Add_etab_fr']));
	$edit->Add_etab_ar = htmlentities(trim($_POST['Add_etab_ar']));
	$edit->Num_tele_01 = htmlentities(trim($_POST['Num_tele_01']));
	$edit->Num_tele_02 = htmlentities(trim($_POST['Num_tele_02']));
	$edit->Num_fax = htmlentities(trim($_POST['Num_fax']));
	$edit->Add_mail_etab = htmlentities(trim($_POST['Add_mail_etab']));
	

 	$msg_positif= '';
 	$msg_error= '';
	$msg_system= '';
	if (empty($errors)){
					

 		if ($edit->save()){
		$msg_positif .= '<p style= "font-size: 20px; ">  تم تحديـــث   "  ' . html_entity_decode($edit->Nom_etab_ar) . ' "  بنجاح  </p><br />';
		}else{
		$msg_error .= "<h1>! خطأ في البرنـــامج </h1>
                  <p class=\"error\" style= \"font-size: 20px; \" >   ! من فضلك أعد التحديــث من جديـــد  <br/> !!لم يتم التحديــث بنجاح نظراً لخطأ غير معين ، عدم اجراء أي تحديث</p>";
		}
 		
 		}else{
		// errors occurred
		$msg_error = '<h1> !! خـــطأ  </h1>';
	    foreach ($errors as $msg) { // Print each error.
	    	$msg_error .= " $msg\n";
	    }
	    $msg_error .= '</p>';	  
		}
	
}

?>
<?php
$titre = "تحديث المؤسسة";
$active_menu = "index";
$header = array('etablissement');
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
                    <h2>تحديث المؤسسة <span class="fa fa-plus-square"></span> </h2>
                </div>   
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap"  style = "text-align: right;">
                 <div class="row">
                        <div class="col-md-2">
						</div>
                        <div class="col-md-10">
                            <form class="form-horizontal" role="form"  name="edit_etab" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   
                                    <ul class="panel-controls">
                                        <li> <h3 class="panel-title"><strong> المعلــومــات الخــاصة بالمؤسسة</strong></h3></li>
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
                                                <span class="input-group-addon">AR</span>
                                                <input type="text" name ="Nom_etab_ar" class="form-control" required  style= "text-align:right;" data-live-search="true" value = "<?php echo $edit->Nom_etab_ar;?>" />
                                            </div>                                            
                                        </div>
                                        <label class="col-md-3 col-xs-12 control-label">اسم المؤسسة بالعربية</label>
                                    </div>
                                    
                                    <div class="form-group">                                        
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">FR</span>
                                                <input type="text" name="Nom_etab_fr" class="form-control"required  style= "text-align:left;"value = "<?php echo $edit->Nom_etab_fr;?>"/>
                                            </div>             
                                        </div>
                                        <label class="col-md-3 col-xs-12 control-label">اسم المؤسسة بالفرنسية</label>
                                    </div> 
                                    
                                    <div class="form-group">                                        
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"></span>
                                                <input type="text" name="excercice" class="form-control"required  style= "text-align:left;"value = "<?php echo $edit->excercice;?>"/>
                                            </div>             
                                        </div>
                                        <label class="col-md-3 col-xs-12 control-label">السنة المالية</label>
                                    </div> 
                                    
                                   <div class="form-group" style ="dir:rtl;" >
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon">AR</span>
                                                <input type="text" name ="Nom_direc_ar" class="form-control" required   style= "text-align:right; " value = "<?php echo $edit->Nom_direc_ar;?>" />
                                            </div>                                            
                                        </div>
                                        <label class="col-md-3 col-xs-12 control-label">لقب و إسم المدير بالعربية</label>
                                    </div>
                                    
                                    <div class="form-group">                                        
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">FR</span>
                                                <input type="text" name="Nom_direc_fr" class="form-control"required  style= "text-align:left; " value = "<?php echo $edit->Nom_direc_fr;?>" />
                                            </div>             
                                        </div>
                                        <label class="col-md-3 col-xs-12 control-label">لقب وإسم المدير بالفرنسية</label>
                                    </div> 

									
									<div class="form-group">                                        
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
                                                <input type="text" name="Add_etab_ar" class="form-control"required  style= "text-align:right;"value = "<?php echo $edit->Add_etab_ar;?>"/>
                                            </div>            
                                        </div>
										<label class="col-md-3 col-xs-12 control-label">العنوان بالعربيـــة</label>
                                    </div>
									
									<div class="form-group" style ="dir:rtl;" >
                                        
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
                                                <input type="text" name="Add_etab_fr" class="form-control" required  style= "text-align:left;"value = "<?php echo $edit->Add_etab_fr;?>"/>
                                            </div>                                            
                                        </div>
										<label class="col-md-3 control-label">العنوان بالفرنسية</label>
                                    </div>
									
									<div class="form-group" style ="dir:rtl;" >
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span></span>
                                                <input type="number" name="Num_tele_01" class="form-control" required  style= "text-align:right;" value = "<?php echo $edit->Num_tele_01;?>"/>
                                            </div>                                            
                                          
                                        </div>
										<label class="col-md-3 col-xs-12 control-label">رقم الهــــاتف  الأول</label>
                                    </div>
									<div class="form-group" style ="dir:rtl;" >
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span></span>
                                                <input type="number" name="Num_tele_02" class="form-control" required  style= "text-align:right;" value = "<?php echo $edit->Num_tele_02;?>"/>
                                            </div>                                            
                                          
                                        </div>
										<label class="col-md-3 col-xs-12 control-label">رقم الهــــاتف الثاني</label>
                                    </div>
									
      
									<div class="form-group">                                        
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-print"></span></span>
                                               <input type="number" name="Num_fax" class="form-control" required  style= "text-align:right;" value = "<?php echo $edit->Num_fax;?>" />   
											
                                            </div>
                                        </div>
										<label class="col-md-3 col-xs-12 control-label"> رقم الفـــاكس </label>
                                    </div>
									  <div class="form-group">                                        
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">@</span>
                                                <input type="email" name="Add_mail_etab" class="form-control" required  style= "text-align:left;"value = "<?php echo $edit->Add_mail_etab;?>"/>                                           
                                            </div>
                                        </div>
										<label class="col-md-3 col-xs-12 control-label">البريـــد الإلكتروني</label>
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
                    <div class="mb-title"><span class="fa fa-arrow-left"></span></span> تسجيل <strong> الخروج </strong> ؟ </div>
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






