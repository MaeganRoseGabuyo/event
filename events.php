<?php
session_start();


if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: index.php');
    exit();
}

include 'navbar.php';
include 'footer.php';
include('database.php');

// Get selected category from URL or default to "All"
$selectedCategory = isset($_GET['category']) ? $_GET['category'] : 'All';

// Prepare a SELECT statement with category filtering
if ($selectedCategory === 'All') {
    $stmt = $pdo->prepare('SELECT * FROM events');
} else {
    $stmt = $pdo->prepare('SELECT * FROM events WHERE categ = :category');
    $stmt->bindParam(':category', $selectedCategory);
}

// Execute the statement
$stmt->execute();

// Fetch the result
$events = $stmt->fetchAll();
// Your PHP variables remain unchanged
$title = 'Events';
$pageTitle5 = 'EVENTS '.date("Y");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f1ee8e;
            margin: 0;
            padding: 0;
            display: flex;
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
            font-size: 3rem;
            color: #e6b400;
            font-weight: 600;
            margin-top: 1rem;
        }

        .event-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
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
            display: flex;  /* Use Flexbox */
            flex-direction: column;  /* Stack items vertically */
         }

        .event-card a {
                text-decoration: none;
                color: #e6b400;
        }

        .event-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 10px rgba(0, 0, 0, 0.15);
        }

        .event-card img {
                width: 100%;
                height: 300px;
                object-fit: cover;
                border-radius: 8px;
                margin-bottom: 1rem;
         }

        .my-button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #3b82f6;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .my-button:hover {
            background-color: #9bbcff;
        }

        .button-container {
            display: flex;
            justify-content: space-between; /* Space between the two buttons */
            align-items: center;
            margin-top: 20px;
        }

        .category-form {
            margin: 0; /* Remove default margin for the form */
        }

        .my-button.dropdown {
            background-color:rgb(241, 135, 15); /* Style for the dropdown button */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .my-button.dropdown:hover {
            background-color:rgb(235, 193, 104);
        }

        @media(max-width: 800px){
            .container{
                margin-left: 0px;
            }
        }
        

    </style>
</head>
<body>
    <!-- Main Content -->
    <div class="container">
        <h1 class="main-title"><?= $pageTitle5 ?></h1>

        <div class="button-container">
    <!-- Add Event Button -->
            <a href="add.php">
                <button class="my-button">
                    <i class="fas fa-plus"></i> Add Event
                </button>
            </a>

            <!-- Category Filter Dropdown -->
            <form method="GET" class="category-form">
                <select name="category" onchange="this.form.submit()" class="my-button dropdown">
                    <option value="All" <?= $selectedCategory === 'All' ? 'selected' : '' ?>>All Categories</option>
                    <option value="Sports" <?= $selectedCategory === 'Sports' ? 'selected' : '' ?>>Sports</option>
                    <option value="Fitness" <?= $selectedCategory === 'Fitness' ? 'selected' : '' ?>>Fitness</option>
                    <option value="E-Sports" <?= $selectedCategory === 'E-Sports' ? 'selected' : '' ?>>E-Sports</option>
                </select>
            </form>
        </div>

        <div class="event-grid">
            <?php foreach($events as $event): ?>
                <div class="event-card">
                    <a href="fullevent.php?id=<?= $event['id'] ?>">
                        <h3><?= $event['event'] ?></h3>
                        <img src="<?= $event['grid_image'] ?>" alt="image">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
