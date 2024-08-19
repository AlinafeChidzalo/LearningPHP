<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Air Pollution Awareness</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="landing-page">
        <video autoplay loop muted class="background-video">
            <source src="air-pollution-video.mp4" type="video/mp4">
        </video>
        <div class="content">
            <h1>Take Action Against Air Pollution!</h1>
            <p>Learn more about air pollution and its effects.</p>
            <a href="signup.php" class="cta-button">Sign Up for Free Home Testing Kit!</a>
            <a href="https://www.epa.gov/air-pollution" target="_blank">EPA Air Pollution Resources</a>
            <a href="https://www.who.int/health-topics/air-pollution" target="_blank">WHO on Air Pollution</a>
        </div>
    </div>

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $dob = $_POST['date_of_birth'];
    $address = $_POST['postal_address'];
    $postcode = $_POST['postcode'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Insert data into the database
    $stmt = $pdo->prepare("INSERT INTO users (full_name, email, date_of_birth, postal_address, postcode, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $email, $dob, $address, $postcode, $password]);


    session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query the user
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        // Redirect to account page
        header("Location: account.php");
    }
}
}

echo "<p style='color:black;'>Login successful! Welcome back, $username!</p>";

fetch('https://api.openweathermap.org/data/2.5/air_pollution?lat={lat}&lon={lon}&appid={API_KEY}')
    .then(response => response.json())
    .then(data => {
        console.log(data);
        // Update the DOM with pollution data here.
    });
</body>
</html>