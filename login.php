<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Login</title>
    <style>
        *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: poppins, sans-serif;    
        }
        body { 
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;    
        background-image: url(23.jpg);
        background-repeat: no-repeat;
        background-size: cover;}
        .cont{
            width: 420px;
            background: transparent;
            color: white;
            border-radius: 10px;
            padding: 30px 40px;
            border: 2px solid rgba(255, 255, 255, .2);
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            backdrop-filter: blur(20px);
        }
        .cont h2{
            font-size: 36px;
            text-align: center;
        }
        .cont .form{
            width: 100%;
            height: 50px;
            background: teal;
            margin: 30px 0;
        }
        .form input{
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            border: 2px solid rgba(255, 255, 255, .2);
            border-radius: 40px;
            font-size: 16px;
            color: white;
            padding: 20px 45px 20px 20px;
        }
        .form input::placeholder{
            color: white;
        }
        .cont .remember{
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            margin: 15px 0 15px;
        }
        .remember lable input{
            accent-color: white;
            margin-right: 3px;

        }
        .remember a:hover{
            text-decoration: underline;
        }
        .cont .btn{
            width: 100%;
            height: 45px;
            background: white;
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 16px;
            color: black;
            font-weight: 600;
        }
        .cont .register{
            font-size: 14.5px;
            text-align: center;
            margin: 20px 0 15px;
        }
        .register p a{
            color: white;
            text-decoration: none;
            font-weight: 600;
        }
        .register p a:hover{
            text-decoration: underline;
        }
    </style>
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
            <a href="signup.php">signup</a></p>
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
                echo "Login successful! welcome, $username";
                header("Location: Account.php");
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