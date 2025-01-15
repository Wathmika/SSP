<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail Page</title>
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

    <!-- Product Detail Section -->
    <main class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-semibold mb-6">Product Detail Page</h1>
        <div class="flex flex-col lg:flex-row items-start lg:space-x-10">
            <!-- Product Image -->
            <div class="w-full lg:w-1/2 bg-white p-4 rounded-lg shadow-md">
                <img src="https://via.placeholder.com/400" alt="Product Image" class="w-full rounded-lg mb-4">
                <div class="flex space-x-2">
                    <img src="https://via.placeholder.com/80" alt="Thumbnail 1" class="w-20 h-20 object-cover rounded-lg">
                    <img src="https://via.placeholder.com/80" alt="Thumbnail 2" class="w-20 h-20 object-cover rounded-lg">
                </div>
            </div>

            <!-- Product Details -->
            <div class="w-full lg:w-1/2 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-bold mb-2">INNO64 1:64 Nissan GT-R50 By ITALDESIGN Black</h2>
                <p class="text-lg text-gray-700 font-semibold mb-4">Rs. 7600.00</p>

                <!-- Quantity Selector -->
                <div class="flex items-center space-x-4 mb-6">
                    <div class="flex items-center space-x-2 border border-gray-300 p-2 rounded-lg">
                        <button class="px-2 text-gray-600">-</button>
                        <span>1</span>
                        <button class="px-2 text-gray-600">+</button>
                    </div>
                    <button class="bg-black text-white py-2 px-4 rounded-lg hover:bg-gray-800">
                        Add to cart
                    </button>
                </div>

                <button class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-700">
                    Buy Now
                </button>
            </div>
        </div>

        <!-- Product Description -->
        <div class="bg-white p-6 mt-8 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold mb-4">Description</h3>
            <p class="text-gray-700">
                Introducing the INNO64 1:64 Nissan GT-R50 By ITALDESIGN in sleek black. This limited edition model features the exclusive GTR50 designation, representing the ultimate fusion of performance and luxury. Pre-order now to secure your piece of automotive history.
            </p>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white py-4 text-center text-gray-500 text-sm">
        &copy; 2025 Dope Diecast. All rights reserved.
    </footer>

</body>
</html>
