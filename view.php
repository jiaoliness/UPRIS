<!DOCTYPE html>

<? require_once 'functions.php'; 
require_once 'login_class.php'; 
top("View"); 

if(!login_class::is_logged_in() || !login_class::is_valid_user($_SESSION['risid']) || !isset($_GET['pid'])){
    redirect_to_welcome();
}
$articleid=$_GET['pid'];

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
        	   <li><label><?echo $row['title'];?> </label> 
               	   </li>
        	   <li><label><?echo $row['proponents'];?> </label> 
       		   </li>
       		   <li><label><?echo $row['field'];?></label>  
        	   </li>
        	   <li><label><?echo $row['duration'];?></label>  
        	   </li>
                    <li><label><?echo number_format($row['budget']);?></label>  
        	   </li>
                    <li><label><?echo date("l, M d, Y",strtotime($row['date']));?></label>  
        	   </li>
                    
                        <li><label><a href="download.php?file=<?echo $row['doc'];?>"><?echo $row['title'];?></a></label>  
        	   </li>
                   
                            	         	 
        	</ul>
             </div> </div>
<?    
    
    
}}
?>

           
           
           
           
           </div>
</div>



<?
echo $bottom;
?>
