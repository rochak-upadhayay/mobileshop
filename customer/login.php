<?php

session_start();

require_once "../config/database.php";
require_once "../includes/functions.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email =
        trim($_POST["email"] ?? "");

    $password =
        $_POST["password"] ?? "";


    if (
        empty($email) ||
        empty($password)
    ) {

        $error =
            "Please enter email and password.";

    } else {

        $stmt = $conn->prepare(
            "SELECT id, name, email, password, status
             FROM customers
             WHERE email = ?
             LIMIT 1"
        );

        $stmt->bind_param(
            "s",
            $email
        );

        $stmt->execute();

        $result =
            $stmt->get_result();

        $customer =
            $result->fetch_assoc();


        if (
            $customer &&
            password_verify(
                $password,
                $customer["password"]
            )
        ) {

            if ($customer["status"] !== "active") {

                $error =
                    "Your account is not active.";

            } else {

                session_regenerate_id(true);

                $_SESSION["customer_id"] =
                    $customer["id"];

                $_SESSION["customer_name"] =
                    $customer["name"];

                $_SESSION["customer_email"] =
                    $customer["email"];

                $redirect =
                    $_SESSION["redirect_after_login"]
                    ?? "../index.php";

                unset(
                    $_SESSION["redirect_after_login"]
                );

                header(
                    "Location: " . $redirect
                );

                exit;

            }

        } else {

            $error =
                "Invalid email or password.";

        }

        $stmt->close();

    }

}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Customer Login - Elite Gadget Store</title>

    <link
        rel="stylesheet"
        href="../assets/css/style.css"
    >

</head>

<body>

<div class="form-container">

    <h2>
        Customer Login
    </h2>

    <p>
        Welcome back to Elite Gadget Store.
    </p>

    <?php if ($error): ?>

        <div class="alert alert-error">

            <?= e($error) ?>

        </div>

    <?php endif; ?>


    <form method="POST">

        <div class="form-group">

            <label>
                Email
            </label>

            <input
                type="email"
                name="email"
                required
            >

        </div>


        <div class="form-group">

            <label>
                Password
            </label>

            <input
                type="password"
                name="password"
                required
            >

        </div>


        <button
            type="submit"
            class="btn btn-primary"
        >
            Login
        </button>

    </form>


    <p style="margin-top:20px;">

        Don't have an account?

        <a
            href="register.php"
            style="font-weight:bold;"
        >
            Register
        </a>

    </p>


    <p style="margin-top:15px;">

        <a href="../index.php">
            ← Back to Store
        </a>

    </p>

</div>

</body>

</html>