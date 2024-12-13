<?php
include('database.php');

$query = "SELECT name, url, icon_class FROM navbar_items"; 
$stmt = $pdo->prepare($query);
$stmt->execute();

$navbarItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .navbar {
            width: 260px;
            background-color: #F4730B;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            padding: 20px 10px;
            position: fixed;
            top: 0;
            bottom: 0;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);
        }

        .navbar img {
            height: 150px; 
            width: 150px; 
            margin-right: 20px; 
            margin-left: 50px;
        }

        .navbar h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            font-weight: bold;
            text-transform: uppercase;
            text-align: center;
            letter-spacing: 2px;
        }

        .navbar a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 15px;
            color: black;
            font-size: 1rem;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .navbar a i {
            flex-shrink: 0;
            font-size: 1.5rem;
            vertical-align: middle;
            margin-top: 2px;
        }

        .navbar li {
            width: 100%;
            text-align: left;
        }

        .navbar ul {
            list-style: none;
            padding: 0;
            margin: 0;
            width: 100%;
        }

        .navbar a:hover {
            background: #e8e377;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
<div class="navbar">
    <div>
        <img src="images/ylogo.png">
    </div>
    <ul>
    <?php
    // Check if $navbarItems is not empty
    if (!empty($navbarItems)) {
        foreach ($navbarItems as $item) {
            echo "<li><a href='" . htmlspecialchars($item['url']) . "'><i class='" . htmlspecialchars($item['icon_class']) . "'></i> " . htmlspecialchars($item['name']) . "</a></li>";
        }
    } else {
        echo "<li>No navbar items available.</li>";
    }
    ?>
</ul>

</div>
</body>
</html>
