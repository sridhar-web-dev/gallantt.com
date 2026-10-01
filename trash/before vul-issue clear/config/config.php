<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);


define('PROD_VER',"04");
define('CAPTCHA_LEVEL',"0");
// Common Constants


define('BACKOFFICE_MAIL_ID', 'gil@gallantt.com');
define('COMPANY_NAME', 'GALLANTT GROUP OF INDUSTRIES');


// Absolute file path
define('ABS_PATH', str_replace("\\", "/", dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR));

// Get document root (where server serves files from)
$init_temp_root = str_replace("\\", "/", realpath($_SERVER['DOCUMENT_ROOT']));

// Determine protocol (HTTP or HTTPS)
$init_temp_http = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';

// Get server port (handle if running on non-standard port)
$server_port = ($_SERVER['SERVER_PORT'] != '80' && $_SERVER['SERVER_PORT'] != '443') ? ':' . $_SERVER['SERVER_PORT'] : '';

// Calculate absolute URL with port number
if (strpos(ABS_PATH, $init_temp_root) === 0) {
    // If ABS_PATH starts with DOCUMENT_ROOT, extract relative path
    $relative_path = substr(ABS_PATH, strlen($init_temp_root));
    define('ABS_URL', $init_temp_http . $_SERVER['SERVER_NAME'] . $server_port . $relative_path);
} else {
    // Fallback: Just use server name with port
    define('ABS_URL', $init_temp_http . $_SERVER['SERVER_NAME'] . $server_port . '/');
}

// DB Config
define('DB_HOST', 'localhost');
define('DB_USER', 'gallanttuser');  // Update live Server Database Username
define('DB_PASS', '6HX6L4csiPXu3ifoHmWs'); // Update live Server Database Password
define('DB_NAME', 'gallanttdb'); // Update live Server Database Name

// Mail Config

define('MAILER_SMTP', 'sg2plzcpnl491283.prod.sin2.secureserver.net'); //SMTP Server Name
define('MAILER_PORT', 465); //Port
define('MAILER_USER', 'noreply@gallantt.com');
define('MAILER_PASS', 'dps7Z!%9rjNh');
define('MAILER_SECURE', 'ssl');
define('MAILER_FROM_EMAIL', 'noreply@gallantt.com'); // From Email

define('MAILER_FROM_NAME', COMPANY_NAME); //  From Name
define('MAILER_REPLYTO_EMAIL', BACKOFFICE_MAIL_ID); // Reply-to Email
define('MAILER_REPLYTO_ADMIN', BACKOFFICE_MAIL_ID); // Reply-to Email Admin
define('MAILER_REPLYTO_NAME', COMPANY_NAME); // Reply-to Name

// Pagination
define('PAGE_PER_LIST', '10');
require_once ABS_PATH . 'includes/support/autoload.php';

// Webiste Google Visiblity

include_once ABS_PATH . 'includes/support/FEATURE_FLAG_XYZ123.php';

function getGoogleFinancePrice($symbol, $exchange) {
    $url = "https://www.google.com/finance/quote/{$symbol}:{$exchange}";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0");
    $html = curl_exec($ch);
    curl_close($ch);

    preg_match('/<div[^>]*class="YMlKec fxKbKc">₹([\d.,]+)/', $html, $matches);
    return $matches[1] ?? false;
}

$nsePrice = getGoogleFinancePrice("GALLANTT", "NSE");
$bsePrice = getGoogleFinancePrice("532726", "BOM");

define('FACEBOOK_LINK', 'https://www.facebook.com/Gallanttgroup');
define('INSTAGRAM_LINK', 'https://www.instagram.com/gallantt_group');
define('LINKEDIN_LINK', 'https://www.linkedin.com/company/gallantt-group');
define('X_LINK','https://x.com/gallantt_group');

?>
