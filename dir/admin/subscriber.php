<?php
require_once '../../config/config.php'; // Your autoload and DB
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}
$db = Database::getDB();

// --- Pagination Config ---
$limit = 10; // records per page
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
$page = max(1, $page);

// --- Get total records for pagination ---
$totalStmt = $db->query("SELECT COUNT(*) FROM web_subscribers");
$totalSubscribers = $totalStmt->fetchColumn();
$totalPages = max(1, (int) ceil($totalSubscribers / $limit));
$page = min($page, $totalPages);
$offset = ($page - 1) * $limit;

// --- Fetch records with LIMIT ---
$stmt = $db->prepare("SELECT id, email, created_at FROM web_subscribers ORDER BY id DESC LIMIT :limit OFFSET :offset");
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$subscribers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./components/navbar/header.css">
    <link rel="stylesheet" href="<?php echo ABS_URL ?>assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="32x32">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="192x192">
    <link rel="apple-touch-icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
    <style>
        .card {
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <?php require_once ABS_PATH . 'dir/admin/components/navbar/header.php'; ?>
<div class="container mt-5">
   <div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card">
    <div class="card-body">
         <h2 class="mb-4">📬 Subscriber List</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-secondary">
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Subscribed On</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($subscribers): ?>
                <?php foreach ($subscribers as $index => $subscriber): ?>
                    <tr>
                        <td><?= $offset + $index + 1 ?></td>
                        <td>
    <span id="email_<?= $subscriber['id'] ?>"><?= htmlspecialchars($subscriber['email']) ?></span>
    <button class="btn btn-sm border-none ms-2" onclick="copyToClipboard('email_<?= $subscriber['id'] ?>')" title="Copy Email">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 640 640">
  <!--!Font Awesome Free v7.3.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
  <path d="M448 96L439.4 96C428.4 76.9 407.7 64 384 64L256 64C232.3 64 211.6 76.9 200.6 96L192 96C156.7 96 128 124.7 128 160L128 512C128 547.3 156.7 576 192 576L448 576C483.3 576 512 547.3 512 512L512 160C512 124.7 483.3 96 448 96zM264 176C250.7 176 240 165.3 240 152C240 138.7 250.7 128 264 128L376 128C389.3 128 400 138.7 400 152C400 165.3 389.3 176 376 176L264 176z"/>
</svg>
    </button>
</td>
                        <td><?= date('d M Y, h:i A', strtotime($subscriber['created_at'])) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="text-center">No subscribers yet.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <?php if ($totalPages > 1): ?>
<nav>
    <ul class="pagination justify-content-center">
        <?php if ($page > 1): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a>
            </li>
        <?php endif; ?>

        <?php
            $startPage = max(2, $page - 2);
            $endPage = min($totalPages - 1, $page + 2);
            if ($page <= 4) {
                $startPage = 2;
                $endPage = min($totalPages - 1, 5);
            } elseif ($page >= $totalPages - 3) {
                $startPage = max(2, $totalPages - 4);
                $endPage = $totalPages - 1;
            }
        ?>
        <li class="page-item <?= ($page === 1) ? 'active' : '' ?>">
            <a class="page-link" href="?page=1">1</a>
        </li>
        <?php if ($startPage > 2): ?>
            <li class="page-item disabled"><span class="page-link">...</span></li>
        <?php endif; ?>
        <?php for ($i = $startPage; $i <= $endPage; $i++): ?>
            <li class="page-item <?= ($i === $page) ? 'active' : '' ?>">
                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>
        <?php if ($endPage < $totalPages - 1): ?>
            <li class="page-item disabled"><span class="page-link">...</span></li>
        <?php endif; ?>
        <?php if ($totalPages > 1): ?>
            <li class="page-item <?= ($page === $totalPages) ? 'active' : '' ?>">
                <a class="page-link" href="?page=<?= $totalPages ?>"><?= $totalPages ?></a>
            </li>
        <?php endif; ?>

        <?php if ($page < $totalPages): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
<?php endif; ?>
    </div>
   </div>
    </div>
   </div>
    

</div>
</body>

<script src="<?php echo ABS_URL ?>assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
function copyToClipboard(elementId) {
    const text = document.getElementById(elementId).innerText;
    navigator.clipboard.writeText(text).then(function() {
        alert("📋 Copied: " + text);
    }, function(err) {
        alert("❌ Failed to copy");
        console.error("Clipboard copy failed:", err);
    });
}
</script>

</html>
