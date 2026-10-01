<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand fw-bold" href="<?php echo ABS_URL; ?>"><img src="<?= ABS_URL ?>assets/home/gallantt-group-of-industries.svg" class="attachment-full size-full wp-image-22" alt="Gallantt Group of Industries"></a>
        <!-- Navbar Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar Links -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Company -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="companyDropdown" role="button"
                       aria-expanded="false">Company</a>
                    <ul class="dropdown-menu" aria-labelledby="companyDropdown">
                        <li><a class="dropdown-item" href="<?= ABS_URL ?>about-us">About Us</a></li>
                        <li><a class="dropdown-item" href="<?= ABS_URL ?>our-leadership">Our Leadership</a></li>
                        <li><a class="dropdown-item" href="<?= ABS_URL ?>careers">Careers</a></li>
                    </ul>
                </li>
                <!-- Business -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="businessDropdown" role="button"
                       aria-expanded="false">Business</a>
                    <ul class="dropdown-menu" aria-labelledby="businessDropdown">
                        <li><a class="dropdown-item" href="<?= ABS_URL ?>steel">Steel</a></li>
                        <li><a class="dropdown-item" href="<?= ABS_URL ?>cement">Cement</a></li>
                        <li><a class="dropdown-item" href="<?= ABS_URL ?>real-estate">Real Estate</a></li>
                    </ul>
                </li>
                <!-- Other Menu Items -->
                <li class="nav-item"><a class="nav-link" href="<?= ABS_URL ?>foundation">Foundation</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= ABS_URL ?>sustainability">Sustainability</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= ABS_URL ?>investors">Investors</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= ABS_URL ?>media">Media</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= ABS_URL ?>resources">Resources</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= ABS_URL ?>rcp">RCP</a></li>
                <li class="nav-item"><a class="nav-link d-block d-lg-none" href="<?= ABS_URL ?>contact-us">Contact Us</a></li>
            </ul>
        </div>
        <!-- Contact Button -->
        <a href="<?= ABS_URL ?>contact-us" class="contact-btn ms-auto d-none d-lg-block">Contact Us</a>
    </div>
</nav>
<script>
    window.addEventListener("scroll", function () {
        let navbar = document.querySelector(".navbar");
        if (window.scrollY > 50) {
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }
    });
</script>