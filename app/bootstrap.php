<?php
/*
 * @author - Peter Togara
 */

 // ADD CONFIG CLASS
require_once 'config/config.php';

//ADD HELPER CLASSES
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';

//AUTO LOAD LIBRARIES
spl_autoload_register(function ($className){
    
    require_once 'libraries/'.$className.'.php';

});


