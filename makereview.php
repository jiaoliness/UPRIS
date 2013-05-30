<!DOCTYPE html>
<?php
include_once 'functions.php';
include_once 'login_class.php';
include_once 'reviewer_class.php';
top("Review");

 
if(!isset($_SESSION['reviewerid']) OR !isset($_GET['pid']) OR !isset($_GET['rid'])){
    redirect_to_welcome();
}

$pid=$_GET['pid'];
$rid=$_GET['rid'];

$result=mysql_query("SELECT * from reviews WHERE proposalid=$pid and reviewerid=$rid");
if(mysql_num_rows($result) == 1){
    echo "<h1><span>You already submitted a proposal for this submission</h1></span>";
    
    
}
else{


 if($_SERVER['REQUEST_METHOD']=='POST'){
     
     reviewer_class::post_review($pid,$rid,
             $_POST['1rate'],trim($_POST['1comment']),
             $_POST['2rate'],trim($_POST['2comment']),
             $_POST['3rate'],trim($_POST['3comment']),
             $_POST['4rate'],trim($_POST['4comment']),
             $_POST['5rate'],trim($_POST['5comment']),
             $_POST['6rate'],trim($_POST['6comment']),
             $_POST['7rate'],trim($_POST['7comment']),
             $_POST['8rate'],trim($_POST['8comment']) 
             ,$_POST['overall']);
 }

 
 
 ?>
<form action="makereview.php?rid=<?php echo $rid;?>&pid=<?php echo $pid;?>" method="POST">
    
  <p><span>Please download first the Criteria for evaluating this proposal <a href="download.php?file=./docs/CriteriaForR&DProposals&Form.pdf">here</a>.</span></p>   
<label for="1rate">1.</label>
<select name="1rate" required="required">
<option name="1rate" value="1">1</option> 
<option name="1rate" value="2">2</option>
<option name="1rate" value="3">3</option>
<option name="1rate" value="4">4</option>
<option name="1rate" value="5">5</option>
</select><br>
<textarea name="1comment" required="required" class="review" required="required" placeholder="write a comment.." rows="5" cols="90"></textarea><br>



<label for="2rate">2.</label>
<select name="2rate" required="required">
<option name="2rate" value="1">1</option> 
<option name="2rate" value="2">2</option>
<option name="2rate" value="3">3</option>
<option name="2rate" value="4">4</option>
<option name="2rate" value="5">5</option>
</select><br>
<textarea name="2comment" required="required" class="review" required="required" placeholder="write a comment.." rows="5" cols="90"></textarea><br>

<label for="3rate">3.</label>
<select name="3rate" required="required">
<option name="3rate" value="1">1</option> 
<option name="3rate" value="2">2</option>
<option name="3rate" value="3">3</option>
<option name="3rate" value="4">4</option>
<option name="3rate" value="5">5</option>
</select><br>
<textarea name="3comment" required="required" class="review" required="required" placeholder="write a comment.." rows="5" cols="90"></textarea><br>

<label for="4rate">4.</label>
<select name="4rate" required="required">
<option name="4rate" value="1">1</option> 
<option name="4rate" value="2">2</option>
<option name="4rate" value="3">3</option>
<option name="4rate" value="4">4</option>
<option name="4rate" value="5">5</option>
</select><br>
<textarea name="4comment" required="required" class="review" required="required" placeholder="write a comment.." rows="5" cols="90"></textarea><br>

<label for="5rate">5.</label>
<select name="5rate" required="required">
<option name="5rate" value="1">1</option> 
<option name="5rate" value="2">2</option>
<option name="5rate" value="3">3</option>
<option name="5rate" value="4">4</option>
<option name="5rate" value="5">5</option>
</select><br>
<textarea name="5comment" required="required" class="review" required="required" placeholder="write a comment.." rows="5" cols="90"></textarea><br>

<label for="6rate">6.</label>
<select name="6rate" required="required">
<option name="6rate" value="1">1</option> 
<option name="6rate" value="2">2</option>
<option name="6rate" value="3">3</option>
<option name="6rate" value="4">4</option>
<option name="6rate" value="5">5</option>
</select><br>
<textarea name="6comment" required="required" class="review" required="required" placeholder="write a comment.." rows="5" cols="90"></textarea><br>

<label for="7rate">7.</label>
<select name="7rate" required="required">
<option name="7rate" value="1">1</option> 
<option name="7rate" value="2">2</option>
<option name="7rate" value="3">3</option>
<option name="7rate" value="4">4</option>
<option name="7rate" value="5">5</option>
</select><br>
<textarea name="7comment" required="required" class="review" required="required" placeholder="write a comment.." rows="5" cols="90"></textarea><br>

<label for="8rate">8.</label>
<select name="8rate" required="required">
<option name="8rate" value="1">1</option> 
<option name="8rate" value="2">2</option>
<option name="8rate" value="3">3</option>
<option name="8rate" value="4">4</option>
<option name="8rate" value="5">5</option>
</select><br>
<textarea name="8comment" required="required" class="review" required="required" placeholder="write a comment.." rows="5" cols="90"></textarea><br>

<select name="overall" required="required">
<option name="overall" value="recommend">Recommend</option> 
<option name="overall" value="decline">Don't recommend</option>
<option name="overall" value="pending">Haven't decided</option>
<option name="overall" value="no">Decline</option>
</select><br>

<input type="submit" value="Post review">

</form>





<?php
}
 echo $bottom;
?>
