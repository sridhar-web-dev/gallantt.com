<?php
require_once '../../../../config/config.php';
$handler = new FormHandler();

if (!empty($_POST['state_id'])) {
    $districts = $handler->getDistricts($_POST['state_id']);
    echo '<option value="">Select District</option>';
    foreach ($districts as $district) {
        echo '<option value="' . $district['id'] . '">' . $district['name'] . '</option>';
    }
}
