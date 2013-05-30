<!DOCTYPE html>
<?php
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
        <p><span>Please download first the research proposal template <a href="download.php?file=./docs/2012 RESEARCH PROPOSALS APPLICATION GUIDE Forms 1 to 5 revised as of 05-21-12.doc">here</a>, fill it up and attach.</span></p>
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
                <li><select name="field">
				<option name="field" value="agr" >Agriculture</option> 
				<option name="field" value="arch"> Architecture</option>
				<option name="field" value="bio" >Biology</option>
				<option name="field" value="cmsc">Computer Science</option>
				<option name="field" value="cme">Computer Engineering</option>
				<option name="field" value="phi" >Philosophy</option>       	    	
				<option name="field" value="fs">Food Science</option> 
				<option name="field" value="mcb" >Microbiology</option> 
				<option name="field" value="qphy" >Quantum Physics</option> 
				<option name="field" value="envs" >Environmental Science</option> 
				<option name="field" value="ch" >Chemistry</option>                        
                </select> </li>
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
				<input type="hidden" name="userid" value="<?php echo $u?>">
				<input id = "reg" name="Submit" type="submit" value="Submit">
			</div></div></div>
			</form>
        </div>
<?php echo $bottom; ?>