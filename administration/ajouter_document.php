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
	
	// verification de données 	
	if (isset($_POST['type_doc']) and  !empty($_POST['type_doc'])){
	if ($_POST['type_doc'] == '-1'){
		$errors[] = '<p style= "font-size: 20px; ">  !! إختر نوع الوثيقة </p>';
	}
	}
	
	
	// new object document
		$document_demmande = new Document_demmande();
 $SQL = $bd->requete("SELECT * FROM `Document_demmande`") ;
																			$nbr = mysqli_num_rows($SQL)+1;
$document_demmande->code =$nbr;
	$document_demmande->nom_doc_demmande = htmlentities(trim($_POST['nom_doc_demmande']));
	$document_demmande->type_doc = htmlentities(trim($_POST['type_doc']));
	$document_demmande->champs_oblige = htmlentities(trim($_POST['champs_oblige']));
	


	

	
	
	
	if (empty($errors)){
   		if ($document_demmande->existe()) {
			$msg_error = '<p style= "font-size: 20px; ">  !!??  يـوجد من قبل " ' . $document_demmande->nom_doc_demmande . ' " </p><br />';
			
		}else{
			$document_demmande->save();
 		$msg_positif = '<p style= "font-size: 20px; ">   تم تسجيــــل  " ' . $document_demmande->nom_doc_demmande . ' "   ... بنجــــاح        </p><br />';
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
$titre = " الوثائق المطلوبة";
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
     
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
					  <li><a href="index.php">الصفحة الرئيسية</a></li>  
					  <li class="active"><?php echo $titre ?></li>  
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2>الوثائق المطلوبة <span class="fa fa-cogs"></span> </h2>
                </div>   
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap"  style = "text-align: right;">
                 <div class="row">
                        <div class="col-md-2">
						</div>
                        <div class="col-md-10"> 
                           <form class="form-horizontal" role="form"  name="ajout_admin" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   
                                    <ul class="panel-controls">
                                        <li> <h3 class="panel-title"><strong>المعلومات الخاصة بالوثائق المطلوبة</strong></h3></li>
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

                                    
								    
									<div class="form-group" style ="dir:rtl;"  >
                                        <div class="col-md-6 col-xs-12">
		<select class="form-control select" id="type_doc"  name= "type_doc" required  style= "text-align:rtl;"  data-live-search="true" >
															  <option value = "-1"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;---  إختر نوع الوثيقة  ---</option>
															<option  value = "لأشغال والدراسات المنجزة" >لأشغال والدراسات المنجزة </option>								 <option  value = "التكوين المكمل للشهادة في نفس التخصص" >التكوين المكمل للشهادة في نفس التخصص  </option>	 
  <option  value = "الخبرة المهنية" >الخبرة المهنية  </option>
    <option  value = "الوضعية المهنية الحالية" >الوضعية المهنية الحالية  </option>  <option  value = "المسار الدراسي" >المسار الدراسي  </option>
      <option  value = "الطالب الاول في الدفعة" >الطالب الاول في الدفعة  </option>        <option  value = "أخرى" >أخرى  </option>                                                     
</select> 
												
                                        </div>
                                        <label class="col-md-3 col-xs-12 control-label"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;نوع الوثيقة </label>
                                    </div> 
                                    
                                    <div class="form-group" style ="dir:rtl;" >
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon">AR</span>
                                                <input type="text" name ="nom_doc_demmande" class="form-control" required  style= "text-align:right;" data-live-search="true"  />
                                            </div>                                            
                                        </div>
                                        <label class="col-md-3 col-xs-12 control-label">اسم الوثيقة</label>
                                    </div>
                                    
                                    <div class="form-group">                                        
                                        <div class="col-md-6 col-xs-12">
             
                      


<select class="form-control select" id="champs_oblige"  name= "champs_oblige" required  style= "text-align:rtl;"  data-live-search="true" >
															
															<option  value = "نعم" >نعم </option>								 <option  value = "لا" >لا</option>	 
                                                      
</select> 
                                               
                                                       
                                        </div>
                                        <label class="col-md-3 col-xs-12 control-label">حقل إجباري</label>
                                    </div>     
									
									
									
                                  
                              
                                <div class="panel-footer">
                                    <button class="btn btn-default pull-right" type = "reset">مسح جميــع الخــانات</button> 
                                    <button class="btn btn-info pull-left" type = "submit" name = "submit">إضافة</button>  
                                    
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
		  <script type='text/javascript' src='js/plugins/maskedinput/jquery.maskedinput.min.js'></script>
        <!-- END THIS PAGE PLUGINS -->       
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->           
    </body>
</html>






