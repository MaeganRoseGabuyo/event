<?php
// Your PHP variables remain unchanged
$title = 'Events';

$title1 = '<strong>The Soccer Showdown</strong>';
$title2 = '<strong>Race to Victory</strong>';
$title3 = '<strong>Esports Clash </strong>';

$pageTitle5 = 'EVENTS 2024';
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

    /* Main event title */
    .main-title {
        text-align: center;
        font-size: 3rem; /* Equivalent to text-6xl */
        color: #1e3a8a;
        font-weight: 600;
        margin-top: 1rem;
    }

    /* Event card grid */
    .event-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1rem;
        margin-top: 2rem;
    }

    /* Event card styling */
    .event-card {
        background-color: #ffffff; /* White background */
        padding: 12px;
        border-radius: 0.5rem; /* Rounded corners */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        transition: transform 0.3s, box-shadow 0.3s;
        text-align: center;
    }

    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 10px rgba(0, 0, 0, 0.15); /* Elevated shadow on hover */
    }

    /* Event card images */
    .event-card img {
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

    .my-button {
    padding: 10px 20px;
    font-size: 16px;
    background-color:#3b82f6;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.my-button:hover {
    background-color: #9bbcff;
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
            <img src="images/logo.png">
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
        <h1 class="main-title"><?= $pageTitle5 ?></h1>

        <a href="add.php">
    <button class="my-button">
        <i class="fas fa-plus"></i> Add Event
    </button>
</a>


        <div class="event-grid">
            <div class="event-card">
                <a href="fullevent.php">
                    <h3><?= $title1 ?></h3>
                    <img src="images/soccer.jpg" alt="Soccer">
                </a>
            </div>
            <div class="event-card">
                <a href="">
                    <h3><?= $title2 ?></h3>
                    <img src="images/marathon.jpg" alt="Marathon">
                </a>
            </div>
            <div class="event-card">
                <a href="">
                    <h3><?= $title3 ?></h3>
                    <img src="images/esports.jpg" alt="Esports">
                </a>
            </div>

            <div class="event-card">
                <a href="fullevent.php">
                    <h3><?= $title1 ?></h3>
                    <img src="images/soccer.jpg" alt="Soccer">
                </a>
            </div>
            <div class="event-card">
                <a href="">
                    <h3><?= $title2 ?></h3>
                    <img src="images/marathon.jpg" alt="Marathon">
                </a>
            </div>
            <div class="event-card">
                <a href="">
                    <h3><?= $title3 ?></h3>
                    <img src="images/esports.jpg" alt="Esports">
                </a>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; Bounty Coders 2024. All rights reserved.</p>
    </footer>
</body>
</html>
