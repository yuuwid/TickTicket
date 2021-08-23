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

    $id_trans = $_GET["id"];
    if ( $jenis == 'tiket pesawat' || $jenis == 'tiket kereta api' ){
        $data_history = fetchAssoc(query("SELECT * FROM history_transaksi WHERE id='$id_trans'"), SINGLE);

        $id_tiket_1 = $data_history['id_tiket_1'];
        $id_tiket_2 = $data_history['id_tiket_2'];
    
        // filtering tiket 
        if ( $jenis == 'tiket pesawat' ){
            $data_tiket1 = fetchAssoc(query("SELECT * FROM tiket_pesawat WHERE id='$id_tiket_1'"), SINGLE);
            $data_tiket2 = fetchAssoc(query("SELECT * FROM tiket_pesawat WHERE id='$id_tiket_2'"), SINGLE);
        } else if ( $jenis == 'tiket kereta api'  ){
            $data_tiket1 = fetchAssoc(query("SELECT * FROM tiket_kereta WHERE id='$id_tiket_1'"), SINGLE);
            $data_tiket2 = fetchAssoc(query("SELECT * FROM tiket_kereta WHERE id='$id_tiket_2'"), SINGLE);
        }



    
    } else if ( $jenis == 'hotel' ){
        // get data if type is akomodation
        $data_history = fetchAssoc(query("SELECT * FROM akomodasi_history_transaksi WHERE id='$id_trans'"), SINGLE);

        $id_hotel = $data_history['id_penginapan'];
        $id_kamar = $data_history['id_kamar'];
        
        $data_hotel = fetchAssoc(query("SELECT * FROM akomodasi_penginapan WHERE id='$id_hotel'"), SINGLE);

        $kamar = json_decode($data_hotel['kamar'], true);

        foreach( $kamar as $k ){
            if( $k['id_kamar'] == $id_kamar ){
                $kamar = $k;
                break;
            }
        }

        if ( $data_history['data'] != null ){
            $data_his = json_decode($data_history['data'], true)[0]['no_kamar'];
        }

    }