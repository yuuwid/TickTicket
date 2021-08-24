<?php 

    function loginAuth ($data){
        $username = htmlspecialchars($data['username']);
        $password = htmlspecialchars($data['password']);

        // $query = "SELECT username FROM users";
        $query = "SELECT * FROM users WHERE username = '$username'";

        if( countRows(query($query)) > 0 ){
            $account = fetchAssoc(query($query), SINGLE);
            $pass = $account['password'];
            // remove password in array of $account
            unset( $account['password'] );

            if ( password_verify($password, $pass) ){
                return [$account, 0];
            } else {
                return [false, PASS_ERROR];
            }
        } else {
            return [false, UNAME_ERROR];
        }
    }

    function registerAuth($data){
        $nama = htmlspecialchars($data['nama']);
        $username = strtolower(htmlspecialchars($data['username']));
        $password = htmlspecialchars($data['password']);
        $password2 = htmlspecialchars($data['password2']);
        $email = htmlspecialchars($data['email']);

        if( $username == '' || $password == '' ){
            return [false, UNAME_ERROR];
        }

        // check password and conf password
        if ( $password != $password2 ){
            return [false, PASS_ERROR];
        }

        // check email
        $query = "SELECT email FROM users WHERE email='$email'";
        if ( countRows(query($query)) > 0 ){
            return [false, EMAIL_ERROR];
        }

        // check username
        $query = "SELECT username FROM users WHERE username='$username'";
        if ( countRows(query($query)) == 0 ){
            // hash password
            $password = password_hash($password, PASSWORD_DEFAULT);
            // insert data
            $query = "INSERT INTO users(nama, username, password, email) 
                    VALUES (
                            '$nama', '$username', '$password', '$email'
                        ) ";
            query($query);
            // return affected rows
            return [true, update()];
        } else {
            return [false, UNAME_ERROR];
        }
    }

    function aktivasiAkun($id){
        $query = "UPDATE users SET status=1 WHERE id='$id'";

        query($query);

        return update();
    }

    function sendCode($id, $exp = 120){
        // code verif use cookie in browser with exp time 2 minutes
        $kode = generateNumber();
        setcookie('code'.$id, hash('md5', $kode), time()+$exp);
    }

    function generateNumber($len = 6){
        $min = '1';
        $max = '9';

        for($i = 1; $i < $len; $i++){
            $min .= '0';
            $max .= '9';
        }

        return rand($min, $max);
    }


    function uploadFoto($data){
        $foto = $data['foto'];
        $name = $foto['name'];
        $type = $foto['type'];
        $tmp_name = $foto['tmp_name'];
        $error = $foto['error'];
        $size = $foto['size'];

        $id = $_SESSION["id"];

        if( $error != 0 ){
            return [false, NOFILE_ERROR];
        }

        if( $size > 2e6 ){
            return [false, SIZEFILE_ERROR];
        }

        $valid_type = ['png', 'jpg', 'jpeg'];
        $type = explode('/', $type);
        $type = end($type);
        if( !in_array($type, $valid_type) ){
            return [false, TYPEFILE_ERROR];
        }

        $name = uniqid();
        $name = $name . '.' . $type;

        $query = "SELECT * FROM users WHERE id='$id'";
        $fotolama = fetchAssoc(query($query), SINGLE)['foto'];
        // move foto lama ke folder trash
        if( $fotolama != 'noprofile.png' ){
            rename('assets/img/'.$fotolama, 'assets/img/trash/'.$fotolama);
        }

        $query = "UPDATE users SET foto='$name' WHERE id='$id'";
        query($query);

        move_uploaded_file($tmp_name, 'assets/img/'.$name);


        return [true, update()];
    }

    function editProfile($data){
        $id = $_SESSION["id"];
        $nama = htmlspecialchars($data['nama']);
        $kelamin = htmlspecialchars($data['kelamin']);
        $alamat = htmlspecialchars($data['alamat']);
        $kota = htmlspecialchars($data['kota']);
        $provinsi = htmlspecialchars($data['provinsi']);
        $kodepos = htmlspecialchars($data['kodepos']);
        $nik = htmlspecialchars($data['nik']);

        $query = "UPDATE users SET 
                    nama='$nama',
                    kelamin='$kelamin',
                    alamat='$alamat',
                    kota='$kota',
                    provinsi='$provinsi',
                    kodepos='$kodepos',
                    nik='$nik'
                 WHERE id='$id'";
        
        query($query);
        

        return update();
    }




    function hapusAkun($id){
        $query = "DELETE FROM users WHERE id='$id'";

        query($query);

        return update();
    }