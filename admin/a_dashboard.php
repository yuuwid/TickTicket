<?php 

    include 'core/auth_verify.php';
    // check if users not already logged
    checkifnotlog();

    $id = $_SESSION["id"];
    $data = fetchAssoc(query("SELECT * FROM users WHERE id='$id'"), SINGLE);
    $pin = $data["pin"];
    unset($data['password']);

    $users = fetchAssoc(query("SELECT id, username, nama, status FROM users WHERE role=" . USER_ROLE));
    $admins = fetchAssoc(query("SELECT id, username, nama, status FROM users WHERE role=" . ADMIN_ROLE));

    $histori = fetchAssoc(query("SELECT id, tanggal_transaksi, jenis FROM history_transaksi ORDER BY id DESC"));

    $result = query("SELECT id, tanggal_transaksi, jenis FROM akomodasi_history_transaksi WHERE id_user='$id' ORDER BY id DESC");

    while( $row = mysqli_fetch_assoc($result)){
        array_push($histori, $row);
    }

    usort($histori, function($a, $b){
        return strtotime($b['tanggal_transaksi']) <=> strtotime($a['tanggal_transaksi']);
    });
    

    //
    if ( isset($_POST["hapus"]) ){

        if ( $_POST["pin"] != $pin ){
            $error = [true, PIN_ERROR];
        } else {
            hapusAkun($_POST['id']);
            if ( hapusAkun($_POST['id']) > 0 ){
                $error = [false, 0];
                header('Location: index.php');
            } else {
                $error = [true, DB_ERROR];
            }
        }
        unset($_POST);
    }
