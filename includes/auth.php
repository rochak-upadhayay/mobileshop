<?php

/*
|--------------------------------------------------------------------------
| Customer Authentication
|--------------------------------------------------------------------------
*/

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


/*
|--------------------------------------------------------------------------
| Check Customer Authentication
|--------------------------------------------------------------------------
*/

if (!isset($_SESSION['customer_id'])) {

    header(
        "Location: /elite_gadget_store/customer/login.php"
    );

    exit;

}

?>