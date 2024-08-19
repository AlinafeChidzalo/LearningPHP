<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
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
    <h2>signup page</h2>
    <form method="POST" action="signup.php">
        <div class="form">
        <input type="text" name="username" placeholder="username" required>
        </div>
        <div class="form">
        <input type="email" name="email" placeholder="Email" required>
    </div>
        <div class="form">
        <input type="password" name="password" placeholder="password" required>
        </div>
        <div class="form">
        <input type="password" name="confirm_password" placeholder="confirm_password" required>
        </div>
       
        <button type="submit" class="btn">register</button>

        <div class="register">
            <p><a href="login.php">login</a></p>
        </div>
    </form>
    </div>

  
    ?>
</body>
</html>
