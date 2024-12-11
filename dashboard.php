<?php
// Dashboard page PHP setup
$title = 'Dashboard';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title><?= $title ?></title>
   
    <style>
        /* Dashboard specific styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc; /* Light grayish blue */
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* Main container for dashboard */
        .container {
            display: flex;
            flex: 1;
            margin-left: 280px; /* Space for sidebar */
            flex-direction: column;
            padding: 20px;
            height: 100%;
            overflow: auto;
        }

        /* Sidebar navigation */
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

        .sidebar .logo {
            text-align: center;
            font-size: 1.5rem;
            margin-bottom: 40px;
            color: #fff;
        }

        .sidebar ul {
            padding: 0;
            list-style-type: none;
        }

        .sidebar ul li {
            margin-bottom: 20px;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #fff;
            font-size: 1.1rem;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            transition: 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #3b82f6;
        }

        .sidebar ul li a i {
            margin-right: 15px;
        }

        /* Main content styling */
        .main-content {
            display: flex;
            flex-direction: column;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        /* Stats Section */
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .stats .stat-card {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .stats .stat-card h2 {
            font-size: 2rem;
            color: #1e3a8a;
        }

        .stats .stat-card p {
            font-size: 1.2rem;
            color: #666;
        }

        /* Activity Feed */
        .activity-feed {
            margin-top: 30px;
        }

        .activity-feed h3 {
            margin-bottom: 10px;
            font-size: 1.5rem;
            color: #333;
        }

        .activity-feed .activity-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin-bottom: 15px;
        }

        .activity-feed .activity-card p {
            font-size: 1.1rem;
            color: #555;
        }

        footer {
            background-color: #3b82f6;
            color: #fff;
            padding: 2px;
            text-align: center;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>

<body>
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

    <div class="container">
        <!-- Welcome message -->
        <h1>Welcome to your BCEMS Dashboard!</h1>

        <!-- Stats section -->
        <div class="stats">
            <div class="stat-card">
                <h2>20</h2>
                <p>Total Events</p>
            </div>
            <div class="stat-card">
                <h2>150</h2>
                <p>Total Participants</p>
            </div>
            <div class="stat-card">
                <h2>5</h2>
                <p>Upcoming Events</p>
            </div>
            <div class="stat-card">
                <h2>12</h2>
                <p>Events Pending Approval</p>
            </div>
        </div>

        <!-- Recent Activity Feed -->
        <div class="activity-feed">
            <h3>Recent Activities</h3>
            <div class="activity-card">
                <p><strong>Event Added:</strong> "The Soccer Showdown" added to the event list.</p>
            </div>
            <div class="activity-card">
                <p><strong>New Participant:</strong> John Doe joined "The Soccer Showdown" event.</p>
            </div>
            <div class="activity-card">
                <p><strong>Event Updated:</strong> "Race to Victory" details updated by Admin.</p>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; EventManager 2024. All rights reserved.</p>
    </footer>
</body>
</html>
