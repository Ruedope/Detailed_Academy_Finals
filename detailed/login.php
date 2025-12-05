<?php
session_start(); // Start session to keep track of login

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Connect to database
    $conn = new mysqli("localhost", "root", "", "detailed_academy");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get POST data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if user exists
    $sql = "SELECT * FROM students WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['full_name'];

            // Success alert + redirect
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
                Login successful! Redirecting to dashboard...
            </div>
            <script>
                setTimeout(function() {
                    window.location.href = 'index.html';
                }, 3000); // 3 seconds delay
            </script>
            ";
        } else {
            // Incorrect password
            echo "
            <div style='
                position: fixed;
                top: 20px;
                right: 20px;
                background-color: #f44336;
                color: white;
                padding: 15px 25px;
                border-radius: 8px;
                font-family: Arial, sans-serif;
                box-shadow: 0 2px 6px rgba(0,0,0,0.3);
                z-index: 9999;
            '>
                Incorrect password! Please try again.
            </div>
            ";
        }
    } else {
        // Email not found
        echo "
        <div style='
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #f44336;
            color: white;
            padding: 15px 25px;
            border-radius: 8px;
            font-family: Arial, sans-serif;
            box-shadow: 0 2px 6px rgba(0,0,0,0.3);
            z-index: 9999;
        '>
            Email not registered!
        </div>
        ";
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>

<style>
/* ===================== GLOBAL RESET ===================== */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Arial', Tahoma, Geneva, Verdana, sans-serif;
}

/* ===================== BODY ===================== */
body {
  background-image: linear-gradient(rgba(0,0,0,0.65),rgba(0,0,0,0.10)),url(bg1.png);
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
  color: #ffffff;
  min-height: 100vh;
}

/* ===================== NAVIGATION BAR ===================== */
.mainNav {
  background-color: #171717;
  height: 71px;
  display: flex; 
  align-items: center; 
  justify-content: space-between; 
  padding: 0 32px;
  box-shadow: 0 2px 16px rgba(0,0,0,0.10);
  border-bottom: 1.5px solid #2b2b2b;
}

.mainNav .logo {
  font-family: 'Cinzel', serif; 
  color: #ffffff; 
  text-decoration: none; 
  font-size: 36px; 
  font-weight: 700; 
  letter-spacing: 2px;
  transition: color 0.3s;
}

.mainNav .logo:hover {
  color: #f0e6d2;
}

.mainNav ul {
  list-style: none;
  display: flex; 
  align-items: center;
}

.mainNav ul li {
  margin-left: 24px; 
}

.mainNav a {
  font-family: 'Roboto', sans-serif;
  color: #747070;
  text-decoration: none;
  font-size: 18px;
  padding: 16px 22px;  
  border-radius: 6px;
  transition: .3s;
}

.mainNav a:hover {
  background-color: #2b2b2b;
  color: #ffffff;
}

/* ===================== LOGIN WRAPPER ===================== */
.login-wrapper {
  min-height: calc(100vh - 71px - 25vh);
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 60px 16px;
}

/* Card box similar to pay-card */
.login-card {
  width: 100%;
  max-width: 480px;
  background: #000000bb;
  padding: 38px 34px;
  border-radius: 15px;
  box-shadow:
    0 0 20px 4px rgba(0,0,0,0.55),
    0 2px 8px rgba(0,0,0,0.30);
}

/* Title */
.login-title {
  font-family: 'Playfair Display', serif;
  font-size: 34px;
  text-align: center;
  margin-bottom: 10px;
}

.login-sub {
  color: #d9d0c8;
  text-align: center;
  margin-bottom: 24px;
  font-size: 14px;
}

/* Form */
.form-group {
  margin-bottom: 16px;
}

.form-group label {
  display: block;
  margin-bottom: 6px;
  font-size: 14px;
  color: #ffffff;
  font-family: 'Roboto', sans-serif;
}

.form-group input {
  width: 100%;
  padding: 12px 14px;
  background: #141414;
  border: 1px solid #555;
  border-radius: 8px;
  color: #ffffff;
  font-size: 14px;
  transition: .25s;
}

.form-group input:focus {
  border-color: #ffa726;
  box-shadow: 0 0 0 1px rgba(255,167,38,0.55);
  background: #111111;
}

/* Login button */
.btn-login {
  width: 100%;
  border: none;
  padding: 12px 0;
  border-radius: 6px;
  font-size: 16px;
  font-weight: 700;
  margin-top: 10px;
  cursor: pointer;
  background: linear-gradient(90deg, #ffa726 0%, #ff9800 100%);
  color: #fff;
  letter-spacing: 0.8px;
  transition: .2s;
}

.btn-login:hover {
  background: linear-gradient(90deg, #ff9800 0%, #ffa726 100%);
  color: #232323;
}

/* Bottom links */
.login-links {
  margin-top: 16px;
  text-align: center;
}

.login-links a {
  color: #ffa726;
  text-decoration: none;
  font-size: 14px;
}

.login-links a:hover {
  text-decoration: underline;
}

/* ===================== FOOTER ===================== */
.section-4 {
  height: 25vh;
  display: flex; 
  justify-content: left; 
  align-items: left; 
  color: #fff;
  background-color: #1b1b1b;
  padding: 20px; 
}

.about-container {
  display: flex; 
  flex-direction: column; 
  align-items: flex-start; 
  width: 100%; 
  max-width: 800px; 
}

.about-title {
  font-family: 'Cinzel', serif;
  font-size: 24px; 
  font-weight: 700; 
  margin-bottom: 10px; 
}

.about-details-container {
  display: flex; 
  gap: 20px; 
  flex-wrap: wrap; 
}

.about-details {
  font-family: 'Roboto', sans-serif; 
  font-size: 16px; 
  margin: 0; 
}

.divider {
  width: 75%; 
  height: 3px; 
  background-color: #fff; 
  margin: 20px 0; 
}

.footer-text {
  font-family: 'Roboto', sans-serif; 
  font-size: 14px; 
  color: #fff; 
  margin-top: 10px; 
}

.about-link {
  text-decoration: none;
  font-family: 'Roboto', sans-serif;
  font-size: 16px;
  font-weight: 500;
  color: #ffa726;
  display: inline-block;
  margin-bottom: 10px;
  margin-left: 0;
  align-self: flex-start;
  transition: color 0.3s;
}

.about-link:hover {
  color: #fff;
  text-decoration: underline;
}


</style>
</head>
<body>

<!-- NAVIGATION BAR -->
<div class="mainNav">
    <a href="index.html" class="logo">Detailed Academy</a>
    <ul>
                    <li><a href="index.html" class="active">Home</a></li>
                    <li><a href="programs2.html">Programs</a></li>
                    <li><a href="coaches.html">Coaches</a></li>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="about us.html">About Us</a></li>
                    
    </ul>
</div>

<!-- LOGIN AREA -->
<div class="login-wrapper">
    <div class="login-card">

        <h1 class="login-title">Welcome Back</h1>
        <p class="login-sub">Log in to continue to your account</p>

        <form>
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" placeholder="Enter your email">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" placeholder="Enter your password">
            </div>

            <button type="submit" class="btn-login">Login</button>
        </form>

        <div class="login-links">
            <p><a href="#">Forgot Password?</a></p>
            <p>Don't have an account? <a href="register.php">Register</a></p>
        </div>

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
    <a href="about us.html" class="about-link">Learn more about us</a>
    <p class="footer-text">&copy; 2025 Detailed Academy. All rights reserved.</p>
  </div>
</div>

</body>
</html>
