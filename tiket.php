
<!-- redirect only -->
<?php
    if ($_GET["jenis"] == 'pesawat') {
        include 'pesawat.php';
    } else if ( $_GET["jenis"] == 'keretaapi' ){
        include 'keretaapi.php';
    }    
?>
