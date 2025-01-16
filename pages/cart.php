<?php
session_start();
include '../utils/db.php';

// Assume a logged-in user (Replace with session ID when implementing authentication)
$user_id = 1; // Change to $_SESSION['user_id'] when authentication is implemented

// Handle adding item to cart
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']);
    $price = floatval($_POST['price']);

// Step 1: Check if user has a cart
$cart_query = "SELECT CartID FROM cart WHERE User_ID = ?";
$stmt = $conn->prepare($cart_query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$cart_result = $stmt->get_result();

if ($cart_result->num_rows > 0) {
    $cart_row = $cart_result->fetch_assoc();
    $cart_id = $cart_row['CartID'];
} else {
    // Step 2: Create new cart if none exists
    $create_cart_query = "INSERT INTO cart (User_ID) VALUES (?)";
    $stmt = $conn->prepare($create_cart_query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $cart_id = $stmt->insert_id;
}

// Step 3: Check if product is already in cart
$cart_item_query = "SELECT Quantity FROM Cart_Item WHERE CartID = ? AND ProductID = ?";
$stmt = $conn->prepare($cart_item_query);
$stmt->bind_param("ii", $cart_id, $product_id);
$stmt->execute();
$cart_item_result = $stmt->get_result();

if ($cart_item_result->num_rows > 0) {
    // Step 4: Update quantity and total price if item exists
    $cart_item_row = $cart_item_result->fetch_assoc();
    $new_quantity = $cart_item_row['Quantity'] + 1;
    $total_price = $new_quantity * $price;

    $update_query = "UPDATE Cart_Item SET Quantity = ?, Total_Price = ? WHERE CartID = ? AND ProductID = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("idii", $new_quantity, $total_price, $cart_id, $product_id);
    $stmt->execute();
} else {
    // Step 5: Insert new product into Cart_Item if not exists
    $insert_query = "INSERT INTO Cart_Item (CartID, ProductID, Quantity, Price, Total_Price) VALUES (?, ?, 1, ?, ?)";
    $stmt = $conn->prepare($insert_query);
    $total_price = $price;
    $stmt->bind_param("iidd", $cart_id, $product_id, $price, $total_price);
    $stmt->execute();
}

// Redirect back to Cart page to refresh items
header("Location: cart.php");
exit();
}

// Fetch cart items for display
$cart_items_query = "
SELECT Cart_Item.CartItemID, Product.Name, Product.Thumbnail_IMG, Cart_Item.Quantity, Cart_Item.Price, Cart_Item.Total_Price
FROM Cart_Item
JOIN Product ON Cart_Item.ProductID = Product.ProductID
JOIN Cart ON Cart.CartID = Cart_Item.CartID
WHERE Cart.User_ID = ?";
$stmt = $conn->prepare($cart_items_query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$cart_items_result = $stmt->get_result();

// Calculate total price
$total_price_query = "
SELECT SUM(Total_Price) AS total
FROM Cart_Item
JOIN Cart ON Cart.CartID = Cart_Item.CartID
WHERE Cart.User_ID = ?";
$stmt = $conn->prepare($total_price_query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$total_price_result = $stmt->get_result();
$total_price_row = $total_price_result->fetch_assoc();
$total_price = $total_price_row['total'] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cart Page</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

<!-- Header -->
<header class="bg-white shadow-sm">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <div class="text-xl font-bold">DOPE DIECAST</div>
        <nav class="flex space-x-4">
            <a href="#" class="text-gray-600 hover:text-black">HOME</a>
            <a href="#" class="text-gray-600 hover:text-black">SHOP</a>
            <a href="#" class="text-gray-600 hover:text-black">ABOUT</a>
            <a href="#" class="text-gray-600 hover:text-black">CONTACT</a>
        </nav>
    </div>
</header>

<!-- Cart Section -->
<main class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-semibold mb-4">Your Cart</h1>
    <a href="cart.php?clear_cart=true" class="text-red-500 text-sm flex items-center mb-4">
        <i class="fas fa-trash-alt mr-2"></i> Clear Cart
    </a>

    <?php if ($cart_items_result->num_rows > 0): ?>
    <!-- Cart Table -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-6 py-3">Product</th>
                    <th class="px-6 py-3">Unit Price</th>
                    <th class="px-6 py-3">Quantity</th>
                    <th class="px-6 py-3">Subtotal</th>
                    <th class="px-6 py-3">Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $cart_items_result->fetch_assoc()): ?>
                <tr class="border-b">
                    <td class="px-6 py-4 flex items-center space-x-4">
                        <img src="images/<?= htmlspecialchars($row['Thumbnail_IMG']) ?>" alt="<?= htmlspecialchars($row['Name']) ?>" class="w-20 h-20 rounded-lg">
                        <span><?= htmlspecialchars($row['Name']) ?></span>
                    </td>
                    <td class="px-6 py-4">Rs. <?= number_format($row['Price'], 2) ?></td>
                    <td class="px-6 py-4"><?= $row['Quantity'] ?></td>
                    <td class="px-6 py-4">Rs. <?= number_format($row['Total_Price'], 2) ?></td>
                    <td class="px-6 py-4 text-red-500">
                        <a href="cart.php?remove=<?= $row['CartItemID'] ?>" class="cursor-pointer"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
        <p class="text-gray-600 text-center mt-6">Your cart is empty.</p>
    <?php endif; ?>
</main>
</body>
</html>
