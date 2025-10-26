<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traiteur - Suppléments</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body>

    <?php
    // Get category and person count from URL
    $category = isset($_GET['category']) ? strtolower($_GET['category']) : 'classique';
    $persons = isset($_GET['persons']) ? intval($_GET['persons']) : 12;

    // Define formule data
    $formules = [
        'classique' => ['title' => 'Classique', 'price' => 50],
        'premium' => ['title' => 'Premium', 'price' => 60],
        'prestige' => ['title' => 'Prestige', 'price' => 75]
    ];

    $formule = isset($formules[$category]) ? $formules[$category] : $formules['classique'];
    $baseTotal = $formule['price'] * $persons;
    ?>

    <form method="POST" id="bookingForm" onsubmit="return handleSubmit(event)">
        <section class="supplements-page">

            <!-- Font Awesome CDN -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

            <!-- HIDDEN INPUTS FOR BASE DATA -->
            <input type="hidden" name="formule" value="<?php echo $formule['title']; ?>">
            <input type="hidden" name="persons" value="<?php echo $persons; ?>">
            <input type="hidden" name="base_price" value="<?php echo $formule['price']; ?>">
            <input type="hidden" name="base_total" value="<?php echo $baseTotal; ?>">

            <!-- Hero Banner -->
            <div class="hero-banner-small">
                <img src="https://images.unsplash.com/photo-1555244162-803834f70033?w=1200&h=200&fit=crop" alt="Traiteur">
                <h1 class="hero-title-small">Traiteur</h1>
            </div>

            <!-- Order Summary -->
            <div class="order-summary">
                <div class="summary-card">
                    <div class="summary-content">
                        <span class="summary-label">1. Prestation :</span>
                        <span class="summary-value">Traiteur</span>
                    </div>
                    <a href="?page=traiteur" class="btn-modify-link">Modifier</a>
                </div>
                <div class="summary-card">
                    <div class="summary-content">
                        <span class="summary-label">2. Formule :</span>
                        <span class="summary-value"><?php echo $formule['title']; ?> - <?php echo $persons; ?> personnes</span>
                    </div>
                    <div class="summary-price-section">
                        <span class="summary-price"><?php echo $formule['price']; ?>€ / pers.</span>
                        <a href="?page=traiteur" class="btn-modify-link">Modifier</a>
                    </div>
                </div>
            </div>

            <!-- Formules Section -->
            <div class="formules-section">
                <h2 class="section-main-title">3. Formules</h2>
                <div class="formules-grid">
                    <!-- Formule – 9 Pièces -->
                    <div class="formule-card" data-name="Formule – 9 Pièces" data-price="20.90">
                        <div class="formule-header">
                            <div class="formule-info">
                                <h3 class="formule-title"><i class="fas fa-utensils"></i> Formule – 9 Pièces</h3>
                                <p class="formule-desc">
                                    <strong><i class="fas fa-bread-slice"></i> Cocktails salés:</strong><br>
                                    Houmous de betterave au za'atar, sablé croquant<br>
                                    Volaille fondante, caviar de champignons de Paris<br>
                                    Tartelette avocat, thon, agrumes<br>
                                    Club de thon<br>
                                    <strong><i class="fas fa-bowl-food"></i> Mini plat:</strong><br>
                                    Chakchouka aux épices libanaises, chèvre frais<br>
                                    <strong><i class="fas fa-cookie"></i> Cocktails sucrés:</strong><br>
                                    Tartelette chocolat praliné<br>
                                    Tartelette fruits rouges
                                </p>
                            </div>
                            <div class="formule-price">+20,90€ / pers</div>
                        </div>
                        <div class="formule-controls">
                            <button type="button" class="qty-btn increment" onclick="updateQty(this, 1)">
                                <i class="fas fa-chevron-up"></i>
                            </button>
                            <span class="qty-display">0</span>
                            <button type="button" class="qty-btn decrement" onclick="updateQty(this, -1)">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Formule – 12 Pièces -->
                    <div class="formule-card" data-name="Formule – 12 Pièces" data-price="26.90">
                        <div class="formule-header">
                            <div class="formule-info">
                                <h3 class="formule-title"><i class="fas fa-utensils"></i> Formule – 12 Pièces</h3>
                                <p class="formule-desc">
                                    <strong><i class="fas fa-bread-slice"></i> Cocktails salés:</strong><br>
                                    Tartelette poireaux Saint-Jacques, crème safranée<br>
                                    Wrap du chef<br>
                                    Sablé parmesan, tomate basilic, crème pesto verde<br>
                                    Nouvelles de poisson du jour<br>
                                    Comté AOP, chutney de figues, cerneaux de noix<br>
                                    Club de volaille<br>
                                    <strong><i class="fas fa-bowl-food"></i> Mini plat:</strong><br>
                                    Poké Bowl (saumon ou végétarien)<br>
                                    <strong><i class="fas fa-cookie"></i> Cocktails sucrés:</strong><br>
                                    Choux façon profiterole<br>
                                    Canelés bordelais<br>
                                    Tartelette caramel beurre salé
                                </p>
                            </div>
                            <div class="formule-price">+26,90€ / pers</div>
                        </div>
                        <div class="formule-controls">
                            <button type="button" class="qty-btn increment" onclick="updateQty(this, 1)">
                                <i class="fas fa-chevron-up"></i>
                            </button>
                            <span class="qty-display">0</span>
                            <button type="button" class="qty-btn decrement" onclick="updateQty(this, -1)">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Formule – 18 Pièces -->
                    <div class="formule-card" data-name="Formule – 18 Pièces" data-price="36.90">
                        <div class="formule-header">
                            <div class="formule-info">
                                <h3 class="formule-title"><i class="fas fa-utensils"></i> Formule – 18 Pièces</h3>
                                <p class="formule-desc">
                                    <strong><i class="fas fa-bread-slice"></i> Cocktails salés:</strong><br>
                                    Bœuf mi-cuit, condiment iodé, fruits rouges<br>
                                    Wrap du chef<br>
                                    Toffu printanier<br>
                                    Club de thon<br>
                                    Houmous de betterave au zaatar, sablé croquant<br>
                                    Mini tartelette safranée à l'espagnole<br>
                                    Sablé parmesan, tomates basilic, crème pesto verde<br>
                                    Comté AOP, chutney de figues, cerneaux de noix<br>
                                    Tartelette chèvre, petit pois mentholé<br>
                                    Nouvelles de poisson du jour<br>
                                    <strong><i class="fas fa-bowl-food"></i> Mini plat:</strong><br>
                                    Volaille fondante, crémeux patate douce, petits pois croquants, jus herbacé<br>
                                    <strong><i class="fas fa-cookie"></i> Cocktails sucrés:</strong><br>
                                    Mini muffins<br>
                                    Tartelette citron meringuée<br>
                                    Canelés bordelais<br>
                                    Tartelette fruits rouges<br>
                                    Choux façon profiterole
                                </p>
                            </div>
                            <div class="formule-price">+36,90€ / pers</div>
                        </div>
                        <div class="formule-controls">
                            <button type="button" class="qty-btn increment" onclick="updateQty(this, 1)">
                                <i class="fas fa-chevron-up"></i>
                            </button>
                            <span class="qty-display">0</span>
                            <button type="button" class="qty-btn decrement" onclick="updateQty(this, -1)">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Formule – 20 Pièces -->
                    <div class="formule-card" data-name="Formule – 20 Pièces" data-price="39.90">
                        <div class="formule-header">
                            <div class="formule-info">
                                <h3 class="formule-title"><i class="fas fa-utensils"></i> Formule – 20 Pièces</h3>
                                <p class="formule-desc">
                                    <strong><i class="fas fa-bread-slice"></i> Cocktails salés:</strong><br>
                                    Wrap du chef<br>
                                    Tartelette poireaux Saint-Jacques, crème safranée<br>
                                    Concombre mojito<br>
                                    Saumon gravlax, crème citronnée et raifort<br>
                                    Sablé parmesan, tomates basilic, crème pesto verde<br>
                                    Nouvelles de poisson du jour<br>
                                    Pain d'épice, foie gras, graines de tournesol<br>
                                    Comté AOP, chutney de figues, cerneaux de noix<br>
                                    Tartelette avocat, thon, agrumes<br>
                                    Houmous de betterave au zaatar, sablé croquant<br>
                                    Tartelette chèvre, petit pois mentholé<br>
                                    Volaille fondante, caviar de champignons de Paris<br>
                                    <strong><i class="fas fa-bowl-food"></i> Mini plat:</strong><br>
                                    Pressée de bœuf braisé, purée de pomme de terre, jus corsé au romarin<br>
                                    <strong><i class="fas fa-cookie"></i> Cocktails sucrés:</strong><br>
                                    Tartelette chocolat praliné<br>
                                    Tartelette citron meringuée<br>
                                    Assortiment de macarons exotiques<br>
                                    Choux façon profiterole<br>
                                    Canelés bordelais
                                </p>
                            </div>
                            <div class="formule-price">+39,90€ / pers</div>
                        </div>
                        <div class="formule-controls">
                            <button type="button" class="qty-btn increment" onclick="updateQty(this, 1)">
                                <i class="fas fa-chevron-up"></i>
                            </button>
                            <span class="qty-display">0</span>
                            <button type="button" class="qty-btn decrement" onclick="updateQty(this, -1)">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Supplements Section -->
            <div class="supplements-section">
                <h2 class="section-main-title">4. Suppléments</h2>
                <div class="supplements-grid">
                    <!-- Serveur -->
                    <div class="supplement-card" data-name="Serveur" data-price="160">
                        <div class="supplement-header">
                            <div class="supplement-info">
                                <h3 class="supplement-title">Serveur (recommandé)</h3>
                                <p class="supplement-desc">1 serveur pour 10 pers. 4h sur site.</p>
                            </div>
                            <div class="supplement-price">+160€</div>
                        </div>
                        <div class="supplement-controls">
                            <button type="button" class="qty-btn increment" onclick="updateQty(this, 1)">
                                <i class="fas fa-chevron-up"></i>
                            </button>
                            <span class="qty-display">0</span>
                            <button type="button" class="qty-btn decrement" onclick="updateQty(this, -1)">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Pièces cocktails -->
                    <div class="supplement-card" data-name="Pièces cocktails supplémentaires" data-price="10">
                        <div class="supplement-header">
                            <div class="supplement-info">
                                <h3 class="supplement-title">Pièces cocktails supplémentaires</h3>
                                <p class="supplement-desc">Trio de pièces cocktails</p>
                            </div>
                            <div class="supplement-price">+10€</div>
                        </div>
                        <div class="supplement-controls">
                            <button type="button" class="qty-btn increment" onclick="updateQty(this, 1)">
                                <i class="fas fa-chevron-up"></i>
                            </button>
                            <span class="qty-display">0</span>
                            <button type="button" class="qty-btn decrement" onclick="updateQty(this, -1)">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Mignardises -->
                    <div class="supplement-card" data-name="Mignardises supplémentaires" data-price="10">
                        <div class="supplement-header">
                            <div class="supplement-info">
                                <h3 class="supplement-title">Mignardises supplémentaires</h3>
                                <p class="supplement-desc">Trio de mignardises</p>
                            </div>
                            <div class="supplement-price">+10€</div>
                        </div>
                        <div class="supplement-controls">
                            <button type="button" class="qty-btn increment" onclick="updateQty(this, 1)">
                                <i class="fas fa-chevron-up"></i>
                            </button>
                            <span class="qty-display">0</span>
                            <button type="button" class="qty-btn decrement" onclick="updateQty(this, -1)">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Plateau charcuterie -->
                    <div class="supplement-card" data-name="Plateau de charcuterie" data-price="50">
                        <div class="supplement-header">
                            <div class="supplement-info">
                                <h3 class="supplement-title">Plateau de charcuterie</h3>
                                <p class="supplement-desc">Sélection MOF pour 10 personnes</p>
                            </div>
                            <div class="supplement-price">+50€</div>
                        </div>
                        <div class="supplement-controls">
                            <button type="button" class="qty-btn increment" onclick="updateQty(this, 1)">
                                <i class="fas fa-chevron-up"></i>
                            </button>
                            <span class="qty-display">0</span>
                            <button type="button" class="qty-btn decrement" onclick="updateQty(this, -1)">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Plateau fromage -->
                    <div class="supplement-card" data-name="Plateau de fromage" data-price="50">
                        <div class="supplement-header">
                            <div class="supplement-info">
                                <h3 class="supplement-title">Plateau de fromage</h3>
                                <p class="supplement-desc">Sélection MOF pour 10 personnes</p>
                            </div>
                            <div class="supplement-price">+50€</div>
                        </div>
                        <div class="supplement-controls">
                            <button type="button" class="qty-btn increment" onclick="updateQty(this, 1)">
                                <i class="fas fa-chevron-up"></i>
                            </button>
                            <span class="qty-display">0</span>
                            <button type="button" class="qty-btn decrement" onclick="updateQty(this, -1)">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Glaçons -->
                    <div class="supplement-card" data-name="Glaçons" data-price="50">
                        <div class="supplement-header">
                            <div class="supplement-info">
                                <h3 class="supplement-title">Glaçons</h3>
                                <p class="supplement-desc">Sac 20kg</p>
                            </div>
                            <div class="supplement-price">+50€</div>
                        </div>
                        <div class="supplement-controls">
                            <button type="button" class="qty-btn increment" onclick="updateQty(this, 1)">
                                <i class="fas fa-chevron-up"></i>
                            </button>
                            <span class="qty-display">0</span>
                            <button type="button" class="qty-btn decrement" onclick="updateQty(this, -1)">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Glace pilée -->
                    <div class="supplement-card" data-name="Glace pilée" data-price="50">
                        <div class="supplement-header">
                            <div class="supplement-info">
                                <h3 class="supplement-title">Glace pilée</h3>
                                <p class="supplement-desc">Glace pilée sac 20kg</p>
                            </div>
                            <div class="supplement-price">+50€</div>
                        </div>
                        <div class="supplement-controls">
                            <button type="button" class="qty-btn increment" onclick="updateQty(this, 1)">
                                <i class="fas fa-chevron-up"></i>
                            </button>
                            <span class="qty-display">0</span>
                            <button type="button" class="qty-btn decrement" onclick="updateQty(this, -1)">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Nappe -->
                    <div class="supplement-card" data-name="Nappe" data-price="40">
                        <div class="supplement-header">
                            <div class="supplement-info">
                                <h3 class="supplement-title">Nappe</h3>
                                <p class="supplement-desc">Nappe pour 10 personnes</p>
                            </div>
                            <div class="supplement-price">+40€</div>
                        </div>
                        <div class="supplement-controls">
                            <button type="button" class="qty-btn increment" onclick="updateQty(this, 1)">
                                <i class="fas fa-chevron-up"></i>
                            </button>
                            <span class="qty-display">0</span>
                            <button type="button" class="qty-btn decrement" onclick="updateQty(this, -1)">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Services Section -->
            <div class="services-section">
                <h2 class="section-main-title">5. Services additionnels</h2>
                <div class="services-grid">
                    <div class="service-card" onclick="toggleService(this)">
                        <h3 class="service-title">Location Verrerie</h3>
                        <p class="service-desc">Mise à disposition d'ensemble de verrerie.</p>
                    </div>
                    <div class="service-card" onclick="toggleService(this)">
                        <h3 class="service-title">Animation</h3>
                        <p class="service-desc">Stand hot-dog, burger, découpe...</p>
                    </div>
                    <div class="service-card" onclick="toggleService(this)">
                        <h3 class="service-title">Entremet sur mesure</h3>
                        <p class="service-desc">Paris-Brest, fraisier... sur devis.</p>
                    </div>
                </div>
            </div>

            <!-- Total -->
            <div class="total-section">
                <div class="total-content">
                    <h3 class="total-label">TOTAL</h3>
                    <div class="total-amount">
                        <span class="total-price" id="totalPrice"><?php echo number_format($baseTotal, 2); ?>€</span>
                        <span class="total-note">+ services additionnels</span>
                    </div>
                </div>
            </div>

            <!-- Date & Time -->
            <div class="date-time-section">
                <h2 class="section-main-title">6. Choix de la date et heure</h2>
                <p>L'heure choisie est pour le début de repas à titre informatif, elle pourra changer au téléphone si besoin</p>

                <div class="date-time-wrapper">
                    <button type="button" class="date-nav-arrow left" id="prevWeek" onclick="scrollWeek(-1)">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button type="button" class="date-nav-arrow right" id="nextWeek" onclick="scrollWeek(1)">
                        <i class="fas fa-chevron-right"></i>
                    </button>

                    <div class="days-header-container" id="daysContainer">
                        <div class="days-header" id="daysHeader"></div>
                    </div>

                    <div class="time-grid" id="timeGrid"></div>
                </div>
                <input type="hidden" name="selected_datetime" id="selectedDateTime">
            </div>

            <!-- Contact -->
            <div class="contact-section">
                <h2 class="section-main-title">7. Informations de contact</h2>
                <div class="contact-form">
                    <div class="form-group"><label>Nom</label><input type="text" name="nom" required></div>
                    <div class="form-group"><label>Prénom</label><input type="text" name="prenom" required></div>
                    <div class="form-group"><label>Numéro de téléphone</label><input type="tel" name="telephone" required></div>
                    <div class="form-group"><label>Adresse email</label><input type="email" name="email" required></div>
                    <div class="form-group"><label>Adresse de l'événement</label><input type="text" name="adresse" required></div>
                    <div class="form-group"><label>Société <span class="optional-tag">Optionnel</span></label><input type="text" name="societe" class="optional"></div>
                    <div class="form-group"><label>Code postal</label><input type="text" name="code_postal" required></div>
                    <div class="form-group"><label>Ville</label><input type="text" name="ville" required></div>
                    <div class="form-group"><label>Adresse de facturation <span class="optional-tag">Optionnel</span></label><input type="text" name="facturation_adresse" class="optional"></div>
                    <div class="form-group full-width"><label>Instruction d'accessibilité <span class="optional-tag">Optionnel</span></label><input type="text" name="accessibilite" class="optional" placeholder="Interphone, codes..."></div>
                    <div class="form-group"><label>Code postal <span class="optional-tag">Optionnel</span></label><input type="text" name="facturation_code_postal" class="optional"></div>
                    <div class="form-group"><label>Ville <span class="optional-tag">Optionnel</span></label><input type="text" name="facturation_ville" class="optional"></div>
                    <div class="form-group full-width"><label>Remarques <span class="optional-tag">Optionnel</span></label><input type="text" name="remarques" class="optional" placeholder="Végétarien, gluten..."></div>
                </div>
            </div>

            <!-- Submit -->
            <div class="submit-section">
                <h2 class="section-main-title">8. Validation</h2>
                <div class="checkbox-group">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">Je reconnais avoir pris connaissance et accepter les CGU.</label>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="newsletter" name="newsletter">
                    <label for="newsletter">J'accepte de recevoir la newsletter.</label>
                </div>
                <div class="submit-btn-wrapper">
                    <button type="submit" class="btn-submit">Confirmer</button>
                </div>
            </div>

        </section>
    </form>

    <style>
        /* ========================================
   ENHANCED VARIABLES
======================================== */
        :root {
            --primary: #9c9e47;
            --primary-light: #f3e17d;
            --primary-dark: #7a7f38;
            --text-primary: #2d2d2d;
            --text-secondary: #555;
            --text-light: #777;
            --bg-white: #ffffff;
            --bg-light: #fdfdf9;
            --border: #e8e8d8;
            --shadow-sm: 0 2px 8px rgba(156, 158, 71, 0.1);
            --shadow-md: 0 4px 16px rgba(156, 158, 71, 0.14);
            --shadow-lg: 0 8px 24px rgba(156, 158, 71, 0.18);
            --radius-sm: 10px;
            --radius-md: 14px;
            --radius-lg: 18px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', sans-serif;
            background: #fafaf5;
            color: var(--text-primary);
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        .supplements-page {
            max-width: 1100px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        /* ========================================
   HERO BANNER
======================================== */
        .hero-banner-small {
            position: relative;
            height: 160px;
            border-radius: var(--radius-lg);
            overflow: hidden;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-md);
        }

        .hero-banner-small img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.7);
        }

        .hero-title-small {
            position: absolute;
            top: 50%;
            left: 2.5rem;
            transform: translateY(-50%);
            font-size: 2.8rem;
            font-weight: 900;
            color: #fff;
            text-shadow: 0 4px 16px rgba(0, 0, 0, 0.5);
            letter-spacing: -0.5px;
            margin: 0;
        }

        /* ========================================
   ORDER SUMMARY
======================================== */
        .order-summary {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .summary-card {
            background: var(--bg-white);
            border-radius: var(--radius-md);
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
        }

        .summary-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
            border-color: var(--primary-light);
        }

        .summary-content {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex: 1;
        }

        .summary-label {
            font-weight: 700;
            font-size: 1.05rem;
            color: var(--text-primary);
        }

        .summary-value {
            font-size: 1.05rem;
            color: var(--text-secondary);
        }

        .summary-price {
            font-weight: 800;
            font-size: 1.2rem;
            color: var(--primary);
        }

        .summary-price-section {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .btn-modify-link {
            color: var(--text-light);
            text-decoration: underline;
            font-weight: 500;
            font-size: 0.95rem;
            transition: color 0.3s;
            cursor: pointer;
        }

        .btn-modify-link:hover {
            color: var(--primary);
        }

        /* ========================================
   SECTION CONTAINERS
======================================== */
        .formules-section,
        .supplements-section,
        .services-section,
        .date-time-section,
        .contact-section,
        .submit-section,
        .total-section {
            background: var(--bg-white);
            border-radius: var(--radius-lg);
            padding: 2.5rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border);
        }

        .section-main-title {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 1.75rem;
            position: relative;
            padding-bottom: 0.75rem;
        }

        .section-main-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 70px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--primary-light));
            border-radius: 2px;
        }

        /* ========================================
   FORMULES CARDS - COMPACT & ELEGANT
======================================== */
        .formules-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 1.5rem;
        }

        .formule-card {
            border: 2px solid var(--border);
            border-radius: var(--radius-md);
            padding: 0;
            background: var(--bg-white);
            transition: all 0.3s ease;
            cursor: default;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .formule-card:hover {
            border-color: var(--primary);
            box-shadow: var(--shadow-lg);
            transform: translateY(-3px);
        }

        .formule-header {
            padding: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            background: linear-gradient(135deg, #fdfdf9, #ffffff);
            border-bottom: 1px solid var(--border);
        }

        .formule-info {
            flex: 1;
        }

        .formule-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 1rem;
        }

        .formule-title i {
            margin-right: 0.5rem;
            color: var(--primary);
        }

        .formule-desc {
            font-size: 0.9rem;
            color: var(--text-secondary);
            line-height: 1.7;
        }

        .formule-desc strong {
            color: var(--primary-dark);
            font-weight: 600;
            display: block;
            margin-top: 0.75rem;
            margin-bottom: 0.35rem;
        }

        .formule-desc strong:first-child {
            margin-top: 0;
        }

        .formule-desc strong i {
            margin-right: 0.4rem;
            font-size: 0.85rem;
        }

        .formule-price {
            font-size: 1.35rem;
            font-weight: 800;
            color: var(--primary);
            white-space: nowrap;
            margin-left: 1rem;
        }

        .formule-controls {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            padding: 1.25rem;
            background: var(--bg-light);
        }

        /* ========================================
   SUPPLEMENTS GRID - COMPACT
======================================== */
        .supplements-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.25rem;
        }

        .supplement-card {
            border: 2px solid var(--border);
            border-radius: var(--radius-md);
            padding: 0;
            background: var(--bg-white);
            transition: all 0.3s ease;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .supplement-card:hover {
            border-color: var(--primary);
            box-shadow: var(--shadow-lg);
            transform: translateY(-3px);
        }

        .supplement-header {
            padding: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            background: linear-gradient(135deg, #fdfdf9, #ffffff);
            border-bottom: 1px solid var(--border);
        }

        .supplement-info {
            flex: 1;
        }

        .supplement-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
        }

        .supplement-desc {
            font-size: 0.9rem;
            color: var(--text-secondary);
            line-height: 1.5;
        }

        .supplement-price {
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--primary);
            white-space: nowrap;
            margin-left: 1rem;
        }

        .supplement-controls {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            padding: 1.25rem;
            background: var(--bg-light);
        }

        /* ========================================
   QUANTITY CONTROLS
======================================== */
        .qty-btn {
            width: 42px;
            height: 42px;
            border: 2px solid var(--border);
            background: var(--bg-white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            color: var(--text-secondary);
            font-size: 0.95rem;
            box-shadow: var(--shadow-sm);
        }

        .qty-btn:hover {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
            transform: scale(1.1);
            box-shadow: var(--shadow-md);
        }

        .qty-btn:active {
            transform: scale(0.95);
        }

        .qty-btn.decrement:hover {
            background: #e74c3c;
            border-color: #e74c3c;
        }

        .qty-display {
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--primary);
            min-width: 50px;
            text-align: center;
        }

        /* ========================================
   SERVICE CARDS
======================================== */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.25rem;
        }

        .service-card {
            border: 2px solid var(--border);
            border-radius: var(--radius-md);
            padding: 1.75rem;
            background: var(--bg-white);
            cursor: pointer;
            transition: all 0.35s ease;
            position: relative;
            overflow: hidden;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(156, 158, 71, 0.08), transparent);
            transition: left 0.6s;
        }

        .service-card:hover::before {
            left: 100%;
        }

        .service-card:hover {
            border-color: var(--primary);
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        .service-card.selected {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-color: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        .service-card.selected .service-title,
        .service-card.selected .service-desc {
            color: white;
        }

        .service-card.selected::after {
            content: '✓';
            position: absolute;
            top: 1rem;
            right: 1rem;
            width: 32px;
            height: 32px;
            background: rgba(255, 255, 255, 0.25);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.1rem;
            color: white;
        }

        .service-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .service-desc {
            font-size: 0.95rem;
            color: var(--text-secondary);
            line-height: 1.5;
        }

        /* ========================================
   TOTAL SECTION
======================================== */
        .total-section {
            border: 2px solid var(--primary-light);
            background: linear-gradient(135deg, #fdfdf9, #f8f8f3);
        }

        .total-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .total-label {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary);
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .total-amount {
            text-align: right;
        }

        .total-price {
            font-size: 2.5rem;
            font-weight: 900;
            color: var(--primary-dark);
            display: block;
        }

        .total-note {
            font-size: 0.9rem;
            color: var(--primary);
            font-weight: 600;
            margin-top: 0.25rem;
            display: block;
        }

        /* ========================================
   DATE & TIME PICKER
======================================== */
        .date-time-section p {
            font-size: 0.95rem;
            color: var(--text-secondary);
            margin-bottom: 1.75rem;
            line-height: 1.6;
        }

        .date-time-wrapper {
            position: relative;
            overflow: hidden;
            border-radius: var(--radius-lg);
            background: linear-gradient(145deg, #fdfdf9, #f8f8f3);
            padding: 2.5rem 1.75rem;
            box-shadow: inset 0 2px 10px rgba(156, 158, 71, 0.08);
        }

        .date-nav-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 52px;
            height: 52px;
            background: white;
            border: 2px solid var(--border);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            color: var(--text-light);
            cursor: pointer;
            z-index: 10;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
        }

        .date-nav-arrow:hover:not(:disabled) {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
            transform: translateY(-50%) scale(1.1);
            box-shadow: var(--shadow-lg);
        }

        .date-nav-arrow.left {
            left: 16px;
        }

        .date-nav-arrow.right {
            right: 16px;
        }

        .date-nav-arrow:disabled {
            opacity: 0.3;
            cursor: not-allowed;
        }

        .days-header-container {
            overflow-x: auto;
            scrollbar-width: none;
            margin-bottom: 2rem;
            padding: 0 70px;
        }

        .days-header-container::-webkit-scrollbar {
            display: none;
        }

        .days-header {
            display: flex;
            gap: 1.25rem;
            min-width: max-content;
        }

        .day-header {
            text-align: center;
            min-width: 100px;
            padding: 1rem;
            background: white;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-sm);
            transition: all 0.3s;
            border: 1px solid var(--border);
        }

        .day-header:hover {
            background: var(--primary-light);
            transform: translateY(-2px);
            border-color: var(--primary);
        }

        .day-header .day-name {
            font-size: 1rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.35rem;
        }

        .day-header .date-num {
            font-size: 0.9rem;
            color: var(--primary-dark);
            font-weight: 600;
        }

        .time-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 0.85rem;
        }

        .time-cell {
            background: white;
            border: 2px solid var(--border);
            border-radius: var(--radius-md);
            padding: 1rem 0.5rem;
            text-align: center;
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-primary);
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-sm);
        }

        .time-cell:hover {
            background: var(--primary-light);
            border-color: var(--primary);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .time-cell.selected {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
            font-weight: 700;
            box-shadow: var(--shadow-lg);
            transform: translateY(-2px);
        }

        /* ========================================
   CONTACT FORM
======================================== */
        .contact-form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem 1.25rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .form-group .optional-tag {
            font-size: 0.72rem;
            color: var(--primary-dark);
            background: var(--primary-light);
            padding: 0.2rem 0.6rem;
            border-radius: 8px;
            margin-left: 0.6rem;
            font-weight: 600;
        }

        .form-group input {
            padding: 0.95rem 1.1rem;
            border: 2px solid var(--border);
            border-radius: var(--radius-md);
            font-size: 1rem;
            background: white;
            transition: all 0.3s;
            font-family: inherit;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(156, 158, 71, 0.15);
        }

        .form-group input.optional {
            background: #fdfdf9;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        /* ========================================
   SUBMIT SECTION
======================================== */
        .submit-section {
            background: linear-gradient(135deg, #fdfdf9, #f8f8f3);
            border: 2px solid var(--primary-light);
        }

        .checkbox-group {
            display: flex;
            align-items: flex-start;
            gap: 0.9rem;
            margin-bottom: 1.25rem;
        }

        .checkbox-group input[type="checkbox"] {
            margin-top: 0.3rem;
            accent-color: var(--primary);
            width: 20px;
            height: 20px;
            cursor: pointer;
        }

        .checkbox-group label {
            font-size: 0.96rem;
            color: var(--text-secondary);
            line-height: 1.6;
            cursor: pointer;
        }

        .submit-btn-wrapper {
            display: flex;
            justify-content: flex-end;
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            border-radius: var(--radius-md);
            padding: 1.15rem 3rem;
            font-size: 1.15rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.35s ease;
            box-shadow: var(--shadow-md);
            font-family: inherit;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        .btn-submit:active {
            transform: translateY(-1px);
        }

        /* ========================================
   RESPONSIVE
======================================== */
        @media (max-width: 968px) {

            .formules-grid,
            .supplements-grid,
            .services-grid,
            .contact-form {
                grid-template-columns: 1fr;
            }

            .time-grid {
                grid-template-columns: repeat(4, 1fr);
            }

            .days-header {
                gap: 1rem;
            }

            .day-header {
                min-width: 85px;
            }
        }

        @media (max-width: 768px) {
            .supplements-page {
                padding: 1.5rem 1rem;
            }

            .hero-banner-small {
                height: 140px;
            }

            .hero-title-small {
                font-size: 2.2rem;
                left: 1.5rem;
            }

            .summary-card {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
                padding: 1.25rem 1.5rem;
            }

            .summary-price-section {
                width: 100%;
                justify-content: space-between;
            }

            .section-main-title {
                font-size: 1.5rem;
            }

            .formules-section,
            .supplements-section,
            .services-section,
            .date-time-section,
            .contact-section,
            .submit-section,
            .total-section {
                padding: 1.75rem 1.5rem;
            }

            .formule-header,
            .supplement-header {
                flex-direction: column;
                gap: 0.75rem;
            }

            .formule-price,
            .supplement-price {
                margin-left: 0;
            }

            .total-content {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .total-amount {
                align-self: flex-start;
                text-align: left;
            }

            .time-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .date-nav-arrow {
                width: 44px;
                height: 44px;
                font-size: 1.2rem;
            }

            .date-nav-arrow.left {
                left: 10px;
            }

            .date-nav-arrow.right {
                right: 10px;
            }

            .days-header-container {
                padding: 0 60px;
            }

            .submit-btn-wrapper {
                width: 100%;
            }

            .btn-submit {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .hero-title-small {
                font-size: 1.8rem;
                left: 1rem;
            }

            .section-main-title {
                font-size: 1.35rem;
            }

            .formules-section,
            .supplements-section,
            .services-section,
            .date-time-section,
            .contact-section,
            .submit-section,
            .total-section {
                padding: 1.5rem 1.25rem;
            }

            .time-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .total-price {
                font-size: 2rem;
            }

            .total-label {
                font-size: 1.5rem;
            }
        }
    </style>

    <script>
        // === GLOBAL DATA ===
        const startDate = new Date('2025-10-23');
        const times = ['12:00', '13:00', '13:30', '19:00', '20:00', '20:30'];
        const daysOfWeek = ['Jeudi', 'Vendredi', 'Samedi', 'Dimanche', 'Lundi', 'Mardi', 'Mercredi'];
        let currentWeekOffset = 0;
        const daysPerPage = 7;

        // === UPDATE QTY & TOTAL ===
        function updateQty(btn, change) {
            const card = btn.closest('.formule-card') || btn.closest('.supplement-card');
            const display = card.querySelector('.qty-display');
            let qty = parseInt(display.textContent) + change;
            qty = Math.max(0, qty);
            display.textContent = qty;
            updateTotal();
        }

        function updateTotal() {
            let total = <?php echo $baseTotal; ?>;
            document.querySelectorAll('.formule-card, .supplement-card').forEach(card => {
                const qty = parseInt(card.querySelector('.qty-display').textContent);
                const price = parseFloat(card.dataset.price);
                total += qty * price;
            });
            document.getElementById('totalPrice').textContent = total.toFixed(2) + '€';
        }

        // === SERVICE SELECTION ===
        function toggleService(card) {
            card.classList.toggle('selected');
        }

        // === DATE/TIME PICKER ===
        function generateWeek(offset) {
            const header = document.getElementById('daysHeader');
            const grid = document.getElementById('timeGrid');
            header.innerHTML = '';
            grid.innerHTML = '';

            for (let i = 0; i < daysPerPage; i++) {
                const idx = offset * daysPerPage + i;
                const date = new Date(startDate);
                date.setDate(startDate.getDate() + idx);

                const dayName = daysOfWeek[date.getDay() === 0 ? 6 : date.getDay() - 1];
                const dateStr = date.getDate() + ' octobre';

                const dayEl = document.createElement('div');
                dayEl.className = 'day-header';
                dayEl.innerHTML = `<div class="day-name">${dayName}</div><div class="date-num">${dateStr}</div>`;
                header.appendChild(dayEl);

                times.forEach(time => {
                    const cell = document.createElement('div');
                    cell.className = 'time-cell';
                    cell.textContent = time;
                    cell.dataset.datetime = `${dateStr} ${time}`;
                    cell.onclick = () => selectTime(cell);
                    grid.appendChild(cell);
                });
            }
            updateArrows();
        }

        function selectTime(cell) {
            document.querySelectorAll('.time-cell').forEach(c => c.classList.remove('selected'));
            cell.classList.add('selected');
            document.getElementById('selectedDateTime').value = cell.dataset.datetime;
        }

        function scrollWeek(dir) {
            const newOffset = currentWeekOffset + dir;
            if (newOffset < 0) return;
            currentWeekOffset = newOffset;
            generateWeek(currentWeekOffset);
            document.getElementById('daysContainer').scrollLeft = 0;
        }

        function updateArrows() {
            const prev = document.getElementById('prevWeek');
            prev.disabled = currentWeekOffset === 0;
            prev.style.opacity = currentWeekOffset === 0 ? '0.3' : '1';
        }

        // === FORM SUBMISSION ===
        function handleSubmit(e) {
            e.preventDefault();

            const form = e.target;
            const data = new FormData(form);

            // Build supplements array (includes formules and supplements)
            const supplements = [];
            document.querySelectorAll('.formule-card, .supplement-card').forEach(card => {
                const qty = parseInt(card.querySelector('.qty-display').textContent);
                if (qty > 0) {
                    supplements.push({
                        name: card.dataset.name,
                        qty: qty,
                        price_per_unit: parseFloat(card.dataset.price),
                        total: qty * parseFloat(card.dataset.price)
                    });
                }
            });

            // Build services array
            const services = [];
            document.querySelectorAll('.service-card.selected').forEach(card => {
                services.push(card.querySelector('.service-title').textContent);
            });

            // Final data object
            const submission = {
                formule: data.get('formule'),
                persons: parseInt(data.get('persons')),
                base_price: parseFloat(data.get('base_price')),
                base_total: parseFloat(data.get('base_total')),
                supplements: supplements,
                services: services,
                selected_datetime: data.get('selected_datetime') || 'Non sélectionné',
                contact: {
                    nom: data.get('nom'),
                    prenom: data.get('prenom'),
                    telephone: data.get('telephone'),
                    email: data.get('email'),
                    adresse: data.get('adresse'),
                    societe: data.get('societe') || null,
                    code_postal: data.get('code_postal'),
                    ville: data.get('ville'),
                    facturation_adresse: data.get('facturation_adresse') || null,
                    accessibilite: data.get('accessibilite') || null,
                    facturation_code_postal: data.get('facturation_code_postal') || null,
                    facturation_ville: data.get('facturation_ville') || null,
                    remarques: data.get('remarques') || null
                },
                terms: data.get('terms') === 'on',
                newsletter: data.get('newsletter') === 'on',
                total_final: parseFloat(document.getElementById('totalPrice').textContent.replace('€', ''))
            };

            console.log('SUBMISSION DATA:', submission);
            alert('Réservation confirmée! Consultez la console pour voir les données.');

            return false;
        }

        // Init
        document.addEventListener('DOMContentLoaded', function() {
            generateWeek(0);
        });
    </script>