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
      $result=mysql_query("SELECT * FROM messages WHERE `to`=$id GROUP BY `from` ORDER BY messageid DESC") or die("error in messages".mysql_error());  
        
      
if(mysql_num_rows($result)>0){
        while ($row = mysql_fetch_assoc($result)) {          
            
echo "<p class=\"".self::get_class($row['messageid'])."\">";
echo "<a href=\"viewmessage.php?mid=".$row['messageid']."\">";
echo $row['subject']."&nbsp&nbsp-&nbsp&nbsp "; 
echo self::limit_echo($row['content'])." &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"; 
echo "<span>".date("M d, Y",strtotime($row['date']))."</span></a></p>";
        }}
        
        else{
            echo "You have no messages";
        }     

    }
    
     public static function view_message($id){
      $result=mysql_query("SELECT * from messages where `messageid`=$id") or die("error in message".mysql_error());
      $row = mysql_fetch_assoc($result);
      $to=$row['to'];
      $from=$row['from'];
      $result2=mysql_query("SELECT * from messages where `to`=$to and `from`=$from ORDER BY messageid DESC") or die("error in message".mysql_error());
     $name=mysql_fetch_assoc(mysql_query("(SELECT firstname, lastname from userinfo WHERE userid=$from) UNION (SELECT firstname, lastname from reviewerinfo WHERE reviewerid=$from) UNION(SELECT firstname, lastname from adviserinfo WHERE adviserid=$from)"));
      while ($row2=mysql_fetch_assoc($result2)) {           
            
        echo "<div class=\"chatdiv\">".$name['firstname']." ".$name['lastname'].$row2['content'];    
        
        echo "</div>";
    }
        
        
    }
    
    public static function limit_echo($text){
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
    
  public static function get_class($id){
        $result=mysql_query("SELECT status from messages where `messageid`=$id") or die(mysql_error());
        $row = mysql_fetch_assoc($result);
        if($row['status']=='read'){
            return "messageRead";
        }
        else{
            return "messageUnRead";
        }
  }   
    
    }
?>
