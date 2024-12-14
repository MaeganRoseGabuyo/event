<?php
session_start();
include('database.php');

$error_message = ''; // Initialize an empty error message
$username_value = isset($_COOKIE['username']) ? $_COOKIE['username'] : ''; // Check for cookie

// Cleanup expired tokens by setting token_expiry to NULL
$cleanup_sql = 'UPDATE admin_accounts SET token_expiry = NULL, auth_token = NULL WHERE token_expiry < NOW()';
$cleanup_stmt = $pdo->prepare($cleanup_sql);
$cleanup_stmt->execute();

// Check if a valid token exists in the cookie for automatic login
if (isset($_COOKIE['auth_token']) && !isset($_SESSION['loggedin'])) {
    $auth_token = $_COOKIE['auth_token'];

    // Query the database to find the token
    $sql = 'SELECT * FROM admin_accounts WHERE auth_token = :auth_token';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['auth_token' => $auth_token]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user['username'];
        
        header('Location: loggedin.php');
        exit();
    } else {
        echo "No matching user found for the provided token.<br>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember-me']); // Check if "Remember Me" is checked

    $sql = 'SELECT * FROM admin_accounts WHERE username = :username';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user['username'];
        $_SESSION['account_id'] = $user['account_id'];

        if ($remember) {
            $auth_token = bin2hex(random_bytes(32)); // Generate a secure token
            $token_expiry = date('Y-m-d H:i:s', time() + (5 * 60));
            
            $update_sql = 'UPDATE admin_accounts SET auth_token = :auth_token, token_expiry = :token_expiry WHERE username = :username';
            $update_stmt = $pdo->prepare($update_sql);
            $update_stmt->execute([
                'auth_token' => $auth_token,
                'token_expiry' => $token_expiry,
                'username' => $username
            ]);

            setcookie('auth_token', $auth_token, [
                'expires' => time() + (5 * 60), // 5 minutes
                'path' => '/',
                'secure' => isset($_SERVER['HTTPS']), // Set true if using HTTPS
                'httponly' => true,
                'samesite' => 'Strict'
            ]);
        }

        header('Location: dashboard.php');
        exit();
    } else {
        $error_message = 'Invalid username/password';
    }
}
?>





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
            <form action="" method="post">
                <div class="input-container">
                    <i class="fas fa-user icon left-icon"></i>
                    <input type="text" name="username" id="username" placeholder="Username" value="<?php echo htmlspecialchars($username_value); ?>" required>
                </div>

                <div class="input-container">
                    <i class="fas fa-lock icon left-icon"></i>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <i class="fas fa-eye icon right-icon" id="toggle-password"></i>
                </div>

                <div class="remember-me">
                    <input type="checkbox" id="remember-me" name="remember-me">
                    <label for="remember-me">Remember Me</label>
                </div>

                <?php if (!empty($error_message)): ?>
                    <div class="alert alert-danger" style="color: red; margin: 15px;">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>

                <button type="submit" name="submit">Login</button>

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
