<?php
session_start();
include_once "db_config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // You should add proper validation and sanitization here

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_pgp_key = $row['pgp_key'];

        // Compare PGP key or plaintext, depending on how it was stored
        if (password_verify($password, $hashed_pgp_key)) {
            // Authentication successful
            $_SESSION['username'] = $username;
            header("Location: dashboard.php"); // Redirect to dashboard or user profile
            exit();
        } else {
            echo "Incorrect username or password.";
        }
    } else {
        echo "User not found.";
    }
}

mysqli_close($conn);
?>
