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
        <h2 class="text-3xl font-bold mb-4">Checkout</h2>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Contact and Delivery Details -->
            <div class="col-span-2">
                <div class="mb-6">
                    <label class="block font-bold mb-2">Contact (Email)</label>
                    <input type="email" class="w-full border border-gray-300 p-2 rounded">
                </div>

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block font-bold mb-2">First Name</label>
                        <input type="text" class="w-full border border-gray-300 p-2 rounded">
                    </div>
                    <div>
                        <label class="block font-bold mb-2">Last Name</label>
                        <input type="text" class="w-full border border-gray-300 p-2 rounded">
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block font-bold mb-2">Address</label>
                    <input type="text" class="w-full border border-gray-300 p-2 rounded">
                </div>

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block font-bold mb-2">City</label>
                        <input type="text" class="w-full border border-gray-300 p-2 rounded">
                    </div>
                    <div>
                        <label class="block font-bold mb-2">Postal Code</label>
                        <input type="text" class="w-full border border-gray-300 p-2 rounded">
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block font-bold mb-2">Phone</label>
                    <input type="text" class="w-full border border-gray-300 p-2 rounded">
                </div>

                <div class="mb-6">
                    <label class="block font-bold mb-2">Shipping Method</label>
                    <input type="text" class="w-full border border-gray-300 p-2 rounded">
                </div>

                <!-- Payment Methods -->
                <div>
                    <h3 class="font-bold mb-2">Payment Method</h3>
                    <div class="space-y-4">
                        <div class="border border-gray-300 p-4 rounded">
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="payment" class="w-5 h-5">
                                <span>Credit/Debit Card</span>
                            </label>
                            <div class="mt-4 space-y-4">
                                <input type="text" placeholder="Card Number" class="w-full border border-gray-300 p-2 rounded">
                                <div class="grid grid-cols-2 gap-4">
                                    <input type="text" placeholder="Expiration Date" class="border border-gray-300 p-2 rounded">
                                    <input type="text" placeholder="Security Code" class="border border-gray-300 p-2 rounded">
                                </div>
                                <input type="text" placeholder="Name on Card" class="w-full border border-gray-300 p-2 rounded">
                            </div>
                        </div>
                        <div class="border border-gray-300 p-4 rounded">
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="payment" class="w-5 h-5">
                                <span>COD</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div>
                <h3 class="text-xl font-bold mb-4">Your Order</h3>
                <div class="space-y-4">
                    <div class="flex items-center border border-gray-300 p-4 rounded">
                        <img src="https://via.placeholder.com/100" alt="Product" class="w-20 h-20 mr-4">
                        <div class="flex-grow">
                            <p>Product Name</p>
                            <p class="text-sm text-gray-500">Details</p>
                        </div>
                        <p class="font-bold">Rs. 13000.00</p>
                    </div>
                    <div class="flex items-center border border-gray-300 p-4 rounded">
                        <img src="https://via.placeholder.com/100" alt="Product" class="w-20 h-20 mr-4">
                        <div class="flex-grow">
                            <p>Product Name</p>
                            <p class="text-sm text-gray-500">Details</p>
                        </div>
                        <p class="font-bold">Rs. 13000.00</p>
                    </div>
                </div>
                <div class="mt-4 border-t border-gray-300 pt-4">
                    <p class="flex justify-between font-bold">Subtotal <span>Rs. 26000.00</span></p>
                </div>
                <button class="mt-6 w-full bg-blue-500 text-white p-3 rounded font-bold">Pay Now</button>
            </div>
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
