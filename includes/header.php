<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . "/../config/database.php";
require_once __DIR__ . "/functions.php";

$base_url = "/elite_gadget_store";

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?= e($page_title ?? 'Elite Gadget Store') ?>
    </title>

    <link
        rel="stylesheet"
        href="<?= $base_url ?>/assets/css/style.css"
    >

</head>

<body>

<?php require_once __DIR__ . "/navbar.php"; ?>