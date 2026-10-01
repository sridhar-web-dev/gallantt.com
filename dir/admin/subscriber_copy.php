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
$offset = ($page - 1) * $limit;

// --- Fetch records with LIMIT ---
$stmt = $db->prepare("SELECT id, email, created_at FROM web_subscribers ORDER BY id DESC LIMIT :limit OFFSET :offset");
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$subscribers = $stmt->fetchAll(PDO::FETCH_ASSOC);

// --- Get total records for pagination ---
$totalStmt = $db->query("SELECT COUNT(*) FROM web_subscribers");
$totalSubscribers = $totalStmt->fetchColumn();
$totalPages = ceil($totalSubscribers / $limit);
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
                        <td><?= $index + 1 ?></td>
                        <td>
    <span id="email_<?= $subscriber['id'] ?>"><?= htmlspecialchars($subscriber['email']) ?></span>
    <button class="btn btn-sm btn-outline-secondary ms-2" onclick="copyToClipboard('email_<?= $subscriber['id'] ?>')" title="Copy Email">
        <i class="fas fa-copy"></i>
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

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?= ($i === $page) ? 'active' : '' ?>">
                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>

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
