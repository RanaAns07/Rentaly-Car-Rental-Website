<?php
session_start();
include '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Check if username or email already exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$username, $email]);
    
    if ($stmt->rowCount() > 0) {
        $_SESSION['error'] = "Username or Email already exists!";
        header("Location: signup.php");
        exit();
    }

    // Hash the password securely
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insert new user
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
    if ($stmt->execute([$username, $email, $hashedPassword])) {
        $_SESSION['success'] = "Account created successfully! Please log in.";
        header("Location: signup.php");
        exit();
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again.";
        header("Location: signup.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('car-lamborghini-dark-wallpaper-p.png') no-repeat center center/cover;
            backdrop-filter: blur(10px);
            font-family: Arial, sans-serif;
            color: #e0e0e0;
            position: relative;
        }
        
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
            z-index: -1;
        }
        
        .container {
            background: rgba(30, 30, 30, 0.9);
            border-radius: 15px;
            padding: 50px;
            width: 400px;
            box-shadow: 0 0 25px rgba(255, 255, 255, 0.15);
            text-align: center;
        }
        h2 {
            color: #bb86fc;
            font-size: 24px;
            margin-bottom: 20px;
        }
        input {
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            border: none;
            border-radius: 8px;
            background: #2c2c2c;
            color: #e0e0e0;
            font-size: 16px;
            outline: none;
            transition: 0.3s;
        }
        input:focus {
            background: #3a3a3a;
            box-shadow: 0 0 5px rgba(187, 134, 252, 0.5);
        }
        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(45deg, #bb86fc, #9a67ea);
            border: none;
            color: white;
            font-size: 18px;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: linear-gradient(45deg, #9a67ea, #7a52c7);
            box-shadow: 0 0 10px rgba(187, 134, 252, 0.5);
        }
        .login-link {
            margin-top: 15px;
            color: #bb86fc;
            font-size: 14px;
        }
        .login-link a {
            color: #bb86fc;
            text-decoration: none;
            font-weight: bold;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
        }
        .error {
            background-color: #ff4d4d;
            color: white;
        }
        .success {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create Account</h2>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Create Account</button>
        </form>
        <p class="login-link">Already have an account? <a href="index.php">Log in</a></p>
    </div>
</body>
</html>
