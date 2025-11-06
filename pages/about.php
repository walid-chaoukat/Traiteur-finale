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
            margin-bottom: 80px;
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

        .cta-section {
            text-align: center;
            margin-top: 60px;
        }

        .btn-commander {
            display: inline-block;
            padding: 18px 50px;
            background: linear-gradient(135deg, #8b9b6f 0%, #7a8a5e 100%);
            color: #ffffff;
            text-decoration: none;
            border-radius: 35px;
            font-weight: 600;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.4s ease;
            border: none;
            cursor: pointer;
            box-shadow: 0 8px 25px rgba(122, 138, 94, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-commander::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #9aab7f 0%, #8b9b6f 100%);
            transition: left 0.4s ease;
            z-index: 0;
        }

        .btn-commander:hover::before {
            left: 0;
        }

        .btn-commander span {
            position: relative;
            z-index: 1;
        }

        .btn-commander:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(122, 138, 94, 0.4);
        }

        @media (max-width: 1024px) {
            .apropos-hero {
                gap: 50px;
            }

            .cta-section {
                margin-top: 50px;
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

            .cta-section {
                margin-top: 40px;
            }

            .btn-commander {
                padding: 15px 40px;
                font-size: 16px;
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

        <div class="cta-section" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
            <a href="?page=services" class="btn-commander">
                <span>Commander Maintenant</span>
            </a>
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