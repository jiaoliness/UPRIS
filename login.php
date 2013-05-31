<!DOCTYPE html>
<?php
require_once 'functions.php';
require_once 'login_class.php';
require_once 'admin_class.php';
top("Login"); ?>
<div class="login-form" style="margin-top:50px;text-align:center">
  <h2>Login Form</h2>
  <form method="post" action="login.php">
    <fieldset>
      <div class="clearfix">
        <input type="text" placeholder="Username" name="email">
      </div>
      <div class="clearfix">
        <input type="password" placeholder="Password" name="password">
      </div>
      <button class="btn primary" type="submit" id="log" name="login" style="margin-top:10px;margin-left:5px;text-align:center" >Sign in</button>
    </fieldset>
  </form>
  	<?php
if($_SERVER['REQUEST_METHOD']=='POST'){  login_class::login($_POST['email'],$_POST['password']); /*login function*/
    if(!login_class::is_logged_in()){
           echo "<p id=\"loginerror\">&nbspWrong Email or Password!</p>"; /*unsecesfull login displays error message*/
    }
 }
 ?>
</div>

<script src="register.js" type="text/javascript"></script>

 <?php   echo $bottom; ?>