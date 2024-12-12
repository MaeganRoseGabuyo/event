<?php
// PHP variables for the page title and form handling
$title = 'Edit Profile';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        /* General body styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color:  #f1ee8e;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Form container styling */
        .edit-profile-container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        /* Form heading */
        .edit-profile-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        /* Form field styling */
        .edit-profile-container label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-size: 14px;
        }

        .edit-profile-container input,
        .edit-profile-container textarea,
        .edit-profile-container button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        .edit-profile-container textarea {
            resize: none;
            height: 100px;
        }

/* Submit button */
.edit-profile-container .submit-button {
        background-color: #4caf50;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        border: none;
        transition: background-color 0.3s ease;
        padding: 10px;
        margin-right: 10px;
    }

    .edit-profile-container .submit-button:hover {
        background-color: #45a049;
    }

    /* Cancel button */
    .edit-profile-container .cancel-button {
        background-color: #f44336;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        border: none;
        transition: background-color 0.3s ease;
        padding: 10px;
    }

    .edit-profile-container .cancel-button:hover {
        background-color: #d32f2f;
    }
    </style>
</head>
<body>

    <!-- Edit Profile Form -->
    <div class="edit-profile-container">
        <h2>Edit Profile</h2>
        <form action="update_profile.php" method="POST">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your full name" value="John Doe" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" value="john.doe@example.com" required>

            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" placeholder="Enter your phone number" value="+123456789">

            <label for="bio">Bio</label>
            <textarea id="bio" name="bio" placeholder="Write something about yourself...">Passionate about coding and event management.</textarea>

            <button type="submit" class="submit-button">Save Changes</button>
            <button type="button" class="cancel-button" onclick="window.location.href='profile.php'">Cancel</button>
        </form>
    </div>

</body>
</html>
