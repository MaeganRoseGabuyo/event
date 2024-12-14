<?php
session_start(); 

// Clear the session data
$_SESSION = [];
session_destroy();

// Clear the auth_token cookie (if set)
if (isset($_COOKIE['auth_token'])) {
    setcookie('auth_token', '', time() - 3600, '/', '', isset($_SERVER['HTTPS']), true);
}

// Clear token from the database for added security
include('database.php');
if (isset($_COOKIE['auth_token'])) {
    $cleanup_sql = 'UPDATE admin_accounts SET auth_token = NULL, token_expiry = NULL WHERE auth_token = :auth_token';
    $stmt = $pdo->prepare($cleanup_sql);
    $stmt->execute(['auth_token' => $_COOKIE['auth_token']]);
}

// Redirect to the index page
header("Location: index.php");
exit();
?>
