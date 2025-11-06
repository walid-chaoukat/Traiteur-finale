<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
<style>
  :root {
    --primary: #888a3a;
    --secondary: #f3e17d;
    --text-dark: #2d2d2d;
    --text-light: #ffffff;
    --bg-light: #fafaf8;
    --shadow: 0 10px 30px rgba(136, 138, 58, 0.15);
    --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  }

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: 'Poppins', sans-serif;
    background: var(--bg-light);
    color: var(--text-dark);
    line-height: 1.7;
    overflow-x: hidden;
    margin: 0;
    padding: 0;
  }

  /* Hero Section */
  .hero {
    position: relative;
    min-height: 100vh;
    background: linear-gradient(135deg, rgba(136, 138, 58, 0.9), rgba(136, 138, 58, 0.7)),
      url('https://images.unsplash.com/photo-1519167758481-83f550bb49b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80') center/cover no-repeat fixed;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: var(--text-light);
    padding: 2rem;
    overflow: hidden;
  }

  .hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(ellipse at top, rgba(243, 225, 125, 0.3), transparent 60%);
    z-index: 1;
    animation: pulse 8s ease-in-out infinite;
  }

  @keyframes pulse {

    0%,
    100% {
      opacity: 0.5;
    }

    50% {
      opacity: 0.8;
    }
  }

  .hero-content {
    position: relative;
    z-index: 2;
    max-width: 950px;
    animation: fadeInUp 1s ease-out;
  }

  .hero h1 {
    font-size: clamp(2.5rem, 7vw, 5rem);
    font-weight: 700;
    margin-bottom: 1.5rem;
    text-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
    letter-spacing: -2px;
    line-height: 1.1;
  }

  .hero p {
    font-size: clamp(1.1rem, 2vw, 1.5rem);
    margin-bottom: 2.5rem;
    max-width: 750px;
    margin-left: auto;
    margin-right: auto;
    opacity: 0.95;
    font-weight: 300;
  }

  .cta-group {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
  }

  .cta-button {
    display: inline-block;
    background: var(--secondary);
    color: var(--text-dark);
    padding: 1.2rem 3rem;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    box-shadow: 0 10px 30px rgba(243, 225, 125, 0.4);
    transition: var(--transition);
    font-size: 1.1rem;
    letter-spacing: 0.5px;
    position: relative;
    overflow: hidden;
  }

  .cta-button::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.5);
    transform: translate(-50%, -50%);
    transition: width 0.6s, height 0.6s;
  }

  .cta-button:hover::before {
    width: 300px;
    height: 300px;
  }

  .cta-button:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(243, 225, 125, 0.5);
  }

  .cta-button-outline {
    background: transparent;
    color: white;
    border: 2px solid white;
    box-shadow: none;
  }

  .cta-button-outline:hover {
    background: white;
    color: var(--primary);
  }

  .scroll-indicator {
    position: absolute;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    z-index: 3;
    animation: bounce 2s infinite;
  }

  .scroll-indicator::after {
    content: '↓';
    font-size: 2rem;
    color: var(--secondary);
    opacity: 0.8;
  }

  @keyframes bounce {

    0%,
    20%,
    50%,
    80%,
    100% {
      transform: translateX(-50%) translateY(0);
    }

    40% {
      transform: translateX(-50%) translateY(-10px);
    }

    60% {
      transform: translateX(-50%) translateY(-5px);
    }
  }

  /* Features Grid */
  .features {
    padding: 6rem 2rem;
    background: linear-gradient(180deg, #fff 0%, #fafaf8 100%);
  }

  .container {
    max-width: 1300px;
    margin: 0 auto;
  }

  .section-title {
    text-align: center;
    margin-bottom: 4rem;
    font-size: clamp(2rem, 5vw, 3.2rem);
    color: var(--primary);
    position: relative;
    font-weight: 700;
    letter-spacing: -1px;
  }

  .section-title::after {
    content: '';
    width: 100px;
    height: 5px;
    background: linear-gradient(90deg, transparent, var(--secondary), transparent);
    display: block;
    margin: 1.5rem auto;
    border-radius: 5px;
  }

  .features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 2.5rem;
  }

  .feature-card {
    background: #fff;
    border-radius: 25px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(136, 138, 58, 0.1);
    transition: var(--transition);
    position: relative;
    border: 1px solid rgba(136, 138, 58, 0.1);
  }

  .feature-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 5px;
    background: linear-gradient(90deg, var(--primary), var(--secondary));
    transform: scaleX(0);
    transition: var(--transition);
  }

  .feature-card:hover::before {
    transform: scaleX(1);
  }

  .feature-card:hover {
    transform: translateY(-20px);
    box-shadow: 0 25px 50px rgba(136, 138, 58, 0.25);
  }

  .feature-img {
    height: 250px;
    overflow: hidden;
    position: relative;
  }

  .feature-img::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(180deg, transparent, rgba(136, 138, 58, 0.3));
    opacity: 0;
    transition: var(--transition);
  }

  .feature-card:hover .feature-img::after {
    opacity: 1;
  }

  .feature-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: var(--transition);
  }

  .feature-card:hover .feature-img img {
    transform: scale(1.15);
  }

  .feature-content {
    padding: 2rem;
  }

  .feature-content h3 {
    color: var(--primary);
    margin-bottom: 1rem;
    font-size: 1.6rem;
    font-weight: 600;
  }

  .feature-content p {
    color: #666;
    font-size: 1rem;
    line-height: 1.8;
  }

  /* How It Works */
  .how-it-works {
    padding: 6rem 2rem;
    background: linear-gradient(135deg, rgba(136, 138, 58, 0.05) 0%, rgba(243, 225, 125, 0.05) 100%);
    position: relative;
    overflow: hidden;
  }

  .how-it-works::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -10%;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(243, 225, 125, 0.15), transparent);
    border-radius: 50%;
  }

  .steps {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 3rem;
    counter-reset: step;
    position: relative;
  }

  .step {
    text-align: center;
    position: relative;
    padding: 2.5rem 1.5rem;
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(136, 138, 58, 0.1);
    transition: var(--transition);
  }

  .step:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(136, 138, 58, 0.2);
  }

  .step::before {
    counter-increment: step;
    content: "0" counter(step);
    display: flex;
    align-items: center;
    justify-content: center;
    width: 85px;
    height: 85px;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: white;
    font-size: 2rem;
    font-weight: 700;
    border-radius: 50%;
    margin: 0 auto 2rem;
    box-shadow: 0 10px 25px rgba(136, 138, 58, 0.3);
    transition: var(--transition);
  }

  .step:hover::before {
    transform: rotate(360deg) scale(1.1);
  }

  .step h3 {
    color: var(--primary);
    margin-bottom: 1rem;
    font-size: 1.5rem;
    font-weight: 600;
  }

  .step p {
    color: #666;
    line-height: 1.8;
  }

  /* Testimonials */
  .testimonials {
    padding: 6rem 2rem;
    background: linear-gradient(135deg, var(--primary), #6d6f2f);
    color: white;
    position: relative;
    overflow: hidden;
  }

  .testimonials::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="2" cy="2" r="1" fill="rgba(243,225,125,0.1)"/></svg>');
    opacity: 0.3;
  }

  .testimonials .section-title {
    color: var(--secondary);
  }

  .testimonial-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 2.5rem;
    position: relative;
    z-index: 1;
  }

  .testimonial {
    background: rgba(255, 255, 255, 0.12);
    padding: 2.5rem;
    border-radius: 20px;
    backdrop-filter: blur(15px);
    border: 1px solid rgba(243, 225, 125, 0.3);
    transition: var(--transition);
    position: relative;
  }

  .testimonial::before {
    content: '"';
    position: absolute;
    top: 1rem;
    left: 1.5rem;
    font-size: 5rem;
    color: var(--secondary);
    opacity: 0.3;
    font-family: Georgia, serif;
  }

  .testimonial:hover {
    transform: translateY(-10px);
    background: rgba(255, 255, 255, 0.18);
    border-color: var(--secondary);
  }

  .testimonial p {
    font-style: italic;
    margin-bottom: 2rem;
    line-height: 1.9;
    position: relative;
    z-index: 1;
  }

  .author {
    display: flex;
    align-items: center;
  }

  .author img {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    margin-right: 1.2rem;
    border: 3px solid var(--secondary);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
  }

  .author-info h4 {
    color: var(--secondary);
    margin-bottom: 0.3rem;
    font-weight: 600;
    font-size: 1.1rem;
  }

  .author-info small {
    opacity: 0.8;
  }

  /* Final CTA */
  .final-cta {
    padding: 6rem 2rem;
    text-align: center;
    background: linear-gradient(135deg, rgba(136, 138, 58, 0.95), rgba(109, 111, 47, 0.9)),
      url('https://images.unsplash.com/photo-1505373877841-8d25f22d582d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80') center/cover no-repeat fixed;
    position: relative;
    color: white;
    overflow: hidden;
  }

  .final-cta::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at center, transparent, rgba(0, 0, 0, 0.3));
  }

  .final-cta-content {
    position: relative;
    z-index: 2;
    max-width: 850px;
    margin: 0 auto;
  }

  .final-cta h2 {
    font-size: clamp(2rem, 5vw, 3.5rem);
    margin-bottom: 1.5rem;
    color: var(--secondary);
    font-weight: 700;
    letter-spacing: -1px;
  }

  .final-cta p {
    font-size: clamp(1.1rem, 2vw, 1.4rem);
    margin-bottom: 2.5rem;
    opacity: 0.95;
  }

  /* Animations */
  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(40px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .fade-in {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.8s ease, transform 0.8s ease;
  }

  .fade-in.visible {
    opacity: 1;
    transform: translateY(0);
  }

  /* Responsive */
  @media (max-width: 992px) {

    .features-grid,
    .steps,
    .testimonial-grid {
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    }
  }

  @media (max-width: 768px) {
    .hero {
      min-height: 85vh;
      padding: 1rem;
    }

    .cta-group {
      flex-direction: column;
      align-items: center;
    }

    .features,
    .how-it-works,
    .testimonials,
    .final-cta {
      padding: 4rem 1.5rem;
    }

    .section-title {
      margin-bottom: 3rem;
    }
  }

  @media (max-width: 480px) {
    .cta-button {
      padding: 1rem 2rem;
      font-size: 1rem;
      width: 100%;
      max-width: 280px;
    }

    .features-grid,
    .testimonial-grid {
      gap: 1.5rem;
    }
  }
</style>

<!-- HERO SECTION -->
<section class="hero">
  <div class="hero-content">
    <h1>Planifiez Vos Événements Parfaitement</h1>
    <p>Gérez vos soirées, mariages, anniversaires et événements d'entreprise avec style et simplicité. Votre traiteur de confiance pour des moments inoubliables.</p>
    <div class="cta-group">
      <a href="#contact" class="cta-button">Réservez Maintenant</a>
      <a href="#services" class="cta-button cta-button-outline">Découvrir Nos Services</a>
    </div>
  </div>
  <div class="scroll-indicator"></div>
</section>

<!-- FEATURES SECTION -->
<section class="features" id="services">
  <div class="container">
    <h2 class="section-title">Nos Services Premium</h2>
    <div class="features-grid">
      <div class="feature-card fade-in">
        <div class="feature-img">
          <img src="https://images.unsplash.com/photo-1555244162-803834f70033?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Mariages">
        </div>
        <div class="feature-content">
          <h3>Mariages de Rêve</h3>
          <p>Des menus personnalisés et un service impeccable pour faire de votre grand jour un moment magique et inoubliable.</p>
        </div>
      </div>
      <div class="feature-card fade-in">
        <div class="feature-img">
          <img src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Événements d'entreprise">
        </div>
        <div class="feature-content">
          <h3>Événements Corporate</h3>
          <p>Cocktails, séminaires, lancements de produits - professionnalisme et raffinement garantis pour votre entreprise.</p>
        </div>
      </div>
      <div class="feature-card fade-in">
        <div class="feature-img">
          <img src="https://images.unsplash.com/photo-1464366400600-7168bc0ebe71?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Soirées privées">
        </div>
        <div class="feature-content">
          <h3>Soirées Privées</h3>
          <p>Anniversaires, dîners intimes, célébrations familiales - créez l'ambiance parfaite que vous désirez.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- HOW IT WORKS -->
<section class="how-it-works" id="how">
  <div class="container">
    <h2 class="section-title">Comment Ça Marche</h2>
    <div class="steps">
      <div class="step fade-in">
        <h3>Choisissez Votre Événement</h3>
        <p>Sélectionnez le type de célébration et le nombre d'invités pour votre occasion spéciale</p>
      </div>
      <div class="step fade-in">
        <h3>Personnalisez Votre Menu</h3>
        <p>Composez votre repas parfait avec l'aide de nos chefs experts et passionnés</p>
      </div>
      <div class="step fade-in">
        <h3>Réservez & Relaxez</h3>
        <p>On s'occupe de tout dans les moindres détails, vous profitez pleinement de la fête</p>
      </div>
    </div>
  </div>
</section>

<!-- TESTIMONIALS -->
<section class="testimonials" id="testimonials">
  <div class="container">
    <h2 class="section-title">Ce Que Disent Nos Clients</h2>
    <div class="testimonial-grid">
      <div class="testimonial fade-in">
        <p>"Un service exceptionnel ! Notre mariage était parfait grâce à leur équipe professionnelle et attentionnée. Chaque détail était soigné."</p>
        <div class="author">
          <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Marie L.">
          <div class="author-info">
            <h4>Marie L.</h4>
            <small>Mariée, Juin 2025</small>
          </div>
        </div>
      </div>
      <div class="testimonial fade-in">
        <p>"La meilleure décision pour notre événement d'entreprise. Qualité irréprochable et présentation magnifique qui a impressionné tous nos invités."</p>
        <div class="author">
          <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Thomas B.">
          <div class="author-info">
            <h4>Thomas B.</h4>
            <small>Directeur Marketing</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FINAL CTA -->
<section class="final-cta" id="contact">
  <div class="final-cta-content">
    <h2>Prêt à Créer des Souvenirs Inoubliables ?</h2>
    <p>Contactez-nous dès aujourd'hui pour une consultation gratuite et personnalisée</p>
    <a href="#contact" class="cta-button">Demander un Devis Gratuit</a>
  </div>
</section>

<script>
  // Intersection Observer for fade-in animations
  const observerOptions = {
    threshold: 0.15,
    rootMargin: '0px 0px -50px 0px'
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, observerOptions);

  document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));

  // Smooth scroll for navigation links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        target.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      }
    });
  });
</script>