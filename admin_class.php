<?php /*contains functions used by administrators*/
    require_once 'dbconnection.php'; 
     require_once 'functions.php'; 
    dbconnection::getConnection();  /*creates a database connection*/

    class admin_class {
        private static $instance = null;
        public static function getInstance(){
            if(self::$instance == null){
                self::$instance = new admin_class();
            }
        return self::$instance;
    }
    
    public static function post($header,$content){
        
       include_once('htmlpurifier/library/HTMLPurifier.auto.php');
       $config = HTMLPurifier_Config::createDefault();
       $config->set('HTML.Allowed', 'span');
       $config->set('HTML.Doctype', 'XHTML 1.0 Strict');

$filter = new HTMLPurifier($config);
$output = $filter->purify($content);         
$output2=filter_var($output,FILTER_SANITIZE_MAGIC_QUOTES);

    mysql_query("INSERT INTO posts VALUES(0,'$header','$output2',now())") or die("Error in posting:".mysql_error());
        
    }
    
     public static function display_posts(){
         
         $result=mysql_query("SELECT * FROM posts ORDER BY postid DESC LIMIT 9") or die(mysql_error());
         
          
while ($row = mysql_fetch_assoc($result)) {
    echo "<h2>".$row['header']."</h2><hr>";
    echo "<p>".$row['content']."</p>";
    
    
}
     }
     
       public static function isadmin(){ /*returns true if the the admin session is set, else retuns false*/
        if(isset($_SESSION['adminid'])){
            return true;
        }
        else{
            return false;
        }  
     
            
            
    }}
?>