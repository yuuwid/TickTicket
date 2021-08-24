<?php 

    $jurusan = '06';
    $tahun = ['2019', '2020', '2021'];
    $kode = '1';

    for ($i=0; $i < 11; $i++) { 
        $npm = rand(10000, 99999);
        $thn = $tahun[array_rand($tahun)];

        echo $jurusan . '.' . $thn . '.' . $kode . '.' . $npm;
        echo "<br>";
    }



?>