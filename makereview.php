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

$result=mysql_query("SELECT * from reviewed WHERE proposalid=$pid and reviewerid=$rid");
if(mysql_num_rows($result) == 1){
    echo "<h1><span>You already submitted a proposal for this submission</h1></span>";
    
    
}
else{


 if($_SERVER['REQUEST_METHOD']=='POST'){
     
     reviewer_class::post_review($pid,$rid,$_POST['rrate'],trim($_POST['rcomment']),$_POST['hrate'],
             trim($_POST['hcomment']),$_POST['overall']);
     
     
 }

 
 
 ?>
<form action="makereview.php?rid=<?echo $rid;?>&pid=<?echo $pid;?>" method="POST">
<label for="rrate">Relevance to the topic</label>
<select name="rrate" required="required">
<option name="rrate" value="1">1</option> 
<option name="rrate" value="2">2</option>
<option name="rrate" value="3">3</option>
<option name="rrate" value="4">4</option>
<option name="rrate" value="5">5</option>
</select><br>
<textarea name="rcomment" required="required" class="review" required="required" placeholder="write a comment.." rows="5" cols="90"> </textarea><br>



<label for="hrate">Helpfulness</label>
<select name="hrate" required="required">
<option name="hrate" value="1">1</option> 
<option name="hrate" value="2">2</option>
<option name="hrate" value="3">3</option>
<option name="hrate" value="4">4</option>
<option name="hrate" value="5">5</option>
</select><br>
<textarea name="hcomment" required="required" class="review" required="required" placeholder="write a comment.." rows="5" cols="90"> </textarea><br>

<label for="rate">Another category</label>
<select name="rate" required="required">
<option name="rate" value="1">1</option> 
<option name="rate" value="2">2</option>
<option name="rate" value="3">3</option>
<option name="rate" value="4">4</option>
<option name="rate" value="5">5</option>
</select><br>
<textarea name="comment" required="required" class="review" required="required" placeholder="write a comment.." rows="5" cols="90"> </textarea><br>


<select name="overall" required="required">
<option name="overall" value="recommend">Recommend</option> 
<option name="overall" value="decline">Don't recommend</option>
<option name="overall" value="pending">Haven't decided</option>
<option name="overall" value="no">Decline</option>
</select><br>

<input type="submit" value="Post review">

</form>





<?
}
 echo $bottom;
?>
