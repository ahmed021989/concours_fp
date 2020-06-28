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
		 $edit =  Poste::trouve_par_id($id);
		 $edit_specialite=Specialite_demmande::trouve_par_sql("select * from specialite_demmande where poste='".$edit->Nom_poste."'");
	 } elseif ( (isset($_POST['id'])) &&(is_numeric($_POST['id'])) ) { 
		 $id = $_POST['id'];
		 $edit =  Poste::trouve_par_id($id);
	 } else { 
			$msg_error = '<p class="error">Cette page a été consultée par erreur</p>';
		} 
		
	?>
    
    <?php
	
	if(isset($_POST['submit'])){
	$errors = array();
	
	// verification de données 	
	
		
	
	// new object document
		$specialite_demmande = new Specialite_demmande();
 $SQL = $bd->requete("SELECT * FROM `specialite_demmande`") ;
																	$nbr_doc = 0;
																	while ($row=mysqli_fetch_array($SQL)){	
		$nbr_doc=$row['id']+1;
			}
$specialite_demmande->id =$nbr_doc;
	$specialite_demmande->specialite = htmlentities(trim($_POST['nom_specialite_demmande']));
	
	$specialite_demmande->poste = htmlentities(trim($_POST['poste']));
	
	if (empty($errors)){
   		if ($specialite_demmande->existe()) {
			$msg_error = '<p style= "font-size: 20px; ">  !!??  يـوجد من قبل " ' . $specialite_demmande->specialite . ' " </p><br />';
			
		}else{
			$specialite_demmande->save();
 		$msg_positif = '<p style= "font-size: 20px; ">   تم تسجيــــل  " ' . $specialite_demmande->specialite . ' "   ... بنجــــاح        </p><br />';
	 header("Location:".$_SERVER['PHP_SELF']."?id=".$id."");
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
$titre = "تحديث التخصصات";
$active_menu = "index";
$header = array('specialite_demmande');
if ($user->type =='administrateur' or 'sous-directeur' or 'gestionnaire' or 'agent'){
	require_once("composit/header.php");
}
?>
        

                 
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
					  <li><a href="index.php">الصفحة الرئيسية</a> &nbsp;/ &nbsp;  <a href="list_specialite.php">التخصصات المطلوبة</a>  </li>  
					 
                        <li class="active"><?php echo $titre ?></li>  
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2> تحديث التخصصات <span class="fa fa-plus-square"></span> </h2>
                </div>   
                
                
                <form class="form-horizontal" role="form"   action="<?php echo $_SERVER['PHP_SELF']."?id=".$id?>" method="post">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   
                                    <ul class="panel-controls">
                                        <li> <h3 class="panel-title"><strong>المعلومات الخاصة التخصص المطلوبة</strong></h3></li>
                                    </ul>
                                </div>
                                <div class="panel-body">
                                <p>
                                  <?php 
										if (!empty($msg_error)){
											echo error_message($msg_error); 
										}elseif(!empty($msg_positif)){ 
											echo positif_message($msg_positif);	
										}elseif(!empty($msg_system)){ 
											echo system_message($msg_system);
										} ?>
                                </p>
                                <div class="panel-body">  

                                    
								    
	  <div class="form-group" style ="dir:rtl;"  >
                                        <div class="col-md-6 col-xs-12">
		<select class="form-control select" id="poste"  name= "poste" required  style= "text-align:rtl;"  data-live-search="true" >
															  <option> <?php echo $edit->Nom_poste; ?></option>
															<?php /*?> <?php   
	   
$query="select * from poste";
	   $dat_fin=null;
	   $incr=0;
$result=mysqli_query($connec,$query);
$postes = Poste::trouve_tous();

 foreach($postes as $poste){	
 echo "<option style=\"color:#000;text-align-last: center;font-weight:bold;\"  >".$poste->Nom_poste."</option>";
}   
?>                                                 <?php */?>
</select> 
												
                                        </div>
                                        <label class="col-md-3 col-xs-12 control-label"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;المنصب </label>
                                    </div> 
                                    
                                    <div class="form-group" style ="dir:rtl;" >
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon">AR</span>
                                                <input type="text" name ="nom_specialite_demmande" class="form-control"   style= "text-align:right;" data-live-search="true"  />
                                            </div>                                            
                                        </div>
                                        <label class="col-md-3 col-xs-12 control-label">اسم التخصص</label>
                                    </div>
                                      <button class="btn btn-info pull-left" type = "submit" name = "submit">إضافة</button>
                                      
                                   
                                    
                                   
									
									
									
                                  
                              
                                <div class="panel-footer">
                                    
                                  
                                    <p>&nbsp;</p>
                                    <div class="panel-body">
                                     <b><p style="color:#F00;direction:rtl">  اذا كانت جميع التخصصات مقبولة الرجاء ترك القائمة فارغة</p></b>
                                      <p style="direction:rtl;font-size:24px"><u><b>قائمة التخصصات المطلوبة في منصب  :<?php echo $edit->Nom_poste; ?></b></u></p>
                                      <table class="table table-bordered" style="direction:rtl"  id="customers3">
                                        <tr>
                                          <td>اسم التخصص</td>
                                          <td>حذف</td>
                                        </tr>
                                        <?php foreach($edit_specialite as $edit_specialit){?>
                                        <tr id="<?php echo $edit_specialit->id;  ?>">
                                          <td><div class="input-group">
                                            <label name="<?php echo $edit_specialit->specialite; ?>" class="form-control"  style= "text-align:right;" value = "<?php echo $edit_specialit->specialite;  ?>" ><?php echo $edit_specialit->specialite; ?></label>
                                          </div></td>
                                          <td><p class="btn btn-danger btn-rounded "  onclick="delete_row('<?php echo $edit_specialit->id;?>');"><span class="glyphicon glyphicon-trash"></span></p></td>
                                        </tr>
                                        <?php }?>
                                      </table>
                                      <div class="form-group"></div>
                                    </div>
                                    <p>&nbsp;</p>
                                </div>
</div>
                              </form>
                           
                
                <!-- PAGE CONTENT WRAPPER --><!-- END PAGE CONTAINER -->

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

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
                <script type="text/javascript" src="js/demo_tables.js"></script>  
        <script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>    
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>   
    <!-- END SCRIPTS -->           
        <!-- END TEMPLATE -->
        <div class="message-box message-box-danger animated fadeIn" id="message-box-danger" data-sound="fail" >
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title" style = "text-align :right;"> !!! تحذيــــــــر   </div>
                    <div class="mb-content">
                                             <p style = "text-align :right; font-size: 25px; " >هل نت متأكد أنك تريد حذف هذا التخصص</p>                    
                       <p style = "text-align :right; font-size: 25px; " >. إضغط لا إن كنت لا تريد حذف التخصص ؟ إضغط نعم لحذف  التخصص </p>
                    </div>
                    <div class="mb-footer">
                           <button class="btn btn-danger btn-lg mb-control-yes" >نعم</button>
                            <button class="btn btn-default btn-lg mb-control-close">لا</button>
                    </div>
                </div>
            </div>
        </div>
       
			
    <!-- END SCRIPTS -->           
    </body>
</html>






