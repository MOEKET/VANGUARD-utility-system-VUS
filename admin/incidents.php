<?php
// Include database connection
include('db_connection.php');

// Fetch incidents data from the database
$sql = "SELECT * FROM incidents";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Incident ID: " . $row["incident_id"]. " - Type: " . $row["incident_type"]. " - Description: " . $row["description"]. "<br>";
        // Output additional incident details as needed
    }
} else {
    echo "No incidents found.";
}

// Close database connection
$conn->close();
?>
