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
                required: "Please provide a Phone no",
                minlength: "Your phone no must be at least 10 characters long",
                number: "Please Enter valid number"
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

    <div style="margin-left:100px; padding-top:20px;"><h2><u>Wi-Fi Registration Form</u></h2></div><br />
	  <div class="label">PRN :</div><input type="text" id="prn" name="prn" class="inputForm" placeholder="e.g. 2012033800088965" maxlength="16"/><br />
    <div class="label">Email :</div><input type="text" id="email_id" name="email_id" class="inputForm" placeholder="e.g. riddhisoni@gmail.com"/><br />
    <div class="label">Phone Number :</div><input type="text" id="phone_no" name="phone_no" class="inputForm" placeholder="e.g. 9408344653" maxlength="10"/><br />
    <div class="label">Birthdate :</div><input type="date" id="birth_date"  name="birth_date" class="inputForm" placeholder="05-Aug-1990"><br />
    <div class="label"><input type="checkbox" id="checkbox"></div> Accept all Terms & Conditions<br /><br /><br />
    <div style="margin-left:160px;"><input type="submit" name="submit" value="Submit" class="inputForm" id="submit" disabled/></div>

</form>
  
</body>
</html>