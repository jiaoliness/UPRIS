<!DOCTYPE html>
<?php
require_once 'message_class.php';
require_once 'dbconnection.php'; 
require_once 'functions.php'; 
require_once 'login_class.php'; 
dbconnection::getConnection();
top("messages");

if(isset($_SESSION['risid'])){
    $userid=$_SESSION['risid'];}
else if(isset($_SESSION['reviewerid'])){
    $userid=$_SESSION['reviewerid'];
}
else if(isset($_SESSION['adviserid'])){
    $userid=$_SESSION['adviserid'];
}
else{
    redirect_to_welcome();
}
    
  ?>   



<div id="bodyRightPanM">
      <?message_class::view_messages($userid);?>
</div>



<?
echo $bottom;
?>
