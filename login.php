<?php
// Database connection
$host = 'localhost';
$db = 'login_system';
$user = 'root';
$pass = ''; // If you have a MySQL password, add it here

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Start session
session_start();

// Get form data
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare and execute SQL
$stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 1) {
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();

    if (password_verify($password, $hashedPassword)) {
        $_SESSION['username'] = $username;

        // Show success message and redirect after 2 seconds
        echo "<h2>Login successful! Redirecting to home...</h2>";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'index.html';
                }, 2000);
              </script>";
        exit();
    } else {
        echo "<h3>Incorrect password.</h3>";
    }
} else {
    echo "<h3>User not found.</h3>";
}

$stmt->close();
$conn->close();
?>