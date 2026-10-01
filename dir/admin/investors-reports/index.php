<?php
require_once '../../../config/config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}

$report = new InvestorReport();
$categories = $report->getCategories();

$category = $_GET['category'] ?? '';
$subcategory = $_GET['subcategory'] ?? '';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

$reports = $report->getAllReports($offset, $limit, $category, $subcategory);
$totalCount = $report->getReportCount($category, $subcategory);
$totalPages = ceil($totalCount / $limit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Investor Reports</title>
    <link rel="stylesheet" href="../components/navbar/header.css">
    <link rel="stylesheet" href="<?= ABS_URL ?>assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="32x32">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="192x192">
    <link rel="apple-touch-icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
    </style>
</head>
<body>
<?php require_once '../components/navbar/header.php'; ?>
<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-lg-8">
    <div class="card shadow-lg">
    <div class="card-header d-flex justify-content-between align-items-center mb-3">
        <h3>Investor Reports</h3>
        <a href="create-report.php" class="btn btn-primary">Add New Report</a>
    </div>

    <div class="card-body">
    <form method="get" class="row mb-4">
        <div class="col-md-4">
            <select name="category" class="form-select" onchange="this.form.submit()">
                <option value="">All Categories</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= $cat['id'] ?>" <?= ($category == $cat['id']) ? 'selected' : '' ?>><?= $cat['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-4">
            <select name="subcategory" class="form-select" onchange="this.form.submit()" id="subcategory">
                <option value="">All Subcategories</option>
            </select>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Category / Subcategory</th>
                <th>Title</th>
                <th class="text-center">File</th>
                <th>Uploaded On</th>
                <th  width="20%">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($reports)): ?>
            <?php foreach ($reports as $index => $rep): ?>
                <tr>
                    <td><?= $offset + $index + 1 ?></td>
                    <td><?= $rep['category_name'] ?>
                    <br>
                <small class="text-primary"><?= $rep['subcategory_name'] ?></small></td>
                    <td><?= htmlspecialchars($rep['title']) ?></td>
                    <td><a href="./uploads/<?= htmlspecialchars($rep['file_path']) ?>" target="_blank"><i class="fa fa-eye"></i></a></td>
                    <td><?= date('d-m-Y', strtotime($rep['created_at'])) ?></td>
                    <td>
                        <a href="edit-report.php?id=<?= $rep['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="delete-report.php?id=<?= $rep['id'] ?>" class="btn btn-sm btn-danger delete-investor-report">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" class="text-center">No reports found.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

    <?php if ($totalPages > 1): ?>
        <nav>
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                        <a class="page-link" href="?category=<?= $category ?>&subcategory=<?= $subcategory ?>&page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    <?php endif; ?>
    </div>
</div>
</div>
<div class="col-lg-4">
        <div class="alert alert-primary mb-0">
                    <div>Changes you made are now live on the Investors page.</div>
                    <a href="<?php echo ABS_URL; ?>investors#investor-report" target="_blank" class="btn btn-sm btn-primary mt-2 w-100"><i class="fa fa-eye"></i> View on Website</a>
               </div>
        </div>
</div>
</div>

<script>
    document.querySelectorAll('.delete-investor-report').forEach(function (deleteLink) {
        deleteLink.addEventListener('click', function (event) {
            if (!confirm('Are you sure?')) {
                event.preventDefault();
                return;
            }
        });
    });

    const selectedSubcat = "<?= $subcategory ?>";
    const categorySelect = document.querySelector('[name="category"]');
    const subcategorySelect = document.getElementById('subcategory');

    if (categorySelect.value) {
        fetch(`get_subcategory.php?cat_id=${categorySelect.value}`)
            .then(response => response.json())
            .then(data => {
                subcategorySelect.innerHTML = '<option value="">All Subcategories</option>';
                data.forEach(sub => {
                    const opt = document.createElement('option');
                    opt.value = sub.id;
                    opt.text = sub.name;
                    if (sub.id === selectedSubcat) opt.selected = true;
                    subcategorySelect.appendChild(opt);
                });
            });
    }
</script>
</body>
</html>