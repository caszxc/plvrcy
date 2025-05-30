<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "rcyDB";

// Connect to MySQL
$conn = new mysqli($host, $user, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $database";
if (!$conn->query($sql)) {
    die("Error creating database: " . $conn->error);
}

// Select the database
$conn->select_db($database);

// Create table if it doesn't exist
$table_sql = "
CREATE TABLE IF NOT EXISTS inventory (
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(100) NOT NULL,
    category VARCHAR(50) NOT NULL,
    description TEXT,
    image_url VARCHAR(255),
    quantity INT NOT NULL DEFAULT 0,
    item_condition VARCHAR(20)
)";
if (!$conn->query($table_sql)) {
    die("Error creating table: " . $conn->error);
}

// Create table for training images if it doesn't exist
$table_sql = "
CREATE TABLE IF NOT EXISTS training_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image_path VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!$conn->query($table_sql)) {
    die("Error creating table: " . $conn->error);
}


?>
