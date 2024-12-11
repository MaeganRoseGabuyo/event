<?php
// Get user ID from URL
$user_id = $_GET['user_id'];

// Example database connection
include('db_connection.php');

// Fetch user data for editing
$query = "SELECT * FROM users WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
    $user = null;
}

// Process form submission to update user info
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the updated data from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $bio = $_POST['bio'];
    $profile_picture = $_POST['profile_picture']; // For simplicity, assuming it's a text input

    // Update the user's profile in the database
    $update_query = "UPDATE users SET name = '$name', email = '$email', phone = '$phone', bio = '$bio', profile_picture = '$profile_picture' WHERE user_id = $user_id";
    if (mysqli_query($conn, $update_query)) {
        // Redirect to profile page after update
        header("Location: profile.php?user_id=$user_id");
        exit();
    } else {
        $error_message = "Failed to update profile.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        /* Add styles for the form */
    </style>
</head>
<body>
    <!-- Same Navbar -->

    <div class="container">
        <h1>Edit Profile</h1>
        
        <?php if ($user): ?>
        <form method="POST">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>

            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($user['phone']) ?>" required>

            <label for="bio">Bio</label>
            <textarea id="bio" name="bio"><?= htmlspecialchars($user['bio']) ?></textarea>

            <label for="profile_picture">Profile Picture URL</label>
            <input type="text" id="profile_picture" name="profile_picture" value="<?= htmlspecialchars($user['profile_picture']) ?>">

            <button type="submit">Update Profile</button>
        </form>
        <?php else: ?>
        <p>User not found.</p>
        <?php endif; ?>
    </div>

    <footer>
        <p>&copy; Bounty Coders 2024. All rights reserved.</p>
    </footer>
</body>
</html>
