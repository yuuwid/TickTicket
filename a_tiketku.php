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
    
    $data_transaksi = fetchAssoc(query("SELECT * FROM history_transaksi WHERE id_user='$id' ORDER BY tanggal_transaksi DESC"));

    $result = query("SELECT * FROM akomodasi_history_transaksi WHERE id_user='$id' ORDER BY id DESC");

    while( $row = mysqli_fetch_assoc($result)){
        array_push($data_transaksi, $row);
    }
    
    usort($data_transaksi, function($a, $b){
        return strtotime($a['tanggal_transaksi']) + strtotime($b['tanggal_transaksi']);
    });
    
    $dd = $data_transaksi;
    