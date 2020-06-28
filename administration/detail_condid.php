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
if ( (isset($_GET['id'])) ) { 
		 $code = $_GET['id'];
$condidat =  Condidat::trouve_par_id($code);
$diplome = Diplome::trouve_par_id($code);
$dossier_accept = Dossier_accept::trouve_par_id($code);
$parcours1 = Parcours1::trouve_par_id($code);
$document_scan1 = Document_scan::trouve_par_id1($code);
$document_scan2 = Document_scan::trouve_par_id2($code);
$document_scan3 = Document_scan::trouve_par_id3($code);
//$formations= Formation::trouve_par_id($code);
	
		
	 } elseif ( (isset($_POST['id'])) ) { 
		 $code = $_POST['id'];
		 $condidat =  Condidat::trouve_par_id($code);
		$code = $condidat->code ;
		 $diplome =  diplome::trouve_par_id($code);
	
		 
	 } 
	 
	
//	 $condidat= new Condidat();
	 	
	

			
		


	



?>
<?php
$titre =html_entity_decode($condidat->nom_compler()) ;
$active_menu = "index";
$header = array('condidat');
if ($user->type =='administrateur' or 'sous-directeur' or 'gestionnaire' or 'agent'){
	require_once("composit/header.php");
}
?>
        

                 
    <!-- START BREADCRUMB --><ul class="breadcrumb">
					  <li><a href="index.php">الصفحة الرئيسية</a><?php echo "  /  " ?><a href="list_cond_titre.php">قائمة المترشحين على اساس الشهادة</a></li>  
					  <li class="active"><?php echo $titre ?></li>  
                </ul>
             
                <div class="page-title">                    
                    <h2><?php echo html_entity_decode("  المترشح ".$condidat->nom_compler()) ;?><span class="fa fa-pencil-square-o"></span>   </h2>
					 
                </div>   
                <!-- PAGE CONTENT WRAPPER -->
             
<div class="row">
          <div class="col-sm-12 " style="float:right;" >
          <div class="col-sm-12 " style="background:#F9690B;">
      <h2 style="color:#FFF;padding-top:10px"> <span class="fa fa-user"></span>   المعلومات الشخصية</h2>
          </div>
           <div class="col-sm-12 " style="background:#FFF;font-size:18px;float:left;direction:rtl">
         <?php 
		 echo html_entity_decode("<b>المترشح:  </b>".$condidat->nom_compler()) ;
		 echo html_entity_decode("<br><b> المنصب: </b>".$condidat->grade) ;
		  echo html_entity_decode("<br> <b> ابن:  </b>".$condidat->fils_de) ;
		   echo html_entity_decode(" <b> و: </b>".$condidat->et_fils_de) ;
		    echo html_entity_decode("<br><b> تاريخ الميلاد:  </b>".$condidat->date_naisance) ;
			   echo html_entity_decode(" <b> مكان الميلاد:  </b>".$condidat->lieu_naisance) ;
			    echo html_entity_decode("<br><b> الجنسية:  </b>".$condidat->nationalite) ;
			   echo html_entity_decode(" <br><b> متزوج: </b>".$condidat->marie) ;
			    echo html_entity_decode("<b> عدد الاولاد:  </b>".$condidat->nbr_enfants) ;
			   echo html_entity_decode("<br> <b> من ذوي حقوق الشهيد:</b>".$condidat->fils_chahid) ;
			    echo html_entity_decode("<br><b> من ذوي الاحتياجات الخاصة: </b>".$condidat->andicape) ;
			   echo html_entity_decode("<b> طبيعة الاعاقة: </b>".$condidat->nature_endicape."<br>") ;
			   
			    echo html_entity_decode("<b> البلدية: </b>".$condidat->commune) ;
				 echo html_entity_decode("<b> الولاية: </b>".$condidat->wilaya) ;
				 
				  echo html_entity_decode("<br><b> العنوان: </b>".$condidat->adresse) ;
				 echo html_entity_decode("<br><b> رقم الهاتف: </b>".$condidat->n_telephone) ;
				 	 echo html_entity_decode("<b> عنوان البريد الاليكتروني: </b>".$condidat->email) ;
					 if($condidat->sexe!="ذكر"){
						 echo "<br><b>الجنس:</b>".$condidat->sexe;
					 }
					 else{
					 echo "<br><b>الجنس:</b>".$condidat->sexe;
				echo html_entity_decode("<br><b> الوضعية تجاه الخدمة الوطنية: </b>".$condidat->service_national) ;
				 	 echo html_entity_decode("<br><b> مرجع الوثيقة: الرقم : </b>".$condidat->n_piece_sv) ;
					  echo html_entity_decode("<b> تاريخ الاصدار: </b>".$condidat->date_deliv_piece_sv) ;
					 }
		 ?>
         </div>
        </div>
      
        
          
</div>


  <br />
  <!-- fin partie 01 -->
      <!-- partie 02-->
       <!-- ##########################################-->
<div class="row">
          <div class="col-sm-12 " style="float:right;" >
          <div class="col-sm-12 " style="background:#039F78;">
      <h2 style="color:#FFF;padding-top:10px"> <span class="glyphicon glyphicon-list-alt"></span>   معلومات حول الشهادة</h2>
          </div>
           <div class="col-sm-12 " style="background:#FFF;font-size:18px;float:left;direction:rtl">
         <?php 
		 echo html_entity_decode("<b>تسمية الشهادة:  </b>".$diplome->nom_diplom) ;
		 echo html_entity_decode("<br><b> الشعبة: </b>".$diplome->nom_filiere) ;
		  echo html_entity_decode("<br> <b> التخصص:  </b>".$diplome->nom_specialite) ;
		   echo html_entity_decode(" <b> تاريخ الحصول على الشهادة (أو المؤهل) : </b>".$diplome->date_diplome) ;
		    echo html_entity_decode("<br><b> رقم:  </b>".$diplome->numero_diplome) ;
			   echo html_entity_decode("<br> <b> مدة التكوين للحصول على الشهادة:  </b> سنة/سنوات ".$diplome->dure_diplomeA) ;
			      echo html_entity_decode("<b> شهر </b>".$diplome->dure_diplomeM) ;
			    echo html_entity_decode("<br><b> من:  </b>".$diplome->dure_diplome_de) ;
			   echo html_entity_decode("<b> إلى: </b>".$diplome->dure_diplome_jusqua) ;
			    echo html_entity_decode("<br><b> المؤسسة المسلمة للشهادة:  </b>".$diplome->etablis_diplome) ;
			   
		 ?>
         </div>
        </div>
        
           
</div>

   <!--fin de parie 02 -->
     <!-- partie 03-->
       <!-- ##########################################-->
<div class="row">
          <div class="col-sm-12 " style="float:right;" >
          <div class="col-sm-12 " style="background:#550282;">
      <h2 style="color:#FFF;padding-top:10px"> <span class="fa fa-graduation-cap"></span>  معلومات حول المسار الدراسي</h2>
          </div>
           <div class="col-sm-12 " style="background:#FFF;font-size:18px;float:left;direction:rtl">
         <?php 
		 echo html_entity_decode("<b>الطالب الأول (Major) في الدفعة: تقدير الشهادة </b>".$parcours1->mention_diplome) ;
		 echo html_entity_decode("<br><b> السنة الدراسية: </b>".$parcours1->anne_major) ;
		  echo html_entity_decode("<br> <b> تاريخ الإصدار:  </b>".$parcours1->date_piece_major) ;
		   echo html_entity_decode(" <b> رقم الوثيقة : </b>".$parcours1->n_piece_major) ;
		   
			   
		 ?>
         <br /> <br /> 
      <center> <table  dir="ltr" class="table-hover table-bordered" id="table1" style="text-align:center">
   <tr style="text-align:center">
    <th  rowspan="2" valign="top" style="text-align:center">المعدل العام
مجموع معدل السنوات</th>
    <th  rowspan="2" valign="top">المعدل السنوي</th>
    <th  colspan="2" valign="top" style="text-align:center">معدل السداسي</th>
    <th  rowspan="2" valign="top">السنة</th>
  </tr>
  <tr>
    <th  valign="top">السداسي الثاني</th>
    <th  valign="top">السداسي الأول</th>
  </tr>
  <tr>
    <td  rowspan="8" valign="top" style="background-position:center;padding-top:70px;font-size:24px"><i align="right"><?php echo html_entity_decode($parcours1->moyen_general) ?>  </i></td>
    <td  valign="top"><i align="right"><?php echo html_entity_decode($parcours1->pr_anmy) ?>  </i></td>
    <td valign="top"><i align="right"><?php echo html_entity_decode($parcours1->pr_an2sm) ?>  </i></td>
    <td  valign="top"><i align="right"><?php echo html_entity_decode($parcours1->pr_an1sm) ?>  </i></td>
    <td  valign="top">1</td>
  </tr>
  <tr>
    <td  valign="top"><i align="right"><?php echo html_entity_decode($parcours1->dz_anmy) ?>  </i></td>
    <td  valign="top"><i align="right"><?php echo html_entity_decode($parcours1->dz_an2sm) ?>  </i></td>
    <td  valign="top"><i align="right"><?php echo html_entity_decode($parcours1->dz_an1sm) ?>  </i></td>
    <td  valign="top">2</td>
  </tr>
  <tr>
    <td valign="top"><i align="right"><?php echo html_entity_decode($parcours1->tr_anmy) ?>  </i></td>
    <td  valign="top"><i align="right"><?php echo html_entity_decode($parcours1->tr_an2sm) ?>  </i></td>
    <td  valign="top"><i align="right"><?php echo html_entity_decode($parcours1->tr_an1sm) ?>  </i></td>
    <td  valign="top">3</td>
  </tr>
  <tr>
    <td  valign="top"><i align="right"><?php echo html_entity_decode($parcours1->qt_anmy) ?>  </i></td>
    <td  valign="top"><i align="right"><?php echo html_entity_decode($parcours1->qt_an2sm) ?>  </i></td>
    <td  valign="top"><i align="right"><?php echo html_entity_decode($parcours1->qt_an1sm) ?>  </i></td>
    <td  valign="top">4</td>
  </tr>
  <tr>
    <td  valign="top"><i align="right"><?php echo html_entity_decode($parcours1->cq_anmy) ?>  </i></td>
    <td  valign="top"><i align="right"><?php echo html_entity_decode($parcours1->cq_an2sm) ?>  </i></td>
    <td  valign="top"><i align="right"><?php echo html_entity_decode($parcours1->cq_an1sm) ?>  </i></td>
    <td  valign="top">5</td>
  </tr>
  <tr>
    <td  valign="top"><i align="right"><?php echo html_entity_decode($parcours1->six_anmy) ?>  </i></td>
    <td  valign="top"><i align="right"><?php echo html_entity_decode($parcours1->six_an2sm) ?>  </i></td>
    <td  valign="top"><i align="right"><?php echo html_entity_decode($parcours1->six_an1sm) ?>  </i></td>
    <td  valign="top">6</td>
  </tr>
  <tr>
    <td  valign="top"><i align="right"><?php echo html_entity_decode($parcours1->sept_anmy) ?>  </i></td>
    <td  valign="top"><i align="right"><?php echo html_entity_decode($parcours1->sept_an2sm) ?>  </i></td>
    <td  valign="top"><i align="right"><?php echo html_entity_decode($parcours1->sept_an1sm) ?>  </i></td>
    <td  valign="top">7</td>
  </tr>
  <tr>
    <td  valign="top"><i align="right"><?php echo html_entity_decode($parcours1->huit_anmy) ?>  </i></td>
    <td valign="top"><i align="right"><?php echo html_entity_decode($parcours1->huit_an2sm) ?>  </i></td>
    <td  valign="top"><i align="right"><?php echo html_entity_decode($parcours1->huit_an1sm) ?>  </i></td>
    <td  valign="top">8</td>
  </tr>
</table></center>
         
         </div>
        </div>
        
        
</div><br />
<center><a  style="font-size:24px"  href="../sauvgarde/pdf/imprimer_fiche.php?code=<?php  echo $code;?>" target="_blank"><span class="fa fa-file-pdf-o"></span>  الاستمارة كاملة </a></center>






<br /><br />
<hr style="border:1px solid #000" />
   <!--fin de parie 03 -->
   
    <form class="form-horizontal" role="form"  name="ajout_admin" action="<?php echo $_SERVER['PHP_SELF']."?id=".$code?>" method="post">
    
                
            <!-- debut  modal accept-->





<div class="row">

 <div class="col-sm-12 pull-left" >
  <div class="col-sm-12 " style="background:#960243;">
      <h2 style="color:#FFF;padding-top:10px"> <span class="glyphicon glyphicon-info-sign"></span> وضعية المترشح </h2>
          </div>

               <div id="divmodal">
 <textarea  class=""name="cause_refuse" id="cause_refuse" style="direction:ltr;text-align:right;direction:rtl;  height:100px;width:45%; font-size:16px;font-weight:bold;color:#000"  placeholder="  أدخل سبب رفض الملف"  ></textarea>
            <!--   المحتوى <b style="color:#F00">*</b><div dir="ltr" class="text"><textarea  class="form-control keyboardInput" name="message" id="message" oninvalid="this.setCustomValidity('الرجاء ادخال محتوى الطعن')" style="direction:ltr;text-align:right;direction:rtl;  height:150px;font-size:24px;font-weight:bold;color:#000" oninput="setCustomValidity(''); changer_lettre(this.id)" required></textarea> -->
          </div>
               
            

            <button class="btn btn-danger btn-lg " type="submit" name="refuse" id="refuse" style="border-radius:12px;width:45%">رفض</button>

             
             <span style="font-size:36px">أم</span><button class="btn btn-success btn-lg" type="submit" name="accept" id="accept" style="border-radius:12px;width:45%;" >مقبول</button>
    </div>  
      </div><!--fin row--> 
<!--  fin modal refuse-->

<!--
<div id="modal_accept" class="modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg " role="dialog" >
        <div class="modal-content">
            <div class="modal-header">
               
            </div>
            <div class="modal-body">
              <p style="font-size:16px;color:#009;font-weight:bold"> سبب الرفض </p>
               <div id="divmodal">
          <textarea name="cause_refuse" id="cause_refuse" style="direction:ltr;text-align:right;direction:rtl;  height:150px;width:70%; font-size:24px;font-weight:bold;color:#000" oninput="setCustomValidity(''); " oninvalid="this.setCustomValidity('الرجاء إدخال سبب الرفض')" placeholder="أدخل سبب رفض الملف" required ></textarea>
            <!--   المحتوى <b style="color:#F00">*</b><div dir="ltr" class="text"><textarea  class="form-control keyboardInput" name="message" id="message" oninvalid="this.setCustomValidity('الرجاء ادخال محتوى الطعن')" style="direction:ltr;text-align:right;direction:rtl;  height:150px;font-size:24px;font-weight:bold;color:#000" oninput="setCustomValidity(''); changer_lettre(this.id)" required></textarea> -->
          <!--     </div>
               
            

             

   
              
            <div class="modal-footer">
     <center>            
<button type="submit" id='accept' name="accept" class="btn btn-success btn-rounded" >إبعث</button>  
           
          
<button type="submit" id='fermer' class="btn btn-danger btn-rounded" >خروج</button>   
               </center>
            </div>
        </div>
    </div>
</div>
</div>

-->   
           
  </form>  
   
            <!-- END PAGE CONTENT -->
       
        <!-- END PAGE CONTAINER -->
<center><nav class="navbar navbar-default navbar-fixed-bottom " style="background-color:rgba(52,73,94,0.3);position:inherit">
    <div class="container">
        <?php
if(isset($_POST['accept'])){
	$sql_upd="update dossier_accept set accept=\"oui\", cause='' where code='".$code."'";
	$bd->requete($sql_upd);
	
	
	//--------------------
	$destinataire = $condidat->email;
			$envoyeur	='mail_eph-tenes';
     			$sujet = 'Email  DE CONFIRMATION';
     			$message = "Bonjour ".$condidat->nom_compler()." !\n تم قبول ملفك  بالحساب   ".$condidat->grade."   للمشاركة في منصب: ".$condidat->grade."لإستخراج الإستدعاء أدخل إلى البوابة";
	   $headers ='From: EPH BOURAS <mail_eph-bou>'."\n" .
'Reply-To: <mail_eph-bou>'. "\n" .
     				'X-Mailer: PHP/' . phpversion();
	     		$envoye = mail($destinataire, $sujet, $message, $headers);
			if ($envoye){
     				echo "<script>alert('تم ارسال رسالة قبول الملف إلى البريد الإليكتروني ');</script>";
			}else{
			echo "<script>alert('خطاء في ارسال رسالة القبول') ;</script>";	
			}
	//--------------------
	
	
	
//	$dossier_accept->accept= htmlentities("non");
	echo "<script>window.location.replace(\"list_cond_titre.php\");</script>";
}

if(isset($_POST['refuse'])){
	
	$sql_upd="update dossier_accept set accept=\"non\" , cause=\"".$_POST['cause_refuse']."\"  where code='".$code."'";
	$bd->requete($sql_upd);

	//--------------------
	$destinataire = $condidat->email;
			$envoyeur	='mail_eph-tenes';
     			$sujet = 'dosiier refuse';
     			$message = "Bonjour ".$condidat->nom_compler()." !\r\n تم رفض ملفك بحساب ".$condidat->code." للمشاركة في منصب: ".$condidat->grade."\n بسبب:".$_POST['cause_refuse']."\n إذا كنت تريد إرسال طعن أدخل إلى البوابة";
	      $headers ='From: EPH BOURAS <mail_eph-bou>'."\r\n" .
'Reply-To: <mail_eph-bou>'. "\r\n" .
     				'X-Mailer: PHP/' . phpversion();
	     		$envoye = mail($destinataire, $sujet, $message, $headers);
			if ($envoye){
     				echo "<script>alert('تم ارسال رسالة رفض الملف إلى البريد الإليكتروني ')</script>";
			}else{
			echo "<script>alert('خطاء في ارسال رسالة الرفض')</script>";	
			}
	//--------------------
	
//	$dossier_accept->accept= htmlentities("non");

	echo "<script>window.location.replace(\"list_cond_titre.php\");</script>";
} 
?>

 
              
 <div id="modal_refuse" class="modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg " role="dialog" >
        <div class="modal-content">
            <div class="modal-header">
               
            </div>
            <div class="modal-body">
<p style="font-size:16px;color:#009;font-weight:bold"> سبب الرفض </p>
               <div id="divmodal">
          <textarea name="cause_refuse" id="cause_refuse" style="direction:ltr;text-align:right;direction:rtl;  height:150px;width:70%; font-size:24px;font-weight:bold;color:#000"   placeholder="أدخل سبب رفض الملف" required ></textarea>
            <!--   المحتوى <b style="color:#F00">*</b><div dir="ltr" class="text"><textarea  class="form-control keyboardInput" name="message" id="message" oninvalid="this.setCustomValidity('الرجاء ادخال محتوى الطعن')" style="direction:ltr;text-align:right;direction:rtl;  height:150px;font-size:24px;font-weight:bold;color:#000" oninput="setCustomValidity(''); changer_lettre(this.id)" required></textarea> -->
          </div>
               
            

             

   
              
            <div class="modal-footer">
     <center>            
           <button type="submit" id='refuse' name="refuse" class="btn btn-success btn-rounded" >رفض</button>  
           
          
               <button type="submit" id='fermer' class="btn btn-danger btn-rounded" data-dismiss="modal">خروج</button>   
               </center>
            </div>
        </div>
    </div>
</div>
</div>        
            <br />
          
      
      </span>
       
    </div>
  
</nav></center>
</div>

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
        <!-- END THIS PAGE PLUGINS-->        
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-datepicker.js"></script>                
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
		  <script type='text/javascript' src='js/plugins/maskedinput/jquery.maskedinput.min.js'></script>
        <!-- END THIS PAGE PLUGINS -->       
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>              
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
 <script>
   $(document).ready(function(){


// Get the <span> element that closes the modal


// When the user clicks on <span> (x), close the modal
 $("#cause_refuse").on('input', function() {
	$('#cause_refuse').css("background-color","white"); 
 });
 $("#refuse").click(function(){

  $('#cause_refuse').attr("required",'true') ;
  if($('#cause_refuse').val()==''){
$('#cause_refuse').css("background-color","red");
  }
	   // $('#cause_refuse').attr("onfocus","setCustomValidity('الرجاء إدخال سبب الرفض'); ") ;

});

 $("#accept").click(function(){
  $('#cause_refuse').removeAttr("required");


//$('#cause_refuse').attr("onfocus","setCustomValidity(''); ") ;
  
});

});



   
   
   </script>
    <!-- END TEMPLATE -->
		
    <!-- END SCRIPTS -->  
  
   
    <style>
	::-webkit-input-placeholder {
   font-style: italic;
   font-size:14px;
}
:-moz-placeholder {
   font-style: italic;  
      font-size:14px;
}
::-moz-placeholder {
   font-style: italic;  
      font-size:14px;
}
:-ms-input-placeholder {  
   font-style: italic; 
      font-size:14px;
}
	</style>     
    </body>
</html>






