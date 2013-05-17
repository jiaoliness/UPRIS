<?php
require_once 'functions.php';
require_once 'login_class.php';

if(login_class::is_logged_in()){ 
    session_destroy();  /*duuh*/
}

redirect_to_welcome();
?>
