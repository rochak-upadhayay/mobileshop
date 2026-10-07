<?php

session_start();

require_once "config/database.php";
require_once "includes/functions.php";

$page_title =
    "Shopping Cart - Elite Gadget Store";

require_once "includes/header.php";

?>

<section class="section">

    <div class="section-title">

        <h2>
            Shopping Cart
        </h2>

    </div>


    <div class="form-container">

        <h3>
            Your Cart is Empty
        </h3>

        <p>
            Products you add to your cart
            will appear here.
        </p>

        <br>

        <a
            href="index.php"
            class="btn btn-primary"
        >
            Continue Shopping
        </a>

    </div>

</section>


<?php

require_once "includes/footer.php";

?>