<?php
// Initialize session variables to store basket items
session_start();
if (!isset($_SESSION['basket'])) {
    $_SESSION['basket'] = [];
}

// Fetch product details from a database
function getProductDetails($productId) {
    // This function would typically query the database based on $productId
    // and return details such as name, price, image, etc.
    // For demonstration purposes, we'll return hardcoded values.
    $products = [
        1 => ["name" => "Clifton", "price" => 9.99],
        2 => ["name" => "Fishponds", "price" => 9.99],
        // Add more products as needed
    ];
    return $products[$productId];
}

// Add item to the basket
function addToBasket($productId, $quantity) {
    $productDetails = getProductDetails($productId);
    $item = [
        "id" => $productId,
        "name" => $productDetails["name"],
        "price" => $productDetails["price"],
        "quantity" => $quantity
    ];
    $_SESSION['basket'][] = $item;
}

// Remove item from the basket
function removeFromBasket($index) {
    unset($_SESSION['basket'][$index]);
}

// Calculate total price of items in the basket
function calculateTotalPrice() {
    $total = 0;
    foreach ($_SESSION['basket'] as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}

// Handle AJAX requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['action'] === 'add') {
        addToBasket($_POST['productId'], $_POST['quantity']);
    } elseif ($_POST['action'] === 'remove') {
        removeFromBasket($_POST['index']);
    }
    // Return updated basket content
    echo json_encode($_SESSION['basket']);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- Include CSS and JavaScript files -->
</head>
<body>
    <!-- Display products with "Add to Basket" buttons -->
    <?php foreach ($products as $productId => $product) { ?>
        <div class="product">
            <h2><?php echo $product["name"]; ?></h2>
            <p>Price: <?php echo $product["price"]; ?></p>
            <input type="number" min="1" value="1" class="quantity">
            <button class="add-to-basket" data-product-id="<?php echo $productId; ?>">Add to Basket</button>
        </div>
    <?php } ?>

    <!-- Basket display -->
    <div id="basket">
        <!-- Basket content will be loaded dynamically via JavaScript -->
    </div>

    <!-- Include JavaScript file for handling AJAX requests -->
    <script src="script.js"></script>
</body>
</html>
