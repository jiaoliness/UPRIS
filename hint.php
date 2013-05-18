<?php

if(isset($_GET["f"])){
    $q= $_GET["f"];
   
 if(preg_match('/^[a-zA-Z ]{3,30}$/', $q) && strlen($q) >= 4){  $response="<img src=\" images/check.png \"/>";    global $response;
 echo $response; }
 
}

if(isset($_GET["l"])){
      $q= $_GET["l"];
 if(preg_match('/^[a-zA-Z ]{3,30}$/', $q ) && strlen($q)>=4){  $response="<img src=\" images/check.png \"/>";  echo $response;  }

}

if(isset($_GET["e"])){
   $q= $_GET["e"];
if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',$q) && strlen($q)>=7){  $response="<img src=\" images/check.png \"/>";  echo $response;  }

 
}

if(isset($_GET["p"])){
    $q= $_GET["p"];



    if(preg_match('/^[\w\d]{4,30}$/',$q)){  $response="<img src=\" images/check.png \"/>"; 

  
 echo $response;  }    
   
   

}

if(isset($_GET["i"])){
      $q= $_GET["i"];
 if(preg_match('/^[a-zA-Z ]{8,60}$/', $q ) && strlen($q)>=8){  $response="<img src=\" images/check.png \"/>";  echo $response;  }

}

if(isset($_GET["n"])){
      $q= $_GET["n"];
 if(preg_match('/^[\d]{6,30}$/', $q ) && strlen($q)>=6){  $response="<img src=\" images/check.png \"/>";  echo $response;  }

}



?>