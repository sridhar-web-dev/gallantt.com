<?php
    require_once '../../../config/config.php';
    if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}
    $report = new FinancialReport();
    $db     = new Database();
    $limit  = 10; // Number of records per page
    $page   = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $offset = ($page - 1) * $limit;
    // Fetch reports with pagination
    $reports = $report->getAllReports($limit, $offset);
    // Get total number of reports for pagination calculation
    $totalReports = $report->getTotalReports();
    $totalPages   = ceil($totalReports / $limit);
    $msg          = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_data'])) {
        $highlights   = $_POST['highlights'] ?? [];
        $consolidated = $_POST['consolidated'] ?? [];
        $total        = count($highlights);
        for ($i = 0; $i < $total; $i++) {
            $highlight = trim($highlights[$i]);
            $cons      = trim($consolidated[$i]);
            if ($highlight && $cons) {
                $report->saveHighlight($highlight, $cons);
            }
        }
        clearVarnishCache();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
    $db    = new Database();
    $limit = 10;
    $page  = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    if ($page < 1) {
        $page = 1;
    }
    $offset = ($page - 1) * $limit;
    // Handle delete
    if (isset($_GET['delete'])) {
        $id = (int) $_GET['delete'];
        $report->deleteHighlight($id);
        clearVarnishCache();
        header("Location: " . $_SERVER['PHP_SELF'] . "?page=$page");
        exit;
    }
    // Handle update (edit form submit)
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_id'])) {
        $id           = (int) $_POST['edit_id'];
        $highlight    = trim($_POST['highlights']);
        $consolidated = trim($_POST['consolidated']);
        if ($highlight && $consolidated) {
            $report->updateHighlight($id, $highlight, $consolidated);
        }
        clearVarnishCache();
        header("Location: " . $_SERVER['PHP_SELF'] . "?page=$page");
        exit;
    }
    $highlights      = $report->getAllHighlights($limit, $offset);
    $totalHighlights = $report->getTotalHighlights();
    $totalPages      = ceil($totalHighlights / $limit);
    $headingObj = new InvestorHeading();
$current = $headingObj->getHeading();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_title'])) {
    $title = trim($_POST['title']);
    if ($current) {
        $headingObj->updateHeading($title);
        clearVarnishCache();
        // $message = "Heading updated successfully.";
        $message = "update";
    } else {
        $headingObj->addHeading($title);
        clearVarnishCache();
        $message = "add";
        // $message = "Heading added successfully.";
    }
    // Redirect to prevent resubmission
    header("Location: " . $_SERVER['PHP_SELF'] . "?success=" . urlencode($message));
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Highlightṣ</title>
    <link rel="stylesheet" href="../components/navbar/header.css">
    <link rel="stylesheet" href="<?php echo ABS_URL?>assets/bootstrap/dist/css/bootstrap.min.css">
    <script src="<?php echo ABS_URL ?>dir/admin/ckeditor.js"></script>
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .pagination {
    text-align: center;
    margin-top: 20px;
}
.pagination a {
    margin: 0 5px;
    padding: 5px 10px;
    text-decoration: none;
}
.pagination .btn-info {
    background-color: #007bff;
    color: white;
}
.pagination .btn-light {
    background-color: #f8f9fa;
}
.pagination .btn-primary {
    background-color: #28a745;
    color: white;
}
    </style>
    <style>
    .highlight-field:focus {
        border: 2px solid #28a745;
        box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
    }
</style>
</head>
<body>
<?php require_once '../components/navbar/header.php'; ?>
<div class="container py-5">
   <div class="row">
    <div class="col-lg-4 order-1">
    <div class="card">
        <div class="card-header">
                    <h5>Add Financial Highlightṣ</h5>
        </div>
        <div class="card-body">
<?php if ($msg): ?>
    <div class="alert alert-info"><?php echo htmlspecialchars($msg)?></div>
<?php endif; ?>
<form method="post" class="bg-white p-4">
    <div id="highlight-wrapper">
        <div class="highlight-group mb-3">
            <label>Highlights</label>
            <input type="text" name="highlights[]" class="form-control" required>
            <label class="mt-2">Consolidated</label>
            <input type="text" name="consolidated[]" class="form-control" required>
            <button type="button" class="btn btn-danger btn-sm mt-2 remove-highlight">Remove</button>
        </div>
    </div>
    <button type="button" id="add-more" class="btn btn-success btn-sm mb-3">Add More</button>
    <br>
    <hr>
    <button type="submit" name="add_data" class="btn btn-primary float-end">Save Highlights</button>
</form>
        </div>
    </div>
    </div>
    <div class="col-lg-8 order-2">
        <div class="card">
            <div class="card-header">
            <h5 >Manage Financial Highlightṣs</h5>
            </div>
            <div class="card-body">
            <?php
            if (!empty($_GET['success'])) {
                $message = ($_GET['success'] === 'update') ? 'Heading updated successfully.' : 'Heading added successfully.';
                echo '<div class="alert alert-success">' . htmlspecialchars($message) . '</div>';
            }
            ?>
    <form method="post">
        <div class="row">
            <div class="col-lg-6">
            <label for="title" class="form-label"><b>Heading Title</b></label>
          <input type="text" name="title" id="title" class="form-control" required
                   value="<?php echo htmlspecialchars($current['title'] ?? '')?>">
       <input type="hidden" name="add_title" id="add_title" class="form-control" required>
            </div>
            <div class="col-lg-3 mt-auto">
            <button type="submit" class="btn btn-primary"><?php echo $current ? 'Update' : 'Add'?> Heading</button>
            </div>
        </div>
        <div class="mb-3">
        </div>
    </form>
         <?php $serialNo = ($page - 1) * $limit + 1; ?>
<table class="table table-bordered bg-white">
    <thead class="table-secondary">
        <tr>
            <th>S.No.</th>
            <th>Highlight</th>
            <th>Consolidated</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($highlights)): ?>
            <tr><td colspan="4" class="text-center">No highlights found.</td></tr>
        <?php else: ?>
<?php foreach ($highlights as $hl): ?>
                <tr>
                    <td><?php echo $serialNo++?></td>
                    <td><?php echo htmlspecialchars($hl['highlights'])?></td>
                    <td><?php echo htmlspecialchars($hl['consolidated'])?></td>
                    <td>
                        <button class="btn btn-sm btn-warning edit-btn"
    data-id="<?php echo $hl['id']?>"
    data-highlights="<?php echo htmlspecialchars($hl['highlights'], ENT_QUOTES)?>"
    data-consolidated="<?php echo htmlspecialchars($hl['consolidated'], ENT_QUOTES)?>">
    Edit
</button>
                        <a href="highlights.php?delete=<?php echo $hl['id']?>&page=<?php echo $page?>"
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Are you sure you want to delete this highlight?');">
                            Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
<?php endif; ?>
    </tbody>
</table>
<div class="d-flex justify-content-center">
    <?php if ($totalHighlights > $limit): ?>
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php if ($page > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $page - 1?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo; Previous</span>
                        </a>
                    </li>
                <?php endif; ?>
<?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?php echo ($i == $page) ? 'active' : ''?>">
                        <a class="page-link" href="?page=<?php echo $i?>"><?php echo $i?></a>
                    </li>
                <?php endfor; ?>
<?php if ($page < $totalPages): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $page + 1?>" aria-label="Next">
                            <span aria-hidden="true">Next &raquo;</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    <?php endif; ?>
</div>
<div class="d-flex justify-content-center">
<?php if ($totalReports > $limit): ?>
    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="?page=<?php echo $page - 1?>" class="btn btn-sm btn-primary">Previous</a>
        <?php endif; ?>
<?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?page=<?php echo $i?>" class="btn btn-sm <?php echo $i == $page ? 'btn-info' : 'btn-light'?>"><?php echo $i?></a>
        <?php endfor; ?>
<?php if ($page < $totalPages): ?>
            <a href="?page=<?php echo $page + 1?>" class="btn btn-sm btn-primary">Next</a>
        <?php endif; ?>
    </div>
<?php endif; ?>
</div>
            </div>
        </div>
    </div>
   </div>
   <!-- Edit Highlight Modal -->
<div class="modal fade" id="editHighlightModal" tabindex="-1" aria-labelledby="editHighlightModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" id="editHighlightForm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editHighlightModalLabel">Edit Highlight</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="edit_id" id="edit_id">
            <div class="mb-3">
                <label for="edit_highlight" class="form-label">Highlight</label>
                <input type="text" class="form-control" id="edit_highlight" name="highlights" required>
            </div>
            <div class="mb-3">
                <label for="edit_consolidated" class="form-label">Consolidated</label>
                <input type="text" class="form-control" id="edit_consolidated" name="consolidated" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Update Highlight</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
<script src="<?php echo ABS_URL ?>dir/admin/jquery.3.6.1.js"></script>
<script src="<?php echo ABS_URL?>assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function() {
    var editModal = new bootstrap.Modal(document.getElementById('editHighlightModal'));
    $('.edit-btn').click(function() {
    var id = $(this).data('id');
    var highlights = $(this).data('highlights');  // use data-highlights
    var consolidated = $(this).data('consolidated');
    $('#edit_id').val(id);
    $('#edit_highlight').val(highlights);  // assign to #edit_highlight input
    $('#edit_consolidated').val(consolidated);
    editModal.show();
});
});
</script>
<script>
$(function(){
    let maxEntries = 10;
    $('#add-more').click(function(){
        let count = $('.highlight-group').length;
        if (count >= maxEntries) {
            alert('You can only add up to 10 records at a time.');
            return;
        }
        let group = `
        <div class="highlight-group mb-3">
            <label>Highlights</label>
            <input type="text" name="highlights[]" class="form-control" required>
            <label class="mt-2">Consolidated</label>
            <input type="text" name="consolidated[]" class="form-control" required>
            <button type="button" class="btn btn-danger btn-sm mt-2 remove-highlight">Remove</button>
        </div>`;
        $('#highlight-wrapper').append(group);
    });
    $(document).on('click', '.remove-highlight', function(){
        $(this).closest('.highlight-group').remove();
    });
});
</script>
</body>
</html>
