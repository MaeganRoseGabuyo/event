<?php
include 'navbar.php';
include 'footer.php';
?>


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
            background-color:  #f1ee8e;
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
    /* Page container */
    .container {
        margin-left: 450px; /* Space for the navigation bar */
        padding: 16px;
        flex: 1;
    }

    </style>
</head>
<body>
    <!-- Main Content -->
    <div class="container">
        <h1 class="main-title">Profile</h1>

        <!-- Profile Card (UI only, no database) -->
        <div class="profile-card">
            <img src="images/user.jpg" alt="User's Profile Picture" class="profile-img">
            <h2>Paul Garren Santiago</h2>
            <p>Email: falllyyy@example.com</p>
            <p>Phone: +123456789</p>
            <p><i><strong>Bio: Passionate about coding and event management.
            Always looking for opportunities to improve my skills and collaborate with others.</strong></i></p>

            <!-- Edit Profile Button -->
            <a href="editprofile.php" class="edit-profile-btn">Edit Profile</a>
        </div>
    </div>

</body>
</html>
