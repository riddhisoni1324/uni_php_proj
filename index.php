<?php
include 'database.php';
// check for data is post or not from form
if(isset($_POST['email_id']) && isset($_POST['phone_no']) && isset($_POST['birth_date']) ){
  $prn=$_POST['prn'];
  $email_id=$_POST['email_id'];
  $phone_no=$_POST['phone_no'];
  $birth_date=$_POST['birth_date'];
  $emp_id=$_POST['emp_id'];
  $user_type=$_POST['user_type'];
  // echo "user type ".$user_type;
  $check_data=''; $check=''; $insert='';
  switch ($user_type) {
       case "1":
            $check="SELECT * FROM Student_Master WHERE prn=$prn and birth_date='$birth_date'";
            $check_data="SELECT * FROM Student_Reg WHERE prn=$prn and birth_date='$birth_date'";
            $insert="INSERT INTO `Student_Reg`(prn,email_id,phone_no,birth_date) VALUES ($prn,'$email_id',$phone_no,'$birth_date')";
            $pending="INSERT INTO `Pending_Reg`(prn,email_id,phone_no,birth_date,user_type) VALUES ($prn,'$email_id',$phone_no,'$birth_date',$user_type)";
            break;
       case "2":
           $check="SELECT * FROM Emp_Master WHERE emp_id=$emp_id";
           $check_data="SELECT * FROM Emp_Reg WHERE emp_id=$emp_id";
           $insert="INSERT INTO `Emp_Reg`(emp_id,email_id,phone_no,birth_date) VALUES ($emp_id,'$email_id',$phone_no,'$birth_date')";
           $pending="INSERT INTO `Pending_Reg`(emp_id,email_id,phone_no,birth_date,user_type) VALUES ($emp_id,'$email_id',$phone_no,'$birth_date',$user_type)";
           break;
       case "3":
           $check="SELECT * FROM  Temp_Master WHERE phone_no=$phone_no";
           $check_data="SELECT * FROM  Temp_Reg WHERE phone_no=$phone_no";
           $insert="INSERT INTO `Temp_Reg`(email_id,phone_no,birth_date) VALUES ('$email_id',$phone_no,'$birth_date')";
           $pending="INSERT INTO `Pending_Reg`(email_id,phone_no,birth_date,user_type) VALUES ('$email_id',$phone_no,'$birth_date',$user_type)";
           break;
       case "4":
           $check="SELECT * FROM Other_Master WHERE phone_no=$phone_no";
           $check_data="SELECT * FROM Other_Reg WHERE phone_no=$phone_no";
           $insert="INSERT INTO `Other_Reg`(email_id,phone_no,birth_date) VALUES ('$email_id',$phone_no,'$birth_date')";
           $pending="INSERT INTO `Pending_Reg`(email_id,phone_no,birth_date,user_type) VALUES ('$email_id',$phone_no,'$birth_date',$user_type)";
           break; 
  }/*
  echo "<br>";echo "prn is: ".$prn;
  echo "<br>";echo "email is: ".$email_id;
  echo "<br>";echo "phone no is:  ".$phone_no;
  echo "<br>";echo "birth_date is:  ".$birth_date;echo "<br>";echo "user_type is:  ".$user_type;echo "<br>";
*/
  // no empty field check
  if (!empty($_POST['email_id']) && !empty($_POST['phone_no']) && !empty($_POST['birth_date'])){
    // if all field has value check detail with "master_detail" table 
            $num_row_data = mysql_num_rows(mysql_query($check_data));
              if($check_run=mysql_query($check)){
                //if detail is match then count number of rows query return
                $num_row = mysql_num_rows(mysql_query($check));
                // echo "tot no of row returned is ".$num_row;
                //if one and only one row is returned then and then enter form detail in our temporary table "uni_current_detail"
                if($num_row==1){
                    while($query_row = mysql_fetch_assoc($check_run)){
                    /*  $mail=$query_row['email_id'];
                      echo "<br>";echo "mail from curent ".$mail;echo "<br>";
                    */    if($num_row_data == 0){
                          $query = $insert;
                          if($query_run = mysql_query($query)){
                            print '<script type="text/javascript">'; 
                            print 'alert("Detail is Saved Succseesfully.")'; 
                            print '</script>';
                            // echo "enter detail in current";
                          }
                          else{die(mysql_error());}
                        }
                        else{
                          print '<script type="text/javascript">'; 
                          print 'alert("Detail is already Verified.")'; 
                          print '</script>';
                          // echo "detail is already Verified";
                        }  
                    }
                }
                /*if detail doesn't match with master table or [multiple row return-this will never happen in ideal case] then enter that 
                form data into "uni_pending_detail" table */
                else{
                // echo "information not match";
                // $check_data="SELECT * FROM uni_pending_detail WHERE prn=$prn";
                $num_row_data = mysql_num_rows(mysql_query($check_data));
                    if($num_row_data == 0){
                      $query = $pending;
                        if($query_run = mysql_query($query)){
                          print '<script type="text/javascript">'; 
                          print 'alert("We are unable to Verify the Details Entered. \nSo Registration is in Pending State. \nWe will let you know once it gets verified.")'; 
                          print '</script>';
                          // echo "detail is pending";
                        }
                        else{die(mysql_error());}
                    }
                    else{
                          print '<script type="text/javascript">'; 
                          print 'alert("Detail is Already in Pending state.")'; 
                          print '</script>';
                          // echo "detail is already in pending state";
                    }
                }
        }//end of if all field has value check detail with "uni_master_detail" table if
        else{echo mysql_error();}
  }// end of no empty field check if
}
?>

<html>
<head>


<!--<img src="http://msubaroda.ac.in/images/no_banner.png" width="1000px" height="350px" border="0px"> -->

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
    $('#prn').val(1234567890123456);$('#emp_id').val(12);
    $('#prn').hide();   $('#emp_id').hide();  $('#prn_t').hide();   $('#emp_id_t').hide();   $('#link').hide();
    $('#user_type').change(function(){
        var value = $('#user_type').val();
        console.log(value);
        if(value ==  1){
          $("#user_type").attr("disabled",true);
            // $("#user_type").attr("hidden",true);$("#user_type_t").attr("hidden",true);
            $('#link').show();
            $('#prn').show(); $('#emp_id').hide(); $('#prn_t').show(); $('#emp_id_t').hide();$('#prn').val(1234567890123456);
        }
        else if(value == 2){
             $("#user_type").attr("disabled",true);
             $('#link').show();
            // $("#user_type").attr("hidden",true);$("#user_type_t").attr("hidden",true);
            $('#prn').hide(); $('#prn_t').hide(); $('#emp_id').show(); $('#emp_id_t').show();$('#emp_id').val(12);       
        }

         else if(value == 3){

             $("#user_type").attr("disabled",true);
             $('#link').show();
        }
         else if(value == 4){
             $("#user_type").attr("disabled",true);
             $('#link').show();
          }
        else{
           $("#user_type").attr("disabled",true);
           $('#link').hide();
           $('#prn').hide(); $('#emp_id').hide(); $('#prn_t').hide(); $('#emp_id_t').hide();
        }
    });
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
   
    $('#phone_no').keydown(function(e) {
        if (e.shiftKey || e.ctrlKey || e.altKey) {
          e.preventDefault();
        } else {
        var key = e.keyCode;
        if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) {
          e.preventDefault();
        }
        }
    });
    $('#prn').keydown(function(e) {
        if (e.shiftKey || e.ctrlKey || e.altKey) {
          e.preventDefault();
        } else {
        var key = e.keyCode;
        if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) {
          e.preventDefault();
        }
        }
    });
    $('#emp_id').keydown(function(e) {
        if (e.shiftKey || e.ctrlKey || e.altKey) {
          e.preventDefault();
        } else {
        var key = e.keyCode;
        if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) {
          e.preventDefault();
        }
        }
    });
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
                minlength: 10,
                number: true
            },
            birth_date: {
                required: true,
             },
            user_type: {
              required: true,
            },
            emp_id:{
              required:true 
            }
        },
        
        // Specify the validation error messages
        messages: {
            prn: {
                required: "Please provide a PRN.",
                minlength: "PRN must be at least 16 characters long.",
               
            }, 
            email_id: "Please provide a valid Email address.",
            phone_no: {
                required: "Please provide a Mobile Number.",
                minlength: "Your Mobile Number must be at least 10 digit long.",
                number: "Please Enter a valid Number."
            },           
            birth_date: {
                required: "Please provide Birthdate.",
            },
            user_type:{
              required: "Please provide User Type."
            },
            emp_id:{
              required: "Please provide Employee Id."
            }
        },
        
        submitHandler: function(form) {
             
             if(confirm('Please Check All the Information entered. Modification is not allowed once saved. \n Press Ok to submit Form \n Press Cancel to Verify Or Check Details again.')){
             $("#user_type").removeAttr("disabled");
             form.submit();
             }
            
        }
    });
  });
  
  </script>
</head>
<body>
  
  <!--  The form that will be parsed by jQuery before submit  -->
<form action="index.php" method="POST" id="form1">

    <div style="margin-left:100px; padding-top:5px;"><h2><u>Wi-Fi Registration Form</u></h2></div><br />
    <div class="label" id="user_type_t">User Type:</div>
    <select name="user_type" id="user_type" class="inputForm">
    <option value="">Choose...</option>
    <option value="1">Student</option>
    <option value="2">Permenent Employee</option>
    <option value="3">Temporary Employee</option>
    <option value="4">Others</option>
    </select></br>
    <div class="label" id="prn_t">PRN :</div><input type="text" id="prn" name="prn" class="inputForm" placeholder="e.g. 2012033800088965" maxlength="16"/>
    <div class="label" id="emp_id_t">Employee Id :</div><input type="text" id="emp_id" name="emp_id" class="inputForm" placeholder="e.g. 12" /></br>
   
    <div class="label">Email :</div><input type="text" id="email_id" name="email_id" class="inputForm" placeholder="e.g. riddhisoni@gmail.com"/><br />
    <div class="label">Mobile Number :</div><input type="text" id="phone_no" name="phone_no" class="inputForm" placeholder="e.g. 9408344653" maxlength="10"/><br />
    <div class="label">Birthdate :</div><input type="date" id="birth_date"  name="birth_date" class="inputForm" placeholder="05-Aug-1990"><br />
   
    
     <div class="label"><input type="checkbox" id="checkbox"></div> Accept all Terms & Conditions<br /><br /><br />
    <div style="margin-left:160px;"><input type="submit" name="submit" value="Submit" class="inputForm" id="submit" disabled/></div></br></br>
     <div id="link" style="margin-left:160px;">Change UserType&nbsp;&nbsp;&nbsp;<a href="index.php">Click Here</a></div>

</form>
  
</body>
</html>
