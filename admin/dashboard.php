<?php

require_once "includes/admin_auth.php";

$page_title = "Admin Dashboard - Elite Gadget Store";

require_once "includes/admin_header.php";

?>

<section class="admin-content-header">
    <div>
        <h1>Dashboard</h1>
        <p>Welcome, <?= e($_SESSION["admin_name"] ?? "Administrator") ?>.</p>
    </div>
</section>

<section class="admin-card">
    <h2>Admin access is active</h2>
    <p>Your admin account is signed in successfully.</p>
</section>

<?php require_once "includes/admin_footer.php"; ?>