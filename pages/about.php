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
    }

    .apropos-section {
        padding: 80px 20px;
        max-width: 1400px;
        margin: 0 auto;
    }

    .apropos-hero {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 80px;
        align-items: center;
        margin-bottom: 100px;
    }

    .apropos-content h1 {
        font-size: 42px;
        color: #7a8a5e;
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 30px;
        letter-spacing: 2px;
    }

    .apropos-content p {
        font-size: 16px;
        color: #4a4a4a;
        line-height: 1.8;
        text-align: justify;
    }

    .apropos-content p strong {
        color: #7a8a5e;
        font-weight: 600;
    }

    .apropos-image {
        position: relative;
    }

    .apropos-image img {
        width: 100%;
        height: auto;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
    }

    .menu-cards {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        padding: 0 20px;
    }

    .menu-card {
        background: #ffffff;
        border-radius: 15px;
        padding: 40px 30px;
        text-align: center;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
    }

    .menu-card:nth-child(2) {
        background: linear-gradient(135deg, #8b9b6f 0%, #7a8a5e 100%);
        color: #ffffff;
        transform: scale(1.05);
    }

    .menu-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    .menu-card:nth-child(2):hover {
        transform: scale(1.08) translateY(-10px);
    }

    .menu-card h3 {
        font-size: 26px;
        font-weight: 700;
        color: #7a8a5e;
        margin-bottom: 10px;
    }

    .menu-card:nth-child(2) h3 {
        color: #ffffff;
    }

    .menu-card .price {
        font-size: 15px;
        color: #666;
        margin-bottom: 30px;
    }

    .menu-card:nth-child(2) .price {
        color: rgba(255, 255, 255, 0.9);
    }

    .menu-list {
        list-style: none;
        text-align: left;
        margin-bottom: 35px;
    }

    .menu-list li {
        padding: 10px 0;
        font-size: 15px;
        color: #4a4a4a;
        display: flex;
        align-items: center;
    }

    .menu-card:nth-child(2) .menu-list li {
        color: #ffffff;
    }

    .menu-list li::before {
        content: '✓';
        color: #7a8a5e;
        font-weight: bold;
        margin-right: 12px;
        font-size: 18px;
    }

    .menu-card:nth-child(2) .menu-list li::before {
        color: #ffffff;
    }

    .btn-menu {
        display: inline-block;
        padding: 12px 35px;
        background-color: #d4c896;
        color: #7a8a5e;
        text-decoration: none;
        border-radius: 25px;
        font-weight: 600;
        font-size: 15px;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .btn-menu:hover {
        background-color: #c4b886;
        transform: scale(1.05);
    }

    .menu-card:nth-child(2) .btn-menu {
        background-color: #ffffff;
        color: #7a8a5e;
    }

    .menu-card:nth-child(2) .btn-menu:hover {
        background-color: #f5f5f5;
    }

    @media (max-width: 1024px) {
        .apropos-hero {
            gap: 50px;
        }

        .menu-cards {
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .menu-card:nth-child(2) {
            transform: scale(1);
        }

        .menu-card:nth-child(2):hover {
            transform: translateY(-10px);
        }
    }

    @media (max-width: 768px) {
        .apropos-section {
            padding: 50px 20px;
        }

        .apropos-hero {
            grid-template-columns: 1fr;
            gap: 40px;
            margin-bottom: 60px;
        }

        .apropos-content h1 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        .apropos-content p {
            font-size: 15px;
        }

        .menu-card {
            padding: 30px 25px;
        }

        .menu-card h3 {
            font-size: 22px;
        }
    }
</style>


<section class="apropos-section">
    <div class="apropos-hero">
        <div class="apropos-content" data-aos="fade-right" data-aos-duration="1000">
            <h1>À propos de AY Traiteur</h1>
            <p>
                Chez <strong>AY traiteur</strong>, chaque bouchée raconte une histoire. Nous sommes un traiteur passionné, né du goût des bonnes choses, de l'envie de partager, et d'une cuisine généreuse, préparée avec soin dans notre laboratoire en Île-de-France. Tous nos plats sont faits maison, joliment dressés, prêts à être dégustés. Mariages, événements d'entreprise, repas en famille ou entre amis... nous mettons l'accent sur la simplicité, l'authenticité et le plaisir. Moins de stress, plus de saveurs : on s'occupe de tout, vous n'avez qu'à savourer.
            </p>
        </div>
        <div class="apropos-image" data-aos="fade-left" data-aos-duration="1000">
            <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?w=800&h=600&fit=crop" alt="Chef AY Traiteur">
        </div>
    </div>

    <div class="menu-cards">
        <div class="menu-card" data-aos="fade-right" data-aos-duration="800" data-aos-delay="100">
            <h3>Menu Classique</h3>
            <p class="price">à partir de 29,90€ TTC</p>
            <ul class="menu-list">
                <li>3 entrées</li>
                <li>2 plats + garniture</li>
                <li>Pain</li>
                <li>2 desserts</li>
            </ul>
            <a href="menu.php" class="btn-menu">Voir le menu</a>
        </div>

        <div class="menu-card" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
            <h3>Menu RAFFINÉ</h3>
            <p class="price">à partir de 35,90€ TTC</p>
            <ul class="menu-list">
                <li>3 entrées premium</li>
                <li>2 plats signature + garnitures</li>
                <li>Pain</li>
                <li>2 desserts</li>
            </ul>
            <a href="menu.php" class="btn-menu">Voir le menu</a>
        </div>

        <div class="menu-card" data-aos="fade-left" data-aos-duration="800" data-aos-delay="300">
            <h3>Menu PRESTIGE</h3>
            <p class="price">à partir de 39,90€ TTC</p>
            <ul class="menu-list">
                <li>3 entrées premium</li>
                <li>2 plats signature + garnitures</li>
                <li>Pain</li>
                <li>2 desserts</li>
            </ul>
            <a href="menu.php" class="btn-menu">Voir le menu</a>
        </div>
    </div>
</section>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        once: true,
        duration: 1000,
        easing: 'ease-out'
    });
</script>