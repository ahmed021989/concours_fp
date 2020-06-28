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

$titre = "قائمة المناصب ";
$active_menu = "index";
$header = array('poste');
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
                    <h2>قائمة المناصب لسنة <?php echo $user->excercice; ?> <span class="fa fa-cogs"></span> </h2>
					 <a href="ajouter_poste.php"><button type="button" class="btn btn-success "> إضــافة منصب </button></a>
                </div>                   
                		<?php 
		
			
				$postes = Poste::trouve_tous_excercice($user->excercice);
		?>
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title">قائمة المناصب  </h3>
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
                                                <th> تحديــــث</th>
												 <th>تاريخ نهاية التسجيل</th>
                                                <th>تاريخ بداية التسجيل </th>
                                               
												<th>نمط التوظيف</th>
                                               <th>السنة المالية</th>
                                                <th>إسم المنصب</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
								foreach($postes as $poste){
										
									
								?>
                                            <tr id="<?php echo $poste->Id_poste; ?>">
											<td>
              <?php $existe_on_condidat=$poste->existe_on_condidat($poste->Nom_poste,$poste->excercice); ?>
												    <button class="btn btn-danger btn-rounded " onClick="<?php if($existe_on_condidat){ echo "alert('لا يمكنك الحذف هناك مترشحين مسجلين في هذا المنصب');";} else {?>delete_row('<?php echo $poste->Id_poste; ?>'); <?php }?> "  > <span class="glyphicon glyphicon-trash"></span></button>
										    <a href="edit_poste.php?id=<?php echo $poste->Id_poste; ?>" class="btn btn-info btn-rounded "> <span class="fa fa-pencil"></span></a>
                                            										    <a href="ajouter_date_convocation.php?id=<?php echo $poste->Id_poste; ?>" class="btn btn-success btn-rounded "> <span>تاريخ المسابقة</span></a>
											</td>
										 <td><strong><?php echo  html_entity_decode( $poste->Date_fin); ?></strong></td>
										  <td><strong><?php echo html_entity_decode($poste->Date_debut); ?></strong></td>
										   	 <td><strong> <?php  switch ($poste->Type_recr) {
																case "concour_sur_titre":
																	echo "توظيف على أساس الشهادة ";
																	break;
																case "concour_exam":
																	echo "توظيف على أساس الإختبار  ";
																	break;
																		} ?></strong></td>
                                                                        <td><strong><?php echo html_entity_decode($poste->excercice); ?></strong></td>
										  <td><strong><?php echo html_entity_decode($poste->Nom_poste); ?></strong></td>
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






