<?php
include_once 'functions.php';
include_once 'proposal_class.php';
require_once 'dbconnection.php';
dbconnection::getConnection();
define ("MAX_SIZE","25000"); 
function getExtension($str)
	{
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
	}

$errors=1;
if($_SERVER['REQUEST_METHOD']=='POST') 
{
       $user=$_POST['userid'];
       $picname= "UPRISdoc";
	$image=$_FILES['image']['name'];
        
 	if ($image) 
 	{
 		$filename = stripslashes($_FILES['image']['name']);
                
              $filename = filter_var($filename,FILTER_SANITIZE_STRING);
                
                
  		$extension = strtolower(getExtension($filename));
                if (($extension != "doc") && ($extension != "docx") && ($extension !="pdf") && ($extension != "odt")) 
 		{
 			echo '<h1>Unknown extension!</h1>';
 		}
 		else
 		{
			$size=filesize($_FILES['image']['tmp_name']);
			if ($size > MAX_SIZE*1024)
			{
				echo '<h1>You have exceeded the size limit!</h1>';
			}
			else
			{
                                $unique=time();
				$image_name=$picname.$unique.'.'.$extension;
				$newname="./files/".$image_name;                          
                                   
				$copied = copy($_FILES['image']['tmp_name'], $newname);
                               
				if (!$copied) 
				{
					echo '<h1>Copy unsuccessfull!</h1>';
				}
				else
				{
					$errors = 0;
				}
			}
		}
	}}
     if(isset($_POST['Submit']) && $errors==0) 
{
      
        $query2="INSERT INTO `proposals` VALUES(0,$user,'new',0, '$_POST[title]' ,now() , '$_POST[prop]','$_POST[field]','$_POST[time]','$_POST[budget]','$_POST[abs]','$newname' )";
        mysql_query($query2) or die(mysql_error());
        logdata(" created a new proposal - Title: ".$_POST['title'].", Field: ".$_POST['field'].", Expected Budget: ".$_POST['budget'],$user);
    
     $_POST['title'] = new proposal();
     $_POST['title']->setTitle($_POST['title']);
     head(profile,"");
	;}


?>
