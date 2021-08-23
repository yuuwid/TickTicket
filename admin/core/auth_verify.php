<?php 

    function checkRole($role){
        if ($role == ADMIN_ROLE) {
            header('Location: dashboard.php'); // <--- sementara
            die;
        } else if ($role == USER_ROLE) {
            header('Location: dashboard.php');
            die;
        } else {
            die('Oops, ada yang janggal nih, harap bersihkan cookie web anda, jika tetap tidak bisa harap hubungi admin yaa ... :D ');
        }
    }
    
    // use in login, register 
    function checkiflog(){
        // check cookie remember me
        if (isset($_COOKIE[hash('md5', 'rememberme')])) {
            $id = $_COOKIE[hash('md5', 'rememberme')];
            $role = fetchAssoc(query("SELECT role FROM users WHERE id='$id'", SINGLE))[0]['role'];

            // check role account
            checkRole($role);

            // create session
            $_SESSION["log"] = true;
            $_SESSION["id"] = $id;
            $_SESSION["role"] = $role;
        }
        // check status login 
        if (isset($_SESSION['log'])) {
            $role = $_SESSION["role"];

            // check role account
            checkRole($role);
        }
    }

    // use in dashboard ( all view after login )
    function checkifnotlog(){
        // check cookie remember me
        if ( !isset($_COOKIE[hash('md5', 'rememberme')])) {

            // check status login 
            if ( !isset($_SESSION['log'])) {
                // redirect to login.php
                header('Location: login.php');
            }
            
        }
    }