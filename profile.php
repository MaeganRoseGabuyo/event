<?php
session_start();

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: index.php');
    exit();
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'navbar.php';
include 'footer.php';
include 'database.php';

if (!isset($_SESSION['account_id'])) {
    // Redirect to login page if not logged in
    header('Location: login.php');
    exit();
}

// Get the logged-in user's ID from the session
$account_id = $_SESSION['account_id'];

// Prepare the SQL query to fetch data for the logged-in user
$sql = 'SELECT * FROM admin_accounts WHERE account_id = :account_id'; // Adjust table name as needed
$stmt = $pdo->prepare($sql);
$stmt->execute(['account_id' => $account_id]);

// Fetch the results
$user_data = $stmt->fetch(PDO::FETCH_ASSOC);
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
            background-color: #e47200;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .edit-profile-btn:hover {
            background-color: #e6b400;
        }
    /* Page container */
    .container {
        margin-left: 450px; /* Space for the navigation bar */
        padding: 16px;
        flex: 1;
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
        <h1 class="main-title">Profile</h1>

        <!-- Profile Card (UI only, no database) -->
        <div class="profile-card">
            <img src="images/user.jpg" alt="User's Profile Picture" class="profile-img">
            <h2><?php echo htmlspecialchars($user_data['name']); ?></h2>
            <p>Email: <?php echo htmlspecialchars($user_data['email']); ?></p>
            <p>Phone: <?php echo htmlspecialchars($user_data['contact']); ?></p>
            <p><i><strong>Bio: <?php echo htmlspecialchars($user_data['bio']); ?></strong></i></p>

            <!-- Edit Profile Button -->
            <a href="editprofile.php" class="edit-profile-btn">Edit Profile</a>
        </div>
    </div>

</body>
</html>
