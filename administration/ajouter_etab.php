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
	
	if(isset($_POST['submit'])){
	$errors = array();
	
	/* verification de données 	
	if (isset($_POST['Id_derc']) and  !empty($_POST['Id_derc'])){
	if ($_POST['Id_derc'] == '-1'){
		$errors[] = '<p style= "font-size: 20px; ">  !! إختر المديرية </p>';
	}
	}  */
	
	
	// new object document
		$etablissement = new Etablissement();
	
	
	
	$etablissement->Nom_etab_fr = htmlentities(trim($_POST['Nom_etab_fr']));
	$etablissement->Nom_etab_ar = htmlentities(trim($_POST['Nom_etab_ar']));
	$etablissement->Nom_direc_ar = htmlentities(trim($_POST['Nom_direc_ar']));
	$etablissement->Nom_direc_fr = htmlentities(trim($_POST['Nom_direc_fr']));
	$etablissement->Add_etab_fr = htmlentities(trim($_POST['Add_etab_fr']));
	$etablissement->Add_etab_ar = htmlentities(trim($_POST['Add_etab_ar']));
	$etablissement->Num_tele_01 = htmlentities(trim($_POST['Num_tele_01']));
	$etablissement->Num_tele_02 = htmlentities(trim($_POST['Num_tele_02']));
	$etablissement->Num_fax = htmlentities(trim($_POST['Num_fax']));
	$etablissement->Add_mail_etab = htmlentities(trim($_POST['Add_mail_etab']));
	
	
	//$etablissement->Id_derc = htmlentities(trim($_POST['Id_derc']));
	//$direction = Direction:: trouve_par_id($etablissement->Id_derc);
	

	
	
	
	if (empty($errors)){
   		if ($etablissement->existe()) {
			$msg_error = '<p style= "font-size: 20px; ">  !!  يـوجد من قبل " ' . $etablissement->Nom_etab_ar . ' " </p><br />';
			
		}else{
			$etablissement->save();
 		$msg_positif = '<p style= "font-size: 20px; ">   بنجــــاح   " ' . $etablissement->Nom_etab_ar . ' "    تم تسجيــــل      </p><br />';
		}
 		
 		}else{
		// errors occurred
		$msg_error = '<h1> !! خـــطأ  </h1>';
	    foreach ($errors as $msg) { // Print each error.
	    	$msg_error .= " - $msg<br />\n";
	    }
	    $msg_error .= '</p>';	  
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
			$SQL = $bd->requete("SELECT * FROM `etablissement` ");  
		 	$nbr_etab = mysqli_num_rows($SQL);
			 while    ($row = $bd->fetch_array($SQL))
								{
									$Nom_etab_fr = $row['Nom_etab_fr'];
									$Nom_etab_ar = $row['Nom_etab_ar'];
									$Add_etab_fr = $row['Add_etab_fr'];
									$Add_etab_ar = $row['Add_etab_ar']; 
                                    $Nom_direc_ar = $row['Nom_direc_ar'];
                                    $Nom_direc_fr = $row['Nom_direc_fr'];									
									
									$Num_tele_01 = $row['Num_tele_01'];
									$Num_tele_02 = $row['Num_tele_02'];
									$Num_fax = $row['Num_fax'];
									$Add_mail_etab = $row['Add_mail_etab'];
									
								}
			
		?>
     
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
					  <li><a href="index.php">الصفحة الرئيسية</a></li>  
					  <li class="active"><?php echo $titre ?></li>  
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2>إعدادات المؤسسة <span class="fa fa-cogs"></span> </h2>
                </div>   
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap"  style = "text-align: right;">
                 <div class="row">
                        <div class="col-md-2">
						</div>
                        <div class="col-md-10"> 
						
							<?php if ($nbr_etab  == 0) {
							?>
						
                           <form class="form-horizontal" role="form"  name="ajout_admin" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   
                                    <ul class="panel-controls">
                                        <li> <h3 class="panel-title"><strong>المعلومات الخاصة بالمؤسسة</strong></h3></li>
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
                                                <input type="text" name ="Nom_etab_ar" class="form-control" required  style= "text-align:right;" data-live-search="true"  />
                                            </div>                                            
                                        </div>
                                        <label class="col-md-3 col-xs-12 control-label">اسم المؤسسة بالعربية</label>
                                    </div>
                                    
                                    <div class="form-group">                                        
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">FR</span>
                                                <input type="text" name="Nom_etab_fr" class="form-control"required  style= "text-align:left;"/>
                                            </div>             
                                        </div>
                                        <label class="col-md-3 col-xs-12 control-label">اسم المؤسسة بالفرنسية</label>
                                    </div>  

									 <div class="form-group" style ="dir:rtl;" >
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon">AR</span>
                                                <input type="text" name ="Nom_direc_ar" class="form-control" required  style= "text-align:right;"   />
                                            </div>                                            
                                        </div>
                                        <label class="col-md-3 col-xs-12 control-label">لقب و إسم المدير بالعربية</label>
                                    </div>
                                    
                                    <div class="form-group">                                        
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">FR</span>
                                                <input type="text" name="Nom_direc_fr" class="form-control"required  style= "text-align:left;"/>
                                            </div>             
                                        </div>
                                        <label class="col-md-3 col-xs-12 control-label">لقب وإسم المدير بالفرنسية</label>
                                    </div>  
									
									
									
									<div class="form-group">                                        
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
                                                <input type="text" name="Add_etab_ar" class="form-control"required  style= "text-align:right;"/>
                                            </div>            
                                        </div>
								
										<label class="col-md-3 col-xs-12 control-label">العنوان بالعربيـــة</label>
                                    </div>
									
									<div class="form-group" style ="dir:rtl;" >
                                        
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
                                                <input type="text" name="Add_etab_fr" class="form-control" required  style= "text-align:left;"/>
                                            </div>                                            
                                        </div>
										<label class="col-md-3 control-label">العنوان بالفرنسية</label>
                                    </div>
									
									<div class="form-group" style ="dir:rtl;" >
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span></span>
                                                <input type="number" name="Num_tele_01" class="form-control" required  style= "text-align:right;" />
                                            </div>                                            
                                          
                                        </div>
										<label class="col-md-3 col-xs-12 control-label">رقم الهــــاتف  الأول</label>
                                    </div>
									<div class="form-group" style ="dir:rtl;" >
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span></span>
                                                <input type="number" name="Num_tele_02" class="form-control" required  style= "text-align:right;" />
                                            </div>                                            
                                          
                                        </div>
										<label class="col-md-3 col-xs-12 control-label">رقم الهــــاتف الثاني</label>
                                    </div>
									
      
									<div class="form-group">                                        
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-print"></span></span>
                                               <input type="number" name="Num_fax" class="form-control" required  style= "text-align:right;"  />   
											
                                            </div>
                                        </div>
										<label class="col-md-3 col-xs-12 control-label"> رقم الفـــاكس </label>
                                    </div>
									  <div class="form-group">                                        
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">@</span>
                                                <input type="email" name="Add_mail_etab" class="form-control" required  style= "text-align:left;"/>                                           
                                            </div>
                                        </div>
										<label class="col-md-3 col-xs-12 control-label">البريـــد الإلكتروني</label>
                                    </div>
									
									
									
                                  
                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-default pull-right" type = "reset">مسح جميــع الخــانات</button> 
                                    <button class="btn btn-info pull-left" type = "submit" name = "submit">تسجيـــــل</button>  
                                    
                                </div>
                            </div>
                            </form>

					<?php	} else
							{
								?>		
								
								
								 <form class="form-horizontal" role="form"  name="ajout_admin" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   
                                    <ul class="panel-controls">
                                        <li> <h3 class="panel-title"><strong>المعلومات الخاصة بالمؤسسة</strong></h3></li>
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
                                                <input type="text" name ="Nom_etab_ar" class="form-control" required   style= "text-align:right;color : #F74B4B; " value = "<?php echo $Nom_etab_ar;?>"  disabled />
                                            </div>                                            
                                        </div>
                                        <label class="col-md-3 col-xs-12 control-label">اسم المؤسسة بالعربية</label>
                                    </div>
                                    
                                    <div class="form-group">                                        
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">FR</span>
                                                <input type="text" name="Nom_etab_fr" class="form-control"required  style= "text-align:left;color : #F74B4B; " value = "<?php echo $Nom_etab_fr;?>"  disabled />
                                            </div>             
                                        </div>
                                        <label class="col-md-3 col-xs-12 control-label">اسم المؤسسة بالفرنسية</label>
                                    </div>   

                                     <div class="form-group" style ="dir:rtl;" >
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon">AR</span>
                                                <input type="text" name ="Nom_direc_ar" class="form-control" required   style= "text-align:right;color : #F74B4B; " value = "<?php echo $Nom_direc_ar;?>"  disabled />
                                            </div>                                            
                                        </div>
                                        <label class="col-md-3 col-xs-12 control-label">لقب و إسم المدير بالعربية</label>
                                    </div>
                                    
                                    <div class="form-group">                                        
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">FR</span>
                                                <input type="text" name="Nom_direc_fr" class="form-control"required  style= "text-align:left;color : #F74B4B; " value = "<?php echo $Nom_direc_fr;?>"  disabled />
                                            </div>             
                                        </div>
                                        <label class="col-md-3 col-xs-12 control-label">لقب وإسم المدير بالفرنسية</label>
                                    </div> 

									
									<div class="form-group">                                        
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
                                                <input type="text" name="Add_etab_ar" class="form-control"required  style= "text-align:right;color : #F74B4B; " value = "<?php echo $Add_etab_ar;?>"  disabled />
                                            </div>            
                                        </div>
										<label class="col-md-3 col-xs-12 control-label">العنوان بالعربيـــة</label>
                                    </div>
									
									<div class="form-group" style ="dir:rtl;" >
                                        
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
                                                <input type="text" name="Add_etab_fr" class="form-control" required  style= "text-align:left;color : #F74B4B; " value = "<?php echo $Add_etab_fr;?>"  disabled />
                                            </div>                                            
                                        </div>
										<label class="col-md-3 control-label">العنوان بالفرنسية</label>
                                    </div>
									
									<div class="form-group" style ="dir:rtl;" >
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span></span>
                                                <input type="number" name="Num_tele_01" class="form-control" required  style= "text-align:left;color : #F74B4B; " value = "<?php echo $Num_tele_01;?>"  disabled />
                                            </div>                                            
                                          
                                        </div>
										<label class="col-md-3 col-xs-12 control-label">رقم الهــــاتف  الأول</label>
                                    </div>
									<div class="form-group" style ="dir:rtl;" >
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span></span>
                                                <input type="number" name="Num_tele_02" class="form-control" required  style= "text-align:left;color : #F74B4B; " value = "<?php echo $Num_tele_02;?>"  disabled />
                                            </div>                                            
                                          
                                        </div>
										<label class="col-md-3 col-xs-12 control-label">رقم الهــــاتف الثاني</label>
                                    </div>
									
      
									<div class="form-group">                                        
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-print"></span></span>
                                               <input type="number" name="Num_fax" class="form-control" required  style= "text-align:left;color : #F74B4B; " value = "<?php echo $Num_fax;?>"  disabled  />   
											
                                            </div>
                                        </div>
										<label class="col-md-3 col-xs-12 control-label"> رقم الفـــاكس </label>
                                    </div>
									  <div class="form-group">                                        
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">@</span>
                                                <input type="email" name="Add_mail_etab" class="form-control" required  style= "text-align:left;color : #F74B4B; " value = "<?php echo $Add_mail_etab;?>"  disabled  />                                         
                                            </div>
                                        </div>
										<label class="col-md-3 col-xs-12 control-label">البريـــد الإلكتروني</label>
                                    </div>
									
									
									
                                  
                                </div>
                                <div class="panel-footer">
                                
                                 
                                   
                                    <a href="list_etab.php"><button type="button" class="btn btn-success pull-left "> تعديــل </button></a>
                                </div>
                                    
                                </div>
                            </div>
                            </form>
							
								<?php
							}
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
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->           
    </body>
</html>






