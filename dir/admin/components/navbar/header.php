
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand fw-bold" href="<?php echo ABS_URL ?>dir/admin/"><img src="<?= ABS_URL ?>assets/home/gallantt-group-of-industries.svg" class="attachment-full size-full wp-image-22" alt="Gallantt Group of Industries"></a>
        <!-- Navbar Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar Links -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Home Banner -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="homeBannerDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false"> Home Banner</a>
                    <ul class="dropdown-menu" aria-labelledby="homeBannerDropdown">
                        <li><a class="dropdown-item" href="<?= ABS_URL ?>dir/admin/home-banner/">Add New Banner</a></li>
                        <li><a class="dropdown-item" href="<?= ABS_URL ?>dir/admin/home-banner/banner-list.php">Manage Banner</a></li>
                        <li><a class="dropdown-item" href="<?= ABS_URL ?>dir/admin/home-banner/home-video.php">Home Video</a></li>
                    </ul>
                </li>

                <!-- Reports Master Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="reportsDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false"> Reports</a>
                    <ul class="dropdown-menu" aria-labelledby="reportsDropdown">
                        <li class="dropdown-header fw-bold text-dark">Corporate Reports</li>
                        <li><a class="dropdown-item ps-4" href="<?= ABS_URL ?>dir/admin/corporate-report/">Add New report</a></li>
                        <li><a class="dropdown-item ps-4" href="<?= ABS_URL ?>dir/admin/corporate-report/report-list.php">Manage Reports</a></li>
                        <li><hr class="dropdown-divider"></li>
                        
                        <li class="dropdown-header fw-bold text-dark">Investors Reports</li>
                        <li><a class="dropdown-item ps-4" href="<?= ABS_URL ?>dir/admin/investors-reports/create-report.php">Add New Report</a></li>
                        <li><a class="dropdown-item ps-4" href="<?= ABS_URL ?>dir/admin/investors-reports/">Manage Report</a></li>
                        <li><hr class="dropdown-divider"></li>

                        <li class="dropdown-header fw-bold text-dark">Financial Reports</li>
                        <li><a class="dropdown-item ps-4" href="<?= ABS_URL ?>dir/admin/financial-report/highlights.php">Highlights</a></li>
                        <li><a class="dropdown-item ps-4" href="<?= ABS_URL ?>dir/admin/financial-report/">Latest Reports</a></li>
                    </ul>
                </li>
               
                <!-- MERGED: HR Management (Welfare + Jobs) -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="hrDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false"> HR Desk</a>
                    <ul class="dropdown-menu" aria-labelledby="hrDropdown">
                        <li class="dropdown-header fw-bold text-dark">Recruitment & Jobs</li>
                        <li><a class="dropdown-item ps-4" href="<?= ABS_URL ?>dir/admin/job/job-form.php">Add New Job Post</a></li>
                        <li><a class="dropdown-item ps-4" href="<?= ABS_URL ?>dir/admin/job/job-list.php">Manage Jobs</a></li>                        
                        <li><a class="dropdown-item ps-4" href="<?= ABS_URL ?>dir/admin/job/job-applications.php">Job Applications</a></li>
                        <li><hr class="dropdown-divider"></li>
                        
                        <li class="dropdown-header fw-bold text-dark">Internal Staff</li>
                        <li><a class="dropdown-item ps-4" href="<?= ABS_URL ?>dir/admin/employee-welfare/">Employee Welfare</a></li>
                    </ul>
                </li>

                <!-- MERGED: Content Desk (Media + Blogs) -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="contentDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false"> Content Desk</a>
                    <ul class="dropdown-menu" aria-labelledby="contentDropdown">
                        <li class="dropdown-header fw-bold text-dark">Blog Articles</li>
                        <li><a class="dropdown-item ps-4" href="<?= ABS_URL ?>dir/admin/blog/blog-form.php">Add New Post</a></li>
                        <li><a class="dropdown-item ps-4" href="<?= ABS_URL ?>dir/admin/blog/blog-list.php">Manage Blogs</a></li>
                        <li><hr class="dropdown-divider"></li>

                        <li class="dropdown-header fw-bold text-dark">Media Gallery</li>
                        <li><a class="dropdown-item ps-4" href="<?= ABS_URL ?>dir/admin/media/media-form.php">Add New Media</a></li>
                        <li><a class="dropdown-item ps-4" href="<?= ABS_URL ?>dir/admin/media/media-list.php">Manage Gallery</a></li>
                    </ul>
                </li>

                <!-- RCP Data -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="rcpDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false"> RCP</a>
                    <ul class="dropdown-menu" aria-labelledby="rcpDropdown">
                        <li><a class="dropdown-item" href="<?= ABS_URL ?>dir/admin/rcp/">Add & View Data</a></li>
                        <li><a class="dropdown-item" href="<?= ABS_URL ?>dir/admin/rcp/manage.php">Manage System</a></li>
                    </ul>
                </li>
                
                <!-- Resources -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="resourcesDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">Resources</a>
                    <ul class="dropdown-menu" aria-labelledby="resourcesDropdown">
                        <li><a class="dropdown-item" href="<?= ABS_URL ?>dir/admin/resource/">Manage Resources</a></li>
                        <li><a class="dropdown-item" href="<?= ABS_URL ?>dir/admin/resource/brochure-admin.php">Business Brochures</a></li>         
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="<?= ABS_URL ?>dir/admin/board-panel/" id="businessDropdown" role="button"
                       aria-expanded="false"> Boards of Panels</a>
                </li>
                <!-- Subscribers & Utilities -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="utilityDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false"> System</a>
                    <ul class="dropdown-menu" aria-labelledby="utilityDropdown">
                        <li><a class="dropdown-item" href="<?= ABS_URL ?>dir/admin/subscriber.php"><i class="fa-solid fa-users fa-fw me-2"></i>Subscribers</a></li>
                        <li><a class="dropdown-item" href="<?= ABS_URL ?>dir/admin/readme.php"><i class="fa-solid fa-book-open fa-fw me-2"></i>Read Me Docs</a></li>
                    </ul>
                </li>

                <!-- Account -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-primary fw-semibold" href="#" id="accountDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                       <i class="fa-solid fa-circle-user me-1"></i> Admin
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                        <li><a class="dropdown-item" href="<?= ABS_URL ?>dir/admin/change-password.php">Change Password</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="<?php echo ABS_URL ?>dir/admin/logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    window.addEventListener('pageshow', function (event) {
        if (event.persisted) {
            window.location.reload();
        }
    });

    (() => {
        const idleTimeout = <?php echo defined('ADMIN_IDLE_TIMEOUT') ? ADMIN_IDLE_TIMEOUT : 1800; ?> * 1000;
        let lastActivity = Date.now();

        const resetActivity = () => {
            lastActivity = Date.now();
        };

        ['click', 'keydown', 'mousemove', 'scroll', 'touchstart'].forEach((eventName) => {
            window.addEventListener(eventName, resetActivity, { passive: true });
        });

        window.setInterval(() => {
            if (Date.now() - lastActivity >= idleTimeout) {
                window.location.href = '<?php echo ABS_URL; ?>dir/admin/logout.php?timeout=1';
            }
        }, 1000);
    })();

    window.addEventListener("scroll", function () {
        let navbar = document.querySelector(".navbar");
        if (window.scrollY > 50) {
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }
    });
</script>