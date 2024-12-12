<?php
include('database.php');

//Prepare a SELECT statement
$stmt = $pdo->prepare(query: 'SELECT * FROM events');

//Execute the statement
$stmt->execute();

//Fetch the result
$events = $stmt->fetchAll();

/*  var_dump($events); */

// Your PHP variables remain unchanged
$title = 'Events';

$title1 = '<strong>The Soccer Showdown</strong>';
$title2 = '<strong>Race to Victory</strong>';
$title3 = '<strong>Esports Clash </strong>';

$pageTitle5 = 'EVENTS 2024';
include 'navbar.php';
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

    /* Main event title */
    .main-title {
        text-align: center;
        font-size: 3rem; /* Equivalent to text-6xl */
        color: #e6b400;
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
    .event-card a{
        text-decoration: none;
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
            background-color: #e69b00;
            color: #fff;
            padding: 2px;
            text-align: center;
            position: fixed;
            width: 100%;
            bottom: 0;
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
        <h1 class="main-title"><?= $pageTitle5 ?></h1>

        <a href="add.php">
    <button class="my-button">
        <i class="fas fa-plus"></i> Add Event
    </button>
</a>


        <div class="event-grid">
            <?php foreach($events as $event):?>
                <div class="event-card">
                    <a href="fullevent.php?id=<?=$event['id']?>">
                        <h3><?=$event['event']?></h3>
                        <img src="<?=$event['grid_image']?>" alt="Soccer">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <footer>
        <p>&copy; Bounty Coders 2024. All rights reserved.</p>
    </footer>
</body>
</html>
