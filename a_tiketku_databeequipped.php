<?php 
    include 'admin/core/auth_verify.php';
    // check if users not already logged
    checkifnotlog();
    
    function rupiah($rp){
        $hasil_rupiah = "Rp " . number_format($rp,0,',','.');
        return $hasil_rupiah;
    }

    function getSeat($data_penumpang){
        $data_penumpang = json_decode($data_penumpang, true);
        if($data_penumpang == null){
            return 1;
        }
        return $data_penumpang[0]['seat']+=1;
    }
    define('ALPH', 892);
    define('NUM', 849);
    function getGrup($tipe, $len=4){
        $grup = [];
        $char = 'A';
        if ($tipe == ALPH){
            for ($i=1; $i <= $len; $i++) { 
                $grup[] = chr(ord($char)+1);
            }
        } else if($tipe == NUM){
            for ($i=1; $i <= $len; $i++) { 
                $grup[] = $i;
            }
        }
        return $grup[array_rand($grup)];
    }

    $id = $_SESSION["id"];
    $data = fetchAssoc(query("SELECT * FROM users WHERE id='$id'"), SINGLE);
    unset($data['password']);
    
    $id_trans = $_GET["id"];
    $data_history = fetchAssoc(query("SELECT * FROM history_transaksi WHERE id='$id_trans'"), SINGLE);
    $id_trans = $data_history['id'];


    // check data_penumpang in data_history
    if ( $data_history['data_penumpang'] != null){
        header('Location: tiketku_cetak.php?id='.$id_trans);
    }


    if( isset($_POST["simpan"]) ){
        $post = $_POST;

        $n = $data_history['penumpang'];

        $arr = [];

        $getseat = getSeat($data_history['data_penumpang']);
        if( $data_history['jenis'] == 'Tiket Pesawat' ){
            $getgrup = getGrup(ALPH, 4);
        } else if( $data_history['jenis'] == 'Tiket Kereta Api' ){
            $getgrup = getGrup(NUM, 9);
        }

        for ($i=1; $i <= $n ; $i++) {
            $nama_lengkap = $post["nama_lengkap".$i];
            $nik = $post["nik".$i];
            $seat = $getseat++;
            $grup = $getgrup;

            $arr[] = [
                'nama_lengkap' => $nama_lengkap,
                'nik' => $nik,
                'seat' => $seat,
                'grup' => $grup
            ]; 
        }
        $json = json_encode($arr);
        
        $query = "UPDATE history_transaksi SET data_penumpang='$json' WHERE id='$id_trans'";
        query($query);

        echo "
            <script>
                alert('Berhasil disimpan');
                window.location.href = 'tiketku_cetak.php?id=". $id_trans ."';
            </script>            
        ";

    }