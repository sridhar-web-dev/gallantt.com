<?php
require_once '../../../config/config.php';

// Fetch states and products for initial dropdown
$db = Database::getDB();
$states = $db->query("SELECT id, name FROM states")->fetchAll(PDO::FETCH_ASSOC);
$products = $db->query("SELECT id, name FROM products")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</head>
<body class="p-4">
<div class="container">
    <h3>Add Data</h3>
    <form id="dataForm" method="POST" action="submit.php">
        <div class="mb-3">
            <label>State</label>
            <select name="state_id" id="state" class="form-select" required>
                <option value="">Select State</option>
                <?php foreach ($states as $state): ?>
                    <option value="<?= $state['id'] ?>"><?= $state['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>District</label>
            <select name="district_id" id="district" class="form-select" required>
                <option value="">Select District</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Product</label>
            <select name="product_id" id="product" class="form-select" required>
                <option value="">Select Product</option>
                <?php foreach ($products as $product): ?>
                    <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div id="sectionGroup">
            <label>Section & Consumer Price</label>
            <div class="row mb-2 sectionRow">
                <div class="col-md-5">
                    <input type="text" name="section[]" class="form-control" placeholder="Section" required />
                </div>
                <div class="col-md-5">
                    <input type="number" name="price[]" class="form-control" placeholder="Consumer Price" required />
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-success addRow">+</button>
                </div>
            </div>
        </div>

        <button class="btn btn-primary" type="submit">Submit</button>
    </form>

    <hr>

    <h4>Data Table</h4>
    <div id="dataTable"></div>
</div>

<script>
$(document).ready(function() {
    // Get Districts on State change
    $('#state').change(function() {
        let stateId = $(this).val();
        $('#district').html('<option value="">Loading...</option>');
        $.post('ajax/getDistricts.php', {state_id: stateId}, function(data) {
            $('#district').html(data);
        });
    });

    // Add new section row
    $(document).on('click', '.addRow', function() {
        let newRow = `
        <div class="row mb-2 sectionRow">
            <div class="col-md-5">
                <input type="text" name="section[]" class="form-control" placeholder="Section" required />
            </div>
            <div class="col-md-5">
                <input type="number" name="price[]" class="form-control" placeholder="Consumer Price" required />
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger removeRow">-</button>
            </div>
        </div>`;
        $('#sectionGroup').append(newRow);
    });

    // Remove section row
    $(document).on('click', '.removeRow', function() {
        $(this).closest('.sectionRow').remove();
    });

    // Load table data when district or product changes
    $('#district, #product').change(function() {
        let districtId = $('#district').val();
        let productId = $('#product').val();
        if (districtId && productId) {
            $.post('ajax/getSectionData.php', {district_id: districtId, product_id: productId}, function(data) {
                $('#dataTable').html(data);
            });
        }
    });

    
});
// Update section or price inline
$(document).on('blur', '.editable-section, .editable-price', function() {
    let id = $(this).data('id');
    let field = $(this).data('field');
    let value = $(this).text();

    $.post('ajax/updateSection.php', {
        id: id,
        field: field,
        value: value
    }, function(res) {
        // Optional: notify success
        console.log(res);
    });
});

// Delete row
$(document).on('click', '.delete-row', function() {
    if (confirm('Are you sure?')) {
        let id = $(this).data('id');
        $.post('ajax/deleteSection.php', { id: id }, function(res) {
            $('#district').trigger('change'); // Refresh table
        });
    }
});
$('#dataForm').on('submit', function(e) {
    let valid = true;

    $('input[name="price[]"]').each(function() {
        if (!$.isNumeric($(this).val())) {
            alert("Consumer price must be numeric");
            valid = false;
            return false;
        }
    });

    if (!valid) e.preventDefault();
});

</script>
</body>
</html>
