    <style>
        :root {
            --primary: #888a3a;
            --primary-light: #f3e17d;
            --bg-white: #ffffff;
            --bg-light: #f9f7f4;
            --text-primary: #2d2d2d;
            --text-secondary: #666666;
            --text-light: #999999;
            --border: #e8e8e8;
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.08);
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.12);
            --radius-md: 12px;
            --radius-lg: 16px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: var(--bg-light);
            color: var(--text-primary);
            line-height: 1.6;
            padding: 2rem;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        .page-title {
            font-size: 3rem;
            font-weight: 800;
            color: var(--text-primary);
            text-align: center;
            margin-bottom: 3rem;
            letter-spacing: -1px;
        }

        .faq-container {
            background: var(--bg-white);
            border-radius: var(--radius-lg);
            padding: 3rem;
            box-shadow: var(--shadow-md);
            margin-bottom: 2.5rem;
        }

        .faq-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .faq-item {
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            background: var(--bg-white);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            box-shadow: var(--shadow-sm);
        }

        .faq-question {
            padding: 1.5rem 1.8rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            background: var(--bg-white);
            transition: all 0.3s ease;
            gap: 1rem;
        }

        .faq-question:hover {
            background: #fef8f5;
        }

        .faq-question-text {
            font-weight: 600;
            font-size: 1rem;
            color: var(--primary);
            flex: 1;
        }

        .faq-icon {
            font-size: 1.3rem;
            color: var(--primary);
            transition: transform 0.3s ease;
            font-weight: 300;
            line-height: 1;
            flex-shrink: 0;
        }

        .faq-item.active .faq-icon {
            transform: rotate(45deg);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease, padding 0.4s ease;
            padding: 0 1.8rem;
            background: var(--bg-white);
        }

        .faq-item.active .faq-answer {
            max-height: 500px;
            padding: 0 1.8rem 1.5rem 1.8rem;
        }

        .faq-answer-content {
            font-size: 0.95rem;
            color: var(--text-secondary);
            line-height: 1.7;
            border-top: 1px solid var(--border);
            padding-top: 1.2rem;
        }

        .contact-section {
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
            border-radius: var(--radius-lg);
            padding: 3rem;
            text-align: center;
            color: white;
            box-shadow: var(--shadow-md);
        }

        .contact-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            letter-spacing: -0.5px;
        }

        .contact-subtitle {
            font-size: 1.05rem;
            margin-bottom: 2rem;
            opacity: 0.95;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
        }

        .contact-btn {
            background: var(--text-primary);
            color: white;
            padding: 1rem 2.5rem;
            border-radius: var(--radius-md);
            font-weight: 600;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .contact-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
            background: #1a1a1a;
        }

        @media (max-width: 768px) {
            .faq-grid {
                grid-template-columns: 1fr;
            }

            .page-title {
                font-size: 2.2rem;
            }

            .faq-container,
            .contact-section {
                padding: 2rem;
            }

            body {
                padding: 1rem;
            }

            .contact-title {
                font-size: 1.6rem;
            }

            .contact-subtitle {
                font-size: 0.95rem;
            }
        }
    </style>
    <section>
        <div class="container">
            <h1 class="page-title">FAQ</h1>

            <div class="faq-container">
                <div class="faq-grid">
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <span class="faq-question-text">Que comporte la prestation ?</span>
                            <span class="faq-icon">+</span>
                        </div>
                        <div class="faq-answer">
                            <div class="faq-answer-content">
                                Notre prestation inclut la préparation complète des plats, le service à table, et tout le matériel nécessaire. Nous nous occupons de tout pour que vous puissiez profiter pleinement de votre événement.
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <span class="faq-question-text">Quels types d'événements ?</span>
                            <span class="faq-icon">+</span>
                        </div>
                        <div class="faq-answer">
                            <div class="faq-answer-content">
                                Nous organisons tous types d'événements : mariages, anniversaires, événements d'entreprise, réceptions privées, et bien plus encore. Chaque événement est personnalisé selon vos besoins.
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <span class="faq-question-text">Que ne comporte pas la prestation ?</span>
                            <span class="faq-icon">+</span>
                        </div>
                        <div class="faq-answer">
                            <div class="faq-answer-content">
                                La location de salle, la décoration florale et les animations musicales ne sont pas incluses dans notre prestation de base. Ces services peuvent être ajoutés sur demande avec nos partenaires.
                            </div>
                        </div>
                    </div>

                    <div class="faq-item active">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <span class="faq-question-text">Comment choisir les plats ?</span>
                            <span class="faq-icon">+</span>
                        </div>
                        <div class="faq-answer">
                            <div class="faq-answer-content">
                                Le choix doit être le même pour tous, sauf si régime alimentaire particulier auprès d'un convive, le menu sera adapté en conséquence. Au cas contraire un supplément sera ajouté. Possibilité de faire moitié viande moitié poisson uniquement sur le plat avec le même accompagnement pour tous.
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <span class="faq-question-text">Comment se déroule la prestation le jour J ?</span>
                            <span class="faq-icon">+</span>
                        </div>
                        <div class="faq-answer">
                            <div class="faq-answer-content">
                                Notre équipe arrive en avance pour préparer, nous assurons le service pendant l'événement, et nous nous occupons du nettoyage après. Vous n'avez qu'à profiter de votre événement.
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <span class="faq-question-text">De quoi a besoin le Chef ?</span>
                            <span class="faq-icon">+</span>
                        </div>
                        <div class="faq-answer">
                            <div class="faq-answer-content">
                                Le chef a besoin d'un accès à une cuisine équipée avec four, plaques de cuisson, réfrigérateur, et un espace de travail suffisant. Nous apportons notre propre matériel spécialisé.
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <span class="faq-question-text">Quel est le montant des frais de déplacement ?</span>
                            <span class="faq-icon">+</span>
                        </div>
                        <div class="faq-answer">
                            <div class="faq-answer-content">
                                Les frais de déplacement varient selon la distance. Pour les événements dans un rayon de 30 km, ils sont offerts. Au-delà, nous calculons les frais en fonction de la distance exacte.
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <span class="faq-question-text">Liste des allergènes présent dans nos menus</span>
                            <span class="faq-icon">+</span>
                        </div>
                        <div class="faq-answer">
                            <div class="faq-answer-content">
                                Nos menus peuvent contenir : gluten, crustacés, œufs, poisson, arachides, soja, lait, fruits à coque, céleri, moutarde, sésame, sulfites, lupin et mollusques. Consultez-nous pour des alternatives.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-section">
                <h2 class="contact-title">Un besoin particulier, une question ?</h2>
                <p class="contact-subtitle">
                    Des questions pour un repas de mariage ? Un événement sur mesure ?
                    Envie d'un menu personnalisé ? Nous sommes à votre écoute et vous ne
                    trouvez pas votre bonheur.
                </p>
                <button class="contact-btn" onclick="window.location.href='contact.php'">Nous contacter</button>
            </div>
        </div>
    </section>

    <script>
        function toggleFaq(element) {
            const faqItem = element.parentElement;
            const wasActive = faqItem.classList.contains('active');

            // Close all FAQ items
            document.querySelectorAll('.faq-item').forEach(item => {
                item.classList.remove('active');
            });

            // Open clicked item if it wasn't active
            if (!wasActive) {
                faqItem.classList.add('active');
            }
        }
    </script>