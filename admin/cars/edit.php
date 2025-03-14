<?php
session_start();
include '../../includes/config.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../index.php");
    exit();
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid Car ID.");
}
$car_id = intval($_GET['id']);

// Fetch car details
$stmt = $pdo->prepare("SELECT * FROM cars WHERE car_id = ?");
$stmt->execute([$car_id]);
$car = $stmt->fetch();

if (!$car) {
    die("Car not found.");
}

// Fetch vehicle types & body types
$vehicleTypes = $pdo->query("SELECT * FROM vehicle_types ORDER BY name ASC")->fetchAll(PDO::FETCH_ASSOC);
$bodyTypes = $pdo->query("SELECT * FROM body_types ORDER BY name ASC")->fetchAll(PDO::FETCH_ASSOC);

// Fetch car features
$stmt = $pdo->prepare("SELECT feature_id FROM car_features WHERE car_id = ?");
$stmt->execute([$car_id]);
$carFeatures = $stmt->fetchAll(PDO::FETCH_COLUMN);

// Fetch car images
$stmt = $pdo->prepare("SELECT * FROM car_images WHERE car_id = ? AND is_main = 1");
$stmt->execute([$car_id]);
$carImage = $stmt->fetch();
$oldImage = $carImage ? $carImage['image_url'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $model = trim($_POST['model']);
    $description = trim($_POST['description']);
    $daily_rate = $_POST['daily_rate'];
    $vehicle_type_id = $_POST['vehicle_type_id'];
    $body_type_id = $_POST['body_type_id'];
    $seats = $_POST['seats'];
    $engine_capacity = $_POST['engine_capacity'];
    $fuel_type = trim($_POST['fuel_type']);
    $mileage = $_POST['mileage'];
    $transmission = trim($_POST['transmission']);
    $drive_train = trim($_POST['drive_train']);
    $fuel_economy = trim($_POST['fuel_economy']);
    $exterior_color = trim($_POST['exterior_color']);
    $interior_color = trim($_POST['interior_color']);
    $features = $_POST['features'] ?? [];

    try {
        $pdo->beginTransaction();

        // ✅ Update car details
        $stmt = $pdo->prepare("UPDATE cars SET 
            model = ?, 
            description = ?, 
            daily_rate = ?, 
            vehicle_type_id = ?, 
            body_type_id = ?, 
            seats = ?, 
            engine_capacity = ?, 
            fuel_type = ?, 
            mileage = ?, 
            transmission = ?, 
            drive_train = ?, 
            fuel_economy = ?, 
            exterior_color = ?, 
            interior_color = ? 
            WHERE car_id = ?");

        $stmt->execute([
            $model, $description, $daily_rate, $vehicle_type_id, $body_type_id,
            $seats, $engine_capacity, $fuel_type, $mileage, $transmission,
            $drive_train, $fuel_economy, $exterior_color, $interior_color, $car_id
        ]);

        // ✅ Update features
        $stmt = $pdo->prepare("DELETE FROM car_features WHERE car_id = ?");
        $stmt->execute([$car_id]);

        foreach ($features as $feature_id) {
            $stmt = $pdo->prepare("INSERT INTO car_features (car_id, feature_id) VALUES (?, ?)");
            $stmt->execute([$car_id, $feature_id]);
        }

        // ✅ Handle image upload
        if (!empty($_FILES['car_image']['name'])) {
            $target_dir = "../../uploads/";
            $image_name = time() . "_" . basename($_FILES["car_image"]["name"]);
            $target_file = $target_dir . $image_name;

            if (move_uploaded_file($_FILES["car_image"]["tmp_name"], $target_file)) {
                $image_url = "uploads/" . $image_name;

                if ($oldImage && file_exists("../../" . $oldImage)) {
                    unlink("../../" . $oldImage);
                }

                $stmt = $pdo->prepare("UPDATE car_images SET image_url = ? WHERE car_id = ? AND is_main = 1");
                $stmt->execute([$image_url, $car_id]);
            }
        }

        $pdo->commit();
        header("Location: ../dashboard.php");
        exit();
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo "Error updating car: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Car</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin-top: 40px;
        }
        .card {
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card shadow-sm">
            <h3 class="text-center mb-4">Edit Car</h3>
            
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Model</label>
                    <input type="text" name="model" class="form-control" value="<?= htmlspecialchars($car['model']) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control"><?= htmlspecialchars($car['description']) ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Daily Rate ($)</label>
                    <input type="number" step="0.01" name="daily_rate" class="form-control" value="<?= $car['daily_rate'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mileage</label>
                    <input type="number" step="0.01" name="mileage" class="form-control" value="<?= $car['mileage'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Vehicle Type</label>
                    <select name="vehicle_type_id" class="form-control" required>
                        <?php foreach ($vehicleTypes as $type): ?>
                            <option value="<?= $type['vehicle_type_id'] ?>" <?= $car['vehicle_type_id'] == $type['vehicle_type_id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($type['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Body Type</label>
                    <select name="body_type_id" class="form-control" required>
                        <?php foreach ($bodyTypes as $body): ?>
                            <option value="<?= $body['body_type_id'] ?>" <?= $car['body_type_id'] == $body['body_type_id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($body['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Image Upload (optional)</label>
                    <input type="file" name="car_image" accept="image/*" class="form-control">
                    <?php if ($oldImage): ?>
                        <p>Current Image: <img src="../../<?= $oldImage ?>" width="100"></p>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary w-100">Update Car</button>
            </form>
        </div>
    </div>
</body>
</html>
