<nav class="navbar">

    <div class="nav-container">

        <a class="logo" href="<?= $base_url ?>/index.php">
            <img class="logo-image" src="<?= $base_url ?>/assets/images/m.png" alt="Elite Gadget Store logo">
            <span>Elite Gadget Store</span>
        </a>

        <form class="search-form" action="<?= $base_url ?>/search.php" method="GET">
            <input type="search" name="q" placeholder="Search gadgets" aria-label="Search gadgets">
            <button type="submit" aria-label="Search">&#128269;</button>
        </form>

        <nav class="desktop-nav" aria-label="Main navigation">
            <a href="<?= $base_url ?>/categories.php">Categories</a>
            <a href="<?= $base_url ?>/cart.php">Cart</a>
            <?php if (customer_logged_in()): ?>
                <a href="<?= $base_url ?>/customer/account.php">Account</a>
            <?php else: ?>
                <a href="<?= $base_url ?>/customer/login.php">Login</a>
            <?php endif; ?>
        </nav>

    </div>

</nav>