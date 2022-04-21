<?php

if(!isset($_SESSION['username']) and $_SESSION['username'] !== 'admin'){
    header("Location: login.php");
}else{
    $dir1 = "upload/";
    $dir2 = "temp/";
    $pattern = "/.+(\.php)$/gim";
    if(isset($_FILES["file"])) {
        if($_FILES['file']['size'] < 1024){
            if(!preg_match($pattern, $_FILES['file']['name'])){
                $file_name = strtolower($_FILES['file']['name']);
                move_uploaded_file($_FILES['file']['tmp_name'], $dir2.$file_name);
                try {
                    if(getimagesize($file_name)){
                        move_uploaded_file($dir2.$file_name, $dir1.$file_name);
                    }else{
                        unlink($dir2.$file_name);
                        sleep(1);
                    }
                    
                } catch (\Throwable $th) {
                    throw $th;
                }

            }else{
                die("Hack Detected");
            }
            
        }else{
            die("File too big , size file must < 1024 kb");
        }
        
    }
}

?>
