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
$titre = "الصفحة الرئيسية";
$active_menu = "index";
$header = array('file','ckeditor');
if ($user->type =='administrateur' or 'sous-directeur' or 'gestionnaire' or 'agent'){
	require_once("composit/header.php");
}


$cpt=0;
?>
            

                <!-- START BREADCRUMB -->

	  
	              
                <ul class="breadcrumb">
                 
					  <li class="active"><?php echo $titre ?></li>  
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2>قـــــائمة الإحصــــاءات <span class="glyphicon glyphicon-stats"></span> </h2>
                </div>                   
                
                <!-- PAGE CONTENT WRAPPER -->
				
			<?php	if ($user->type =='administrateur' ){ ?>
                <div class="page-content-wrap">
                
                   

                    <div class="row">
					
					
					 <!-- START WIDGETS -->  
					 <div class="col-md-3">
                            
                            <!-- START WIDGET CLOCK -->
                            <div class="widget  widget-item-icon"  style="background:#840344;" onmouseover="this.style.background='none'; Toolkit.getDefaultToolkit().beep();" onmouseout="this.style.background='#840344';">
							   <div class="widget-item-left">
                                  <span class="fa fa-tachometer"></span> 
								  </div>
								   <div class="widget-data">
                                <div class="widget-big-int plugin-clock">00:00</div>
								<div class="widget-title">-----------------</div>
                                 <div class="widget-title">الوقـت الحـالـي</div>
								
								</div>  </div>                       
                            <!-- END WIDGET CLOCK -->
                            
                        </div>
					  
                          <div class="col-md-3">

                            <div class="widget widget-item-icon" style="background:#037BA4;"  onclick="location.href='list_poste.php';" onmouseover="this.style.background='none';" onmouseout="this.style.background='#037BA4';" >
                                 <div class="widget-item-left">
                                    <span class="fa fa-briefcase"></span>
								  
                                </div>
                                <div class="widget-data" style="cursor:pointer">
                                   <div class="widget-int num-count"><?php  $SQL = $bd->requete("SELECT * FROM `poste`  where excercice='".$user->excercice."'") ;
																			$nbr = mysqli_num_rows($SQL);
																			echo $nbr;?></div>
                                    <div class="widget-title">منصب</div>
                                    <div class="widget-title"style="font-size:14px">لسنة <?php echo $user->excercice;  ?> </div>
                                </div>
                                                        
                            </div>

                        </div>
				
					
						
						<div class="col-md-3">

                            <div class="widget  widget-item-icon" style="background:#FA6B2F;" onclick="location.href='list_admin.php';"  onmouseover="this.style.background='none';" onmouseout="this.style.background='#FA6B2F';">
                                <div class="widget-item-left">
                                   
                                 <span class="fa fa-user"></span>
                                </div>
                                <div class="widget-data">
                                   <div class="widget-int num-count"><?php  $SQL = $bd->requete("SELECT * FROM `personne` where excercice='".$user->excercice."'") ;
																			$nbr = mysqli_num_rows($SQL);
																			echo $nbr;?></div>
                                    <div class="widget-title">مستخدم</div>
                                    <div class="widget-title"style="font-size:14px">لسنة <?php echo $user->excercice;  ?> </div>
                                </div>
                                                        
                            </div>

                        </div>
						 
                        <div class="col-md-3">
                            
                            <!-- START WIDGET REGISTRED -->
                            <div class="widget  widget-item-icon"  style="background:#04978D;"onclick="location.href='list_etab.php';"  onmouseover="this.style.background='none';" onmouseout="this.style.background='#04978D';">
                                <div class="widget-item-left">
                                 <span class="fa fa-hospital-o"></span>
                                </div>
                                <div class="widget-data">
                                   <div class="widget-int num-count"><?php  $SQL = $bd->requete("SELECT * FROM `etablissement`") ;
																			$nbr = mysqli_num_rows($SQL);
																			echo $nbr;?></div>
                                    <div class="widget-title">مؤسســــة </div>
                                    <div class="widget-title"style="font-size:14px">في قـــاعدة البيـــانات</div>
                                </div>                        
                            </div>                            
                            <!-- END WIDGET REGISTRED -->
                            
                        </div>
						 <!-- START WIDGET MESSAGES -->
						 
						 
						 
						 
                 <!--       <div class="col-md-3" >
                               <div class="widget  widget-item-icon"   style="background:#07204F;" onclick="location.href='list_direction.php';">
                           
                                <div class="widget-item-left">
                                    
                                 <span class="fa fa-home"></span>
                                </div>                             
                                <div class="widget-data" >
                                   <div class="widget-int num-count">  </div>
									
                                    <div class="widget-title">  مديرية الصحة </div>
                                    <div class="widget-subtitle">في قـــاعدة البيـــانات</div>
                                </div>      
                            </div>                    
                        </div>
						
						
						
						
						
						 END WIDGET MESSAGES -->
  
                
                   
                       

						
						 <div class="col-md-3">

                             <div class="widget  btn-block widget-item-icon" style="background:#886A08;" onclick="location.href='list_recours.php';" onmouseover="this.style.background='none';" onmouseout="this.style.background='#886A08';">
                                <div class="widget-item-left">
                                    <span class="fa fa-retweet"></span>
                                </div>
                                <div class="widget-data">
                                   <div class="widget-int num-count"><?php  $SQL = $bd->requete("SELECT * FROM `recours` where code IN  (select code from condidat where excercice='".$user->excercice."')") ;
																			$nbr = mysqli_num_rows($SQL);
																			echo $nbr?></div>
                                    <div class="widget-title">طعون</div>
                                    <div class="widget-title"style="font-size:14px">لسنة <?php echo $user->excercice;  ?> </div>
                                </div>
                                                       
                            </div>

                        </div>
						
						
						
                         <div class="col-md-3">

                           <div class="widget btn btn-warning btn-block widget-item-icon"  style="background:#B70309;;border:none" onclick="location.href='list_refuse.php';" onmouseover="this.style.background='none';" onmouseout="this.style.background='#B70309';">
                                 <div class="widget-item-left">
                                <span class="fa fa-times-circle-o"></span>
                                </div>
                                <div class="widget-data">
                                   <div class="widget-int num-count"><?php  $SQL = $bd->requete("SELECT * FROM dossier_accept,condidat where dossier_accept.accept='non' and dossier_accept.code =condidat.code and  excercice='".$user->excercice."' ") ;
																			$nbr = mysqli_num_rows($SQL);
																			echo $nbr;?></div>
                                    <div class="widget-title">	ملف مرفوض</div>
                                    <div class="widget-title"style="font-size:14px">لسنة <?php echo $user->excercice;  ?> </div>
                                </div>
                                                        
                            </div>

                        </div>             

                      
                
						
						
						
						
						  <div class="col-md-3">

                             <div class="widget widget-primary widget-item-icon" style="background:#10A003;" onmouseover="this.style.background='none" onclick="location.href='list_accepte.php';;" onmouseout="this.style.background='#10A003';">
                                <div class="widget-item-left">
                               
                                <span class="fa fa-check-square-o"></span>
                                </div>
                               <div class="widget-data">
                                   <div class="widget-int num-count"><?php   $SQL = $bd->requete("SELECT * FROM dossier_accept,condidat where dossier_accept.accept='oui' and dossier_accept.code =condidat.code and  excercice='".$user->excercice."' ") ;
																			$nbr = mysqli_num_rows($SQL);
																			echo $nbr;?></div>
                                    <div class="widget-title">ملف مقبول</div>
                                    <div class="widget-title"style="font-size:14px">لسنة <?php echo $user->excercice;  ?> </div>
                                </div>
                                             
                                                       
                            </div>

                        </div>
				
				
				   
				
						
						
						
						 <div class="col-md-3">

                            <div class="widget widget-danger widget-padding-sm widget-item-icon" style="background:#5207CA;"  onclick="location.href='list_cond_titre.php';" onmouseover="this.style.background='none';" onmouseout="this.style.background='#5207CA';">
                                <div class="widget-item-left">
                               <span class="fa fa-users"></span>
                                </div>
                                <div class="widget-data">
                                   <div class="widget-int num-count"><?php  $SQL = $bd->requete("SELECT * FROM `condidat` where excercice='".$user->excercice."'") ;
																			$nbr = mysqli_num_rows($SQL);
																			echo $nbr;?></div>
                                    <div class="widget-title">  مترشح مسجل </div>
                                    <div class="widget-title" style="font-size:14px">لسنة <?php echo $user->excercice;  ?> </div>
                                </div>
                                                        
                            </div>

                        </div>
						
						
						
						
						
						<?php  $date_j = date("Y-m-d");
 $postes = Poste::trouve_par_date($date_j);
 
							
				$nb= count($postes);			?>
                    </div>
                    <!-- END WIDGETS -->   
						<?php   if ($nb > 0)
						{							?>
					<div class="panel panel-default" >
                                 <ul class="panel-controls">
                                    <h3 class="panel-title"  > قائمـة المناصب المفتوحـة <span class="glyphicon glyphicon-align-right"></span> &nbsp;&nbsp;</h3>
                                </ul> 
								<?php 
								foreach($postes as $poste){
									if($poste->Date_fin >= date("Y-m-d") )
									{
									?>
								
                   <div class="panel-body" >						
                    	<div class="list-group border-bottom push-down-10"  >
                            <a href="" class="list-group-item active "> <?php echo  $poste->Date_fin ?> &nbsp; تاريخ نهاية التسجيل<span class="badge badge-info"> <?php echo  $poste->Nom_poste  ?>  </a>
                          
                         </div>
                   </div>
				<?php 		}
							}
							
					?>
				                    </div> 
									<?php } ?>
			   </div>
			<?php }?>
            
                       

               
                    </div>
                    <!-- END WIDGETS -->

                    </div>
                    <!-- END WIDGETS -->   
						
					
			   </div>
	
	
	
	
	<!-- eles if  -->   
	
	
	
	
	
	
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





