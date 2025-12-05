<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Programs | Detailed Academy</title>
  <link rel="stylesheet" href="programs2.css" />
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
             <li><a href="programs2.html" class="active">Programs</a></li>
             <li><a href="coaches.html">Coaches</a></li>
             <li><a href="register.php">Register</a></li>
             <li><a href="about us.html">About Us</a></li>
           
          </ul>
          <div class="user-dropdown">
            <img src="user.png" alt="User Icon" class="user-icon">
                <div class="dropdown-content">
                <h2>Welcome, <span>Guest</span></h2>
                <form action="login.php" method="GET">
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

    // ==============================
    // PROGRAM DETAILS MODAL LOGIC
    // (UPDATED CONTENT ONLY)
    // ==============================
    const programDetails = [
      {
        // 1. ELITE COURSE
        title: 'Elite Course',
        html: `
          <p>
            The Elite Course is designed for serious hoopers who want to push their skills to the next level.
            High-intensity drills, game-speed reps, and live play every session.
          </p>
          <ul>
            <li><strong>Schedule:</strong> Every Wednesday, 7:00 PM – 8:00 PM</li>
            <li><strong>Focus:</strong> Shooting, finishing, footwork, and decision making under pressure</li>
            <li><strong>Includes:</strong> Skills work, competitive drills, and controlled scrimmages</li>
            <li><strong>Level:</strong> Intermediate to advanced players</li>
            <li><strong>Rate:</strong> ₱499.00 per session</li>
          </ul>
          <p>
            Perfect for players who already have fundamentals and want a <em>performance-driven</em> group workout
            where passion meets performance.
          </p>
        `
      },
      {
        // 2. SERIOUS HOOPERS MASTER PROGRAM
        title: 'Serious Hoopers Master Program',
        html: `
          <p>
            A 30-day progression program built for dedicated hoopers committed to long-term improvement.
            Combining skills work, plyometrics, conditioning, and live games.
          </p>
          <ul>
            <li><strong>Program Length:</strong> 30 days</li>
            <li><strong>Core Components:</strong> Skills work, plyo/athletic training, and live games</li>
            <li><strong>Sample Weekly Schedule:</strong></li>
            <ul>
              <li>Mon – Evening skills & ball-handling</li>
              <li>Wed – Skills + shooting + game reads</li>
              <li>Fri – Plyo, conditioning, and finishing</li>
              <li>Sat – Scrimmages and game situations</li>
            </ul>
            <li><strong>Ideal For:</strong> Players who want structured, progressive training instead of random workouts</li>
            <li><strong>Rate:</strong> Around ₱4,000.00 for the full 30-day subscription</li>
          </ul>
          <p>
            This is for hoopers who are ready to be <strong>consistent</strong> and treat their development like a real pro.
          </p>
        `
      },
      {
        // 3. ADULT CAMP
        title: 'Adult Camp',
        html: `
          <p>
            The Adult Camp is perfect for men and women who want to get back into the game, stay active,
            and improve their basketball skills in a supportive environment.
          </p>
          <ul>
            <li><strong>Schedule:</strong> Saturday & Sunday, 10:00 AM – 11:00 AM</li>
            <li><strong>Focus Areas:</strong></li>
            <ul>
              <li>Strength and conditioning</li>
              <li>Basketball skills development (shooting, passing, ball-handling)</li>
              <li>Live games and controlled scrimmages</li>
            </ul>
            <li><strong>Level:</strong> Open to beginners, returnees, and casual players</li>
            <li><strong>Rate:</strong> ₱299.00 per session (Season-based, limited slots only)</li>
          </ul>
          <p>
            If you’re an adult who misses playing or wants a fun way to stay fit, this camp is for you.
          </p>
        `
      },
      {
        // 4. BEGINNERS CAMP
        title: 'Beginners Camp',
        html: `
          <p>
            A camp specially designed for kids who are new to basketball.
            The main goal is to make learning the game fun, safe, and confidence-building.
          </p>
          <ul>
            <li><strong>Age Group:</strong> Kids aged 7 to 13</li>
            <li><strong>Goals:</strong></li>
            <ul>
              <li>Introduce basic basketball skills (dribbling, passing, shooting)</li>
              <li>Teach teamwork, sportsmanship, and discipline</li>
              <li>Create a positive environment where kids enjoy the game</li>
            </ul>
            <li><strong>Style of Training:</strong> Fun drills, mini-games, and age-appropriate challenges</li>
            <li><strong>Best For:</strong> Kids with little to no experience who want to start their basketball journey</li>
          </ul>
          <p>
            From beginner to baller — this camp is the first step for young athletes to fall in love with the game.
          </p>
        `
      }
    ];

    const modal = document.getElementById('programModal');
    const modalTitle = document.getElementById('programModalTitle');
    const modalBody = document.getElementById('programModalBody');
    const closeBtn = document.getElementById('closeProgramModal');
    const detailButtons = document.querySelectorAll('.details-btn');

    if (modal && modalTitle && modalBody && closeBtn && detailButtons.length > 0) {

      detailButtons.forEach((btn, index) => {
        btn.addEventListener('click', function(e) {
          e.preventDefault();

          const data = programDetails[index];
          if (!data) return;

          modalTitle.textContent = data.title;
          modalBody.innerHTML = data.html;
          modal.classList.add('open');
        });
      });

      const hideModal = () => {
        modal.classList.remove('open');
      };

      closeBtn.addEventListener('click', hideModal);

      modal.addEventListener('click', function(e) {
        if (e.target === modal) {
          hideModal();
        }
      });

      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.classList.contains('open')) {
          hideModal();
        }
      });
    }
  });
</script>

<!-- HERO SECTION -->
<div class="section-1">
  <h1 class="intro-text">OUR TRAINING PROGRAMS</h1>
</div>

<p class="hero-desc">
  At Detailed Academy, we train athletes to think, move, and play smarter. 
  Our goal is to turn raw talent into refined skill through discipline, precision, and passion for basketball.
</p>

<!-- PROGRAMS SECTION -->
<div class="section-2">
    <div class="box-container">
        <h2 class="section-title">TRAINING PROGRAMS</h2>

        <div class="scroll-row">

            <!-- PROGRAM 1 – ELITE COURSE -->
            <div class="room-box">
                <img src="ec.jpg" class="room-image">
                <h3 class="room-title">Elite Course</h3>
                <p class="room-desc">
                    High-intensity skills training for competitive players. Every Wednesday, 7:00–8:00 PM. 
                    Where passion meets performance.
                </p>

                <div class="room-actions">
                    <a href="payment.php" class="details-btn">Details</a>
                    <!-- ENROLL BUTTON (UNCHANGED LOGIC) -->
                    <a href="payment.php?program=elite" class="book-btn">Enroll</a>
                </div>
            </div>

            <!-- PROGRAM 2 – SERIOUS HOOPERS MASTER PROGRAM -->
            <div class="room-box">
                <img src="mhp.jpg" class="room-image">
                <h3 class="room-title">Serious Hoopers Master Program</h3>
                <p class="room-desc">
                    A 30-day subscription program with skills work, plyo, and live games for truly committed hoopers.
                </p>

                <div class="room-actions">
                    <a href="payment.php" class="details-btn">Details</a>
                    <!-- ENROLL BUTTON (UNCHANGED LOGIC) -->
                    <a href="payment.php" class="book-btn">Enroll</a>
                </div>
            </div>

            <!-- PROGRAM 3 – ADULT CAMP -->
            <div class="room-box">
                <img src="ac.jpg" class="room-image">
                <h3 class="room-title">Adult Camp</h3>
                <p class="room-desc">
                    Weekend camp for adults focusing on conditioning, skill development, and fun live games.
                </p>

                <div class="room-actions">
                    <a href="payment.php" class="details-btn">Details</a>
                    <!-- ENROLL BUTTON (UNCHANGED LOGIC) -->
                    <a href="payment.php?program=adult" class="book-btn">Enroll</a>
                </div>
            </div>

            <!-- PROGRAM 4 – BEGINNERS CAMP -->
            <div class="room-box">
                <img src="bc.jpg" class="room-image">
                <h3 class="room-title">Beginners Camp</h3>
                <p class="room-desc">
                    A fun and safe camp for kids ages 7–13 to learn basketball fundamentals and enjoy the game.
                </p>

                <div class="room-actions">
                    <a href="payment.php" class="details-btn">Details</a>
                    <!-- ENROLL BUTTON (UNCHANGED LOGIC) -->
                    <a href="payment.php?program=beginners" class="book-btn">Enroll</a>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- PROGRAM DETAILS MODAL -->
<div class="program-modal" id="programModal">
  <div class="program-modal-content">
    <h3 class="program-modal-title" id="programModalTitle">Program Title</h3>
    <div class="program-modal-body" id="programModalBody">
      <!-- Filled dynamically by JS -->
    </div>
    <button class="close-modal" id="closeProgramModal">Close</button>
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
