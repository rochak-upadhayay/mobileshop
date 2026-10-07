<?php

session_start();

require_once "config/database.php";
require_once "includes/functions.php";

$id =
    intval($_GET["id"] ?? 0);

$page_title =
    "Product - Elite Gadget Store";

require_once "includes/header.php";

?>

<section class="section">

    <div class="form-container">

        <h2>
            Product Details
        </h2>

        <br>

        <img
            src="assets/images/products/smartwatch.webp"
            alt="Smartwatch"
            style="
                width:100%;
                max-width:400px;
                height:300px;
                object-fit:contain;
                display:block;
                margin:auto;
            "
        >

        <br>

        <h3>
            Product will be loaded from database
        </h3>

        <p>
            Product ID:
            <?= e($id) ?>
        </p>

        <br>

        <button
            class="btn btn-primary"
            onclick="alert('Cart system will be connected in the next module.')"
        >
            Add to Cart
        </button>

    </div>

</section>


<?php

require_once "includes/footer.php";

?>