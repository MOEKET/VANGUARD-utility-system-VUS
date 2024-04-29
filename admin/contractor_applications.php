<?php
// Include database connection
include('db_connection.php');

// Fetch contractor applications data from the database
$sql = "SELECT * FROM contractor_applications";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Application ID: " . $row["application_id"]. " - Contractor ID: " . $row["contractor_id"]. " - Status: " . $row["application_status"]. "<br>";
        // Output additional contractor application details as needed
    }
} else {
    echo "No contractor applications found.";
}

// Close database connection
$conn->close();
?>
