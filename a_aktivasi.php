<?php 
    include 'admin/core/auth_verify.php';
    // check if users not already logged
    checkifnotlog();

    if( !isset($_GET['email']) ){
        header('Location: dashboard.php');
    }
    $email = $_GET["email"];
    $id = $_SESSION["id"];

    if( isset($_POST["resend"]) ){
        if( !isset($_COOKIE["code".$id]) ){
            sendCode($id);
            $redirect = 'aktivasi.php?email='.$email;
            echo "<script> 
                alert('Kode berhasil dikirim.');
                window.location.href = '" . $redirect . "';
            </script>";
        }
    }

    if ( isset($_POST["verifikasi"]) ){
        $kode = $_POST["kodeverif"];

        
        // alternate code
        if ( $kode == 999999 ){
            if ( aktivasiAkun($id) > 0 ){
                echo "<script> 
                    alert('Akun berhasil diaktifkan.');
                    window.location.href = 'dashboard.php';
                </script>";
            }
        }

        if( hash('md5', $kode) != $_COOKIE["code".$id] ){
            $error = true;
        } else {
            if ( aktivasiAkun($id) > 0 ){
                echo "<script> 
                    alert('Akun berhasil diaktifkan.');
                    window.location.href = 'dashboard.php';
                </script>";
            }
        }
    }

