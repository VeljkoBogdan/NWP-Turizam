<?php
session_start();
require_once "functions.php";

if (isset($_POST['signup'])) {
    $firstName = trim($_POST['first-name']);
    $lastName = trim($_POST['last-name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);

    $isValid = true;

    if (empty($firstName) || empty($lastName) || empty($email) || empty($password)) {
        $isValid = false;
    }

    if ($isValid) {
        $user_exist_query = "SELECT * FROM users WHERE email = '$email' ";
        $result = $pdo->query($user_exist_query);

        if ($result) {
            if ($result->rowCount() > 0) {
                $row = $result->fetch(PDO::FETCH_ASSOC);

                if ($row['email'] === $email) {
                    echo "
                        <script>
                            alert('Email already taken!');
                            window.location.href = 'index.php'
                        </script>";
                }
            }
            else{
                try {
                    $v_cod = bin2hex(random_bytes(16));
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }

                $insertConfirmation = insertRegistrationIntoTable($firstName, $lastName, $email, $password, $v_cod);
                $mailConfirmation = sendMail($email,$v_cod);

                if ($insertConfirmation === TRUE && $mailConfirmation === TRUE) {
                    echo "
                        <script>
                            alert('Register successful. Check your email and verify your account.');
                                window.location.href='index.php'
                        </script>";
                }else{
                    echo "
                        <script>
                            alert('Couldn\'t send mail! Contact an administrator!');
                            window.location.href='index.php'
                        </script>";
                }
            }
        }else{
            echo "
            <script>
                alert('Couldn\'t retrieve emails!');
                window.location.href='index.php'
            </script>";
        }
    }
    else {
        header("Location: registration.php");
    }
}
if (isset($_POST['login'])) {
    $email_username = $_POST['email'];
    $password_login = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = :email AND verification_status = '1'";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email_username);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row && password_verify($password_login, $row['password']) && $row['verification_status']) {
        $_SESSION['logged_in'] = true;
        $_SESSION['email'] = $row['email'];
        $_SESSION['id'] = $row['id_user'];
        // Check if admin
        if($row['is_admin']) $_SESSION['is_admin'] = true;
        // Check if company
        if($row['is_company']) $_SESSION['is_company'] = true;
        header('location: index.php');
    } else {
        echo "
        <script>
            alert('Please verify your account!');
            window.location.href='login.php'
        </script>";
    }
}
if (isset($_POST['forgot-password'])) {
    $email_username = trim($_POST['forgot-password-email']) ;

    $user_exist_query = "SELECT * FROM users WHERE email = '$email_username' ";
    $result = $pdo->query($user_exist_query);

    if ($result) {
        if ($result->rowCount() > 0) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            if ($row['email'] == $email_username) {
                try {
                    $v_cod = $row['verification_id'];
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }

                $mailConfirmation = passwordChange($email_username, $v_cod);

                if ($mailConfirmation === TRUE) {
                    echo "<script>
                            alert('Check your email and reset your password.');
                                window.location.href='index.php'
                        </script>";
                }else{
                    echo "<script>
                            alert('Couldn\'t send mail! Contact an administrator!');
                            window.location.href='index.php'
                        </script>";
                }
            }
        }
        else{
            echo "<script>
                      alert('This user doesn\'t exist!');
                      window.location.href='change-password-form.php'
                 </script>";
        }
    }
    else{
        echo "<script>
                alert('Couldn\'t retrieve emails!');
                window.location.href='index.php'
            </script>";
    }
}
if (isset($_POST['request-new-password'])) {
    $email_username = $_GET['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);

    $update = "UPDATE users SET password='$password' WHERE email = '$email_username'";
    $confirmation = $pdo->query($update);
    $_SESSION['logged_in'] = true;
    $_SESSION['email'] = $row['email'];
    $_SESSION['id'] = $row['id_user'];
    // Check if admin
    if($row['is_admin']) $_SESSION['is_admin'] = true;
    // Check if company
    if($row['is_company']) $_SESSION['is_company'] = true;
    header('location: index.php');
}
if (isset($_POST['add-sight'])) {
    $id_city = trim($_POST['id_city']);
    $id_agency = trim($_POST['id_agency']);
    $name = htmlspecialchars(trim(strip_tags($_POST['name'])));
    $address = htmlspecialchars(trim(strip_tags($_POST['address'])));
    $hours = htmlspecialchars(trim(strip_tags($_POST['hours'])));
    $fee = htmlspecialchars(trim(strip_tags($_POST['fee'])));
    $contact_info = htmlspecialchars(trim(strip_tags($_POST['contact_info'])));
    $status = trim(strip_tags($_POST['status']));
    $latitude = htmlspecialchars(trim(strip_tags($_POST['latitude'])));
    $longitude = htmlspecialchars(trim(strip_tags($_POST['longitude'])));
    $id_category = trim($_POST['id_category']);
    $indoors_outdoors = trim(strip_tags($_POST['indoors_outdoors']));
    $wifi = trim(strip_tags($_POST['wifi']));
    $description = htmlspecialchars(trim(strip_tags($_POST['description'])));

    // Handle image upload
    $image = uploadImage();

    // Insert data into the sights table
    $sql = "INSERT INTO sights (id_city, id_agency, name, address, hours, fee, image, contact_info, status, latitude, longitude, id_category, indoors_outdoors, wifi, description)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_city, $id_agency, $name, $address, $hours, $fee, $image, $contact_info, $status, $latitude, $longitude, $id_category, $indoors_outdoors, $wifi, $description]);

    // Redirect to a success page or any other page after successful submission
    header('Location: index.php');
    exit();
}

