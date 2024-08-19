<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Half Screen Background Video</title>
    <link rel="stylesheet" href="yes.css">
</head>
<body>
<div class="navbar">
  <ul>
    <li><a href="home">Home</a></li>
    <li><a href="login.php">login</a></li>
    <li><a href="contact">Contact</a></li>
    <li><a href="about">About</a></li>
    <li class="search-box">
      <form action="/search" method="GET">
        <input type="text" placeholder="Search..." name="search">
        <button type="submit">Search</button>
      </form>
    </li>
  </ul>
</div>
 

    <div class="video-container">
        <video autoplay loop muted class="background-video">
            <source src="naf.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class="content">
    <h1>Breathing Clean air: Let's Fight Air Pollution Together!</h1>
            <p>Learn more about air pollution and its effects.</p><br>
            <a href="signup.php" class="cta-button">Sign Up</a>
            <a href="https://www.who.int/health-topics/air-pollution" target="_blank">WHO on Air Pollution</a>
    </div>

    <main>
        <section class="gallery">
            <img src="nana.jpeg" alt="Pollution" class="fade-in" />
            <img src="eya.jpeg" alt="Clean Air" class="fade-in" />
            <img src="iwe.jpeg" alt="Community Action" class="fade-in" />
        </section>

        <section id="learn-more" class="info">
            <h2>What You Can Do</h2>
            <p>Discover ways to reduce air pollution in your community.</p>
            <ul>
                <li>Advocate for greener transportation.</li>
                <li>Plant trees and support green spaces.</li>
                <li>Reduce, reuse, and recycle.</li>
            </ul>
        </section>
    </main><br>

    <footer class="footer">
        <nav class="social-buttons">
            <a href="https://twitter.com" target="_blank" class="social-button twitter">Twitter</a>
            <a href="https://facebook.com" target="_blank" class="social-button facebook">Facebook</a>
            <a href="https://instagram.com" target="_blank" class="social-button instagram">Instagram</a>
            <a href="https://youtube.com" target="_blank" class="social-button youtube">YouTube</a>
            <a href="Account.php">Account</a>
        </nav>
        <p>&copy; 2024 Breath Clean Air. All rights reserved.</p>
    </footer>

    <script src="script.js"></script>

</body>
</html>
