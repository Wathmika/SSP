


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Header -->
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">DOPE DIECAST</h1>
        <nav class="space-x-4">
            <a href="#" class="text-gray-600 hover:underline">Home</a>
            <a href="#" class="text-gray-600 hover:underline">Shop</a>
            <a href="#" class="text-gray-600 hover:underline">About</a>
            <a href="#" class="text-gray-600 hover:underline">Contact</a>
        </nav>
        <div class="flex items-center space-x-4">
            <input type="text" placeholder="Search" class="p-2 border rounded">
            <a href="#" class="text-gray-600 hover:text-gray-900">🛒</a>
        </div>
    </header>

    <!-- Banner Section -->
    <div class="bg-white shadow mt-6 p-4 flex justify-between items-center">
        <img src="https://via.placeholder.com/300x150" alt="Car Banner" class="w-1/3">
        <div>
            <h2 class="text-2xl font-bold">INNO64 Models</h2>
            <button class="mt-2 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                Shop Now
            </button>
        </div>
    </div>

    <!-- Brands Section -->
    <section class="bg-white shadow mt-6 p-6">
        <h2 class="text-xl font-semibold mb-4">Brands</h2>
        <div class="grid grid-cols-4 gap-4">
            <img src="https://via.placeholder.com/100x50" alt="Brand Logo" class="h-16">
            <img src="https://via.placeholder.com/100x50" alt="Brand Logo" class="h-16">
            <img src="https://via.placeholder.com/100x50" alt="Brand Logo" class="h-16">
            <img src="https://via.placeholder.com/100x50" alt="Brand Logo" class="h-16">
        </div>
    </section>

    <!-- Categories Section -->
    <section class="bg-white shadow mt-6 p-6">
    <h2 class="text-xl font-semibold mb-4">Categories</h2>
    <div class="grid grid-cols-4 gap-4">
        <div class="border rounded p-4 text-center">
            <img src="images/premium.jpg" alt="Premium" class="h-24 mx-auto">
            <p class="mt-2 font-bold">Premium</p>
            <a href="pages/shop.php?Category=Premium" 
               class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                View Premium
            </a>
        </div>
        <div class="border rounded p-4 text-center">
            <img src="images/hot_wheels.jpg" alt="Hot Wheels" class="h-24 mx-auto">
            <p class="mt-2 font-bold">Hot Wheels</p>
            <a href="pages/shop.php?Category=Hot Wheels"
               class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                View Hot Wheels
            </a>
        </div>
        <div class="border rounded p-4 text-center">
            <img src="images/diorama.jpg" alt="Diorama" class="h-24 mx-auto">
            <p class="mt-2 font-bold">Diorama</p>
            <a href="pages/shop.php?Category=Diorama"
               class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                View Diorama
            </a>
        </div>
        <div class="border rounded p-4 text-center">
            <img src="images/accessories.jpg" alt="Accessories" class="h-24 mx-auto">
            <p class="mt-2 font-bold">Accessories</p>
            <a href="pages/shop.php?Category=Accessories"
               class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                View Accessories
            </a>
        </div>
    </div>
</section>

    <!-- Sale Items Section -->
    <<?php
// Include your database connection
include './utils/db.php';
$query = "SELECT ProductID, Name, Price, Thumbnail_IMG FROM Product";
$result = $conn->query($query);

if ($result->num_rows > 0): ?>
<section class="bg-white shadow mt-6 p-6">
    <h2 class="text-xl font-semibold mb-4">All Products</h2>
    <div class="grid grid-cols-4 gap-4">
        <?php while ($row = $result->fetch_assoc()): ?>
        <div class="border rounded p-4 text-center">
            <!-- Product Image -->
            <img src="images/<?= htmlspecialchars($row['Thumbnail_IMG']) ?>" 
                 alt="<?= htmlspecialchars($row['Name']) ?> Image" 
                 class="h-24 mx-auto">
            
            <!-- Product Name -->
            <p class="font-bold text-gray-700 mt-2"><?= htmlspecialchars($row['Name']) ?></p>
            
            <!-- Product Price -->
            <p class="text-gray-600">$<?= number_format($row['Price'], 2) ?></p>
            
            <!-- Add to Cart Button -->
            <form action="/SSP/pages/cart.php" method="POST">
    <input type="hidden" name="product_id" value="<?= $row['ProductID'] ?>">
    <input type="hidden" name="price" value="<?= $row['Price'] ?>">
    <button type="submit" class="mt-2 bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">
        Add to Cart
    </button>
</form>


        </div>
        <?php endwhile; ?>
    </div>
</section>
<?php else: ?>
<p class="text-gray-600 text-center mt-6">No products available.</p>
<?php endif; ?>

<?php
// Close the database connection
$conn->close();
?>








    <!-- Subscription Section -->
    <section class="bg-white shadow mt-6 p-6 text-center">
        <h2 class="text-xl font-semibold mb-4">Subscribe to our emails</h2>
        <form action="#" method="POST" class="flex justify-center items-center gap-2">
            <input type="email" placeholder="Enter your email" class="p-2 border rounded">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Subscribe</button>
        </form>
    </section>

    <!-- Footer -->
    <footer class="bg-white shadow mt-6 p-6 text-center">
        <div class="grid grid-cols-4 gap-4">
            <p>Best Prices</p>
            <p>Free Delivery</p>
            <p>Easy Returns</p>
            <p>Great Daily Deals</p>
        </div>
        <p class="text-sm text-gray-500 mt-4">© 2024 Dope Diecast. All rights reserved.</p>
    </footer>

</body>
</html>



<head>
    <link rel="stylesheet" href="./src/output.css">
</head>



</html>