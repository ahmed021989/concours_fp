<?php
require_once("includes/initialiser.php");
$etab = Etablissement :: trouve_tous();
																			
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
	if (!isset($_POST['logine'])||empty($_POST['logine'])){
		$errors[]='Le champ login est vide';
		}
	
	if (isset($_POST['passe'])&& !empty($_POST['passe'])){
	    if($_POST['passe'] != $_POST['passe2']){
		 $errors[]='!!! خطأ في تأكيـــد كلمة السر ';
			
		 
		}
		}
		if (!isset($_POST['nom'])||empty($_POST['nom'])){
		$errors[]='Le champ nom est vide';
		}
		
		if (!isset($_POST['prenom'])||empty($_POST['prenom'])){
		$errors[]='Le champ prenom est vide';
		}
		
		
		if (!isset($_POST['lieu_naissance'])||empty($_POST['lieu_naissance'])){
		$errors[]='Le champ lieu naissance est vide';
		}
		
		if (!isset($_POST['adresse'])||empty($_POST['adresse'])){
		$errors[]='Le champ adresse est vide';
		}
		
	// new object document
	$util = new Personne();

	$util->login = htmlentities(trim($_POST['logine']));
 	$util->nom = htmlentities(trim($_POST['nom']));
	$util->excercice = htmlentities(trim($_POST['excercice']));
 	$util->prenom = htmlentities(trim($_POST['prenom']));
 	$util->nom_ar = htmlentities(trim($_POST['nom_ar']));
 	$util->date_naissance = htmlentities(trim($_POST['date_naissance']));
	$util->lieu_naissance = htmlentities(trim($_POST['lieu_naissance']));
	$util->email = htmlentities(trim($_POST['email']));
	
	$util->adresse = htmlentities(trim($_POST['adresse']));
	$util->type = htmlentities(trim($_POST['type']));
	switch ($util->type) {
										case "sous-directeur":
										$util->type_ar = "مديــــر فرعي";
											break;
										case "gestionnaire":
										$util->type_ar = "مسييــــر";
											break;
																			
									}
	$util->telephone = htmlentities(trim($_POST['telephone']));
	//$util->photo = $_FILES['image'] ['name'];
	$util->mot_passe = SHA1($_POST['passe']);
 	$util->id = NULL;
 	$util->personne_id = $util->id;
		
		
	if (empty($errors)){
   		if ($util->existe()) {
			$msg_error = '<p style= "font-size: 20px; ">  !!  يـوجد من قبل ' . $util->login . '</p><br />';
			
		}else{
			$util->save();
 		$msg_positif = '<p style= "font-size: 20px; ">  بنجــــاح  ' . $util->login .  '    تم تسجيـــــل  </p><br />';
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
$titre = "إضــــــافة مستــــخــــدم";
$active_menu = "index";
$header = array('file','ckeditor');
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
                    <h2>إضــــــافة مستــــخــــدم <span class="fa fa-plus-square"></span> </h2>
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
                                        <li> <h3 class="panel-title"><strong> المعلــومــات الخــاصة بالمستخدم الجديـــد</strong></h3></li>
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
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name ="logine" class="form-control" required  style= "text-align:right;"/>
                                            </div>                                            
                                        </div>
                                        <label class="col-md-3 col-xs-12 control-label">إسم المستخدم</label>
                                    </div>
                                    
                                    <div class="form-group">                                        
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                                <input type="password" name="passe" class="form-control"required  style= "text-align:right;"/>
                                            </div>             
                                        </div>
                                        <label class="col-md-3 col-xs-12 control-label">كلمة السر</label>
                                    </div>     
									<div class="form-group">                                        
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                                <input type="password" name="passe2" class="form-control"required  style= "text-align:right;"/>
                                            </div>            
                                        </div>
										<label class="col-md-3 col-xs-12 control-label">تأكيـــد كلمة السر</label>
                                    </div>
                                    
                                    	<div class="form-group">                                        
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                <input type="excercice" name="excercice" class="form-control"required  style= "text-align:right;color:#000" value="<?php  echo $etab->excercice;  ?>"  />
                                            </div>            
                                        </div>
										<label class="col-md-3 col-xs-12 control-label">السنة المالية</label>
                                    </div>
									
									<div class="form-group" style ="dir:rtl;" >
                                        
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <input type="text" name="nom" class="form-control" required  style= "text-align:right;"/>
                                            </div>                                            
                                        </div>
										<label class="col-md-3 control-label">الإســـم بالفرنسية</label>
                                    </div>
									
									<div class="form-group" style ="dir:rtl;" >
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <input type="text" name="prenom" class="form-control" required  style= "text-align:right;"/>
                                            </div>                                            
                                          
                                        </div>
										<label class="col-md-3 col-xs-12 control-label">اللقـــب بالفرنسية</label>
                                    </div>
									<div class="form-group" style ="dir:rtl;" >
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <input type="text" name="nom_ar" class="form-control" required  style= "text-align:right;"/>
                                            </div>                                            
                                          
                                        </div>
										<label class="col-md-3 col-xs-12 control-label">الإســم و اللقب بالعربيـــة</label>
                                    </div>
                                    
                                    <div class="form-group">                                        
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                <input type="date"  name="date_naissance" class="form-control" required  style= "text-align:right;"/>                                            
                                            </div>
                                        </div>
										<label class="col-md-3 col-xs-12 control-label">تــــاريخ الإزديــاد</label>
                                    </div>
                                     <div class="form-group">                                        
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-building-o"></span></span>
                                                <input type="text" name="lieu_naissance" class="form-control " required  style= "text-align:right;"/>                                            
                                            </div>
                                        </div>
										<label class="col-md-3 col-xs-12 control-label">مكـــــان الإزديــاد</label>
                                    </div>
									 <div class="form-group">                                        
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
                                                <input type="text" name="adresse" class="form-control " required  style= "text-align:right;"/>                                            
                                            </div>
                                        </div>
										<label class="col-md-3 col-xs-12 control-label">العنـــــوان</label>
                                    </div>
                                   
                                    
                                    <div class="form-group">

                                        <div class="col-md-6 col-xs-12" >                                                                                            
                                            <select class="form-control select"required name="type"  style= "text-align:right;" >
                                                <option value = "">إختر المنصب</option>
                                                <option value = "sous-directeur">مديــــر فرعي</option>
                                                <option value = "gestionnaire">مسييــــر</option>
                                                <option value = "agent">عـــــون</option>
                                            </select>
                                        </div>
									<label class="col-md-3 col-xs-12 control-label">المنصـــــب</label>
                                    </div>
                                      <div class="form-group">                                        
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span></span>
                                               <input type="text" name="telephone" class="form-control" required  style= "text-align:right;" data-mask="0999 99 99 99" />   
											
                                            </div>
                                        </div>
										<label class="col-md-3 col-xs-12 control-label">رقم الهــــاتف</label>
                                    </div>
									   <div class="form-group">                                        
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">@</span>
                                                <input type="email" name="email" class="form-control" required  style= "text-align:right;"/>                                           
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






