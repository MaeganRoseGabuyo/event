<?php
// Your PHP variables for the participant page
$title = 'Participants';

$pageTitle = 'Event Participants';

$participant1 = '<strong>John Doe</strong>';
$participant2 = '<strong>Jane Smith</strong>';
$participant3 = '<strong>Sam Wilson</strong>';
$participant4 = '<strong>Emily Johnson</strong>';
include 'navbar.php';
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

    <footer>
        <p>&copy; Bounty Coders 2024. All rights reserved.</p>
    </footer>
</body>
</html>
