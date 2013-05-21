<?php /*contains functions used by administrators*/
    require_once 'dbconnection.php'; 
     require_once 'functions.php'; 
    dbconnection::getConnection();  /*creates a database connection*/

    class adviser_class {
        private static $instance = null;
        public static function getInstance(){
            if(self::$instance == null){
                self::$instance = new adviser_class();
            }
        return self::$instance;
    }
    
    public static function view_proposals($id,$status){
        $result=mysql_query("SELECT * from proposals WHERE field =(SELECT field from adviserinfo WHERE `adviserid`=$id) and status=$status") or die(mysql_error());
        if(mysql_num_rows($result)){  
        
        echo '<table border="1">';    
 echo "<tr>
<th>ID</th><th>Title</th><th>Date Submitted</th><th>Status</th><th>Approve</th></tr>";
        
       while ($row = mysql_fetch_assoc($result)) {   
           $pid=$row['proposalid'];
      echo " <tr> <td>".$pid."</td>";
echo "<td><a href=\"view.php?pid=".$row['proposalid']."\">".$row['title']."</a></td>";
echo "<td>".date("l, M d, Y",strtotime($row['date']))."</td>";

echo "<td>".$row['status']."</td>"."<td>"."<a href=\"approveproposal.php?pid=$pid\">"."Approve"."</a></td></tr>";

}
echo '</table>';
        
    }}
            
            
            
            
  }
?>
