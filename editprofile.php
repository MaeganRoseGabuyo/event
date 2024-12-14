<?php
session_start();

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: index.php');
    exit();
}

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: index.php');
    exit();
}

include 'database.php';
// PHP variables for the page title and form handling
$title = 'Edit Profile';

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

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
        $full_name = $_POST['name'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $bio = $_POST['bio'];

        $update_sql = 'UPDATE admin_accounts SET name = :name, contact = :contact, email = :email, bio = :bio WHERE account_id = :account_id';
        $update_stmt = $pdo->prepare($update_sql);

        $update_params = [
            'name' => $full_name,
            'contact' => $contact,
            'email' => $email,
            'bio' => $bio,
            'account_id' => $account_id
        ];

        $update_stmt->execute($update_params);

        header('Location: profile.php');
        exit;
    }
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
        <form action="" method="POST">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your full name" value="<?php echo htmlspecialchars($user_data['name']); ?>" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo htmlspecialchars($user_data['email']); ?>" required>

            <label for="contact">Phone</label>
            <input type="text" id="contact" name="contact" placeholder="Enter your phone number" value="<?php echo htmlspecialchars($user_data['contact']); ?>">

            <label for="bio">Bio</label>
            <textarea id="bio" name="bio" placeholder="Write something about yourself..." ><?php echo htmlspecialchars($user_data['bio']); ?></textarea>

            <button type="submit" class="submit-button" name="submit">Save Changes</button>
            <button type="button" class="cancel-button" onclick="window.location.href='profile.php'">Cancel</button>
        </form>
    </div>

</body>
</html>
