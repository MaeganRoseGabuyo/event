<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General Styles */
        body {
            justify-content: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ebf8ff;
        }

       
        /* Main Container */
        .container {
 
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .main-title {
            text-align: center;
            font-size: 28px;
            margin-bottom: 20px;
            color: #333;
        }

        
        /* Profile Card */
        .profile-card {
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
            width: 80%;
        }

        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 5px;
        }

        .profile-card h2 {
            margin-top: 5px;
            font-size: 22px;
            color: #333;
        }

        .profile-card p {
            font-size: 16px;
            color: #555;
        }

        /* Edit Profile Button */
        .edit-profile-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .edit-profile-btn:hover {
            background-color: #0056b3;
        }

        
    /* Creative navigation bar */
    .navbar {
        width: 260px;
        background-color: #cfddf9;
        color: #ffffff;
        display: flex;
        flex-direction: column;
        padding: 20px 10px;
        position: fixed;
        top: 0;
        bottom: 0;
        box-shadow: 3px 0 6px rgba(0, 0, 0, 0.1);
    }
    .navbar img {

    height: 140px; /* Adjust this value based on your logo's size */
    width: 140px; /* Maintain aspect ratio */
    margin-right: 20px; /* Space between logo and navigation links */
    margin-left: 60px;
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
        background: #9bbcff;
        transform: scale(1.05);
    }

    .navbar a i {
        margin-right: 10px;
        font-size: 1.2rem;
    }

    /* Page container */
    .container {
        margin-left: 450px; /* Space for the navigation bar */
        padding: 16px;
        flex: 1;
    }
        /* Footer */
        footer {
        background-color: #3b82f6; /* Matches Tailwind's bg-blue-500 */
        color: #ffffff;
        text-align: center;
        padding: 2px;
        position: fixed;
        bottom: 0;
        left: 280px; /* Align with container */
        width: calc(100% - 280px);
    }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <div class="navbar">
        <div>
            <img src="logo.png">
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
        <h1 class="main-title">Profile</h1>

        <!-- Profile Card (UI only, no database) -->
        <div class="profile-card">
            <img src="user.jpg" alt="User's Profile Picture" class="profile-img">
            <h2>Paul Garren Santiago</h2>
            <p>Email: falllyyy@example.com</p>
            <p>Phone: +123456789</p>
            <p>Bio: Passionate about coding and event management. Always looking for opportunities to improve my skills and collaborate with others.</p>

            <!-- Edit Profile Button -->
            <a href="edit_profile.php" class="edit-profile-btn">Edit Profile</a>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; Bounty Coders 2024. All rights reserved.</p>
    </footer>
</body>
</html>
