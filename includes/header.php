<!-- header.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AY Traiteur</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      line-height: 1.6;
    }

    .header {
      background-color: #ffffff;
      border-bottom: 1px solid #e0e0e0;
      padding: 20px 0;
      position: relative;
    }

    .header-container {
      max-width: 1400px;
      margin: 0 auto;
      padding: 0 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      display: flex;
      align-items: center;
    }

    .logo img {
      height: 80px;
      width: auto;
    }

    .logo-text {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .logo-ay {
      font-size: 48px;
      font-weight: 700;
      color: #5a7247;
      line-height: 1;
      letter-spacing: 2px;
    }

    .logo-leaf {
      position: relative;
      display: inline-block;
    }

    .logo-leaf::after {
      content: '';
      position: absolute;
      top: -5px;
      right: -15px;
      width: 20px;
      height: 25px;
      background-color: #5a7247;
      clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);
      transform: rotate(45deg);
    }

    .logo-subtext {
      font-size: 14px;
      font-weight: 400;
      color: #5a7247;
      letter-spacing: 4px;
      text-transform: uppercase;
      margin-top: 5px;
    }

    .nav {
      display: flex;
      gap: 50px;
      align-items: center;
    }

    .nav a {
      color: #5a7247;
      text-decoration: none;
      font-size: 16px;
      font-weight: 400;
      transition: color 0.3s ease;
      position: relative;
    }

    .nav a:hover {
      color: #3d4d2f;
    }

    .hamburger {
      display: none;
      flex-direction: column;
      cursor: pointer;
      gap: 5px;
    }

    .hamburger span {
      width: 30px;
      height: 3px;
      background-color: #5a7247;
      transition: all 0.3s ease;
    }

    .hamburger.active span:nth-child(1) {
      transform: rotate(45deg) translate(8px, 8px);
    }

    .hamburger.active span:nth-child(2) {
      opacity: 0;
    }

    .hamburger.active span:nth-child(3) {
      transform: rotate(-45deg) translate(7px, -7px);
    }

    .info-bar {
      background-color: #f8f8f8;
      text-align: center;
      padding: 20px;
      font-size: 16px;
      color: #333;
      border-bottom: 1px solid #e0e0e0;
    }

    .info-bar strong {
      font-weight: 600;
    }

    .info-subtitle {
      font-size: 14px;
      color: #666;
      margin-top: 5px;
    }

    @media (max-width: 768px) {
      .header-container {
        padding: 0 20px;
      }

      .logo-ay {
        font-size: 36px;
      }

      .logo-subtext {
        font-size: 11px;
        letter-spacing: 3px;
      }

      .nav {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background-color: #ffffff;
        flex-direction: column;
        gap: 0;
        padding: 0;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      }

      .nav.active {
        max-height: 300px;
      }

      .nav a {
        padding: 20px;
        width: 100%;
        text-align: center;
        border-bottom: 1px solid #e0e0e0;
      }

      .hamburger {
        display: flex;
      }

      .info-bar {
        font-size: 14px;
        padding: 15px;
      }

      .info-subtitle {
        font-size: 12px;
      }
    }
  </style>
</head>

<body>

  <header class="header">
    <div class="header-container">
      <div class="logo">
        <img src="/assets/images/logo.png" alt="Logo">
      </div>

      <nav class="nav" id="nav">
        <a href="index.php">Acceuil</a>
        <a href="?page=about">À propos</a>
        <a href="?page=traiteur">Traiteur</a>
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

    hamburger.addEventListener('click', function() {
      hamburger.classList.toggle('active');
      nav.classList.toggle('active');
    });
  </script>