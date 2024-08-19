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
       
       
        .form-container {
      background-color: transparent;
      border-radius: 10px;
      border: 2px solid rgba(255, 255, 255, .2);
      padding: 20px;
      width: 100%;
      max-width: 600px;
      box-shadow: 0 0 10px rgba(0, 0, 0, .1);
      backdrop-filter: blur(20px);
    }
    .form-step {
      display: none;
    }
    .form-step.active {
      display: block;
    }
    .form-step input[type="text"],
    .form-step input[type="email"],
    .form-step input[type="password"],
    .form-step input[type="date"],
    .form-step textarea {
      width: calc(100% - 22px);
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 10px;
      margin-bottom: 10px;
      height: 20px;
    }
    .form-step button {
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      background-color: #007bff;
      color: #fff;
      font-size: 16px;
    }
    .form-step button:hover {
      background-color: #0056b3;
    }
    .form-step .navigation {
      display: flex;
      justify-content: space-between;
    }
  </style>
</head>
<body>

<div class="form-container">
  <form id="multiStepForm" method="POST" action="">

    <div class="form-step active" id="step1">
      <h2>Personal Information</h2>
      <label>FULLNAME</label>
      <input type="text" name="full_name" placeholder="Full Name" required>
      <label>USERNAME</label>
      <input type="text" name="username" placeholder="username" required>
      <label>DATE OF BIRTH</label>
      <input type="date" name="date_of_birth" placeholder="Date of Birth" required>
      <div class="navigation">
        <button type="button" onclick="nextStep()">Next</button>
      </div>
    </div>

    <div class="form-step" id="step2">
      <h2>Address and Credentials</h2>
      <label>EMAIL</label>
      <input type="email" name="email" placeholder="email" required>
      <label>PASSWORD</label>
      <input type="password" name="password" placeholder="Password" required>
      <label>POSTAL ADDRESS</label>
      <textarea id="address" name="address" autocomplete="address" maxlength="300" required></textarea>
      <input type="hidden" name="created_ats">
    
      <div class="navigation">
        <button type="button" onclick="prevStep()">Previous</button>
        <button type="submit">submit</button>
      </div>
    </div>

  </form>
</div>

<script>
  let currentStep = 1;

  function showStep(step) {
    document.querySelectorAll('.form-step').forEach((stepElement, index) => {
      if (index === step - 1) {
        stepElement.classList.add('active');
      } else {
        stepElement.classList.remove('active');
      }
    });
  }

  function nextStep() {
    currentStep++;
    showStep(currentStep);
  }

  function prevStep() {
    currentStep--;
    showStep(currentStep);
  }
</script>


<?php
    include("config.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['full_name'];
    $username = $_POST['username'];
    $dob = $_POST['date_of_birth'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $postal_address = $_POST['postal_address'];

    $stmt = $conn->prepare("INSERT INTO users (full_name, username, date_of_birth, email, password, postal_address) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $username, $dob, $email, $password, $postal_address);

   
   if ($stmt->execute()) {
    header("Location: login.php");
    exit(); 
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
}
$conn->close();
    ?>
</body>
</html>