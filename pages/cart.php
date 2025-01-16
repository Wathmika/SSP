<?php
session_start();
include '../utils/db.php';

// Assume a logged-in user (Replace with session ID when implementing authentication)
$user_id = 1; // Change to $_SESSION['user_id'] when authentication is implemented

// Fetch cart items
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

// Handle item removal
if (isset($_GET['remove'])) {
    $cart_item_id = intval($_GET['remove']);
    $delete_query = "DELETE FROM Cart_Item WHERE CartItemID = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $cart_item_id);
    $stmt->execute();
    header("Location: cart.php");
    exit();
}

// Handle clearing cart
if (isset($_GET['clear_cart'])) {
    $clear_query = "DELETE FROM Cart_Item WHERE CartID IN (SELECT CartID FROM Cart WHERE User_ID = ?)";
    $stmt = $conn->prepare($clear_query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    header("Location: cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
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
            <div class="flex items-center space-x-4">
                <button class="text-gray-600 hover:text-black"><i class="fas fa-search"></i></button>
                <button class="text-gray-600 hover:text-black"><i class="fas fa-shopping-cart"></i></button>
                <button class="text-gray-600 hover:text-black"><i class="fas fa-user"></i></button>
            </div>
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
                            <img src="images/<?= htmlspecialchars($row['Thumbnail_IMG']) ?>" alt="<?= htmlspecialchars($row['Name']) ?> Image" class="w-20 h-20 rounded-lg">
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

        <!-- Summary Section -->
        <div class="bg-white shadow-md rounded-lg p-6 mt-6 w-full lg:w-1/3 ml-auto">
            <div class="flex justify-between mb-4">
                <span class="text-gray-600">Subtotal</span>
                <span class="font-semibold">Rs. <?= number_format($total_price, 2) ?></span>
            </div>
            <div class="flex justify-between mb-4">
                <span class="text-gray-600">Shipping</span>
                <span class="font-semibold">Free</span>
            </div>
            <div class="flex justify-between mb-4">
                <span class="text-gray-600">Total</span>
                <span class="font-semibold">Rs. <?= number_format($total_price, 2) ?></span>
            </div>
            <button class="w-full bg-black text-white py-2 rounded-lg hover:bg-gray-800">
                Proceed To Checkout
            </button>
        </div>
        <?php else: ?>
            <p class="text-gray-600 text-center mt-6">Your cart is empty.</p>
        <?php endif; ?>
    </main>

    <!-- Footer -->
    <footer class="bg-white py-4 text-center text-gray-500 text-sm">
        &copy; 2025 Dope Diecast. All rights reserved.
    </footer>

</body>
</html>
