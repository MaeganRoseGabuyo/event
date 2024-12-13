<?php
include 'navbar.php';
include('database.php');
include 'footer.php';

// Get the event ID from the query string
$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: events.php');
    exit;
}

// Prepare a SELECT statement with a placeholder
$sql = 'SELECT * FROM events WHERE id = :id';
$stmt = $pdo->prepare($sql);
$params = ['id' => $id];
$stmt->execute($params);

// Fetch the event from the database
$event = $stmt->fetch();

if (!$event) {
    echo "<h1>Event not found</h1>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($event['event']) ?> - Event Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1ee8e;
            margin: 0;
            padding-bottom: 20px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            flex: 1;
            margin-left: 280px;
            flex-direction: column;
            padding: 20px;
            height: 100%;
            overflow: auto;
        }

        .main-title {
            text-align: center;
            font-size: 2.5rem;
            color: #e6b400;
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
            width: 100%; /* Ensures the image stretches to fit the container */
            height: auto; /* Maintains the image's aspect ratio */ /* Ensures the entire image is visible */
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .event-details h2 {
            font-size: 1.75rem;
            color: #e6b400;
            margin-bottom: 1rem;
        }

        .event-details p {
            font-size: 1rem;
            color: #4a5568;
            margin-bottom: 0.5rem;
        }

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 1rem;
            margin-bottom: 20px;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #0056b3;
        }

        .edit-button-container {
                margin-top: auto; /* Push the button to the bottom of the card */
                display: flex;
                justify-content: center;  /* Center the button horizontally */
                margin-bottom: 10px;  /* Add some space below the button */
        }
        .delete-button {
            display: inline-block;
            padding: 10px 20px;
            background-color:red;
            color: #fff;
            border: none;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 1rem;
            height: 39px;
            margin-bottom: 20px;
            transition: background-color 0.3s;
        }

        .my-button:hover {
            background-color: #9bbcff;
        }
        .delete-button:hover {
            background-color:rgb(255, 155, 155);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="main-title">Event Details</h1>
        <div class="event-details">
            <img src="<?= htmlspecialchars($event['grid_image']) ?>" alt="Event Image" onerror="this.onerror=null;this.src='placeholder.jpg';">
            <h2><?= htmlspecialchars($event['event']) ?></h2>

            <p><strong>Organizer:</strong> <?=!empty($event['org']) ? nl2br(htmlspecialchars($event['org'])): 'No Organization Assigned' ?></p>
            <p><strong>Date:</strong> <?= !empty($event['date']) ? date("F j, Y", strtotime($event['date'])) : 'No data assigned' ?></p>
            <p><strong>Time:</strong> 
                <?= !empty($event['start_time']) ? date("g:i A", strtotime($event['start_time'])) : '' ?> 
                <?= (!empty($event['start_time']) && !empty($event['end_time'])) ? ' - ' : '' ?>
                <?= !empty($event['end_time']) ? date("g:i A", strtotime($event['end_time'])) : '' ?>
            </p>
            <p><strong>Location:</strong> <?= !empty($event['loc']) ? htmlspecialchars($event['loc']): 'No location assigned' ?></p>
            <p><strong>Description:</strong></p>
            <p><?=!empty($event['desc']) ? nl2br(htmlspecialchars($event['desc'])): 'No description' ?></p>
        </div>
        <form action="delete.php" method="POST" >
        <a href="events.php" class="back-button">&larr; Back to Events</a>
        <a href="edit.php?id=<?= $event['id'] ?>" class="back-button">
            <i class="fas fa-edit"></i> Edit
        </a>
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="id" value="<?= $event['id']?>">
            <input class="delete-button" type="submit" name="submit" value="Delete">
        </form>
       
        
    </div>
</body>
</html>