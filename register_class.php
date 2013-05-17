<?php
require_once 'dbconnection.php';
include_once 'login_class.php';
include_once 'functions.php';
dbconnection::getConnection();

class register_class {
    private static $instance = null;
    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new register_class();
        }
        return self::$instance;
    }    

public static function register($f,$l,$e,$p,$p2,$field,$i){  /*sign-up function, inserts user information into the database*/      
$firstname = ucwords(strtolower(filter_var($f,FILTER_SANITIZE_STRING)));
$lastname = ucwords(strtolower(filter_var($l,FILTER_SANITIZE_STRING)));
$password = filter_var($p,FILTER_SANITIZE_STRING);  
$password2 = filter_var($p2,FILTER_SANITIZE_STRING); 
$email = filter_var($e,FILTER_VALIDATE_EMAIL);    
$institute = ucwords(strtolower(filter_var($i,FILTER_SANITIZE_STRING))); 
 if(preg_match('/^[a-zA-Z ]{3,30}$/', $firstname )) { }  /*checks for valid input, otherwise displays error*/
 else {
 	echo  "<p id=\"error\">&nbsp&nbspInvalid first name!</p>" ;
 return false;
  } 

 if(preg_match('/^[a-zA-Z ]{2,30}$/', $lastname)) {}
 else {
 	echo  "<p id=\"error\">&nbsp&nbspInvalid last name!</p>" ;
 return false;
  } 

   if($email) {}
 else {
 	echo  "<p id=\"error\">&nbsp&nbspInvalid email!</p>" ;
 return false;
  }

 if(preg_match('/^[\w\d]{4,30}$/', $password)) {}
 else {
 	echo  "<p id=\"error\">&nbsp&nbspInvalid password!</p>" ;
 return false;
  }
  
  if(preg_match('/^[\w\d]{4,30}$/', $password2)) {}
 else {
 	echo  "<p id=\"error\">&nbsp&nbspConfirm password!</p>" ;
 return false;
  }
   if($password==$password2) {}
 else {
 	echo  "<p id=\"error\">&nbspPasswords don't match!</p>" ;
 return false;
  }
   if(preg_match('/^[a-zA-Z ]{2,30}$/', $institute)) {}
 else {
 	echo  "<p id=\"error\">&nbsp&nbspInvalid Institute!</p>" ;
 return false;
  } 
  
		
mysql_query("INSERT INTO userinfo VALUES(0,'$email','$firstname','$lastname',MD5('$password'),'$field','$institute')") or die("Error in register:".mysql_error());	
                
logdata( " registered - Name: ".$firstname." ".$lastname." Email: ".$email." Field: ".$field,null);

sleep(1);

login_class::login($email,$password);

return true;
    }  
    
 
     
}
?>
