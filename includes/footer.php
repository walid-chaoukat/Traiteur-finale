<!-- footer.php -->
<style>
  .footer {
    background-color: #858638;
    color: #ffffff;
    padding: 60px 0 30px;
  }

  .footer-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 40px;
  }

  .footer-logo {
    text-align: center;
    margin-bottom: 50px;
  }

  .footer-logo-text {
    display: inline-flex;
    flex-direction: column;
    align-items: center;
  }

  .footer-logo-ay {
    font-size: 60px;
    font-weight: 700;
    color: #ffffff;
    line-height: 1;
    letter-spacing: 3px;
    position: relative;
    display: inline-block;
  }

  .footer-logo-ay::after {
    content: '';
    position: absolute;
    top: 5px;
    right: -20px;
    width: 22px;
    height: 28px;
    background-color: #ffffff;
    clip-path: polygon(20% 0%, 80% 0%, 100% 50%, 80% 100%, 20% 100%, 0% 50%);
  }

  .footer-logo-subtext {
    font-size: 16px;
    font-weight: 400;
    color: #ffffff;
    letter-spacing: 5px;
    text-transform: uppercase;
    margin-top: 8px;
  }

  .footer-nav {
    display: flex;
    justify-content: center;
    gap: 100px;
    margin-bottom: 40px;
    flex-wrap: wrap;
  }

  .footer-nav a {
    color: #ffffff;
    text-decoration: none;
    font-size: 16px;
    font-weight: 400;
    transition: color 0.3s ease;
    position: relative;
    padding-bottom: 5px;
  }

  .footer-nav a::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    width: 0;
    height: 2px;
    background-color: #858638;
    transition: all 0.3s ease;
    transform: translateX(-50%);
  }

  .footer-nav a:hover {
    color: yellow;
  }

  .footer-nav a:hover::after {
    width: 100%;
  }

  .footer-info {
    text-align: center;
    margin-bottom: 35px;
  }

  .footer-address {
    font-size: 15px;
    margin-bottom: 20px;
    font-weight: 300;
  }

  .footer-contact {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
  }

  .footer-contact a {
    color: #ffffff;
    text-decoration: none;
    font-size: 16px;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: opacity 0.3s ease;
  }

  .footer-contact a:hover {
    opacity: 0.8;
  }

  .footer-contact svg {
    width: 16px;
    height: 16px;
    fill: #ffffff;
  }

  .footer-social {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 35px;
  }

  .footer-social a {
    width: 45px;
    height: 45px;
    border: 2px solid #ffffff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
  }

  .footer-social a:hover {
    background-color: #ffffff;
  }

  .footer-social a:hover svg {
    fill: #7a8a5e;
  }

  .footer-social svg {
    width: 20px;
    height: 20px;
    fill: #ffffff;
    transition: fill 0.3s ease;
  }

  .footer-bottom {
    text-align: center;
    padding-top: 30px;
    border-top: 1px solid rgba(255, 255, 255, 0.2);
    font-size: 14px;
    font-weight: 300;
  }

  .footer-bottom a {
    color: #ffffff;
    text-decoration: none;
    margin-left: 5px;
    transition: opacity 0.3s ease;
  }

  .footer-bottom a:hover {
    opacity: 0.8;
  }

  .scroll-top {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 50px;
    height: 50px;
    background-color: #7a8a5e;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    opacity: 0;
    visibility: hidden;
    z-index: 1000;
  }

  .scroll-top.visible {
    opacity: 1;
    visibility: visible;
  }

  .scroll-top:hover {
    background-color: #5a7247;
    transform: translateY(-5px);
  }

  .scroll-top svg {
    width: 24px;
    height: 24px;
    fill: #ffffff;
  }

  @media (max-width: 768px) {
    .footer {
      padding: 40px 0 20px;
    }

    .footer-container {
      padding: 0 20px;
    }

    .footer-logo {
      margin-bottom: 35px;
    }

    .footer-logo-ay {
      font-size: 48px;
    }

    .footer-logo-subtext {
      font-size: 13px;
      letter-spacing: 4px;
    }

    .footer-nav {
      flex-direction: column;
      gap: 20px;
      margin-bottom: 30px;
    }

    .footer-address {
      font-size: 14px;
    }

    .footer-contact a {
      font-size: 15px;
    }

    .scroll-top {
      width: 45px;
      height: 45px;
      bottom: 20px;
      right: 20px;
    }
  }
</style>

<footer class="footer">
  <div class="footer-container">
    <div class="footer-logo">
      <div class="footer-logo-text">
        <div class="footer-logo-ay">AY</div>
        <div class="footer-logo-subtext">TRAITEUR</div>
      </div>
    </div>

    <nav class="footer-nav">
      <a href="apropos.php">À propos</a>
      <a href="prestations.php">Prestations</a>
      <a href="commander.php">Commander en ligne</a>
      <a href="contact.php">Écrire un mail</a>
      <a href="contact.php">Contact</a>
    </nav>

    <div class="footer-info">
      <div class="footer-address">
        Traiteur pour particuliers & professionnels à 229 rue Saint-Honoré, 75001, Paris, France
      </div>
      <div class="footer-contact">
        <a href="tel:0761801797">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56-.35-.12-.74-.03-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z" />
          </svg>
          07 61 80 17 97
        </a>
        <a href="mailto:contact@ay-traiteur.fr">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
          </svg>
          contact@ay-traiteur.fr
        </a>
      </div>
    </div>

    <div class="footer-social">
      <a href="https://facebook.com" target="_blank" rel="noopener" aria-label="Facebook">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
        </svg>
      </a>
      <a href="https://instagram.com" target="_blank" rel="noopener" aria-label="Instagram">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
        </svg>
      </a>
    </div>

    <div class="footer-bottom">
      © 2024 AY Traiteur |<a href="mentions.php">Mentions légales</a>
    </div>
  </div>
</footer>

<div class="scroll-top" id="scrollTop">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
    <path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6z" />
  </svg>
</div>

<script>
  const scrollTop = document.getElementById('scrollTop');

  window.addEventListener('scroll', function() {
    if (window.pageYOffset > 300) {
      scrollTop.classList.add('visible');
    } else {
      scrollTop.classList.remove('visible');
    }
  });

  scrollTop.addEventListener('click', function() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });
</script>

</body>

</html>