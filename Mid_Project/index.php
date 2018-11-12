<?php 
    session_start();

    if(empty($_SESSION['activeUser']))
    {   //if not logged in then send to registration.php
        header("location:pages/registration.php");
    }
    else
    {
		
        $user = $_SESSION['activeUser'];
        $file = "xml/product.xml";
		$fileU = "xml/users.xml";
    }
	 
                $dom = simplexml_load_file($fileU);

                foreach($dom->data as $d)
                {
                       if($user == $d->userName )
							{
								$type=$d->type;
			
				break;
				}
                }
?> 
			
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Userview - Shopping Portal</title>

	<!---This is Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<!---This is Bootstrap -->

	</head>

	
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Home</a>
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
          <!--<li class="nav-item">
              <a class="nav-link" href="registration.php">Register</a>
          </li>-->
            <li class="nav-item">
              <a class="nav-link" href="pages/logout.php">Logout</a>
            </li>
              <?php
              if($type == "Seller") {
              echo "<li class='nav-item'>";
              echo "<a class='nav-link' href='pages/seller.php'>Products</a></li>";
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
			<!-- Content Starts -->
			<br/>
			<?php 
			//Logging Validation
				if($type == "Seller") 
				{
					echo "<h1>Welcome! You have successfully logged in as a seller</h1>";
					echo "<h2>You can do the following now</h2>";
					echo "<ul>
					<li><a href = 'index.php'> Home </a></li>
					<li><a href = 'pages/logout.php'> Logout </a></li>
					<li><a href = 'pages/seller.php'> Products </a> | <a href = 'pages/addProduct.php'>Add Products </a></li>
					</ul>";
			
				}else{
                    echo "<h2>Welcome! You have successfully logged in as a buyer!</h2>";
				}
			?>


				<h1 style="text-align:center;">Here All Products</h1>
					<?php 
							$dom = simplexml_load_file($file);

							foreach($dom->product as $p)
                            {
									echo "<table><tr><img style='width: 150px;height:150px' src='".$p->img."'><br/>";
									echo $p->name."<br>";
									echo $p->price;
									echo "</br>";
									echo "<button type=\"button\" onclick='myFunction()' class=\"btn btn-secondary\">Add to Cart</button><br/>";
								echo "</div>";
							}
						?>
            <script>
                function myFunction() {
                    alert("Added to Cart");
                }
            </script>

        </div>
      </div>
    </div>
  </body>
</html>