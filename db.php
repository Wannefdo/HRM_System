<?php
$host = 'localhost';
$dbname = 'hrm_system'; // Your database name
$username = 'root';     // Default for XAMPP
$password = '';         // Default for XAMPP

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
