<?php

require_once "includes/auth.php";

require_once "config/database.php";

require_once "includes/functions.php";


if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    redirect("index.php");

}


$customer_id =
    $_SESSION["customer_id"];


$name =
    trim($_POST["name"] ?? "");

$phone =
    trim($_POST["phone"] ?? "");

$email =
    trim($_POST["email"] ?? "");

$address =
    trim($_POST["address"] ?? "");

$city =
    trim($_POST["city"] ?? "");

$payment_method =
    trim($_POST["payment_method"] ?? "");


if (
    empty($name) ||
    empty($phone) ||
    empty($email) ||
    empty($address) ||
    empty($city)
) {

    die(
        "Please fill all checkout fields."
    );

}


/*
|--------------------------------------------------------------------------
| Cart will be processed here later
|--------------------------------------------------------------------------
*/

echo "

<h2>Order System Ready</h2>

<p>
Customer:
" . e($name) . "
</p>

<p>
Payment:
" . e($payment_method) . "
</p>

<p>
The cart/order database processing will be
connected in the order module.
</p>

";

?>