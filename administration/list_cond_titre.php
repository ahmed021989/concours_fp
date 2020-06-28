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
$titre = "قائمة المترشحين على أساس الشهادة  ";
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
			$condidats = Condidat::trouve_tous_excercice($user->excercice);
			;
		?>
        
        
    
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title">&nbsp;</h3>
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
                                             <th>تاريخ التسجيل</th>
                                                <th>المنصب</th>
											<th>تاريخ الازدياد</th>
                                                <th>الإسم و اللقب</th>
											<th class="fix" >اسم المستخدم</th>
                                            </tr>
                                        </thead>
                                        <tbody>
	<?php

					
		foreach($condidats as  $condidat){
										
									
								?>
                                            <tr id="<?php echo $condidat->code; ?>">
											<td>
                                            
  <?php
  	
$dossier_accepts = Dossier_accept::trouve_par_id($condidat->code);

$compte = Compte::trouve_par_id($condidat->code);

				
 
if($dossier_accepts ->accept=="?"	){
echo " <a class=\"btn btn-warning\"><span >? غير مصنف</span></a>";	
}
else
if($dossier_accepts ->accept=="non"	){
echo " <a class=\"btn btn-danger\"> <span class=\"glyphicon glyphicon-remove\">مرفوض</span> </a>";	
}
else
if($dossier_accepts ->accept=="oui"	){
echo "  <a class=\"btn btn-success\"> <span class=\"glyphicon glyphicon-saved\">مقبول</span> </a>";	
}

  
   ?>
   <a  style="font-size:24px"  href="../sauvgarde/pdf/imprimer_fiche.php?code=<?php echo $condidat->code;  ?>" target="_blank"><span class="fa fa-file-pdf-o " style="background:#F00"></span>  </a>
	<a href="detail_condid.php?id=<?php echo $condidat->code;  ?>" class="btn btn-info btn-rounded"> <span >ملف المترشح</span> </a>										
                                            </td>
										
										  <td style="font-size:14px"><strong><?php echo  $compte->date_inscr." ". $compte->heure_inscr; ?> </strong></td>
										   	 <td><strong><?php echo   $condidat->grade; ?> </strong></td>
										  
										   <td><strong><?php echo   $condidat->date_naisance; ?></strong></td>
										   <td><strong><?php echo   $condidat->nom_compler(); ?></strong></td>
										   
										   <td  class="fix"><strong><?php echo   $condidat->code; ?></strong></td>
                                    </tr>
                                   <?php
								}
                                 ?>       </tbody>
                                    </table>
                                </div>
                            </div>
                            <div style="border:1px solid #99C;border-raduis:5px">
                             <?php
 $postes= Poste ::trouve_tous_excercice($user->excercice);
 ?>
                     <form action="liste_tous_word.php" method="post">
                            
                      <select class="form-control  pull-right" id="01" name="select_tous" style="width:40%;font-weight:bold;text-text-align-last: center;" > 
                                <option id="01" style="font-weight:bold;text-align-last:center;"><?php if(isset($_POST['poste'])){ echo $_POST['poste'];} else echo " ************************ إختر المنصب ***************** "?></option>
<?php foreach($postes as  $poste){ ?>
<option id="01" style="font-weight:bold;text-align:center"><?php  echo $poste->Nom_poste;?></option>
<?php
}
?>
   </select>
    &nbsp;
  <b><button class="btn btn-info btn-rounded pull-right " type="submit" value="تحميل"  name="envoyer"><span class="" style="font-weight:bold;font-size:18px"><b><img src='img/icons/word.png' width="24"/> تحميل  القائمة</b></span></button></b></form>
                           <br />
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
<style>
 .fix{
width:20px !important;
}
</style>
        <!-- START TEMPLATE -->
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>   
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         
    </body>
</html>






