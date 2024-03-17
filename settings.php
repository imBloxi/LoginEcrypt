<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "db_connection.php";

    $username = $_SESSION["username"];
    $newEmail = $_POST["email"];
    $newPgpKey = $_POST["pgp_key"];

    $sql = "UPDATE users SET email = ?, pgp_key = ? WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $newEmail, $newPgpKey, $username);
    
    if ($stmt->execute()) {
        echo "Settings updated successfully.";
    } else {
        echo "Error updating settings: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
