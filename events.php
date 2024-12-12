<?php
// Your PHP variables remain unchanged
$title = 'Events';

$title1 = '<strong>The Soccer Showdown</strong>';
$title2 = '<strong>Race to Victory</strong>';
$title3 = '<strong>Esports Clash </strong>';

$pageTitle5 = 'EVENTS 2024';


include 'footer.php';

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
    min-height: 100vh; /* Ensure the body fills the viewport */
}

.container {
    flex: 1; /* Allow the container to take remaining space */
    justify-items: center;
    padding: 50px; /* Reduced padding for closer top alignment */
    margin-bottom: 30px;
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
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <!-- Add font-awesome for icons -->
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>


  <!-- Main Content -->
  <div class="container">
        <h1 class="main-title"><?= $pageTitle5 ?></h1>
<body>


        <div class="event-grid">
            <div class="event-card">
                <a href="fullevent.php">
                    <h3><?= $title1 ?></h3>
                    <img src="images/soccer.jpg" alt="Soccer">
                </a>
            </div>
            <div class="event-card">
                <a href="">
                    <h3><?= $title2 ?></h3>
                    <img src="images/marathon.jpg" alt="Marathon">
                </a>
            </div>
            <div class="event-card">
                <a href="">
                    <h3><?= $title3 ?></h3>
                    <img src="images/esports.jpg" alt="Esports">
                </a>
            </div>

            <div class="event-card">
                <a href="fullevent.php">
                    <h3><?= $title1 ?></h3>
                    <img src="images/soccer.jpg" alt="Soccer">
                </a>
            </div>
            <div class="event-card">
                <a href="">
                    <h3><?= $title2 ?></h3>
                    <img src="images/marathon.jpg" alt="Marathon">
                </a>
            </div>
            <div class="event-card">
                <a href="">
                    <h3><?= $title3 ?></h3>
                    <img src="images/esports.jpg" alt="Esports">
                </a>
            </div>
        </div>
    </div>


</body>
</html>
