<?php

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
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f1ee8e;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column; /* Stack content vertically */
            min-height: 10vh; /* Ensure the body fills the viewport */
        }

        .container {
            flex: 1; /* Allow the container to take remaining space */
            justify-items: center;
            padding: 50px; /* Reduced padding for closer top alignment */
            margin-bottom: 20px;
            margin-top: 0;
        }

        .main-title {
            text-align: center;
            font-size: 3rem;
            color: #e6b400;
            font-weight: 600;
            margin-top: 0;
        }

        .event-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 1rem;
            margin-top: 2rem;
        }

        .event-card {
            background-color: #ffffff;
            padding: 12px;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
        }

        .event-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 10px rgba(0, 0, 0, 0.15);
        }

        .event-card img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 0.5rem;
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
    
    
        <!-- Category Filter Dropdown -->
        <form method="GET" class="category-form">
                <select name="category" onchange="this.form.submit()" class="my-button dropdown">
                    <option value="All" <?= $selectedCategory === 'All' ? 'selected' : '' ?>>All Categories</option>
                    <option value="Sports" <?= $selectedCategory === 'Sports' ? 'selected' : '' ?>>Sports</option>
                    <option value="Fitness" <?= $selectedCategory === 'Fitness' ? 'selected' : '' ?>>Fitness</option>
                    <option value="E-Sports" <?= $selectedCategory === 'E-Sports' ? 'selected' : '' ?>>E-Sports</option>
                </select>
            </form>
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
