<?php
// database details
define('DB_HOST', 'localhost');
define('DB_NAME', 'php_auth_db');
define('DB_USER', 'root');
define('DB_PASS', '');

// connecting using PDO
try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
        DB_USER,
        DB_PASS
    );

    // show errors if something goes wrong
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>