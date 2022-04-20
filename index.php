<?php
error_reporting(0);
session_start();

$COOKIE_SERVER = "21232f297a57a5a743894a0e4a801fc3";

if(!$_COOKIE['username'] == $COOKIE_SERVER)
  header("Location: login.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CJ - Wind Team</title>
</head>
<body>
  <h1>CyberJutsu - Wind Team</h1>
  <p>Hello World!</p>
  
</body>
</html>