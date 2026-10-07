<?php

session_start();

require_once "../config/database.php";
require_once "../includes/functions.php";

if (isset($_SESSION["admin_id"])) {
    header("Location: dashboard.php");
    exit;
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";

    if ($email === "" || $password === "") {
        $error = "Please enter your email and password.";
    } else {
        $stmt = $conn->prepare(
            "SELECT id, name, email, password, status
             FROM admins
             WHERE email = ?
             LIMIT 1"
        );

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $admin = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        if (
            $admin
            && $admin["status"] === "active"
            && password_verify($password, $admin["password"])
        ) {
            session_regenerate_id(true);
            $_SESSION["admin_id"] = $admin["id"];
            $_SESSION["admin_name"] = $admin["name"];
            $_SESSION["admin_email"] = $admin["email"];

            header("Location: dashboard.php");
            exit;
        }

        $error = "Invalid admin email or password.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Elite Gadget Store</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<main class="admin-login-page">
    <section class="admin-login-card">
        <h1>Elite Gadget Store</h1>
        <p>Admin Panel Login</p>

        <?php if ($error): ?>
            <div class="alert alert-error"><?= e($error) ?></div>
        <?php endif; ?>

        <form method="POST">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" required autofocus>

            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>

            <button type="submit" class="admin-login-button">Login</button>
        </form>

        <a href="../index.php">Back to store</a>
    </section>
</main>

</body>
</html>