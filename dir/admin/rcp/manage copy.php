<?php
require_once '../../../config/config.php';
$tables = new Tables();

$states = $tables->getStates();
$districts = $tables->getDistricts();
$products = $tables->getProducts();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage States, Districts, Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">



<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(function() {
    // STATES
    $('#addState').click(function() {
        const name = $('#stateName').val().trim();
        if (!name) return alert('Enter state name');
        $.post('ajax/manage-tables-action.php', {action: 'add_state', name: name}, function(res) {
            if (res === 'success') location.reload();
        });
    });

    $('.saveState').click(function() {
        const tr = $(this).closest('tr');
        const id = tr.data('id');
        const name = tr.find('.state-input').val().trim();
        $.post('ajax/manage-tables-action.php', {action: 'edit_state', id, name: name}, function(res) {
            if (res === 'updated') alert('Updated');
        });
    });

    $('.deleteState').click(function() {
        if (!confirm('Delete this state?')) return;
        const id = $(this).closest('tr').data('id');
        $.post('ajax/manage-tables-action.php', {action: 'delete_state', id}, function(res) {
            if (res === 'deleted') location.reload();
        });
    });

    // DISTRICTS
    $('#addDistrict').click(function() {
        const name = $('#districtName').val().trim();
        const state_id = $('#districtState').val();
        if (!name || !state_id) return alert('Enter all fields');
        $.post('ajax/manage-tables-action.php', {action: 'add_district', name: name, state_id}, function(res) {
            if (res === 'success') location.reload();
        });
    });

    $('.saveDistrict').click(function() {
        const tr = $(this).closest('tr');
        const id = tr.data('id');
        const name = tr.find('.district-input').val().trim();
        const state_id = tr.find('.state-select').val();
        $.post('ajax/manage-tables-action.php', {action: 'edit_district', id, name: name, state_id}, function(res) {
            if (res === 'updated') alert('Updated');
        });
    });

    $('.deleteDistrict').click(function() {
        if (!confirm('Delete this district?')) return;
        const id = $(this).closest('tr').data('id');
        $.post('ajax/manage-tables-action.php', {action: 'delete_district', id}, function(res) {
            if (res === 'deleted') location.reload();
        });
    });

    // PRODUCTS
    $('#addProduct').click(function() {
        const name = $('#productName').val().trim();
        if (!name) return alert('Enter product name');
        $.post('ajax/manage-tables-action.php', {action: 'add_product', name: name}, function(res) {
            if (res === 'success') location.reload();
        });
    });

    $('.saveProduct').click(function() {
        const tr = $(this).closest('tr');
        const id = tr.data('id');
        const name = tr.find('.product-input').val().trim();
        $.post('ajax/manage-tables-action.php', {action: 'edit_product', id, name: name}, function(res) {
            if (res === 'updated') alert('Updated');
        });
    });

    $('.deleteProduct').click(function() {
        if (!confirm('Delete this product?')) return;
        const id = $(this).closest('tr').data('id');
        $.post('ajax/manage-tables-action.php', {action: 'delete_product', id}, function(res) {
            if (res === 'deleted') location.reload();
        });
    });
});
</script>

</body>
</html>
