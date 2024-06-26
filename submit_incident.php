<?php
// Include database connection
include('db_connection.php');

// Handle incident form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data
    $incidentType = $_POST['incidentType'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    
    // Validate data (ensure all required fields are filled)
    if (empty($incidentType) || empty($description) || empty($location)) {
        // Handle validation error
        echo "Error: Please fill in all required fields.";
        exit();
    }
    
    // Insert data into the incidents table
    $sql = "INSERT INTO incidents (incident_type, description, location, status, date_reported) 
            VALUES ('$incidentType', '$description', '$location', 'Pending', NOW())";
    
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
