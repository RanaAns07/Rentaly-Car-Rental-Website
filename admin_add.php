<?php
// Database connection details
$host = 'localhost'; // Change if needed
$dbname = 'car_rental'; // Updated database name
$username = 'root'; // Change if needed
$password = ''; // Change if your database has a password

try {
    // Establish a connection to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Insert vehicle types
    $vehicleTypes = ['Sedan', 'SUV', 'Truck', 'Convertible', 'Coupe', 'Hatchback', 'Minivan'];
    $stmt = $pdo->prepare("INSERT INTO vehicle_types (name) VALUES (?)");
    foreach ($vehicleTypes as $type) {
        $stmt->execute([$type]);
    }

    // Insert body types
    $bodyTypes = ['Compact', 'Mid-size', 'Full-size', 'Luxury', 'Sports', 'Off-road'];
    $stmt = $pdo->prepare("INSERT INTO body_types (name) VALUES (?)");
    foreach ($bodyTypes as $type) {
        $stmt->execute([$type]);
    }

    // Insert features
    $features = ['Bluetooth', 'GPS', 'Sunroof', 'Backup Camera', 'Leather Seats', 'Heated Seats', 'Parking Sensors'];
    $stmt = $pdo->prepare("INSERT INTO features (name) VALUES (?)");
    foreach ($features as $feature) {
        $stmt->execute([$feature]);
    }

    // Insert admin user
    $hashedPassword = password_hash('admin', PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (username, password_hash, email) VALUES (?, ?, ?)");
    $stmt->execute(['ansmustafa', $hashedPassword, 'admin@carrental.com']);

    echo "Initial data inserted successfully.";
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
