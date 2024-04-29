// login.php
<?php
include('auth.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle login form submission
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if (login($username, $password)) {
        header("Location: dashboard.php");
        exit();
    } else {
        $error_message = "Invalid username or password";
    }
}
?>

<!-- HTML form for user login -->