<!-- login.php -->
<?php
session_start();
// Replace with your database credentials
$host = "localhost";
$dbUsername = "your_username";
$dbPassword = "your_password";
$dbName = "login_system";

// Create a database connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if user exists in the database
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        // Login successful, redirect to a dashboard or home page
        $_SESSION["username"] = $username;
        header("Location: dashboard.php");
    } else {
        // Login failed, redirect back to the login page
        header("Location: index.html");
    }
}

$conn->close();
?>

