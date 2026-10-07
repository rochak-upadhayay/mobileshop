<?php

require_once "config/database.php";
require_once "includes/functions.php";

session_start();


$category =
    trim($_GET["name"] ?? "");


$page_title =
    $category
    ? $category . " - Elite Gadget Store"
    : "Category - Elite Gadget Store";


require_once "includes/header.php";

?>

<section class="section">

    <div class="section-title">

        <h2>

            <?= e($category) ?>

        </h2>

    </div>


    <div class="product-grid">

        <div class="product-card">

            <img
                src="assets/images/products/Samsung.jpg"
                class="product-image"
                alt="Samsung gadget"
            >

            <div class="product-info">

                <div class="product-name">
                    <?= e($category ?: 'Gadget') ?> collection
                </div>

                <div class="product-brand">
                    Elite Gadget Store
                </div>

                <div class="product-price">
                    Browse available products
                </div>

            </div>

        </div>

    </div>

</section>


<?php

require_once "includes/footer.php";

?>