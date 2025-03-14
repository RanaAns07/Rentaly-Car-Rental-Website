<?php
session_start();
include '../includes/config.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}

// Get all cars with vehicle type, body type, and main image
$stmt = $pdo->query("
    SELECT c.car_id, c.model, c.daily_rate, 
           v.name AS vehicle_type, 
           b.name AS body_type,
           (SELECT image_url FROM car_images WHERE car_id = c.car_id AND is_main = 1 LIMIT 1) AS main_image
    FROM cars c
    LEFT JOIN vehicle_types v ON c.vehicle_type_id = v.vehicle_type_id
    LEFT JOIN body_types b ON c.body_type_id = b.body_type_id
");
$cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get all bookings with user and car details
$stmt = $pdo->query("
    SELECT b.booking_id, u.username, c.model, b.pickup_location, b.dropoff_location, 
           b.pickup_date, b.return_date, b.total_price, b.status
    FROM bookings b
    JOIN users u ON b.user_id = u.user_id
    JOIN cars c ON b.car_id = c.car_id
    ORDER BY b.booking_id DESC
");
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .container { margin-top: 40px; }
        .table { background-color: #fff; border-radius: 8px; overflow: hidden; }
        .btn-sm { margin-right: 5px; }
        .car-image { width: 80px; height: 50px; object-fit: cover; border-radius: 5px; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <a href="cars/add.php" class="btn btn-success btn-sm">Add New Car</a>
        <a href="http://localhost/car-website/public/index.php" class="btn btn-success btn-sm">HOME PAGE</a>
    </div>
</nav>

<div class="container">
    <h2 class="mt-4 mb-3">Car Management</h2>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Image</th>
                    <th>Model</th>
                    <th>Daily Rate</th>
                    <th>Vehicle Type</th>
                    <th>Body Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cars as $car): ?>
                <tr>
                    <td><img src="../<?= htmlspecialchars($car['main_image'] ?? 'uploads/default.jpg') ?>" class="car-image"></td>
                    <td><?= htmlspecialchars($car['model']) ?></td>
                    <td>Rs. <?= number_format($car['daily_rate'], 2) ?></td>
                    <td><?= htmlspecialchars($car['vehicle_type']) ?></td>
                    <td><?= htmlspecialchars($car['body_type']) ?></td>
                    <td>
                        <a href="cars/edit.php?id=<?= $car['car_id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="cars/delete.php?id=<?= $car['car_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <h2 class="mt-5 mb-3">Booking Details</h2>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Car</th>
                    <th>Pickup</th>
                    <th>Dropoff</th>
                    <th>Pickup Date</th>
                    <th>Return Date</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookings as $booking): ?>
                <tr>
                    <td><?= $booking['booking_id'] ?></td>
                    <td><?= htmlspecialchars($booking['username']) ?></td>
                    <td><?= htmlspecialchars($booking['model']) ?></td>
                    <td><?= htmlspecialchars($booking['pickup_location']) ?></td>
                    <td><?= htmlspecialchars($booking['dropoff_location']) ?></td>
                    <td><?= $booking['pickup_date'] ?></td>
                    <td><?= $booking['return_date'] ?></td>
                    <td>Rs. <?= number_format($booking['total_price'], 2) ?></td>
                    <td>
                        <span class="badge bg-<?= $booking['status'] === 'confirmed' ? 'success' : 'warning' ?>">
                            <?= ucfirst($booking['status']) ?>
                        </span>
                    </td>
                    <td>
                        <a href="bookings/edit.php?id=<?= $booking['booking_id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="bookings/delete.php?id=<?= $booking['booking_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
