<?php
// Services Page
$persons = isset($_GET['persons']) ? intval($_GET['persons']) : 6;
$baseTotal = 70 * $persons;
?>

<!-- Services Page Section -->
<section class="services-page">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Main Title -->
    <div class="hero-section">
        <h1 class="main-title">Choisissez le service<br>que vous souhaitez réserver</h1>
        <p class="hero-subtitle">Chaque repas est bien plus qu'un simple festin, c'est un moment précieux partagé,<br>un souvenir qui se construit bouchée après bouchée</p>
    </div>

    <!-- Section Label -->
    <h2 class="section-label">1. Choix du service :</h2>

    <!-- Services List -->
    <div class="services-list">
        <!-- Chef à Domicile -->
        <div class="service-item" onclick="selectService(this, 'chef_domicile', 70, 6)">
            <div class="service-image-wrapper">
                <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=400&h=300&fit=crop" alt="Chef à Domicile" class="service-image">
                <div class="service-image-overlay">
                    <h3 class="service-image-title">Chef à Domicile</h3>
                </div>
            </div>
            <div class="service-info">
                <h4 class="service-info-title">Découvrez l'expérience d'un chef à domicile</h4>
                <p class="service-info-desc">Ce service est proposé pour un minimum de 6 personnes<br>en dessous vous payerez la différence.</p>
            </div>
            <div class="service-pricing">
                <div class="price-text">À partir de<br><span class="price-amount">70€ / pers.</span></div>
                <button class="btn-choose">Choisir</button>
            </div>
        </div>

        <!-- Traiteur (Pièces Cocktail) -->
        <div class="service-item" onclick="selectService(this, 'traiteur', 50, 10)">
            <div class="service-image-wrapper">
                <img src="https://images.unsplash.com/photo-1555244162-803834f70033?w=400&h=300&fit=crop" alt="Traiteur" class="service-image">
                <div class="service-image-overlay">
                    <h3 class="service-image-title">Traiteur</h3>
                </div>
            </div>
            <div class="service-info">
                <h4 class="service-info-title">Pièces cocktail pour vos événements</h4>
                <p class="service-info-desc">Une sélection raffinée de pièces cocktail pour impressionner<br>vos invités lors de vos réceptions.</p>
            </div>
            <div class="service-pricing">
                <div class="price-text">À partir de<br><span class="price-amount">50€ / pers.</span></div>
                <button class="btn-choose">Choisir</button>
            </div>
        </div>

        <!-- Buffets -->


        <!-- Plateaux Repas -->
        <div class="service-item" onclick="selectService(this, 'plateaux_repas', 25, 5)">
            <div class="service-image-wrapper">
                <img src="https://images.unsplash.com/photo-1547496502-affa22d38842?w=400&h=300&fit=crop" alt="Plateaux Repas" class="service-image">
                <div class="service-image-overlay">
                    <h3 class="service-image-title">Plateaux Repas</h3>
                </div>
            </div>
            <div class="service-info">
                <h4 class="service-info-title">Solution pratique pour vos réunions</h4>
                <p class="service-info-desc">Des plateaux repas complets et équilibrés, parfaits pour<br>vos événements professionnels ou privés.</p>
            </div>
            <div class="service-pricing">
                <div class="price-text">À partir de<br><span class="price-amount">25€ / pers.</span></div>
                <button class="btn-choose">Choisir</button>
            </div>
        </div>

        <div class="service-item" onclick="selectService(this, 'buffets', 45, 10)">
            <div class="service-image-wrapper">
                <img src="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?w=400&h=300&fit=crop" alt="Buffets" class="service-image">
                <div class="service-image-overlay">
                    <h3 class="service-image-title">Buffets</h3>
                </div>
            </div>
            <div class="service-info">
                <h4 class="service-info-title">Menu classique, raffiné ou prestige</h4>
                <p class="service-info-desc">Choisissez parmi nos trois formules de buffet adaptées<br>à tous vos événements et budgets.</p>
            </div>
            <div class="service-pricing">
                <div class="price-text">À partir de<br><span class="price-amount">45€ / pers.</span></div>
                <button class="btn-choose">Choisir</button>
            </div>
        </div>
    </div>

    <!-- Contact Banner -->
    <div class="contact-banner">
        <div class="contact-banner-content">
            <h3>Un besoin particulier,<br>une question ?</h3>
            <p>Des questions pour un repas de mariage ? Un événement sur mesure ?<br>Envie d'un menu personnalisé ? Nous sommes à votre écoute et nous ne<br>mordons pas ;)</p>
            <a href="?page=contact" class="btn-contact">Nous contacter</a>
        </div>
    </div>

    <!-- Hidden Form -->
    <form method="POST" id="serviceForm" style="display: none;">
        <input type="hidden" name="service" id="selectedService">
        <input type="hidden" name="persons" id="selectedPersons">
        <input type="hidden" name="base_total" id="baseTotal">
    </form>
</section>

<style>
    :root {
        --primary: #9c9e47;
        --primary-light: #f3e17d;
        --primary-dark: #7a7f38;
        --text-primary: #2d2d2d;
        --text-secondary: #666;
        --bg-light: #f5f0f0;
        --bg-banner: #d4a59a;
        --white: #ffffff;
    }

    * {
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: var(--bg-light);
        color: var(--text-primary);
        margin: 0;
        padding: 0;
    }

    .services-page {
        max-width: 100%;
        margin: 0;
        padding: 0;
    }

    /* Hero Section */
    .hero-section {
        text-align: center;
        padding: 3rem 2rem 2rem;
        background: var(--bg-light);
    }

    .main-title {
        font-size: 2.8rem;
        font-weight: 700;
        color: #4a4a4a;
        margin: 0 0 1.5rem 0;
        line-height: 1.3;
    }

    .hero-subtitle {
        font-size: 1rem;
        color: var(--text-secondary);
        line-height: 1.6;
        margin: 0;
        font-weight: 400;
    }

    /* Section Label */
    .section-label {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--text-primary);
        margin: 2rem 0 1.5rem 2rem;
    }

    /* Services List */
    .services-list {
        padding: 0 2rem 2rem;
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .service-item {
        display: grid;
        grid-template-columns: 260px 1fr 180px;
        background: var(--white);
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        cursor: pointer;
        align-items: center;
    }

    .service-item:hover {
        box-shadow: 0 4px 16px rgba(156, 158, 71, 0.15);
        transform: translateY(-2px);
    }

    /* Image Section */
    .service-image-wrapper {
        position: relative;
        height: 180px;
        overflow: hidden;
    }

    .service-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .service-image-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
        padding: 1.5rem 1rem 0.8rem;
    }

    .service-image-title {
        color: var(--white);
        font-size: 1.4rem;
        font-weight: 700;
        margin: 0;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    /* Info Section */
    .service-info {
        padding: 1.5rem 2rem;
    }

    .service-info-title {
        font-size: 1.05rem;
        font-weight: 600;
        color: var(--primary);
        margin: 0 0 0.8rem 0;
    }

    .service-info-desc {
        font-size: 0.9rem;
        color: var(--text-secondary);
        line-height: 1.5;
        margin: 0;
    }

    /* Pricing Section */
    .service-pricing {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 1.5rem;
        gap: 1rem;
    }

    .price-text {
        text-align: center;
        font-size: 0.9rem;
        color: var(--text-secondary);
        line-height: 1.4;
    }

    .price-amount {
        display: block;
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-top: 0.2rem;
    }

    .btn-choose {
        background: var(--primary);
        color: var(--white);
        border: none;
        padding: 0.8rem 2rem;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 140px;
    }

    .btn-choose:hover {
        background: var(--primary-dark);
        transform: scale(1.05);
    }

    /* Contact Banner */
    .contact-banner {
        background: linear-gradient(135deg, #fdfdf9, #f8f8f3);
        border-radius: 18px;
        padding: 2.5rem;
        margin: 2rem;
        box-shadow: 0 6px 20px rgba(156, 158, 71, 0.15);
        border: 1px solid var(--primary-light);
    }

    .contact-banner-content {
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
    }

    .contact-banner h3 {
        font-size: 1.6rem;
        font-weight: 700;
        color: var(--primary);
        margin: 0 0 1rem 0;
        line-height: 1.3;
    }

    .contact-banner p {
        font-size: 1rem;
        color: var(--text-secondary);
        line-height: 1.6;
        margin: 0 0 1.5rem 0;
    }

    .btn-contact {
        background: var(--primary-dark);
        color: var(--white);
        padding: 1rem 2.5rem;
        border-radius: 14px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        display: inline-block;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(156, 158, 71, 0.1);
    }

    .btn-contact:hover {
        background: var(--primary);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(156, 158, 71, 0.15);
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .service-item {
            grid-template-columns: 220px 1fr 160px;
        }

        .service-image-wrapper {
            height: 160px;
        }
    }

    @media (max-width: 768px) {
        .main-title {
            font-size: 2rem;
        }

        .hero-subtitle {
            font-size: 0.9rem;
        }

        .service-item {
            grid-template-columns: 1fr;
            grid-template-rows: auto auto auto;
        }

        .service-image-wrapper {
            height: 200px;
        }

        .service-info {
            padding: 1.2rem 1.5rem;
        }

        .service-pricing {
            flex-direction: row;
            justify-content: space-between;
            padding: 1rem 1.5rem 1.5rem;
        }

        .price-text {
            text-align: left;
        }

        .contact-banner h3 {
            font-size: 1.5rem;
        }

        .contact-banner p {
            font-size: 0.9rem;
        }
    }
</style>

<script>
    function selectService(card, serviceType, pricePerUnit, minPersons) {
        document.querySelectorAll('.service-item').forEach(c => c.style.borderColor = 'transparent');
        card.style.borderColor = 'var(--primary)';

        document.getElementById('selectedService').value = serviceType;
        document.getElementById('selectedPersons').value = minPersons;
        document.getElementById('baseTotal').value = (pricePerUnit * minPersons).toFixed(2);

        // Redirect to supplements page with service and persons as parameters 
        if (serviceType === "buffets") {
            window.location.href = `?page=traiteur`;
            return;

        }
        window.location.href = `?page=supplements&service=${serviceType}&persons=${minPersons}`;
    }
</script>