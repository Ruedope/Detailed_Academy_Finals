<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Connect to database
    $conn = new mysqli("localhost", "root", "", "detailed_academy");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get POST data
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = $_POST['phone'];
    $program = $_POST['program'];

    // Insert into database
    $sql = "INSERT INTO students (full_name, email, password, phone, program)
            VALUES ('$full_name', '$email', '$password', '$phone', '$program')";

    if ($conn->query($sql) === TRUE) {
        // Styled message and redirect after 3 seconds
        echo "
        <div style='
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #4CAF50;
            color: white;
            padding: 15px 25px;
            border-radius: 8px;
            font-family: Arial, sans-serif;
            box-shadow: 0 2px 6px rgba(0,0,0,0.3);
            z-index: 9999;
        '>
            Registration successful! Redirecting to login...
        </div>
        <script>
            setTimeout(function() {
                window.location.href = 'login.php';
            }, 3000); // 3 seconds delay
        </script>
        ";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register | Detailed Academy</title>
  <link rel="stylesheet" href="register.css" />
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
<header>
    <nav class="mainNav">
        <a href="homepage.html" class="logo">Detailed Academy</a>
        <div class="nav-right">
        <ul>
             <li><a href="index.html">Home</a></li>
                    <li><a href="programs2.html">Programs</a></li>
                    <li><a href="coaches.html">Coaches</a></li>
                    <li><a href="register.php" class="active">Register</a></li>
                    <li><a href="about us.html">About Us</a></li>
          </ul>
          <div class="user-dropdown">
            <img src="user.png" alt="User Icon" class="user-icon">
                <div class="dropdown-content">
                <h2>Welcome, <span>Guest</span></h2>
                <form action="login.html" method="GET">
                    <button type="submit" class="login-button">Login</button>
                </form>
                </div>
            </div>
        </div>
    </nav>
</header>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const userDropdown = document.querySelector('.user-dropdown');
    const userIcon = document.querySelector('.user-icon');

    if (userDropdown && userIcon) {
      userIcon.addEventListener('click', function(e) {
        e.stopPropagation();
        userDropdown.classList.toggle('open');
      });

      document.addEventListener('click', function(e) {
        if (!userDropdown.contains(e.target)) {
          userDropdown.classList.remove('open');
        }
      });
    }
  });
</script>

<div class="section-1">
  <h1 class="intro-text">OUR TRAINING PROGRAMS</h1>
        <p class="hero-desc">
            At Detailed Academy, we train athletes to think, move, and play smarter. 
            Our goal is to turn raw talent into refined skill through discipline, precision, and passion for basketball.
        </p>
</div>

  <div class="section-2">
  <div class="box-container registration-container">
    <form class="registration-form" action="register.php" method="POST">
      <h2 class="form-title">Register Now</h2>

      <input type="text" name="full_name" placeholder="Full Name" required>
      <input type="email" name="email" placeholder="Email Address" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="tel" name="phone" placeholder="Phone Number" required>
      <select name="program" required>
        <option value="" disabled selected>Select Program</option>
        <option value="shmp">Serious Hoopers Master Program</option>
        <option value="bc">Beginners Camp</option>
        <option value="ac">Adult Camp</option>
        <option value="ec">Elite Course</option>
      </select>
      <button type="submit" class="book-btn">Register</button>
    </form>
  </div>
</div>



<!-- FOOTER -->
<div class="section-4">
  <div class="about-container">
    <h2 class="about-title">DETAILED ACADEMY</h2>
    <div class="about-details-container">
      <p class="about-details">2025 Intramuros, Manila</p>
      <p class="about-details">+63 (0)9123456789</p>
      <p class="about-details">detailedacademy@gmail.com</p>
    </div>
    <div class="divider"></div>
    <a href="about us" class="about-link">Learn more about us</a>
    <p class="footer-text">&copy; 2025 Detailed Academy. All rights reserved.</p>
  </div>
</div>
