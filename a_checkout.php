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

    unset($_SESSION['tmp']);

    $data_transaksi = $_POST;
    $jenis = $_GET["jenis"];
    

    if( isset($_POST["selesai"]) ){
        $idb = $_POST['idb'];
        $idp = $_POST['idp'];
        $penumpang = $_POST['penumpang'];
        $totalbayar = $_POST['totalbayar'];
        $query = "INSERT INTO history_transaksi(id_user, id_tiket_1, id_tiket_2, penumpang, total_bayar, jenis) VALUES(
                '$id', '$idb', '$idp', '$penumpang', '$totalbayar', '$jenis'
            )";
        
        query($query);
        // var_dump(mysqli_error($conn));
        echo "<script>
            alert('Selesai');
            window.location.href = 'index.php';
        </script>";
        
    }