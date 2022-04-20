<?php
if(!isset($_SESSION['username']) and $_SESSION['username'] !== 'admin'){
    header("Location: login.php");
}else{
    $dir = "upload/" + session_id();
    if(!file_exists($dir))
        mkdir($dir);
    if(isset($_GET["debug"])) die(highlight_file(__FILE__));
    if(isset($_FILES["file"])) {
        $error = '';
        $success = '';
        try {
            $file = $dir . "/" . $_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"], $file);
            $success = 'Successfully uploaded file at: <a href="/' . $file . '">/' . $file . ' </a>';
        } catch(Exception $e) {
            $error = $e->getMessage();
        }
    }
}

?>
