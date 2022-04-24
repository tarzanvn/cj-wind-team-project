<?php
  error_reporting(0);
  session_start();
  if (!isset($_SESSION["logged"])) {
      header("Location: login.php");
  }

  // Create folder for each user
  session_start();
  $dir = 'avatar/';
  $error = '';
  $success = '';
  $default_avatar = "./avatar/cbjs.png";
  if (!file_exists($dir)) {
      mkdir($dir);
  }

  if (isset($_GET["debug"])) {
      die(highlight_file(__FILE__));
  }

  if (isset($_FILES["file"])) {
      try {
          $file = $dir . $_FILES["file"]["name"];
          move_uploaded_file($_FILES["file"]["tmp_name"], $file);
          if (is_array(getimagesize($file))) {
              // $success = 'Successfully uploaded file at: <a href="/' . $file . '">/' . $file . ' </a>';
          } else {
              // sleep(3);
              unlink($file);
              $file = $default_avatar;
              // $error = "DANGEROUS FILE";
          }
      } catch (Exception $e) {
          $error = $e->getMessage();
      }
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" type="image/png" href="images/icons/favicon.ico">
  <title>CJ - Wind Team</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/all.min.css"/> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./css/styles.css">
  <link rel="stylesheet" href="./css/avatar.css">
  <script src="./scripts/scripts.js"></script>
</head>

<body>
  <div class="container mt-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-7">
        <div class="card p-3 py-4">
          <div class="text-center">
            <img src="<?php echo isset($file) ? $file : $default_avatar ?>" width="100" height="100"
              class="rounded-circle" title="Click to choose new Avatar"
              onclick="document.getElementById('avatar').click()">
              <form method="post" enctype="multipart/form-data" class="buttons">
                <input id="avatar" type="file" name="file" style="display:none" onchange="onAvatarSelected()" />
                <div id="new-avt-info" style="color:green">You can click <b>avatar</b> to update it</div>
                <input id="update" type="submit" value="Update" disabled class="btn btn-outline-primary px-4">
              </form>
          </div>
          <div class="text-center mt-3">
            <h3 class="mt-2 mb-0">CyberJutsu</h3> <span><b>We make computer security easier to learn</b></span>
            <div class="px-4 mt-1">
              <p class="fonts">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. </p>
            </div>
            <!-- <span style="color:red">
              <?php echo $error; ?>
            </span>
            <span style="color:green">
              <?php echo $success; ?> -->
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>