<!DOCTYPE html>
<?php
require_once 'functions.php';
top("support");
$pid=$_GET['pid'];
$rid=$_GET['rid'];
?>

<iframe src="./docs/UPSITF-CHED NDA.pdf" width="820" height="1050" margin-left="20%"></iframe>

<input type="button" value="I agree" onclick="window.location = 'makereview.php?rid=<?php echo $rid;?>&pid=<?php echo $pid;?>';">

<?php echo $bottom; ?>