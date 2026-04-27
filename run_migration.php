<?php
include 'connection.php';

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
