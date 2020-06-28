<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
$project_path = dirname(__FILE__);
$project_path = str_replace('includes', '', $project_path);
defined('SITE_ROOT') ? null : 
	define('SITE_ROOT',$project_path);
	
defined('SITE_PATH') ? null : 
	define('SITE_PATH',dirname($_SERVER['PHP_SELF']));
    
defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.'includes');

// charger fichier config  avant tout
require_once(LIB_PATH.DS.'config.php');

// charger fonctions
require_once(LIB_PATH.DS.'fonctions.php');

// charger core objects
require_once(LIB_PATH.DS.'session.php');
require_once(LIB_PATH.DS.'bd.php');


// charger  classes
require_once(LIB_PATH.DS.'personne.php');
require_once(LIB_PATH.DS.'etablissement.php');
require_once(LIB_PATH.DS.'direction.php');
require_once(LIB_PATH.DS.'poste.php');
require_once(LIB_PATH.DS.'notes.php');
require_once(LIB_PATH.DS.'condidat.php');
require_once(LIB_PATH.DS.'compte.php');
require_once(LIB_PATH.DS.'experiance.php');
require_once(LIB_PATH.DS.'diplome.php');
require_once(LIB_PATH.DS.'parcours1.php');
require_once(LIB_PATH.DS.'document_demmande.php');
require_once(LIB_PATH.DS.'document_scan.php');
require_once(LIB_PATH.DS.'dossier_accept.php');
require_once(LIB_PATH.DS.'recours.php');
require_once(LIB_PATH.DS.'diplome_demmande.php');
require_once(LIB_PATH.DS.'specialite_demmande.php');
require_once(LIB_PATH.DS.'filliere_demmande.php');
//require_once(LIB_PATH.DS.'billiet.php');

//require_once(LIB_PATH.DS.'fichier.php');




//require_once(LIB_PATH.DS.'contact_us.php');

?>