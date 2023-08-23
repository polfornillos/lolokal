<?php
    session_start();
    include("dbfunctions.php");
?>

<?php

if(isset($_POST['submit'])) {
    
    require 'lolokaldb.php';

    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $user_id = random_num(20);

    if(empty($fullname) || empty($username) || empty($password)) {
        header("Location: ../RegisterPage.php?error=emptyfields&username=".$username);
        exit();
    } elseif (!preg_match("/^[a-zA-Z0-9]*/", $username)) {
        header("Location: ../RegisterPage.php?error=invalidusername&username=".$username);
        exit();
    }
    
    else {
        $sql = "SELECT username FROM users WHERE username = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: /RegisterPage.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $rowCount = mysqli_stmt_num_rows($stmt);

            if ($rowCount > 0) {
                header("Location: /RegisterPage.php?error=usernametaken");//this is error
                exit();
            } else {
                $sql = "INSERT INTO users(user_id,fullname, username, email, password, country, phone) VALUES (?,?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: /RegisterPage.php?error=sqlerror");
                    exit();
                } else {
                    $hashedPass = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sssssss", $user_id, $fullname, $username, $email, $hashedPass, $country, $phone);
                    mysqli_stmt_execute($stmt);
                    
                    header("Location: LoginPage.html");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

?>