<!DOCTYPE html>
<?php
require_once 'functions.php';
require_once 'register_class.php';
require_once 'login_class.php';

top("sign-up"); ?>

<div id="bodyPan">
  <div id="bodyLeftPan">

 <?php       
     if(login_class::is_logged_in()){
    ?>  
  
        <h1><span>Please Logout your current account to register!</span></h1>
  </div>
        
  </div>

     <?php  
     } else{
?>
	
   <?php
 if($_SERVER['REQUEST_METHOD']=='POST'){
          
     register_class::register($_POST['usertype'],trim($_POST['firstname']), /*register function, with parameters from submitted form*/
         trim($_POST['lastname']),  trim($_POST['email']),
         trim($_POST['password']), trim($_POST['password2']),
         ($_POST['field']),trim($_POST['ins']),trim($_POST['number'])); 
     
     if(login_class::is_logged_in()){redirect_to_home();}
     
     $fname=trim($_POST['firstname']); /*to preserve values in case of invalid input*/
     $lname= trim($_POST['lastname']);
     $mail=trim($_POST['email']);
     $pass=trim($_POST['password']);
      $dbValue=($_POST['field']);
       $ins=trim($_POST['ins']);
       $num=trim($_POST['number']);
       $type=$_POST['usertype'];
 }
    ?> 
<h1>registration form</h1>
<h3><span>sign</span>-up</h3>
        
        <div id="bookcatagories">
	<form action="register.php" method="post"> 
      <div id="nameonePan">
  
        	<ul>
                    <li><label for="usertype">What are you?   </label> 
               	   </li>
        	   <li> <label for="firstname">First Name:   </label> <span id="txtHintF"></span>
               	   </li>
        	   <li><label for="lastname">Last Name:   </label> <span id="txtHintL"></span>
       		   </li>
       		   <li><label for="email">Email Address:</label>  <span id="txtHintE"></span>
        	   </li>
        	   <li><label for="password">Password:</label>  <span id="txtHintP"></span>
        	   </li>
                    <li><label for="password2">Confirm Password:</label>  <span id="txtHintP2"></span>
        	   </li>
        	   <li><label for="field">Field of Research:</label> 
        	   </li>
        	   <li><label for="ins">Academic Affiliation:</label>  <span id="txtHintI"></span>
        	   </li>
                    <li><label for="number">Registration Number: </label>   <span id="txtHintN"></span>
        	   </li>
        	 
        	</ul>
      </div>
             <div id="discountonePan">
                 <ul>
                     
                     <li><select name="usertype">
<option name="usertype" value="user" <?php if(isset($type)){echo $type=="user"? 'selected="selected"' : ""; }?>>Researcher</option>
<option name="usertype" value="reviewer" <?php if(isset($type)){echo $type=="reviewer"? 'selected="selected"' : ""; }?>>Reviewer</option> 
<option name="usertype" value="adviser" <?php if(isset($type)){echo $type=="adviser"? 'selected="selected"' : ""; }?>>Adviser</option> 
  </select></li>
                     <li><input name="firstname" onkeyup="showHintFirst(this.value)" required="required" <?if(isset($fname)){echo "value=\"$fname\"";}else{echo "autofocus=\"autofocus\"";}?>/> </li> 
                     <li><input name="lastname" onkeyup="showHintLast(this.value)" required="required"<?if(isset($lname)){echo "value=\"$lname\"";}?>/></li>
                     <li><input type="email" onkeyup="showHintEmail(this.value)" name="email" required="required"<?if(isset($mail)){echo "value=\"$mail\"";}?>/> </li>
                     <li><input type="password" onkeyup="showHintPassword(this.value)" name="password" required="required"<?if(isset($pass)){echo "value=\"$pass\"";}?>/></li>
                     <li><input type="password"  name="password2" required="required"/></li>
                         <li><select name="field">
<option name="field" value="agr" <?php if(isset($dbValue)){echo $dbValue=="agr"? 'selected="selected"' : ""; }?>>Agriculture</option> 
<option name="field" value="arch" <?php  if(isset($dbValue)){echo $dbValue=="arch"? 'selected="selected"' : "";} ?>> Architecture</option>
<option name="field" value="bio" <?php if(isset($dbValue)){echo $dbValue=="bio"? 'selected="selected"' : ""; }?>>Biology</option>
<option name="field" value="cmsc" <?php if(isset($dbValue)){echo $dbValue=="cmsc"? 'selected="selected"' : ""; }?>>Computer Science</option>
<option name="field" value="cme" <?php if(isset($dbValue)){echo $dbValue=="cme"? 'selected="selected"' : ""; }?>>Computer Engineering</option>
<option name="field" value="phi" <?php if(isset($dbValue)){echo $dbValue=="phi"? 'selected="selected"' : ""; }?>>Philosophy</option>       	    	
<option name="field" value="fs" <?php if(isset($dbValue)){echo $dbValue=="fs"? 'selected="selected"' : ""; }?>>Food Science</option> 
<option name="field" value="mcb" <?php if(isset($dbValue)){echo $dbValue=="mcb"? 'selected="selected"' : ""; }?>>Microbiology</option> 
<option name="field" value="qphy" <?php if(isset($dbValue)){echo $dbValue=="qphy"? 'selected="selected"' : ""; }?>>Quantum Physics</option> 
<option name="field" value="envs" <?php if(isset($dbValue)){echo $dbValue==""? 'selected="selected"' : ""; }?>>Environmental Science</option> 
<option name="field" value="ch" <?php if(isset($dbValue)){echo $dbValue==""? 'selected="selected"' : ""; }?>>Chemistry</option> 
    
                             
                             </select></li>
                          <li><input name="ins" onkeyup="showHintIns(this.value)" required="required"<?if(isset($lname)){echo "value=\"$ins\"";}?>/></li>
                          <li><input name="number" onkeyup="showHintNumber(this.value)" required="required"<?if(isset($num)){echo "value=\"$num\"";}?>/></li>
                 
                 </ul> 
      </div>
            
              <div id="bodyRightPan2">
  	<h2><span>license</span> agreement</h2>
	                 <div id="agreement">
                     <textarea readonly="readonly">By downloading software of Adobe Systems Incorporated or its subsidiaries ("Adobe") from this site, you agree to the following terms and conditions. If you do not agree with such terms and conditions do not download the software. The terms of an end user license agreement accompanying a particular software file upon installation or download of the software shall supersede the terms presented below.

The export and re-export of Adobe software products are controlled by the United States Export Administration Regulations and such software may not be exported or re-exported to Cuba, Iran, Iraq, Libya, North Korea, Sudan, Syria, or any country to which the United States embargoes goods. In addition, Adobe software may not be distributed to persons on the Table of Denial Orders, the Entity List, or the List of Specially Designated Nationals.

By downloading or using an Adobe software product you are certifying that you are not a national of Cuba, Iran, Iraq, Libya, North Korea, Sudan, Syria, or any country to which the United States embargoes goods and that you are not a person on the Table of Denial Orders, the Entity List, or the List of Specially Designated Nationals.

If the software is designed for use with an application software product (the "Host Application") published by Adobe, Adobe grants you a nonexclusive license to use such software with the Host Application only, provided you possess a valid license from Adobe for the Host Application. Except as set forth below, such software is licensed to you subject to the terms and conditions of the End-User License Agreement from Adobe governing your use of the Host Application.

DISCLAIMER OF WARRANTIES: YOU AGREE THAT ADOBE HAS MADE NO EXPRESS WARRANTIES TO YOU REGARDING THE SOFTWARE AND THAT THE SOFTWARE IS BEING PROVIDED TO YOU "AS IS" WITHOUT WARRANTY OF ANY KIND. ADOBE DISCLAIMS ALL WARRANTIES WITH REGARD TO THE SOFTWARE, EXPRESS OR IMPLIED, INCLUDING, WITHOUT LIMITATION, ANY IMPLIED WARRANTIES OF FITNESS FOR A PARTICULAR PURPOSE, MERCHANTABILITY, MERCHANTABLE QUALITY, OR NONINFRINGEMENT OF THIRD-PARTY RIGHTS. Some states or jurisdictions do not allow the exclusion of implied warranties, so the above limitations may not apply to you.

LIMIT OF LIABILITY: IN NO EVENT WILL ADOBE BE LIABLE TO YOU FOR ANY LOSS OF USE, INTERRUPTION OF BUSINESS, OR ANY DIRECT, INDIRECT, SPECIAL, INCIDENTAL, OR CONSEQUENTIAL DAMAGES OF ANY KIND (INCLUDING LOST PROFITS) REGARDLESS OF THE FORM OF ACTION WHETHER IN CONTRACT, TORT (INCLUDING NEGLIGENCE), STRICT PRODUCT LIABILITY OR OTHERWISE, EVEN IF ADOBE HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. Some states or jurisdictions do not allow the exclusion or limitation of incidental or consequential damages, so the above limitation or exclusion may not apply to you.</textarea>       
                 </div>

        <input id="reg" type="submit" value="Register!" />
  </div>
        </form> </div>     
  
<? }?>
</div>  </div> 

<script src="register.js" type="text/javascript"></script>

 <?   echo $bottom; ?>