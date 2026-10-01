<?php
require_once '../../../config/config.php';
require_once 'BoardController.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}

// Database Configuration
$boardManager = new BoardController(DB_HOST, DB_NAME, DB_USER, DB_PASS);

function truncateWords($text, $limit = 50) {
    $words = explode(' ', $text);
    if (count($words) > $limit) {
        return implode(' ', array_slice($words, 0, $limit)) . '...';
    }
    return $text;
}

// Handle Form Submissions
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $uploadDir = ABS_PATH . 'uploads/panels/';
        $allowedImageTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
        $maxImageSize = 5 * 1024 * 1024;

        switch ($_POST['action']) {
            case 'create':
                $dbPictureValue = ''; // What we will save in the DB column
                $title = trim($_POST['title'] ?? '');
                $designation = trim($_POST['designation'] ?? '');
                $description = trim($_POST['description'] ?? '');
                if ($title === '') {
                    $_SESSION['message'] = ['type' => 'danger', 'text' => 'Name is required.'];
                    header("Location: index.php");
                    exit;
                }
                
                // Handle file upload processing
                if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
                    $fileTmpPath = $_FILES['picture']['tmp_name'];
                    $fileExtension = strtolower(pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION));
                    if ($_FILES['picture']['size'] > $maxImageSize || !in_array($_FILES['picture']['type'], $allowedImageTypes, true) || getimagesize($fileTmpPath) === false) {
                        $_SESSION['message'] = ['type' => 'danger', 'text' => 'Upload a valid JPG, PNG, WEBP, or GIF image under 5 MB.'];
                        header("Location: index.php");
                        exit;
                    }
                    
                    // Generate unique hashed name
                    $fileName = md5(time() . bin2hex(random_bytes(4))) . '.' . $fileExtension;
                    $destPath = $uploadDir . $fileName;

                    if (move_uploaded_file($fileTmpPath, $destPath)) {
                        // Store just the filename or the relative folder depending on your DB architecture
                        // Based on your phpMyAdmin screenshot, it stores 'uploads/...'. Let's keep it consistent:
                        $dbPictureValue = 'uploads/panels/' . $fileName;
                    }
                }
                
                // FIXED: Passed $dbPictureValue instead of an unassigned string variable
                if (!$boardManager->createBoard($title, $dbPictureValue, $designation, $description)) {
                    if ($dbPictureValue && isset($fileName) && is_file($uploadDir . $fileName)) {
                        unlink($uploadDir . $fileName);
                    }
                } else {
                    clearVarnishCache();
                }
                header("Location: index.php"); 
                exit;

            case 'update':
                $boardId = (int) ($_POST['id'] ?? 0);
                $title = trim($_POST['title'] ?? '');
                $designation = trim($_POST['designation'] ?? '');
                $description = trim($_POST['description'] ?? '');
                if (!$boardId || $title === '') {
                    header("Location: index.php");
                    exit;
                }
                $existingBoard = $boardManager->getBoardById($boardId);
                if (!$existingBoard) {
                    $_SESSION['message'] = ['type' => 'danger', 'text' => 'Profile not found.'];
                    header("Location: index.php");
                    exit;
                }
                $currentPicture = $existingBoard['picture'] ?? '';
                $dbPictureValue = $currentPicture;

                // Check if a brand new file is being uploaded
                if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
                    $fileTmpPath = $_FILES['picture']['tmp_name'];
                    $fileExtension = strtolower(pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION));
                    if ($_FILES['picture']['size'] > $maxImageSize || !in_array($_FILES['picture']['type'], $allowedImageTypes, true) || getimagesize($fileTmpPath) === false) {
                        header("Location: index.php");
                        exit;
                    }
                    
                    // FIXED: Generate the unique filename matching the creation logic
                    $fileName = md5(time() . bin2hex(random_bytes(4))) . '.' . $fileExtension;
                    $destPath = $uploadDir . $fileName;

                    if (move_uploaded_file($fileTmpPath, $destPath)) {
                        // Set new value to match database requirements
                        $dbPictureValue = 'uploads/panels/' . $fileName;
                    } else {
                        $_SESSION['message'] = ['type' => 'danger', 'text' => 'Profile picture upload failed.'];
                        header("Location: index.php");
                        exit;
                    }
                }

                // FIXED: Passing $dbPictureValue ensures it updates accurately or securely retains the old one.
                if ($boardManager->updateBoard($boardId, $title, $dbPictureValue, $designation, $description)) {
                    if (isset($fileName) && !empty($currentPicture)) {
                        $oldPath = $uploadDir . basename($currentPicture);
                        if (is_file($oldPath)) {
                            unlink($oldPath);
                        }
                    }
                    clearVarnishCache();
                } elseif (isset($fileName) && is_file($uploadDir . $fileName)) {
                    unlink($uploadDir . $fileName);
                }
                header("Location: index.php"); 
                exit;

            case 'delete':
                if ($boardManager->deleteBoard($_POST['id'])) {
                    clearVarnishCache();
                }
                header("Location: index.php"); 
                exit;

            case 'sort':
                $ids = explode(',', $_POST['ordered_ids']);
                if (!empty($ids)) {
                    if ($boardManager->saveOrder($ids)) {
                        clearVarnishCache();
                    }
                }
                header("Location: index.php"); 
                exit;
        }
    }
}

$boards = $boardManager->getAllBoards();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Manage Team Boards</title>
    <link rel="stylesheet" href="../components/navbar/header.css">
    <link rel="stylesheet" href="<?= ABS_URL ?>assets/bootstrap/dist/css/bootstrap.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        .draggable-item {
            cursor: grab;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .draggable-item:active {
            cursor: grabbing;
        }
        .draggable-item.dragging {
            opacity: 0.5;
            background-color: #f8f9fa;
            border: 2px dashed #0d6efd;
        }
        .profile-img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 10%;
            background-color: #e9ecef;
        }
        .board-loader { position: fixed; inset: 0; z-index: 1060; display: none; align-items: center; justify-content: center; background: rgba(248, 249, 250, 0.86); backdrop-filter: blur(3px); }
        .board-loader-card { width: min(90vw, 330px); padding: 28px; background: #fff; border: 1px solid #dee2e6; border-radius: 12px; box-shadow: 0 8px 28px rgba(0, 0, 0, 0.12); text-align: center; }
        .board-wireframe-line { height: 10px; margin: 10px auto; border-radius: 5px; background: linear-gradient(90deg, #e9ecef 25%, #f8f9fa 50%, #e9ecef 75%); background-size: 200% 100%; animation: board-wireframe-shimmer 1.2s linear infinite; }
        .board-wireframe-line.short { width: 58%; } .board-wireframe-line.long { width: 84%; }
        @keyframes board-wireframe-shimmer { from { background-position: 200% 0; } to { background-position: -200% 0; } }
        .board-loader-text { margin-top: 18px; color: #495057; font-weight: 600; }
    </style>
</head>
<body class="bg-light">
<div id="boardLoader" class="board-loader" role="status" aria-live="polite" aria-hidden="true">
    <div class="board-loader-card">
        <div class="board-wireframe-line short"></div>
        <div class="board-wireframe-line long"></div>
        <div class="board-wireframe-line long"></div>
        <div class="board-loader-text" id="boardLoaderText">Saving profile...</div>
    </div>
</div>
<?php require_once '../components/navbar/header.php'; ?>
<div class="container py-5">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h2 class="fw-bold text-dark"><i class="bi bi-columns-gap me-2"></i>Profile Board Management</h2>
            <p class="text-muted mb-0">Add, edit, delete, or drag-and-drop to reorder your team profiles.</p>
        </div>
        <div class="col-auto">
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addBoardModal">
                 + Add New Profile
            </button>
        </div>
    </div>

    <div id="sortable-list" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php if(!empty($boards)): ?>
            <?php foreach ($boards as $board): ?>
                <div class="col draggable-item" draggable="true" data-id="<?= $board['id'] ?>">
                    <div class="card h-100 shadow-lg border-0 rounded">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                
                                <?php $pictureUrl = !empty($board['picture']) ? ABS_URL . 'uploads/panels/' . rawurlencode(basename($board['picture'])) : 'https://via.placeholder.com/70'; ?>
                                <img src="<?= htmlspecialchars($pictureUrl) ?>" alt="<?= htmlspecialchars($board['title']) ?>" class="profile-img me-3 border">
                                <div class="overflow-hidden flex-grow-1">
                                    <h5 class="card-title fw-semibold text-truncate m-0"><?= htmlspecialchars($board['title']) ?></h5>
                                    <p class="text-primary small mb-0 text-truncate fw-medium"><?= htmlspecialchars($board['designation'] ?? '') ?></p>
                                </div>
                                <span class="badge bg-secondary ms-2">#<?= $board['order_index'] ?></span>
                            </div>
                            
                            <p class="card-text text-muted small" style="min-height: 1.5rem;">
                                <?php 
                                $fullDesc = $board['description'];
                                $wordCount = count(explode(' ', $fullDesc));
                                
                                // Display truncated version
                                echo htmlspecialchars(truncateWords($fullDesc, 10)); 
                                
                                // If it exceeds 50 words, append a dynamic "Read More" link
                                if ($wordCount > 10): 
                                ?>
                                    <a href="#" class="text-primary text-decoration-none ms-1 read-more-btn"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#viewSummaryModal"
                                    data-title="<?= htmlspecialchars($board['title']) ?>"
                                    data-summary="<?= htmlspecialchars($fullDesc) ?>">Read More</a>
                                <?php endif; ?>
                            </p>
                        </div>
                        <div class="card-footer bg-transparent border d-flex justify-content-between align-items-center">
                            <small class="text-muted"> Drag to reorder</small>
                            <div>
                                <button class="btn btn-sm btn-outline-secondary me-1" data-bs-toggle="modal" data-bs-target="#editBoardModal"  data-id="<?= $board['id'] ?>"                                      data-title="<?= htmlspecialchars($board['title']) ?>"
                                        data-picture="<?= htmlspecialchars($board['picture'] ?? '') ?>"
                                        data-designation="<?= htmlspecialchars($board['designation'] ?? '') ?>"
                                        data-desc="<?= htmlspecialchars($board['description']) ?>">
                                    Edit
                                </button>
                                <button class="btn btn-sm btn-outline-danger" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#deleteBoardModal"
                                        data-id="<?= $board['id'] ?>">
                                        Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center py-5">
                <p class="text-muted">No profiles found. Click "Add New Profile" to get started!</p>
            </div>
        <?php endif; ?>
    </div>

    <form id="sort-form" method="POST" class="mt-4 text-end d-none">
        <input type="hidden" name="action" value="sort">
        <input type="hidden" name="ordered_ids" id="ordered_ids">
        <button type="submit" class="btn btn-success btn-sm shadow">Save Profile Order</button>
    </form>
</div>

<div class="modal fade" id="addBoardModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <form method="POST" enctype="multipart/form-data" class="modal-content">
            <input type="hidden" name="action" value="create">
            <div class="modal-header">
                <h5 class="modal-title">Add New Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="title" class="form-control" required placeholder="e.g., John Doe">
                </div>
                <div class="mb-3">
                    <label class="form-label">Upload Profile Picture</label>
                    <input type="file" name="picture" class="form-control" accept="image/*">
                </div>
                <div class="mb-3">
                    <label class="form-label">Designation</label>
                    <input type="text" name="designation" class="form-control" placeholder="">
                </div>
                <div class="mb-3">
                    <label class="form-label">Small Summary</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Brief info about the person..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Create Profile</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="editBoardModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <form method="POST" enctype="multipart/form-data" class="modal-content">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" id="edit-id">
            <input type="hidden" name="current_picture" id="edit-current-picture">
            <div class="modal-header">
                <h5 class="modal-title">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="title" id="edit-title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Replace Profile Picture</label>
                    <input type="file" name="picture" class="form-control" accept="image/*">
                    <div id="edit-pic-preview-text" class="form-text text-muted mt-1">Leave empty to keep current picture.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Designation</label>
                    <input type="text" name="designation" id="edit-designation" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Small Summary</label>
                    <textarea name="description" id="edit-desc" class="form-control" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="deleteBoardModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm">
        <form method="POST" class="modal-content">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id" id="delete-id">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Delete Profile?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Are you sure you want to delete this profile?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="submit" class="btn btn-danger">Yes, Delete</button>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="viewSummaryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content shadow border-0">
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold text-dark" id="summary-modal-title">Profile Summary</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-muted p-4" id="summary-modal-body" style="white-space: pre-line;">
                </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
</div>
<script src="../jquery.3.6.1.js"></script>
<script src="<?= ABS_URL ?>assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.querySelectorAll('form[method="POST"]').forEach(function (form) {
        form.addEventListener('submit', function () {
            const loader = document.getElementById('boardLoader');
            const submitButton = this.querySelector('button[type="submit"]');
            const action = this.querySelector('input[name="action"]')?.value;
            const actionText = action === 'delete'
                ? 'Deleting profile...'
                : action === 'update'
                    ? 'Updating profile...'
                    : action === 'sort'
                        ? 'Updating order...'
                        : 'Creating profile...';
            loader.style.display = 'flex';
            loader.setAttribute('aria-hidden', 'false');
            document.getElementById('boardLoaderText').textContent = actionText;
            if (submitButton) {
                submitButton.disabled = true;
                submitButton.textContent = action === 'delete' ? 'Deleting...' : 'Processing...';
            }
        });
    });
</script>
<script>
    // --- Populating Read More Summary Modal ---
const viewSummaryModal = document.getElementById('viewSummaryModal');
if(viewSummaryModal) {
    viewSummaryModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const name = button.getAttribute('data-title');
        const fullSummary = button.getAttribute('data-summary');
        
        // Inject data into the popup elements
        document.getElementById('summary-modal-title').textContent = `${name}'s Full Profile Summary`;
        document.getElementById('summary-modal-body').textContent = fullSummary;
    });
}
</script>
<script>
    // --- Populating Modals Dynamically ---
    const editModal = document.getElementById('editBoardModal');
    if(editModal) {
        editModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            document.getElementById('edit-id').value = button.getAttribute('data-id');
            document.getElementById('edit-title').value = button.getAttribute('data-title');
            document.getElementById('edit-current-picture').value = button.getAttribute('data-picture');
            document.getElementById('edit-designation').value = button.getAttribute('data-designation');
            document.getElementById('edit-desc').value = button.getAttribute('data-desc');
        });
    }

    const deleteModal = document.getElementById('deleteBoardModal');
    if(deleteModal) {
        deleteModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            document.getElementById('delete-id').value = button.getAttribute('data-id');
        });
    }

    // --- Drag and Drop Logic ---
    const list = document.getElementById('sortable-list');
    const sortForm = document.getElementById('sort-form');
    const orderedIdsInput = document.getElementById('ordered_ids');
    let draggedItem = null;

    if(list) {
        list.addEventListener('dragstart', (e) => {
            draggedItem = e.target.closest('.draggable-item');
            if(draggedItem) {
                setTimeout(() => draggedItem.classList.add('dragging'), 0);
            }
        });

        list.addEventListener('dragend', (e) => {
            if(draggedItem) {
                draggedItem.classList.remove('dragging');
                draggedItem = null;
                updateOrderInput();
            }
        });

        list.addEventListener('dragover', (e) => {
            e.preventDefault();
            const afterElement = getDragAfterElement(list, e.clientY);
            const draggable = document.querySelector('.dragging');
            if (draggable) {
                if (afterElement == null) {
                    list.appendChild(draggable);
                } else {
                    list.insertBefore(draggable, afterElement);
                }
            }
        });
    }

    function getDragAfterElement(container, y) {
        const draggableElements = [...container.querySelectorAll('.draggable-item:not(.dragging)')];
        return draggableElements.reduce((closest, child) => {
            const box = child.getBoundingClientRect();
            const offset = y - box.top - box.height / 2;
            if (offset < 0 && offset > closest.offset) {
                return { offset: offset, element: child };
            } else {
                return closest;
            }
        }, { offset: Number.NEGATIVE_INFINITY }).element;
    }

    function updateOrderInput() {
        const currentItems = [...list.querySelectorAll('.draggable-item')];
        const ids = currentItems.map(item => item.getAttribute('data-id'));
        if(orderedIdsInput && sortForm) {
            orderedIdsInput.value = ids.join(',');
            sortForm.classList.remove('d-none');
        }
    }
</script>
</body>
</html>

