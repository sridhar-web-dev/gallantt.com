<?php 
require_once '../../../config/config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}
$blog = new Blog();
$limit = PAGE_PER_LIST; // Number of blogs per page
$page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
$offset = ($page - 1) * $limit;
$blogs = $blog->getAllBlogs($limit, $offset);
$totalBlogs = $blog->getTotalBlogs();
$totalPages = ceil($totalBlogs / $limit);
?>
<div class="table-responsive">
<table class="table table-bordered">
    <thead >
        <tr>
            <th>S. No.</th>
            <th>Title</th>
            <th>Image</th>
            <th>Post Date</th>
            <th  width="30%">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($blogs)) : ?>
            <?php $serial = 1; // Initialize serial number ?>
            <?php foreach ($blogs as $blog) : ?>
                <tr>
                    <td><?= $serial++ ?></td> <!-- Increment serial number -->
                    <td><?= htmlspecialchars($blog['title']) ?></td>
                    <td><img src="<?= ABS_URL ?>uploads/blog/uploads/<?= htmlspecialchars($blog['image']) ?>" width="50"></td>
                    <td><?= date("Y-m-d", strtotime($blog['post_date'])) ?></td>
                    <td>
                        <a href="blog-form.php?blog_id=<?= $blog['blog_id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <button class="btn btn-sm <?= $blog['status'] == 1 ? 'btn-secondary' : 'btn-success' ?> toggleStatus" data-id="<?= $blog['blog_id'] ?>" data-status="<?= $blog['status'] ?>">
                            <?= $blog['status'] == 1 ? 'Disable Blog' : 'Make Live' ?>
                        </button>
                        <button class="btn btn-danger btn-sm deleteBlog" data-id="<?= $blog['blog_id'] ?>">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="6" class="text-center">No blog posts found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
</div>
<!-- Hide pagination if total blogs are less than the limit -->
<div class="text-center d-flex justify-content-center">
<?php if ($totalBlogs > $limit) : ?>
    <ul class="pagination  mt-3">
        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
            <button class="btn mx-1 shadow-sm  <?= $i == $page ? 'btn-primary' : 'btn-light' ?> page-link" data-page="<?= $i ?>"><?= $i ?></button>
            </li>
        <?php endfor; ?>
    </ul>
<?php endif; ?>
</div>