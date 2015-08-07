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
                  $check_flag_query="SELECT * FROM uni_current_detail WHERE prn=$prn";
                    if($check_flag=mysql_query($check_flag_query)){
                      echo "in while";
                        while($query_flag_detail = mysql_fetch_assoc($check_flag)){
                             $flag=$query_flag_detail['flag'];
                             echo "flag is ".$flag;
                             $mail=$query_row['email_id'];
                             echo "<br>";echo "mail from curent ".$mail;echo "<br>";
                                //check flag for already request done no duplicate is allow
                                if($flag == 0){
                                  $query = "INSERT INTO `uni_current_detail` VALUES ($prn,'$email_id',$phone_no,'$birth_date')";
                                  if($query_run = mysql_query($query)){
                                    echo "entered detail in current table";
                                    echo "<br>";
                                    $query_update_flag="UPDATE uni_current_detail SET flag=1 WHERE prn=$prn";
                                    mysql_query($query_update_flag) or die(mysql_error());
                                  }
                                  else{die(mysql_error());}
                                }
                                else{echo "Detail is already Verified";}
                        }
                    }									
								}
						}
						/*if detail doesn't match with master table or [multiple row return-this will never happen in ideal case] then enter that 
						form data into "uni_pending_detail" table */
						else{
						echo "information not match<br>";
               $check_flag_query="SELECT * FROM uni_pending_detail WHERE prn=$prn";
                    if($check_flag=mysql_query($check_flag_query)){
                       while($query_flag_detail = mysql_fetch_assoc($check_flag)){
                           $flag=$query_flag_detail['flag'];
                           echo "flag is ".$flag;
                           //check flag for already request done no duplicate is allow
                           if($flag == 0){
                             	$query = "INSERT INTO `uni_pending_detail` VALUES ($prn,'$email_id',$phone_no,'$birth_date')";
                  							if($query_run = mysql_query($query)){
                  								echo "entered detail in pending table";
                                  $query_update_flag="UPDATE uni_pending_detail SET flag=1 WHERE prn=$prn";
                                  mysql_query($query_update_flag) or die(mysql_error());
                  								echo "<br>";
                  							}
                  							else{die(mysql_error());}
                            }
                            else{echo "Detail is already in Pending state";}    
                        }
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





<html>
<head>
    <!-- Define some CSS -->
  <style type="text/css">
    .label {width:150px;text-align:right;float:left;padding-right:10px;font-weight:bold;}
    #form1 label.error, .output {color:#FB3A3A;font-weight:bold;}
    .inputForm{
      border-radius:5px;
      width: 200px;
      height: 25px;
      margin-bottom: 10px;
      -moz-border-radius:5px;
      -webkit-border-radius:5px;
   }
  </style>
  
  <!-- Load jQuery and the validate plugin -->
<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="jquery-validate.js"></script>

  
  <!-- jQuery Form Validation code -->
  <script>
  
  // When the browser is ready...
  $(function() {

  	var checker=document.getElementById("checkbox");
  	var submit=document.getElementById("submit");

  	checker.onchange=function(){
  		if(this.checked){
  			submit.disabled=false;
  		}
  		else{
  		    submit.disabled=true;
  		}
  	}
  
    // Setup form validation on the #register-form element
    $("#form1").validate({
    
        // Specify the validation rules
        rules: {
           prn: {
                required: true,
                minlength: 16,
               
            },
            email_id: {
                required: true,
                email: true
            },
            phone_no: {
                required: true,
                minlength: 10
            },
            birth_date: {
                required: true,
             }
        },
        
        // Specify the validation error messages
        messages: {
            prn: {
                required: "Please provide a PRN",
                minlength: "Your PRN must be at least 16 characters long",
               
            }, 
            email_id: "Please enter a valid email address",
            phone_no: {
                required: "Please provide a password",
                minlength: "Your phone no must be at least 10 characters long"
            },           
            birth_date: {
                required: "Please provide a Birthdate",
                }
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
  </script>
</head>
<body>
  
  <!--  The form that will be parsed by jQuery before submit  -->
<form action="index.php" method="POST" id="form1">

	 <div class="label">PRN</div><input type="text" id="prn" name="prn" class="inputForm" placeholder="e.g. 2012033800088965"/><br />
    <div class="label">Email</div><input type="text" id="email_id" name="email_id" class="inputForm" placeholder="e.g. riddhisoni@gmail.com"/><br />
    <div class="label">Phone Number</div><input type="text" id="phone_no" name="phone_no" class="inputForm" placeholder="e.g. 9408344653"/><br />
    <div class="label">Birthdate</div><input type="date" id="birth_date"  name="birth_date" class="inputForm" placeholder="05-Aug-1990"><br />
    <div class="label"><input type="checkbox" name="" value="" id="checkbox"></div> I have Accept all Terms & Conditions<br /><br /><br />
    <div style="margin-left:140px;"><input type="submit" name="submit" value="Submit" class="inputForm" id="submit" disabled/></div>

</form>
  
</body>
</html>