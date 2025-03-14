<?php
include __DIR__ . '/../includes/config.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = 1; // Assuming a logged-in user (update this logic as needed)
    $car_id = $_POST['car_id'];
    $pickup_location = $_POST['pickup_location'];
    $dropoff_location = $_POST['dropoff_location'];
    $pickup_date = $_POST['pickup_date'];
    $return_date = $_POST['return_date'];
    $total_price = $_POST['total_price'];

    try {
        $stmt = $pdo->prepare("
            INSERT INTO bookings (user_id, car_id, pickup_location, dropoff_location, pickup_date, return_date, total_price, status)
            VALUES (?, ?, ?, ?, ?, ?, ?, 'pending')
        ");
        $stmt->execute([$user_id, $car_id, $pickup_location, $dropoff_location, $pickup_date, $return_date, $total_price]);

        echo json_encode(["status" => "success"]);
        exit;
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "Booking failed"]);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rently - Book a Car</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background: linear-gradient(to right, #2c003e, #59007a);
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            width: 80%;
            max-width: 900px;
            text-align: center;
        }
        h1 {
            font-size: 2.5em;
            margin-bottom: 15px;
        }
        form {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
        }
        .form-group {
            flex: 1;
            min-width: 250px;
            display: flex;
            flex-direction: column;
            align-items: start;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            font-size: 16px;
        }
        input, select {
            background: rgba(255, 255, 255, 0.2);
            color: #000000;
        }
        select {
            appearance: none;
        }
        button {
            background: #8200d8;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: #a000ff;
        }
        .hidden {
            display: none;
            font-size: 20px;
            color: limegreen;
            margin-top: 20px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="container">
    <h1>Rently - Book a Car</h1>

    <form id="booking-form">
        <div class="form-group">
            <label>Select Car:</label>
            <select id="car_id" name="car_id" required>
                <option value="">Loading cars...</option>
            </select>
        </div>

        <div class="form-group">
            <label>Pickup Location:</label>
            <input type="text" name="pickup_location" required>
        </div>

        <div class="form-group">
            <label>Dropoff Location:</label>
            <input type="text" name="dropoff_location" required>
        </div>

        <div class="form-group">
            <label>Pickup Date:</label>
            <input type="date" id="pickup_date" name="pickup_date" required>
        </div>

        <div class="form-group">
            <label>Return Date:</label>
            <input type="date" id="return_date" name="return_date" required>
        </div>

        <div class="form-group">
            <label>Daily Rate:</label>
            <input type="text" id="daily_rate" disabled>
        </div>

        <div class="form-group">
            <label>Total Price:</label>
            <input type="text" id="total_price" name="total_price" readonly>
        </div>

        <div class="form-group">
            <button type="submit">Book Now</button>
        </div>
    </form>

    <div id="confirmation-message" class="hidden">Booking Added Successfully!</div>
</div>

<script>

$(document).ready(function() {
    // Retrieve stored values
    let selectedCarId = localStorage.getItem("selectedCarId");
    let selectedCarRate = localStorage.getItem("selectedCarRate");

    if (selectedCarId && selectedCarRate) {
        $("#car_id").val(selectedCarId).change();
        $("#daily_rate").val(selectedCarRate);
        localStorage.removeItem("selectedCarId");
        localStorage.removeItem("selectedCarRate");
    }

    // Set the minimum date for pickup and return
    let today = new Date().toISOString().split("T")[0];
    $("#pickup_date, #return_date").attr("min", today);

    // Fetch cars from the API
    $.getJSON("../admin/api/get.php", function(data) {
        $("#car_id").html('<option value="">Select a Car</option>');
        data.data.forEach(car => {
            $("#car_id").append(`<option value="${car.car_id}" data-rate="${car.daily_rate}">${car.model} - Rs ${car.daily_rate}/day</option>`);
        });
    });

    // Update price when car is selected
    $("#car_id").change(function() {
        let rate = $(this).find(":selected").data("rate") || 0;
        $("#daily_rate").val(rate);
        calculateTotal();
    });

    // Validate pickup date (must be today or later)
    $("#pickup_date").change(function() {
        let pickupDate = new Date($(this).val());
        let todayDate = new Date(); // Reset todayDate for comparison

        if (pickupDate < todayDate.setHours(0, 0, 0, 0)) {
            alert("Please select a pickup date from today onward.");
            $(this).val(today);
        }
        calculateTotal();
    });

    // Validate return date (must be after pickup)
    $("#return_date").change(function() {
        let pickupDate = new Date($("#pickup_date").val());
        let returnDate = new Date($(this).val());

        if (returnDate <= pickupDate) {
            alert("Return date must be at least one day after the pickup date.");
            let nextDay = new Date(pickupDate);
            nextDay.setDate(pickupDate.getDate() + 1);
            $(this).val(nextDay.toISOString().split("T")[0]);
        }
        calculateTotal();
    });

    // Calculate total price
    function calculateTotal() {
        let pickupDate = new Date($("#pickup_date").val());
        let returnDate = new Date($("#return_date").val());
        let rate = parseFloat($("#daily_rate").val()) || 0;

        if (pickupDate && returnDate && pickupDate < returnDate) {
            let days = Math.ceil((returnDate - pickupDate) / (1000 * 60 * 60 * 24));
            $("#total_price").val(days * rate);
        } else {
            $("#total_price").val(0);
        }
    }

    // Handle form submission
    $("#booking-form").submit(function(e) {
        e.preventDefault();
        
        $.post("booking.php", $(this).serialize(), function(response) {
            if (response.status === "success") {
                $("#booking-form").hide();
                $("#confirmation-message").removeClass("hidden").fadeIn();
            } else {
                alert("Booking failed. Try again.");
            }
        }, "json");
    });
});

</script>

</body>
</html>
