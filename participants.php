<?php
include 'navbar.php';
include 'footer.php';

// Your PHP variables for the participant page
$title = 'Participants';

$pageTitle = 'Event Participants';

$participant1 = '<strong>John Doe</strong>';
$participant2 = '<strong>Jane Smith</strong>';
$participant3 = '<strong>Sam Wilson</strong>';
$participant4 = '<strong>Emily Johnson</strong>';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>

body {
            font-family: 'Arial', sans-serif;
            background-color: #f1ee8e;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }
        /* Page container */
        .container {
            margin-left: 280px; /* Space for the navigation bar */
            padding: 16px;
            flex: 1;
        }

        /* Main participant title */
        .main-title {
            text-align: center;
            font-size: 3rem; /* Equivalent to text-6xl */
            color: #e6b400;
            font-weight: 600;
            margin-top: 1rem;
        }

        /* Participant card grid */
        .participant-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1rem;
            margin-top: 2rem;
        }

        /* Participant card styling */
        .participant-card {
            background-color: #ffffff; /* White background */
            padding: 12px;
            border-radius: 0.5rem; /* Rounded corners */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
        }

        .participant-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 10px rgba(0, 0, 0, 0.15); /* Elevated shadow on hover */
        }

        /* Participant card images */
        .participant-card img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 0.5rem;
        }

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <!-- Add font-awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
<div class="navbar">
        <div>
            <img src="images/ylogo.png">
        </div>
        <ul>
            <li><a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="events.php"><i class="fas fa-calendar"></i> Events</a></li>
            <li><a href="participants.php"><i class="fas fa-users"></i> Participants</a></li>
            <li><a href="profile.php"><i class="fas fa-user"></i> Profile</a></li>
            <li><a href="settings.php"><i class="fas fa-cogs"></i> Settings</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="container">
        <h1 class="main-title"><?= $pageTitle ?></h1>

        <div class="participant-grid">
            <div class="participant-card">
                <h3><?= $participant1 ?></h3>
                <img src="images/participant1.jpg" alt="John Doe">
            </div>
            <div class="participant-card">
                <h3><?= $participant2 ?></h3>
                <img src="images/participant2.jpg" alt="Jane Smith">
            </div>
            <div class="participant-card">
                <h3><?= $participant3 ?></h3>
                <img src="images/participant3.jpg" alt="Sam Wilson">
            </div>
            <div class="participant-card">
                <h3><?= $participant4 ?></h3>
                <img src="images/participant4.jpg" alt="Emily Johnson">
            </div>
        </div>
    </div>
</body>
</html>
