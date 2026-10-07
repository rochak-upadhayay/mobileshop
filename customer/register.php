<?php

session_start();

require_once "../config/database.php";
require_once "../includes/functions.php";

$error = "";
$success = "";


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name =
        trim($_POST["name"] ?? "");

    $email =
        trim($_POST["email"] ?? "");

    $phone =
        trim($_POST["phone"] ?? "");

    $password =
        $_POST["password"] ?? "";

    $confirm_password =
        $_POST["confirm_password"] ?? "";


    if (
        empty($name) ||
        empty($email) ||
        empty($password)
    ) {

        $error =
            "Please fill all required fields.";

    } elseif (!filter_var(
        $email,
        FILTER_VALIDATE_EMAIL
    )) {

        $error =
            "Please enter a valid email.";

    } elseif (
        strlen($password) < 6
    ) {

        $error =
            "Password must contain at least 6 characters.";

    } elseif (
        $password !== $confirm_password
    ) {

        $error =
            "Passwords do not match.";

    } else {

        /*
        |--------------------------------------------------------------------------
        | Check Existing Email
        |--------------------------------------------------------------------------
        */

        $stmt = $conn->prepare(
            "SELECT id
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


        if ($result->num_rows > 0) {

            $error =
                "An account with this email already exists.";

        } else {

            /*
            |--------------------------------------------------------------------------
            | Hash Password
            |--------------------------------------------------------------------------
            */

            $hashed_password =
                password_hash(
                    $password,
                    PASSWORD_DEFAULT
                );


            /*
            |--------------------------------------------------------------------------
            | Insert Customer
            |--------------------------------------------------------------------------
            */

            $stmt =
                $conn->prepare(
                    "INSERT INTO customers
                    (name, email, phone, password, status)
                    VALUES (?, ?, ?, ?, 'active')"
                );

            $stmt->bind_param(
                "ssss",
                $name,
                $email,
                $phone,
                $hashed_password
            );


            if ($stmt->execute()) {

                $success =
                    "Registration successful. You can now login.";

            } else {

                $error =
                    "Registration failed. Please try again.";

            }

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

    <title>Register - Elite Gadget Store</title>

    <link
        rel="stylesheet"
        href="../assets/css/style.css"
    >

</head>

<body>

<div class="form-container">

    <h2>
        Create Account
    </h2>

    <p>
        Join Elite Gadget Store.
    </p>


    <?php if ($error): ?>

        <div class="alert alert-error">

            <?= e($error) ?>

        </div>

    <?php endif; ?>


    <?php if ($success): ?>

        <div class="alert alert-success">

            <?= e($success) ?>

        </div>

    <?php endif; ?>


    <form method="POST">

        <div class="form-group">

            <label>
                Full Name *
            </label>

            <input
                type="text"
                name="name"
                required
            >

        </div>


        <div class="form-group">

            <label>
                Email *
            </label>

            <input
                type="email"
                name="email"
                required
            >

        </div>


        <div class="form-group">

            <label>
                Phone
            </label>

            <input
                type="text"
                name="phone"
            >

        </div>


        <div class="form-group">

            <label>
                Password *
            </label>

            <input
                type="password"
                name="password"
                required
            >

        </div>


        <div class="form-group">

            <label>
                Confirm Password *
            </label>

            <input
                type="password"
                name="confirm_password"
                required
            >

        </div>


        <button
            type="submit"
            class="btn btn-primary"
        >
            Create Account
        </button>

    </form>


    <p style="margin-top:20px;">

        Already have an account?

        <a
            href="login.php"
            style="font-weight:bold;"
        >
            Login
        </a>

    </p>

</div>

</body>

</html>