<?php
include_once 'functions.php';
$email=$_GET['e'];
$table=$_GET['t'];

mysql_query("UPDATE $table SET active=1 WHERE email='$email'") or die(mysql_error());
head(adminindex,"");
?>
