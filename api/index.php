<?php
$projectRoot = dirname(__DIR__);
chdir($projectRoot);

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$path = $path === false ? '/' : $path;

$routes = [
    '/' => 'index.php',
    '/api/index.php' => 'index.php',
    '/index.php' => 'index.php',
    '/login.php' => 'login.php',
    '/register.php' => 'register.php',
    '/appointmentdoctor.php' => 'appointmentdoctor.php',
    '/doctor.php' => 'doctor.php',
    '/admin.php' => 'admin.php',
    '/pateint.php' => 'pateint.php',
    '/logout.php' => 'logout.php',
    '/view_invoice.php' => 'view_invoice.php',
    '/text.php' => 'text.php',
    '/session_test.php' => 'session_test.php',
    '/run_migration.php' => 'run_migration.php',
];

$script = $_GET['__page'] ?? ($routes[$path] ?? null);
$allowedScripts = array_flip(array_values($routes));

if (!isset($allowedScripts[$script])) {
    http_response_code(404);
    echo 'Not Found';
    exit;
}

require $projectRoot . DIRECTORY_SEPARATOR . $script;
