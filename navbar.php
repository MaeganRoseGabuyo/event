<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Navbar</title>
    <style>

        .navbar {
        width: 260px;
        background-color: #7a001b;
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
        background: #fc0038;
        transform: scale(1.05);
    }

    .navbar a i {
        margin-right: 10px;
        font-size: 1.2rem;
    }

        .sidebar .logo {
            text-align: center;
            font-size: 1.5rem;
            margin-bottom: 40px;
            color: #fff;
        }

        .sidebar ul {
            padding: 0;
            list-style-type: none;
        }

        .sidebar ul li {
            margin-bottom: 20px;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #fff;
            font-size: 1.1rem;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            transition: 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #3b82f6;
        }

        .sidebar ul li a i {
            margin-right: 15px;
        }
    </style>
</head>
<body>

<div class="navbar">
        <div>
            <img src="images/redlogo.png">
        </div>
        <ul>
            <li><a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="events.php"><i class="fas fa-calendar"></i> Events</a></li>
            <li><a href="participants.php"><i class="fas fa-users"></i> Participants</a></li>
            <li><a href="profile.php"><i class="fas fa-user"></i> Profile</a></li>
            <li><a href="settings.php"><i class="fas fa-cogs"></i> Settings</a></li>
        </ul>
    </div>
    
</body>
</html>