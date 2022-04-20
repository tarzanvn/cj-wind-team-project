<?php
    if($_POST['username'] == "admin" and $_POST['password'] == "admin"){
        setcookie("username", md5($_POST['password']));
        header("Location: index.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="login.php" method="post">
        <!-- <div class="imgcontainer">
            <img src="img_avatar2.png" alt="Avatar" class="avatar">
        </div> -->
        <span style="color:red"><?php echo $error; ?></span>
        <span style="color:green"><?php echo $success; ?></span>

        <div class="container">
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
    
            <button type="submit">Login</button>
            <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>
</form>
</body>
</html>
