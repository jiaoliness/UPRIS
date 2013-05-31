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

public static function register($usertype,$f,$l,$e,$p,$p2,$field,$i,$r){  /*sign-up function, inserts user information into the database*/      
$firstname = ucwords(strtolower(filter_var($f,FILTER_SANITIZE_STRING)));
$lastname = ucwords(strtolower(filter_var($l,FILTER_SANITIZE_STRING)));
$password = filter_var($p,FILTER_SANITIZE_STRING);  
$password2 = filter_var($p2,FILTER_SANITIZE_STRING); 
$email = filter_var($e,FILTER_VALIDATE_EMAIL);    
$institute = ucwords(strtolower(filter_var($i,FILTER_SANITIZE_STRING)));
$regno = filter_var($r,FILTER_VALIDATE_INT); 

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
  
   if(self::same_email($email,$usertype)) {}
 else {
 	echo  "<p id=\"error\">&nbsp&nbspEmail already in use!</p>" ;
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
   if(preg_match('/^[\d]{4,30}$/', $regno)) {}
 else {
 	echo  "<p id=\"error\">&nbsp&nbspInvalid Registration #!</p>" ;
 return false;
  }
  
if($usertype=='user'){
    mysql_query("INSERT INTO `userinfo`(`userid`, `email`, `firstname`, `lastname`, `password`, `field`, `ins`, `active`) VALUES(0,'$email','$firstname','$lastname','$password','$field','$institute',0)") or die("Error in register:".mysql_error()); 
    logdata( " Type: ".$usertype." registered - Name: ".$firstname." ".$lastname." Email: ".$email." Field: ".$field,null);
    //sleep(1);
    login_class::login($email,$password);
}
else if($usertype=='reviewer'){
    mysql_query("INSERT INTO 'reviewerinfo' VALUES(0,'$email','$firstname','$lastname','$password','$field','$institute',0)") or die("Error in register:".mysql_error()); 
    logdata( " Type: ".$usertype." registered - Name: ".$firstname." ".$lastname." Email: ".$email." Field: ".$field,null);
    //sleep(1);
    login_class::login($email,$password);
}
else if($usertype=='adviser'){
    mysql_query("INSERT INTO 'adviserinfo' VALUES(0,'$email','$firstname','$lastname','$password','$field','$institute',0)") or die("Error in register:".mysql_error()); 
    logdata( " Type: ".$usertype." registered - Name: ".$firstname." ".$lastname." Email: ".$email." Field: ".$field,null);
    //sleep(1);
    login_class::login($email,$password);
}
/*
$msg = 'Your account has been made. Please verify it by clicking the activation link that has been sent to your email.';		
echo $msg;
$hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.
*/

/*$to      = $email; //Send email to our user
$subject = 'Signup | Verification'; //// Give the email a subject 
$message = '
			Thanks for signing up!
			Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
			------------------------
			Email: '.$email.'
			Password: '.$password.'
			------------------------
			Please click this link to activate your account:
			http://localhost/profile.php?email='.$email.'&hash='.$hash.'
			'; // Our message above including the link		
		
			$headers = 'From:noreply@UPRIS.com' . "\r\n"; // Set from headers
			if(mail($to, $subject, $message, $headers)){ // Send the email
				echo "Message sent!";
			}
			else{
				echo "Message sending failed.";
			}
*/

}  
    
 public static function same_email($email,$table){
     $table=$table."info";
     $same=mysql_query("SELECT email from $table WHERE email='$email'")or die("Error in same email:".mysql_error());	
     
if(mysql_num_rows($same) == 1){
    return false;
}
else{
    return true;
}
 }
     
}
?>
