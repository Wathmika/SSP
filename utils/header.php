<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dope Diecast Navbar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-300">
    <nav class="bg-gray-300 py-4 px-6 flex justify-center items-center">
        <!-- Logo -->
        <div class="text-center font-bold text-lg">
            <span class="block">DOPE</span>
            <span class="block">DIECAST</span>
        </div>

        <!-- Icons -->
        <div class="absolute right-6 flex items-center space-x-4">
            <a href="../pages/cart.php">
                <button class="text-xl">🛒</button>
            </a>
            <a href="../pages/userdashboard.php">
                <button class="text-xl">👤</button>
            </a>
        </div>
    </nav>

    <!-- Navigation Links -->
    <div class="text-center mt-2">
        <ul class="flex justify-center space-x-6 font-semibold text-sm">
            <li><a href="../pages/index.php" class="hover:underline">HOME</a></li>
            <li><a href="../pages/index.php" class="hover:underline">SHOP</a></li>
            <li><a href="../pages/about.php" class="hover:underline">ABOUT</a></li>
            <li><a href="../pages/contact.php" class="hover:underline">CONTACT</a></li>
        </ul>
    </div>
</body>

</html>