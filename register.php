<?php
include_once "db_config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pgp_key = $_POST['pgp_key'];

    // You should add proper validation and sanitization here

    // Hash PGP key or keep as plaintext, depending on your needs
    $hashed_pgp_key = password_hash($pgp_key, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, pgp_key) VALUES ('$username', '$email', '$hashed_pgp_key')";

    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
