<?php
    session_start();
    //Check if logged in
    $file = "../xml/product.xml";
    $xml = simplexml_load_file($file);
    $pid = $xml->productInfo->productSerial + 1;
    $error = "";
    if(empty($_SESSION['activeUser']))
    {
        header("location:registration.php");
    }else
    {
        //check if submit
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $user = $_SESSION['activeUser'];
            $imgPath = "uploads/" . basename($_FILES["ppic"]["name"]);
            $name = $_POST["pname"];
            $price = $_POST["pprice"];
            $quantity = $_POST["pquantity"];
            $type = $_POST["ptype"];


                if( is_uploaded_file($_FILES['ppic']['tmp_name']))
                {
                    uploadImg() ;
            
                    $xml = simplexml_load_file($file);

                    $xml->productInfo->productSerial += 1;
                    $product = $xml->addChild('product');
                    $product->addChild('username', $user);
                    $product->addChild('pid', $pid);
                    $product->addChild('name', $name);
                    $product->addChild('type', $type);
                    $product->addChild('img', $imgPath);
                    $product->addChild('price', $price);
                    $product->addChild('quantity', $quantity);
                    
                    

                    $dom = new DOMDocument('1.0');
                    $dom->preserveWhiteSpace = false;
                    $dom->formatOutput = true;
                    $dom->loadXML($xml->asXML());
                    $dom->save($file);

                    header("location:seller.php");
                }else{
                    $error = "<div class='alert alert-danger'>Sorry, your file was not uploaded.</div>";
                }
                
            
            
        }

        
    }

    function uploadImg()
    {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["ppic"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        
            $check = getimagesize($_FILES["ppic"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["ppic"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["ppic"]["tmp_name"], $target_file)) {
               // echo "The file ". basename( $_FILES["ppic"]["name"]). " has been uploaded.";
                //echo $target_file;
                
                
            } else {
               // echo "Sorry, there was an error uploading your file.";
            }
        }
        return $uploadOk;
    }
    
?>

<!DOCTYPE html>
<html>

	<head>
		<title>Add Products</title>
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
                    <a class="nav-link" href="../index.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
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
                    <h1 class="mt-5">Add New Products</h1>
                    <!-- start from here -- //multipart for image upload -->
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
                
                    <table>
                        <tr>
                            <td>Product ID:</td>
                            <td><input type="text" name="pid" value="<?php echo $pid ?>" readonly/></td>
                        </tr>

                        <tr>
                            <td>Name:</td>
                            <td><input type="text" name="pname" value=""/></td>
                        </tr>

                        <tr>
                            <td>Product Type:</td>
                            <td>
                                <select name="ptype" >
                                    <option value="man">Man</option>
                                    <option value="woman">Woman</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>Price:</td>
                            <td><input type="number" name="pprice" value=""/></td>
                        </tr>

                        <tr>
                            <td>Quantity:</td>
                            <td><input type="number" name="pquantity" value=""/></td>
                        </tr>

                        <tr>
                            <td>Upload Image:</td>
                            <td><input type="file" name="ppic" id="ppic" accept="image/*"/></td>
                        </tr>

                        <tr>
                            <td><button type="submit" class="btn btn-primary">Submit</button></td>
                        </tr>
                        <tr>
                            <td><?php echo $error?></td>
                        </tr>
                    </table>
                    
                </form>

                </div>
            </div>
        </div>
   </body>
</html>