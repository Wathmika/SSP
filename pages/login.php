<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="script.js"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col items-center">
        <!-- Navbar -->
        <header class="w-full bg-white shadow p-4 flex justify-between items-center">
            <h1 class="text-xl font-bold">DOPE DIECAST</h1>
            <div class="space-x-4">
                <a href="#" class="text-gray-600 hover:underline">Home</a>
                <a href="#" class="text-gray-600 hover:underline">Shop</a>
                <a href="#" class="text-gray-600 hover:underline">About</a>
                <a href="#" class="text-gray-600 hover:underline">Contact</a>
            </div>
        </header>

        <!-- Login and Register Section -->
        <div class="mt-10 bg-white shadow-md rounded-lg p-6 w-full max-w-4xl grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Login -->
            <div>
                <h2 class="text-xl font-semibold mb-4">Login</h2>
                <form action="login.php" method="POST">
                    <div class="mb-4">
                        <label for="username" class="block text-sm font-medium">Username</label>
                        <input type="text" name="username" id="username" class="w-full p-2 border rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium">Password</label>
                        <input type="password" name="password" id="password" class="w-full p-2 border rounded" required>
                    </div>
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">
                        Log in
                    </button>
                </form>
            </div>

            <!-- Register -->
            <div>
                <h2 class="text-xl font-semibold mb-4">Register</h2>
                <form action="register.php" method="POST">
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium">Email</label>
                        <input type="email" name="email" id="email" class="w-full p-2 border rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium">Password</label>
                        <input type="password" name="password" id="password" class="w-full p-2 border rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="confirm_password" class="block text-sm font-medium">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="w-full p-2 border rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium">Phone Number</label>
                        <input type="text" name="phone" id="phone" class="w-full p-2 border rounded">
                    </div>
                    <button type="submit" class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600">
                        Register
                    </button>
                </form>
            </div>
        </div>

        <!-- Footer Section -->
        <footer class="w-full mt-10 bg-white shadow-md p-6 text-center">
            <p class="text-sm text-gray-500">
                Subscribe to our emails for exclusive offers.
            </p>
            <form action="#" class="mt-4 flex justify-center items-center gap-2">
                <input type="email" class="p-2 border rounded" placeholder="Enter your email" required>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Subscribe</button>
            </form>
        </footer>
    </div>
</body>
</html>
