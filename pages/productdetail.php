<?php
session_start();
// Include the database connection
include '../utils/db.php';

// Validate Product ID
if (!isset($_GET['product_id']) || empty($_GET['product_id']) || !is_numeric($_GET['product_id'])) {
    die("<p class='text-red-500'>Invalid product request.</p>");
}
$productID = intval($_GET['product_id']);

// Fetch product details
$stmt = $conn->prepare("SELECT * FROM Product WHERE ProductID = ?");
$stmt->bind_param("i", $productID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
} else {
    die("<p class='text-red-500'>Product not found!</p>");
}

// Set default image if none exists
$thumbnail = !empty($product['Thumbnail_IMG']) ? $product['Thumbnail_IMG'] : 'default-image.jpg';

// Format prices
$price = number_format($product['Price'], 2);
$discountPrice = (!empty($product['Discount_Price']) && $product['Discount_Price'] > 0) 
    ? number_format($product['Discount_Price'], 2) 
    : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['Name']); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="text-xl font-bold">DOPE DIECAST</div>
            <nav class="flex space-x-4">
                <a href="./index.php" class="text-gray-600 hover:underline">HOME</a>
                <a href="./pages/userdashboard.php" class="text-gray-600 hover:underline">ACCOUNT</a>
                <a href="#" class="text-gray-600 hover:text-black">ABOUT</a>
                <a href="#" class="text-gray-600 hover:text-black">CONTACT</a>
            </nav>
        </div>
    </header>

    <!-- Product Detail Section -->
    <main class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-semibold mb-6"><?php echo htmlspecialchars($product['Name']); ?></h1>
        <div class="flex flex-col lg:flex-row items-start lg:space-x-10">
            <!-- Product Image -->
            <div class="w-full lg:w-1/2 bg-white p-4 rounded-lg shadow-md">
                <img src="<?php echo htmlspecialchars($product['Thumbnail_IMG']); ?>" alt="Product Image" class="w-full rounded-lg mb-4">
            </div>

            <!-- Product Details -->
            <div class="w-full lg:w-1/2 bg-white p-6 rounded-lg shadow-md">
                <p class="text-lg text-gray-700 font-semibold mb-4">
                    <?php echo "Rs. " . number_format($product['Price'], 2); ?>
                </p>

                <!-- Quantity Selector -->
                <div class="flex items-center space-x-4 mb-6">
                    <div class="flex items-center space-x-2 border border-gray-300 p-2 rounded-lg">
                        <button class="px-2 text-gray-600">-</button>
                        <span>1</span>
                        <button class="px-2 text-gray-600">+</button>
                    </div>
                    <form action="/SSP/pages/cart.php" method="POST">
                        <input type="hidden" name="product_id" value="<?= $product['ProductID'] ?>">
                        <input type="hidden" name="price" value="<?= $product['Price'] ?>">
                        <button type="submit" class="mt-2 bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">
                            Add to Cart
                        </button>
                    </form>
                </div>

                <!-- <button class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-700">
                    Buy Now
                </button> -->
            </div>
        </div>

        <!-- Product Description -->
        <div class="bg-white p-6 mt-8 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold mb-4">Description</h3>
            <p class="text-gray-700">
                <?php echo htmlspecialchars($product['Description']); ?>
            </p>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white py-4 text-center text-gray-500 text-sm">
        &copy; 2025 Dope Diecast. All rights reserved.
    </footer>

</body>
</html>
