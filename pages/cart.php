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
        <button class="text-red-500 text-sm flex items-center mb-4">
            <i class="fas fa-trash-alt mr-2"></i> clear cart
        </button>

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
                    <!-- Product Row -->
                    <tr class="border-b">
                        <td class="px-6 py-4 flex items-center space-x-4">
                            <img src="https://via.placeholder.com/80" alt="Product Image" class="w-20 h-20 rounded-lg">
                            <span>Bugatti Chiron Super Sport 300+ (Matte Black) Scale 1:64 Mini GT</span>
                        </td>
                        <td class="px-6 py-4">Rs. 5000.00</td>
                        <td class="px-6 py-4">1</td>
                        <td class="px-6 py-4">Rs. 5000.00</td>
                        <td class="px-6 py-4 text-red-500">
                            <i class="fas fa-trash-alt cursor-pointer"></i>
                        </td>
                    </tr>
                    <!-- Repeat as needed -->
                </tbody>
            </table>
        </div>

        <!-- Summary Section -->
        <div class="bg-white shadow-md rounded-lg p-6 mt-6 w-full lg:w-1/3 ml-auto">
            <div class="flex justify-between mb-4">
                <span class="text-gray-600">Subtotal</span>
                <span class="font-semibold">Rs. 15000.00</span>
            </div>
            <div class="flex justify-between mb-4">
                <span class="text-gray-600">Shipping</span>
                <span class="font-semibold">Free</span>
            </div>
            <div class="flex justify-between mb-4">
                <span class="text-gray-600">Estimate for</span>
                <span class="font-semibold">Colombo</span>
            </div>
            <div class="flex justify-between mb-4">
                <span class="text-gray-600">Total</span>
                <span class="font-semibold">Rs. 15000.00</span>
            </div>
            <button class="w-full bg-black text-white py-2 rounded-lg hover:bg-gray-800">
                Proceed To Checkout
            </button>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white py-4 text-center text-gray-500 text-sm">
        &copy; 2025 Dope Diecast. All rights reserved.
    </footer>

</body>
</html>
