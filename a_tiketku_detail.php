<?php 
    include 'admin/core/auth_verify.php';
    // check if users not already logged
    checkifnotlog();
    
    function rupiah($rp){
        $hasil_rupiah = "Rp " . number_format($rp,0,',','.');
        return $hasil_rupiah;
    }

    $id = $_SESSION["id"];
    $data = fetchAssoc(query("SELECT * FROM users WHERE id='$id'"), SINGLE);
    unset($data['password']);
    
    if(!isset($_GET["id"])){
        header('Location: tiketku.php');
    }

    $id_trans = $_GET["id"];
    $data_history = fetchAssoc(query("SELECT * FROM history_transaksi WHERE id='$id_trans'"), SINGLE);

    $jenis = $data_history['jenis'];
    $id_tiket_1 = $data_history['id_tiket_1'];
    $id_tiket_2 = $data_history['id_tiket_2'];

    // filtering
    if ( $jenis == 'Tiket Pesawat' ){
        $data_tiket1 = fetchAssoc(query("SELECT * FROM tiket_pesawat WHERE id='$id_tiket_1'"), SINGLE);
        $data_tiket2 = fetchAssoc(query("SELECT * FROM tiket_pesawat WHERE id='$id_tiket_2'"), SINGLE);
    } else if ( $jenis == 'Tiket Kereta Api'  ){
        $data_tiket1 = fetchAssoc(query("SELECT * FROM tiket_kereta WHERE id='$id_tiket_1'"), SINGLE);
        $data_tiket2 = fetchAssoc(query("SELECT * FROM tiket_kereta WHERE id='$id_tiket_2'"), SINGLE);
    }