<?php
// Include database connection
include '../utils/db.php';

// Get the category from the URL
$category = isset($_GET['Category']) ? $_GET['Category'] : "";

// Validate the category input to prevent invalid categories
// $validCategories = ['Premium', 'Hot Wheels', 'Diorama', 'Accessories'];
// if (!$category || !in_array($category, $validCategories)) {
//     echo "<p class='text-gray-600 text-center mt-6'>Invalid or no category selected.</p>";
//     exit;
// }

// Prepare the SQL query to fetch products for the selected category
$query = "SELECT * FROM product WHERE Category = '" . $conn->real_escape_string($category) . "'";
$result = $conn->query($query);

// Check for query errors
if (!$result) {
    die("Error fetching products: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($category) ?> Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <!-- Header -->
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">DOPE DIECAST</h1>
        <nav class="space-x-4">
            <a href="index.php" class="text-gray-600 hover:underline">Home</a>
            <a href="shop.php" class="text-gray-600 hover:underline">Shop</a>
            <a href="about.php" class="text-gray-600 hover:underline">About</a>
            <a href="contact.php" class="text-gray-600 hover:underline">Contact</a>
        </nav>
    </header>

    <!-- Products Section -->
    <main class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-semibold mb-6"><?= htmlspecialchars($category) ?> Products</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                <div class="bg-white shadow-md rounded-lg p-4">
                    <!-- Product Image -->
                    <img src="images/<?= htmlspecialchars($row['Thumbnail_IMG']) ?>" 
                         alt="<?= htmlspecialchars($row['Name']) ?>" 
                         class="w-full h-40 object-cover mb-4 rounded-lg">
                    <!-- Product Name -->
                    <h3 class="text-md font-semibold mb-2"><?= htmlspecialchars($row['Name']) ?></h3>
                    <!-- Product Price -->
                    <p class="text-lg font-bold text-gray-800">$<?= number_format($row['Price'], 2) ?></p>
                    <!-- Add to Cart Button -->
                    <button class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">
                        Add to cart
                    </button>
                </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-gray-600 text-center">No products found in the <?= htmlspecialchars($category) ?> category.</p>
            <?php endif; ?>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow mt-6 p-6 text-center">
        <p class="text-sm text-gray-500">© 2024 Dope Diecast. All rights reserved.</p>
    </footer>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
