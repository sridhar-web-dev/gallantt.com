<?php
require_once '../../../config/config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}
$limit = 10; // Records per page
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
$page = max(1, $page);
$offset = ($page - 1) * $limit;
$nameFilter = trim($_GET['name'] ?? '');
$emailFilter = trim($_GET['email'] ?? '');

try {
    $db = Database::getDB();

    $where = [];
    $params = [];
    if ($nameFilter !== '') {
        $where[] = 'name LIKE :name';
        $params[':name'] = '%' . $nameFilter . '%';
    }
    if ($emailFilter !== '') {
        $where[] = 'email LIKE :email';
        $params[':email'] = '%' . $emailFilter . '%';
    }
    $whereSql = $where ? ' WHERE ' . implode(' AND ', $where) : '';

    // Get total count
    $countStmt = $db->prepare("SELECT COUNT(*) FROM web_jobapplication$whereSql");
    foreach ($params as $key => $value) {
        $countStmt->bindValue($key, $value, PDO::PARAM_STR);
    }
    $countStmt->execute();
    $totalRecords = $countStmt->fetchColumn();
    $totalPages = ceil($totalRecords / $limit);

    // Fetch paginated records
    $stmt = $db->prepare("SELECT id, job_id, job_title, name, email, resume_file, applied_at
                          FROM web_jobapplication$whereSql
                          ORDER BY applied_at DESC 
                          LIMIT :limit OFFSET :offset");
    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value, PDO::PARAM_STR);
    }
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $applications = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "<div class='text-danger'>Error: " . $e->getMessage() . "</div>";
    exit;
}
?>

<?php if (count($applications) > 0): ?>
   <div class="table-responsive">
   <table class="table table-bordered table-striped">
        <thead >
            <tr>
                <th>#</th>
                <th>Job Title</th>
                <th>Candidate Name</th>
                <th>Email</th>
                <th>Resume</th>
                <th>Applied At</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($applications as $index => $app): ?>
                <tr>
                    <td><?= $offset + $index + 1 ?></td>
                    <td><?= htmlspecialchars($app['job_title']) ?></td>
                    <td><?= htmlspecialchars($app['name']) ?></td>
                    <td><?= htmlspecialchars($app['email']) ?></td>
                    <td>
                        <?php if (!empty($app['resume_file'])): ?>
                            <a href="../../../uploads/resumes/<?= htmlspecialchars($app['resume_file']) ?>" target="_blank">View</a>
                        <?php else: ?>
                            N/A
                        <?php endif; ?>
                    </td>
                    <td><?= strtoupper(date("d M Y", strtotime($app['applied_at']))) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
   </div>

    <!-- Pagination -->
    <?php if ($totalPages > 1): ?>
    <nav>
        <ul class="pagination justify-content-center">
            <?php if ($page > 1): ?>
                <li class="page-item">
                    <a class="page-link application-page-link" href="#" data-page="<?= $page - 1 ?>">Prev</a>
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
            <li class="page-item <?= ($page == 1) ? 'active' : '' ?>">
                <a class="page-link application-page-link" href="#" data-page="1">1</a>
            </li>

            <?php if ($startPage > 2): ?>
                <li class="page-item disabled"><span class="page-link">...</span></li>
            <?php endif; ?>

            <?php for ($i = $startPage; $i <= $endPage; $i++): ?>
                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                    <a class="page-link application-page-link" href="#" data-page="<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($endPage < $totalPages - 1): ?>
                <li class="page-item disabled"><span class="page-link">...</span></li>
            <?php endif; ?>

            <?php if ($totalPages > 1): ?>
                <li class="page-item <?= ($page == $totalPages) ? 'active' : '' ?>">
                    <a class="page-link application-page-link" href="#" data-page="<?= $totalPages ?>"><?= $totalPages ?></a>
                </li>
            <?php endif; ?>

            <?php if ($page < $totalPages): ?>
                <li class="page-item">
                    <a class="page-link application-page-link" href="#" data-page="<?= $page + 1 ?>">Next</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
    <form class="d-flex justify-content-center align-items-center gap-2 mt-3 go-to-application-page-form">
        <label for="application-page-input" class="mb-0">Go to page:</label>
        <input type="number" id="application-page-input" class="form-control" min="1" max="<?= $totalPages ?>" style="width: 90px" required>
        <button type="submit" class="btn btn-secondary">Go</button>
    </form>
<?php endif; ?>


<?php else: ?>
    <p class="text-muted">No job applications found.</p>
<?php endif; ?>
