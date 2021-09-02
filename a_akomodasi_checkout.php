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


    
    $data_transaksi = $_POST;
    $jenis = $_GET["jenis"];


    if( !isset($_POST["pesan"]) ){
        header('Location: hotel.php');
    }

    if (isset( $_POST["selesai"] )){
        $data_transaksi = $_POST;
        $temp = $_SESSION["tmp"];

        $id_hotel = $_POST["id_hotel"];
        $id_kamar = $_POST["id_kamar"];

        $kamar = $temp['kamar'];
        $tamu = $temp['tamu'];
        $checkin = $temp['checkin'];
        $checkout = $temp['checkout'];

        $diskon = fetchAssoc(query("SELECT kamar FROM akomodasi_penginapan WHERE id='$id_hotel'", SINGLE))[0]['kamar'];

        $diskon = json_decode($diskon, true);
        foreach( $diskon as $d ){
            if( $d['id_kamar'] == $id_kamar ){
                $diskon = $d['diskon'];
                $harga = $d['harga'];
                break;
            }
        }


        $in = round(abs(strtotime($checkout) - strtotime($checkin)) / (60*60*24),0);
        $totalbayar = ($harga - ($harga * $diskon / 100)) * $in;

        $query = "INSERT INTO akomodasi_history_transaksi(id_user, jenis, id_penginapan, id_kamar, kamar, tamu, checkin, checkout, total_bayar) VALUES(
            '$id', 'Hotel', '$id_hotel', '$id_kamar', '$kamar', '$tamu', '$checkin', '$checkout', '$totalbayar'
        )";

        query($query);
        
        // var_dump(mysqli_error($conn));
        echo "<script>
            alert('Selesai');
            window.location.href = 'index.php';
        </script>";


    }