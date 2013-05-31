<!DOCTYPE html>
<?php
require_once 'functions.php';
require_once 'admin_class.php';
require_once 'login_class.php';

require_once 'dbconnection.php';
dbconnection::getConnection();

if(!isset($_SESSION['adminid'])){
    redirect_to_welcome();
}

top("Admin");

 if($_SERVER['REQUEST_METHOD']=='POST'){
   
     admin_class::post($_POST['header'], $_POST["content"]);
     
     
 }
    
?>
<div>

<div class="row-fluid" >
<div id="bodyPan" class="span12">
  <div class="row-fluid" >
    <div id="bodyRightPan" class="span3" >       
    	<h2><span>Profile</span> Actions</h2>        
  		<ul class= "nav nav-pills nav-stacked">
          <a href="logout.php">Logout</a>
          <a href="">Function</a>
          <a href="">Another Function</a>
          </ul>
    </div>
    <div class="span9">
      <h2 id="welcome"><span>Logged in as </span><?php echo $_SESSION['name']; ?></h2>
      <p>This is the admin page</p>
    </div>
  </div>
  <div class="row-fluid"><div class="span12"></div></div>
  <div class="row-fluid" >
      <div class="span6 well offset1">
        <p>Post an announcement, use the span tag to highlight words</p>
        <div class="row-fluid" style="margin-left:20px;">
          <form method="post" action="adminindex.php">
            <input name="header" placeholder="header.." required="required"/> <p></p>
              <div id="agreement2" class="row-fluid">
                <textarea resize="none" name="content" required="required" placeholder="write an announcement.." rows="5" cols="90"></textarea><br />
                <input type="submit" name="Submit" value="Post" style="text-align:center;margin-left:200px;margin-right:auto"/>
              </div>
          </form>
        </div>
        <script src="jquery-1.9.1.js"></script>
        <script src="jquery-ui-1.10.3.custom.js"></script>        
        <script>$(function() {$( "#tabs" ).tabs();});</script>
      </div>

      <div class="span5" >
        <span style="text-align:center;"><h4> Approve newly made accounts</h4></span>
        <div id="tabs" style="text-align:center">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tabs-1">Researchers</a></li>
            <li><a href="#tabs-2">Reviewers</a></li>
            <li><a href="#tabs-3">Advisers</a></li>  
          </ul>
          <div id="tabs-1"><?admin_class::view_accounts('userinfo');?></div>
          <div id="tabs-2"><?admin_class::view_accounts('reviewerinfo');?></div> 
          <div id="tabs-3"><?admin_class::view_accounts('adviserinfo');?></div>
        </div>  
      </div>
    </div>
</div>
</div> 
    
<?php echo $bottom; ?>