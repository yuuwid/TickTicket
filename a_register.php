<?php 
    include 'admin/core/auth_verify.php';
    // check if users has already logged
    checkiflog();

    if ( isset($_POST["reg"]) ) {
        $status = registerAuth($_POST);
        if ( $status[0] == true ){
            if ( $status[1] > 0 ){
                $sukses = true;
                $_POST = [];
            }
        } else {
            $error = $status[1];
        }
    }