<?php
require_once 'dbconnection.php';
dbconnection::getConnection();

class proposal_class{

    public static function approvedAdviser($id){
        
        
    }
    
     public static function approvedReviewer($id){
        
        
    }
    
     public static function approvedBudget($id){
        
        
    }

public static function view_proposals($sesid,$filter){
    
$query2= mysql_query("SELECT * FROM `proposals`  WHERE proponentid = $sesid && $filter ORDER BY proposalid DESC") or  die(mysql_error()); /*query the users unpaid loans*/
if(mysql_num_rows($query2)){  
    
 echo '<table border="1">';    
 echo "<tr>
<th>ID</th><th>Title</th><th>Date Submitted</th><th>Status</th></tr>";
 
while ($row = mysql_fetch_assoc($query2)) {
$lid=$row['proposalid'];

echo " <tr> <td>".$lid."</td>";
echo "<td><a href=\"view.php?pid=".$row['proposalid']."\">".$row['title']."</a></td>";
echo "<td>".date("l, M d, Y",strtotime($row['date']))."</td>";

echo "<td>".$row['status']."</td></tr>";

}
echo '</table>';
}
}

    
}
?>
