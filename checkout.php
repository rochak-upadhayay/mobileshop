<?php

require_once "includes/auth.php";

$page_title =
    "Checkout - Elite Gadget Store";

require_once "includes/header.php";

?>

<section class="section">

    <div class="form-container">

        <h2>
            Checkout
        </h2>

        <br>

        <form
            action="place_order.php"
            method="POST"
        >

            <div class="form-group">

                <label>
                    Full Name
                </label>

                <input
                    type="text"
                    name="name"
                    required
                >

            </div>


            <div class="form-group">

                <label>
                    Phone Number
                </label>

                <input
                    type="text"
                    name="phone"
                    required
                >

            </div>


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
                    Delivery Address
                </label>

                <textarea
                    name="address"
                    required
                ></textarea>

            </div>


            <div class="form-group">

                <label>
                    City
                </label>

                <input
                    type="text"
                    name="city"
                    required
                >

            </div>


            <div class="form-group">

                <label>
                    Payment Method
                </label>

                <select
                    name="payment_method"
                    required
                >

                    <option value="Cash on Delivery">
                        Cash on Delivery
                    </option>

                </select>

            </div>


            <button
                type="submit"
                class="btn btn-primary"
            >
                Place Order
            </button>

        </form>

    </div>

</section>


<?php

require_once "includes/footer.php";

?>