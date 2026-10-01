<?php
require_once '../../../config/config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}
$db = Database::getDB();
$limit = PAGE_PER_LIST; // Number of media items per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;
// Get total media count
$totalStmt = $db->query("SELECT COUNT(*) as total FROM web_mediagallery");
$totalMedia = $totalStmt->fetch(PDO::FETCH_ASSOC)['total'];
$totalPages = ceil($totalMedia / $limit);
// Fetch paginated media records
$stmt = $db->prepare("SELECT * FROM web_mediagallery ORDER BY last_update DESC LIMIT :limit OFFSET :offset");
$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$mediaList = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Media Name</th>
            <th>Category</th>
            <th>Status</th>
            <th  width="25%">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($mediaList)) : ?>
            <?php $serial = $offset + 1; ?>
            <?php foreach ($mediaList as $media) : ?>
                <tr>
                <td><?= $serial++ ?></td>
                    <td><?= htmlspecialchars($media['media_name']) ?></td>
                    <td><?= htmlspecialchars($media['category']) ?></td>
                    <td>
                        <span class="badge bg-<?= ($media['status'] == 'live') ? 'success' : 'secondary' ?>">
                            <?= ucfirst($media['status']) ?>
                        </span>
                    </td>
                    <td>
                        <a href="media-form.php?media_id=<?= $media['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm deleteMedia" data-id="<?= $media['id'] ?>">Delete</button>
                        <button class="btn btn-warning btn-sm toggleStatus" data-id="<?= $media['id'] ?>" data-status="<?= $media['status'] ?>">
                            <?= ($media['status'] == 'live') ? 'Disable' : 'Make Live' ?>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="5" class="text-center">No media found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<!-- Pagination -->
<?php if ($totalMedia > $limit) : ?>
<div class="text-center d-flex justify-content-center">
    <ul class="pagination mt-3">
        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                <a href="#" class="btn mx-1 shadow-sm <?= $i == $page ? 'btn-primary' : 'btn-light' ?> page-link pagination-link" data-page="<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</div>
<?php endif; ?>
<script>
$(document).on("click", ".pagination-link", function(e) {
    e.preventDefault();
    let page = $(this).data("page");
    $.ajax({
        url: "fetch-media.php",
        type: "GET",
        data: { page: page },
        success: function(response) {
            $("#mediaTableContainer").html(response);
        }
    });
});
</script>
