<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
      body {
    font-family: Arial, sans-serif;
    background-image: url('images/yellowbg.png');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
    position: relative;
}

/* Add a semi-transparent overlay on top of the background */
body::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.3); /* This is the white overlay with 30% opacity */
    z-index: -1; /* Keep the overlay behind the content */
}


        .forgot-password-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            width: 400px;
            text-align: center;
            border-radius: 10px;
        }

        .forgot-password-container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .forgot-password-container p {
            margin-bottom: 20px;
            color: #555;
        }

        .input-container {
            margin-bottom: 20px;
            position: relative;
            width: 90%;
        }

        .input-container input {
            width: 100%;
            padding: 10px;
            padding-left: 35px;
            border: 2px solid #ccc;
            border-radius: 5px;
            background-color: transparent;
            outline: none;
        }

        .input-container i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #ccc;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #e47200;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #e6b400;
        }

        .back-to-login {
            margin-top: 20px;
            font-size: 14px;
            color: #333;
        }

        .back-to-login a {
            color: #e47200;
            text-decoration: none;
        }

        .back-to-login a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="forgot-password-container">
    <h1>Forgot Password</h1>
    <p>Enter your email address below and we'll send you instructions on how to reset your password.</p>

    <div class="input-container">
        <i class="fas fa-envelope"></i>
        <input type="email" name="email" id="email" placeholder="Email Address" required>
    </div>


    <!-- New Password and Confirm New Password Fields -->
    <div class="input-container">
        <i class="fas fa-lock"></i>
        <input type="password" name="new-password" id="new-password" placeholder="New Password" required>
    </div>

    <div class="input-container">
        <i class="fas fa-lock"></i>
        <input type="password" name="confirm-new-password" id="confirm-new-password" placeholder="Confirm New Password" required>
    </div>

    <button type="button" onclick="updatePassword()">Update Password</button>

    <div class="back-to-login">
        <p>Remembered your password? <a href="login.php">Back to Login</a></p>
    </div>
</div>

<script>
    // Function to simulate sending reset link to user's email
    function sendResetLink() {
        const email = document.getElementById('email').value;
        if (email === '') {
            alert('Please enter your email address.');
            return;
        }
        alert('A password reset link has been sent to ' + email);
    }

    // Function to simulate updating the password
    function updatePassword() {
        const newPassword = document.getElementById('new-password').value;
        const confirmNewPassword = document.getElementById('confirm-new-password').value;

        if (newPassword === '' || confirmNewPassword === '') {
            alert('Please fill in both password fields.');
            return;
        }

        if (newPassword !== confirmNewPassword) {
            alert('Passwords do not match.');
            return;
        }

        // In a real-world scenario, you would send the password to the server for processing
        alert('Password has been updated successfully.');
    }
</script>

</body>
</html>
