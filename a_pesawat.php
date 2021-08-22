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
        $dari = $_POST["dari"];
        $tujuan = $_POST["tujuan"];
        $berangkat = $_POST["berangkat"];
        $pulang = $_POST["pulang"];
        $penumpang = $_POST["penumpang"];

        $query = "SELECT * FROM tiket_pesawat WHERE 
                dari='$dari' AND
                tujuan='$tujuan' AND
                berangkat='$berangkat'";
        
        $data_tikets = fetchAssoc(query($query));
        $_SESSION["tmp"] = $_POST;
    }

    if( isset($_POST["pilihpulang"]) ){

        if( !isset($_SESSION["tmp"]) ){
            header('Location: tiket.php?jenis=pesawat');
        }

        $idb = $_POST["idb"];
        $pilihpulang = $_POST["pilihpulang"];


        $_POST = $_SESSION["tmp"];
        $_POST["idb"] = $idb;
        $_POST["pilihpulang"] = $pilihpulang;
        unset($_POST["pulangcheck"]);
        // unset($_SESSION["tmp"]);
        $dari = $_POST["dari"];
        $tujuan = $_POST["tujuan"];
        $berangkat = $_POST["berangkat"];
        $pulang = $_POST["pulang"];
        $penumpang = $_POST["penumpang"];

        $query = "SELECT * FROM tiket_pesawat WHERE 
                dari='$tujuan' AND
                tujuan='$dari' AND
                berangkat='$berangkat'";
        
        $data_tikets = fetchAssoc(query($query));
    }

    if( isset($_POST["end"]) ){
        $idb = $_POST["idb"];
        $idp = 0;
        if(isset($_POST["idp"])){
            $idp = $_POST["idp"];
        }
        $_POST = $_SESSION["tmp"];

        // unset($_SESSION["tmp"]);
        $dari = $_POST["dari"];
        $tujuan = $_POST["tujuan"];
        $berangkat = $_POST["berangkat"];
        $pulang = $_POST["pulang"];
        $penumpang = $_POST["penumpang"];


        $id_tiket_berangkat = $idb;
        $id_tiket_pulang = $idp;

        $checkout1 = fetchAssoc(query("SELECT * FROM tiket_pesawat WHERE id='$id_tiket_berangkat'"), SINGLE);
        $checkout2 = fetchAssoc(query("SELECT * FROM tiket_pesawat WHERE id='$id_tiket_pulang'"), SINGLE);

    }
