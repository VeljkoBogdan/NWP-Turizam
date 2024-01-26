<?php
session_start();
require_once "functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</head>
<body>

<div class="col-sm-8 text-left middle">
    <div class="container col-sm-12">
        <?php

        if (isset($_GET['email']) && isset($_GET['v_cod'])) {
            $email = $_GET['email'];
            $v_cod = $_GET['v_cod'];

            $sql = "SELECT * FROM users WHERE email = '$email' AND verification_id = '$v_cod'";
            $result = $pdo->query($sql);

            if ($result) {
                if ($result->rowCount() == 1) {
                    $row = $result->fetch(PDO::FETCH_ASSOC);
                    $fetch_email = $row['email'];

                    if ($row['verification_status'] == 0) {
                        echo "<div class=\'text-center\'> <span> You need to verify your email first! </span> </div>";
                    }
                    else{
                        echo "<form class=\"form-horizontal\" id=\"recovery-form\" method=\"post\" action=\"confirmation.php?email=$email\" onsubmit=\"return validatePasswordRecovery()\">
                    <div class=\"text-center\">
                        <h3>Account recovery</h3>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label\" for=\"password\">Your Password: </label>
                        <span id=\"passwordError\"></span>
                        <div class=\"input-group\">
                            <input class=\"form-control col-xs-3\" type=\"password\" name=\"password\" id=\"password\">
                            
                            <div class=\"input-group-btn\">
                                <button class=\"btn btn-default\" type=\"button\" id=\"toggle-button\"
                                        onclick=\"togglePasswordVisibilitySignUp()\">
                                    Show
                                </button>
                            </div>
                            
                        </div>
                        <span class=\"password-error red\" id=\"password-error\"></span>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label\" for=\"confirm-password\">Confirm Password: </label>
                        <span id=\"confirmPasswordError\"></span>
                        <div class=\"input-group\">
                            <input class=\"form-control col-xs-3\" type=\"password\" name=\"confirm-password\" id=\"confirm-password\">
                            
                            <div class=\"input-group-btn\">
                                <button class=\"btn btn-default\" type=\"button\" id=\"toggle-button-confirm\"
                                        onclick=\"togglePasswordVisibilitySignUp()\">
                                    Show
                                </button>
                            </div>
                        </div>
                        <span class=\"password-confirmation-error red\" id=\"password-confirmation-error\"></span>
                    </div>
                    
                    <div class=\"form-group\">
                        <button class=\"btn btn-default border\" type=\"submit\" name=\"request-new-password\" id=\"request-new-password\">
                            Set password
                        </button>
                    </div>
                </form>";
                    }
                }
            }
        }else{
            echo "<script>
                alert('Server down!');
                window.location.href='index.php'
            </script>";
        }
        ?>
    </div>
</div>

</body>
</html>