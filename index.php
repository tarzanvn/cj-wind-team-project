<!DOCTYPE html>
<html lang="en">
<head>
  <title>CJ - Wind Team</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./css/styles.css">
  <script src="./scripts/scripts.js"></script>
</head>

<?php
error_reporting(0);
session_start();
if (!isset($_SESSION["logged"])){  
    header("Location: login.php");
}

$dir = 'avatar/';
$error = '';
$success = '';

if ( !file_exists($dir) )
    mkdir($dir);

if(isset($_GET["debug"])) die(highlight_file(__FILE__));
if(isset($_FILES["file"])) {
    try {
        $file = $dir . $_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"], $file);
        if(is_array(getimagesize($file))){
            $success = 'Successfully uploaded file at: <a href="/' . $file . '">/' . $file . ' </a>';
        }else{
            sleep(3);
            unlink($file);
            $error = "DANGEROUS FILE";
        }
    } catch(Exception $e) {
        $error = $e->getMessage();
    }
}
?>

<body>
  <div class="container mt-5">
  <div class="row d-flex justify-content-center">
    <div class="col-md-7">
      <div class="card p-3 py-4">
        <div class="text-center">
          <!-- <img src="./avatar/cbjs.png" width="100" class="rounded-circle"> -->
          <?php 
              if($file){
                echo "<img src=".$file." width=100 height=100 border-radius=50% class=rounded-circle>";
                $file = "";
              }else{
                echo "<img src=avatar/cbjs.png width=100 height=100 border-radius=50% class=rounded-circle>";
              }
          ?>
        </div>
        <div class="text-center mt-3">
          <input id="avatar" type="file" style="display:none"/>
          <h3 class="mt-2 mb-0">CYBER JUTSU</h3> <span>Make Security Easier Learning</span>
          <div class="px-4 mt-1">
            <p class="fonts">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
              aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. </p>
          </div>
          <ul class="social-list">
            <li><i class="fa fa-facebook"></i></li>
            <li><i class="fa fa-dribbble"></i></li>
            <li><i class="fa fa-instagram"></i></li>
            <li><i class="fa fa-linkedin"></i></li>
            <li><i class="fa fa-google"></i></li>
          </ul>
          <div class="buttons"> 
            <form action="index.php" method="post" enctype="multipart/form-data">
              <input class="btn btn-outline-primary px-4" type="file" name="file" id="file">
              <input class="btn btn-primary px-4 ms-3" type="submit" value="Submit">
            </form>
          </div>
        </div>

        <span style="color:red"><?php echo $error; ?></span>
        <span style="color:green"><?php echo $success; ?></span>
              <!-- Debug  -->
        <!-- http://localhost/index.php?debug -->
      </div>
    </div>
  </div>
</div>
</body>
</html>
