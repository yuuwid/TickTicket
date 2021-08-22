<?php 

    require_once 'admin/core/init.php';

    $s_key = '';
    $s_keyword = '';
    if( isset($_POST["keyword"]) ){
        $s_key = $_POST["key"];
        $s_keyword = $_POST["keyword"];
    }

    $search = $s_keyword . '%';

    $query = "SELECT DISTINCT({$s_key}) FROM tiket_kereta WHERE {$s_key} LIKE '$search'";

    $result = query($query);

    if( countRows($result) == 1 ){
        $data = fetchAssoc($result, SINGLE);
        $html = '<p class="dropdown-item p-2 pl-3 pr-3"><i class="fa fa-map-pin fa-1x pr-3"></i>' . $data[$s_key] . '</p>';
        echo $html;
    } else if( countRows($result) == 0 ){
        $html = '<p class="dropdown-item disabled p-2 pl-3 pr-3"><i class="fa fa-map-pin fa-1x pr-3"></i> Tidak ditemukan</p>';
        echo $html;        
    }