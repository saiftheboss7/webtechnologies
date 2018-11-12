<?php

	session_start();
	//variable declration to string
	$error = $done = $email = "";
	$nameErr = $emailErr = "";
	$flag=0;

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		//taking inputs from Form 
		$fn = $_POST["fullname"];
		if (!preg_match("/^[a-zA-Z ]*$/",$fn)) {
				$nameErr = "Only letters and white space allowed";
		}
		
		$user = $_POST["User"];
		$contactNum = $_POST["Cnum"];
		$pass = $_POST["pw"];
		$confirmPass=$_POST["confirmPass"];

		if (empty($_POST["email"])) {
			$emailErr = "Email is required";
		} else {
			$email = $_POST["email"];
			
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format";
				$flag=1;
			}
		}

        if ($pass != $confirmPass){
            $flag=1;
        }
		
		if (isset($_POST['gender'])) 
		{
			$sex = $_POST['gender'];	
		}
				
		if (isset($_POST['type'])) 
		{
			$userType = $_POST['type'];
		}

		if($fn == "" || $user == "" || $contactNum == "" || $pass == "" || $email=="" || $flag==1 || $sex == "" || $userType == "" )
		{
			$error = '<div class=\'alert alert-danger\'>There are errors in your form. Please fill up the form correctly.</div>';
		}

		else
		{
			$my_file = '../xml/users.xml';
			$xml = simplexml_load_file($my_file);
			
			$data = $xml->addChild('data');
			$data->addChild('fullName', $fn);
			$data->addChild('userName', $user);
			$data->addChild('contactName', $contactNum);
			$data->addChild('email', $email);
			$data->addChild('password', $pass);
			$data->addChild('type', $userType);
			$data->addChild('gender', $sex);
			
			$dom = new DOMDocument('1.0');
			$dom->preserveWhiteSpace = false;
			$dom->formatOutput = true;
			$dom->loadXML($xml->asXML());
			$dom->save($my_file);
			
			$done = '<div class=\'alert alert-success\'>Registration done successfully.</div>';
			$flag= 0;

		}	
	}
?>

<!DOCTYPE html>
<html>

	<head>
	
		<title>Registration</title>
	
			<!---This is Bootstrap -->
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
			<!---This is Bootstrap -->
	</head>

	<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="#">Registration</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="loginForm.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="registration.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" >
				<table>
					<tr>
						<td>Full Name</td>
						<td> <input type="text" name="fullname"> </td>
						<td> <?php echo $nameErr; ?> </td>
					</tr>
					

					<tr>
						<td> User Name </td>
						<td> <input type ="text" name="User">  </td>
					</tr>

					<tr>
						<td> E-mail </td>
						<td> <input type ="text" name="email"> </td>
						<td> <?php echo $emailErr; ?> </td>
					</tr>
					
					<tr>
						<td>Contact Number</td>
						<td> <input type ="text" name="Cnum"> </td>
					</tr>

					<tr>
						<td> Password </td>
						<td> <input type ="password" name="pw"> </td>
					</tr>
                    <tr>
                        <td> Confirm Password </td>
                        <td> <input type ="password" name="confirmPass"> </td>
                    </tr>
					
						<tr>
							<td>Male <input type="radio" name="gender" value="male" >Female<input type="radio" name="gender" value="female"> </td>

						</tr>	
							
						<tr>
							<td>User Role</td><br>
						</tr>
						
						<tr>
					
							<td><input type="radio" name="type" value="Seller" >Seller</td>
							
						</tr>
						
						<tr>
				
							<td><input type="radio" name="type" value="Buyer" >Buyer</td>
						</tr>

					<tr><td>


					<tr><td><button type="submit" class="btn btn-success" name="ok">Register</button></td></tr>
					
                    <?php echo $error; ?>


					<?php 
					if (isset($_POST['ok'])){
						echo $done;
						}
					?>

				</table>
			</form>
			

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
   </body>
</html>