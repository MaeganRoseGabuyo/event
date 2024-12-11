
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
body {
    font-family: Arial, sans-serif;
    background-image: url('bg2.png');
    background-repeat: no-repeat; /* Prevent the background image from repeating */
    background-size: cover; /* Make the background image cover the entire viewport */
    background-position: center; /* Center the background image */
    display: flex;
    align-items: center;
    height: 100vh;
    margin: 0;
}


.login-container {
    margin-left: 30px;;
    padding: 20px;
    width: 400px;
    text-align: center;
    justify-content: center;
}

/* Right container with poster */
.poster-container {
    flex-grow: 1; /* Take the remaining width */
    background-size: contain; /* Make the image smaller but still cover the div */
    background-position: auto; /* Center the image */
    background-repeat: no-repeat; /* Prevent the image from repeating */
    height: 100vh; /* Ensure the poster container takes up the full height of the viewport */
    width: 60%; /* Ensure the width fills the available space */
    display: flex;
margin-left: 140px;
    align-items: center;
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
    margin-left: 30px;;
}

.input-container .icon {
    position: absolute;
    top: 48%;
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
    background-color: #094a6b;
    border: none;
    border-radius: 20px;
    color: #fff;
    font-size: 16px;
    cursor: pointer;

}

button:hover {
    background-color: #0056b3;
}


.success {
    color: green;
    margin: 10px 0;
}

.error {
    color: red;
    margin: 10px 0;
}

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-container">
    <!-- User Image (on top of the container) -->
    <img src="login.png" alt="Log In" class="login">
    <div class="login-container">
    <h1>Login</h1>

    <div class="input-container">
        <img src="wuser.png" alt="User Icon" class="icon left-icon">
        <input type="text" name="username" id="username" required>
    </div>

    <div class="input-container">
        <img src="wpassword.png" alt="Password Icon" class="icon left-icon">
        <input type="password" name="password" id="password" required>
        <img src="eye.png" alt="Right Icon" class="icon right-icon">
    </div>

    <!-- Login Button with redirection to dashboard.php -->
     
    <!-- Login Button with redirection to dashboard.php -->
    <button type="button" onclick="window.location.href='dashboard.php';">Login</button>
</div>


    </form>
</div>

<div class="poster-container">
        <div class="poster-content">

        </div>
    </div>


</body>
</html>
