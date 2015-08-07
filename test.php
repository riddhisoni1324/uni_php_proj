<html>
<head>
    <!-- Define some CSS -->
  <style type="text/css">
    .label {width:100px;text-align:right;float:left;padding-right:10px;font-weight:bold;}
    #register-form label.error, .output {color:#FB3A3A;font-weight:bold;}
  </style>
  
  <!-- Load jQuery and the validate plugin -->
<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="jquery-validate.js"></script>
  
  <!-- jQuery Form Validation code -->
  <script>
  
  // When the browser is ready...
  $(function() {
  
    // Setup form validation on the #register-form element
    $("#register-form").validate({
    
        // Specify the validation rules
        rules: {
            name: "required",
            gender: "required",
            address: "required",
            email: {
                required: true,
                email: true
            },
            username: "required",
            password: {
                required: true,
                minlength: 5
            }
        },
        
        // Specify the validation error messages
        messages: {
            name: "Please enter your name",
            gender: "Please specify your gender",
            address: "Please enter your address",
            email: "Please enter a valid email address",
            username: "Please enter a valid username",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
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
  <form action="./" method="post" id="register-form" novalidate="novalidate">
  
    <div class="label">Name</div><input type="text" id="name" name="name" /><br />
    <div class="label">Gender</div><select id="gender" name="gender" />
                                      <option value="Female">Female</option>
                                      <option value="Male">Male</option>
                                      <option value="Other">Other</option>
                                   </select><br />
    <div class="label">Address</div><input type="text" id="address" name="address"  /><br />
    <div class="label">Email</div><input type="text" id="email" name="email" /><br />
    <div class="label">Username</div><input type="text" id="username" name="username"  /><br />
    <div class="label">Password</div><input type="password" id="password" name="password" /><br />
    <div style="margin-left:140px;"><input type="submit" name="submit" value="Submit" /></div>
    
  </form>
  
</body>
</html>