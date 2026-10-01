<?php
ob_start();
require_once ('config/config.php');
header("Content-type: application/xml; charset=utf-8");

echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
echo '<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL;

// Include root index.php only
echo '<url>' . PHP_EOL;
echo '<loc>' . ABS_URL . '</loc>' . PHP_EOL;
echo '<lastmod>' . date("Y-m-d\TH:i:s+00:00", filemtime(ABS_PATH . "/index.php")) . '</lastmod>' . PHP_EOL;
echo '<priority>1.00</priority>' . PHP_EOL;
echo '</url>' . PHP_EOL;

// Include all .php files in the "pages/" folder without .php extension
$pagesDir = ABS_PATH . 'pages/';
if (is_dir($pagesDir)) {
    $pageFiles = array_diff(scandir($pagesDir), array('.', '..'));
    foreach ($pageFiles as $file) {
        $filePath = $pagesDir . $file;
        if (is_file($filePath) && pathinfo($filePath, PATHINFO_EXTENSION) === 'php') {
            $fileName = pathinfo($file, PATHINFO_FILENAME);
            echo '<url>' . PHP_EOL;
            echo '<loc>' . ABS_URL . '' . $fileName . '</loc>' . PHP_EOL;
            echo '<lastmod>' . date("Y-m-d\TH:i:s+00:00", filemtime($filePath)) . '</lastmod>' . PHP_EOL;
            echo '<priority>0.80</priority>' . PHP_EOL;
            echo '</url>' . PHP_EOL;
        }
    }
}

echo '</urlset>' . PHP_EOL;
?>
