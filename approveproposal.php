<!DOCTYPE html>
<?php
include_once 'functions.php';
$pid=$_GET['pid'];

top("approve");

$query= mysql_query("SELECT * FROM `proposals`  WHERE proposalid = $pid") or  die(mysql_error());








echo $bottom;
?>
