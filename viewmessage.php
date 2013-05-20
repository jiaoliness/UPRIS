<!DOCTYPE html>
<?php
require_once 'message_class.php';
require_once 'dbconnection.php'; 
require_once 'functions.php'; 
require_once 'login_class.php'; 
dbconnection::getConnection();
top("message");

$id=$_GET['mid'];
    
  ?>   

      <?message_class::view_message($id);?>


<?
echo $bottom;
?>
