<?php
include 'database.php';
// check for data is post or not from form
if(isset($_POST['prn']) && isset($_POST['email_id']) && isset($_POST['phone_no']) && isset($_POST['birth_date'])){
	$prn=$_POST['prn'];
	$email_id=$_POST['email_id'];
	$phone_no=$_POST['phone_no'];
	$birth_date=$_POST['birth_date'];
	echo "<br>";echo "prn is: ".$prn;
	echo "<br>";echo "email is: ".$email_id;
	echo "<br>";echo "phone no is:  ".$phone_no;
	echo "<br>";echo "birth_date is:  ".$birth_date;echo "<br>";
	
    // no empty field check
	if (!empty($_POST['prn']) && !empty($_POST['email_id']) && !empty($_POST['phone_no']) && !empty($_POST['birth_date'])){
		// if all field has value check detail with "uni_master_detail" table 
		$check="SELECT * FROM uni_master_detail WHERE prn=$prn";
			    if($check_run=mysql_query($check)){
				        //if detail is match then count number of rows query return
						$num_row = mysql_num_rows(mysql_query($check));
                        echo "tot no of row returned is ".$num_row;
                        //if one and only one row is returned then and then enter form detail in our temporary table "uni_current_detail"
						if($num_row==1){
								while($query_row = mysql_fetch_assoc($check_run)){
									$mail=$query_row['email_id'];
									echo "<br>";echo "mail from curent ".$mail;echo "<br>";
									$query = "INSERT INTO `uni_current_detail` VALUES ($prn,'$email_id',$phone_no,'$birth_date')";
									if($query_run = mysql_query($query)){
										echo "query run is in current ".$query_run;
										echo "<br>";
										echo "entered detail in current table";
										echo "<br>";
									}
									else{die(mysql_error());}
								}
						}
						/*if detail doesn't match with master table or [multiple row return-this will never happen in ideal case] then enter that 
						form data into "uni_pending_detail" table */
						else{
						echo "information not match";
						echo "<br>";
						$query = "INSERT INTO `uni_pending_detail` VALUES ($prn,'$email_id',$phone_no,'$birth_date')";
							if($query_run = mysql_query($query)){
								echo "query run is in pending ".$query_run;
								echo "<br>";
								echo "entered detail in pending table";
								echo "<br>";
							}
							else{die(mysql_error());}
						}
				}//end of if all field has value check detail with "uni_master_detail" table if
				else{echo mysql_error();}

	}// end of no empty field check if
}
else{
	echo "not done";
}



?>



<form action="index.php" method="POST">

PRN:<input type="number" name="prn"><br><br>
E-mail:<input type="email" name="email_id"><br><br>
Phone number:<input type="text" maxlength="10" name="phone_no"><br><br>
Bdate:<input type="date"  name="birth_date"><br><br>
<input type="checkbox" name="vehicle" value="Bike"> I accept terms and condition<br><br>

<input type="submit"  value="submit">



</form>





 


