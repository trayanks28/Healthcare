<?php
$host = getenv('DB_HOST') ?: 'localhost';
$username = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASS') ?: ''; // XAMPP default is empty
$database = getenv('DB_NAME') ?: 'healthcare';
$port = (int) (getenv('DB_PORT') ?: 3306);

$databaseUrl = getenv('DATABASE_URL');
if ($databaseUrl) {
    $parts = parse_url($databaseUrl);

    if ($parts !== false) {
        $host = $parts['host'] ?? $host;
        $username = isset($parts['user']) ? rawurldecode($parts['user']) : $username;
        $password = isset($parts['pass']) ? rawurldecode($parts['pass']) : $password;
        $database = isset($parts['path']) ? ltrim($parts['path'], '/') : $database;
        $port = isset($parts['port']) ? (int) $parts['port'] : $port;
    }
}

// Create connection
$conn = @new mysqli($host, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die('Database connection failed. Check DB_HOST, DB_USER, DB_PASS, DB_NAME, and DB_PORT.');
}
?>
