<?php /*contains functions used by administrators*/
    require_once 'dbconnection.php'; 
     require_once 'functions.php'; 
        require_once 'login_class.php'; 
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
        $result=mysql_query("SELECT * from proposals WHERE status=$status") or die(mysql_error());
		if(mysql_num_rows($result)){  
			echo '<table class="table table-stripped" border="1">';    
			echo "<tr><th>ID</th><th>Title</th><th>Date Submitted</th><th>Status</th>";
			if($status!="'approved'" AND $status!="'declined'"){echo "<th>Approve</th>";}
			echo '</tr>';
        while ($row = mysql_fetch_assoc($result)) {   
			$pid=$row['proposalid'];
			echo " <tr> <td>".$pid."</td>";
			echo "<td><a href=\"";
			if(login_class::is_adviser()){
				echo "adviserview.php?pid=";
			}else{
				echo "view.php?pid=";
			}
			echo $row['proposalid']."\">".$row['title']."</a></td>";
			echo "<td>".date("l, M d, Y",strtotime($row['date']))."</td>";
			echo "<td>".$row['status']."</td>";
			if($status!="'approved'" AND $status!="'declined'"){
				echo "<td>"."<a href=\"approveproposal.php?pid=$pid\">"."Approve"."</a></td>";
			}else{}
			echo "</tr>";
		}
		echo '</table>';
        
    }}
    
    public static function assign_reviewer($pid,$id){
		mysql_query("INSERT into reviews (`proposalid`, `reviewerid`) VALUES('$pid', '$id')") or die(mysql_error());       
    }
    
    public static function view_reviewers($aid,$pid){
		//$result= mysql_query("SELECT * from reviewerinfo WHERE field=(SELECT field from adviserinfo WHERE `adviserid`=$aid) and active=1") or die(mysql_error()); 
		$result= mysql_query("SELECT * from reviewerinfo WHERE active=1") or die(mysql_error()); 
		$count=0;
		while( $row=  mysql_fetch_assoc($result)){
			$rid=$row['reviewerid'];
		$result2= mysql_query("SELECT id from reviews WHERE proposalid=$pid and reviewerid=$rid") or die(mysql_error());  
			if(mysql_num_rows($result2)==0){
				$count+=1;
				echo $row['firstname']." ".$row['lastname'];
				echo '<input type="checkbox" name="reviewers[]" value='.$row['reviewerid']."/>";
				echo '<input type="hidden" name="pid" value="'.$pid.'"/>';
			} 
		}
       if($count>0) { echo '<input type="submit" value="Assign!">'; }  else { echo "No reviewers available to assign";} 
    }
  
    public static function assigned_reviewers($aid,$pid){
		$result= mysql_query("SELECT * from reviewerinfo WHERE field=(SELECT field from adviserinfo WHERE `adviserid`=$aid)") or die(mysql_error());  
		while($row=mysql_fetch_assoc($result)){
			$rid=$row['reviewerid'];
			$result2= mysql_query("SELECT id,recommended from reviews WHERE proposalid=$pid and reviewerid=$rid") or die(mysql_error());
			$row2=mysql_fetch_assoc($result2); 
			if(mysql_num_rows($result2)==1){
				echo "<br/>".$row['firstname']." ".$row['lastname'];
				if($row2['recommended']=='1'){
					echo " recommended this <br/>";
				}
			}          
		}
    }
}
?>
