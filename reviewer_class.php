<?php /*contains functions used by administrators*/
    require_once 'dbconnection.php'; 
     require_once 'functions.php'; 
        require_once 'login_class.php'; 
    dbconnection::getConnection();  /*creates a database connection*/

    class reviewer_class {
        private static $instance = null;
        public static function getInstance(){
            if(self::$instance == null){
                self::$instance = new reviewer_class();
            }
        return self::$instance;
    } 


public static function view_proposals($id,$status){
    

        $res=mysql_query("SELECT proposalid from reviews where reviewerid=$id") or die(mysql_error());
        if(mysql_num_rows($res)){
		echo '<table class="table table-stripped" border="1">';
		echo "<tr><th>ID</th><th>Title</th><th>Date Submitted</th><th>Status</th>";
		if($status!="'approved'" AND $status!="'declined'"){echo "<th>Approve</th></tr>";}  
        while($row2 = mysql_fetch_assoc($res)){
        $pid=$row2['proposalid'];
        $result=mysql_query("SELECT * from proposals where proposalid=$pid and status=$status") or die(mysql_error());
        
        if(mysql_num_rows($result)){  
 
        
       while ($row = mysql_fetch_assoc($result)) {   
           $pid=$row['proposalid'];
      echo " <tr> <td>".$pid."</td>";
      
echo "<td><a href=\"reviewerview.php?pid=";

echo $row['proposalid']."\">".$row['title']."</a></td>";

echo "<td>".date("l, M d, Y",strtotime($row['date']))."</td>";
echo "<td>".$row['status']."</td>";
if($status!="'approved'" AND $status!="'declined'"){echo "<td>"."<a href=\"guidelines.php?pid=$pid&rid=$id\">"."Make a review"."</a></td>";}
else {}
echo "</tr>";
}

    }}
		echo '</table>';
        
	}}
    
public static function post_review($pid,$rid,$oner,$onec,$twor,$twoc,$threer,$threec,$fourr,$fourc,$fiver,$fivec,$sixr,$sixc,$sevenr,$sevenc,$eightr,$eightc,$overall){
    mysql_query("INSERT into reviewed VALUES(0,'$pid','$rid','$oner','$onec','$twor','$twoc','$threer','$threec','$fourr','$fourc','$fiver','$fivec','$sixr','$sixc','$sevenr','$sevenc','$eightr','$eightc','$overall')") or die(mysql_error());
    head(reviewerprofile,"");
}
    
    
    
    
    
    
    
    
    
    
    
    
    
    }?>
