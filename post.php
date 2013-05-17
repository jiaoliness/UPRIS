<!DOCTYPE html>
<? 
require_once 'functions.php'; 
require_once 'login_class.php'; 
top("proposal"); 

if(!isset($_SESSION['risid'])){
    redirect_to_welcome();
}



$u=$_SESSION['risid'];
        ?>
<div id="bodyPan">
  <div id="bodyLeftPan">
	<h3><span>New </span>Proposal</h3>
        
        <div id="bookcatagories">
	<form name="agreement" method="post" enctype="multipart/form-data" action="upload.php">
      <div id="nameonePan">
  
        	<ul>
        	   <li><label for="title">Project Title:   </label> 
               	   </li>
        	   <li><label for="prop">Proponents:   </label> 
       		   </li>
       		   <li><label for="field">Field of study:</label>  
        	   </li>
        	   <li><label for="time">Duration(days):</label>  
        	   </li>
                    <li><label for="budget">Budget(Php):</label>  
        	   </li>
                    <li><label for="file">Upload Document:</label>  
        	   </li>
        	         	 
        	</ul>
      </div>
             <div id="discountonePan">
                 <ul>
                     <li><input name="title" required="required"/> </li> 
                     <li><input name="prop" required="required"/></li>
                     <li><input name="field" required="required"/> </li>
                     <li><input name="time" required="required"/></li>
                     <li><input  name="budget" required="required"/></li>                                  
                     <li><input type="file" name="image" required="required"></li>  
                 </ul> 
             </div>
            
              <div id="bodyRightPan2">
  	<h2><span>Project </span>Abstract</h2>
	                 <div id="agreement">
                     <textarea name="abs" placeholder="abstract" rows="5" cols="50"></textarea>       
                 </div>
         <input type="hidden" name="userid" value="<?echo $u?>">
     	<input name="Submit" type="submit" value="Submit">
   
  </div>

        </div>        
  

	
</form>


    <?



    
    ?>
<div>
    
       


</div></div></div>

<? echo $bottom; ?>