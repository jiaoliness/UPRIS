<!DOCTYPE html>
<?php
include_once 'functions.php';
$pid=$_GET['pid'];


mysql_query("UPDATE `proposals`  set status='approved 'WHERE proposalid = $pid") or  die(mysql_error());


head(adviserprofile,"");





echo $bottom;
?>
