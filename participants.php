<?php
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
        /* General body styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #ebf8ff; 
            margin: 0;
            height: 100vh;
            display: flex;
        }

        /* Creative navigation bar */
        .navbar {
            width: 260px;
            background-color: #cfddf9;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            padding: 20px 10px;
            position: fixed;
            top: 0;
            bottom: 0;
            box-shadow: 3px 0 6px rgba(0, 0, 0, 0.1);
        }

        .navbar img {

height: 140px; /* Adjust this value based on your logo's size */
width: 140px; /* Maintain aspect ratio */
margin-right: 20px; /* Space between logo and navigation links */
margin-left: 60px;
}

        .navbar h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            font-weight: bold;
            text-transform: uppercase;
            text-align: center;
            letter-spacing: 2px;
        }

        .navbar ul {
            list-style: none;
            padding: 0;
            margin: 0;
            width: 100%;
        }

        .navbar li {
            margin: 15px 0;
            text-align: center;
        }

        .navbar a {
            display: flex;
            margin-left: 20px;
            padding: 10px;
            color: black;
            font-size: 1rem;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .navbar a:hover {
            background: #9bbcff;
            transform: scale(1.05);
        }

        .navbar a i {
            margin-right: 10px;
            font-size: 1.2rem;
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
            color: #1e3a8a;
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

        /* Footer styling */
        footer {
            background-color: #3b82f6; /* Matches Tailwind's bg-blue-500 */
            color: #ffffff;
            text-align: center;
            padding: 2px;
            position: fixed;
            bottom: 0;
            left: 280px; /* Align with container */
            width: calc(100% - 280px);
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <!-- Add font-awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- Creative Navigation Bar -->
    <div class="navbar">
        <div>
            <img src="logo.png">
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
                <img src="participant1.jpg" alt="John Doe">
            </div>
            <div class="participant-card">
                <h3><?= $participant2 ?></h3>
                <img src="participant2.jpg" alt="Jane Smith">
            </div>
            <div class="participant-card">
                <h3><?= $participant3 ?></h3>
                <img src="participant3.jpg" alt="Sam Wilson">
            </div>
            <div class="participant-card">
                <h3><?= $participant4 ?></h3>
                <img src="participant4.jpg" alt="Emily Johnson">
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; Bounty Coders 2024. All rights reserved.</p>
    </footer>
</body>
</html>
