<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylee.css" />
    <title>Your Basket</title>
    <script src="script.js" async></script>
</head>
<body>
    <nav>
        <div class="nav_items">
            <div class="left-links">
                <a href="index.html" class="logo">Bristol Candles</a>
            </div>
            
            <div class="right-links">
                <a href="shop.html">Shop</a>
                <a href="about.html">About</a>
                <a href="basket.html">Basket</a>
                <a href="checkout.html">Checkout</a>
            </div>
        </div>
    </nav>

    <header>
        <h1>Shopping Cart</h1>
    </header>
    
    <section class="container content-section">
        <h2 class="section-header">Basket</h2>
        <div class="basket-row">
            <span class="basket-item basket-header basket-column">ITEM</span>
            <span class="basket-price basket-header basket-column">PRICE</span>
            <span class="basket-quantity basket-header basket-column">QUANTITY</span>
        </div>
        <div class="basket-items">
            <?php
            // Sample basket items (Replace this with PHP code to fetch items from a database or session)
            $basket_items = [
                ['name' => 'Sample', 'price' => '£10.99', 'quantity' => 1],
                ['name' => 'Clifton', 'price' => '£9.99', 'quantity' => 2]
            ];

            // Display basket items
            foreach ($basket_items as $item) {
                echo '<div class="basket-row">';
                echo '<div class="basket-item basket-column">';
                echo '<img class="basket-item-image" src="produ.jpg" width="100" height="100">';
                echo '<span class="basket-item-title">' . $item['name'] . '</span>';
                echo '</div>';
                echo '<span class="basket-price basket-column">' . $item['price'] . '</span>';
                echo '<div class="basket-quantity basket-column">';
                echo '<input class="basket-quantity-input" type="number" value="' . $item['quantity'] . '">';
                echo '<button class="btn btn-danger" type="button">Remove</button>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
        <div class="basket-total">
            <strong class="basket-total-title">Total</strong>
            <span class="basket-total-price">30.97</span>
        </div>
        <button class="btn btn-primary btn-purchase" type="button" onclick="window.location.href='checkout.html'">Purchase</button>

    </section>

    <!-- Email section -->
    <section class="subscribe-section">
        <div class="subscribe-container">
            <h3>Subscribe to our Newsletter</h3>
            <p>Stay updated with our latest products and offers by subscribing to our newsletter.</p>
            <form id="subscribe-form">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Your email address" required>
                <button type="submit">Subscribe</button>
            </form>
        </div>
    </section>

    <!--Footer Section-->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-logo">
                <a href="index.html" class="logo">Bristol Candles</a>
            </div>
            <div class="footer-links">
                <a href="shop.html">Shop</a>
                <a href="about.html">About</a>
                <a href="basket.html" class="active">Basket</a>
                <a href="checkout.html">Checkout</a>
            </div>
            <div class="footer-social">
                <!--Social media icons or links here -->
                <a href="#" target="_blank">Facebook</a>
                <a href="#" target="_blank">Twitter</a>
                <a href="#" target="_blank">Instagram</a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Bristol Candles. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
