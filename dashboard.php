<?php
// Dashboard page PHP setup
$title = 'Dashboard';
include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title><?= $title ?></title>
   
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #ffeaef;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }


        .container {
            display: flex;
            flex: 1;
            margin-left: 280px; 
            flex-direction: column;
            padding: 20px;
            height: 100%;
            overflow: auto;
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
            color: #79001b;
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
            background-color: #39000c;
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
