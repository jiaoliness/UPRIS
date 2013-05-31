<!DOCTYPE html>

<?php require_once 'functions.php'; 
require_once 'login_class.php'; 
require_once 'admin_class.php'; 
require_once 'adviser_class.php';
top("View"); 

$articleid=$_GET['pid'];

if($_SERVER['REQUEST_METHOD']=='POST'){
    $r=$_POST['reviewers'];

for($i=0;$i<count($_POST['reviewers']);$i++){    
adviser_class::assign_reviewer(rtrim($_POST['pid']), $r[$i]);}
head(adviserview,"?pid=$articleid");
}


if(!login_class::is_logged_in() || !isset($_GET['pid']) || !isset($_SESSION['adviserid'])){
    redirect_to_welcome();
}



$query2= mysql_query("SELECT * FROM `proposals`  WHERE proposalid = $articleid ") or  die(mysql_error()); 
mysql_query("UPDATE `proposals`  set status='pending' WHERE proposalid = $articleid ")or  die(mysql_error());
if(mysql_num_rows($query2)){  
while ($row = mysql_fetch_assoc($query2)) {

?>

<div id="bodyPan">
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
        	   <li><label><?php 
							echo $row['title'];?> 
							</label></li>
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

        <h3>Assign Reviewers</h3>     
       <form action="adviserview.php?pid=<?php echo $articleid;?>" method="POST">    
 <?php      adviser_class::view_reviewers($_SESSION['adviserid'],$articleid);    ?>
            
      </form>
        <hr>     <h3>Already Assigned Reviewers</h3>    
       <?php adviser_class::assigned_reviewers($_SESSION['adviserid'],$articleid);   ?>
        

    
</div>



<?
echo $bottom;
?>
