<!DOCTYPE html>
<?php
include_once 'functions.php';

if(!isset($_SESSION['adviserid'])){
    redirect_to_welcome();
}

$pid=$_GET['pid'];


mysql_query("UPDATE `proposals`  set status='approved 'WHERE proposalid = $pid") or  die(mysql_error());


head(adviserprofile,"");





echo $bottom;
?>
