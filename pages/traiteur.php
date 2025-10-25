<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f5f0e8;
        line-height: 1.6;
        color: #4a4a4a;
    }

    .traiteur-page {
        max-width: 1400px;
        margin: 0 auto;
    }

    /* Hero Banner */
    .hero-banner {
        position: relative;
        height: 300px;
        overflow: hidden;
        margin-bottom: 40px;
    }

    .hero-banner img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(122, 138, 94, 0.8), rgba(139, 155, 111, 0.7));
        z-index: 1;
    }

    .hero-title {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 2;
        color: #ffffff;
        font-size: 56px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 3px;
    }

    /* Service Card */
    .service-card {
        background: #ffffff;
        border-radius: 15px;
        padding: 25px 40px;
        margin: 0 20px 40px;
        box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
    }

    .service-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .service-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .service-number {
        font-size: 18px;
        font-weight: 700;
        color: #7a8a5e;
    }

    .service-name {
        font-size: 18px;
        font-weight: 600;
        color: #4a4a4a;
    }

    .btn-modify {
        padding: 10px 30px;
        background-color: transparent;
        color: #7a8a5e;
        border: 2px solid #7a8a5e;
        border-radius: 25px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-modify:hover {
        background-color: #7a8a5e;
        color: #ffffff;
    }

    /* Formules Section */
    .formules-section {
        padding: 0 20px 60px;
    }

    .section-header {
        margin-bottom: 30px;
    }

    .section-title {
        font-size: 32px;
        font-weight: 700;
        color: #7a8a5e;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .intro-text {
        background-color: #fff8e6;
        border-left: 4px solid #d4c896;
        padding: 20px 25px;
        margin-bottom: 40px;
        border-radius: 8px;
    }

    .intro-text p {
        font-size: 15px;
        line-height: 1.8;
        color: #4a4a4a;
    }

    .intro-text strong {
        color: #7a8a5e;
        font-weight: 700;
    }

    /* Formule Block (Updated to match image) */
    .formule-block {
        background: #ffffff;
        border-radius: 15px;
        padding: 20px;
        margin: 0 10px 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        display: inline-block;
        vertical-align: top;
        width: 30%;
        text-align: center;
    }

    .formule-block.classique {
        background: #fff;
    }

    .formule-block.rafine {
        background: #e6e8d9;
    }

    .formule-block.prestige {
        background: #fff;
    }

    .formule-content-wrapper {
        margin-bottom: 20px;
    }

    .formule-header-block {
        margin-bottom: 15px;
    }

    .formule-title {
        font-size: 24px;
        font-weight: 700;
        color: #7a8a5e;
        text-transform: uppercase;
        margin-bottom: 5px;
    }

    .formule-subtitle {
        font-size: 14px;
        color: #666;
        font-style: italic;
    }

    .formule-list {
        list-style: none;
        margin-bottom: 15px;
        text-align: left;
        padding-left: 20px;
    }

    .formule-list li {
        padding: 5px 0;
        font-size: 14px;
        color: #4a4a4a;
        display: flex;
        align-items: center;
        position: relative;
        padding-left: 25px;
    }

    .formule-list li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: #7a8a5e;
        font-weight: bold;
        font-size: 16px;
    }

    .formule-footer-block {
        padding-top: 10px;
    }

    .formule-price-box {
        margin-bottom: 10px;
    }

    .price-label {
        font-size: 12px;
        color: #888;
        margin-bottom: 2px;
    }

    .price-amount {
        font-size: 20px;
        font-weight: 700;
        color: #7a8a5e;
    }

    .btn-details {
        padding: 8px 20px;
        background: #d4c896;
        color: #4a4a4a;
        text-decoration: none;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-details:hover {
        background: #c0b587;
        color: #fff;
    }

    /* Notice Box */
    .notice-box {
        background-color: #fff3cd;
        border-left: 4px solid #ffc107;
        padding: 20px 25px;
        margin-top: 40px;
        border-radius: 8px;
    }

    .notice-box p {
        font-size: 15px;
        color: #856404;
        line-height: 1.7;
    }

    .notice-box strong {
        font-weight: 700;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-banner {
            height: 200px;
        }

        .hero-title {
            font-size: 36px;
        }

        .service-card {
            padding: 20px;
            margin: 0 15px 30px;
        }

        .service-header {
            flex-direction: column;
            gap: 15px;
            align-items: flex-start;
        }

        .formules-section {
            padding: 0 15px 40px;
        }

        .section-title {
            font-size: 24px;
        }

        .formule-block {
            width: 100%;
            margin: 0 0 20px;
        }

        .btn-details {
            width: 100%;
            text-align: center;
        }
    }
</style>


<section class="traiteur-page">
    <!-- Hero Banner -->
    <div class="hero-banner" data-aos="fade-down" data-aos-duration="800">
        <div class="hero-overlay"></div>
        <img src="https://images.unsplash.com/photo-1555244162-803834f70033?w=1200&h=300&fit=crop" alt="Traiteur">
        <h1 class="hero-title">Traiteur</h1>
    </div>

    <!-- Service Selection Card -->
    <div class="service-card" data-aos="fade-up" data-aos-duration="600">
        <div class="service-header">
            <div class="service-info">
                <span class="service-number">1. Service :</span>
                <span class="service-name">Traiteur</span>
            </div>
            <button class="btn-modify">Modifier</button>
        </div>
    </div>

    <!-- Formules Section -->
    <div class="formules-section">
        <div class="section-header" data-aos="fade-up" data-aos-duration="600">
            <h2 class="section-title">2. Choix de la formule</h2>
        </div>

        <div class="intro-text" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100">
            <p>
                Nos formules sont clef en main : vaisselle eco responsable fournie (assiettes, couverts, serviettes).
                Livré à l'adresse de votre choix 2h avant l'événement (uniquement en Île-de-France).
                <strong>Minimum 12 personnes.</strong>
            </p>
        </div>

        <div class="formule-cards-grid">
            <!-- Formule Classique -->
            <div class="formule-block classique" data-aos="fade-right" data-aos-duration="800" data-aos-delay="200">
                <div class="formule-content-wrapper">
                    <div class="formule-header-block">
                        <h3 class="formule-title">Classique</h3>
                        <p class="formule-subtitle">à partir de 29,90€ TTC</p>
                    </div>
                    <ul class="formule-list">
                        <li>3 entrées</li>
                        <li>2 plats + garniture</li>
                        <li>Pain</li>
                        <li>2 desserts</li>
                    </ul>
                </div>
                <div class="formule-footer-block">
                    <div class="formule-price-box">
                        <p class="price-label">À partir de</p>
                        <p class="price-amount">29,90€ TTC</p>
                    </div>
                    <a href="?page=details&category=classique" class="btn-details">Voir le menu</a>
                </div>
            </div>

            <!-- Formule Raffiné -->
            <div class="formule-block rafine" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
                <div class="formule-content-wrapper">
                    <div class="formule-header-block">
                        <h3 class="formule-title">Raffiné</h3>
                        <p class="formule-subtitle">à partir de 35,90€ TTC</p>
                    </div>
                    <ul class="formule-list">
                        <li>3 entrées premium</li>
                        <li>2 plats signature + garnitures</li>
                        <li>Pain</li>
                        <li>2 desserts</li>
                    </ul>
                </div>
                <div class="formule-footer-block">
                    <div class="formule-price-box">
                        <p class="price-label">À partir de</p>
                        <p class="price-amount">35,90€ TTC</p>
                    </div>
                    <a href="?page=details&category=rafine" class="btn-details">Voir le menu</a>
                </div>
            </div>

            <!-- Formule Prestige -->
            <div class="formule-block prestige" data-aos="fade-left" data-aos-duration="800" data-aos-delay="400">
                <div class="formule-content-wrapper">
                    <div class="formule-header-block">
                        <h3 class="formule-title">Prestige</h3>
                        <p class="formule-subtitle">à partir de 39,90€ TTC</p>
                    </div>
                    <ul class="formule-list">
                        <li>3 entrées premium</li>
                        <li>2 plats signature + garnitures</li>
                        <li>Pain</li>
                        <li>2 desserts</li>
                    </ul>
                </div>
                <div class="formule-footer-block">
                    <div class="formule-price-box">
                        <p class="price-label">À partir de</p>
                        <p class="price-amount">39,90€ TTC</p>
                    </div>
                    <a href="?page=details&category=prestige" class="btn-details">Voir le menu</a>
                </div>
            </div>
        </div>

        <!-- Notice -->
        <div class="notice-box" data-aos="fade-up" data-aos-duration="600" data-aos-delay="500">
            <p>
                <strong>Attention</strong> le mobilier, vaisselle (exemple: buffet...), n'est pas inclus dans la formule.
                Ces suppléments sont proposés avant la validation de votre demande dans les pages suivantes.
            </p>
        </div>
    </div>
</section>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        once: true,
        duration: 800,
        easing: 'ease-out'
    });
</script>