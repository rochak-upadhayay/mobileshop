<?php

session_start();

require_once "config/database.php";
require_once "includes/functions.php";


$query =
    trim($_GET["q"] ?? "");


$page_title =
    "Search - Elite Gadget Store";


require_once "includes/header.php";

?>

<section class="section">

    <div class="section-title">

        <h2>
            Search Results
        </h2>

    </div>


    <?php if ($query === ""): ?>

        <div class="form-container">

            <p>
                Please enter a product name
                to search.
            </p>

        </div>

    <?php else: ?>

        <div class="form-container">

            <h3>
                Search:
                <?= e($query) ?>
            </h3>

            <p>
                Database search will be connected
                in the product module.
            </p>

        </div>

    <?php endif; ?>

</section>


<?php

require_once "includes/footer.php";

?>