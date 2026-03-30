<?php
$host = "localhost";
$user = "root";
$pass = "";

try {
    // Connecting to MySQL (no database yet)
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Creating database
    $pdo->exec("CREATE DATABASE IF NOT EXISTS php_auth_db");
    echo "Database created successfully<br>";

    // Connecting to the new database
    $pdo->exec("USE php_auth_db");

    // Creating users table
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) UNIQUE NOT NULL,
        email VARCHAR(100) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    $pdo->exec($sql);

    echo "User's table created successfully";

} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
