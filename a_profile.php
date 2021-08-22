<?php 
    include 'admin/core/auth_verify.php';
    // check if users not already logged
    checkifnotlog();

    $id = $_SESSION["id"];
    $data = fetchAssoc(query("SELECT * FROM users WHERE id='$id'"), SINGLE);
    unset($data['password']);


    // upload foto
    if( isset($_POST["simpan"]) ){
        $status_upload = uploadFoto($_FILES);
        unset($_POST);
        unset($_FILES);
        if( $status_upload[0] == true ){
            
            header('Location: profile.php');
        } else {
            $error = $status_upload[1];
        }
    }

    // edit profile
    if( isset($_POST["simpanprofil"]) ){
        $status_edit = editProfile($_POST);

        unset($_POST);
        
        if( $status_edit > 0 ){
            header('Location: profile.php');
        }
    }
