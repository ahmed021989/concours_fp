<?php
require_once("includes/initialiser.php");
if(!$session->is_logged_in()) {

	readresser_a("login.php");

}else{
	$user = Personne::trouve_par_id($session->id_utilisateur);
	$accestype = array('administrateur' or 'sous-directeur' or 'gestionnaire' or 'agent');
	if( !in_array($user->type,$accestype)){ 
		//contenir_composition_template('simple_header.php'); 
		$msg_system ="vous n'avez pas le droit d'accéder a cette page  ccsdcsdc";
		echo system_message($msg_system);
		// contenir_composition_template('simple_footer.php');
		exit();
	} 
}
?><?php 
$titre = "معايير الانتقاء  ";
$active_menu = "index";
$header = array('condidat');
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
                    <h2>  قائمة المترشحين على أساس الشهادة &nbsp;&nbsp;<span class="fa fa-file-text"></span></h2> 
				
                </div>                   
                		<?php 
			//$condidats = Condidat::trouve_tous1();
		$dossier_accepts = Dossier_accept::trouve_tous1();
		?>
        
        
    
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title">&nbsp; معايير الانتقاء</h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>                                
                                </div>
                                <div class="panel-body">
                                    <table class="table datatable" style="text-align:right">
                                        <thead style="text-align:right">
                                            <tr>
                                                <th>تفاصيل</th>
                                             
                                                <th>المنصب</th>
												<th>تاريخ الازدياد</th>
                                                <th>الإسم و اللقب</th>
												   <th>اسم المستخدم</th>
                                            </tr>
                                        </thead>
                                        <tbody>
	<?php

					
		foreach($dossier_accepts as  $dossier_accept){
				
								
	$condidat= Condidat::trouve_par_id($dossier_accept->code);				
								?>
                                            <tr id="<?php echo $condidat->code; ?>">
											<td>
                                            <?php
 $notes=Notes::trouve_par_id($condidat->code);
 if(!empty($notes)){
 
	  ?>
                                            
 <a href="edit_critere_selection.php? id=<?php echo $condidat->code;  ?>" class="btn btn-danger btn-rounded "> <span class="fa fa-pencil"></span><span>تعديل النقاط </span> </a>   
 <?php }?>
	<a href="critere_selection.php? id=<?php echo $condidat->code;  ?>" class="btn btn-info btn-rounded "> <span class="fa fa-cogs"></span><span>تسيير النقاط </span> </a>										
                                            </td>
										
										 
										   	 <td><strong><?php echo  html_entity_decode( $condidat->grade); ?> </strong></td>
										  
										   <td><strong><?php echo  html_entity_decode( $condidat->date_naisance); ?></strong></td>
										   <td><strong><?php echo  html_entity_decode( $condidat->nom_compler()); ?></strong></td>
										   
										   <td><strong><?php echo  html_entity_decode( $condidat->code); ?></strong></td>
                                    </tr>
                                   <?php
								}
                                 ?>       </tbody>
                                    </table>
                                </div>
                            </div>
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
		<div class="message-box message-box-danger animated fadeIn" id="message-box-danger" data-sound="fail" >
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title" style = "text-align :right;"> !!! تحذيــــــــر   </div>
                    <div class="mb-content">
                                             <p style = "text-align :right; font-size: 25px; " >هل نت متأكد أنك تريد حذف هــذا المنصب ؟؟</p>                    
                       <p style = "text-align :right; font-size: 25px; " >. إضغط لا إن كنت لا تريد حذف المنصب ؟ إضغط نعم لحذف المنصب </p>
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






