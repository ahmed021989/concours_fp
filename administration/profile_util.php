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
$titre = "بيانات المستــــخــــدم ";
$active_menu = "index";
$header = array('personne');
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
                    <h2>بيانات المستــــخــــدم <span class="glyphicon glyphicon-user"></span> </h2>
                </div>   
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap"  style = "text-align: right;">
                 <div class="row">
                        <div class="col-md-4">
						</div>
						<div class="col-md-7">
                            
                            <div class="panel panel-default">
                                <div class="panel-body profile" style="background:#1CAF9A;">
                                    <div class="profile-image">
                                        <img src="assets/images/users/profile.jpg" style="width: 23%;" >
                                    </div>
                                    <div class="profile-data">
                                        <div class="profile-data-name" style ="font-size: 25px; font-weight : bold;"><?php echo $user->nom_ar; ?></div>
                                        <div style ="font-size: 17px; font-weight : bold; " ><?php echo $user->type_ar; ?></div>
										 <div class="profile-controls">
                                        <a href="#" class="profile-control-left twitter"><span class="fa fa-twitter"></span></a>
                                        <a href="#" class="profile-control-right facebook"><span class="fa fa-facebook"></span></a>
                                    </div>   
                                    </div>
									
                                </div>  
                                <div class="panel-body">                                    
                                    <div class="row" >
									 <div class="col-md-2">
									 </div>
                                        <div class="col-md-4">
                                          <a href="edit_profile_user.php" class="btn btn-danger btn-rounded btn-block">   تعديل المعلومات   &nbsp;&nbsp;&nbsp;<span class="fa fa-edit"></span></a> 
                                        </div>
                                        <div class="col-md-4">
                                         <a href="edit_pass.php" class="btn btn-success btn-rounded btn-block">  تغيير كلمة السر  &nbsp;&nbsp;&nbsp;<span class="fa fa-lock"></span> </a>  </div>
                                    </div>
                                </div>								
                                <div class="panel-body list-group border-bottom">
                                    <p class="list-group-item active"  style="background:#000708; " >بيانات المستــــخــــدم  &nbsp;&nbsp;&nbsp; <span class="glyphicon glyphicon-user"></span>  </p>
                                    <P  class="list-group-item" style= "font-size:20px;"> <?php echo $user->nom_compler(); ?> :  الإسم و اللقب بالفرنسية &nbsp;&nbsp;&nbsp; <span class="fa fa-tag"></span></P>                                
                                    <p class="list-group-item"style= "font-size:20px;"><?php echo $user->date_naissance; ?>  :  تاريخ الإزدياد  &nbsp;&nbsp;&nbsp; <span class="fa fa-calendar"></span></p>
                                    <p class="list-group-item"style= "font-size:20px;">  مكــان الإزديــاد : <?php echo $user->lieu_naissance; ?> &nbsp;&nbsp;&nbsp; <span class="glyphicon glyphicon-map-marker"></span>&nbsp;&nbsp;</p>
                                    <p class="list-group-item"style= "font-size:20px;">  العنوان : <?php echo $user->adresse; ?> &nbsp;&nbsp;&nbsp; <span class="glyphicon glyphicon-map-marker"></span>&nbsp;&nbsp; </a>
                                    <p class="list-group-item"style= "font-size:20px;"> <?php echo $user->email; ?> : البريد الإلكتروني  &nbsp;&nbsp;&nbsp;  <span class="fa fa-envelope"></span></p>
                                </div>
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






