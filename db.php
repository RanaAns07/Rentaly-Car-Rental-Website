<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully\n";
} else {
    die("Error creating database: " . $conn->error);
}

// Select database
$conn->select_db($dbname);

// Create tables
$queries = [
    "CREATE TABLE IF NOT EXISTS users (
        user_id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        email VARCHAR(100) NOT NULL UNIQUE,
        password_hash VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )",
    "CREATE TABLE IF NOT EXISTS vehicle_types (
        vehicle_type_id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL UNIQUE
    )",
    "CREATE TABLE IF NOT EXISTS body_types (
        body_type_id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL UNIQUE
    )",
    "CREATE TABLE IF NOT EXISTS features (
        feature_id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL UNIQUE
    )",
    "CREATE TABLE IF NOT EXISTS cars (
        car_id INT AUTO_INCREMENT PRIMARY KEY,
        model VARCHAR(100) NOT NULL,
        description TEXT,
        daily_rate DECIMAL(10,2) NOT NULL,
        vehicle_type_id INT,
        body_type_id INT,
        seats INT NOT NULL,
        engine_capacity INT,
        fuel_type VARCHAR(50),
        mileage INT,
        transmission VARCHAR(50),
        drive_train VARCHAR(50),
        fuel_economy VARCHAR(50),
        exterior_color VARCHAR(50),
        interior_color VARCHAR(50),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (vehicle_type_id) REFERENCES vehicle_types(vehicle_type_id),
        FOREIGN KEY (body_type_id) REFERENCES body_types(body_type_id)
    )",
    "CREATE TABLE IF NOT EXISTS car_features (
        car_id INT,
        feature_id INT,
        PRIMARY KEY (car_id, feature_id),
        FOREIGN KEY (car_id) REFERENCES cars(car_id),
        FOREIGN KEY (feature_id) REFERENCES features(feature_id)
    )",
    "CREATE TABLE IF NOT EXISTS car_images (
        image_id INT AUTO_INCREMENT PRIMARY KEY,
        car_id INT NOT NULL,
        image_url VARCHAR(255) NOT NULL,
        is_main BOOLEAN DEFAULT FALSE,
        FOREIGN KEY (car_id) REFERENCES cars(car_id)
    )",
    "CREATE TABLE IF NOT EXISTS bookings (
        booking_id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        car_id INT NOT NULL,
        pickup_location VARCHAR(255) NOT NULL,
        dropoff_location VARCHAR(255) NOT NULL,
        pickup_date DATE NOT NULL,
        pickup_time TIME NOT NULL,
        return_date DATE NOT NULL,
        return_time TIME NOT NULL,
        total_price DECIMAL(10,2) NOT NULL,
        status ENUM('pending', 'confirmed', 'completed') DEFAULT 'pending',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(user_id),
        FOREIGN KEY (car_id) REFERENCES cars(car_id)
    )"
];

foreach ($queries as $query) {
    if ($conn->query($query) !== TRUE) {
        echo "Error creating table: " . $conn->error . "\n";
    }
}

echo "Tables created successfully";
$conn->close();
?>
