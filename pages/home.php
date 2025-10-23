<style>
  :root {
    --primary: #888a3a;
    --secondary: #f3e17d;
    --text-dark: #2d2d2d;
    --text-light: #ffffff;
    --bg-light: #fafaf8;
    --shadow: 0 10px 30px rgba(136, 138, 58, 0.15);
    --transition: all 0.3s ease;
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
  }

  /* Hero Section */
  .hero {
    position: relative;
    min-height: 100vh;
    background: linear-gradient(rgba(136, 138, 58, 0.85), rgba(136, 138, 58, 0.75)),
      url('https://images.unsplash.com/photo-1519167758481-83f550bb49b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: var(--text-light);
    padding: 2rem;
  }

  .hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(243, 225, 125, 0.3) 0%, transparent 70%);
    z-index: 1;
  }

  .hero-content {
    position: relative;
    z-index: 2;
    max-width: 900px;
    animation: fadeInUp 1s ease-out;
  }

  .hero h1 {
    font-size: 4.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
    text-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    letter-spacing: -1px;
  }

  .hero p {
    font-size: 1.4rem;
    margin-bottom: 2rem;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
    opacity: 0.95;
  }

  .cta-button {
    display: inline-block;
    background: var(--secondary);
    color: var(--text-dark);
    padding: 1rem 2.5rem;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    box-shadow: var(--shadow);
    transition: var(--transition);
    font-size: 1.1rem;
    letter-spacing: 0.5px;
  }

  .cta-button:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(243, 225, 125, 0.4);
    background: #fff;
  }

  /* Features Grid */
  .features {
    padding: 5rem 2rem;
    background: #fff;
  }

  .container {
    max-width: 1200px;
    margin: 0 auto;
  }

  .section-title {
    text-align: center;
    margin-bottom: 3rem;
    font-size: 2.8rem;
    color: var(--primary);
    position: relative;
  }

  .section-title::after {
    content: '';
    width: 80px;
    height: 4px;
    background: var(--secondary);
    display: block;
    margin: 1rem auto;
    border-radius: 2px;
  }

  .features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2.5rem;
  }

  .feature-card {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: var(--shadow);
    transition: var(--transition);
    position: relative;
  }

  .feature-card:hover {
    transform: translateY(-15px);
    box-shadow: 0 20px 40px rgba(136, 138, 58, 0.2);
  }

  .feature-img {
    height: 220px;
    overflow: hidden;
  }

  .feature-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: var(--transition);
  }

  .feature-card:hover .feature-img img {
    transform: scale(1.1);
  }

  .feature-content {
    padding: 1.8rem;
  }

  .feature-content h3 {
    color: var(--primary);
    margin-bottom: 0.8rem;
    font-size: 1.5rem;
  }

  .feature-content p {
    color: #666;
    font-size: 1rem;
  }

  /* How It Works */
  .how-it-works {
    padding: 5rem 2rem;
    background: linear-gradient(135deg, #f9f9f5 0%, #fff 100%);
  }

  .steps {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    counter-reset: step;
  }

  .step {
    text-align: center;
    position: relative;
    padding: 2rem 1rem;
  }

  .step::before {
    counter-increment: step;
    content: "0" counter(step);
    display: block;
    width: 70px;
    height: 70px;
    background: var(--primary);
    color: white;
    font-size: 1.8rem;
    font-weight: 700;
    border-radius: 50%;
    margin: 0 auto 1.5rem;
    line-height: 70px;
    box-shadow: 0 8px 20px rgba(136, 138, 58, 0.3);
  }

  .step h3 {
    color: var(--primary);
    margin-bottom: 1rem;
    font-size: 1.4rem;
  }

  /* Testimonials */
  .testimonials {
    padding: 5rem 2rem;
    background: var(--primary);
    color: white;
  }

  .testimonials .section-title {
    color: var(--secondary);
  }

  .testimonials .section-title::after {
    background: var(--secondary);
  }

  .testimonial-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
  }

  .testimonial {
    background: rgba(255, 255, 255, 0.1);
    padding: 2rem;
    border-radius: 15px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(243, 225, 125, 0.2);
  }

  .testimonial p {
    font-style: italic;
    margin-bottom: 1.5rem;
    line-height: 1.8;
  }

  .author {
    display: flex;
    align-items: center;
  }

  .author img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-right: 1rem;
    border: 3px solid var(--secondary);
  }

  .author-info h4 {
    color: var(--secondary);
    margin-bottom: 0.3rem;
  }

  /* CTA Final */
  .final-cta {
    padding: 5rem 2rem;
    text-align: center;
    background: url('https://images.unsplash.com/photo-1505373877841-8d25f22d582d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;
    position: relative;
    color: white;
  }

  .final-cta::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(136, 138, 58, 0.9);
  }

  .final-cta-content {
    position: relative;
    z-index: 2;
    max-width: 800px;
    margin: 0 auto;
  }

  .final-cta h2 {
    font-size: 3rem;
    margin-bottom: 1.5rem;
    color: var(--secondary);
  }

  /* Responsive */
  @media (max-width: 992px) {
    .hero h1 {
      font-size: 3.5rem;
    }

    .hero p {
      font-size: 1.2rem;
    }
  }

  @media (max-width: 768px) {
    .hero {
      min-height: 80vh;
      padding: 1rem;
    }

    .hero h1 {
      font-size: 2.8rem;
    }

    .section-title {
      font-size: 2.3rem;
    }

    .features,
    .how-it-works,
    .testimonials,
    .final-cta {
      padding: 3rem 1rem;
    }
  }

  @media (max-width: 480px) {
    .hero h1 {
      font-size: 2.3rem;
    }

    .cta-button {
      padding: 0.8rem 2rem;
      font-size: 1rem;
    }
  }

  /* Animations */
  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(30px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .fade-in {
    opacity: 0;
    transform: bit translateY(20px);
    transition: all 0.6s ease;
  }

  .fade-in.visible {
    opacity: 1;
    transform: translateY(0);
  }
</style>

<!-- HERO SECTION -->
<section class="hero">
  <div class="hero-content">
    <h1>Planifiez Vos Événements Parfaitement</h1>
    <p>Gérez vos soirées, mariages, anniversaires et événements d'entreprise avec style et simplicité. Votre traiteur de confiance pour des moments inoubliables.</p>
    <a href="#contact" class="cta-button">Réservez Maintenant</a>
  </div>
</section>

<!-- FEATURES SECTION -->
<section class="features">
  <div class="container">
    <h2 class="section-title">Nos Services Premium</h2>
    <div class="features-grid">
      <div class="feature-card fade-in">
        <div class="feature-img">
          <img src="https://images.unsplash.com/photo-1555244162-803834f70033?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Mariages">
        </div>
        <div class="feature-content">
          <h3>Mariages de Rêve</h3>
          <p>Des menus personnalisés et un service impeccable pour faire de votre grand jour un moment magique.</p>
        </div>
      </div>

      <div class="feature-card fade-in">
        <div class="feature-img">
          <img src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Événements d'entreprise">
        </div>
        <div class="feature-content">
          <h3>Événements Corporate</h3>
          <p>Cocktails, séminaires, lancements de produits - professionnalisme et raffinement garantis.</p>
        </div>
      </div>

      <div class="feature-card fade-in">
        <div class="feature-img">
          <img src="https://images.unsplash.com/photo-1464366400600-7168bc0ebe71?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Soirées privées">
        </div>
        <div class="feature-content">
          <h3>Soirées Privées</h3>
          <p>Anniversaires, dîners intimes, célébrations familiales - dans l'ambiance que vous désirez.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- HOW IT WORKS -->
<section class="how-it-works">
  <div class="container">
    <h2 class="section-title">Comment Ça Marche</h2>
    <div class="steps">
      <div class="step">
        <h3>Choisissez Votre Événement</h3>
        <p>Sélectionnez le type de célébration et le nombre d'invités</p>
      </div>
      <div class="step">
        <h3>Personnalisez Votre Menu</h3>
        <p>Composez votre repas avec nos chefs experts</p>
      </div>
      <div class="step">
        <h3>Réservez & Relaxez</h3>
        <p>On s'occupe de tout, vous profitez de la fête</p>
      </div>
    </div>
  </div>
</section>

<!-- TESTIMONIALS -->
<section class="testimonials">
  <div class="container">
    <h2 class="section-title">Ce Que Disent Nos Clients</h2>
    <div class="testimonial-grid">
      <div class="testimonial">
        <p>"Un service exceptionnel ! Notre mariage était parfait grâce à leur équipe professionnelle et attentionnée."</p>
        <div class="author">
          <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Marie L.">
          <div class="author-info">
            <h4>Marie L.</h4>
            <small>Mariée, Juin 2025</small>
          </div>
        </div>
      </div>

      <div class="testimonial">
        <p>"La meilleure décision pour notre événement d'entreprise. Qualité irréprochable et présentation magnifique."</p>
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
<section class="final-cta">
  <div class="final-cta-content">
    <h2>Prêt à Créer des Souvenirs Inoubliables ?</h2>
    <p>Contactez-nous dès aujourd'hui pour une consultation gratuite</p>
    <a href="#contact" class="cta-button" style="background: var(--secondary); color: var(--text-dark);">Demander un Devis</a>
  </div>
</section>