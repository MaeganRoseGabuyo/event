<?php
include 'navbar.php';
include 'footer.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title><?= $title ?></title>
    <title>Settings Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .settings-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .settings-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .settings-section {
            margin-bottom: 30px;
        }

        .settings-section h3 {
            margin-bottom: 10px;
            color: #555;
        }

        .settings-section label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .settings-section input,
        .settings-section select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .settings-section input[type="checkbox"] {
            width: auto;
            margin-right: 10px;
        }

        .settings-buttons {
            text-align: center;
        }

        .settings-buttons button {
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin: 0 10px;
        }

        .save-button {
            background-color: #4caf50;
            color: #fff;
        }

        .save-button:hover {
            background-color: #45a049;
        }

        .cancel-button {
            background-color: #f44336;
            color: #fff;
        }

        .cancel-button:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="settings-container">
        <h2>Settings</h2>

        <!-- Account Settings Section -->
        <div class="settings-section">
            <h3>Account Settings</h3>
            <label for="username">Username</label>
            <input type="text" id="username" placeholder="Enter your username">

            <label for="email">Email</label>
            <input type="email" id="email" placeholder="Enter your email">
        </div>

        <!-- Preferences Section -->
        <div class="settings-section">
            <h3>Preferences</h3>
            <label for="language">Language</label>
            <select id="language">
                <option value="en">English</option>
                <option value="es">Spanish</option>
                <option value="fr">French</option>
                <option value="jp">Japanese</option>
            </select>

            <label for="theme">Theme</label>
            <select id="theme">
                <option value="light">Light</option>
                <option value="dark">Dark</option>
            </select>
        </div>

        <!-- Notification Settings Section -->
        <div class="settings-section">
            <h3>Notification Settings</h3>
            <label>
                <input type="checkbox" id="email-notifications">
                Receive email notifications
            </label>
            <label>
                <input type="checkbox" id="sms-notifications">
                Receive SMS notifications
            </label>
        </div>

        <!-- Buttons -->
        <div class="settings-buttons">
            <button class="save-button" type="submit">Save Changes</button>
            <button class="cancel-button" type="button"  onclick="window.location.href='dashboard.php'">Cancel</button>
        </div>
    </div>
</body>
</html>
