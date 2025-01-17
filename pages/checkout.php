<?php
session_start();
include '../utils/db.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ensure user is logged in
    $user_id = $_SESSION['user_id'] ?? null;
    $cart_id = null; // ✅ Initialize cart_id to prevent errors
    if (!$user_id) {
        die("User not logged in.");
    }

    // Validate form inputs
    $shipping_address = trim($_POST['shipping_address'] ?? '');

    $billing_address = trim($_POST['billing_address'] ?? '');
    $payment_method = trim($_POST['payment_method'] ?? '');

    if (empty($shipping_address) || empty($billing_address) || empty($payment_method)) {
        die("All fields are required.");
    }


    // Get cart items from session
    $cart_items = $_SESSION['cart_items'] ?? [];
    if (empty($cart_items)) {
        die("Cart is empty.");
    }

    // Calculate total amount
    $total_amount = array_sum(array_column($cart_items, 'Total_Price'));

    // Set order status (Pending)
    $order_status = "Pending";
    $delivery_fee = 500; // Modify as needed



    // Get CartID for the user
    // $cart_query = "SELECT CartID FROM Cart WHERE User_ID = ?";
    // $stmt = $conn->prepare($cart_query);
    // $stmt->bind_param("i", $user_id);
    // $stmt->execute();
    // $result = $stmt->get_result();
    // $cart_row = $result->fetch_assoc();

    // if (!$cart_row) {
    //     die("Error: No active cart found for this user.");
    // }


    $cart_id = $cart_row['CartID']; // Assign the correct CartID

    // Retrieve CartID for the user
    $cart_query = "SELECT CartID FROM Cart WHERE User_ID = ?";
    $stmt = $conn->prepare($cart_query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $cart_result = $stmt->get_result();
    $cart_row = $cart_result->fetch_assoc();

    if (!$cart_row) {
        die("Error: No active cart found for this user.");
    }

    $cart_id = $cart_row['CartID']; // Correct CartID assignment

    // Ensure Cart is not empty
    $cart_items_query = "SELECT * FROM Cart_Item WHERE CartID = ?";
    $stmt = $conn->prepare($cart_items_query);
    $stmt->bind_param("i", $cart_id);
    $stmt->execute();
    $cart_items_result = $stmt->get_result();

    if ($cart_items_result->num_rows === 0) {
        die("Error: No items in the cart. Please add items before checking out.");
    }

    // Calculate Total Amount
    $total_amount = 0;
    $cart_items = [];
    while ($row = $cart_items_result->fetch_assoc()) {
        $cart_items[] = $row;
        $total_amount += $row['Total_Price'];
    }

    // Insert Order
    $order_status = "Pending";
    $delivery_fee = 500; // Set delivery fee if applicable
    $order_query = "INSERT INTO `Order` (User_ID, CartID, TotalAmount, Status, ShippingAddress, OrderDate, Delivery_Fee) 
                VALUES (?, ?, ?, ?, ?, NOW(), ?)";
    $stmt = $conn->prepare($order_query);
    $stmt->bind_param("iidssi", $user_id, $cart_id, $total_amount, $order_status, $shipping_address, $delivery_fee);
    $stmt->execute();
    $order_id = $stmt->insert_id; // Retrieve the newly created Order_ID

    // Insert Order Items
    $order_item_query = "INSERT INTO Order_Item (Order_ID, Product_ID, Quantity, Total) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($order_item_query);
    foreach ($cart_items as $item) {
        $stmt->bind_param("iiid", $order_id, $item['ProductID'], $item['Quantity'], $item['Price']);
        $stmt->execute();
    }

    // Insert Payment Details
    $payment_status = "Pending";
    $payment_query = "INSERT INTO Payment (Order_ID, PaymentDate, BillingAddress, PaymentMethod, Status) 
                  VALUES (?, NOW(), ?, ?, ?)";
    $stmt = $conn->prepare($payment_query);
    $stmt->bind_param("isss", $order_id, $billing_address, $payment_method, $payment_status);
    $stmt->execute();


    // Clear the user's cart
    $clear_cart_query = "DELETE FROM Cart_Item WHERE CartID = ?";
    $stmt = $conn->prepare($clear_cart_query);
    $stmt->bind_param("i", $cart_id);
    $stmt->execute();

    // Redirect to confirmation page
    header("Location: userdashboard.php");
    exit();









    $order_id = $_GET['order_id'] ?? null;

    if (!$order_id) {
        die("Invalid order.");
    }

    // Fetch order details
    $order_query = "SELECT * FROM `Order` WHERE Order_ID = ?";
    $stmt = $conn->prepare($order_query);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $order_result = $stmt->get_result();
    $order = $order_result->fetch_assoc();

    if (!$order) {
        die("Order not found.");
    }

    // Fetch order items
    $order_items_query = "
    SELECT Product.Name, Product.Thumbnail_IMG, Order_Item.Quantity, Order_Item.Product_Price 
    FROM Order_Item
    JOIN Product ON Order_Item.Product_ID = Product.ProductID
    WHERE Order_Item.Order_ID = ?";
    $stmt = $conn->prepare($order_items_query);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $order_items_result = $stmt->get_result();
}
// Retrieve cart items from session
$cart_items = $_SESSION['cart_items'] ?? [];

$subtotal = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <header class="bg-gray-200 p-4 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <input type="text" placeholder="Search" class="border border-gray-400 p-2 rounded">
            <h1 class="text-xl font-bold">DOPE DIECAST</h1>
        </div>
        <nav class="flex space-x-6">
            <a href="./index.php" class="text-gray-600 hover:underline">HOME</a>
            <a href="./pages/userdashboard.php" class="text-gray-600 hover:underline">ACCOUNT</a>
            <a href="#" class="hover:text-blue-500">ABOUT</a>
            <a href="#" class="hover:text-blue-500">CONTACT</a>
            <a href="./loginregister.php">
                <button class="bg-black text-white px-4 py-2 rounded">Logout</button>
            </a>
        </nav>
        <div class="flex space-x-4 items-center">
            <button class="relative">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18M3 8h18M3 13h18M3 18h18" />
                </svg>
            </button>
            <button>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18M3 8h18M3 13h18M3 18h18" />
                </svg>
            </button>
        </div>
    </header>

    <main class="max-w-5xl mx-auto p-6">
        <form action="" method="post">
            <!-- Shipping Address -->
            <div class="mb-6">
                <label class="block font-bold mb-2">Shipping Address</label>
                <input type="text" name="shipping_address" required class="w-full border border-gray-300 p-2 rounded">
            </div>

            <!-- Billing Address -->
            <div class="mb-6">
                <label class="block font-bold mb-2">Billing Address</label>
                <input type="text" name="billing_address" required class="w-full border border-gray-300 p-2 rounded">
            </div>

            <!-- Payment Methods -->
            <h3 class="font-bold mb-2">Payment Method</h3>
            <div class="space-y-4">
                <div class="border border-gray-300 p-4 rounded">
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="payment_method" value="Credit/Debit Card" required class="w-5 h-5">
                        <span>Credit/Debit Card</span>
                    </label>
                    <div class="mt-4 space-y-4">
                        <input type="text" name="card_number" placeholder="Card Number" class="w-full border border-gray-300 p-2 rounded">
                        <div class="grid grid-cols-2 gap-4">
                            <input type="text" name="exp_date" placeholder="Expiration Date" class="border border-gray-300 p-2 rounded">
                            <input type="text" name="cvv" placeholder="Security Code" class="border border-gray-300 p-2 rounded">
                        </div>
                        <input type="text" name="card_name" placeholder="Name on Card" class="w-full border border-gray-300 p-2 rounded">
                    </div>
                </div>
                <div class="border border-gray-300 p-4 rounded">
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="payment_method" value="COD" required class="w-5 h-5">
                        <span>COD</span>
                    </label>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="mt-6 w-full bg-blue-500 text-white p-3 rounded font-bold">
                Pay Now
            </button>
        </form>


        <!-- Order Summary -->
        <div>
            <h3 class="text-xl font-bold mb-4">Your Order</h3>
            <div class="space-y-4">
                <?php foreach ($cart_items as $item):
                    $subtotal += $item['Total_Price'];
                ?>
                    <div class="flex items-center border border-gray-300 p-4 rounded">
                        <img src="<?php echo htmlspecialchars($item['Thumbnail_IMG']); ?>" alt="Product" class="w-20 h-20 mr-4">
                        <div class="flex-grow">
                            <p><?php echo htmlspecialchars($item['Name']); ?></p>
                            <p class="text-sm text-gray-500">Quantity: <?php echo $item['Quantity']; ?></p>
                        </div>
                        <p class="font-bold">Rs. <?php echo number_format($item['Total_Price'], 2); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="mt-4 border-t border-gray-300 pt-4">
                <p class="flex justify-between font-bold">Subtotal <span>Rs. <?php echo number_format($subtotal, 2); ?></span></p>
            </div>
    </main>

    <footer class="bg-gray-200 p-6 mt-8">
        <div class="max-w-5xl mx-auto flex justify-between items-center">
            <div class="flex space-x-4">
                <p>© 2025 Dope Diecast</p>
                <a href="#" class="hover:underline">Terms</a>
                <a href="#" class="hover:underline">Privacy</a>
            </div>
            <div class="flex space-x-4">
                <a href="#" class="hover:underline">Facebook</a>
                <a href="#" class="hover:underline">Instagram</a>
                <a href="#" class="hover:underline">Twitter</a>
            </div>
        </div>
    </footer>
</body>

</html>