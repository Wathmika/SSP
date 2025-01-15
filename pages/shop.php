<?php
// Include the database connection
include '../utils/db.php'; // Ensure the path is correct

// Get the selected category from the query string
$selectedCategory = isset($_GET['category']) ? $_GET['category'] : null;

// Prepare SQL query based on category
$query = "SELECT * FROM product";
if ($selectedCategory) {
    $query .= " WHERE Category = '" . $conn->real_escape_string($selectedCategory) . "'";
}

$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Page</title>
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
            <div class="flex items-center space-x-4">
                <button class="text-gray-600 hover:text-black"><i class="fas fa-search"></i></button>
                <button class="text-gray-600 hover:text-black"><i class="fas fa-shopping-cart"></i></button>
                <button class="text-gray-600 hover:text-black"><i class="fas fa-user"></i></button>
            </div>
        </div>
    </header>

    <!-- Shop Page -->
    <main class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-semibold mb-6">Shop Page</h1>

    <?php
    // Get the selected category from the query string
    $selectedCategory = isset($_GET['category']) ? $_GET['category'] : null;

    // Prepare SQL query based on category
    $query = "SELECT * FROM Product";
    if ($selectedCategory) {
        $query .= " WHERE Category = '" . $conn->real_escape_string($selectedCategory) . "'";
    }

    $result = $conn->query($query);
    ?>

    <!-- Display Products -->
    <div class="space-y-10">
        <?php if ($result->num_rows > 0): ?>
        <div>
            <h2 class="text-xl font-semibold mb-4">
                <?= $selectedCategory ? htmlspecialchars($selectedCategory) : 'All Products' ?>
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                <?php while ($row = $result->fetch_assoc()): ?>
                <div class="bg-black text-white rounded-lg p-4">
                    <img src="images/<?= htmlspecialchars($row['Thumbnail_IMG']) ?>" alt="Product" class="w-full h-40 object-cover mb-4 rounded-lg">
                    <h3 class="text-md mb-2"><?= htmlspecialchars($row['Name']) ?></h3>
                    <p class="text-lg font-bold mb-4">$<?= number_format($row['Price'], 2) ?></p>
                    <button class="w-full bg-white text-black py-2 rounded-lg hover:bg-gray-200">
                        Add to cart
                    </button>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
        <?php else: ?>
        <p class="text-gray-600 text-center">No products found.</p>
        <?php endif; ?>
    </div>
    </main>
    <main>        
            <!-- Category 2 -->
            <div>
                <h2 class="text-xl font-semibold mb-4">Category 2</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                    <!-- Product Card -->
                    <div class="bg-black text-white rounded-lg p-4">
                        <img src="https://via.placeholder.com/150" alt="Product" class="w-full h-40 object-cover mb-4 rounded-lg">
                        <h3 class="text-md mb-2">Hot Wheels Premium 2 Pack Die-Cast 1:64</h3>
                        <p class="text-lg font-bold mb-4">Rs. 6000.00</p>
                        <button class="w-full bg-white text-black py-2 rounded-lg hover:bg-gray-200">
                            Add to cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Category 3 -->
            <div>
                <h2 class="text-xl font-semibold mb-4">Category 3</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                    <!-- Product Card -->
                    <div class="bg-black text-white rounded-lg p-4">
                        <img src="https://via.placeholder.com/150" alt="Product" class="w-full h-40 object-cover mb-4 rounded-lg">
                        <h3 class="text-md mb-2">Hot Wheels Premium 2 Pack Die-Cast 1:64</h3>
                        <p class="text-lg font-bold mb-4">Rs. 6000.00</p>
                        <button class="w-full bg-white text-black py-2 rounded-lg hover:bg-gray-200">
                            Add to cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Category 4 -->
            <div>
                <h2 class="text-xl font-semibold mb-4">Category 4</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                    <!-- Product Card -->
                    <div class="bg-black text-white rounded-lg p-4">
                        <img src="https://via.placeholder.com/150" alt="Product" class="w-full h-40 object-cover mb-4 rounded-lg">
                        <h3 class="text-md mb-2">Hot Wheels Premium 2 Pack Die-Cast 1:64</h3>
                        <p class="text-lg font-bold mb-4">Rs. 6000.00</p>
                        <button class="w-full bg-white text-black py-2 rounded-lg hover:bg-gray-200">
                            Add to cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white py-4 text-center text-gray-500 text-sm">
        &copy; 2025 Dope Diecast. All rights reserved.
    </footer>

</body>
</html>
