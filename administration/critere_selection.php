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
	
	
	
	
	
	
	
	
	// new object document
		$note = new Notes();
	
	
	
	$note->note_deplom = htmlentities(trim($_POST['note_deplom']));
	$note->note_exame = htmlentities(trim($_POST['note_exame']));
	$note->note_date_deplom = htmlentities(trim($_POST['note_date_deplom']));
	$note->note_relve_note = htmlentities(trim($_POST['note_relve_note']));
	$note->note_experiance = htmlentities(trim($_POST['note_experiance']));
	$note->note_majour = htmlentities(trim($_POST['note_majour']));
	$note->note_ecole_sup = htmlentities(trim($_POST['note_ecole_sup']));
	$note->note_forma_comple = htmlentities(trim($_POST['note_forma_comple']));
	$note->note_etud_realise = htmlentities(trim($_POST['note_etud_realise']));

	
	$note->code = htmlentities(trim($_GET['id']));
	
	

	$moyen = htmlentities(trim($_POST['note_deplom'])) + htmlentities(trim($_POST['note_exame'])) + htmlentities(trim($_POST['note_date_deplom']))+ htmlentities(trim($_POST['note_relve_note']))+ htmlentities(trim($_POST['note_experiance']))+ htmlentities(trim($_POST['note_majour']))+ htmlentities(trim($_POST['note_ecole_sup']))+ htmlentities(trim($_POST['note_forma_comple']))+ htmlentities(trim($_POST['note_etud_realise']));
	
	$note->moyen=$moyen;
	
	if (empty($errors)){
   		if ($note->existe()) {
			$msg_error = '<p style= "font-size: 20px; ">  لقد تم تسجيل نقاط المترشح من قبل ؟؟ </p><br />';  
			
		}else{
			$note->save();
 		$msg_positif = '<p style= "font-size: 20px; ">      " تم تسجيل نـقــاط المترشـح بنجاح "      </p><br />';
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
if ( (isset($_GET['id'])) ) { 
		 $code = $_GET['id'];
		 $condidat =  Condidat::trouve_par_id($code);
		
	 } elseif ( (isset($_POST['code'])) &&(is_numeric($_POST['code'])) ) { 
		 $code = $_POST['code'];
		 $condidat =  Condidat::trouve_par_id($code);
		$code = $condidat->code ;
	
		 
	 } 

	
	

?>
<?php
$titre = "معايير إنتقاء المترشح";
$active_menu = "index";
$header = array('notes');
if ($user->type =='administrateur' or 'sous-directeur' or 'gestionnaire' or 'agent'){
	require_once("composit/header.php");
}
?>
        

                 
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
					  <li><a href="index.php">الصفحة الرئيسية</a></li>  
					  <li class="active"><?php echo $titre ?></li>  
                </ul>
                <div class="page-title">                    
                    <h2> معايير إنتقاء المترشح <span class="fa fa-pencil-square-o"></span>   </h2>
					 
                </div>   
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap"  style = "text-align: right;">
                 <div class="row">
                        <div class="col-md-2">
						</div>
                        <div class="col-md-10">
						<form class="form-horizontal"   name="frm1" id = "frm1" action="<?php echo $_SERVER['PHP_SELF']?>? id=<?php  echo $_GET['id'];?>" method="post">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   
                                    <ul class="panel-controls">
                                        <li> <h3 class="panel-title"><strong> المعلومات الخاصة بالمترشح </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="list_cond_titre1.php"><button type="button" class="btn btn-warning "> قائمة المترشحين </button></a></h3> </li>
										
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
                                                
                                                <input type="text" name="nom" class="form-control "  value = "<?php echo $condidat->nom_compler() ; ?>" disabled  style= "color : #db0300; font-size: 19px;" />                                            
                                           <span class="input-group-addon"><span class="fa fa-user"></span></span>
										   </div>
                                        </div>
										<label class="col-md-3 col-xs-12 control-label">   اللقب و الإسم</label>
                                    </div>	
									 
								<div class="form-group" style ="dir:rtl;" >
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                               
                                                <input type="text" name ="grade"   class="form-control" value = "<?php echo $condidat->grade; ?>" readonly  style= "color : #db0300;" />
                                            <span class="input-group-addon"><span class="fa fa-briefcase"></span></span>
										   </div>                                            
                                        </div>
                                        <label class="col-md-3 col-xs-12 control-label">  المنصب المشارك فيه</label>
                                    </div>
									 
									<div class="form-group" style ="dir:rtl;" >
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                 <span class="input-group-addon">نقطة</span>
                                                <input type="number" name="note_deplom"  min="1" max="6"  oninvalid="this.setCustomValidity('حقل اجباري ؟ في حدود 6 نقاط ')" oninput="setCustomValidity('');" class="form-control" required  style= "text-align:right;"/>
												<span class="input-group-addon">06 لكل مترشح</span>
                                            </div>                                            
                                          
                                        </div>
										<label class="col-md-3 col-xs-12 control-label">  تطابق تخصص الشهادة </label></div>
										
										
										<div class="form-group" style ="dir:rtl;" >
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                 <span class="input-group-addon">نقطة</span>
                                                <input type="number" name="note_exame" min="0" max="3" oninvalid="this.setCustomValidity('حقل إجباري ؟ في حدود 3 نقاط')" oninput="setCustomValidity('');" class="form-control" required  style= "text-align:right;"/>
												<span class="input-group-addon">من 00 إلى 03</span>
                                            </div>                                            
                                          
                                        </div>
										<label class="col-md-3 col-xs-12 control-label">  المقابلة مع لجنة الانتقاء </label>      </div> 
										
										
										<div class="form-group" style ="dir:rtl;" >
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                 <span class="input-group-addon">نقطة</span>
                                                <input type="number" name="note_date_deplom" min="0" max="5" oninvalid="this.setCustomValidity('حقل إجباري ؟ في حدود 5 نقاط')" oninput="setCustomValidity('');" class="form-control" required  style= "text-align:right;"/>
												<span class="input-group-addon">من 00 إلى 05</span>
                                            </div>                                            
                                          
                                        </div>
										<label class="col-md-3 col-xs-12 control-label"> تاريخ الحصول على الشهادة   </label>
                                    </div> 
										
									
									<div class="form-group" style ="dir:rtl;" >
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                 <span class="input-group-addon">نقطة</span>
                                                <input type="number" name="note_relve_note" min="0" max="7" oninvalid="this.setCustomValidity('حقل إجباري ؟ في حدود 7 نقاط')" oninput="setCustomValidity('');" class="form-control" required  style= "text-align:right;"/>
												<span class="input-group-addon"> من 01 الى 07 </span>
                                            </div>                                            
                                          
                                        </div>
										<label class="col-md-3 col-xs-12 control-label">   مسار الدراسة على أساس المعدل </label>      </div>
										
										<div class="form-group" style ="dir:rtl;" >
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                 <span class="input-group-addon">نقطة</span>
                                                <input type="number" name="note_experiance" min="0" max="6" oninvalid="this.setCustomValidity('في حدود 6 نقاط')" oninput="setCustomValidity('');" class="form-control"  style= "text-align:right;"/>
												<span class="input-group-addon">من 00 إلى 06</span>
                                            </div>                                            
                                          
                                        </div>
										<label class="col-md-3 col-xs-12 control-label"> الخبرة المهنية المكتسبة  </label>     </div> 
										
										
                                    <div class="form-group" style ="dir:rtl;" >
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                 <span class="input-group-addon">نقطة</span>
                                                <input type="number" name="note_majour" min="0" max="1" oninvalid="this.setCustomValidity('في حدود نقطة واحدة ')" oninput="setCustomValidity('');" class="form-control"  style= "text-align:right;"/>
												<span class="input-group-addon">01 +</span>
                                            </div>                                            
                                          
                                        </div>
										<label class="col-md-3 col-xs-12 control-label">(MAJOR) الطالب الأول في الدفعة</label>  </div> 
										
									<div class="form-group" style ="dir:rtl;" >
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                 <span class="input-group-addon">نقطة</span>
                                                <input type="number" name="note_ecole_sup" min="0" max="2" oninvalid="this.setCustomValidity('في حدود  نقطتين')" oninput="setCustomValidity('');" class="form-control"  style= "text-align:right;"/>
												<span class="input-group-addon">  02 +</span>
                                            </div>                                            
                                          
                                        </div>
										<label class="col-md-3 col-xs-12 control-label">  خريجو المدارس الكبرى  </label>
                                    </div> 
									
									<div class="form-group" style ="dir:rtl;" >
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                 <span class="input-group-addon">نقطة</span>
                                                <input type="number" name="note_forma_comple" min="0" max="2" oninvalid="this.setCustomValidity('في حدود  نقطتين')" oninput="setCustomValidity('');" class="form-control"   style= "text-align:right;"/>
												<span class="input-group-addon">من 00 إلى 02</span>
                                            </div>                                            
                                          
                                        </div>
										<label class="col-md-3 col-xs-12 control-label">التكوين المكمل للشهادة المطلوبة </label>
                                    </div> 
									
									<div class="form-group" style ="dir:rtl;" >
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                 <span class="input-group-addon">نقطة</span>
                                                <input type="number" name="note_etud_realise" min="0" max="2"  oninvalid="this.setCustomValidity('في حدود  نقطتين')" oninput="setCustomValidity('');" class="form-control"   style= "text-align:right;"/>
												<span class="input-group-addon">من 00 إلى 02</span>
                                            </div>                                            
                                          
                                        </div>
										<label class="col-md-3 col-xs-12 control-label"> الأشغال والدراسات المنجزة  </label>  </div> 
                                  
									
									
                              
									
								
                                 
                                </div>
                                <div class="panel-footer">
                                  
                                    <button class="btn btn-info pull-left" type = "submit" name = "submit" >تسجيل</button> 
								
										
 
                                    
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>                    
                    
                  
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






