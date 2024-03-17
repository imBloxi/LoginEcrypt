<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "db_connection.php";

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $pgp_key = $_POST["pgp_key"];

    $sql = "INSERT INTO users (username, email, password, pgp_key) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $email, $password, $pgp_key);
    
    if ($stmt->execute()) {
        echo "User registered successfully.";
    } else {
        echo "Error registering user: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
