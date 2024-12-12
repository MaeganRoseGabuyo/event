<?php
include 'navbar.php';
include 'footer.php';
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
        min-height: 100vh;
        }
    /* Page container */
    .container {
            flex: 1;
            margin-left: 280px; 
            flex-direction: column;
            padding: 20px;
            height: 100%;
            overflow: auto;
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
        margin-bottom: 50px;

    }
    .event-card {
        background-color: #ffffff;
        padding: 12px;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        text-align: center;
    }
    .event-card a{
        text-decoration: none;
        color: #e6b400;
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
</body>
</html>
