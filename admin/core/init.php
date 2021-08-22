<?php 

    require_once 'database.php';
    require_once 'functions.php';


    require_once __DIR__ . '../../../vendor/autoload.php';
    
    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();



    session_start();

    date_default_timezone_set("Asia/Jakarta");
    $time = date("d-m-Y H-i-s");