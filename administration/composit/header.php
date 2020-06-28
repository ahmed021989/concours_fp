<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title><?php echo $titre; ?></title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- END META SECTION -->
        <link rel="icon" type="image/png" href="img/logo.png" />
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->    
	<style>
	
	</style>	
		
	
	<script language="javascript" type="text/javascript">
		function getXMLHTTP() { //fuction to return the xml http object
				var xmlhttp=false;	
				try{
					xmlhttp=new XMLHttpRequest();
				}
				catch(e)	{		
					try{			
						xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
					}
					catch(e){
						try{
						xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
						}
						catch(e1){
							xmlhttp=false;
						}
					}
				}
					
				return xmlhttp;
			}
	</script>
	
	
	<?php if (in_array('direction',$header)){?>	
	<script language="javascript" type="text/javascript">
		function supprecrut(id,divlist) {		
				
				var strURL="ajax/listedirection.php?id="+id+"&list="+divlist;
				var req = getXMLHTTP();
				
				if (req) {
					
					req.onreadystatechange = function() {
						if (req.readyState == 4) {
							// only if "OK"
							if (req.status == 200) {						
							//	document.getElementById(divlist).innerHTML=req.responseText;
														
							} else {
								alert("Problem while using XMLHTTP:\n" + req.statusText);
							}
						}				
					}			
					req.open("GET", strURL, true);
					req.send(null);
				}
			}
			
	</script>
	<?php }?>	
		 <?php if (in_array('etablissement',$header)){?>	
	<script language="javascript" type="text/javascript">
		function supprecrut(id,divlist) {		
			alert(id);	
				var strURL="ajax/listeetablissment.php?id="+id+"&list="+divlist;
				var req = getXMLHTTP();
				
				if (req) {
					
					req.onreadystatechange = function() {
						if (req.readyState == 4) {
							// only if "OK"
							if (req.status == 200) {						
							//	document.getElementById(divlist).innerHTML=req.responseText;
														
							} else {
								alert("Problem while using XMLHTTP:\n" + req.statusText);
							}
						}				
					}			
					req.open("GET", strURL, true);
					req.send(null);
				}
			}
			
	</script>
	<?php }?>	
    <?php if (in_array('document_demande',$header)){?>	
	<script language="javascript" type="text/javascript">
		function supprecrut(id,divlist) {		
				
				var strURL="ajax/listedocument.php?id="+id+"&list="+divlist;
				
				var req = getXMLHTTP();
				
				if (req) {
					
					req.onreadystatechange = function() {
						if (req.readyState == 4) {
							// only if "OK"
							if (req.status == 200) {						
							//	document.getElementById(divlist).innerHTML=req.responseText;
														
							} else {
								alert("Problem while using XMLHTTP:\n" + req.statusText);
							}
						}				
					}			
					req.open("GET", strURL, true);
					req.send(null);
				}
			}
			
	</script>
	<?php }?>	
		<?php if (in_array('admin',$header)){?>	
	<script language="javascript" type="text/javascript">
		function supprecrut(id,divlist) {		
				
				var strURL="ajax/listeadmin.php?id="+id+"&list="+divlist;
				var req = getXMLHTTP();
				
				if (req) {
					
					req.onreadystatechange = function() {
						if (req.readyState == 4) {
							// only if "OK"
							if (req.status == 200) {						
							//	document.getElementById(divlist).innerHTML=req.responseText;
														
							} else {
								alert("Problem while using XMLHTTP:\n" + req.statusText);
							}
						}				
					}			
					req.open("GET", strURL, true);
					req.send(null);
				}
			}
			
	</script>
	<?php }?>	
<?php if (in_array('poste',$header)){?>	
	<script language="javascript" type="text/javascript">
		function supprecrut(id,divlist) {		
				
				var strURL="ajax/listeposte.php?id="+id+"&list="+divlist;
				var req = getXMLHTTP();
				
				if (req) {
					
					req.onreadystatechange = function() {
						if (req.readyState == 4) {
							// only if "OK"
							if (req.status == 200) {						
							//	document.getElementById(divlist).innerHTML=req.responseText;
														
							} else {
								alert("Problem while using XMLHTTP:\n" + req.statusText);
							}
						}				
					}			
					req.open("GET", strURL, true);
					req.send(null);
				}
			}
			
	</script>
	<?php }?>	
    
    
    <?php if (in_array('diplome_demmande',$header)){?>	
	<script language="javascript" type="text/javascript">
		function supprecrut(id,divlist) {		
				
				var strURL="ajax/listediplome_demande.php?id="+id+"&list="+divlist;
				var req = getXMLHTTP();
				
				if (req) {
					
					req.onreadystatechange = function() {
						if (req.readyState == 4) {
							// only if "OK"
							if (req.status == 200) {						
							//	document.getElementById(divlist).innerHTML=req.responseText;
														
							} else {
								alert("Problem while using XMLHTTP:\n" + req.statusText);
							}
						}				
					}			
					req.open("GET", strURL, true);
					req.send(null);
				}
			}
			
	</script>
	<?php }?>	
    
    
    
    
    <?php if (in_array('specialite_demmande',$header)){?>	
	<script language="javascript" type="text/javascript">
		function supprecrut(id,divlist) {		
				
				var strURL="ajax/listespecialite_demande.php?id="+id+"&list="+divlist;
				var req = getXMLHTTP();
				
				if (req) {
					
					req.onreadystatechange = function() {
						if (req.readyState == 4) {
							// only if "OK"
							if (req.status == 200) {						
							//	document.getElementById(divlist).innerHTML=req.responseText;
														
							} else {
								alert("Problem while using XMLHTTP:\n" + req.statusText);
							}
						}				
					}			
					req.open("GET", strURL, true);
					req.send(null);
				}
			}
			
	</script>
	<?php }?>	
    
    
    
    
    
     <?php if (in_array('filliere_demmande',$header)){?>	
	<script language="javascript" type="text/javascript">
		function supprecrut(id,divlist) {		
				
				var strURL="ajax/listefilliere_demande.php?id="+id+"&list="+divlist;
				var req = getXMLHTTP();
				
				if (req) {
					
					req.onreadystatechange = function() {
						if (req.readyState == 4) {
							// only if "OK"
							if (req.status == 200) {						
							//	document.getElementById(divlist).innerHTML=req.responseText;
														
							} else {
								alert("Problem while using XMLHTTP:\n" + req.statusText);
							}
						}				
					}			
					req.open("GET", strURL, true);
					req.send(null);
				}
			}
			
	</script>
	<?php }?>	
    
    
    
    
    
<?php if (in_array('select_voyage',$header)){?>	
	<script language="javascript" type="text/javascript">
		function getdiag(organe_id,divdiag) {		
				
				var strURL="ajax/select_voyage.php?Id_voy="+organe_id+"&diag="+divdiag;
				var req = getXMLHTTP();
				
				if (req) {
					
					req.onreadystatechange = function() {
						if (req.readyState == 4) {
							// only if "OK"
							if (req.status == 200) {						
								document.getElementById(divdiag).innerHTML=req.responseText;
														
							} else {
								alert("Problem while using XMLHTTP:\n" + req.statusText);
							}
						}				
					}			
					req.open("GET", strURL, true);
					req.send(null);
				}		
			}
			
	</script>
	<?php }?>			
    </head>

    <body >
        <!-- START PAGE CONTAINER -->
        <div class="page-container page-navigation-top-fixed page-mode-rtl">
        <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel" >
                    <!-- SIGN OUT -->
					
                    <li class="xn-icon-button">
                        <a href="#" class="mb-control" data-box="#mb-signout"> <span class="fa fa-power-off"> خروج </span></a>                        
                    </li> 
					 <li class="xn-icon-button pull-right">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
					
                        <h2 style = "color:#FFFFFF; padding-top :7px;" > بوابة التوظيف الإلكتروني - وزارة الصحة  </h2>            
                                    
                  
                    <!-- END SIGN OUT -->   
                    <!-- TOGGLE NAVIGATION -->
                   

                </ul>
                
                
                
                
                <!-- END X-NAVIGATION VERTICAL -->                     
                
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar mCustomScrollbar _mCS_1 mCS-autoHide mCS_no_scrollbar page-sidebar-fixed scroll" >
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                  <li class="xn-logo">
					
                        <a href="index.php" style="height:50px;font-size:14px">Recrutement en ligne</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>  
                   
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="assets/images/users/profil.jpg" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="assets/images/users/profil.jpg" alt="John Doe"/>
                            </div>
                            <div class="profile-data">
                                <p style ="font-size: 20px; font-weight : bold; color:#FFFFFF"  ><?php echo $user->nom_ar; ?></p>
                                <div class="profile-data-name"><?php echo $user->type_ar ?></div>
                            </div>
                            <div class="profile-controls">
                                <a href="profile_util.php" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="edit_pass.php" class="profile-control-right"><span class="fa fa-unlock-alt"></span></a>
                            </div>
                        </div>   
<?php  
					 if ($user->type =='administrateur' ) { ?>						
        
					      
                    <li>
                        <a href="index.php"><span class="fa fa-desktop"></span> <span class="xn-text">&nbsp;&nbsp;&nbsp;&nbsp;الصفحة الرئيســة</span></a>                        
                    </li>
				
					<li class="xn-openable " >
                        <a href="#"><span class="fa fa-hospital-o"></span><span class="xn-text">&nbsp;&nbsp;&nbsp;&nbsp; اعدادات المؤسسة </span></a>
                        <ul>
							<li> <a href="ajouter_etab.php">إضافـة مؤسـسـة</a></li>
                              <li><a href="edit_etab.php?id=2"> تحديث معلومات المؤسسة</a></li> 
                              <li><a href="logo-cachet.php"> شعار المؤسسة و الختم</a></li> 
                        </ul>
                    </li>
					
                    <li class="xn-openable " >
                        <a href="#"><span class="fa fa-users"></span> <span class="xn-text">&nbsp;&nbsp;&nbsp;&nbsp;تسيير المستخدمين</span></a>
                        <ul>
							<li><a href="ajouter_admin.php">إضـــافة مستخــــدم</a></li>
                            <li><a href="list_admin.php">قــــائمة المستخدمين</a></li>
                        </ul>
                    </li>
					
				
                    <li class="xn-openable">
                        <a href="#"><span class="glyphicon glyphicon-briefcase"></span> <span class="xn-text">&nbsp;&nbsp;&nbsp;&nbsp;إعدادات المناصب </span></a>                        
                        <ul>
                            <li><a href="ajouter_poste.php">إضافـة مـنـصـب </a></li>
                                         <li><a href="list_poste.php"> تحديث المناصب</a></li>
                            <li><a href="list_diplome.php"> الشهادات المطلوبة</a></li>
                        <li><a href="list_filliere.php"> الشعب المطلوبة</a></li>
                                       <li><a href="list_specialite.php"> التخصصات المطلوبة</a></li>
                                         
                            <li><a href="document_demande.php"> الوثائق المطلوبة في الاستدعاء</a></li>
                        </ul>
                    </li>
					
               
                    <li class="xn-openable">
                        <a href="#"> <span class="fa fa-list-alt"></span><span class="xn-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;معايير الإنتقاء</span></a>                        
                        <ul>
                           <li><a href="list_cond_titre.php">على أساس الشهادة  </a></li>                             
                            <li><a href="#">على أساس الإختبار</a></li>
                           
                        </ul>
                    </li>  
					
					 <li class="xn-openable">
                        <a href="#"> <span class="fa fa-file-text"></span><span class="xn-text">&nbsp;&nbsp;تسيير نقاط المترشحين</span></a>                        
                        <ul>
                         <li><a href="list_cond_titre1.php">على أساس الشهادة  </a></li>                                                  
                            <li><a href="#">على أساس الإختبار</a></li>
                           
                        </ul>
                    </li>  
				
                 <li class="xn-openable">
                        <a href="#"> <span class="fa fa-file-text"></span><span class="xn-text">&nbsp;&nbsp;&nbsp;&nbsp;نتائج المسابقات</span></a>                        
                        <ul>
                            <li><a href="resultat.php">على أساس الشهادة  </a></li>                            
                            <li><a href="#">على أساس الإختبار</a></li>
                           
                        </ul>
                    </li> 
 	             <!---------------------------------- fin   header  administrateur---------------------------->	
				 
               	 <!--  ---------- header sou-directeur -->
			   
			    <?php } else if ($user->type == 'sous-directeur') { ?>
					
					
					 <li>
                        <a href="index.php"><span class="fa fa-desktop"></span> <span class="xn-text">&nbsp;&nbsp;&nbsp;&nbsp;الصفحة الرئيســة</span></a>                        
                    </li>
					
					<li class="xn-openable " >
                        <a href="#"><span class="fa fa-hospital-o"></span><span class="xn-text">&nbsp;&nbsp;&nbsp;&nbsp; اعدادات المؤسسات </span></a>
                        <ul>
							<li> <a href="ajouter_etab.php">إضافـة مؤسـسـة</a></li>
                            <li><a href="list_etab.php"> قائمة المؤسسات الصحية</a></li> 
                        </ul>
                    </li>
					
                    <li class="xn-openable " >
                        <a href="#"><span class="fa fa-users"></span> <span class="xn-text">&nbsp;&nbsp;&nbsp;&nbsp;تسيير المستخدمين</span></a>
                        <ul>
							<li><a href="ajouter_admin.php">إضـــافة مستخــــدم</a></li>
                            <li><a href="list_admin.php">قــــائمة المستخدمين</a></li>
                        </ul>
                    </li>
					
				
                    <li class="xn-openable">
                        <a href="#"><span class="glyphicon glyphicon-briefcase"></span> <span class="xn-text">&nbsp;&nbsp;&nbsp;&nbsp;إعدادات المناصب</span></a>                        
                        <ul>
                            <li><a href="ajouter_poste.php">إضافـة مـنـصـب </a></li>
                            <li><a href="list_poste.php"> تاريخ الإستدعاء</a></li>
                        </ul>
                    </li>
					
               
                    <li class="xn-openable">
                        <a href="#"> <span class="fa fa-list-alt"></span><span class="xn-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;دراسة الملفات</span></a>                        
                        <ul>
                           <li><a href="list_cond_titre.php">على أساس الشهادة  </a></li>                             
                            <li><a href="#">على أساس الإختبار</a></li>
                           
                        </ul>
                    </li>  
					
					 <li class="xn-openable">
                        <a href="#"> <span class="fa fa-file-text"></span><span class="xn-text">&nbsp;&nbsp;تسيير نقاط المترشحين</span></a>                        
                        <ul>
                         <li><a href="list_cond_titre1.php">على أساس الشهادة  </a></li>                                                  
                            <li><a href="#">على أساس الإختبار</a></li>
                           
                        </ul>
                    </li>  
				
                 <li class="xn-openable">
                        <a href="#"> <span class="fa fa-file-text"></span><span class="xn-text">&nbsp;&nbsp;&nbsp;&nbsp;نتائج المسابقات</span></a>                        
                        <ul>
                            <li><a href="resultat.php">على أساس الشهادة  </a></li>                            
                            <li><a href="#">على أساس الإختبار</a></li>
                           
                        </ul>
                    </li> 
				    
					 <!--  fin header sou-directeur -->
					 
					 
					 
					 	 <!--  ---------- header 'gestionnaire' -->
			   
			    <?php } else if ($user->type == 'gestionnaire') { ?>
					
					
					 <li>
                        <a href="index.php"><span class="fa fa-desktop"></span> <span class="xn-text">&nbsp;&nbsp;&nbsp;&nbsp;الصفحة الرئيســة</span></a>                        
                    </li>
					
                   
					
				
                    <li class="xn-openable">
                        <a href="#"><span class="glyphicon glyphicon-briefcase"></span> <span class="xn-text">&nbsp;&nbsp;&nbsp;&nbsp;إعدادات المناصب</span></a>                        
                        <ul>
                            <li><a href="ajouter_poste.php">إضافـة مـنـصـب </a></li>
                            <li><a href="list_poste.php"> تاريخ الإستدعاء</a></li>
                        </ul>
                    </li>
					
               
                    <li class="xn-openable">
                        <a href="#"> <span class="fa fa-list-alt"></span><span class="xn-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;معايير الإنتقاء</span></a>                        
                        <ul>
                           <li><a href="list_cond_titre.php">على أساس الشهادة  </a></li>                             
                            <li><a href="#">على أساس الإختبار</a></li>
                           
                        </ul>
                    </li>  
					
					
				
                
				    
					 <!--  fin header 'gestionnaire' -->
					 
					 
					 
					 
					 
					 
					 
					 <?php    } ?>
                                    
                                     
                  
                    
                </ul>
                <!-- END X-NAVIGATION -->
                
            </div>
            
            <!-- END PAGE SIDEBAR -->
            <!-- PAGE CONTENT -->
            <div class="page-content"  >
          
                
               