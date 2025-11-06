<?php // header.php - FIXED: NO WHITE LAYER, STICKY, MOBILE LOGO + HAMBURGER, VIEWPORT ADDED
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <title>AY Traiteur</title>
  <style>
    :root {
      --primary: #5a7247;
      /* Olive gold theme */
      --primary-dark: #3d4d2f;
      --bg-white: #ffffff;
      --border: #e0e0e0;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
    }

    /* Sticky Header */
    .header {
      background: var(--bg-white);
      border-bottom: 1px solid var(--border);
      position: sticky;
      top: 0;
      z-index: 1000;
      /* Above form elements */
      width: 100%;
    }

    .header-container {
      max-width: 1400px;
      margin: 0 auto;
      padding: 10px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    /* Logo - No Overlap */
    .logo {
      z-index: 1003;
      /* Above nav and hamburger */
    }

    .logo img {
      height: 60px;
      width: auto;
      display: block;
    }

    /* Desktop Nav */
    .nav {
      display: flex;
      gap: 30px;
      z-index: 1001;
      /* Below logo, above content */
    }

    .nav a {
      color: var(--primary);
      text-decoration: none;
      font-size: 16px;
      font-weight: 500;
      transition: color 0.3s;
    }

    .nav a:hover {
      color: var(--primary-dark);
    }

    /* Hamburger */
    .hamburger {
      display: none;
      flex-direction: column;
      gap: 5px;
      cursor: pointer;
      z-index: 1002;
      /* Below logo, above nav */
    }

    .hamburger span {
      width: 28px;
      height: 3px;
      background: var(--primary);
      transition: transform 0.3s, opacity 0.3s;
    }

    .hamburger.active span:nth-child(1) {
      transform: rotate(45deg) translate(7px, 7px);
    }

    .hamburger.active span:nth-child(2) {
      opacity: 0;
    }

    .hamburger.active span:nth-child(3) {
      transform: rotate(-45deg) translate(7px, -7px);
    }

    /* Mobile Nav */
    @media (max-width: 768px) {
      .header-container {
        padding: 10px 20px;
      }

      .nav {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: var(--bg-white);
        flex-direction: column;
        justify-content: center;
        align-items: center;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.35s ease;
        z-index: 999;
        /* Below header */
      }

      .nav.active {
        max-height: 100vh;
      }

      .nav a {
        padding: 20px;
        width: 100%;
        text-align: center;
        font-size: 18px;
        border-bottom: 1px solid var(--border);
        display: block;
        opacity: 1;
      }

      .hamburger {
        display: flex;
      }
    }
  </style>
</head>

<body>
  <header class="header">
    <div class="header-container">
      <div class="logo">
        <img src="./assets/images/logo.png" alt="AY Traiteur">
      </div>
      <nav class="nav" id="nav">
        <a href="index.php">Accueil</a>
        <a href="?page=about">À propos</a>
        <a href="?page=services">Services</a>
        <a href="contact.php">Contact</a>
      </nav>
      <div class="hamburger" id="hamburger">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </header>
  <script>
    const hamburger = document.getElementById('hamburger');
    const nav = document.getElementById('nav');

    // Toggle nav on hamburger click
    hamburger.addEventListener('click', e => {
      e.stopPropagation();
      hamburger.classList.toggle('active');
      nav.classList.toggle('active');
    });

    // Close nav on outside click
    document.addEventListener('click', e => {
      if (!nav.contains(e.target) && !hamburger.contains(e.target) && nav.classList.contains('active')) {
        hamburger.classList.remove('active');
        nav.classList.remove('active');
      }
    });

    // Ensure links are visible
    nav.addEventListener('transitionend', () => {
      if (nav.classList.contains('active')) {
        nav.querySelectorAll('a').forEach(link => {
          link.style.opacity = '1';
          link.style.display = 'block';
        });
      }
    });
  </script>