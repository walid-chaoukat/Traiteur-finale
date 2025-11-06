<?php
// supplements-page.php - Enhanced with input validation, timestamp, database storage, and email notification
// Database connection
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'TraiteurDB');
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
// Get service and person count from URL
$service = isset($_GET['service']) ? strtolower($_GET['service']) : 'traiteur';
$persons = isset($_GET['persons']) ? max(10, intval($_GET['persons'])) : 10;
$basePrices = [
    'chef_domicile' => 70.00,
    'traiteur' => 50.00,
    'buffets' => 45.00,
    'plateaux_repas' => 25.00
];
$basePrice = isset($basePrices[$service]) ? floatval($basePrices[$service]) : 50.00;
$formules = [];
switch ($service) {
    case 'chef_domicile':
        $formules = [
            ['title' => 'Formule Raffinée', 'price' => 49.90, 'desc' => 'Menu sur mesure (amuse-bouche + entrée + plat + dessert)<br>Chef sur place : cuisson, finition et dressage à l’assiette<br>Courses et préparation partielle incluses'],
            ['title' => 'Formule Prestige', 'price' => 79.90, 'desc' => 'Tout le contenu de la formule Raffinée<br>Produits de saison premium<br>Produits labellisés et pièces plus nobles<br>Dressage plus travaillé, avec touche truffe en saison'],
            ['title' => 'Formule Excellence', 'price' => 99.90, 'desc' => 'Tout le contenu de la formule Prestige, avec amuse-bouche et mignardises supplémentaires<br>Expérience gastronomique, menu exclusif, produits nobles<br>Sélection d’ingrédients Signature']
        ];
        break;
    case 'plateaux_repas':
        $formules = [
            ['title' => 'Poisson', 'price' => 19.50, 'desc' => 'Poisson en vinaigrette, Sauce yaourt au citron et jeunes pousses<br>Merlu snacké, légumes petits fagots rôtis, huile, sauce vierge<br>Panna cotta, coulis de fruits rouges'],
            ['title' => 'Bœuf', 'price' => 21.50, 'desc' => 'Concombre Mojito<br>Bœuf braisé, écrasé de pomme de terre aux herbes, jus au romarin<br>Salade de fruit'],
            ['title' => 'Volaille', 'price' => 21.50, 'desc' => 'Salade de pois chiches aux agrumes, herbes fraîches<br>Volaille rôtie en bonne moelle, caviar de patate douce, petit pois croquant, jus tranché<br>Crumble pomme'],
            ['title' => 'Vegan', 'price' => 19.50, 'desc' => 'Houmous de betterave, toasts aux céréales<br>Curry de légumes, lentilles corail, falafel de pois chiches au quinoa et riz basmati<br>Perles de chia au lait de coco & mangue']
        ];
        break;
    case 'traiteur':
        $formules = [
            ['title' => 'Formule – 9 Pièces', 'price' => 20.90, 'desc' => '<span class="formule-label">Cocktails salés</span><ul><li>Houmous de betterave au za’atar, sablé croquant</li><li>Volaille fondante, caviar de champignons de Paris</li><li>Tartelette avocat, thon, agrumes</li><li>Club de thon</li></ul><span class="formule-label">Mini plat</span><ul><li>Chakchouka aux épices libanaises, chèvre frais</li></ul><span class="formule-label">Cocktails sucrés</span><ul><li>Tartelette chocolat praliné</li><li>Tartelette fruits rouges</li></ul>'],
            ['title' => 'Formule – 12 Pièces', 'price' => 26.90, 'desc' => '<span class="formule-label">Cocktails salés</span><ul><li>Tartelette poireaux Saint-Jacques, crème safranée</li><li>Wrap du chef</li><li>Sablé parmesan, tomate basilic, crème pesto verde</li><li>Nouvelles de poisson du jour</li><li>Comté AOP, chutney de figues, cerneaux de noix</li><li>Club de volaille</li></ul><span class="formule-label">Mini plat</span><ul><li>Poké Bowl (saumon ou végétarien)</li></ul><span class="formule-label">Cocktails sucrés</span><ul><li>Choux façon profiterole</li><li>Canelés bordelais</li><li>Tartelette caramel beurre salé</li></ul>'],
            ['title' => 'Formule – 18 Pièces', 'price' => 36.90, 'desc' => '<span class="formule-label">Cocktails salés</span><ul><li>Bœuf mi-cuit, condiment iodé, fruits rouges</li><li>Wrap du chef</li><li>Toffu printanier</li><li>Club de thon</li><li>Houmous de betterave au za’atar, sablé croquant</li><li>Mini tartelette safranée à l’espagnole</li><li>Sablé parmesan, tomates basilic, crème pesto verde</li><li>Comté AOP, chutney de figues, cerneaux de noix</li><li>Tartelette chèvre, petit pois mentholé</li><li>Nouvelles de poisson du jour</li></ul><span class="formule-label">Mini plat</span><ul><li>Volaille fondante, crémeux patate douce, petits pois croquants, jus herbacé</li></ul><span class="formule-label">Cocktails sucrés</span><ul><li>Mini muffins</li><li>Tartelette citron meringuée</li><li>Canelés bordelais</li><li>Tartelette fruits rouges</li><li>Choux façon profiterole</li></ul>'],
            ['title' => 'Formule – 20 Pièces', 'price' => 39.90, 'desc' => '<span class="formule-label">Cocktails salés</span><ul><li>Wrap du chef</li><li>Tartelette poireaux Saint-Jacques, crème safranée</li><li>Concombre mojito</li><li>Saumon gravlax, crème citronnée et raifort</li><li>Sablé parmesan, tomates basilic, crème pesto verde</li><li>Nouvelles de poisson du jour</li><li>Pain d’épice, foie gras, graines de tournesol</li><li>Comté AOP, chutney de figues, cerneaux de noix</li><li>Tartelette avocat, thon, agrumes</li><li>Houmous de betterave au za’atar, sablé croquant</li><li>Tartelette chèvre, petit pois mentholé</li><li>Volaille fondante, caviar de champignons de Paris</li></ul><span class="formule-label">Mini plat</span><ul><li>Pressée de bœuf braisé, purée de pomme de terre, jus corsé au romarin</li></ul><span class="formule-label">Cocktails sucrés</span><ul><li>Tartelette chocolat praliné</li><li>Tartelette citron meringuée</li><li>Assortiment de macarons exotiques</li><li>Choux façon profiterole</li><li>Canelés bordelais</li></ul>']
        ];
        break;
    case 'buffets':
        $formules = [
            ['title' => 'Classique', 'price' => 45.00, 'desc' => 'Menu buffet de base adapté à tous les budgets'],
            ['title' => 'Raffinée', 'price' => 60.00, 'desc' => 'Menu buffet avec produits de saison premium'],
            ['title' => 'Prestige', 'price' => 75.00, 'desc' => 'Menu buffet avec produits nobles et dressage travaillé']
        ];
        break;
}
$supplements = [
    ['name' => 'Serveur', 'price' => 160.00, 'desc' => '1 serveur pour 10 pers. 4h sur site.'],
    ['name' => 'Pièces cocktails supplémentaires', 'price' => 10.00, 'desc' => 'Trio de pièces cocktails'],
    ['name' => 'Mignardises supplémentaires', 'price' => 10.00, 'desc' => 'Trio de mignardises'],
    ['name' => 'Plateau de charcuterie', 'price' => 50.00, 'desc' => 'Sélection MOF pour 10 personnes'],
    ['name' => 'Plateau de fromage', 'price' => 50.00, 'desc' => 'Sélection MOF pour 10 personnes'],
    ['name' => 'Glaçons', 'price' => 50.00, 'desc' => 'Sac 20kg'],
    ['name' => 'Glace pilée', 'price' => 50.00, 'desc' => 'Glace pilée sac 20kg'],
    ['name' => 'Nappe', 'price' => 40.00, 'desc' => 'Nappe pour 10 personnes']
];
$services = [
    ['title' => 'Location Verrerie', 'desc' => 'Mise à disposition d\'ensemble de verrerie.'],
    ['title' => 'Animation', 'desc' => 'Stand hot-dog, burger, découpe...'],
    ['title' => 'Entremet sur mesure', 'desc' => 'Paris-Brest, fraisier... sur devis.']
];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation - <?php echo htmlspecialchars(ucfirst($service)); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
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
            --error: #d32f2f;
            --shadow-sm: 0 2px 8px rgba(156, 158, 71, 0.1);
            --shadow-md: 0 6px 20px rgba(156, 158, 71, 0.15);
            --shadow-lg: 0 12px 30px rgba(156, 158, 71, 0.18);
            --radius-sm: 10px;
            --radius-md: 14px;
            --radius-lg: 18px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', 'Segoe UI', sans-serif;
            background: #fafaf5;
            color: var(--text-primary);
            line-height: 1.6;
            overflow-x: hidden;
        }

        .supplements-page {
            max-width: 1200px;
            margin: 1rem auto;
            padding: 0 1rem;
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(8px);
            }

            to {
                opacity: 1;
                transform: none;
            }
        }

        .hero-banner-small {
            position: relative;
            height: clamp(100px, 20vw, 140px);
            border-radius: var(--radius-lg);
            overflow: hidden;
            margin-bottom: 1.5rem;
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
            left: clamp(1rem, 3vw, 2rem);
            transform: translateY(-50%);
            font-size: clamp(1.5rem, 5vw, 2rem);
            font-weight: 800;
            color: #fff;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.4);
        }

        .order-summary {
            display: grid;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .summary-card {
            background: var(--bg-white);
            border-radius: var(--radius-md);
            padding: 1.2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .summary-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .summary-content {
            display: flex;
            flex-wrap: wrap;
            gap: 0.8rem;
            align-items: center;
            flex: 1;
            min-width: 200px;
        }

        .person-controls {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .summary-label {
            font-weight: 700;
            font-size: clamp(0.9rem, 2vw, 0.95rem);
        }

        .summary-value {
            font-size: clamp(0.9rem, 2vw, 0.95rem);
            color: var(--text-secondary);
        }

        .summary-price {
            font-weight: 800;
            font-size: clamp(0.95rem, 2vw, 1rem);
            color: var(--primary);
        }

        .btn-modify-link {
            color: var(--text-light);
            font-size: 0.85rem;
            font-weight: 500;
            text-decoration: underline;
            transition: color 0.2s ease;
            cursor: pointer;
        }

        .btn-modify-link:hover {
            color: var(--primary);
        }

        .formules-section,
        .supplements-section,
        .services-section,
        .date-time-section,
        .contact-section,
        .submit-section {
            background: var(--bg-white);
            border-radius: var(--radius-lg);
            padding: clamp(1.2rem, 3vw, 1.5rem);
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border);
        }

        .section-main-title {
            font-size: clamp(1.2rem, 4vw, 1.4rem);
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 1rem;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .section-main-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 40px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary), var(--primary-light));
            border-radius: 2px;
        }

        .formules-grid,
        .supplements-grid,
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(min(100%, 280px), 1fr));
            gap: 1rem;
        }

        .formule-card,
        .supplement-card {
            border: 2px solid var(--border);
            border-radius: var(--radius-md);
            padding: 1.2rem;
            display: flex;
            flex-direction: column;
            background: var(--bg-white);
            transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
        }

        .formule-card:hover,
        .supplement-card:hover {
            border-color: var(--primary);
            box-shadow: var(--shadow-lg);
            transform: translateY(-4px);
        }

        .formule-header,
        .supplement-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            align-items: flex-start;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .formule-info,
        .supplement-info {
            flex: 1;
            min-width: 180px;
        }

        .formule-title,
        .supplement-title {
            font-size: clamp(1rem, 2.5vw, 1.1rem);
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .formule-desc,
        .supplement-desc {
            font-size: clamp(0.85rem, 2vw, 0.9rem);
            color: var(--text-secondary);
            line-height: 1.6;
        }

        .formule-desc {
            max-height: 120px;
            overflow: hidden;
            transition: max-height 0.4s ease;
        }

        .formule-desc.expanded {
            max-height: 1000px;
        }

        .formule-desc ul {
            padding-left: 1.2rem;
            margin: 0.4rem 0;
        }

        .formule-desc li {
            margin-bottom: 0.3rem;
            font-size: clamp(0.8rem, 2vw, 0.85rem);
        }

        .formule-label {
            font-size: clamp(0.9rem, 2vw, 0.95rem);
            font-weight: 700;
            color: var(--primary);
            display: block;
            margin: 0.6rem 0 0.3rem;
        }

        .expand-btn {
            background: none;
            border: none;
            color: var(--primary);
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            padding: 0.3rem 0;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.3rem;
            transition: color 0.2s ease;
        }

        .expand-btn:hover {
            color: var(--primary-dark);
        }

        .expand-btn i {
            font-size: 0.7rem;
            transition: transform 0.3s ease;
        }

        .expand-btn.expanded i {
            transform: rotate(180deg);
        }

        .expand-btn.hidden {
            display: none;
        }

        .formule-price,
        .supplement-price {
            font-size: clamp(1.1rem, 2.5vw, 1.2rem);
            font-weight: 800;
            color: var(--primary-dark);
            white-space: nowrap;
        }

        .formule-diff {
            font-size: 0.85rem;
            color: var(--primary-dark);
            font-weight: 600;
            margin-top: 0.5rem;
        }

        .formule-controls,
        .supplement-controls {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            justify-content: center;
            margin-top: auto;
            padding-top: 1rem;
        }

        .qty-btn {
            width: 40px;
            height: 40px;
            border: 1.5px solid var(--border);
            background: var(--bg-white);
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
            color: var(--text-secondary);
            font-size: 0.9rem;
            touch-action: manipulation;
        }

        .qty-btn:hover:not(:disabled) {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        .qty-btn:active:not(:disabled) {
            transform: scale(0.95);
        }

        .qty-btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        .qty-display {
            font-size: clamp(1.1rem, 3vw, 1.3rem);
            font-weight: 700;
            color: var(--primary);
            min-width: 50px;
            text-align: center;
        }

        .service-card {
            border: 2px solid var(--border);
            border-radius: var(--radius-md);
            padding: 1.5rem;
            background: var(--bg-white);
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .service-card:hover {
            border-color: var(--primary);
            box-shadow: var(--shadow-lg);
            transform: translateY(-4px);
        }

        .service-card.selected {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-color: var(--primary-dark);
        }

        .service-card.selected .service-title,
        .service-card.selected .service-desc {
            color: white;
        }

        .service-card.selected::after {
            content: '✓';
            position: absolute;
            top: 0.8rem;
            right: 0.8rem;
            width: 24px;
            height: 24px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 0.9rem;
            color: white;
        }

        .service-title {
            font-size: clamp(1rem, 2.5vw, 1.1rem);
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.4rem;
        }

        .service-desc {
            font-size: clamp(0.85rem, 2vw, 0.9rem);
            color: var(--text-secondary);
        }

        .date-time-section p {
            font-size: clamp(0.85rem, 2vw, 0.9rem);
            color: var(--text-secondary);
            margin-bottom: 1rem;
            line-height: 1.5;
        }

        .date-time-wrapper {
            position: relative;
            border-radius: var(--radius-lg);
            background: var(--bg-light);
            padding: clamp(1rem, 3vw, 1.5rem);
            box-shadow: inset 0 2px 8px rgba(156, 158, 71, 0.05);
            overflow: hidden;
        }

        .date-nav-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            background: var(--bg-white);
            border: 1.5px solid var(--border);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            color: var(--text-secondary);
            cursor: pointer;
            transition: all 0.2s ease;
            z-index: 10;
            touch-action: manipulation;
        }

        .date-nav-arrow:hover:not(:disabled) {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .date-nav-arrow:disabled {
            opacity: 0.3;
            cursor: not-allowed;
            pointer-events: none;
        }

        .date-nav-arrow.left {
            left: 0.5rem;
        }

        .date-nav-arrow.right {
            right: 0.5rem;
        }

        .days-time-grid {
            display: grid;
            grid-template-columns: repeat(7, minmax(90px, 1fr));
            gap: 0.6rem;
            max-width: 100%;
        }

        .day-column {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.6rem;
        }

        .day-header {
            width: 100%;
            text-align: center;
            padding: 0.8rem 0.5rem;
            background: var(--bg-white);
            border: 1.5px solid var(--border);
            border-radius: var(--radius-sm);
            transition: all 0.2s ease;
        }

        .day-header:hover {
            background: var(--primary-light);
            transform: translateY(-2px);
        }

        .day-header .day-name {
            font-size: clamp(0.85rem, 2vw, 0.9rem);
            font-weight: 700;
            color: var(--primary);
        }

        .day-header .date-num {
            font-size: clamp(0.8rem, 1.8vw, 0.85rem);
            color: var(--primary-dark);
            margin-top: 0.2rem;
        }

        .time-cell {
            background: var(--bg-white);
            border: 1.5px solid var(--border);
            border-radius: var(--radius-sm);
            padding: 0.7rem 0.4rem;
            text-align: center;
            font-size: clamp(0.85rem, 2vw, 0.9rem);
            font-weight: 600;
            color: var(--text-primary);
            cursor: pointer;
            transition: all 0.2s ease;
            touch-action: manipulation;
        }

        .time-cell:hover {
            background: var(--primary-light);
            border-color: var(--primary);
            transform: translateY(-2px);
        }

        .time-cell.selected {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
            font-weight: 700;
        }

        .contact-form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(min(100%, 220px), 1fr));
            gap: 1rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-size: clamp(0.85rem, 2vw, 0.9rem);
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.3rem;
        }

        .form-group .optional-tag {
            font-size: 0.7rem;
            color: var(--primary-dark);
            background: var(--primary-light);
            padding: 0.1rem 0.4rem;
            border-radius: 4px;
            margin-left: 0.4rem;
        }

        .form-group input {
            padding: 0.8rem;
            border: 1.5px solid var(--border);
            border-radius: var(--radius-sm);
            font-size: clamp(0.9rem, 2vw, 0.95rem);
            background: var(--bg-white);
            transition: all 0.2s ease;
            width: 100%;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(156, 158, 71, 0.15);
        }

        .form-group input.optional {
            background: var(--bg-light);
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-group.error input {
            border-color: var(--error);
        }

        .error-message {
            color: var(--error);
            font-size: 0.8rem;
            margin-top: 0.3rem;
            display: none;
        }

        .form-group.error .error-message {
            display: block;
        }

        .submit-section {
            background: var(--bg-light);
            border: 1px solid var(--primary-light);
        }

        .checkbox-group {
            display: flex;
            align-items: flex-start;
            gap: 0.6rem;
            margin-bottom: 1rem;
        }

        .checkbox-group input[type="checkbox"] {
            margin-top: 0.2rem;
            accent-color: var(--primary);
            width: 18px;
            height: 18px;
            flex-shrink: 0;
        }

        .checkbox-group label {
            font-size: clamp(0.85rem, 2vw, 0.9rem);
            color: var(--text-secondary);
            line-height: 1.5;
        }

        .btn-submit {
            background: var(--primary);
            color: white;
            border: none;
            border-radius: var(--radius-md);
            padding: 0.9rem 2rem;
            font-size: clamp(1rem, 2.5vw, 1.1rem);
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s ease;
            width: 100%;
            max-width: 320px;
            margin: 0 auto;
            display: block;
            touch-action: manipulation;
        }

        .btn-submit:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        @media (max-width: 768px) {
            .summary-card {
                flex-direction: column;
                align-items: flex-start;
            }

            .days-time-grid {
                grid-template-columns: repeat(4, minmax(75px, 1fr));
            }

            .day-column {
                gap: 0.5rem;
            }

            .day-header {
                min-width: 75px;
                padding: 0.6rem 0.3rem;
            }

            .time-cell {
                padding: 0.6rem 0.3rem;
            }

            .date-nav-arrow {
                width: 36px;
                height: 36px;
                top: 50%;
            }
        }

        @media (max-width: 480px) {
            .supplements-page {
                padding: 0 0.5rem;
            }

            .days-time-grid {
                grid-template-columns: repeat(4, minmax(65px, 1fr));
            }

            .day-column {
                gap: 0.4rem;
            }

            .day-header {
                min-width: 65px;
                padding: 0.5rem 0.2rem;
            }

            .time-cell {
                padding: 0.5rem 0.2rem;
                font-size: clamp(0.8rem, 1.8vw, 0.85rem);
            }

            .date-nav-arrow {
                width: 32px;
                height: 32px;
                font-size: 0.9rem;
            }

            .date-nav-arrow.left {
                left: 0.25rem;
            }

            .date-nav-arrow.right {
                right: 0.25rem;
            }
        }
    </style>
</head>

<body>
    <form method="POST" id="bookingForm" onsubmit="return handleSubmit(event)">
        <section class="supplements-page">
            <input type="hidden" name="service" value="<?php echo htmlspecialchars($service); ?>">
            <input type="hidden" name="persons" id="personsInput" value="<?php echo htmlspecialchars($persons); ?>">
            <input type="hidden" name="base_price" id="base_price" value="<?php echo htmlspecialchars(number_format($basePrice, 2, '.', '')); ?>">
            <input type="hidden" name="event_timestamp" id="eventTimestamp">
            <div class="hero-banner-small">
                <img src="https://images.unsplash.com/photo-1555244162-803834f70033?w=1200&h=200&fit=crop" alt="<?php echo htmlspecialchars(ucfirst($service)); ?>">
                <h1 class="hero-title-small"><?php echo htmlspecialchars(ucfirst($service)); ?></h1>
            </div>
            <div class="order-summary">
                <div class="summary-card">
                    <div class="summary-content">
                        <span class="summary-label">Prestation :</span>
                        <span class="summary-value"><?php echo htmlspecialchars(ucfirst($service)); ?></span>
                    </div>
                    <a href="?page=services" class="btn-modify-link">Modifier</a>
                </div>
                <div class="summary-card">
                    <div class="summary-content">
                        <span class="summary-label">Nombre de personnes :</span>
                        <div class="person-controls">
                            <button type="button" class="qty-btn decrement" id="decrementPerson" onclick="updatePersons(-1)" <?php echo $persons <= 10 ? 'disabled' : ''; ?>><i class="fas fa-minus"></i></button>
                            <span class="qty-display" id="personsDisplay"><?php echo htmlspecialchars($persons); ?></span>
                            <button type="button" class="qty-btn increment" onclick="updatePersons(1)"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="summary-price"><?php echo htmlspecialchars(number_format($basePrice, 2, '.', '')); ?>€ / pers.</div>
                </div>
            </div>
            <div class="formules-section">
                <h2 class="section-main-title">Formules</h2>
                <div class="formules-grid" id="formulesGrid"></div>
            </div>
            <div class="supplements-section">
                <h2 class="section-main-title">Suppléments</h2>
                <div class="supplements-grid" id="supplementsGrid"></div>
            </div>
            <div class="services-section">
                <h2 class="section-main-title">Services additionnels</h2>
                <div class="services-grid" id="servicesGrid"></div>
            </div>
            <div class="date-time-section">
                <h2 class="section-main-title">Choix de la date et heure</h2>
                <p>L'heure choisie est pour le début de repas à titre informatif, elle pourra changer au téléphone si besoin</p>
                <div class="date-time-wrapper">
                    <button type="button" class="date-nav-arrow left" id="prevWeek" onclick="scrollWeek(-1)" disabled><i class="fas fa-chevron-left"></i></button>
                    <button type="button" class="date-nav-arrow right" id="nextWeek" onclick="scrollWeek(1)"><i class="fas fa-chevron-right"></i></button>
                    <div class="days-time-grid" id="daysTimeGrid"></div>
                </div>
                <input type="hidden" name="selected_datetime" id="selectedDateTime">
            </div>
            <div class="contact-section">
                <h2 class="section-main-title">Informations de contact</h2>
                <div class="contact-form">
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" name="nom" required>
                        <span class="error-message">Nom invalide (lettres, espaces, tirets, apostrophes, 2-50 caractères)</span>
                    </div>
                    <div class="form-group">
                        <label>Prénom</label>
                        <input type="text" name="prenom" required>
                        <span class="error-message">Prénom invalide (lettres, espaces, tirets, apostrophes, 2-50 caractères)</span>
                    </div>
                    <div class="form-group">
                        <label>Téléphone</label>
                        <input type="tel" name="telephone" required>
                        <span class="error-message">Numéro de téléphone invalide (ex: +33123456789)</span>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" required>
                        <span class="error-message">Adresse email invalide</span>
                    </div>
                    <div class="form-group full-width">
                        <label>Adresse de l'événement</label>
                        <input type="text" name="adresse" required>
                        <span class="error-message">Adresse invalide (minimum 5 caractères)</span>
                    </div>
                    <div class="form-group">
                        <label>Société <span class="optional-tag">Optionnel</span></label>
                        <input type="text" name="societe" class="optional">
                        <span class="error-message">Société invalide (2-255 caractères si rempli)</span>
                    </div>
                    <div class="form-group">
                        <label>Code postal</label>
                        <input type="text" name="code_postal" required>
                        <span class="error-message">Code postal invalide (5 chiffres pour la France)</span>
                    </div>
                    <div class="form-group">
                        <label>Ville</label>
                        <input type="text" name="ville" required>
                        <span class="error-message">Ville invalide (lettres, espaces, tirets, apostrophes, 2-50 caractères)</span>
                    </div>
                    <div class="form-group full-width">
                        <label>Remarques <span class="optional-tag">Optionnel</span></label>
                        <input type="text" name="remarques" class="optional" placeholder="Végétarien, gluten...">
                        <span class="error-message">Remarques invalides (2-255 caractères si rempli)</span>
                    </div>
                </div>
            </div>
            <div class="submit-section">
                <h2 class="section-main-title">Validation</h2>
                <div class="checkbox-group">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">Je reconnais avoir pris connaissance et accepter les CGU.</label>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="newsletter" name="newsletter">
                    <label for="newsletter">J'accepte de recevoir la newsletter.</label>
                </div>
                <button type="submit" class="btn-submit">Confirmer</button>
            </div>
        </section>
    </form>
    <script>
        // DATA
        const formules = <?php echo json_encode($formules); ?>;
        const supplements = <?php echo json_encode($supplements); ?>;
        const services = <?php echo json_encode($services); ?>;
        // DATE CONFIG
        const times = ['12:00', '13:00', '19:00', '20:00'];
        const today = new Date('2025-11-06T13:17:00+01:00');
        const startDate = new Date(today);
        startDate.setDate(today.getDate() + 1); // Tomorrow: November 7, 2025
        const endDate = new Date(startDate);
        endDate.setDate(startDate.getDate() + 30); // December 6, 2025
        let currentWeekOffset = 0;
        const daysPerPageLarge = 7;
        const daysPerPageSmall = 4;
        // VALIDATION REGEX
        const validators = {
            nom: /^[A-Za-zÀ-ÿ\s'-]{2,50}$/,
            prenom: /^[A-Za-zÀ-ÿ\s'-]{2,50}$/,
            telephone: /^\+?[1-9]\d{1,14}$/,
            email: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
            adresse: /^.{5,255}$/,
            code_postal: /^\d{5}$/,
            ville: /^[A-Za-zÀ-ÿ\s'-]{2,50}$/,
            societe: /^(.{2,255})?$/,
            remarques: /^(.{2,255})?$/
        };
        // RENDER FORMULES
        function renderFormules() {
            const grid = document.getElementById('formulesGrid');
            grid.innerHTML = '';
            if (!formules || !Array.isArray(formules)) {
                console.error('Formules data is invalid:', formules);
                grid.innerHTML = '<p>Erreur: Aucune formule disponible.</p>';
                return;
            }
            formules.forEach((formule, index) => {
                const diff = index > 0 && formules[0] ? (formule.price - formules[0].price).toFixed(2) : null;
                const card = document.createElement('div');
                card.className = 'formule-card';
                card.dataset.name = formule.title;
                card.dataset.price = Number(formule.price).toFixed(2);
                card.innerHTML = `
                <div class="formule-header">
                    <div class="formule-info">
                        <h3 class="formule-title"><i class="fas fa-utensils"></i> ${formule.title}</h3>
                        <div class="formule-desc" id="desc-${index}">
                            ${formule.desc}
                        </div>
                        <button type="button" class="expand-btn" id="expand-btn-${index}" onclick="toggleExpand(${index})">
                            <span class="expand-text">Voir plus</span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        ${diff ? `<p class="formule-diff">Différence : +${diff}€ / pers.</p>` : ''}
                    </div>
                    <div class="formule-price">+${Number(formule.price).toFixed(2)}€ / pers</div>
                </div>
                <div class="formule-controls">
                    <button type="button" class="qty-btn decrement" onclick="updateQty(this, -1)" disabled>
                        <i class="fas fa-minus"></i>
                    </button>
                    <span class="qty-display">0</span>
                    <button type="button" class="qty-btn increment" onclick="updateQty(this, 1)">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            `;
                grid.appendChild(card);
            });
            formules.forEach((_, index) => {
                const desc = document.getElementById(`desc-${index}`);
                const btn = document.getElementById(`expand-btn-${index}`);
                if (desc.scrollHeight <= 120) {
                    btn.classList.add('hidden');
                }
            });
        }
        // RENDER SUPPLEMENTS
        function renderSupplements() {
            const grid = document.getElementById('supplementsGrid');
            grid.innerHTML = '';
            if (!supplements || !Array.isArray(supplements)) {
                console.error('Supplements data is invalid:', supplements);
                grid.innerHTML = '<p>Erreur: Aucune supplément disponible.</p>';
                return;
            }
            supplements.forEach(supplement => {
                const card = document.createElement('div');
                card.className = 'supplement-card';
                card.dataset.name = supplement.name;
                card.dataset.price = Number(supplement.price).toFixed(2);
                card.innerHTML = `
                <div class="supplement-header">
                    <div class="supplement-info">
                        <h3 class="supplement-title">${supplement.name}</h3>
                        <p class="supplement-desc">${supplement.desc}</p>
                    </div>
                    <div class="supplement-price">+${Number(supplement.price).toFixed(2)}€</div>
                </div>
                <div class="supplement-controls">
                    <button type="button" class="qty-btn decrement" onclick="updateQty(this, -1)" disabled>
                        <i class="fas fa-minus"></i>
                    </button>
                    <span class="qty-display">0</span>
                    <button type="button" class="qty-btn increment" onclick="updateQty(this, 1)">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            `;
                grid.appendChild(card);
            });
        }
        // RENDER SERVICES
        function renderServices() {
            const grid = document.getElementById('servicesGrid');
            grid.innerHTML = '';
            if (!services || !Array.isArray(services)) {
                console.error('Services data is invalid:', services);
                grid.innerHTML = '<p>Erreur: Aucun service disponible.</p>';
                return;
            }
            services.forEach(service => {
                const card = document.createElement('div');
                card.className = 'service-card';
                card.onclick = () => toggleService(card);
                card.innerHTML = `
                <h3 class="service-title">${service.title}</h3>
                <p class="service-desc">${service.desc}</p>
            `;
                grid.appendChild(card);
            });
        }
        // UPDATE PERSONS
        function updatePersons(change) {
            const display = document.getElementById('personsDisplay');
            const input = document.getElementById('personsInput');
            const decrementBtn = document.getElementById('decrementPerson');
            let persons = parseInt(display.textContent) + change;
            persons = Math.max(10, persons);
            display.textContent = persons;
            input.value = persons;
            decrementBtn.disabled = persons <= 10;
        }
        // UPDATE QTY
        function updateQty(btn, change) {
            const card = btn.closest('.formule-card, .supplement-card');
            const display = card.querySelector('.qty-display');
            const decrementBtn = card.querySelector('.decrement');
            let qtyText = display.textContent.trim();
            let qty = parseInt(qtyText.replace('x', '')) || 0;
            qty = Math.max(0, qty + change);
            display.textContent = qty === 0 ? '0' : `x${qty}`;
            decrementBtn.disabled = qty === 0;
        }
        // TOGGLE SERVICE
        function toggleService(card) {
            card.classList.toggle('selected');
        }
        // TOGGLE EXPAND
        function toggleExpand(index) {
            const desc = document.getElementById(`desc-${index}`);
            const btn = document.getElementById(`expand-btn-${index}`);
            desc.classList.toggle('expanded');
            btn.classList.toggle('expanded');
            btn.querySelector('.expand-text').textContent = desc.classList.contains('expanded') ? 'Voir moins' : 'Voir plus';
        }
        // DATE PICKER
        function generateWeek(offset) {
            const grid = document.getElementById('daysTimeGrid');
            grid.innerHTML = '';
            const isSmallScreen = window.innerWidth <= 768;
            const daysPerPage = isSmallScreen ? daysPerPageSmall : daysPerPageLarge;
            const firstDay = new Date(startDate);
            firstDay.setDate(startDate.getDate() + (offset * daysPerPage));
            const daysToShow = Math.min(daysPerPage, Math.ceil((endDate - firstDay) / (1000 * 60 * 60 * 24)) + 1);
            if (firstDay > endDate) return;
            for (let i = 0; i < daysToShow; i++) {
                const date = new Date(firstDay);
                date.setDate(firstDay.getDate() + i);
                if (date > endDate) break;
                const dayName = date.toLocaleDateString('fr-FR', {
                    weekday: 'short'
                });
                const dateNum = date.getDate();
                const month = date.toLocaleDateString('fr-FR', {
                    month: 'short'
                });
                const dateStr = date.toLocaleDateString('fr-FR', {
                    day: 'numeric',
                    month: 'short'
                });
                const timestamp = date.toISOString().split('T')[0];
                const column = document.createElement('div');
                column.className = 'day-column';
                column.innerHTML = `
                <div class="day-header">
                    <div class="day-name">${dayName}</div>
                    <div class="date-num">${dateNum} ${month}</div>
                </div>
            `;
                times.forEach(time => {
                    const cell = document.createElement('div');
                    cell.className = 'time-cell';
                    cell.textContent = time;
                    cell.dataset.datetime = `${dateStr} - ${time}`;
                    cell.dataset.timestamp = `${timestamp} ${time}:00`;
                    cell.onclick = () => selectTime(cell);
                    column.appendChild(cell);
                });
                grid.appendChild(column);
            }
            updateArrows();
        }

        function selectTime(cell) {
            document.querySelectorAll('.time-cell').forEach(c => c.classList.remove('selected'));
            cell.classList.add('selected');
            document.getElementById('selectedDateTime').value = cell.dataset.datetime;
            document.getElementById('eventTimestamp').value = cell.dataset.timestamp;
        }

        function scrollWeek(direction) {
            const isSmallScreen = window.innerWidth <= 768;
            const daysPerPage = isSmallScreen ? daysPerPageSmall : daysPerPageLarge;
            const newOffset = currentWeekOffset + direction;
            const firstDay = new Date(startDate);
            firstDay.setDate(startDate.getDate() + (newOffset * daysPerPage));
            if (firstDay < startDate || firstDay > endDate) return;
            currentWeekOffset = newOffset;
            generateWeek(currentWeekOffset);
        }

        function updateArrows() {
            const prevBtn = document.getElementById('prevWeek');
            const nextBtn = document.getElementById('nextWeek');
            const isSmallScreen = window.innerWidth <= 768;
            const daysPerPage = isSmallScreen ? daysPerPageSmall : daysPerPageLarge;
            const firstDay = new Date(startDate);
            firstDay.setDate(startDate.getDate() + (currentWeekOffset * daysPerPage));
            const nextFirstDay = new Date(startDate);
            nextFirstDay.setDate(startDate.getDate() + ((currentWeekOffset + 1) * daysPerPage));
            prevBtn.disabled = currentWeekOffset <= 0;
            nextBtn.disabled = nextFirstDay > endDate;
        }
        // FORM VALIDATION
        function validateForm() {
            let isValid = true;
            document.querySelectorAll('.form-group').forEach(group => {
                const input = group.querySelector('input');
                const name = input.name;
                const value = input.value.trim();
                const error = group.querySelector('.error-message');
                if (input.required && !value) {
                    group.classList.add('error');
                    isValid = false;
                } else if (validators[name] && value && !validators[name].test(value)) {
                    group.classList.add('error');
                    isValid = false;
                } else if (['societe', 'remarques'].includes(name) && value && !validators[name].test(value)) {
                    group.classList.add('error');
                    isValid = false;
                } else {
                    group.classList.remove('error');
                }
            });
            const formulesSelected = Array.from(document.querySelectorAll('.formule-card')).some(card =>
                parseInt(card.querySelector('.qty-display').textContent.replace('x', '')) > 0
            );
            if (!formulesSelected) {
                alert('Veuillez sélectionner au moins une formule.');
                isValid = false;
            }
            const selectedTime = document.getElementById('selectedDateTime').value;
            if (!selectedTime) {
                alert('Veuillez sélectionner une date et une heure.');
                isValid = false;
            }
            const terms = document.getElementById('terms');
            if (!terms.checked) {
                alert('Veuillez accepter les conditions générales.');
                isValid = false;
            }
            return isValid;
        }
        // FORM SUBMISSION
        function handleSubmit(e) {
            e.preventDefault();
            if (!validateForm()) return;
            const persons = parseInt(document.getElementById('personsInput').value);
            const basePrice = parseFloat(document.getElementById('base_price').value);
            const data = {
                service: '<?php echo htmlspecialchars($service); ?>',
                persons: persons,
                base_price: basePrice,
                formules: [],
                supplements: [],
                services: [],
                datetime: document.getElementById('selectedDateTime').value,
                event_timestamp: document.getElementById('eventTimestamp').value,
                contact: {
                    nom: document.querySelector('[name="nom"]').value,
                    prenom: document.querySelector('[name="prenom"]').value,
                    telephone: document.querySelector('[name="telephone"]').value,
                    email: document.querySelector('[name="email"]').value,
                    adresse: document.querySelector('[name="adresse"]').value,
                    societe: document.querySelector('[name="societe"]').value || null,
                    code_postal: document.querySelector('[name="code_postal"]').value,
                    ville: document.querySelector('[name="ville"]').value,
                    remarques: document.querySelector('[name="remarques"]').value || null
                },
                terms: document.getElementById('terms').checked,
                newsletter: document.getElementById('newsletter').checked,
                total: 0.00
            };
            let total = basePrice * persons;
            let formulesText = [];
            document.querySelectorAll('.formule-card').forEach(card => {
                const qty = parseInt(card.querySelector('.qty-display').textContent.replace('x', '') || 0);
                if (qty > 0) {
                    const price = parseFloat(card.dataset.price);
                    data.formules.push({
                        name: card.dataset.name,
                        quantity: qty,
                        price: price
                    });
                    formulesText.push(`${card.dataset.name} x${qty}`);
                    total += price * qty * persons;
                }
            });
            let supplementsText = [];
            document.querySelectorAll('.supplement-card').forEach(card => {
                const qty = parseInt(card.querySelector('.qty-display').textContent.replace('x', '') || 0);
                if (qty > 0) {
                    const price = parseFloat(card.dataset.price);
                    data.supplements.push({
                        name: card.dataset.name,
                        quantity: qty,
                        price: price
                    });
                    supplementsText.push(`${card.dataset.name} x${qty}`);
                    total += price * qty;
                }
            });
            let servicesText = [];
            document.querySelectorAll('.service-card.selected').forEach(card => {
                const title = card.querySelector('.service-title').textContent;
                data.services.push(title);
                servicesText.push(title);
            });
            data.formules_text = formulesText.join('|');
            data.supplements_text = supplementsText.length > 0 ? supplementsText.join('|') : null;
            data.services_text = servicesText.length > 0 ? servicesText.join('|') : null;
            data.total = parseFloat(total.toFixed(2));
            console.log('SUBMISSION:', data);
            fetch(window.location.href, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.text())
                .then(text => {
                    console.log('Server response:', text);
                    alert('Réservation confirmée ! Vérifiez la console pour les détails.');
                })
                .catch(error => console.error('Error:', error));
        }
        // INIT
        document.addEventListener('DOMContentLoaded', () => {
            console.log('Formules:', formules);
            console.log('Supplements:', supplements);
            console.log('Services:', services);
            renderFormules();
            renderSupplements();
            renderServices();
            generateWeek(0);
            window.addEventListener('resize', () => generateWeek(currentWeekOffset));
        });
    </script>
</body>

</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $submission = json_decode(file_get_contents('php://input'), true);
    if (!$submission) {
        echo json_encode(['error' => 'Invalid submission data']);
        exit;
    }
    try {
        $pdo->beginTransaction();
        // Insert into contacts
        $stmt = $pdo->prepare("
            INSERT INTO contacts (nom, prenom, telephone, email, adresse, societe, code_postal, ville, remarques)
            VALUES (:nom, :prenom, :telephone, :email, :adresse, :societe, :code_postal, :ville, :remarques)
        ");
        $stmt->execute([
            'nom' => $submission['contact']['nom'],
            'prenom' => $submission['contact']['prenom'],
            'telephone' => $submission['contact']['telephone'],
            'email' => $submission['contact']['email'],
            'adresse' => $submission['contact']['adresse'],
            'societe' => $submission['contact']['societe'],
            'code_postal' => $submission['contact']['code_postal'],
            'ville' => $submission['contact']['ville'],
            'remarques' => $submission['contact']['remarques']
        ]);
        $contact_id = $pdo->lastInsertId();
        // Insert into commandes
        $stmt = $pdo->prepare("
            INSERT INTO commandes (contact_id, service, persons, base_price, formules, supplements, services, event_timestamp, total, terms, newsletter)
            VALUES (:contact_id, :service, :persons, :base_price, :formules, :supplements, :services, :event_timestamp, :total, :terms, :newsletter)
        ");
        $stmt->execute([
            'contact_id' => $contact_id,
            'service' => $submission['service'],
            'persons' => $submission['persons'],
            'base_price' => $submission['base_price'],
            'formules' => $submission['formules_text'],
            'supplements' => $submission['supplements_text'],
            'services' => $submission['services_text'],
            'event_timestamp' => $submission['event_timestamp'],
            'total' => $submission['total'],
            'terms' => $submission['terms'] ? 1 : 0,
            'newsletter' => $submission['newsletter'] ? 1 : 0
        ]);
        $pdo->commit();

        // Send email notification
        $to = 'contact@traiteur.com'; // Replace with your email address
        $subject = 'Nouvelle Réservation - Traiteur';
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "From: no-reply@traiteur.com\r\n"; // Replace with your sender email
        $message = '
        <html>
        <head>
            <style>
                body {
                    font-family: "Inter", "Segoe UI", sans-serif;
                    background: #fafaf5;
                    color: #2d2d2d;
                    line-height: 1.6;
                }
                .email-container {
                    max-width: 600px;
                    margin: 20px auto;
                    padding: 20px;
                    background: #ffffff;
                    border: 1px solid #e8e8d8;
                    border-radius: 14px;
                    box-shadow: 0 6px 20px rgba(156, 158, 71, 0.15);
                }
                h1 {
                    font-size: 24px;
                    font-weight: 800;
                    color: #9c9e47;
                    margin-bottom: 20px;
                    text-align: center;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-bottom: 20px;
                }
                th, td {
                    padding: 12px;
                    text-align: left;
                    border-bottom: 1px solid #e8e8d8;
                    font-size: 14px;
                }
                th {
                    background: #9c9e47;
                    color: #ffffff;
                    font-weight: 700;
                }
                td {
                    background: #fdfdf9;
                    color: #555;
                }
                .total-row td {
                    font-weight: 800;
                    color: #9c9e47;
                }
                .section-title {
                    font-size: 18px;
                    font-weight: 700;
                    color: #9c9e47;
                    margin: 20px 0 10px;
                }
                .footer {
                    text-align: center;
                    font-size: 12px;
                    color: #777;
                    margin-top: 20px;
                }
            </style>
        </head>
        <body>
            <div class="email-container">
                <h1>Nouvelle Réservation</h1>
                <div class="section-title">Détails de la prestation</div>
                <table>
                    <tr>
                        <th>Service</th>
                        <td>' . htmlspecialchars($submission['service']) . '</td>
                    </tr>
                    <tr>
                        <th>Nombre de personnes</th>
                        <td>' . htmlspecialchars($submission['persons']) . '</td>
                    </tr>
                    <tr>
                        <th>Prix de base</th>
                        <td>' . number_format($submission['base_price'], 2, ',', '') . ' € / pers.</td>
                    </tr>
                    <tr>
                        <th>Date et heure</th>
                        <td>' . htmlspecialchars($submission['datetime']) . '</td>
                    </tr>
                </table>
                <div class="section-title">Formules sélectionnées</div>
                <table>
                    <tr>
                        <th>Formule</th>
                        <th>Quantité</th>
                        <th>Prix unitaire (€ / pers.)</th>
                        <th>Total (€)</th>
                    </tr>';
        foreach ($submission['formules'] as $formule) {
            $message .= '
                    <tr>
                        <td>' . htmlspecialchars($formule['name']) . '</td>
                        <td>' . htmlspecialchars($formule['quantity']) . '</td>
                        <td>' . number_format($formule['price'], 2, ',', '') . '</td>
                        <td>' . number_format($formule['price'] * $formule['quantity'] * $submission['persons'], 2, ',', '') . '</td>
                    </tr>';
        }
        $message .= '
                </table>
                <div class="section-title">Suppléments sélectionnés</div>
                <table>
                    <tr>
                        <th>Supplément</th>
                        <th>Quantité</th>
                        <th>Prix unitaire (€)</th>
                        <th>Total (€)</th>
                    </tr>';
        if (!empty($submission['supplements'])) {
            foreach ($submission['supplements'] as $supplement) {
                $message .= '
                    <tr>
                        <td>' . htmlspecialchars($supplement['name']) . '</td>
                        <td>' . htmlspecialchars($supplement['quantity']) . '</td>
                        <td>' . number_format($supplement['price'], 2, ',', '') . '</td>
                        <td>' . number_format($supplement['price'] * $supplement['quantity'], 2, ',', '') . '</td>
                    </tr>';
            }
        } else {
            $message .= '
                    <tr>
                        <td colspan="4">Aucun supplément sélectionné</td>
                    </tr>';
        }
        $message .= '
                </table>
                <div class="section-title">Services additionnels</div>
                <table>
                    <tr>
                        <th>Service</th>
                    </tr>';
        if (!empty($submission['services'])) {
            foreach ($submission['services'] as $service) {
                $message .= '
                    <tr>
                        <td>' . htmlspecialchars($service) . '</td>
                    </tr>';
            }
        } else {
            $message .= '
                    <tr>
                        <td>Aucun service additionnel sélectionné</td>
                    </tr>';
        }
        $message .= '
                </table>
                <div class="section-title">Informations de contact</div>
                <table>
                    <tr>
                        <th>Nom</th>
                        <td>' . htmlspecialchars($submission['contact']['nom']) . '</td>
                    </tr>
                    <tr>
                        <th>Prénom</th>
                        <td>' . htmlspecialchars($submission['contact']['prenom']) . '</td>
                    </tr>
                    <tr>
                        <th>Téléphone</th>
                        <td>' . htmlspecialchars($submission['contact']['telephone']) . '</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>' . htmlspecialchars($submission['contact']['email']) . '</td>
                    </tr>
                    <tr>
                        <th>Adresse</th>
                        <td>' . htmlspecialchars($submission['contact']['adresse']) . '</td>
                    </tr>
                    <tr>
                        <th>Code postal</th>
                        <td>' . htmlspecialchars($submission['contact']['code_postal']) . '</td>
                    </tr>
                    <tr>
                        <th>Ville</th>
                        <td>' . htmlspecialchars($submission['contact']['ville']) . '</td>
                    </tr>';
        if ($submission['contact']['societe']) {
            $message .= '
                    <tr>
                        <th>Société</th>
                        <td>' . htmlspecialchars($submission['contact']['societe']) . '</td>
                    </tr>';
        }
        if ($submission['contact']['remarques']) {
            $message .= '
                    <tr>
                        <th>Remarques</th>
                        <td>' . htmlspecialchars($submission['contact']['remarques']) . '</td>
                    </tr>';
        }
        $message .= '
                </table>
                <table>
                    <tr class="total-row">
                        <th>Total</th>
                        <td>' . number_format($submission['total'], 2, ',', '') . ' €</td>
                    </tr>
                    <tr>
                        <th>Acceptation des CGU</th>
                        <td>' . ($submission['terms'] ? 'Oui' : 'Non') . '</td>
                    </tr>
                    <tr>
                        <th>Inscription newsletter</th>
                        <td>' . ($submission['newsletter'] ? 'Oui' : 'Non') . '</td>
                    </tr>
                </table>
                <div class="footer">
                    Réservation effectuée le ' . date('d/m/Y à H:i') . '
                </div>
            </div>
        </body>
        </html>';
        if (!mail($to, $subject, $message, $headers)) {
            error_log('Failed to send email for reservation: ' . json_encode($submission));
        }
        echo json_encode(['success' => 'Réservation enregistrée avec succès']);
    } catch (Exception $e) {
        $pdo->rollBack();
        echo json_encode(['error' => 'Erreur lors de l\'enregistrement: ' . $e->getMessage()]);
    }
    exit;
}
?>