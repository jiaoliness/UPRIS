<?php
require_once 'dbconnection.php';
require_once 'admin_class.php';

function head($page,$extension){
    $host = $_SERVER['HTTP_HOST'];
    $folder = rtrim(dirname($_SERVER['PHP_SELF']),'/\\'); 
    header ("Location:http://$host$folder/$page.php$extension");
}

function redirect_to_home(){    /*function to redirect the user ot his profile page, or admin page if he is an administrator*/
if(admin_class::isadmin()){    
    head(adminindex,""); 
    exit();
    
}
else{
    head(profile,""); 
    exit();
}     
}

function redirect_to_welcome(){
    head(index,""); 
    exit();
}

function redirect_to_loan(){
   head(loan,"");
   exit;
}

function logdata($data,$arg){
 date_default_timezone_set('Asia/Manila');
$my_file = "log ".date('m-d-Y',time()).'.txt';

if($arg!=null){
 $uid=$arg;   
 dbconnection::getConnection();

$query=mysql_query("SELECT firstname,lastname FROM `userinfo` WHERE userid=$uid")  or  die(mysql_error());    
$row = mysql_fetch_assoc($query);

$handle = fopen('./logs/'.$my_file, 'a') or die('Cannot open file:  '.$my_file);
fwrite($handle, 'User '.$row['firstname']." ".$row['lastname'].$data.' at '.date('g:i A'). "\r\n");
}else{
    
$handle = fopen('./logs/'.$my_file, 'a') or die('Cannot open file:  '.$my_file);
fwrite($handle, "New user".$data.' at '.date('g:i A'). "\r\n");
    
    
}


}


/*the top pane, site banner, and navigation bar*/
function top($where){ echo " <head> 
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
    <title>UP Research Information System</title>
    <link href=\"style.css\" rel=\"stylesheet\" type=\"text/css\" />
    <link rel=\"shortcut icon\" href=\"images/ris.ico\"  type=\"image/x-icon\" />
    <div id=\"headerimg\"><a href=\"index.php\"><img id=\"hdimg\" src=\"images/yab.png\" position=\"absolute\"></a></div>
    </head>
    <body>
    <div id=\"topPan\">
			
    <div id=\"topContactPan\">
    </div>
        <div id=\"topMenuPan\">
	<div id=\"topMenuLeftPan\"></div>
	<div id=\"topMenuMiddlePan\">
            <ul>                
		<li class=\"home\"> $where </li>
		<li><a href=\"aboutus.php\">About us</a></li>
		<li><a href=\"support.php\">Support</a></li>
		<li><a href=\"grants.php\">Grants</a></li>
		<li><a href=\"adviserprofile.php\">Adviser</a></li>
		<li><a href=\"reviewerprofile.php\">Reviewer</a></li>            
                <li><a href= \"profile.php\"> Researcher</a></li>
		<li class=\"contact\"><a href=\"register.php\" class=\"contact\">Signup</a></li>
            </ul>
        </div>
	<div id=\"topMenuRightPan\"></div>
        </div>
        </div> "    ;}

/*the bottom pane or footer*/
$bottom= '<div id="footermainPan">
    <div id="footerPan">
    <ul>
	<li><a href="index.php">Home</a>| </li>
	<li><a href="aboutus.php">About us</a>| </li>
	<li><a href="support.php">Support</a>| </li>
	<li><a href="#">Books</a>| </li>
	<li><a href="http://crs.upv.edu.ph">University</a>| </li>
	<li><a href="#">Blog</a>| </li>
	<li><a href="#">Ideas</a>| </li>
	<li><a href="contactus.php">Contact us</a> </li>
    </ul>
	<p class="copyright">University of the Philippines-Research Information System. All rights reserved.</p>
	<ul class="yabsfooter">
  	<li>designed by:</li>
	<li>The RIS Group - UP ITDC</li>
    </ul>
    <div id="footerPanhtml"><a href="view-source:http://localhost/upris/">HTML</a></div>
    <div id="footerPancss"><a href="style.css">css</a></div>
    </div>
    </div>
</body>
</html>'; 
?>