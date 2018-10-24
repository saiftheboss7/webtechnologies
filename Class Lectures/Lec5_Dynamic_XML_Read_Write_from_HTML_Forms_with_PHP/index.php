<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bare - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
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
        <div class="col-lg-12>
          <h1 class="mt-5">XML Read Write</h1>
          <p class="lead">XML Read & Write</p>
            
            <hr>
            <form name="xmlwrite" method="post" action="write.php">
                <table>
                    <tr>
                        <td>MENU</td>
                        <td>:</td>
                        <td><input type="text" name="menu" placeholder="menu"/></td>
                    </tr>
                    <tr>
                        <td>ITEM</td>
                        <td>:</td>
                        <td><input type="text" name="item" placeholder="item"/></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>:</td>
                        <td><input type="text" name="price" placeholder="price of item"/></td>
                    </tr>
                    <tr>
                        <td><input type="submit"/></td>
                        <td><input type="reset" /> </td>
                        
                    </tr>
                </table>
            </form>
            <a href='read.php'>Read XML</a>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
