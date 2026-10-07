<?php

require_once "includes/auth.php";

require_once "config/database.php";

require_once "includes/functions.php";


if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    redirect("index.php");

}


$product_id =
    intval($_POST["product_id"] ?? 0);

$rating =
    intval($_POST["rating"] ?? 0);

$review =
    trim($_POST["review"] ?? "");


if (
    $product_id <= 0 ||
    $rating < 1 ||
    $rating > 5 ||
    empty($review)
) {

    die(
        "Invalid review information."
    );

}


$customer_id =
    $_SESSION["customer_id"];


/*
|--------------------------------------------------------------------------
| Purchase verification will be added
| when the order system is completed.
|--------------------------------------------------------------------------
*/

echo "

<h2>Review Received</h2>

<p>
Your review has been prepared for
product ID:
" . e($product_id) . "
</p>

<p>
Rating:
" . e($rating) . "/5
</p>

<p>
" . e($review) . "
</p>

";

?>