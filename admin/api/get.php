<?php
header("Content-Type: application/json");
require_once __DIR__ . '/../../includes/config.php'; // Ensure config path is correct

$base_url = "http://localhost/car-website/uploads"; // Correct base URL

try {
    // Fetch cars with their main image, vehicle type, and body type
    $stmt = $pdo->prepare("
        SELECT 
            c.car_id, 
            c.model, 
            c.description, 
            c.daily_rate, 
            c.seats, 
            c.engine_capacity, 
            c.fuel_type, 
            c.mileage, 
            c.transmission, 
            c.drive_train, 
            c.fuel_economy, 
            c.exterior_color, 
            c.interior_color,
            vt.name AS vehicle_type, 
            bt.name AS body_type,
            COALESCE(
                (SELECT CONCAT(:base_url, '/', REPLACE(image_url, 'uploads/', '')) 
                 FROM car_images 
                 WHERE car_id = c.car_id AND is_main = 1 LIMIT 1), 
                CONCAT(:base_url, '/default.jpg')
            ) AS main_image
        FROM cars c
        LEFT JOIN vehicle_types vt ON c.vehicle_type_id = vt.vehicle_type_id
        LEFT JOIN body_types bt ON c.body_type_id = bt.body_type_id
        ORDER BY c.car_id DESC
    ");
    
    $stmt->execute([':base_url' => $base_url]);
    $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return JSON response
    echo json_encode(["status" => "success", "data" => $cars], JSON_PRETTY_PRINT);
} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage()); // Log error for debugging
    echo json_encode(["status" => "error", "message" => "Database error."]);
}
?>
