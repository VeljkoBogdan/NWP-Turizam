<?php
require_once "config.php";
require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$GLOBALS['pdo'] = connectDatabase($dsn, $pdoOptions);

/** Function connects to database using PDO
 * @param string $dsn
 * @param array $pdoOptions
 * @return PDO
 */
function connectDatabase(string $dsn, array $pdoOptions): PDO
{

    try {
        $pdo = new PDO($dsn, PARAMS['USER'], PARAMS['PASSWORD'], $pdoOptions);
    } catch (\PDOException $e) {
        var_dump($e->getCode());
        throw new \PDOException($e->getMessage());
    }

    return $pdo;
}

/** Sends a confirmation email for registration
 * @param $email
 * @param $v_cod
 * @return bool
 */
function sendMail($email, $v_cod){
    require ('vendor/PHPMailer/PHPMailer/src/PHPMailer.php');
    require ('vendor/PHPMailer/PHPMailer/src/Exception.php');
    require ('vendor/PHPMailer/PHPMailer/src/SMTP.php');

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '01484a2ec4eabe';
        $mail->Password = '2c38b334d9cd44';

        $mail->setFrom('tourismroutestest@gmail.com', 'EmailTest');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Email Verification for Your Account';
        $mail->Body    = "<p class=\"text-center\">Thank You for registering!<br>Click the link below to verify your email address:<br>
            <a href='http://localhost:63342/TourismRoutes/verify.php?email=$email&v_cod=$v_cod'>Verify</a></p><br><hr><br>If this is not you, ignore this email.";
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "<script>
                alert('Exception thrown');
               </script>";
        return false;

    }
}

function insertRegistrationIntoTable(string $name, string $surname, string $email, string $pass, string $v_id): bool
{
    $sql = "INSERT INTO users(first_name, last_name, email, password, verification_id) 
            VALUES(:first_name, :last_name, :email, :password, :verification_id)";

    $stmt = $GLOBALS['pdo']->prepare($sql);
    $stmt->bindValue(':first_name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':last_name', $surname, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $pass, PDO::PARAM_STR);
    $stmt->bindValue(':verification_id', $v_id, PDO::PARAM_STR);

    return $stmt->execute();
}

function passwordChange($email, $v_cod){

    require ('vendor/PHPMailer/PHPMailer/src/PHPMailer.php');
    require ('vendor/PHPMailer/PHPMailer/src/Exception.php');
    require ('vendor/PHPMailer/PHPMailer/src/SMTP.php');

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '01484a2ec4eabe';
        $mail->Password = '2c38b334d9cd44';

        $mail->setFrom('tourismroutestest@gmail.com', 'EmailTest');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Forgot Password';
        $mail->Body    = "Click the link to change your password:<br>
            <a href='http://localhost:63342/TourismRoutes/change-password.php?email=$email&v_cod=$v_cod'>Change password</a><br><hr><br>If this is not you, ignore this email.";
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "<script>
                alert('Exception thrown');
</script>";
        return false;

    }
}

function uploadImage(): string
{
    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
        $path_parts = pathinfo($_FILES['image']['name']);
        $extension = $path_parts['extension'];

        $file_name = time() . "-" . mt_rand(100, 10000) . "." . $extension;

        $upload = "uploads/" . $file_name;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $upload)) {
            return $upload;
        } else {
            return "Error during upload!";
        }
    }
    else {
        return "Error during check!";
    }
}