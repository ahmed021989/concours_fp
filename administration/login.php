<?php
require_once("includes/initialiser.php");
if($session->is_logged_in()) {
$user = Personne::trouve_par_id($session->id_utilisateur);
readresser_a("index.php");
 }
  


// Remember to give your form's submit tag a name="submit" attribute!
if (isset($_POST['b_login'])) { // Form has been submitted.

  $login = $bd->escape_value($_POST['login']);
  $passe =$bd->escape_value($_POST['passe']);
  // Check database to see if login/passe exist.
	$utilisateur_trouver = Personne::valider($login, $passe);
	
  if ($utilisateur_trouver) {
    
	$session->login($utilisateur_trouver);
    readresser_a("index.php");
  } else {
    // login/passe combo was not found in the database
    $message = " خطأ في إسم المستخدم أو كلمة السر خاطئة ؟؟ ";
	$_SESSION['login_er']= $message;
	
  }
  
} else { // Form has not been submitted.
  $login = "";
  $passe = "";
}
?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title> بوابة التوظيف الإلكترونية</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                     
    </head>
    <body>
        <div class="login-container lightmode">
        <h1> <div class="login-title" style="text-align: center;"><strong style="color: #170C50;"><?php
		$sql=$bd->requete("select * from etablissement");
		while($row=mysqli_fetch_array($sql)){
		echo $row['Nom_etab_ar'];	
		}
		?>
		</strong>  </div>	</h1>
        <h2> <div class="login-title" style="text-align: center;color: #830523;"><strong> بوابة التوظيف الإلكترونية </strong>  </div>	</h2>   
		  <div class="login-box animated fadeInDown">
			   <!--  <div class="login-logo"></div>   --> 
                <div class="login-body">
					<?php 
					if (isset( $_SESSION['login_er'])){?>
		  <div class="alert alert-error">
                                
                               <h2><div class="login-title" style="text-align: center;color: #CE0015;"><strong><?php  echo $_SESSION['login_er'];?></strong> </div></h2>
                            </div>
					<?php
		 
						unset($_SESSION['login_er']);
					}
		
						?>
                    <div class="login-title" style="text-align: right;color: #24941A;"><strong style="color: #170C50;"> تسجيل الدخـــول الى حســـابك</strong> </div>
                    <form action="login.php" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="إسم المستخدم" name ="login" style= "text-align:right;" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" placeholder="كلمـــة الســـر" name= "passe" style= "text-align:right;" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block" name ="b_login" type="submit"> تسجيل الدخـــول</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer" >
                    <div class="pull-left">
                        &copy; <?php echo date("Y")?> بوابة التوظيف الإلكترونية
                    </div>
                  <!--  <div class="pull-right">
                        <a href="#">About</a> |
                        <a href="#">Contact Us</a>
                    </div>  -->
                </div>
            </div>
            
        </div>
        
    </body>
</html>






