<?php
// Handle incident form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data
    $incidentType = $_POST['incidentType'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    // Additional processing and database insertion
    // Redirect or output success message
}
?>
