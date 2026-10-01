<?php
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

$_SESSION = [];
$sessionCookie = session_get_cookie_params();
setcookie(session_name(), '', time() - 42000, $sessionCookie['path'], $sessionCookie['domain'], $sessionCookie['secure'], $sessionCookie['httponly']);
session_destroy();
// Purge Varnish cache
exec('curl -s -X PURGE -H "X-Cache-Tags: 5e82" 127.0.0.1:6081');
header("Location: login.php");
exit();
?>
