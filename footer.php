<?php
session_start();

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: index.php');
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        footer {
            background-color: #e69b00;
            color: #fff;
            padding: 2px;
            text-align: center;
            position: fixed;
            width: 100%;
            bottom: 0;
            z-index: 1000; /* Ensures it stays on top */
        }
    </style>
</head>
<body>
        <footer>
            <p>&copy; Bounty Coders <?= date("Y") ?>. All rights reserved.</p>
        </footer>

</body>
</html>