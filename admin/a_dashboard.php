<?php 

    include 'core/auth_verify.php';
    // check if users not already logged
    checkifnotlog();

    $id = $_SESSION["id"];
    $data = fetchAssoc(query("SELECT * FROM users WHERE id='$id'"), SINGLE);
    unset($data['password']);
    $role = $data['role'];

    if ($role != ADMIN_ROLE){
        header("Location: ../index.php");
    }

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
        $ad = new DateTime($a['tanggal_transaksi']);
        $bd = new DateTime($b['tanggal_transaksi']);
      
        if ($ad == $bd) {
          return 0;
        }
      
        return $ad > $bd ? -1 : 1;
    });
    
    


    //
    if ( isset($_POST["hapus"]) ){

        if ( $_POST["pin"] != $pin ){
            $error = [true, PIN_ERROR];
        } else {
            if (isset($_POST["hapus_id"])){
                if ( hapusAkun($_POST['hapus_id']) > 0 ){
                    $error = [false, 0];
                    header('Location: index.php');
                } else {
                    $error = [true, DB_ERROR];
                }
            } else if (isset($_POST["'bann_id'"])){
                if ( nonaktifAkun($_POST['bann_id']) > 0 ){
                    $error = [false, 0];
                    header('Location: index.php');
                } else {
                    $error = [true, DB_ERROR];
                }
            }
        }
        unset($_POST);
    }
