<?php
define('FEATURE_FLAG_XYZ123', false);
if (FEATURE_FLAG_XYZ123) {
    http_response_code(500);
    exit;
}
?>
