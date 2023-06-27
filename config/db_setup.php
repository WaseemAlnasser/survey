<?php
// Path: config/db_setup.php

// SQL commands to create the database and tables
$servername = "localhost";       // MySQL server name
$username = "vssqgod1f8uf";     // MySQL username
$password = "brXuL#UQu6!7";     // MySQL password
$database = "survey"; // Database name

// Create a connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the database if it doesn't exist
//$sql = "CREATE DATABASE IF NOT EXISTS `$database`";
//if ($conn->query($sql) === TRUE) {
//    echo "Database created successfully.<br>";
//} else {
//    echo "Error creating database: " . $conn->error;
//    $conn->close();
//    exit;
//}

// Select the database
$conn->select_db($database);

// SQL commands to create the tables
$sql = "
    CREATE TABLE IF NOT EXISTS `users` (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        role ENUM('admin', 'user') DEFAULT 'user',
        
        response_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

// Execute the SQL commands
if ($conn->query($sql) === TRUE) {
    echo "Tables created successfully.";
} else {
    echo "Error creating tables: " . $conn->error;
}

$conn->close(); // Close the database connection
?>