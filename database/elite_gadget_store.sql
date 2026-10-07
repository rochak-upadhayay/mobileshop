CREATE DATABASE IF NOT EXISTS elite_gadget_store;

USE elite_gadget_store;


-- =====================================================
-- ADMINS
-- =====================================================

CREATE TABLE admins (

    id INT AUTO_INCREMENT PRIMARY KEY,

    name VARCHAR(100) NOT NULL,

    email VARCHAR(150) NOT NULL UNIQUE,

    password VARCHAR(255) NOT NULL,

    status ENUM('active','inactive')
        DEFAULT 'active',

    created_at TIMESTAMP
        DEFAULT CURRENT_TIMESTAMP

) ENGINE=InnoDB;


-- =====================================================
-- CUSTOMERS
-- =====================================================

CREATE TABLE customers (

    id INT AUTO_INCREMENT PRIMARY KEY,

    name VARCHAR(100) NOT NULL,

    email VARCHAR(150) NOT NULL UNIQUE,

    phone VARCHAR(30),

    password VARCHAR(255) NOT NULL,

    address TEXT,

    city VARCHAR(100),

    status ENUM('active','blocked')
        DEFAULT 'active',

    created_at TIMESTAMP
        DEFAULT CURRENT_TIMESTAMP,

    updated_at TIMESTAMP
        DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP

) ENGINE=InnoDB;


-- =====================================================
-- CATEGORIES
-- =====================================================

CREATE TABLE categories (

    id INT AUTO_INCREMENT PRIMARY KEY,

    name VARCHAR(100) NOT NULL UNIQUE,

    description TEXT,

    status ENUM('active','inactive')
        DEFAULT 'active',

    created_at TIMESTAMP
        DEFAULT CURRENT_TIMESTAMP

) ENGINE=InnoDB;


-- =====================================================
-- PRODUCTS
-- =====================================================

CREATE TABLE products (

    id INT AUTO_INCREMENT PRIMARY KEY,

    category_id INT NOT NULL,

    name VARCHAR(200) NOT NULL,

    brand VARCHAR(100),

    price DECIMAL(12,2) NOT NULL,

    discount_price DECIMAL(12,2),

    stock_quantity INT DEFAULT 0,

    image VARCHAR(255),

    short_description VARCHAR(500),

    description TEXT,

    specifications TEXT,

    status ENUM('active','inactive')
        DEFAULT 'active',

    created_at TIMESTAMP
        DEFAULT CURRENT_TIMESTAMP,

    updated_at TIMESTAMP
        DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_product_category

        FOREIGN KEY (category_id)

        REFERENCES categories(id)

        ON UPDATE CASCADE

        ON DELETE RESTRICT

) ENGINE=InnoDB;


-- =====================================================
-- CARTS
-- =====================================================

CREATE TABLE carts (

    id INT AUTO_INCREMENT PRIMARY KEY,

    customer_id INT NOT NULL UNIQUE,

    created_at TIMESTAMP
        DEFAULT CURRENT_TIMESTAMP,

    updated_at TIMESTAMP
        DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_cart_customer

        FOREIGN KEY (customer_id)

        REFERENCES customers(id)

        ON UPDATE CASCADE

        ON DELETE CASCADE

) ENGINE=InnoDB;


-- =====================================================
-- CART ITEMS
-- =====================================================

CREATE TABLE cart_items (

    id INT AUTO_INCREMENT PRIMARY KEY,

    cart_id INT NOT NULL,

    product_id INT NOT NULL,

    quantity INT NOT NULL DEFAULT 1,

    created_at TIMESTAMP
        DEFAULT CURRENT_TIMESTAMP,

    UNIQUE KEY unique_cart_product
        (cart_id, product_id),

    CONSTRAINT fk_cart_item_cart

        FOREIGN KEY (cart_id)

        REFERENCES carts(id)

        ON UPDATE CASCADE

        ON DELETE CASCADE,

    CONSTRAINT fk_cart_item_product

        FOREIGN KEY (product_id)

        REFERENCES products(id)

        ON UPDATE CASCADE

        ON DELETE CASCADE

) ENGINE=InnoDB;


-- =====================================================
-- ORDERS
-- =====================================================

CREATE TABLE orders (

    id INT AUTO_INCREMENT PRIMARY KEY,

    customer_id INT NOT NULL,

    order_number VARCHAR(50) NOT NULL UNIQUE,

    total_amount DECIMAL(12,2) NOT NULL,

    payment_method VARCHAR(50)
        DEFAULT 'Cash on Delivery',

    status ENUM(
        'Pending',
        'Confirmed',
        'Processing',
        'Shipped',
        'Delivered',
        'Cancelled'
    ) DEFAULT 'Pending',

    delivery_name VARCHAR(100) NOT NULL,

    delivery_phone VARCHAR(30) NOT NULL,

    delivery_email VARCHAR(150) NOT NULL,

    delivery_address TEXT NOT NULL,

    delivery_city VARCHAR(100) NOT NULL,

    created_at TIMESTAMP
        DEFAULT CURRENT_TIMESTAMP,

    updated_at TIMESTAMP
        DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_order_customer

        FOREIGN KEY (customer_id)

        REFERENCES customers(id)

        ON UPDATE CASCADE

        ON DELETE RESTRICT

) ENGINE=InnoDB;


-- =====================================================
-- ORDER ITEMS
-- =====================================================

CREATE TABLE order_items (

    id INT AUTO_INCREMENT PRIMARY KEY,

    order_id INT NOT NULL,

    product_id INT NOT NULL,

    product_name VARCHAR(200) NOT NULL,

    price DECIMAL(12,2) NOT NULL,

    quantity INT NOT NULL,

    subtotal DECIMAL(12,2) NOT NULL,

    CONSTRAINT fk_order_item_order

        FOREIGN KEY (order_id)

        REFERENCES orders(id)

        ON UPDATE CASCADE

        ON DELETE CASCADE,

    CONSTRAINT fk_order_item_product

        FOREIGN KEY (product_id)

        REFERENCES products(id)

        ON UPDATE CASCADE

        ON DELETE RESTRICT

) ENGINE=InnoDB;


-- =====================================================
-- TRANSACTIONS
-- =====================================================

CREATE TABLE transactions (

    id INT AUTO_INCREMENT PRIMARY KEY,

    order_id INT NOT NULL,

    transaction_number VARCHAR(100)
        NOT NULL UNIQUE,

    amount DECIMAL(12,2) NOT NULL,

    payment_method VARCHAR(50)
        NOT NULL,

    payment_status ENUM(
        'Pending',
        'Paid',
        'Failed',
        'Refunded'
    ) DEFAULT 'Pending',

    created_at TIMESTAMP
        DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_transaction_order

        FOREIGN KEY (order_id)

        REFERENCES orders(id)

        ON UPDATE CASCADE

        ON DELETE CASCADE

) ENGINE=InnoDB;


-- =====================================================
-- REVIEWS
-- =====================================================

CREATE TABLE reviews (

    id INT AUTO_INCREMENT PRIMARY KEY,

    customer_id INT NOT NULL,

    product_id INT NOT NULL,

    order_id INT NOT NULL,

    rating TINYINT NOT NULL,

    review TEXT NOT NULL,

    status ENUM(
        'visible',
        'hidden'
    ) DEFAULT 'visible',

    created_at TIMESTAMP
        DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT chk_rating

        CHECK (rating BETWEEN 1 AND 5),

    CONSTRAINT fk_review_customer

        FOREIGN KEY (customer_id)

        REFERENCES customers(id)

        ON UPDATE CASCADE

        ON DELETE CASCADE,

    CONSTRAINT fk_review_product

        FOREIGN KEY (product_id)

        REFERENCES products(id)

        ON UPDATE CASCADE

        ON DELETE CASCADE,

    CONSTRAINT fk_review_order

        FOREIGN KEY (order_id)

        REFERENCES orders(id)

        ON UPDATE CASCADE

        ON DELETE CASCADE

) ENGINE=InnoDB;