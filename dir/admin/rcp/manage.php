<?php
    require_once '../../../config/config.php';
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    header('Pragma: no-cache');
    header('Expires: 0');
    if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}
    $tables         = new Tables();
    $states         = $tables->getStates();
    $districts      = $tables->getDistricts();
    $products       = $tables->getProducts();
    $perPage        = 10; // districts per page
    $totalDistricts = count($districts);
    $totalPages     = ceil($totalDistricts / $perPage);
    // Get current page from query string
    $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $currentPage = max(1, min($totalPages, $currentPage));
    // Slice districts for current page
    $start         = ($currentPage - 1) * $perPage;
    $districtsPage = array_slice($districts, $start, $perPage);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RCP Update</title>
    <link rel="stylesheet" href="../components/navbar/header.css">
    <link rel="stylesheet" href="<?php echo ABS_URL ?>assets/bootstrap/dist/css/bootstrap.min.css">
    <script src="<?php echo ABS_URL ?>dir/admin/ckeditor.js"></script>
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .rcp-loader { position: fixed; inset: 0; z-index: 1060; display: none; align-items: center; justify-content: center; background: rgba(248, 249, 250, 0.86); backdrop-filter: blur(3px); }
        .rcp-loader-card { width: min(90vw, 330px); padding: 28px; background: #fff; border: 1px solid #dee2e6; border-radius: 12px; box-shadow: 0 8px 28px rgba(0, 0, 0, 0.12); text-align: center; }
        .rcp-wireframe-line { height: 10px; margin: 10px auto; border-radius: 5px; background: linear-gradient(90deg, #e9ecef 25%, #f8f9fa 50%, #e9ecef 75%); background-size: 200% 100%; animation: rcp-wireframe-shimmer 1.2s linear infinite; }
        .rcp-wireframe-line.short { width: 58%; } .rcp-wireframe-line.long { width: 84%; }
        @keyframes rcp-wireframe-shimmer { from { background-position: 200% 0; } to { background-position: -200% 0; } }
        .rcp-loader-text { margin-top: 18px; color: #495057; font-weight: 600; }
    </style>
</head>
<body>
    <div id="rcpLoader" class="rcp-loader" role="status" aria-live="polite" aria-hidden="true">
        <div class="rcp-loader-card">
            <div class="rcp-wireframe-line short"></div>
            <div class="rcp-wireframe-line long"></div>
            <div class="rcp-wireframe-line long"></div>
            <div class="rcp-loader-text">Processing RCP data...</div>
        </div>
    </div>
    <?php require_once '../components/navbar/header.php'; ?>
    <div class="container">
        <div class="row my-5 justify-content-center">
            <div class="col-lg-7">
                <div class="card my-3">
                    <div class="card-header">
                    <h5>RCP Master Management</h5>
                    </div>
                    <div class="card-body">
                    <ul class="nav nav-tabs" id="masterTabs">
                        <li class="nav-item"><a class="nav-link                                                                                                                                                                                                                                                             <?php if (@$_GET['t'] == false): ?>active<?php endif; ?>" data-bs-toggle="tab" href="#statesTab">States</a></li>
                        <li class="nav-item"><a class="nav-link                                                                                                                                                                                                                                                             <?php if ($_GET['t'] == 'District'): ?>active<?php endif; ?>" data-bs-toggle="tab" href="#districtsTab">Districts</a></li>
                        <li class="nav-item"><a class="nav-link                                                                                                                                                                                                                                                              <?php if ($_GET['t'] == 'products'): ?> active<?php endif; ?>" data-bs-toggle="tab" href="#productsTab">Products</a></li>
                    </ul>
                        <div class="tab-content mt-4">
                            <!-- States Tab -->
                            <div class="tab-pane fade                                                                                                                                                                                                                                                  <?php if (@$_GET['t'] == false): ?>show active<?php endif; ?>" id="statesTab">
                                <div class="mb-3">
                                    <input type="text" class="form-control d-inline-block w-75" id="stateName" placeholder="Enter State Name">
                                    <button class="btn btn-primary" id="addState">Add State</button>
                                </div>
                                <table class="table table-bordered">
                                    <thead><tr><th>ID</th><th>State</th><th>Actions</th></tr></thead>
                                    <tbody id="statesList">
                                        <?php $sno = 1; ?>
                                    <?php foreach ($states as $state): ?>
                                        <tr data-id="<?php echo $state['id'] ?>">
                                            <td><?php echo $sno++; ?></td>
                                            <td><input type="text" class="form-control state-input" value="<?php echo $state['name'] ?>"></td>
                                            <td>
                                                <button class="btn btn-sm btn-success saveState">Save</button>
                                                <button class="btn btn-sm btn-danger deleteState">Delete</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- Districts Tab -->
                            <div class="tab-pane fade                                                                                                                                                                                                                     <?php if ($_GET['t'] == 'District'): ?>show active<?php endif; ?>" role="tabpanel" id="districtsTab">
                                <div class="mb-3">
                                    <input type="text" class="form-control d-inline-block w-50" id="districtName" placeholder="Enter District Name">
                                    <select class="form-select d-inline-block w-25" id="districtState">
                                        <option value="">Select State</option>
                                        <?php foreach ($states as $state): ?>
                                            <option value="<?php echo $state['id'] ?>"><?php echo $state['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <button class="btn btn-primary" id="addDistrict">Add District</button>
                                </div>
                                <table class="table table-bordered">
                                    <thead><tr><th>ID</th><th>District</th><th>State</th><th>Actions</th></tr></thead>
                                    <tbody id="districtsList">
                                  <?php $sno = 1; ?>
                                    <?php foreach ($districtsPage as $dist): ?>
                                        <tr data-id="<?php echo $dist['id'] ?>">
                                            <td><?php echo $sno++; ?></td>
                                            <td><input type="text" class="form-control district-input" value="<?php echo $dist['district_name'] ?>"></td>
                                            <td>
                                                <select class="form-select state-select">
                                                    <?php foreach ($states as $state): ?>
                                                        <option value="<?php echo $state['id'] ?>"<?php echo($state['id'] == $dist['state_id']) ? ' selected' : '' ?>>
                                                            <?php echo $state['name'] ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-success saveDistrict">Save</button>
                                                <button class="btn btn-sm btn-danger deleteDistrict">Delete</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                    </tbody>
                                </table>
                                <nav>
                        <ul class="pagination justify-content-center mt-3">
                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li class="page-item<?php echo($i === $currentPage) ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?php echo $i ?>&t=District"><?php echo $i ?></a>
                            </li>
                            <?php endfor; ?>
                        </ul>
                        </nav>
                    </div>
                    <!-- Products Tab -->
                    <div class="tab-pane fade                                                                                                                                                                                     <?php if ($_GET['t'] == 'products'): ?>show active<?php endif; ?>" id="productsTab">
                        <div class="mb-3">
                            <input type="text" class="form-control d-inline-block w-75" id="productName" placeholder="Enter Product Name">
                            <button class="btn btn-primary" id="addProduct">Add Product</button>
                        </div>
                        <table class="table table-bordered">
                            <thead><tr><th>ID</th><th>Product</th><th>Actions</th></tr></thead>
                            <tbody id="productsList">
                              <?php $sno = 1; ?>
                                <?php foreach ($products as $product): ?>
                                    <tr data-id="<?php echo $product['id'] ?>">
                                        <td><?php echo $sno++; ?></td>
                                        <td><input type="text" class="form-control product-input" value="<?php echo $product['name'] ?>"></td>
                                        <td>
                                            <button class="btn btn-sm btn-success saveProduct">Save</button>
                                            <button class="btn btn-sm btn-danger deleteProduct">Delete</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                    </div>
                </div>
            </div>
            </div>
    </div>
    <script src="<?php echo ABS_URL ?>dir/admin/jquery.3.6.1.js"></script>
    <script src="<?php echo ABS_URL ?>assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
$(function() {
    $(document).ajaxStart(function() {
        $('#rcpLoader').css('display', 'flex').attr('aria-hidden', 'false');
    }).ajaxStop(function() {
        $('#rcpLoader').hide().attr('aria-hidden', 'true');
    });

    // STATES
            $('#addState').click(function() {
            const name = $('#stateName').val().trim();
            if (!name) return alert('Enter state name');

            $.post('ajax/manage-tables-action.php', { action: 'add_state', name: name }, function(res) {
                if ($.trim(res) === 'success') {
                    window.location.replace('manage.php?_=' + Date.now());
                }
            });
        });

    $('.saveState').click(function() {
        const tr = $(this).closest('tr');
        const id = tr.data('id');
        const name = tr.find('.state-input').val().trim();
        $.post('ajax/manage-tables-action.php', {action: 'edit_state', id, name: name}, function(res) {
            if ($.trim(res) === 'updated')
            {
                alert('Updated');
                window.location.replace('manage.php?_=' + Date.now());
            }
        });
    });
    $('.deleteState').click(function() {
        if (!confirm('Delete this state?')) return;
        const id = $(this).closest('tr').data('id');
        $.post('ajax/manage-tables-action.php', {action: 'delete_state', id}, function(res) {
            if ($.trim(res) === 'deleted')
        {
            window.location.replace('manage.php?_=' + Date.now());
        }
        });
    });
    // DISTRICTS
$('#addDistrict').click(function() {
    const name = $('#districtName').val().trim();
    const state_id = $('#districtState').val();
    if (!name || !state_id) return alert('Enter all fields');

    $.post('ajax/manage-tables-action.php', { action: 'add_district', name: name, state_id }, function(res) {
        if ($.trim(res) === 'success') {
            window.location.replace('manage.php?t=District&_=' + Date.now());
        }
    });
});

    $('.saveDistrict').click(function() {
        const tr = $(this).closest('tr');
        const id = tr.data('id');
        const name = tr.find('.district-input').val().trim();
        const state_id = tr.find('.state-select').val();
        $.post('ajax/manage-tables-action.php', {action: 'edit_district', id, name: name, state_id}, function(res) {
            if ($.trim(res) === 'updated')
            {
                alert('Updated');
                window.location.replace('manage.php?t=District&_=' + Date.now());
            }
        });
    });
    $('.deleteDistrict').click(function() {
        if (!confirm('Delete this district?')) return;
        const id = $(this).closest('tr').data('id');
        $.post('ajax/manage-tables-action.php', {action: 'delete_district', id}, function(res) {
            if ($.trim(res) === 'deleted')
            {
                window.location.replace('manage.php?t=District&_=' + Date.now());
            }
        });
    });
    // PRODUCTS
    $('#addProduct').click(function() {
        const name = $('#productName').val().trim();
        if (!name) return alert('Enter product name');
        $.post('ajax/manage-tables-action.php', {action: 'add_product', name: name}, function(res) {
            if ($.trim(res) === 'success')  window.location.replace('manage.php?t=products&_=' + Date.now());
        });
    });
    $('.saveProduct').click(function() {
        const tr = $(this).closest('tr');
        const id = tr.data('id');
        const name = tr.find('.product-input').val().trim();
        $.post('ajax/manage-tables-action.php', {action: 'edit_product', id, name: name}, function(res) {
            if ($.trim(res) === 'updated')
            {
                alert('Updated');
                window.location.replace('manage.php?t=products&_=' + Date.now());
            }

        });
    });
    $('.deleteProduct').click(function() {
        if (!confirm('Delete this product?')) return;
        const id = $(this).closest('tr').data('id');
        $.post('ajax/manage-tables-action.php', {action: 'delete_product', id}, function(res) {
            if ($.trim(res) === 'deleted') window.location.replace('manage.php?t=products&_=' + Date.now());
        });
    });
});
</script>
</html>