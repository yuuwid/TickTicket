<?php 
    include 'admin/core/auth_verify.php';
    // check if users not already logged
    checkifnotlog();

    $id = $_SESSION["id"];
    $data = fetchAssoc(query("SELECT * FROM users WHERE id='$id'"), SINGLE);
    unset($data['password']);
    