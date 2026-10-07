<?php

require_once "../includes/auth.php";

$page_title =
    "My Account - Elite Gadget Store";

require_once "../includes/header.php";

?>

<div class="section">

    <div class="section-title">

        <h2>
            My Account
        </h2>

    </div>


    <div class="form-container">

        <h3>
            Welcome,
            <?= e($_SESSION["customer_name"]) ?>
        </h3>

        <br>


        <p>
            <strong>Email:</strong>

            <?= e($_SESSION["customer_email"]) ?>
        </p>


        <br>


        <a
            href="orders.php"
            class="btn btn-primary"
        >
            My Orders
        </a>


        <a
            href="profile.php"
            class="btn btn-secondary"
        >
            My Profile
        </a>


        <br><br>


        <a
            href="logout.php"
            class="btn btn-secondary"
        >
            Logout
        </a>

    </div>

</div>

<?php require_once "../includes/footer.php"; ?>