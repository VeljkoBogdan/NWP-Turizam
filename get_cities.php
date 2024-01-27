<?php
$conn = new mysqli("localhost", "root", "", "bogdan");

// Fetch cities from the database
$sql = "SELECT * FROM cities";
$result = $conn->query($sql);

$cities = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cities[] = $row;
    }
}

// Return cities as JSON
header('Content-Type: application/json');
echo json_encode(['cities' => $cities]);

$conn->close();
?>