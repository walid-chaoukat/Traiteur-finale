<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Party Manager</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/traiteur.css">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    :root {
      --primary: #c98a6e;
      --secondary: #898b40;
      --accent: #d4af37;
      --text: #2d2d2d;
      --light: #f8f9fa;
      --border: #e9ecef;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Montserrat', sans-serif;
      color: var(--text);
    }

    header {
      background: white;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
      position: sticky;
      top: 0;
      z-index: 1000;
      padding: 1rem 0;
    }

    .header-container {
      max-width: 1400px;
      margin: 0 auto;
      padding: 0 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      font-family: 'Playfair Display', serif;
      font-size: 2rem;
      font-weight: 700;
      color: var(--primary);
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      transition: 0.3s;
    }

    .logo:hover {
      color: var(--secondary);
    }

    .logo i {
      color: var(--accent);
      font-size: 1.8rem;
    }

    .nav-desktop {
      display: flex;
      gap: 2.5rem;
    }

    .nav-desktop a {
      text-decoration: none;
      color: var(--text);
      font-weight: 600;
      font-size: 0.95rem;
      position: relative;
      transition: 0.3s;
    }

    .nav-desktop a::after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      bottom: -6px;
      left: 0;
      background: var(--primary);
      transition: 0.3s;
    }

    .nav-desktop a:hover {
      color: var(--primary);
    }

    .nav-desktop a:hover::after {
      width: 100%;
    }

    .hamburger {
      display: none;
      flex-direction: column;
      gap: 5px;
      cursor: pointer;
      padding: 8px;
    }

    .hamburger span {
      width: 28px;
      height: 3px;
      background: var(--text);
      border-radius: 3px;
      transition: 0.3s;
    }

    .hamburger.active span:nth-child(1) {
      transform: rotate(45deg) translate(6px, 6px);
    }

    .hamburger.active span:nth-child(2) {
      opacity: 0;
    }

    .hamburger.active span:nth-child(3) {
      transform: rotate(-45deg) translate(7px, -6px);
    }

    /* Mobile Menu with Close Button */
    .nav-mobile {
      position: fixed;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100vh;
      background: white;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      gap: 2rem;
      transition: 0.4s ease;
      z-index: 999;
      padding: 2rem;
    }

    .nav-mobile.active {
      left: 0;
    }

    .nav-mobile .close-btn {
      position: absolute;
      top: 1.5rem;
      right: 1.5rem;
      background: var(--primary);
      color: white;
      width: 44px;
      height: 44px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.3rem;
      cursor: pointer;
      box-shadow: 0 4px 12px rgba(201, 138, 110, 0.3);
      transition: 0.3s;
    }

    .nav-mobile .close-btn:hover {
      background: var(--secondary);
      transform: scale(1.1);
    }

    .nav-mobile a {
      font-size: 1.5rem;
      font-weight: 600;
      color: var(--text);
      text-decoration: none;
      position: relative;
    }

    .nav-mobile a::after {
      content: '';
      position: absolute;
      width: 0;
      height: 3px;
      bottom: -8px;
      left: 50%;
      background: var(--accent);
      transition: 0.3s;
      transform: translateX(-50%);
    }

    .nav-mobile a:hover::after {
      width: 60%;
    }

    @media (max-width: 992px) {
      .nav-desktop {
        display: none;
      }

      .hamburger {
        display: flex;
      }

      .header-container {
        padding: 0 1.5rem;
      }
    }

    @media (max-width: 480px) {
      .logo {
        font-size: 1.6rem;
      }

      .logo i {
        font-size: 1.5rem;
      }
    }
  </style>
</head>

<body>

  <header>
    <div class="header-container">
      <a href="?page=home" class="logo">
        <i class="fas fa-utensils"></i>
        Party<span style="color: var(--accent);">Manager</span>
      </a>

      <nav class="nav-desktop">
        <a href="?page=home">Accueil</a>
        <a href="?page=quisommenous">Qui sommes-nous ?</a>
        <a href="?page=traiteur">Traiteur</a>
        <a href="?page=faq">FAQ</a>
      </nav>

      <div class="hamburger" onclick="toggleMenu()">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>

    <!-- Mobile Navigation with Close Button -->
    <nav class="nav-mobile" id="mobileMenu">
      <div class="close-btn" onclick="toggleMenu()">×</div>
      <a href="?page=home" onclick="toggleMenu()">Accueil</a>
      <a href="?page=quisommenous" onclick="toggleMenu()">Qui sommes-nous ?</a>
      <a href="?page=traiteur" onclick="toggleMenu()">Traiteur</a>
      <a href="?page=faq" onclick="toggleMenu()">FAQ</a>
    </nav>
  </header>

  <main>

    <script>
      function toggleMenu() {
        const menu = document.getElementById('mobileMenu');
        const hamburger = document.querySelector('.hamburger');
        menu.classList.toggle('active');
        hamburger.classList.toggle('active');
        document.body.style.overflow = menu.classList.contains('active') ? 'hidden' : '';
      }

      // Close when clicking outside
      document.addEventListener('click', function(e) {
        const menu = document.getElementById('mobileMenu');
        const hamburger = document.querySelector('.hamburger');
        const closeBtn = document.querySelector('.close-btn');

        if (menu.classList.contains('active') &&
          !hamburger.contains(e.target) &&
          !menu.contains(e.target)) {
          toggleMenu();
        }
      });
    </script>