<?php

$uname = $_POST['uname'];
$fname = $_POST['fname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$education= $_POST['education'];

echo "<h1>Registration Successful!</h1><br/>";
echo "Username: ".$uname."<br/>"; 
echo "Fullname: ".$fname."<br/>";
echo "Email: ".$email."<br/>";
echo "Password: ".$password."<br/>";
echo "Gender: ".$gender."<br/>";
echo "Education </br>";


  
foreach($education as $value)
    {
        echo "<ul><li>";
		echo $value."</li></ul>";
    }

?>