<?php
session_start();


if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: index.php');
    exit();
}

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
        background: #e8e377;
        transform: scale(1.05);
    }

    .navbar a i {
        margin-right: 10px;
        font-size: 1.2rem;
    }

    .sidebar {
        width: 260px;
        background-color: #F4730B;
        color: #ffffff;
        display: none;
        flex-direction: column;
        padding: 20px 10px;
        position: fixed;
        top: 0;
        bottom: 0;
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);
        z-index: 999;
    }
    .sidebar img {
        height: 150px; 
        width: 150px; 
        margin-right: 20px; 
        margin-left: 50px;
    }

    .sidebar h2 {
        font-size: 1.8rem;
        margin-bottom: 20px;
        font-weight: bold;
        text-transform: uppercase;
        text-align: center;
        letter-spacing: 2px;
    }
    .sidebar ul {
        list-style: none;
        padding: 0;
        margin: 0;
        width: 100%;
    }
    .sidebar li {
        margin: 15px 0;
        text-align: center;
    }

    .sidebar a {
        display: flex;
        margin-left: 20px;
        padding: 10px;
        color: black;
        font-size: 1rem;
        text-decoration: none;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .sidebar a:hover {
        background: #e8e377;
        transform: scale(1.05);
    }

    .sidebar a i {
        margin-right: 10px;
        font-size: 1.2rem;
    }
    @media(max-width: 800px){
        .navbar{
            display: none;
        }
    }
    @media(max-width: 400px){
        .sidebar{
            width: 100%;
        }
    }
    .sidebar-button{
        height: 50px;
        width: 50px;
        background-color: #e8e377;
        border-top-right-radius: 50px;
        border-bottom-right-radius: 50px;
        margin: auto;
        bottom: 50%;
        position: fixed;
    }
    .back-sidebar-button{
        margin-left: 1px;
    }

    </style>
    </style>
</head>
<body>
    <div onclick=showSidebar() class="sidebar-button">
        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#000000"><path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/></svg></a>
    </div>
    <div class="navbar">
        <div>
            <img src="images/ylogo.png">
        </div>
        <ul>
            <?php
            foreach ($navbarItems as $item) {
                echo "<li><a href='" . htmlspecialchars($item['url']) . "'><i class='" . htmlspecialchars($item['icon_class']) . "'></i> " . htmlspecialchars($item['name']) . "</a></li>";
            }
            ?>
        </ul>
    </div>

    <div class="sidebar">
        <div onclick=hideSidebar() class="back-sidebar-button">
            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="46px" viewBox="0 -960 960 960" width="46px" fill=#000000"><path d="M560-240 320-480l240-240 56 56-184 184 184 184-56 56Z"/></svg></svg></a>
        </div>
        <div>
            <img src="images/ylogo.png">
        </div>
        <ul>
            <?php
            foreach ($navbarItems as $item) {
                echo "<li><a href='" . htmlspecialchars($item['url']) . "'><i class='" . htmlspecialchars($item['icon_class']) . "'></i> " . htmlspecialchars($item['name']) . "</a></li>";
            }
            ?>
        </ul>
    </div>
    <script>
        function showSidebar(){
            const sidebar = document.querySelector('.sidebar')
            sidebar.style.display = 'flex'
        }
        function hideSidebar(){
            const sidebar = document.querySelector('.sidebar')
            sidebar.style.display = 'none'
        }
    </script>
</body>
</html>
