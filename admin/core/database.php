<?php 
    require_once 'config.php';

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if( mysqli_connect_errno() ){
        echo "Koneksi gagal " . mysqli_connect_errno();
    }

    function query($query){
        global $conn;
        return mysqli_query($conn, $query);
    }
    
    
    function countRows($result){
        global $conn;
        return mysqli_num_rows($result);
    }

    function fetchAssoc($result, $PARAM = MULTIPLE){
        global $conn;

        if( $PARAM == SINGLE ){
            return mysqli_fetch_assoc($result);
        } else {
            $data = [];

            while( $row = mysqli_fetch_assoc($result) ){
                $data[] = $row;
            }
            return $data;
        }
    }

    function update(){
        global $conn;
        return mysqli_affected_rows($conn);
    }
