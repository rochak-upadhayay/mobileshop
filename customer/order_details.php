<?php

require_once "../includes/auth.php";

$page_title =
    "Order Details - Elite Gadget Store";

require_once "../includes/header.php";


$order_id =
    intval($_GET["id"] ?? 0);

?>

<div class="section">

    <div class="form-container">

        <h2>
            Order Details
        </h2>

        <br>

        <p>
            Order ID:
            <?= e($order_id) ?>
        </p>

        <br>

        <p>
            Complete order information will
            be loaded from the database after
            the order module is connected.
        </p>

    </div>

</div>

<?php

require_once "../includes/footer.php"; ?>