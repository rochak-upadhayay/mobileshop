<?php

/*
|--------------------------------------------------------------------------
| Escape HTML Output
|--------------------------------------------------------------------------
*/

function e($value)
{
    return htmlspecialchars(
        $value ?? '',
        ENT_QUOTES,
        'UTF-8'
    );
}


/*
|--------------------------------------------------------------------------
| Redirect Function
|--------------------------------------------------------------------------
*/

function redirect($url)
{
    header("Location: " . $url);
    exit;
}


/*
|--------------------------------------------------------------------------
| Check POST Request
|--------------------------------------------------------------------------
*/

function is_post()
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}


/*
|--------------------------------------------------------------------------
| Check GET Request
|--------------------------------------------------------------------------
*/

function is_get()
{
    return $_SERVER['REQUEST_METHOD'] === 'GET';
}


/*
|--------------------------------------------------------------------------
| Check Customer Login
|--------------------------------------------------------------------------
*/

function customer_logged_in()
{
    return isset($_SESSION['customer_id']);
}


/*
|--------------------------------------------------------------------------
| Check Admin Login
|--------------------------------------------------------------------------
*/

function admin_logged_in()
{
    return isset($_SESSION['admin_id']);
}


/*
|--------------------------------------------------------------------------
| Get Current Customer ID
|--------------------------------------------------------------------------
*/

function customer_id()
{
    return $_SESSION['customer_id'] ?? null;
}


/*
|--------------------------------------------------------------------------
| Format Price
|--------------------------------------------------------------------------
*/

function format_price($price)
{
    return "Rs. " . number_format(
        (float)$price,
        2
    );
}


/*
|--------------------------------------------------------------------------
| Generate CSRF Token
|--------------------------------------------------------------------------
*/

function csrf_token()
{
    if (empty($_SESSION['csrf_token'])) {

        $_SESSION['csrf_token'] =
            bin2hex(random_bytes(32));

    }

    return $_SESSION['csrf_token'];
}


/*
|--------------------------------------------------------------------------
| Verify CSRF Token
|--------------------------------------------------------------------------
*/

function verify_csrf_token($token)
{
    return isset($_SESSION['csrf_token'])
        && hash_equals(
            $_SESSION['csrf_token'],
            $token
        );
}


/*
|--------------------------------------------------------------------------
| Generate Random Order Number
|--------------------------------------------------------------------------
*/

function generate_order_number()
{
    return "EGS-" .
        date("Ymd") .
        "-" .
        strtoupper(
            bin2hex(random_bytes(3))
        );
}


/*
|--------------------------------------------------------------------------
| Product Image
|--------------------------------------------------------------------------
*/

function product_image($image)
{
    if (
        !empty($image)
        && is_file(__DIR__ . "/../uploads/products/" . basename($image))
    ) {

        return "/elite_gadget_store/uploads/products/" . rawurlencode(basename($image));

    }

    return "/elite_gadget_store/assets/images/products/iphone.jpg";
}

?>