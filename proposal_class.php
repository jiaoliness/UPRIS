<?php
require_once 'dbconnection.php';
dbconnection::getConnection();

class proposal_class{


public static function view_proposals($sesid,$filter){
    
$query2= mysql_query("SELECT * FROM `proposals`  WHERE proponentid = $sesid && status = $filter ORDER BY proposalid DESC") or  die(mysql_error()); /*query the users unpaid loans*/
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
public static function is_approved($email,$table){
$result=mysql_query("SELECT firstname FROM $table WHERE email='$email' AND active=1") or die(mysql_error());

if(mysql_num_rows($result) == 1){
    return true;
}
else{
    return false;
}
}


    
}
?>
