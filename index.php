<?php 
require('app/config/db.php');
require('templates/form.html.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars(strip_tags($_POST['name'] ?? ''));
    $surname = htmlspecialchars(strip_tags($_POST['surname'] ?? ''));
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'] ?? '';
    if (!empty($username) && !empty($surname) && !empty($email) && !empty($password)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = "INSERT INTO users (user_name, surname, user_email, user_password) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $username, $surname, $email, $password);
            if ($stmt->execute()) {
                echo "New user registered successfully";
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } 
        else {
            echo "Invalid email format";
        }
    } else {
        echo "Please fill in all fields";
    }
}

$conn->close();
?>