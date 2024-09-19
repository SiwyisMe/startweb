<?php 
require('app/config/db.php');
require('templates/form.html.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars(strip_tags($_POST['name'] ?? ''));
    $surname = htmlspecialchars(strip_tags($_POST['surname'] ?? ''));
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'] ?? '';

    $sql = "INSERT INTO users (user_name, surname, user_email, user_password) VALUES (?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $surname, $email, $password);

    echo $stmt->execute() ? "New user registered successfully" : "Error: " . $stmt->error;

    $stmt->close();
}

$conn->close();
?>