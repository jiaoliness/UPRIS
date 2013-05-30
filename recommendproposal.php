<!DOCTYPE html>
<?php
include_once 'functions.php';
include_once 'login_class.php';

if(!isset($_SESSION['reviewerid'])){
    redirect_to_welcome();
}

$pid=$_GET['pid'];
$sesid=$_SESSION['reviewerid'];

mysql_query("UPDATE `reviews`  set `recommended`=1 WHERE proposalid = $pid and reviewerid=$sesid") or  die(mysql_error());

head(reviewerprofile,'');



echo $bottom;
?>
