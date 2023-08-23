<?php
    session_start();
?>

<?php

if (isset($_POST['login'])) {

    require 'lolokaldb.php';

    $username = $_POST['username'];
    $password = $_POST['pwd'];

    if (empty($username) || empty($password)) {
        header("Location: LoginPage.html?error=emptyfields");
    } 
    else {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: LoginPage.html?error=sqlerror");
            exit();
        } 
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $passCheck = password_verify($password, $row['password']);
                if ($passCheck == false) {
                    header("Location: LoginPage.html?error=wrongpassword");
                    exit();
                } 
                elseif ($passCheck == true) {
                    session_start();
                    $_SESSION['sessionId'] = $row['id'];
                    $_SESSION['sessionUser'] = $row['username'];
                
                    header("Location: index.php");
                    exit();
                } 
                else {
                    header("Location: .LoginPage.html?error=wrongpass");
                    exit();
                }
            } 
            else {
                header("Location: LoginPage.html?error=nouser");
                exit();
            }
        }
    }
}
else {
    header("Location: LoginPage.html?error=accessforbidden");
    exit();
}
?>
