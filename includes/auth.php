<?php
session_start();
include '../includes/config.php';

function registerUser(\$username, \$password, \$email, \$role = 'user') {
    global \$pdo;
    \$hashedPassword = password_hash(\$password, PASSWORD_DEFAULT);
    \$stmt = \$pdo->prepare("INSERT INTO users (username, email, password_hash, role) VALUES (?, ?, ?, ?)");
    return \$stmt->execute([\$username, \$email, \$hashedPassword, \$role]);
}

function loginUser(\$username, \$password) {
    global \$pdo;
    \$stmt = \$pdo->prepare("SELECT * FROM users WHERE username = ?");
    \$stmt->execute([\$username]);
    \$user = \$stmt->fetch();
    
    if (\$user && password_verify(\$password, \$user['password_hash'])) {
        \$_SESSION['user_id'] = \$user['user_id'];
        \$_SESSION['username'] = \$user['username'];
        \$_SESSION['role'] = \$user['role'];
        
        return true;
    }
    return false;
}

function isLoggedIn() {
    return isset(\$_SESSION['user_id']);
}

function isAdmin() {
    return isset(\$_SESSION['role']) && \$_SESSION['role'] === 'admin';
}

function logoutUser() {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>
