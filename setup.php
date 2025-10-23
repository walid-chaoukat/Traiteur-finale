<?php
// Base directory
$base = __DIR__ . '/party_manager';

// Folder structure
$folders = [
    '/includes',
    '/pages',
    '/actions',
    '/assets/css',
    '/assets/js',
    '/assets/images',
    '/uploads'
];

// Files to create with default content
$files = [
    '/index.php' => "<?php\n\$page = \$_GET['page'] ?? 'home';\ninclude 'includes/header.php';\n\n\$pagePath = \"pages/{\$page}.php\";\nif (file_exists(\$pagePath)) {\n    include \$pagePath;\n} else {\n    echo '<h2>Page not found</h2>';\n}\n\ninclude 'includes/footer.php';\n?>",

    '/includes/header.php' => "<!DOCTYPE html>\n<html lang='en'>\n<head>\n  <meta charset='UTF-8'>\n  <title>Party Manager</title>\n  <link rel='stylesheet' href='assets/css/style.css'>\n</head>\n<body>\n  <header>\n    <nav>\n      <a href='?page=home'>Home</a>\n      <a href='?page=events'>Events</a>\n      <a href='?page=dashboard'>Dashboard</a>\n      <a href='?page=login'>Login</a>\n    </nav>\n  </header>\n  <main>",

    '/includes/footer.php' => "  </main>\n  <footer>\n    <p>&copy; " . date('Y') . " Party Manager</p>\n  </footer>\n  <script src='assets/js/script.js'></script>\n</body>\n</html>",

    '/pages/home.php' => "<section>\n  <h1>Welcome to Party Manager 🎉</h1>\n  <p>Organize and manage your parties efficiently.</p>\n</section>",

    '/assets/css/style.css' => "body { font-family: Arial, sans-serif; background: #f4f4f4; color: #333; }\nheader { background: #222; color: white; padding: 10px; }\nmain { margin: 40px auto; max-width: 900px; background: white; padding: 20px; border-radius: 8px; }",

    '/assets/js/script.js' => "console.log('Party Manager initialized');"
];

// Create folders
foreach ($folders as $folder) {
    $path = $base . $folder;
    if (!is_dir($path)) {
        mkdir($path, 0777, true);
        echo "Created folder: $path<br>";
    }
}

// Create files
foreach ($files as $file => $content) {
    $path = $base . $file;
    if (!file_exists($path)) {
        file_put_contents($path, $content);
        echo "Created file: $path<br>";
    }
}

echo "<br><strong>✅ Project structure successfully created!</strong>";
