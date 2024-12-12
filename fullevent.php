<?php
include('database.php');

//get_id from query string
$id = $_GET['id'] ?? null;

if (!$id){
    header('Location: events.php');
    exit;
}

//Select statement with placeholder 
$sql ='SELECT * FROM events WHERE id = :id';

//prepare the SELECT statement
$stmt = $pdo->prepare($sql);

//Parameters for prepared statement
$params = ['id' =>$id];

//execute the statement
$stmt->execute($params);

//fetch the post from the database
$event = $stmt->fetch();

/* var_dump($event); */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $eventTitle ?> - Event Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ebf8ff; /* Matches bg-blue-100 */
            margin: 0;
            padding-bottom: 20px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 16px;
        }

        .main-title {
            text-align: center;
            font-size: 2.5rem;
            color: #1e3a8a; /* text-blue-900 */
            font-weight: 600;
            margin: 2rem 0;
        }

        .event-details {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 16px;
            margin-bottom: 2rem;
        }

        .event-details img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .event-details h2 {
            font-size: 1.75rem;
            color: #1e3a8a;
            margin-bottom: 1rem;
        }

        .event-details p {
            font-size: 1rem;
            color: #4a5568; /* text-gray-700 */
            margin-bottom: 0.5rem;
        }

        footer {
            background-color: #3b82f6;
            color: #ffffff;
            text-align: center;
            padding: 2px;
            margin-top: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="main-title">Event Details</h1>
        <div class="event-details">
            <img src="<?=$event['grid_image']?>" alt="image">
            <h2><?=$event['event']?></h2>

            <p><strong>Organizer:</strong> <?=$event['org']?></p>
            <p><strong>Date:</strong> <?= !empty($event['date']) ? date("F j, Y", strtotime($event['date'])) : '' ?></p>
            <p><strong>Time:</strong> 
                <?= !empty($event['start_time']) ? date("g:i A", strtotime($event['start_time'])) : '' ?> 
                <?= (!empty($event['start_time']) && !empty($event['end_time'])) ? ' - ' : '' ?>
                <?= !empty($event['end_time']) ? date("g:i A", strtotime($event['end_time'])) : '' ?>
            </p>
            <p><strong>Location:</strong> <?=$event['loc']?></p>

            <p><strong>Description:</strong></p>
            <p><?=$event['desc']?></p>
        </div>
        <a href="events.php" style="text-decoration: none; color: #3b82f6;">&larr; Back to Events</a>
    </div>

    <footer>
        <p>&copy; Bounty Coders 2024. All rights reserved.</p>
    </footer>
</body>
</html>
