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


    if( isset($_POST["cari"]) ){
        $kota = $_POST["kota"];
        $checkin = $_POST["checkin"];
        $checkout = $_POST["checkout"];
        $kamar = $_POST["kamar"];
        $tamu = $_POST["tamu"];

        // check checkin and checkout

        $date1 = explode('-', $checkin);
        $date2 = explode('-', $checkout);
        $in = end($date2) - end($date1);
        if( $in < 0 ){
            echo "<script>
                alert('Booking hotel Minimal 1 hari!');
                window.location.href = 'akomodasi.php?jenis=hotel';
            </script>";
        }
                
        $query = "SELECT * FROM akomodasi_penginapan WHERE 
                jenis='Hotel' AND
                kota='$kota' AND
                status='1'";
        
        $data_penginapan = fetchAssoc(query($query));
        $_SESSION["tmp"] = $_POST;
    }

    if( isset($_POST["pilihkamar"]) ){
        if( !isset($_SESSION["tmp"]) ){
            header('Location: akomodasi.php?jenis=hotel');
        }

        $idhtl = $_POST["idhtl"];
        $pilihkamar = $_POST["pilihkamar"];


        $_POST = $_SESSION["tmp"];
        $_POST["idhtl"] = $idhtl;
        $_POST["pilihkamar"] = $pilihkamar;

        $kota = $_POST["kota"];
        $checkin = $_POST["checkin"];
        $checkout = $_POST["checkout"];
        $jmlkamar = $_POST["kamar"];
        $jmltamu = $_POST["tamu"];

        $query = "SELECT * FROM akomodasi_penginapan WHERE 
                id='$idhtl'";
        
        $data_penginapan2 = fetchAssoc(query($query), SINGLE);
        $data_kamar = fetchAssoc(query($query), SINGLE)['kamar'];

    }
    