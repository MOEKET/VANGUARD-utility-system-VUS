<?php
session_start();
include('db_connection.php');

// Function to check if user is logged in
function isLoggedIn(){
    return isset($_SESSION['user_id']);
}

// Function to log in user
function login($username, $password){
    global $conn;
    // Hash password for comparison
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Add the line to hash the password for comparison
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$hashed_password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['user_id'];
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// Function to log out user
function logout(){
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
?>
