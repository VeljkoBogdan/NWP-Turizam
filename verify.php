<?php
session_start();
require 'functions.php';

if (isset($_GET['email']) && isset($_GET['v_cod'])) {
    $email = $_GET['email'];
    $v_cod = $_GET['v_cod'];

    $sql="SELECT * FROM users WHERE email = '$email' AND verification_id = '$v_cod'";
    $result = $pdo->query($sql);

    if ($result) {
        if ($result->rowCount() == 1) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $fetch_email = $row['email'];

            if ($row['verification_status'] == 0) {
                $update = "UPDATE users SET verification_status='1' WHERE email = '$fetch_email'";
                $confirmation = $pdo->query($update);

                if ($confirmation) {
                    echo "
                        <script>
                            alert('Verification successful');
                            window.location.href='index.php'
                        </script>";
                }
                else{
                    echo "
                        <script>
                            alert('Query can not run');
                            window.location.href='index.php' 
                        </script>";
                }
            }
            else{
                echo "
                        <script>
                            alert('Email already registered');
                            window.location.href='index.php'
                        </script>";
            }
        }
    }
}else{
    echo "
            <script>
                alert('Something went wrong, contact an administrator!');
                window.location.href='index.php'
            </script>";
}
?>
