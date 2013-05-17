<!DOCTYPE html>
<?php
require_once 'functions.php';

require_once 'login_class.php';

require_once 'dbconnection.php';
dbconnection::getConnection();

top("Profile");

$page = 1;
if(isset($_GET['p'])){
$page = (int)$_GET['p'];
}

if(isset($_SESSION['risid'])){/*if user is loged in, displays his existing loans*/
    $sesid=$_SESSION['risid'];
    $pages=0;
$querypage= mysql_query("SELECT * FROM `proposals` WHERE proponentid = $sesid")or die(mysql_error());
while($row=mysql_fetch_assoc($querypage)){
    $pages+=1;
}
$tot_pages=ceil($pages/5);
    
?>
<div id="bodyPan">
    
    
       <div id="bodyRightPan">
              
  	<h2><span>profile</span> actions</h2>        
   
        <a href="logout.php">Logout</a>
        <a href="post.php">New Proposal</a>
        <a href="profile.php">Home</a>
        <a href="profile.php">Home</a>
        
  </div>   
  <div id="bodyLeftPan">
    <h2 id="welcome"><span>Logged in as </span><?php echo $_SESSION['name']; ?></h2>
	<p>This is your profile page, click on a proposal title to view details</p>
	      
     
      
        
        
<?php

 $start=($page*5)-5;
$query2= mysql_query("SELECT * FROM `proposals`  WHERE proponentid = $sesid ORDER BY proposalid DESC LIMIT $start, 5 ") or  die(mysql_error()); /*query the users unpaid loans*/
if(mysql_num_rows($query2)){  
while ($row = mysql_fetch_assoc($query2)) {
$lid=$row['proposalid'];
echo " <ul id=\"loan\"> <li> Proposal ID: ".$lid."</li>";
echo "<li>Date Submitted: ".date("l, M d, Y",strtotime($row['date']))."</li>";
//echo "<li>Amount borrowed: ".number_format($row['loanamount'],2)."</li>";
echo "<li>Title: <a href=\"view.php?pid=".$row['proposalid']."\">".$row['title']."</a></li></ul>";
echo "<li>Status: ".$row['status']."</li>";

}}

 if($tot_pages>1 and $page!=1){
 ?> 
       
       <a href="profile.php?p=<?echo $page-1;?>"> << </a>
       <?php 
 } else{}
  if($tot_pages>1){
        for($i=1;$i<=$tot_pages;$i++){
            echo "<a href=\"profile.php?p=".$i." \">". " ".$i;            
        } 
  }


        if($tot_pages>1 and $tot_pages!=$page){
            
            
        
        
        ?> 
        <a href="profile.php?p=<?echo $page+1;?>"> >> </a></span>
       <?php } else {}?>
        
  </div>          
</div>
<?php }else{  ?>
    <h1> You are not logged in </h1> <!--displays a login box if user is not logged in-->
     <div id="bodyRightPan3">
          <h2><span>login</span> now</h2>       
	<form id="login_form" method="post" action="profile.php">
            <ul> <label for="email">Email:</label>
            <input name="email" placeholder="Email" /> <br/>
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Password"/>
            <input type="submit" name="login" value="Login" />
       </ul>
            
<?php if($_SERVER['REQUEST_METHOD']=='POST'){  login_class::login($_POST['email'],$_POST['password']); 
 if(login_class::is_logged_in()){ /*reloads the apge after sucesful login*/
     redirect_to_home();
 }
 else{
     echo "<p id=\"loginerror\">&nbspWrong Email or Password!</p>"; /*else displays this message*/
 }
 
 }
 }?>
            
</form>  </div> 
    
<?php echo $bottom; ?>