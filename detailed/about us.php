<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>About Us | Detailed Academy</title>
  <link rel="stylesheet" href="homepage.css" />
</head>
<body>
  <!-- HEADER (matches site header) -->
  <header>
    <nav class="mainNav">
      <a href="index.html" class="logo">Detailed Academy</a>
      <div class="nav-right">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="programs2.html">Programs</a></li>
          <li><a href="coaches.html">Coaches</a></li>
          <li><a href="register.php">Register</a></li>
          <li><a href="about us.html" class="active">About Us</a></li>
        </ul>

        <div class="user-dropdown">
          <img src="user.png" alt="User Icon" class="user-icon">
          <div class="dropdown-content">
            <form action="login.php" method="GET">
              <button type="submit" class="login-button">Login</button>
            </form>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <!-- HERO -->
  <section class="section-1" aria-label="About hero">
    <h1 class="intro-text">About Detailed Academy</h1>
    <h2 class="sub-header">Master the Game, One Detail at a Time.</h2>
    <p class="hero-desc">We train athletes to think, move, and play smarter. Our approach blends technical mastery, tactical understanding, and a growth-minded culture that prepares players for competition and life.</p>
  </section>

  <!-- MISSION & PHILOSOPHY -->
  <section class="section-2" style="padding:56px 0;">
    <div class="box-container">

      <div class="box">
        <h3>Our Mission</h3>
        <p>To develop smart, confident basketball players by teaching the fundamentals, refining advanced skills, and instilling discipline and game intelligence that lasts a lifetime.</p>
      </div>

      <div class="box">
        <h3>Coaching Philosophy</h3>
        <p>We focus on detail-driven coaching — breaking down mechanics, leveraging film analysis, and building personalized paths for each athlete. Coaches specialize across shooting, footwork, big-man development, conditioning, analytics, and tactical IQ.</p>
      </div>

    </div>
  </section>

  <!-- PROGRAMS SNAPSHOT -->
  <section class="section-2 programs-hero" aria-label="Programs">
    <h2 class="section-title">Programs for Every Player</h2>
    <p class="hero-desc" style="max-width:920px; margin:0 auto 28px;">From first-time learners to elite competitors, our four core programs provide clear development routes and measurable progress.</p>

    <div class="programs-container">
      <article class="program-box">
        <img src="mhp.jpg" alt="Serious Hoopers Master Program">
        <h3>Serious Hoopers Master Program</h3>
        <p>Intense, skill-led training for athletes targeting high-level competition with individualized development plans and tactical coaching.</p>
      </article>

      <article class="program-box">
        <img src="bc.jpg" alt="Beginners Camp">
        <h3>Beginners Camp</h3>
        <p>Fundamentals-first training that builds ball skills, spacing, and confidence in a supportive, structured environment.</p>
      </article>

      <article class="program-box">
        <img src="ac.jpg" alt="Adult Camp">
        <h3>Adult Camp</h3>
        <p>Skill maintenance, conditioning, and competitive play designed for adult athletes who want to stay fit and sharp.</p>
      </article>

      <article class="program-box">
        <img src="ec.jpg" alt="Elite Course">
        <h3>Elite Course</h3>
        <p>High-intensity training combining film study, tactical drills, and data-driven coaching for top-tier performers.</p>
      </article>
    </div>
  </section>

  <!-- COACHES HIGHLIGHT -->
  <section class="section-2" style="padding-top:36px;">
    <div style="width:80%; margin:0 auto;">
      <h2 class="section-title">Our Coaching Team</h2>
      <p class="hero-desc" style="max-width:860px; margin:0 auto 28px;">Our staff brings decades of experience across player development, analytics, strength & conditioning, and tactical coaching — each coach provides focused instruction to ensure comprehensive growth.</p>

      <div class="box-container" style="grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));">
        <div class="box">
          <h3>Marcus Rivera</h3>
          <p>Director of Development — Shooting & Footwork</p>
        </div>
        <div class="box">
          <h3>Ken Morales</h3>
          <p>Bigs Coach — Post Moves & Interior Defense</p>
        </div>
        <div class="box">
          <h3>Lena Cruz</h3>
          <p>Youth Skills — Ball Handling & Fundamentals</p>
        </div>
        <div class="box">
          <h3>Tyler Miles</h3>
          <p>Strength & Conditioning — Mobility & Performance</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="section-3">
    <div class="booking-container">
      <div class="booking-content">
        <h2 class="booking-title">Ready to Join the Academy?</h2>
        <p class="booking-desc">Whether you're just starting or training for elite competition, Detailed Academy gives you the coaching and structure to progress. Create an account and start your journey today.</p>
        
      </div>

      <div class="booking-slideshow" style="min-height:260px;">
        <div class="slide active" style="background-image: url('s1.jpg');"></div>
        <div class="slide active" style="background-image: url('s2.jpg');"></div>
        <div class="slide active" style="background-image: url('s3.jpg');"></div>
      </div>
    </div>
  </section>

  <!-- FOOTER (consistent with site) -->
  <footer class="section-4">
    <div class="about-container">
      <h2 class="about-title">DETAILED ACADEMY</h2>
      <div class="about-details-container">
        <p class="about-details">2025 Intramuros, Manila</p>
        <p class="about-details">+63 (0)9123456789</p>
        <p class="about-details">detailedacademy@gmail.com</p>
      </div>
      <div class="divider"></div>
      <a href="register.php" class="about-link">Join a program</a>
      <p class="footer-text">&copy; 2025 Detailed Academy. All rights reserved.</p>
    </div>
  </footer>

</body>
</html>
