<?php
session_start();
include '../../includes/config.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // ✅ Sanitize Inputs
        $model = trim($_POST['model'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $daily_rate = isset($_POST['daily_rate']) ? (float)$_POST['daily_rate'] : 0;
        $vehicle_type_id = isset($_POST['vehicle_type_id']) ? (int)$_POST['vehicle_type_id'] : 0;
        $body_type_id = isset($_POST['body_type_id']) ? (int)$_POST['body_type_id'] : 0;
        $seats = isset($_POST['seats']) ? (int)$_POST['seats'] : 0;
        $engine_capacity = trim($_POST['engine_capacity'] ?? '');
        $fuel_type = trim($_POST['fuel_type'] ?? '');
        $mileage = isset($_POST['mileage']) ? (int)$_POST['mileage'] : 0;
        $transmission = trim($_POST['transmission'] ?? '');
        $drive_train = trim($_POST['drive_train'] ?? '');
        $fuel_economy = trim($_POST['fuel_economy'] ?? '');
        $exterior_color = trim($_POST['exterior_color'] ?? '');
        $interior_color = trim($_POST['interior_color'] ?? '');

        // ✅ Validate Vehicle Type & Body Type Existence
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM vehicle_types WHERE vehicle_type_id = ?");
        $stmt->execute([$vehicle_type_id]);
        if ($stmt->fetchColumn() == 0) {
            throw new Exception("Invalid vehicle type selected.");
        }

        $stmt = $pdo->prepare("SELECT COUNT(*) FROM body_types WHERE body_type_id = ?");
        $stmt->execute([$body_type_id]);
        if ($stmt->fetchColumn() == 0) {
            throw new Exception("Invalid body type selected.");
        }

        // ✅ Insert Data into Database
        $stmt = $pdo->prepare("INSERT INTO cars 
            (model, description, daily_rate, vehicle_type_id, body_type_id, seats, engine_capacity, fuel_type, mileage, transmission, drive_train, fuel_economy, exterior_color, interior_color) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->execute([
            $model,
            $description,
            $daily_rate,
            $vehicle_type_id,
            $body_type_id,
            $seats,
            $engine_capacity,
            $fuel_type,
            $mileage,
            $transmission,
            $drive_train,
            $fuel_economy,
            $exterior_color,
            $interior_color
        ]);

        // ✅ Get Last Inserted Car ID
        $car_id = $pdo->lastInsertId();

        // ✅ Image Upload Handling
        if (isset($_FILES["car_image"]) && $_FILES["car_image"]["error"] == 0) {
            $target_dir = "../../uploads/";
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            $file_ext = strtolower(pathinfo($_FILES["car_image"]["name"], PATHINFO_EXTENSION));
            $allowed_exts = ["jpg", "jpeg", "png", "webp"];

            if (!in_array($file_ext, $allowed_exts)) {
                throw new Exception("Invalid image format. Allowed: JPG, JPEG, PNG, WEBP.");
            }

            $image_name = "car_" . bin2hex(random_bytes(5)) . "." . $file_ext;
            $target_file = $target_dir . $image_name;
            $image_path = "uploads/" . $image_name;

            if (move_uploaded_file($_FILES["car_image"]["tmp_name"], $target_file)) {
                // ✅ Insert Image Record
                $stmt = $pdo->prepare("INSERT INTO car_images (car_id, image_url, is_main) VALUES (?, ?, ?)");
                $stmt->execute([$car_id, $image_path, true]);
            }
        }

        // ✅ Redirect to Dashboard
        header("Location: ../dashboard.php");
        exit();
    } catch (Exception $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add New Car</title>
    
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
            <h3 class="text-center mb-4">Add New Car</h3>
            
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Model</label>
                    <input type="text" name="model" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Daily Rate (Rs)</label>
                    <input type="number" step="0.01" name="daily_rate" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mileage</label>
                    <input type="number" step="0.01" name="mileage" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Vehicle Type</label>
                    <select name="vehicle_type_id" class="form-control" required>
                        <option value="">Select Vehicle Type</option>
                        <?php
                        $stmt = $pdo->query("SELECT vehicle_type_id, name FROM vehicle_types");
                        while ($row = $stmt->fetch()) {
                            echo "<option value='{$row['vehicle_type_id']}'>{$row['name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Body Type</label>
                    <select name="body_type_id" class="form-control" required>
                        <option value="">Select Body Type</option>
                        <?php
                        $stmt = $pdo->query("SELECT body_type_id, name FROM body_types");
                        while ($row = $stmt->fetch()) {
                            echo "<option value='{$row['body_type_id']}'>{$row['name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Seats</label>
                    <input type="number" name="seats" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Image Upload</label>
                    <input type="file" name="car_image" accept="image/*" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Add Car</button>
            </form>
        </div>
    </div>
</body>
</html>
