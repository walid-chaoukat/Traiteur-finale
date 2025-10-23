<?php
// Get category from URL parameter
$category = isset($_GET['category']) ? strtolower($_GET['category']) : 'classique';

// Define formule data
$formules = [
    'classique' => [
        'title' => 'Classique',
        'price' => '50€',
        'description' => 'Notre formule best seller adaptée à tous vos événements debout.',
        'cocktails_title' => '6 pièces cocktails salées',
        'cocktails' => [
            'Mini focaccia by l\'As espagnol',
            'Maki pastrami de boeuf et foie gras, crumble cacao',
            'Mini lobster roll',
            'Tuna club',
            'Ceviche de daurade aux agrumes',
            'Tataki de boeuf chimichurri mango'
        ],
        'timbalines_title' => '3 timbalines chaudes ou froides',
        'timbalines' => [
            'Comme un Chirashi, saumon gravlax, gel de kumquat au piment doux',
            'Tajine de légumes et abricot, crème pois chiche',
            'Volaille jaune, sauce charroux, persillade de pomme de terre'
        ],
        'desserts_title' => '1 timbaline sucrée ou 4 mignardises',
        'desserts_subtitle' => 'Mignardises :',
        'desserts' => [
            'L\'intense chocolat noisette',
            'L\'intense pistache framboise',
            'L\'intense citron vanille'
        ],
        'desserts_subtitle2' => 'Timbaline :',
        'desserts2' => [
            'Pavlova à l\'exotique',
            'Mousse au chocolat ultra gourmande'
        ],
        'color' => '#c98a6e'
    ],
    'premium' => [
        'title' => 'Premium',
        'price' => '60€',
        'description' => 'Notre formule premium pour impressionner vos convives avec des saveurs raffinées.',
        'cocktails_title' => '10 pièces cocktails salées',
        'cocktails' => [
            'Foie gras sur pain d\'épices',
            'Saumon fumé écossais',
            'Verrines de crevettes avocat',
            'Tartare de bœuf en cuillère',
            'Mini burger au magret',
            'Roulés de bresaola roquette',
            'Tempura de légumes',
            'Crostini à la truffe',
            'Bouchées Saint-Jacques',
            'Mini club sandwich'
        ],
        'timbalines_title' => '3 timbalines chaudes ou froides',
        'timbalines' => [
            'Blanquette de veau à l\'ancienne',
            'Risotto aux champignons et parmesan',
            'Tajine d\'agneau aux pruneaux',
            'Salade de homard'
        ],
        'desserts_title' => '1 timbaline sucrée ou 4 mignardises',
        'desserts_subtitle' => 'Mignardises :',
        'desserts' => [
            'Tarte citron meringuée miniature',
            'Fondant au chocolat',
            'Cheesecake fruits rouges',
            'Macarons assortis'
        ],
        'desserts_subtitle2' => 'Timbaline :',
        'desserts2' => [
            'Tiramisu revisité',
            'Panna cotta vanille et coulis fruits'
        ],
        'color' => '#898b40'
    ],
    'prestige' => [
        'title' => 'Prestige',
        'price' => '75€',
        'description' => 'Notre formule prestige pour vos événements d\'exception avec des produits haut de gamme.',
        'cocktails_title' => '12 pièces cocktails salées',
        'cocktails' => [
            'Huîtres gratinées au champagne',
            'Foie gras poêlé aux figues',
            'Tartare de thon rouge',
            'Saint-Jacques poêlées',
            'Carpaccio de bœuf Wagyu',
            'Homard en médaillon',
            'Verrines de caviar',
            'Magret de canard fumé',
            'Gambas flambées',
            'Tartines de homard',
            'Mini côte de bœuf',
            'Ravioles de langoustines'
        ],
        'timbalines_title' => '4 timbalines chaudes ou froides',
        'timbalines' => [
            'Filet de bœuf Wellington',
            'Lotte à l\'armoricaine',
            'Risotto aux truffes noires',
            'Tajine d\'agneau confit',
            'Salade de langoustines'
        ],
        'desserts_title' => '2 timbalines sucrées ou 6 mignardises',
        'desserts_subtitle' => 'Mignardises :',
        'desserts' => [
            'Opéra chocolat café',
            'Fraisier maison',
            'Saint-Honoré miniature',
            'Tarte Tatin caramélisée',
            'Paris-Brest aux noisettes',
            'Mille-feuille vanille'
        ],
        'desserts_subtitle2' => 'Timbaline :',
        'desserts2' => [
            'Pavlova exotique premium',
            'Mousse trois chocolats',
            'Entremet fruits de saison'
        ],
        'color' => '#d4af37'
    ]
];

// Get current formule or default to classique
$formule = isset($formules[$category]) ? $formules[$category] : $formules['classique'];
?>

<!-- Details Page Content Section -->
<section class="details-page">
    <!-- Header -->
    <div class="details-header-bar">
        <h2 class="page-section-number">2. Choix de la formule</h2>
        <button class="btn-modify-small">Modifier</button>
    </div>

    <!-- Main Content Grid -->
    <div class="details-grid">
        <!-- Left Column - Image -->
        <div class="details-image-column">
            <img src="https://images.unsplash.com/photo-1555244162-803834f70033?w=600&h=800&fit=crop" alt="<?php echo $formule['title']; ?>">
            <div class="image-overlay">
                <h1 class="formule-name"><?php echo $formule['title']; ?></h1>
                <p class="formule-desc"><?php echo $formule['description']; ?></p>
                <div class="price-tag">
                    <span class="price-label">À partir de</span>
                    <span class="price-value"><?php echo $formule['price']; ?> / pers.</span>
                </div>
            </div>
        </div>

        <!-- Right Column - Details -->
        <div class="details-content-column">
            <!-- Notice -->
            <div class="notice-banner">
                <p><strong>LE SITE EST ACTUELLEMENT EN REPARATION, MERCI DE NOUS CONTACTER PAR TELEPHONE.</strong> Le choix des différents plats se fera en direct avec votre chef lorsqu'il vous contactera.</p>
            </div>

            <!-- Cocktails Section -->
            <div class="menu-section">
                <h3 class="menu-section-title" style="color: <?php echo $formule['color']; ?>"><?php echo $formule['cocktails_title']; ?></h3>
                <ul class="menu-items-list">
                    <?php foreach ($formule['cocktails'] as $item): ?>
                        <li><?php echo $item; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Timbalines Section -->
            <div class="menu-section">
                <h3 class="menu-section-title" style="color: <?php echo $formule['color']; ?>"><?php echo $formule['timbalines_title']; ?></h3>
                <ul class="menu-items-list">
                    <?php foreach ($formule['timbalines'] as $item): ?>
                        <li><?php echo $item; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Desserts Section -->
            <div class="menu-section">
                <h3 class="menu-section-title" style="color: <?php echo $formule['color']; ?>"><?php echo $formule['desserts_title']; ?></h3>
                <p class="menu-subsection"><?php echo $formule['desserts_subtitle']; ?></p>
                <ul class="menu-items-list">
                    <?php foreach ($formule['desserts'] as $item): ?>
                        <li><?php echo $item; ?></li>
                    <?php endforeach; ?>
                </ul>

                <p class="menu-subsection"><?php echo $formule['desserts_subtitle2']; ?></p>
                <ul class="menu-items-list">
                    <?php foreach ($formule['desserts2'] as $item): ?>
                        <li><?php echo $item; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Dietary Icons -->
            <div class="dietary-icons">
                <img src="https://cdn-icons-png.flaticon.com/512/857/857681.png" alt="Gluten" title="Sans gluten disponible">
                <img src="https://cdn-icons-png.flaticon.com/512/1046/1046784.png" alt="Vegan" title="Option végétarienne">
                <img src="https://cdn-icons-png.flaticon.com/512/3050/3050190.png" alt="Halal" title="Halal disponible">
                <img src="https://cdn-icons-png.flaticon.com/512/1046/1046857.png" alt="Dairy" title="Sans lactose disponible">
                <img src="https://cdn-icons-png.flaticon.com/512/135/135620.png" alt="Nut" title="Sans fruits à coque">
                <img src="https://cdn-icons-png.flaticon.com/512/2515/2515183.png" alt="Fish" title="Sans poisson disponible">
            </div>
            <p class="dietary-note">Nos menus s'adaptent à vos régimes particuliers<br>(halal, végétarien, sans gluten, etc.)</p>

            <!-- Quantity Selector -->
            <div class="quantity-selector">
                <div class="quantity-label">Nombre de personnes</div>
                <div class="quantity-controls">

                    <button class="quantity-btn" onclick="incrementQuantity()">
                        <i class=" fas fa-chevron-up"></i>
                    </button>
                    <input type="number" id="personCount" value="12" min="12" class="quantity-input">
                    <button class="quantity-btn" onclick="decrementQuantity()">
                        <i class=" fas fa-chevron-down"></i>
                    </button>
                </div>
                <button class="btn-choose-menu" style="background: <?php echo $formule['color']; ?>" onclick="chooseMenu()">
                    Choisir ce menu
                </button>
            </div>
        </div>
    </div>
</section>

<style>
    /* Details Page Styles */
    .details-page {
        animation: fadeInUp 0.8s ease;
    }

    .details-header-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        padding: 1.5rem 2rem;
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .page-section-number {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--text-primary);
        margin: 0;
    }

    .btn-modify-small {
        padding: 0.6rem 1.5rem;
        background: transparent;
        color: var(--text-secondary);
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: underline;
    }

    .btn-modify-small:hover {
        color: var(--primary-color);
    }

    .details-grid {
        display: grid;
        grid-template-columns: 450px 1fr;
        gap: 2rem;
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(137, 139, 64, 0.12);
    }

    /* Left Column - Image */
    .details-image-column {
        position: relative;
        height: 100%;
        min-height: 800px;
    }

    .details-image-column img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .image-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 2.5rem;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.85), transparent);
        color: white;
    }

    .formule-name {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 1rem;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
    }

    .formule-desc {
        font-size: 1.1rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        opacity: 0.95;
    }

    .price-tag {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }

    .price-label {
        font-size: 0.9rem;
        opacity: 0.9;
    }

    .price-value {
        font-size: 2rem;
        font-weight: 700;
    }

    /* Right Column - Content */
    .details-content-column {
        padding: 2.5rem;
        overflow-y: auto;
        max-height: 800px;
    }

    .notice-banner {
        background: rgba(201, 138, 110, 0.1);
        border-left: 4px solid #c98a6e;
        padding: 1.25rem;
        margin-bottom: 2rem;
        border-radius: 8px;
    }

    .notice-banner p {
        color: var(--text-secondary);
        line-height: 1.7;
        margin: 0;
        font-size: 0.95rem;
    }

    .menu-section {
        margin-bottom: 2.5rem;
    }

    .menu-section-title {
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid var(--border-light);
    }

    .menu-subsection {
        font-weight: 600;
        color: var(--text-secondary);
        margin: 1.5rem 0 0.75rem 0;
        font-size: 0.95rem;
    }

    .menu-items-list {
        list-style: none;
        padding-left: 0;
    }

    .menu-items-list li {
        padding: 0.6rem 0;
        color: var(--text-secondary);
        line-height: 1.6;
        position: relative;
        padding-left: 1.5rem;
        font-size: 0.95rem;
    }

    .menu-items-list li::before {
        content: '•';
        position: absolute;
        left: 0;
        color: var(--primary-color);
        font-weight: 700;
        font-size: 1.2rem;
    }

    /* Dietary Icons */
    .dietary-icons {
        display: flex;
        gap: 1rem;
        margin: 2rem 0 0.75rem 0;
        flex-wrap: wrap;
    }

    .dietary-icons img {
        width: 40px;
        height: 40px;
        opacity: 0.7;
        transition: all 0.3s ease;
        filter: grayscale(50%);
    }

    .dietary-icons img:hover {
        opacity: 1;
        filter: grayscale(0%);
        transform: scale(1.1);
    }

    .dietary-note {
        color: var(--text-muted);
        font-size: 0.9rem;
        line-height: 1.6;
        margin-bottom: 2rem;
    }

    /* Quantity Selector */
    .quantity-selector {
        background: var(--bg-secondary);
        border-radius: 12px;
        padding: 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .quantity-label {
        font-weight: 600;
        color: var(--text-primary);
        font-size: 1rem;
    }

    .quantity-controls {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.5rem;
    }

    .quantity-btn {
        background: white;
        border: 2px solid var(--border-light);
        width: 35px;
        height: 35px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        color: var(--text-secondary);
    }

    .quantity-btn:hover {
        background: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
    }

    .quantity-input {
        width: 60px;
        padding: 0.5rem;
        text-align: center;
        border: 2px solid var(--border-light);
        border-radius: 8px;
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--text-primary);
    }

    .quantity-input:focus {
        outline: none;
        border-color: var(--primary-color);
    }

    .btn-choose-menu {
        padding: 1rem 2.5rem;
        color: white;
        border: none;
        border-radius: 12px;
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        white-space: nowrap;
    }

    .btn-choose-menu:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .details-grid {
            grid-template-columns: 380px 1fr;
        }
    }

    @media (max-width: 968px) {
        .details-grid {
            grid-template-columns: 1fr;
        }

        .details-image-column {
            min-height: 400px;
        }

        .formule-name {
            font-size: 2.5rem;
        }

        .details-content-column {
            max-height: none;
        }

        .quantity-selector {
            flex-direction: column;
            align-items: stretch;
        }

        .btn-choose-menu {
            width: 100%;
            text-align: center;
        }
    }

    @media (max-width: 768px) {
        .details-header-bar {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }

        .details-content-column {
            padding: 1.5rem;
        }

        .formule-name {
            font-size: 2rem;
        }

        .image-overlay {
            padding: 1.5rem;
        }
    }
</style>

<script>
    function incrementQuantity() {
        const input = document.getElementById('personCount');
        input.value = parseInt(input.value) + 1;
    }

    function decrementQuantity() {
        const input = document.getElementById('personCount');
        if (parseInt(input.value) > 12) {
            input.value = parseInt(input.value) - 1;
        }
    }

    function chooseMenu() {
        const category = '<?php echo $category; ?>';
        const persons = document.getElementById('personCount').value;
        window.location.href = '?page=supplements&category=' + category + '&persons=' + persons;
    }
</script>