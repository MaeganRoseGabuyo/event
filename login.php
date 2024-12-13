<!DOCTYPE html>
<html lang="en">

<head>
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
    }

    .login-container {
        background-color: rgba(255, 255, 255, 0.2);
        padding: 20px;
        width: 450px;
        text-align: center;
        border-radius: 30px;
    }

    .user-image {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-bottom: 20px;
        object-fit: cover;
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
        width: 100%;
        margin-bottom: 15px;
    }

    .input-container input {
        width: 100%;
        padding: 10px 10px 10px 45px;
        border: 2px solid white;
        border-radius: 20px;
        background-color: transparent;
        outline: none;
        color: white;
    }

    .input-container .icon {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        color: white; /* Make icons white */
        margin-left: 10px;
    }

    .input-container .left-icon {
        left: 10px;
    }

    .input-container .right-icon {
        right: 20px;
        cursor: pointer;
    }

    button {
    width: 100%;
    height: 40px;
    padding: 10px;
    background-color: #e47200;
    border: none;
    border-radius: 90%;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    text-align: center;
}


    button:hover {
        background-color: #e6b400;
    }

    .additional-options a {
        color: white;
        text-decoration: none;
    }

    .additional-options a:hover {
        text-decoration: underline;
        color: black;
    }

    .remember-me {
        display: flex;
        align-items: center;
        gap: 5px;
        color: white;
        font-size: 14px;
        margin-bottom: 20px;
        margin-top: -15px;
    }
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="login-container shadow">
            <img src="images/login.png" alt="Log In" class="user-image">
            <h1>Login</h1>
            <form>
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
                    <label for="remember-me">Remember Me</label>
                </div>

                <button type="button" onclick="window.location.href='dashboard.php';">Login</button>

                <div class="additional-options mt-3">
                    <a href="forgetpass.php">Forgot Password?</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        const togglePassword = document.getElementById('toggle-password');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', () => {
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
