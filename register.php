<?php
include('auth.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle registration form submission
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $userType = $_POST['userType'];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "Error: Passwords do not match";
        exit();
    }

    // Additional registration logic
    // For example, you may want to hash the password before storing it in the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Insert user data into database
    $sql = "INSERT INTO Users (username, password, user_type) VALUES ('$username', '$hashed_password', '$userType')";
    // Execute the SQL query
    if (mysqli_query($db, $sql)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
}
?>
