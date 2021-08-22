<?php 
    include 'admin/core/auth_verify.php';
    // check if users has already logged
    checkiflog();

    
    if ( isset($_POST["login"]) ) {
        $status = loginAuth($_POST);
        if ( $status[0] != false ){
            $account = $status[0];

            // create session and cookie (if exist)
            $_SESSION["log"] = true;
            $_SESSION["id"] = $account['id'];
            $_SESSION["role"] = $account['role'];
            if( isset($_POST["rememberme"]) ){
                // expired in 7 day
                setcookie(hash('md5', 'rememberme'), $account['id'], time()+(60*60*24*7));
            }
            // check role account
            if ( $account['role'] == ADMIN_ROLE ){
                header('Location: dashboard.php'); // <--- sementara

            } else if ( $account['role'] == USER_ROLE ) {
                header('Location: dashboard.php');

            } else {
                die('Oops, ada yang janggal nih, harap hubungi admin yaa ...');
                
            }

        } else {
            $error = true;
        }

    }
