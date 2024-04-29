<?php
// Include database connection
include('db_connection.php');

// Fetch surveyor reports data from the database
$sql = "SELECT * FROM surveyor_reports";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Report ID: " . $row["report_id"]. " - Incident ID: " . $row["incident_id"]. " - Surveyor ID: " . $row["surveyor_id"]. "<br>";
        // Output additional surveyor report details as needed
    }
} else {
    echo "No surveyor reports found.";
}

// Close database connection
$conn->close();
?>
