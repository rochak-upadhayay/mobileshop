<?php

session_start();

$page_title =
    "Elite Gadget Store";

require_once "includes/header.php";

?>

<!-- HERO -->

<section class="hero">

    <div class="hero-content">

        <h1>
            Smart Gadgets.
            Better Life.
        </h1>

        <p>
            Discover the latest smartphones,
            accessories and smart gadgets
            at Elite Gadget Store.
        </p>

        <a
            href="categories.php"
            class="btn btn-primary"
        >
            Shop Now
        </a>

    </div>

</section>


<!-- CATEGORIES -->

<section class="section">

    <div class="section-title">

        <h2>
            Shop by Category
        </h2>

        <a href="categories.php">
            View All
        </a>

    </div>


    <div class="category-grid">

        <a
            href="category.php?name=Smartphones"
            class="category-card"
        >

            <div class="category-icon">
                <img src="assets/images/categories/smartphone.jpg" alt="Smartphones">
            </div>

            <strong>
                Smartphones
            </strong>

        </a>


        <a
            href="category.php?name=Accessories"
            class="category-card"
        >

            <div class="category-icon">
                <img src="assets/images/categories/accessories.jpg" alt="Accessories">
            </div>

            <strong>
                Accessories
            </strong>

        </a>


        <a
            href="category.php?name=Smartwatch"
            class="category-card"
        >

            <div class="category-icon">
                <img src="assets/images/categories/smartwatch.webp" alt="Smartwatch">
            </div>

            <strong>
                Smartwatch
            </strong>

        </a>


        <a
            href="category.php?name=Earbuds"
            class="category-card"
        >

            <div class="category-icon">
                🎵
            </div>

            <strong>
                Earbuds
            </strong>

        </a>


        <a
            href="category.php?name=Chargers"
            class="category-card"
        >

            <div class="category-icon">
                🔌
            </div>

            <strong>
                Chargers
            </strong>

        </a>


        <a
            href="category.php?name=Power Bank"
            class="category-card"
        >

            <div class="category-icon">
                🔋
            </div>

            <strong>
                Power Bank
            </strong>

        </a>

    </div>

</section>


<!-- FOR YOU -->

<section class="section">

    <div class="section-title">

        <h2>
            For You
        </h2>

    </div>


    <div class="product-grid">

        <div class="product-card">

            <img
                src="assets/images/products/iphone.jpg"
                class="product-image"
                alt="iPhone"
            >

            <div class="product-info">

                <div class="product-name">
                    iPhone
                </div>

                <div class="product-brand">
                    Elite Gadget
                </div>

                <div class="product-price">
                    Featured gadget
                </div>

            </div>

        </div>


        <div class="product-card">

            <img
                src="assets/images/products/AirPods.png"
                class="product-image"
                alt="AirPods"
            >

            <div class="product-info">

                <div class="product-name">
                    AirPods
                </div>

                <div class="product-brand">
                    Wireless audio
                </div>

                <div class="product-price">
                    Featured gadget
                </div>

            </div>

        </div>

    </div>

</section>


<!-- WHY CHOOSE US -->

<section class="section">

    <div class="section-title">

        <h2>
            Why Elite Gadget Store?
        </h2>

    </div>


    <div class="category-grid">

        <div class="category-card">

            <div class="category-icon">
                🚚
            </div>

            <strong>
                Fast Delivery
            </strong>

            <p>
                Convenient gadget delivery.
            </p>

        </div>


        <div class="category-card">

            <div class="category-icon">
                🔒
            </div>

            <strong>
                Secure Shopping
            </strong>

            <p>
                Your account is protected.
            </p>

        </div>


        <div class="category-card">

            <div class="category-icon">
                ⭐
            </div>

            <strong>
                Quality Products
            </strong>

            <p>
                Shop modern gadgets.
            </p>

        </div>


        <div class="category-card">

            <div class="category-icon">
                💬
            </div>

            <strong>
                Customer Reviews
            </strong>

            <p>
                Read genuine product reviews.
            </p>

        </div>

    </div>

</section>


<?php

require_once "includes/footer.php";

?>