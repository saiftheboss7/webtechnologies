<?php
session_start();
$user = $pass = $error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $user = $_POST["user"];
    $pass = $_POST["pass"];
	
	$myFile = "../xml/users.xml";
	$dom = simplexml_load_file($myFile);
	
	foreach($dom->data as $d)
	{
		if($user == $d->userName && $pass == $d->password)
		{
			$_SESSION['activeUser'] = $user;
			
			header('location:../index.php');
			break;
		}
		
	}
	$error = '<span style= "color:red;font-weight:bold" >Username & Password combination is not corrent. Please try again.</span>';
}
?>
<html>
	<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Login</title>

	<!---This is Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<!---This is Bootstrap -->

	</head>

	
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="loginForm.php">Login Page</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="../index.php">Home
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

          
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
					  <div class="form-group">
						<label for="exampleInputEmail1">Username</label>
						<input type="text" class="form-control" placeholder="Enter username" name="user">
					  </div>
					  <div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" placeholder="Enter Password" name="pass">
					  </div>
					  
					  <div class="checkbox">
						<label>
						  <input type="checkbox"> Remember Me
						</label>
					  </div>
					  <button type="submit" class="btn btn-success">Login</button>
					  
					  <?php 
					  echo $error; //errorPrint
					  ?>
					  
			</form>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>