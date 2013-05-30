<!DOCTYPE html>

<?php require_once 'functions.php'; 
require_once 'login_class.php'; 
require_once 'admin_class.php'; 
require_once 'reviewer_class.php';
top("View"); 

$articleid=$_GET['pid'];

if(!login_class::is_logged_in() || !isset($_GET['pid']) || !isset($_SESSION['reviewerid'])){
    redirect_to_welcome();
}



$query2= mysql_query("SELECT * FROM `proposals`  WHERE proposalid = $articleid ") or  die(mysql_error()); /*query the users unpaid loans*/
if(mysql_num_rows($query2)){  
while ($row = mysql_fetch_assoc($query2)) {

?>

<div id="bodyPan">
       <div id="bodyLeftPan"> 
   <div id="bookcatagories">
      <div id="nameonePan">
  
        	<ul>
        	   <li><label>Project Title:   </label> 
               	   </li>
        	   <li><label>Proponents:   </label> 
       		   </li>
       		   <li><label>Field of study:</label>  
        	   </li>
        	   <li><label>Duration of study:</label>  
        	   </li>
                    <li><label>Expected budget:</label>  
        	   </li>
                    <li><label>Date Submitted:</label>  
        	   </li>
                   
                    <li><label>Attached Document:</label>  
        	   </li>
                           	        	 
        	</ul>
      </div>
             <div id="discountonePan">
             <ul>
        	   <li><label><?php echo $row['title'];?> </label> 
               	   </li>
        	   <li><label><?php echo $row['proponents'];?> </label> 
       		   </li>
       		   <li><label><?php echo admin_class::display_field($row['field']);?></label>  
        	   </li>
        	   <li><label><?php echo $row['duration'];?></label>  
        	   </li>
                    <li><label><?php echo number_format($row['budget']);?></label>  
        	   </li>
                    <li><label><?php echo date("l, M d, Y",strtotime($row['date']));?></label>  
        	   </li>
                    <li><label><a href="<?php echo $row['doc'];?>">View /</a></label>  
        	  <label><a href="download.php?file=<?php echo $row['doc'];?>">Download</a></label>  
        	   </li>
                   
                            	         	 
        	</ul>
             </div> </div>
<?php
    
    
}}
?>

             </div> 
        <h3>Recommend this proposal for approval</h3>     
        <a href="guidelines.php?pid=<?php echo $_GET['pid'];?>&rid=<?php echo $_SESSION['reviewerid']?>">Make review</a>
     

    
</div>



<?php
echo $bottom;
?>
