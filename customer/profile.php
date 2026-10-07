<?php

require_once "../includes/auth.php";

$page_title =
    "My Profile - Elite Gadget Store";

require_once "../includes/header.php";


$customer_id =
    $_SESSION["customer_id"];


$stmt = $conn->prepare(
    "SELECT name,
            email,
            phone,
            address,
            city
     FROM customers
     WHERE id = ?
     LIMIT 1"
);

$stmt->bind_param(
    "i",
    $customer_id
);

$stmt->execute();

$result =
    $stmt->get_result();

$customer =
    $result->fetch_assoc();

?>

<div class="section">

    <div class="form-container">

        <h2>
            My Profile
        </h2>

        <br>


        <div class="form-group">

            <label>
                Name
            </label>

            <input
                type="text"
                value="<?= e($customer['name']) ?>"
                readonly
            >

        </div>


        <div class="form-group">

            <label>
                Email
            </label>

            <input
                type="email"
                value="<?= e($customer['email']) ?>"
                readonly
            >

        </div>


        <div class="form-group">

            <label>
                Phone
            </label>

            <input
                type="text"
                value="<?= e($customer['phone']) ?>"
                readonly
            >

        </div>


        <div class="form-group">

            <label>
                Address
            </label>

            <textarea readonly><?= e(
                $customer["address"]
            ) ?></textarea>

        </div>


        <div class="form-group">

            <label>
                City
            </label>

            <input
                type="text"
                value="<?= e($customer['city']) ?>"
                readonly
            >

        </div>

    </div>

</div>

<?php require_once "../includes/footer.php"; ?>