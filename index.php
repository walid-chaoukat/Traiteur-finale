<?php
$page = $_GET['page'] ?? 'home';
include 'includes/header.php';

$pagePath = "pages/{$page}.php";
if (file_exists($pagePath)) {
    include $pagePath;
} else {
    echo '<h2>Page not found</h2>';
}

include 'includes/footer.php';
?> 
<link rel="stylesheet" href="/assets/css/style2.css"    >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">