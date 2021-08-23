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
    
    if(!isset($_GET["id"]) || !isset($_GET["jenis"])){
        header('Location: tiketku.php');
    }

    $jenis = $_GET["jenis"];

    if($jenis == 'tiket pesawat' || $jenis == 'tiket kereta api') {
        $id_trans = $_GET["id"];
        $data_history = fetchAssoc(query("SELECT * FROM history_transaksi WHERE id='$id_trans'"), SINGLE);
        // check data_penumpang in data_history
        if ( $data_history['data_penumpang'] == null ){
            header('Location: tiketku_databeequipped.php?id=' . $data_history['id'] . '&jenis=' . $jenis);
        }

        $data_penumpang = json_decode($data_history['data_penumpang'], true);

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
        
        

    } else if ( $jenis == 'hotel' ) {
        $id_trans = $_GET["id"];
        $data_history = fetchAssoc(query("SELECT * FROM akomodasi_history_transaksi WHERE id='$id_trans'"), SINGLE);

        if ( $data_history['data'] == null ){
            header('Location: tiketku_databeequipped.php?id=' . $data_history['id'] . '&jenis=' . $jenis);
        }

    }


?>