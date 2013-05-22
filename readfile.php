<?php
$filename = $_GET['file'];

header ("Content-type: application/pdf");

header("Content-Length: " . filesize($filename));

readfile($filename);

?>
