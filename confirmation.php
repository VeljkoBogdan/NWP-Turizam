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
        if($row['is_admin']) {
            $_SESSION['is_admin'] = true;
            $_SESSION['is_agency'] = true;
        }
        header('location: index.php');
    } else {
        $sql = "SELECT * FROM agencies WHERE email = :email AND verification_status = '1'";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email_username);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row && password_verify($password_login, $row['password']) && $row['verification_status']) {
            if($row['is_enabled'] == false){
                echo "
            <script>
                alert('Please wait until an admin enables your account!');
                window.location.href='login.php'
            </script>";
            } else {
                $_SESSION['logged_in'] = true;
                $_SESSION['email'] = $row['email'];
                $_SESSION['id'] = $row['id_agency'];
                $_SESSION['is_agency'] = true;
                // Check if admin
                if($row['is_admin']) {
                    $_SESSION['is_admin'] = true;
                    $_SESSION['is_agency'] = true;
                }
                header('location: index.php');
            }

        } else{
            echo "
            <script>
                alert('Please verify your account!');
                window.location.href='login.php'
            </script>";
        }
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
    $id_agency = $_SESSION['id'];
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
if (isset($_POST['agency-signup'])) {
    // Retrieve form data
    $name = sanitizeInput($_POST["name"]);
    $address = sanitizeInput($_POST["address"]);
    $contact_information = sanitizeInput($_POST["contact_information"]);
    $website = sanitizeInput($_POST["website"]);
    $operating_hours = sanitizeInput($_POST["operating_hours"]);
    $establishment_date = sanitizeInput($_POST["establishment_date"]);
    $email = sanitizeInput($_POST["email"]);
    $password = sanitizeInput($_POST["password"]);

    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);

    $isValid = true;

    if (empty($name) || empty($address) || empty($email) || empty($password)) {
        $isValid = false;
    }

    if ($isValid) {
        $user_exist_query = "SELECT * FROM agencies WHERE email = '$email' ";
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
            else {
                $user_exist_query2 = "SELECT * FROM users WHERE email = '$email' ";
                $result2 = $pdo->query($user_exist_query2);

                if ($result2) {
                    if ($result2->rowCount() > 0) {
                        $row = $result2->fetch(PDO::FETCH_ASSOC);

                        if ($row['email'] === $email) {
                            echo "
                                <script>
                                    alert('Email already taken!');
                                    window.location.href = 'index.php'
                                </script>";
                        }
                    }else{
                        try {
                            $v_cod = bin2hex(random_bytes(16));
                        } catch (\Exception $e) {
                            echo $e->getMessage();
                        }
                        $sql = "INSERT INTO agencies (name, address, contact_information, website, operating_hours, establishment_date, email, password, verification_id) 
                         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                        $stmt = $pdo->prepare($sql);

                        $insertConfirmation = $stmt->execute([$name, $address, $contact_information, $website, $operating_hours, $establishment_date, $email, $hashed_password, $v_cod]);
                        $mailConfirmation = sendMail($email, $v_cod);

                        if ($insertConfirmation === TRUE && $mailConfirmation === TRUE) {
                            echo "
                            <script>
                                alert('Register successful. Check your email and verify your account.');
                                    window.location.href='index.php'
                            </script>";
                        } else {
                            echo "
                            <script>
                                alert('Couldn\'t send mail! Contact an administrator!');
                                window.location.href='index.php'
                            </script>";
                        }
                    }
                }
            }
        } else{
            echo "
            <script>
                alert('Couldn\'t retrieve emails!');
                window.location.href='index.php'
            </script>";
        }
    } else {
        header("Location: registration.php");
    }
}
if (isset($_POST['admin-ban'])) {
    if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
        header("Location: index.php");
    }

    $inputData = $_POST['inputData'];

    $id = "";
    $email = "";

    if (is_numeric($inputData)) {
        // Input is a number (ID)
        $id = (int) $inputData;
        $query = "SELECT * FROM users WHERE id_user = '$id'";
    } else {
        // Input is an email
        $email = $inputData;
        $query = "SELECT * FROM users WHERE email = '$email'";
    }

    $result = $pdo->query($query);

    if ($result->rowCount() > 0) {
        // User exists, toggle the value of the is_banned column
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $isBanned = $row['is_banned'];

        $newBannedStatus = $isBanned ? 0 : 1;

        $updateQuery = "UPDATE users SET is_banned = '$newBannedStatus' WHERE id_user = '$id' OR email = '$email'";
        $confirm = $pdo->query($updateQuery);
        if ($confirm) {
            if($newBannedStatus){
                echo '<script> 
                        alert("User BANNED!");
                        window.location.href="ban_user.php?success=1";
                        </script>';
            }
            else
            {
                echo '<script> 
                        alert("User UNBANNED!");
                        window.location.href="ban_user.php?success=1";
                        </script>';
            }
        } else {
            echo '<script> 
                     alert("Error updating table!");
                     window.location.href="ban_user.php?success=0";
                     </script>';
        }
    } else {
        echo '<script> 
                 alert("User doesn\'t exist!");
                 window.location.href="ban_user.php?success=0";
                 </script>';
    }
}
if (isset($_POST['agency-hide'])) {
    if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
        header("Location: index.php");
    }

    $inputData = $_POST['inputData'];

    $id = " ";
    $email = " ";

    if (is_numeric($inputData)) {
        // Input is a number (ID)
        $id = (int) $inputData;
        $query = "SELECT * FROM agencies WHERE id_agency = '$id'";
    } else {
        // Input is an email
        $email = $inputData;
        $query = "SELECT * FROM agencies WHERE email = '$email'";
    }

    $result = $pdo->query($query);

    if ($result->rowCount() > 0) {
        // User exists, toggle the value of the is_banned column
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $isBanned = $row['is_info_hidden'];

        $newBannedStatus = $isBanned ? 0 : 1;

        $updateQuery = "UPDATE agencies SET is_info_hidden = '$newBannedStatus' WHERE id_agency = '$id' OR email = '$email'";
        $confirm = $pdo->query($updateQuery);
        if ($confirm) {
            if($newBannedStatus){
                echo '<script> 
                        alert("Agency hidden!");
                        window.location.href="ban_user.php?success=1";
                        </script>';
            }
            else
            {
                echo '<script> 
                        alert("Agency unhidden!");
                        window.location.href="ban_user.php?success=1";
                        </script>';
            }
        } else {
            echo '<script> 
                     alert("Error updating table!");
                     window.location.href="ban_user.php?success=0";
                     </script>';
        }
    } else {
        echo '<script> 
                 alert("Agency doesn\'t exist!");
                 window.location.href="ban_user.php?success=0";
                 </script>';
    }
}
if (isset($_POST['add-city'])) {
    $name = htmlspecialchars(trim(strip_tags($_POST['name'])));
    $country = htmlspecialchars(trim(strip_tags($_POST['country'])));
    $population = trim($_POST['population']);
    $region = htmlspecialchars(trim(strip_tags($_POST['region'])));
    $timezone = htmlspecialchars(trim(strip_tags($_POST['timezone'])));
    $latitude = htmlspecialchars(trim(strip_tags($_POST['latitude'])));
    $longitude = htmlspecialchars(trim(strip_tags($_POST['longitude'])));

    // Handle image upload
    $image = uploadImage(); // You need to implement this function

    // Insert data into the cities table
    $sql = "INSERT INTO cities (name, country, population, region, timezone, image, latitude, longitude)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $country, $population, $region, $timezone, $image, $latitude, $longitude]);

    // Redirect to a success page or any other page after successful submission
    header('Location: index.php');
    exit();
}

function sanitizeInput($value) {
    return strip_tags(trim($value));
}


