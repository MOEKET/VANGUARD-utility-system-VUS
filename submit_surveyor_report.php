<?php
// Include database connection
include('db_connection.php');

// Handle surveyor report form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data
    $incidentId = $_POST['incidentId'];
    $surveyorId = $_POST['surveyorId'];
    $inspectionDate = $_POST['inspectionDate'];
    $inspectionNotes = $_POST['inspectionNotes'];
    $inspectionResult = $_POST['inspectionResult'];
    
    // Validate data (ensure all required fields are filled)
    if (empty($incidentId) || empty($surveyorId) || empty($inspectionDate) || empty($inspectionNotes) || empty($inspectionResult)) {
        // Handle validation error
        echo "Error: Please fill in all required fields.";
        exit();
    }
    
    // Insert data into the surveyor_reports table
    $sql = "INSERT INTO surveyor_reports (incident_id, surveyor_id, inspection_date, inspection_notes, inspection_result) 
            VALUES ('$incidentId', '$surveyorId', '$inspectionDate', '$inspectionNotes', '$inspectionResult')";
    
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
