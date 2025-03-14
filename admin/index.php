<?php
session_start();
include '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Fetch the admin from the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch();

    // Verify the password
    if ($admin && password_verify($password, $admin['password_hash'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['user_id'] = $admin['user_id'];
        $_SESSION['username'] = $admin['username'];
        $_SESSION['role'] = $admin['role'];

        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid credentials or insufficient privileges!";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Car Rental</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }
        body {
            background: url('dark-car-theme-ec18.png') no-repeat center center/cover;
            /* filter: blur(3px); */
            position: relative;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(18x);
            z-index: 1;
        }
        .container {
            position: relative;
            z-index: 2;
            background: rgba(26, 26, 26, 0.9);
            border-radius: 12px;
            padding: 40px;
            width: 400px;
            text-align: center;
            box-shadow: 0 0 20px rgba(0, 255, 0, 0.5);
            border: 2px solid #00ff00;
        }
        h1 {
            color: #00ff00;
            margin-bottom: 15px;
            font-size: 1.8rem;
        }
        p {
            color: #ccc;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        input {
            width: 100%;
            max-width: 280px;
            padding: 12px;
            margin: 10px 0;
            border-radius: 6px;
            border: 2px solid #00ff00;
            background: #222;
            color: #fff;
            font-size: 1rem;
            transition: 0.3s ease;
            outline: none;
        }
        input:focus {
            border-color: #00cc00;
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.6);
        }
        input::placeholder {
            color: #aaa;
        }
        .login-button {
            width: 100%;
            max-width: 280px;
            padding: 12px;
            margin-top: 15px;
            background: #00ff00;
            color: #000;
            font-size: 1.2rem;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }
        .login-button:hover {
            background: #009900;
            box-shadow: 0 0 15px rgba(0, 255, 0, 0.6);
        }
        .links {
            margin-top: 15px;
        }
        a {
            color: #00ff00;
            text-decoration: none;
            font-size: 0.9rem;
            margin: 0 5px;
        }
        a:hover {
            text-decoration: underline;
        }
        .error-message {
            color: red;
            margin-top: 10px;
        }
        @media (max-width: 768px) {
            .container {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Login</h1>
        <p>Access your account and manage the rental system</p>
        <?php if (!empty($error)): ?>
            <p class="error-message"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <input name="username" type="text" placeholder="Enter Username" required>
            <input name="password" type="password" placeholder="Enter Password" required>
            <button class="login-button" type="submit">LOGIN</button>
        </form>
        <div class="links">
            <a href="#">Forgot Password?</a> | <a href="signup.php">Create an account</a>
        </div>
    </div>
</body>
</html>
