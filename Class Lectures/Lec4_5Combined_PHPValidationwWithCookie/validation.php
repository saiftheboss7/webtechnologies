<html>
  <head>
    <style>
    .error {color: #FF0000;}
    </style>
  </head>
    <body>
    <?php 
    session_start();
    //variable declaration to use it letter
    $usernameErr = $fullnameErr = $emailErr = $passwordErr =  $genderErr = $confirmpasswordErr = $phoneError = "";
    $username = $fullname = $email = $phone = $password = $confirmpassword = $gender = $education = "";

    //Name Validation
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["fullname"])) {
        $fullnameErr = "Name is required";
      }    
      else {
        $fullname = test_input($_POST["fullname"]); 
        if (!preg_match("/^[a-zA-Z ]*$/",$fullname)) {
          $fullnameErr = "Only letters and white space allowed";
        }
      }
      
      //Email Validation
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $email = test_input($_POST["email"]);
        
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
      }
      //Password Match Validation
      if ($_POST['password']!= $_POST['confirmpassword']){
        $passwordErr = "Oops! Password did not match! Try again.";
      }
      else {
        $password= test_input($_POST["password"]);
      }
      
      //Gender Validation
      if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
      } else {
        $gender = test_input($_POST["gender"]);
      }
      
      if (empty($_POST["phone"])) {
        $phoneError = "Gender is required";
      } else {
        $phone = test_input($_POST["phone"]);
      }
      
      if (empty($_POST["username"])) {
        $usernameErr = "username is required";
      } else {
        $username = test_input($_POST["username"]);
      }
      
      
    }


    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    ?>



    <h2>Sign up form</h2>
    <p><span class="error">*field required</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

    <form name ="" method = "post" action ="">

    Username:<input type="text" name = "username" value="<?php echo $username;?>">
      <span class="error">* <?php echo $usernameErr;?></span>
      <br/>

    Fullname:<input type="text" name = "fullname" value="<?php echo $fullname;?>">
      <span class="error">* <?php echo $fullnameErr;?></span>
      <br/>
    Email:<input type="text" name = "email" value="<?php echo $email;?>">
      <span class="error">* <?php echo $emailErr;?></span>
      <br/>
    Phone:<input type="text" name = "phone" value="<?php echo $phone;?>"/>
      <br/>
    Password:<input type = "password" name ="password" value="<?php echo $password;?>"/>
      <br/>
    Confirm Password:<input type="password" name = "confirmpassword" value="<?php echo $confirmpassword;?>"/>
    <span class="error">* <?php echo $passwordErr;?></span><br/>
    Gender:
      <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="Female">Female
      <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="Male">Male
      <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
      <span class="error">* <?php echo $genderErr;?></span>
      <br/>
    <!--Education: <input type = "checkbox" name ="education[]" value = "SSC"/>SSC
    <input type = "checkbox" name ="education[]" value = "HSC"/>HSC
    <input type = "checkbox" name ="education[]" value = "BSC"/>BSC
    <input type = "checkbox" name ="education[]" value = "MSC"/>MSC
    <br/> -->
    
    <input type="submit" name="submit" value="Submit">  
    </form>

    
    <?php
    //Output Generator after Submission
    if (isset($_POST['submit'])){
      echo "<h2>Your Input:</h2>";
      echo $username;
      echo "<br/>";
      echo $fullname;
      echo "<br/>";
      echo $email;
      echo "<br/>";
      echo "Phone no is ".$phone;
      echo "<br/>";
      echo "Password is ".$password;
      echo "<br/>";
      echo $gender;
      echo "<br/>";
      setcookie($username, $password, time() + (3600), "/");
      echo "Reg Successful";	
    }
    ?>
    </body>
</html>