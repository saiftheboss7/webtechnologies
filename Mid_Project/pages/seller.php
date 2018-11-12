<?php 
    session_start();
    $user = "";
    if(empty($_SESSION['activeUser']))
    {
        header("location:register.php");
    }
    else
    {
        $user = $_SESSION['activeUser'];
        $file = "../xml/product.xml";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bare - Start Bootstrap Template</title>

    <!---This is Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!---This is Bootstrap -->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a class="navbar-brand" href="../index.php">Home</a>
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
                    <a class="nav-link" href="addProduct.php">Add Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">All Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12r">
            <h1 class="mt-5">Seller Dashboard</h1>
            <!-- start from here -->
            <table border="2px" width=600px>

                <tr>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Type</td>
                    <td>Quantity</td>
                    <td>Image</td>
                </tr>
                <?php
                $dom = simplexml_load_file($file);

                foreach($dom->product as $p)
                {
                    if($p->username == $user)
                    {
                        echo "<tr>";
                        echo "<td>".$p->name."</td>";
                        echo "<td>".$p->price."</td>";
                        echo "<td>".$p->type."</td>";
                        echo "<td>".$p->quantity."</td>";
                        echo "<td><img style='width: 80px;height:80px' src='"."../".$p->img."'></td>";
                        echo "</tr>";
                    }

                }
                ?>
        </div>
    </div>
</div>
</body>
</html>