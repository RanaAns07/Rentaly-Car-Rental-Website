<?php
session_start();
include '../../includes/config.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../index.php");
    exit();
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid request.");
}

$car_id = intval($_GET['id']);

try {
    // ✅ Check if car exists
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM cars WHERE car_id = ?");
    $stmt->execute([$car_id]);

    if ($stmt->fetchColumn() == 0) {
        die("Car not found.");
    }

    $pdo->beginTransaction();

    // ✅ Delete car features
    $stmt = $pdo->prepare("DELETE FROM car_features WHERE car_id = ?");
    $stmt->execute([$car_id]);

    // ✅ Delete car images
    $stmt = $pdo->prepare("SELECT image_url FROM car_images WHERE car_id = ?");
    $stmt->execute([$car_id]);
    $images = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($images as $image) {
        $file_path = "../../" . $image['image_url'];
        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }

    $stmt = $pdo->prepare("DELETE FROM car_images WHERE car_id = ?");
    $stmt->execute([$car_id]);

    // ✅ Delete bookings related to the car
    $stmt = $pdo->prepare("DELETE FROM bookings WHERE car_id = ?");
    $stmt->execute([$car_id]);

    // ✅ Finally, delete the car
    $stmt = $pdo->prepare("DELETE FROM cars WHERE car_id = ?");
    $stmt->execute([$car_id]);

    $pdo->commit();

    header("Location: ../dashboard.php");
    exit();
} catch (Exception $e) {
    $pdo->rollBack();
    die("Error: " . $e->getMessage());
}
?>
