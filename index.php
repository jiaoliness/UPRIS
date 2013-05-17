<!DOCTYPE html>
<?php
require_once 'functions.php';
require_once 'login_class.php';
require_once 'admin_class.php';
top("home");
/*
$to = "jamie.anacleto@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: webmaster@example.com" . "\r\n" .
"CC: somebodyelse@example.com";

mail($to,$subject,$txt,$headers);*/
?> <!-- loads the site banner and navigation bar -->

<div id="bodyPan">
    
       <div id="bodyRightPan">
     <?php
 
        if(isset($_SESSION['risid']) or isset($_SESSION['adminid'])){ /*if user is logged in, displays welome (name) */
    ?>
        <div><h2 id="welcome"><span>Welcome! <br/></span></h2> <?php echo "<h2>".$_SESSION['name']."</h2>";?>
	<p id="index">View your <a href= <?php if(!admin_class::isadmin()){ echo "\"profile.php\"  ><span>Profile!</span> ";} 
                        else { echo "\"adminindex.php\"><span>Admin Page!</span>  "; } ?> </a></p>  <!--for regular users, links to profile page, for admins, links to adminindex-->    
        </div>	   
 <?php 
 
       }else{ ?> <!--else if user is not logged in, displays the login now box-->
  	<h2><span>Login</span> form</h2>
	<ul>
	<form method="post" action="index.php">
            <label for="email">Email:</label>
            <input name="email" placeholder="Email" /> <br/>
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Password"/>
            <input type="submit" name="login" value="Login" />
        </form>
	</ul>         
        <?php }

if($_SERVER['REQUEST_METHOD']=='POST'){  login_class::login($_POST['email'],$_POST['password']); /*login function*/
 
    if(!login_class::is_logged_in()){
           echo "<p id=\"loginerror\">&nbspWrong Email or Password!</p>"; /*unsecesfull login displays error message*/
    }
 
 }
 
 
 ?> 
  </div>
    <div id="bodyLeftPan">
        <h2>First Preenlistment for 1st Semester, 2013 - 2014</h2><hr>
	<p> The first preenlistment round for First Semester, 2013 - 2014 is now ongoing, from<span> May 11, 2013 (Saturday) to May 17, 2013 at 11:59 pm (Friday).</span> Please take note of the following before preenlisting:</p>
	<p>Refer below to our list of interest rates depending on how much you will be needing</p>
	<p>If you are someone who needs the cash, we got it <span>here</span></p>
        
        Fill up your Student Profile.
Accomplish your SETs for Summer 2013. For students who have dropped their subjects that require a SET, you may answer N/A for all questions. For subjects that have wrongly-encoded professors or are set to TBA, please inform the offering unit or your current professor of the discrepancy, in order for them to correct it.
	<ul>
		<li><a href="profile.php">Enrollment Sched</a> </li>
		
	</ul>
  <hr>
	<p> We here at Yab's ensure you the highest quality of service when it comes 
        to lending you the money you need to start up a buisiness, pay for your kids
        birthday party, or buy a car. In which you will pay us back with interest.We here at Yab's ensure you the highest quality of service when it comes 
        to lending you the money you need to start up a buisiness, pay for your kids
        birthday party, or buy a car. In which you will pay us back with interest.</p>
	<p>Refer below to our list of interest rates depending on how much you will be needing</p>
	
	
  </div>
 
</div>
<?php
 echo $bottom; ?> <!--loads the footer pan-->