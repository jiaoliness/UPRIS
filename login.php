<!DOCTYPE html>
<?php
require_once 'functions.php';
require_once 'login_class.php';
require_once 'admin_class.php';
top("Login"); ?>
<form method="post" action="login.php">
<div id="wrap">
	<h2>Login Form</h2>
		<div id="nameonePan1">
			<ul>
				<li><label for="email">Email:</label></li>
				<li><label for="password">Password:</label></li>  
			</ul> 
		</div>
		<div id = "discountonePan">
			<ul> 
				<li><input name="email" placeholder="Email" /></li>
				<li><input type="password" name="password" placeholder="Password"/></li>
				<input id = "log" type="submit" name="login" value="Login" />
			</ul>
		</div>
	
	<?php
if($_SERVER['REQUEST_METHOD']=='POST'){  login_class::login($_POST['email'],$_POST['password']); /*login function*/
    if(!login_class::is_logged_in()){
           echo "<p id=\"loginerror\">&nbspWrong Email or Password!</p>"; /*unsecesfull login displays error message*/
    }
 }
 ?>
</div></form>
<script src="register.js" type="text/javascript"></script>

 <?php   echo $bottom; ?>