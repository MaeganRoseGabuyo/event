<?php
session_start();

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: index.php');
    exit();
}

// Dashboard page PHP setup
include('database.php');
include 'navbar.php';
include 'footer.php';


// Check if the user is logged in




// Prepare a SELECT statement for events
$stmt = $pdo->prepare('SELECT * FROM events');
$stmt->execute();
$events = $stmt->fetchAll();

// Query for recent activities
$activityStmt = $pdo->prepare('SELECT action_type, action_details, created_at FROM recent_activities ORDER BY created_at DESC LIMIT 8');
$activityStmt->execute();
$recentActivities = $activityStmt->fetchAll();

// Optional: Delete older activities beyond the latest 100
$deleteStmt = $pdo->prepare('DELETE FROM recent_activities WHERE id NOT IN (
    SELECT id FROM (
        SELECT id FROM recent_activities ORDER BY created_at DESC LIMIT 100
    ) as temp
)');
$deleteStmt->execute();

// Query for trending category
$trendingCategoryStmt = $pdo->prepare('SELECT categ, COUNT(*) AS count FROM events GROUP BY categ ORDER BY count DESC LIMIT 1');
$trendingCategoryStmt->execute();
$trendingCategory = $trendingCategoryStmt->fetch();

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
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f1ee8e;
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

        .main-content {
            display: flex;
            flex-direction: column;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

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
            color: #e6b400;
        }

        .stats .stat-card p {
            font-size: 1.2rem;
            color: #666;
        }

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
            background-color: #e69b00;
            color: #fff;
            padding: 2px;
            text-align: center;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        @media(max-width: 800px){
            .container{
                margin-left: 0px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <center>
            <h1>Welcome to your BCEMS Dashboard!</h1>
        </center>
        <div class="stats">
            <div class="stat-card">
                <h2><?php
                        $dash_totalEvents_query = "SELECT * FROM events";
                        $dash_totalEvents_query_run = mysqli_query($con, $dash_totalEvents_query);
                        if($totalEvents = mysqli_num_rows($dash_totalEvents_query_run)) {
                            echo $totalEvents;
                        } else {
                            echo '<p>No data<p/>';
                        }  
                        ?></td></h2>
                <p>Total Events</p>
            </div>

            <div class="stat-card">
                <h2><?= htmlspecialchars($trendingCategory['categ'] ?? 'N/A') ?></h2>
                <p>Trending Category<br>with <?= htmlspecialchars($trendingCategory['count'] ?? 0) ?> events booked</p>
            </div>

            <div class="stat-card">
                <h2><?php $upcomming_events = "SELECT * FROM events WHERE date >= CURDATE() ORDER BY date ASC"; 
                $upcomming_events_run = mysqli_query($con, $upcomming_events);
                if($total_upcomming_events = mysqli_num_rows($upcomming_events_run)) {
                    echo $total_upcomming_events;
                } else {
                    echo '<p>No data<p/>';
                }  ?></h2>
                <p>Upcoming Events</p>
            </div>

            <div class="stat-card">
                <h2><?php $past_events = "SELECT * FROM events WHERE date < CURDATE() ORDER BY date ASC"; 
                $past_events_run = mysqli_query($con, $past_events);
                if($total_past_events = mysqli_num_rows($past_events_run)) {
                    echo $total_past_events;
                } else {
                    echo '<p>No data<p/>';
                }  ?></h2>
                <p>Past events</p>
            </div>
        </div>

        <div class="activity-feed">
            <h3>Recent Activities</h3>
            <?php foreach ($recentActivities as $activity): ?>
                <div class="activity-card">
                    <strong><?= htmlspecialchars($activity['action_type']) ?>:</strong>
                    <?= htmlspecialchars($activity['action_details']) ?>
                    <small>(<?= date('F j, Y, g:i a', strtotime($activity['created_at'])) ?>)</small>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
