<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Montserrat', sans-serif;
        background: #ffffff;
        line-height: 1.6;
    }

    /* MENU SECTION */
    .menu-section {
        padding: 80px 20px;
        background: #e8e6df;
        position: relative;
    }

    .menu-section .container {
        max-width: 1400px;
        margin: 0 auto;
        position: relative;
    }

    .section-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .section-title {
        font-family: 'Playfair Display', serif;
        font-size: 42px;
        font-weight: 600;
        color: #7a7546;
        letter-spacing: 1px;
        margin-bottom: 15px;
        text-transform: uppercase;
    }

    .section-subtitle {
        font-size: 16px;
        color: #666;
        font-weight: 400;
    }

    .cards-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 30px;
    }

    .card {
        background: #f5f3ed;
        border-radius: 20px;
        padding: 50px 40px;
        transition: transform 0.3s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        position: relative;
    }

    .card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: #9a9456;
        border-radius: 20px 20px 0 0;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card.featured {
        background: #9a9456;
        color: white;
    }

    .card.featured::before {
        background: #f5f3ed;
    }

    .card-title {
        font-family: 'Playfair Display', serif;
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 15px;
        color: #7a7546;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .card.featured .card-title {
        color: white;
    }

    .card-price {
        font-size: 18px;
        font-weight: 400;
        color: #666;
        margin-bottom: 40px;
    }

    .card.featured .card-price {
        color: rgba(255, 255, 255, 0.95);
    }

    .card-features {
        list-style: none;
        margin-bottom: 40px;
        width: 100%;
    }

    .card-features li {
        padding: 12px 0;
        font-size: 17px;
        font-weight: 400;
        color: #333;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
    }

    .card.featured .card-features li {
        color: white;
    }

    .card-features li::before {
        content: '✓';
        display: flex;
        align-items: center;
        justify-content: center;
        width: 24px;
        height: 24px;
        background: #9a9456;
        color: white;
        font-weight: bold;
        font-size: 14px;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .card.featured .card-features li::before {
        background: white;
        color: #7a7546;
    }

    .card-button {
        display: inline-block;
        background: #9a9456;
        color: #2d2d2d;
        padding: 16px 40px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: all 0.3s ease; 
        border: 0px;
    }

    .card-button:hover {
        background: #7a7546;
        transform: scale(1.05);
    }

    .card.featured .card-button {
        background: white;
        color: #7a7546;
    }

    .card.featured .card-button:hover {
        background: #f5f3ed;
    }

    /* Medium screens: 2 columns */
    @media (min-width: 768px) {
        .cards-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    /* Large screens: 3 columns */
    @media (min-width: 1200px) {
        .cards-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 767px) {
        .menu-section {
            padding: 50px 15px;
        }

        .section-title {
            font-size: 32px;
        }

        .card {
            padding: 40px 30px;
        }

        .card-title {
            font-size: 28px;
        }

        .card-features li {
            font-size: 16px;
        }
    }
</style>
</head>


<section class="menu-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Nos Menus</h2>
            <p class="section-subtitle">Découvrez nos formules gourmandes</p>
        </div>

        <div class="cards-grid">
            <div class="card">
                <h2 class="card-title">Menu<br>Classique</h2>
                <p class="card-price">à partir de 29,90€ TTC</p>
                <ul class="card-features">
                    <li>3 entrées</li>
                    <li>2 plats + garniture</li>
                    <li>Pain</li>
                    <li>2 desserts</li>
                </ul>
                <button  class="card-button">Voir le menu</button>
            </div>

            <div class="card featured">
                <h2 class="card-title">Menu<br>RAFFINÉ</h2>
                <p class="card-price">à partir de 35,90€ TTC</p>
                <ul class="card-features">
                    <li>3 entrées premium</li>
                    <li>2 plats signature + garnitures</li>
                    <li>Pain</li>
                    <li>2 desserts</li>
                </ul>
                <button  class="card-button">Voir le menu</button>
            </div>

            <div class="card">
                <h2 class="card-title">Menu<br>PRESTIGE</h2>
                <p class="card-price">à partir de 39,90€ TTC</p>
                <ul class="card-features">
                    <li>3 entrées premium</li>
                    <li>2 plats signature + garnitures</li>
                    <li>Pain</li>
                    <li>2 desserts</li>
                </ul>
                <button  class="card-button">Voir le menu</button>
            </div>
        </div>
    </div>
</section>