<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Detailed Academy</title>
    <link rel="stylesheet" href="homepage.css" />
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>

    <header>
        <nav class="mainNav">
            <a href="index.html" class="logo">Detailed Academy</a>
            <div class="nav-right">
                <ul>
                    <li><a href="index.html" class="active">Home</a></li>
                    <li><a href="programs2.html">Programs</a></li>
                    <li><a href="coaches.html">Coaches</a></li>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="about us.html">About Us</a></li>
                </ul>
                <div class="user-dropdown">
                    <img src="user.png" alt="User Icon" class="user-icon">
                    <div class="dropdown-content">
                        <?php if (isset($_SESSION['email'])): ?>
                            <form action="login.php" method="POST">
                                <button type="submit" class="logout-button">Logout</button>
                            </form>
                        <?php else: ?>
                            <form action="login.php" method="GET">
                                <button type="submit" class="login-button">Login</button>
                            </form>
                        <?php endif; ?>
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
        <h1 class="intro-text">Detailed Academy</h1>
        <h2 class="sub-header">Master the Game, One Detail at a Time.</h2>
        <p class="hero-desc">
            At Detailed Academy, we train athletes to think, move, and play smarter. 
            Our goal is to turn raw talent into refined skill through discipline, precision, and passion for basketball.
        </p>
        <a href="register.php" class="hero-button">Join the Academy</a>
    </div>

<section class="section-programs">
  <h2 class="section-title">Our Training Programs</h2>

  <div class="programs-container">

    <div class="program-box">
  <img src="p1.jfif" alt="Serious Hoopers Master Program" class="program-img">
  <h3>Explore Exclusive Offers</h3>
  <p>Check out our packages and take advantage of special deals designed to elevate your game.</p>
  <a href="programs2.html" class="view-button">Offers</a>
</div>

<div class="program-box">
  <img src="p2.jfif" alt="Beginners Camp" class="program-img">
  <h3>Meet Our Coaches</h3>
  <p>Get to know the dedicated coaches behind our Camp who will guide you in mastering basketball with confidence.</p>
  <a href="coaches.html" class="view-button">Our Coaches</a>
</div>

<div class="program-box">
  <img src="p3.jfif" alt="Adult Camp" class="program-img">
  <h3>Learn More About Us</h3>
  <p>Discover how our Camp can help you stay fit, refine your skills, and enjoy competitive play in a supportive and professional environment.</p>
  <a href="about us.html" class="view-button">Learn More</a>
</div>

<div class="program-box">
  <img src="p4.jfif" alt="Elite Course" class="program-img">
  <h3>Enroll Today</h3>
  <p>Join our high-intensity Courses to receive personalized coaching and tactical drills, pushing your basketball skills to the next level.</p>
  <a href="register.php" class="view-button">Enroll Now</a>
</div>


  </div>
</section>



    

   <div class="section-3">
  <div class="booking-container">
    <div class="booking-content">
      <h2 class="booking-title">Ready to Join the Program?</h2>
      <p class="booking-desc">
        Take your basketball skills to the next level with <strong>Detailed Academy</strong>.
        Whether you're a beginner or aiming for elite status — your journey starts here.
      </p>
      <div class="booking-buttons">
        <a href="login.php" class="booking-button">Join Now</a>
        <p class="no-account-text">Don't have an account yet?</p>
        <a href="register.php" class="booking-create-account">Create Account</a>
      </div>
    </div>

    <div class="booking-slideshow">
      <div class="slide active" style="background-image: url('s3.jpg');"></div>
      <div class="slide" style="background-image: url('s2.jpg');"></div>
      <div class="slide" style="background-image: url('s1.jpg');"></div> 
      <div class="slideshow-dots">
        <span class="dot active"></span>
        <span class="dot"></span>
        <span class="dot"></span>
      </div>
    </div>
  </div>
</div>

<script>
const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll('.dot');
let current = 0;
let timer = setInterval(nextSlide, 4000);

function showSlide(index) {
  slides.forEach((s, i) => {
    s.classList.toggle('active', i === index);
    dots[i].classList.toggle('active', i === index);
  });
  current = index;
}

function nextSlide() {
  current = (current + 1) % slides.length;
  showSlide(current);
}

dots.forEach((dot, i) => {
  dot.addEventListener('click', () => {
    showSlide(i);
    clearInterval(timer);
    timer = setInterval(nextSlide, 4000);
  });
});

showSlide(0);
</script>


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

