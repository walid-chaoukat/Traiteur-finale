<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Helvetica Neue', Arial, sans-serif;
        background: #ffffff;
        color: #333;
        overflow-x: hidden;
    }

    .header-section {
        text-align: center;
        padding: 60px 20px 40px;
        background: linear-gradient(135deg, #f3e17d 0%, #ffffff 100%);
    }

    h1 {
        font-size: clamp(2.5rem, 6vw, 4.5rem);
        color: #888a3a;
        margin-bottom: 40px;
        font-weight: 900;
        letter-spacing: 1px;
    }

    .notice-box {
        background: #888a3a;
        color: white;
        padding: 25px;
        border-radius: 15px;
        margin: 0 auto 30px;
        max-width: 800px;
        box-shadow: 0 10px 30px rgba(136, 138, 58, 0.2);
    }

    .notice-box p {
        margin-bottom: 10px;
        font-size: 1rem;
        line-height: 1.6;
    }

    .notice-box a {
        color: #f3e17d;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s;
    }

    .notice-box a:hover {
        text-decoration: underline;
    }

    .info-box {
        background: white;
        padding: 20px;
        border-radius: 15px;
        margin: 0 auto 30px;
        max-width: 800px;
        border: 2px solid #888a3a;
    }

    .info-box p {
        margin-bottom: 10px;
        font-weight: bold;
        color: #888a3a;
    }

    .intro-text {
        max-width: 900px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .intro-text p {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #555;
        margin-bottom: 15px;
    }

    .gallery-section {
        padding: 100px 20px;
        background: #ffffff;
    }

    .section-title {
        font-size: clamp(2rem, 5vw, 4rem);
        text-align: center;
        margin-bottom: 80px;
        color: #888a3a;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 3px;
        position: relative;
        padding-bottom: 20px;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 4px;
        background: #888a3a;
    }

    .masonry-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
        max-width: 1400px;
        margin: 0 auto;
    }

    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 20px;
        cursor: pointer;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        background: #ffffff;
        box-shadow: 0 10px 30px rgba(136, 138, 58, 0.15);
    }

    .gallery-item:nth-child(1) {
        grid-row: span 2;
    }

    .gallery-item:nth-child(4) {
        grid-row: span 2;
    }

    .gallery-item:nth-child(5) {
        grid-column: span 2;
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);
        filter: brightness(0.95);
    }

    .gallery-item:hover {
        transform: scale(1.02);
        z-index: 10;
        box-shadow: 0 20px 60px rgba(136, 138, 58, 0.3);
    }

    .gallery-item:hover img {
        transform: scale(1.1);
        filter: brightness(1.05);
    }

    .gallery-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to top, rgba(136, 138, 58, 0.95) 0%, rgba(243, 225, 125, 0.7) 50%, transparent 100%);
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 30px;
        opacity: 0;
        transition: opacity 0.5s ease;
    }

    .gallery-item:hover .gallery-overlay {
        opacity: 1;
    }

    .gallery-title {
        font-size: 2rem;
        font-weight: 900;
        color: #ffffff;
        margin-bottom: 10px;
        transform: translateY(20px);
        transition: transform 0.5s ease;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .gallery-item:hover .gallery-title {
        transform: translateY(0);
    }

    .gallery-description {
        font-size: 1rem;
        color: #ffffff;
        transform: translateY(20px);
        transition: transform 0.5s ease 0.1s;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
    }

    .gallery-item:hover .gallery-description {
        transform: translateY(0);
    }

    .gallery-btn {
        margin-top: 15px;
        padding: 12px 30px;
        background: #ffffff;
        color: #888a3a;
        border: 2px solid #888a3a;
        border-radius: 50px;
        font-weight: bold;
        cursor: pointer;
        transform: translateY(20px);
        transition: all 0.5s ease 0.2s;
        width: fit-content;
    }

    .gallery-item:hover .gallery-btn {
        transform: translateY(0);
    }

    .gallery-btn:hover {
        background: #888a3a;
        color: #ffffff;
    }

    @media (max-width: 768px) {
        .masonry-grid {
            grid-template-columns: 1fr;
        }

        .gallery-item:nth-child(1),
        .gallery-item:nth-child(4) {
            grid-row: span 1;
        }

        .gallery-item:nth-child(5) {
            grid-column: span 1;
        }
    }
</style>
<section>
    <div class="header-section">
        <h1>Bienvenue chez l'As du Fouet</h1>



        <div class="info-box">
            <p>MERCI DE NOUS CONTACTER PAR TÉLÉPHONE, MAIL OU WHAT'S APP.</p>
            <p>LES MENUS SONT MIS À JOUR RÉGULIÈREMENT.</p>
        </div>

        <div class="intro-text">
            <p>Chez l'As du fouet, on adore réinventer avec une passion pour des produits de qualité. On s'engage à offrir des créations qui émerveilleront vos papilles et titilleront votre créativité.</p>
            <p>Notre style qui mélange tradition et modernité, se retrouve dans chacun de nos services, vous promettant une expérience culinaire unique.</p>
            <p>Réalisez votre devis en ligne gratuitement et venez partager avec nous une aventure gourmande.</p>
        </div>
    </div>

    <div class="gallery-section">
        <h2 class="section-title">Nos Services</h2>
        <div class="masonry-grid">
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=800&q=80" alt="Chef à Domicile">
                <div class="gallery-overlay">
                    <div class="gallery-title">Chef à Domicile</div>
                    <div class="gallery-description">Découvrez l'expérience d'un chef à domicile</div>
                    <button class="gallery-btn">En savoir plus</button>
                </div>
            </div>

            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1551218808-94e220e084d2?w=800&q=80" alt="Chef à Demeure">
                <div class="gallery-overlay">
                    <div class="gallery-title">Chef à Demeure</div>
                    <div class="gallery-description">Plus envie de passer votre temps en cantine ?</div>
                    <button class="gallery-btn">En savoir plus</button>
                </div>
            </div>

            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?w=800&q=80" alt="Cours de Cuisine">
                <div class="gallery-overlay">
                    <div class="gallery-title">Cours de Cuisine</div>
                    <div class="gallery-description">Apprenez à cuisiner à plusieurs</div>
                    <button class="gallery-btn">En savoir plus</button>
                </div>
            </div>

            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1555244162-803834f70033?w=800&q=80" alt="Traiteur">
                <div class="gallery-overlay">
                    <div class="gallery-title">Traiteur</div>
                    <div class="gallery-description">Une offre destinée à tous vos évènements</div>
                    <button class="gallery-btn">En savoir plus</button>
                </div>
            </div>

            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=800&q=80" alt="Cuisine">
                <div class="gallery-overlay">
                    <div class="gallery-title">Produits de Qualité</div>
                    <div class="gallery-description">Des créations qui émerveilleront vos papilles</div>
                    <button class="gallery-btn">Découvrir</button>
                </div>
            </div>
        </div>
    </div>
</section>