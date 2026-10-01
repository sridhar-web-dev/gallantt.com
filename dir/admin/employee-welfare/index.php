<?php require_once '../../../config/config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Welfare</title>
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
    .welfare-loader { position: fixed; inset: 0; z-index: 1060; display: none; align-items: center; justify-content: center; background: rgba(248, 249, 250, 0.86); backdrop-filter: blur(3px); }
    .welfare-loader-card { width: min(90vw, 330px); padding: 28px; background: #fff; border: 1px solid #dee2e6; border-radius: 12px; box-shadow: 0 8px 28px rgba(0, 0, 0, 0.12); text-align: center; }
    .welfare-wireframe-line { height: 10px; margin: 10px auto; border-radius: 5px; background: linear-gradient(90deg, #e9ecef 25%, #f8f9fa 50%, #e9ecef 75%); background-size: 200% 100%; animation: welfare-wireframe-shimmer 1.2s linear infinite; }
    .welfare-wireframe-line.short { width: 58%; }
    .welfare-wireframe-line.long { width: 84%; }
    @keyframes welfare-wireframe-shimmer { from { background-position: 200% 0; } to { background-position: -200% 0; } }
    .welfare-loader-text { margin-top: 18px; color: #495057; font-weight: 600; }
</style>
</head>
<body>
<div id="welfareLoader" class="welfare-loader" role="status" aria-live="polite" aria-hidden="true">
<div class="welfare-loader-card">
    <div class="welfare-wireframe-line short"></div>
    <div class="welfare-wireframe-line long"></div>
    <div class="welfare-wireframe-line long"></div>
    <div class="welfare-loader-text" id="welfareLoaderText">Saving employee welfare...</div>
</div>
</div>
<?php require_once '../components/navbar/header.php'; ?>
<div class="container py-5">
   <div class="row">
    <div class="col-lg-4 order-2">
    <div class="card">
        <div class="card-header">
                    <h5>Add New Employee Welfare Data</h5>
        </div>
        <div class="card-body">
        <?php if (! empty($_SESSION['message'])): ?>
    <div class="alert alert-<?php echo $_SESSION['message']['type'];?> alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['message']['text'];?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>
        <form id="welfareForm" method="post" action="process_welfare.php" enctype="multipart/form-data" class="needs-validation" novalidate>
  <div class="mb-3">
    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
    <input type="text" class="form-control" name="title" id="title" required maxlength="255">
    <div class="invalid-feedback">Title is required.</div>
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Image <span class="text-danger">*</span></label>
    <input type="file" class="form-control" name="image" id="image" accept="image/*" required>
    <div class="invalid-feedback">Image is required and must be under 2MB.</div>
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Small Description <span class="text-danger">*</span></label>
    <textarea class="form-control" name="description" id="description" rows="3" required maxlength="500"></textarea>
    <div class="invalid-feedback">Description is required.</div>
  </div>
  <button type="submit" name="submit" class="btn btn-success">Submit</button>
</form>
        </div>
    </div>
    <div class="alert alert-primary mb-0 mt-3">
                    <div>Changes you made are now live on the Home page.</div>
                    <a href="<?php echo ABS_URL ?>foundation" target="_blank" class="btn btn-sm btn-primary mt-2 w-100"><i class="fa fa-eye"></i> View on Website</a>
               </div>
    </div>
    <div class="col-lg-8 order-1 mb-4 mb-lg-0">
    <div class="card">
        <div class="card-header">
            <h5>Employee Welfare List</h5>
        </div>
        <div class="card-body">
          <?php
require_once '../../../config/config.php';

try {
    $db = Database::getDB();

    // Pagination settings
    $limit = 10; // Records per page
    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    // Get total records
    $totalStmt = $db->query("SELECT COUNT(*) FROM web_employeewelfare");
    $totalRecords = $totalStmt->fetchColumn();
    $totalPages = ceil($totalRecords / $limit);

    // Fetch records for current page
    $stmt = $db->prepare("SELECT * FROM web_employeewelfare ORDER BY id DESC LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
    <?php if ($rows): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>S.No</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $index => $row): ?>
                        <tr>
                            <td><?php echo $offset + $index + 1; ?></td>
                            <td>
                                <img src="<?php echo ABS_URL ?>uploads/employee-welfare/<?php echo htmlspecialchars($row['image']) ?>" alt="Image" width="60" height="60" class="img-thumbnail">
                            </td>
                            <td><?php echo htmlspecialchars($row['title']) ?></td>
                            <td>
                                <?php
                                    $desc = $row['description'];
                                    echo mb_strlen($desc) > 50 
                                        ? htmlspecialchars(mb_substr($desc, 0, 50)) . '...'
                                        : htmlspecialchars($desc);
                                ?>
                            </td>

                            <td>
                                <a href="edit_welfare.php?sno=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                <form method="post" action="delete_welfare.php" class="delete-welfare-form" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this record?');">
                                    <input type="hidden" name="sno" value="<?php echo $row['id']; ?>">
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <!-- Pagination -->
<?php if ($totalPages > 1): ?>
    <nav>
        <ul class="pagination">
            <?php if ($page > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $page - 1; ?>">Previous</a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $page + 1; ?>">Next</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?>


    <?php else: ?>
        <div class="alert alert-info">No data found.</div>
    <?php endif; ?>

<?php
} catch (PDOException $e) {
    echo '<div class="alert alert-danger">Database error: ' . $e->getMessage() . '</div>';
}
?>

        </div>
    </div>
</div>
   </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
  // Bootstrap 5 custom validation + file size check
  (() => {
    'use strict';
    const form = document.querySelector('#welfareForm');
    form.addEventListener('submit', function (e) {
      const file = document.getElementById('image').files[0];
      if (!form.checkValidity()) {
        e.preventDefault();
        e.stopPropagation();
      }
      if (file && file.size > 50 * 1024 * 1024) {
        alert('Image size must be less than 10MB.');
        e.preventDefault();
        return false;
      }
      form.classList.add('was-validated');
      if (!e.defaultPrevented) {
        const loader = document.getElementById('welfareLoader');
        document.getElementById('welfareLoaderText').textContent = 'Creating employee welfare...';
        loader.style.display = 'flex';
        loader.setAttribute('aria-hidden', 'false');
        const submitButton = form.querySelector('button[type="submit"]');
        submitButton.disabled = true;
        submitButton.textContent = 'Processing...';
      }
    }, false);

    document.querySelectorAll('.delete-welfare-form').forEach(function (deleteForm) {
      deleteForm.addEventListener('submit', function () {
        const loader = document.getElementById('welfareLoader');
        document.getElementById('welfareLoaderText').textContent = 'Deleting employee welfare...';
        loader.style.display = 'flex';
        loader.setAttribute('aria-hidden', 'false');
        const deleteButton = deleteForm.querySelector('button[type="submit"]');
        deleteButton.disabled = true;
        deleteButton.textContent = 'Deleting...';
      });
    });
  })();
</script>
</body>
</html>
