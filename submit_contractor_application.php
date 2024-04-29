<?php
// Include database connection
include('db_connection.php');

// Handle contractor application form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $ratePerHour = $_POST['ratePerHour'];
    
    // Validate data (ensure all required fields are filled)
    if (empty($username) || empty($password) || empty($ratePerHour)) {
        // Handle validation error
        echo "Error: Please fill in all required fields.";
        exit();
    }
    
    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    // Insert data into the contractors table
    $sql = "INSERT INTO contractors (username, password, rate_per_hour) 
            VALUES ('$username', '$hashedPassword', '$ratePerHour')";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect to success page or output success message
        header("Location: success.php");
        exit();
    } else {
        // Handle database insertion error
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Close database connection
    $conn->close();
}
?>
