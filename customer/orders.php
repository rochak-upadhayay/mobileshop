<?php

require_once "../includes/auth.php";

$page_title =
    "My Orders - Elite Gadget Store";

require_once "../includes/header.php";


$customer_id =
    $_SESSION["customer_id"];


$stmt = $conn->prepare(
    "SELECT id,
            order_number,
            total_amount,
            payment_method,
            status,
            created_at
     FROM orders
     WHERE customer_id = ?
     ORDER BY created_at DESC"
);

$stmt->bind_param(
    "i",
    $customer_id
);

$stmt->execute();

$result =
    $stmt->get_result();

?>

<div class="section">

    <div class="section-title">

        <h2>
            My Orders
        </h2>

    </div>


    <?php if ($result->num_rows === 0): ?>

        <div class="form-container">

            <p>
                You have not placed any orders yet.
            </p>

            <br>

            <a
                href="../index.php"
                class="btn btn-primary"
            >
                Start Shopping
            </a>

        </div>

    <?php else: ?>

        <div style="overflow-x:auto;">

            <table
                style="
                width:100%;
                background:white;
                border-collapse:collapse;
                "
            >

                <thead>

                    <tr>

                        <th style="padding:15px;">
                            Order
                        </th>

                        <th style="padding:15px;">
                            Amount
                        </th>

                        <th style="padding:15px;">
                            Payment
                        </th>

                        <th style="padding:15px;">
                            Status
                        </th>

                        <th style="padding:15px;">
                            Date
                        </th>

                        <th style="padding:15px;">
                            Action
                        </th>

                    </tr>

                </thead>


                <tbody>

                <?php while (
                    $order =
                    $result->fetch_assoc()
                ): ?>

                    <tr>

                        <td style="padding:15px;">

                            <?= e(
                                $order["order_number"]
                            ) ?>

                        </td>


                        <td style="padding:15px;">

                            <?= format_price(
                                $order["total_amount"]
                            ) ?>

                        </td>


                        <td style="padding:15px;">

                            <?= e(
                                $order["payment_method"]
                            ) ?>

                        </td>


                        <td style="padding:15px;">

                            <?= e(
                                $order["status"]
                            ) ?>

                        </td>


                        <td style="padding:15px;">

                            <?= e(
                                $order["created_at"]
                            ) ?>

                        </td>


                        <td style="padding:15px;">

                            <a
                                href="order_details.php?id=<?= $order['id'] ?>"
                                class="btn btn-primary"
                            >
                                View
                            </a>

                        </td>

                    </tr>

                <?php endwhile; ?>

                </tbody>

            </table>

        </div>

    <?php endif; ?>

</div>

<?php require_once "../includes/footer.php"; ?>