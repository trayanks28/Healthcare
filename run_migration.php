<?php
include 'connection.php';

if (($_GET['key'] ?? '') !== 'phone-fix-20260427') {
    http_response_code(403);
    die('Forbidden');
}

$queries = [
    "ALTER TABLE `doctor` MODIFY `phone` varchar(20) NOT NULL",
    "ALTER TABLE `pateint` MODIFY `phone` varchar(20) NOT NULL",
    "ALTER TABLE `appointment` MODIFY `phone` varchar(20) NOT NULL"
];

foreach ($queries as $query) {
    if ($conn->query($query) === TRUE) {
        echo "Success: $query<br>";
    } else {
        echo "Error: " . $conn->error . "<br>";
    }
}

$conn->close();
?>
