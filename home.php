
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="cont">     
    <h2>Login page</h2>
    <form method="POST" action="login.php">
    <div class="form">
        <input type="text" name="username" placeholder="Username" required>
        </div>
    <div class="form">
        <input type="password" name="password" placeholder="Password" required>
    </div>
    <div class="remember">
            <label><input type="checkbox">remember me</label>
            <a href="#">forgot password</a>
        </div>
        <button type="submit" class="btn">login</button>
        <div class="register">
            <p>dont have an account?
            <a href="signup.php">register</a></p>
        </div>
    </form>
</div>  
<?php
session_start();
include 'config.php';

const MAX_TRIES = 3;
const LOCKOUT_TIME = 600; // 10 minutes in seconds

// Check if user is locked out
if (isset($_SESSION['lockout_time'])) {
    if (time() < $_SESSION['lockout_time']) {
        die("Too many failed login attempts. Please try again in " . (($_SESSION['lockout_time'] - time()) / 60) . " minutes.");
    } else {
        // Reset the lockout
        unset($_SESSION['attempts']);
        unset($_SESSION['lockout_time']);
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch user from the database
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed_password)) {
            // Successful login
            session_destroy(); // Or redirect to a protected area
            echo "Login successful!";
        } else {
            // Unsuccessful login
            if (!isset($_SESSION['attempts'])) {
                $_SESSION['attempts'] = 0;
            }
            $_SESSION['attempts']++;

            if ($_SESSION['attempts'] >= MAX_TRIES) {
                $_SESSION['lockout_time'] = time() + LOCKOUT_TIME;
                echo "Too many failed login attempts. You are locked out for 10 minutes.";
            } else {
                echo "Invalid credentials. You have " . (MAX_TRIES - $_SESSION['attempts']) . " attempts left.";
            }
        }
    } else {
        echo "User not found.";
    }

    $stmt->close();
}
$conn->close();
?>
</body>
</html>