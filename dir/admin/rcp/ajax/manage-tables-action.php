<?php
require_once '../../../../config/config.php';
$tables = new Tables();

$action = $_POST['action'] ?? '';

switch ($action) {
    // STATES
    case 'add_state':
        if ($tables->addState($_POST['name'])) {
            clearVarnishCache();
            echo 'success';
        } else {
            echo 'error';
        }
        break;

    case 'edit_state':
        if ($tables->updateState($_POST['id'], $_POST['name'])) {
            clearVarnishCache();
            echo 'updated';
        } else {
            echo 'error';
        }
        break;

    case 'delete_state':
        if ($tables->deleteState($_POST['id'])) {
            clearVarnishCache();
            echo 'deleted';
        } else {
            echo 'error';
        }
        break;

    // DISTRICTS
    case 'add_district':
        if ($tables->addDistrict($_POST['name'], $_POST['state_id'])) {
            clearVarnishCache();
            echo 'success';
        } else {
            echo 'error';
        }
        break;

    case 'edit_district':
        if ($tables->updateDistrict($_POST['id'], $_POST['name'], $_POST['state_id'])) {
            clearVarnishCache();
            echo 'updated';
        } else {
            echo 'error';
        }
        break;

    case 'delete_district':
        if ($tables->deleteDistrict($_POST['id'])) {
            clearVarnishCache();
            echo 'deleted';
        } else {
            echo 'error';
        }
        break;

    // PRODUCTS
    case 'add_product':
        if ($tables->addProduct($_POST['name'])) {
            clearVarnishCache();
            echo 'success';
        } else {
            echo 'error';
        }
        break;

    case 'edit_product':
        if ($tables->updateProduct($_POST['id'], $_POST['name'])) {
            clearVarnishCache();
            echo 'updated';
        } else {
            echo 'error';
        }
        break;

    case 'delete_product':
        if ($tables->deleteProduct($_POST['id'])) {
            clearVarnishCache();
            echo 'deleted';
        } else {
            echo 'error';
        }
        break;

    default:
        echo 'invalid';
        break;
}
?>
