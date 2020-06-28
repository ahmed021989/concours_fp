<?php
require_once("includes/initialiser.php");
if(!$session->is_logged_in()) {

	readresser_a("login.php");

}else{
	$user = Personne::trouve_par_id($session->id_utilisateur);
	$accestype = array('administrateur');
	if( !in_array($user->type,$accestype)){ 
		//contenir_composition_template('simple_header.php'); 
		$msg_system ="vous n'avez pas le droit d'accéder a cette page  ccsdcsdc";
		echo system_message($msg_system);
		// contenir_composition_template('simple_footer.php');
		exit();
	} 
}
?>
<?php

if (isset($_GET['submit'])) {
	$errors = array();

	// verification de données 	
	
       
		

	
	
	  	


 	if (empty($errors)){
   		// perform Update
	
	$Nom_ar_cl = trim(htmlentities(strtoupper($_GET['Nom_ar_cl'])));
 	$Prenom_ar_cl = trim(htmlentities(strtoupper($_GET['Prenom_ar_cl'])));
 	$N_passport = trim(htmlentities(strtoupper($_GET['N_passport'])));
 	
	
	$clients = Client::recherche_avance2($Nom_ar_cl,$Prenom_ar_cl,$N_passport);
		

	}else{
		// errors occurred
		$msg_error = '<h1>erreur!</h1>';
	    foreach ($errors as $msg) { // Print each error.
	    	$msg_error .= " - $msg<br />\n";
	    }
	    $msg_error .= '</p>';	  
	}
} // End of the main Submit conditional.


?>
<?php 
$titre = "بحث متقدم";
$active_menu = "index";
$header = array('client');
if ($user->type =='administrateur'){
	require_once("composit/header.php");
}elseif ($user->type =='Admin_perso' or 'Agent_perso' or 'Admin_bg' or 'Agent_bg' ){
	//require_once("composit/header_see.php");
	readresser_a("index1.php");
}
else {
	readresser_a("profile_utils.php");
}
?>
            

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                  <li><a href="index.php">الصفحة الرئيسية</a></li>  
					  <li class="active"><?php echo $titre ?></li>  
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2> تسيير الزبائن <span class="fa fa-cogs"></span> </h2>
                </div>                   
                		
                <!-- PAGE CONTENT WRAPPER -->
				
                <div class="page-content-wrap">
 <div class="col-md-2">
						</div>
                        <div class="col-md-10">
                            
						<form class="form-horizontal"   name="frm1" id = "frm1" action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   
                                    <ul class="panel-controls">
                                        <li> <h3 class="panel-title"><strong> بحث متقدم </strong></h3></li>
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
                                                <span class="input-group-addon">NB</span>
                                                <input type="text" name ="N_passport" class="form-control"   style= "text-align:right;" />
                                            </div>                                            
                                        </div>
                                        <label class="col-md-3 col-xs-12 control-label"> رقم جواز السفر </label>
                                    </div>
                                    

    
									<div class="form-group">                                        
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">AR</span>
                                                <input type="text" name="Prenom_ar_cl" class="form-control"  style= "text-align:right;" />
                                            </div>            
                                        </div>
										<label class="col-md-3 col-xs-12 control-label"> الإسم  </label>
                                    </div>
									

									<div class="form-group"  >
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon">AR</span>
                                                <input type="text" name="Nom_ar_cl" class="form-control" style ="dir:rtl; text-align: right;"  />
                                            </div>                                            
                                          
                                        </div>
										<label class="col-md-3 col-xs-12 control-label">  اللقب </label>
                                    </div>
									
                                  
                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-default pull-right" type = "reset">مسح جميــع الخــانات</button> 
                                    <button class="btn btn-info pull-left" type = "submit" name = "submit"> بحــــث </button>  
                                    	
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- START DEFAULT DATATABLE -->
					<?php if (isset ($clients)){ ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title">قــــائمة الزبائن </h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>                                
                                </div>
                                <div class="panel-body">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th> تحديــــث</th>
                                                <th> الرحلة </th>
                                                <th> نوع الغرفة </th>												
                                                <th> الإسم واللقب بالفرنسية </th>
                                                <th>الإسم و اللقب العربية </th>												
												 <th>رقم جواز السفر  </th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
								foreach($clients as $client){
								?>
	                                            <tr id="<?php echo $client->N_passport;?>">
											<td>									
                                           
                                          <button class="btn btn-danger btn-rounded " onClick="delete_row('<?php echo $client->N_passport;?>');"><span class="glyphicon glyphicon-trash"></span></button>
										    <a href="edit_client.php?N_pass=<?php echo $client->N_passport;?>"><button type="button" class="btn btn-info  btn-rounded "> <span class="fa fa-pencil"></span></button></a>
										<?php $billiet = Billiet :: trouve_par_Npass($client->N_passport) ;
											 if (isset($billiet->id_billiet)  ) {  $voyage = Voyage:: trouve_par_id($billiet->Id_voy);}
													?>
										
										 <?php if (isset($billiet->id_billiet)  ) {  if ( $voyage->Date_voy >= date("Y-m-d")  ) { ?>  <a href="edit_billiet.php?id_b=<?php  echo $billiet->id_billiet; ?>"><button type="button" class="btn btn-info  btn-rounded "> تغيير الغرفة</button></a> <?php } }?>
										
                                        </td>
										


									
											<td class="hidden-phone"><strong><?php   if (isset($billiet->id_billiet)  ) {  if ( $voyage->Date_voy >= date("Y-m-d")  ) { echo $voyage->Nom_voy;} else {echo '<a href="ajouter_billiet.php?N_pass='.$client->N_passport.'" class="btn btn-default   btn-rounded">تسجيل في  رحلة  </a>';} } else { echo'	<a href="ajouter_billiet.php?N_pass='.$client->N_passport.'" class="btn btn-default   btn-rounded">تسجيل في  رحلة  </a>';}    ?></strong></td>
										<td class="hidden-phone"><strong><?php   if (isset($billiet->id_billiet)  ) { if ( $voyage->Date_voy >= date("Y-m-d")  ) { switch ($billiet->Prix_voyage) {
																						case $voyage->chambre_5 :
																							echo "خمـــاسية";
																							break;
																						case $voyage->chambre_4:
																							echo "ربـــاعية";
																							break;
																						case $voyage->chambre_3:
																							echo "ثلاثـــــية";
																							break;
																						case $voyage->chambre_2:
																							echo "ثنـــائية";
																							break;
										}  }else { echo'/';}   } else { echo'/';}?></strong></td>										
										<td class="hidden-phone"><?php echo html_entity_decode($client->nom_compler_fr()); ?></td>
										<td><strong><?php echo html_entity_decode($client->nom_compler_ar()); ?></strong></td>
										 <td><a href="profile_client.php?N_pass=<?php echo html_entity_decode($client->N_passport) ?>"><?php echo html_entity_decode($client->N_passport); ?></a></td>
										 
                                    </tr>
                                   <?php
								}
                                 ?>       </tbody>
                                    </table>
                                </div>
                            </div>
							<?php } ?>	
                            <!-- END DEFAULT DATATABLE -->      
                    
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
		<div class="message-box message-box-danger animated fadeIn" id="message-box-danger" data-sound="fail" >
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title" style = "text-align :right;"> !!! تحذيــــــــر   </div>
                    <div class="mb-content">
                                             <p style = "text-align :right; font-size: 25px; " >هل أنت متأكد أنك تريد حذف هــذا الزبون ؟</p>                    
                        <p style = "text-align :right; font-size: 25px; ">اضغط لا إذا كنت لا ترغب في حذف الزبون . اضغط نعم لحذف  الزبون</p>
                    </div>
                    <div class="mb-footer">
							<button class="btn btn-danger btn-lg mb-control-yes" >نعم</button>
                            <button class="btn btn-default btn-lg mb-control-close">لا</button>
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

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
                 <script type="text/javascript" src="js/demo_tables.js"></script>                
        <script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>    
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>   
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         
    </body>
</html>






