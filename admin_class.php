<?php /*contains functions used by administrators*/
    require_once 'dbconnection.php'; 
     require_once 'functions.php'; 
    dbconnection::getConnection();  /*creates a database connection*/

    class admin_class {
        private static $instance = null;
        public static function getInstance(){
            if(self::$instance == null){
                self::$instance = new admin_class();
            }
        return self::$instance;
    }
    
    public static function display_edit($page){ /*displays registered users names and email with the option to edit their user profile and change the interest rates on their existing loans*/
        $start=($page*5)-5;
        $query= mysql_query("SELECT userid, firstname, lastname, email FROM `personalinfo` LIMIT $start, 5") or  die(mysql_error()); 
        while ($row = mysql_fetch_assoc($query)) {
            $lid=$row['userid'];
            echo " <ul id=\"loan\"> <li> User ID: ".$lid."</li>";
            echo "<li>Name: ".$row['firstname']." ".$row['lastname']."</li>";
            echo "<li>Email: ".$row['email']."</li>";
            echo "<a href=\"admineditprofile.php?uid=$lid\"onclick=\"return confirm('Are you sure you want to edit his profile?')\">Edit Profile</a><br/>";
            echo "<a href=\"admineditrate.php?uid=$lid\"onclick=\"return confrim('Edit rates for this user?')\">Edit Rates</a></ul>";
        }
    }

    public static function isadmin(){ /*returns true if the the admin session is set, else retuns false*/
        if(isset($_SESSION['adminid'])){
            return true;
        }
        else{
            return false;
        }    
    }

    public static function display_rates($uid,$page){ /*displays the unpaid loans of a user with the option to change its existing interest rate*/
        $sesid=$uid;
        $start=($page*5)-5;
        $query= mysql_query("SELECT loanid,loanamount,rate,date FROM `loaninfo` 
        WHERE userid = $sesid and status='unpaid' LIMIT $start, 5") or  die(mysql_error()); 
        if(mysql_num_rows($query)){    
            while ($row = mysql_fetch_assoc($query)) {
                $l=$row['loanid'];
                echo " <ul id=\"loan\"> <li> Loan ID: ".$l."</li>";
                echo "<li>Current Interest rate: ".($row['rate'])*100 ."%"."</li>"; /*multiplies the rate value retrived from the database by 100% to yield a percentage value*/
                echo "<li>Date/Time borrowed: ".date("l, M d, Y / h:i a",strtotime($row['date']))."</li>"; /*formats the date/time string retrieved form the database to a readable format, l(full name of day), M(abreviated name of month) d(the day in 2 numbers), Y(full year) / h(hour in 2 digits, 12 hour format):i(minute in 2 digits) a(am or pm in lowercase)*/
                echo "<li>Amount borrowed: ".number_format($row['loanamount'],2)."</li>"; /*formats amount to place a comma between 3 digits and put 2 digits after the decimal point*/
                $value=($row['loanamount'])*(1+($row['rate'])); /*multiplies the original loan amount to 1+interest rate to yield the amount to be paid*/
                echo "<li>Amount to be paid: ".number_format($value,2)."</li>";/*same format as ammount borrowed*/
                $dbValue=$row['rate'];/*stores the current rate of each loan from the database, this is used in the dropdown table below so the default selected value is the current rate*/
?>
    <form action="changerate.php?lid=<?php echo $l;?>&p=<?echo $page;?>" method="post">
    <select name="rate">;
        <option name="rate" value="0.08"<?php echo $dbValue==0.08? 'selected="selected"' : ""?>>8%</option> <!--will echo select='selected' if 0.08 is the current rate of this loan-->
        <option name="rate" value="0.07"<?php echo $dbValue==0.07? 'selected="selected"' : ""?>>7%</option>
        <option name="rate" value="0.06"<?php echo $dbValue==0.06? 'selected="selected"' : ""?>>6%</option>
        <option name="rate" value="0.05"<?php echo $dbValue==0.05? 'selected="selected"' : ""?>>5%</option>
        <option name="rate" value="0.04"<?php echo $dbValue==0.04? 'selected="selected"' : ""?>>4%</option>       	    	
        <option name="rate" value="0.03"<?php echo $dbValue==0.03? 'selected="selected"' : ""?>>3%</option> </select> 
        <input id="reg" type="submit" value="Change rate!" /></form></ul>
<?php   
    }}
    else{
    echo "<h3> This user currently has no loans.</h3>"; /*displays this message if the selected user does not have any existing unpain loans*/
    }

    }

    public static function edit_rate($lid,$newrate){    /*changes the rate on a loan, takes the new interest rate and loanID as parameters*/
        mysql_query("UPDATE loaninfo SET rate=$newrate WHERE loanid=$lid")or  die(mysql_error());    
        
        return true; /*for TDD tests purposes*/
    }
    }
?>