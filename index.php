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
       $check_data="SELECT * FROM uni_current_detail WHERE prn=$prn";
       $num_row_data = mysql_num_rows(mysql_query($check_data));
       echo "num row data ...".$num_row_data;
		   $check="SELECT * FROM uni_master_detail WHERE prn=$prn";

    			    if($check_run=mysql_query($check)){
    				    //if detail is match then count number of rows query return
    						$num_row = mysql_num_rows(mysql_query($check));
                // echo "tot no of row returned is ".$num_row;
                //if one and only one row is returned then and then enter form detail in our temporary table "uni_current_detail"
    						if($num_row==1){
    								while($query_row = mysql_fetch_assoc($check_run)){
    									$mail=$query_row['email_id'];
    									echo "<br>";echo "mail from curent ".$mail;echo "<br>";
                        if($num_row_data == 0){
        									$query = "INSERT INTO `uni_current_detail`(prn,email_id,phone_no,birth_date) VALUES ($prn,'$email_id',$phone_no,'$birth_date')";
        									if($query_run = mysql_query($query)){
        										echo "entered detail in current table";
        										echo "<br>";
        									}
        									else{die(mysql_error());}
                        }
                        else{
                          print '<script type="text/javascript">'; 
                          print 'alert("Detail is already Verified")'; 
                          print '</script>';
                        }  
                    }
    						}
    						/*if detail doesn't match with master table or [multiple row return-this will never happen in ideal case] then enter that 
    						form data into "uni_pending_detail" table */
    						else{
    						// echo "information not match";
                $check_data="SELECT * FROM uni_pending_detail WHERE prn=$prn";
                $num_row_data = mysql_num_rows(mysql_query($check_data));
                echo "num row data ...".$num_row_data;
    						echo "<br>";
                    if($num_row_data == 0){
                      $query = "INSERT INTO `uni_pending_detail`(prn,email_id,phone_no,birth_date) VALUES ($prn,'$email_id',$phone_no,'$birth_date')";
          							if($query_run = mysql_query($query)){
          								echo "entered detail in pending table";
          								echo "<br>";
          							}
          							else{die(mysql_error());}
                    }
                    else{
                          print '<script type="text/javascript">'; 
                          print 'alert("Detail is already in Pending state")'; 
                          print '</script>';
                    }
    						}
				}//end of if all field has value check detail with "uni_master_detail" table if
				else{echo mysql_error();}

	}// end of no empty field check if
}
else{
	echo "not done";
}



?>

