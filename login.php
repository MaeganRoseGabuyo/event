<!DOCTYPE html>
<html lang="en">
    
<head>
    <style>
body {
    font-family: Arial, sans-serif;
    background-image: url('images/yellowbg.png');
    background-repeat: no-repeat; /* Prevent the background image from repeating */
    background-size: cover; /* Make the background image cover the entire viewport */
    background-position: center; /* Center the background image */
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
}


.login-container {
    background-color: rgba(255, 255, 255, 0.2); /* White with 80% opacity */
    padding: 20px;
    width: 400px;
    text-align: center;
    justify-content: center;
    border-radius: 30px;
}

.user-image {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-bottom: 20px; /* Space between the image and form */
    display: block;
    object-fit: cover; /* Ensures proper fit for uneven images */
    margin-left: 10px;
    margin-right: auto;
}

form h1 {
    margin-bottom: 20px;
    font-size: 24px;
    color: white;
}

label {
    display: block;
    margin: 10px 0 5px;
    text-align: left;
    color: white;
    font-size: 14px;
}

.input-container {
    position: relative;
    width: 70%;
    margin: 0 auto 15px auto;
    margin-left: 30px;
}

.input-container .icon {
    position: absolute;
    top: 60%;
    transform: translateY(-50%);
    width: 24px; /* Adjust icon size */
    height: 24px;
}

.input-container .left-icon {
    left: 10px; /* Position the left icon to the left */
}

.input-container .right-icon {

    right: -40px; /* Position the right icon to the right */
}

.input-container input {
    width: 100%;
    padding: 10px 10px 10px 45px; /* Add padding to the left for left icon */
    border: 2px solid white;
    border-radius: 20px;
    background-color: transparent;
    outline: none;
}

button {
    width: 80%;
    padding: 10px;
    background-color: #e47200;
    border: none;
    border-radius: 20px;
    color: #fff;
    font-size: 16px;
    cursor: pointer;

}

button:hover {
    background-color: #e6b400;
}

.success {
    color: green;
    margin: 10px 0;
}

.error {
    color: red;
    margin: 10px 0;
}

.additional-options {
    margin-top: 10px;
    font-size: 14px;
    color: white;
}

.additional-options a {
    color:black;
    text-decoration: none;
}

.additional-options a:hover {
    color: blue;
    text-decoration: underline;
}

.remember-me {
    display: flex;
    margin-top: -15px;
    margin-left: 30px;
    gap: 5px;
    color: white;
    font-size: 14px;
    margin-bottom: 20px;
}
.icon {
    color: white; /* Makes the icons white */
    cursor: pointer;
}
.left-icon {
    pointer-events: none; /* Prevent the icon from being clickable */
    color: white;
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
}

.right-icon {
    cursor: pointer; /* Ensure the eye icon is clickable */
    color: white;
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
}

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    


    
</head>
<body>

<div class="login-container">
    <!-- User Image (on top of the container) -->
    <img src="images/login.png" alt="Log In" class="login">
    <div class="login a-container">
    <h1>Login</h1>

    <div class="input-container">
    <i class="fas fa-user icon left-icon"></i>
    <input type="text" name="username" id="username" placeholder="Username" required>
</div>

<div class="input-container">
    <i class="fas fa-lock icon left-icon"></i>
    <input type="password" name="password" id="password" placeholder="Password" required>
    <i class="fas fa-eye icon right-icon" id="toggle-password"></i>
</div>


    <div class="remember-me">
        <input type="checkbox" id="remember-me">
        <label for="remember-me"><i>Remember Me</i></label>
    </div>

    <button type="button" onclick="window.location.href='dashboard.php';">Login</button>

    <div class="additional-options">
        <a href="forgetpass.php">Forgot Password?</a>
    </div>
</div>
</div>

<script>
const togglePassword = document.getElementById('toggle-password');
const passwordInput = document.getElementById('password');

togglePassword.addEventListener('click', () => {
    // Toggle the input type between 'password' and 'text'
    const currentType = passwordInput.getAttribute('type');
    if (currentType === 'password') {
        passwordInput.setAttribute('type', 'text');
        togglePassword.classList.remove('fa-eye');
        togglePassword.classList.add('fa-eye-slash');
    } else {
        passwordInput.setAttribute('type', 'password');
        togglePassword.classList.remove('fa-eye-slash');
        togglePassword.classList.add('fa-eye');
    }
});

</script>
</body>


</html>
