<?php

    require_once 'dbconnection.php'; 
    require_once 'functions.php'; 
    dbconnection::getConnection();  /*creates a database connection*/

    class message_class {
        private static $instance = null;
        public static function getInstance(){
            if(self::$instance == null){
                self::$instance = new message_class();
            }
        return self::$instance;
    }
    
    public static function send_message($from,$to,$content){
        $content=nl2br($content);
        mysql_query("INSERT into messages VALUES($from,$to,'$content',now(),'unread',0)") or die(mysql_error());    
        mysql_query("INSERT into conversations VALUES($from,$to,0)") or die(mysql_error()); 
    }
    
    public static function view_messages($id){
      $result=mysql_query("SELECT * FROM messages WHERE `to`=$id") or die("error in messagesS".mysql_error());      
if(mysql_num_rows($result)>0){
        while ($row = mysql_fetch_assoc($result)) {        

echo "<a href=\"viewmessage.php?mid=".$row['messageid']."\">";
echo $row['subject']."&nbsp&nbsp-&nbsp&nbsp "; 
echo self::limit_echo($row['content'])." &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"; 
echo "<span>".date("M d, Y",strtotime($row['date']))."</span></a>";
        }}
        
        else{
            echo "You have no messages";
        }     

    }
    
     public static function view_message($id){
      $result=mysql_query("SELECT * from messages where `messageid`=$id") or die("error in message".mysql_error());
        while ($row = mysql_fetch_assoc($result)) {
        echo $row['content'];            
    }
        
        
    }
    
    public static function limit_echo($text)
{
  if(strlen($text)<=110)
  {
    echo $text;
  }
  else
  {
    $y=substr($text,0,110) . '...';
    echo $y;
  }
}
    
    
    
    }
?>
