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
$titre = "قائمة الطعون  ";
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
                    <h2>  قائمة الطعون لسنة <?php echo $user->excercice; ?>&nbsp;&nbsp;<span class="fa fa-file-text"></span></h2> 
				
                </div>                   
                		<?php 
			$condidats = Condidat::trouve_tous_excercice($user->excercice);
			$dossier_accepts = Dossier_accept::trouve_tous2();
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
                                
                                
                                
                                
                                
                                
                                
                                
 <!-- traitement des recours-->
 <!--#########################################-->
          <table class="table datatable table-bordered" style="text-align:right;direction:rtl">
 <thead> <th>اسم المستخدم</th><th>الاسم واللقب</th><th>محتوى الطعن</th><th> تاريخ الطعن</th><th>ملف المترشح</th><th>الصورة المرفقة</th></thead><tbody>
 <?php
 foreach($dossier_accepts as  $dossier_accept){
   if( $condidat= Condidat::trouve_par_id_excercice($dossier_accept->code,$user->excercice)){
	//echo $dossier_accept->code;
	$recour= Recours::trouve_par_id(html_entity_decode($dossier_accept->code));
	
	if($recour){
	echo "<tr><td>".$condidat->code."</td><td>".$condidat->nom_compler()."</td><td>".$recour->contenu."</td><td>".$recour->date_recour." ".$recour->heure_recour."</td>";
	?>
   <td> <a href="detail_condid.php?id=<?php echo $condidat->code;  ?>" class="btn btn-info"> <span class="glyphicon glyphicon-eye-open"></span> </a>	</td>
    <?php
	if($recour->lien_doc=="non"){
		echo "<td></td></tr>";
	}
	else{
	echo "<td><img style='width:100px;height:100px' name='imga' id='imga' src='../".$recour->lien_doc."' class='img-thumbnail'   onClick='affiche(this)' ></td></tr>";	
	}
	//echo $recour->contenu;
	

	}
   }
 }
 ?>
 
 </tbody></table>

 <!--#########################################-->
 <!-- fin taraitement des recours-->
 
                       
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
        
        <!-- MODAL APERCU-->
         
 <div class="modal "  id="modal_apercu" dir ="ltr" style="background:rgba(1,1,1,0.9);" >
         <div class="modal-dialog scroll" >
 
<button id="ferm"  style="color:#F00; float:right;background:none;border:none;font-size:24px;font-weight:bold"  onclick="hida()">X</button>
 <br /> 
<div class="scrollable">
             
  <img id="img01" class="img-thumbnail" alt="sddsd" style="height:635px" >
    </div>
      
  <div id="caption" style="color:#F00"></div>
</div>
</div>
<!--FIN MODAL APERCU-->
<style>
#imga:hover{
	background:rgba(255,255,255,0.3);
	cursor:pointer;
	
}

</style>
                <script>
function affiche(img){
	
	var modal = document.getElementById('modal_apercu');
	var modalImg = document.getElementById('img01')
	var captionText = document.getElementById("caption");
	
    modal.style.display = "block";
    modalImg.src = img.src;
	
//alert(modalImg.src);
    captionText.innerHTML = img.alt;
	//alert(captionText.innerHTML);
	// img.id.css('visibility','hidden');
	
}
function hida(){
var modal = document.getElementById('modal_apercu');
   modal.style.display = "none";
	 $('#img1').css('visibility','visible');
	$('#img2').css('visibility','visible');
// When the user clicks on <span> (x), close the modal

}
</script>
        
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






