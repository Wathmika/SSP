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
  <title>Footer</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

  <!-- Hero Section -->
  <div class="relative bg-black text-white py-16 px-6 text-center h-[300px]">
    <div>
      <img src="https://preview.redd.it/tried-creating-my-own-wallpaper-featuring-the-lb-super-v0-p80j0hjbqtea1.jpg?width=1080&crop=smart&auto=webp&s=6cb278e795668c56c91e818dedbc96c253e08b5f" alt="Car Image" class=" h-[200px] object-cover">
    </div>
    <div class="absolute inset-0 flex flex-col justify-center items-center">
      <h2 class="text-2xl font-bold">Subscribe to our emails</h2>
      <p class="text-sm">Stay tuned to receive the latest Diecast new releases and promotions</p>
      <div class="mt-4 flex">
        <input type="email" placeholder="Email" class="px-4 py-2 rounded-l-md text-black outline-none">
        <button class="bg-black text-white px-4 py-2 rounded-r-md">➤</button>
      </div>
    </div>
  </div>

  <!-- Features Section -->
  <div class="grid grid-cols-4 gap-4 px-10 py-8 bg-gray-200 text-center">
    <div class="flex flex-col items-center p-4 bg-white shadow rounded">
      <span class="text-3xl">🏷️</span>
      <p class="font-semibold">Best prices</p>
    </div>
    <div class="flex flex-col items-center p-4 bg-white shadow rounded">
      <span class="text-3xl">🚚</span>
      <p class="font-semibold">Free delivery</p>
    </div>
    <div class="flex flex-col items-center p-4 bg-white shadow rounded">
      <span class="text-3xl">📦</span>
      <p class="font-semibold">Easy Return</p>
    </div>
    <div class="flex flex-col items-center p-4 bg-white shadow rounded">
      <span class="text-3xl">📝</span>
      <p class="font-semibold">Great daily deal</p>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white py-10 px-10">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row justify-between items-start">
      <!-- Brand and Socials -->
      <div class="w-1/3">
        <h3 class="text-lg font-bold">Dope Diecast</h3>
        <p class="text-sm mt-2">Your one-stop shop for the best diecast models.</p>
        <div class="flex space-x-3 mt-3">
          <span class="text-xl">📷</span>
          <span class="text-xl">🎥</span>
          <span class="text-xl">💼</span>
          <span class="text-xl">📱</span>
        </div>
      </div>

      <!-- Quick Links (Center) -->
      <div class="w-1/3 text-center">
        <h4 class="font-semibold mb-2">Quick Links</h4>
        <ul class="space-y-1 text-sm">
          <li class="hover:text-gray-300"><a href="../index.php">HOME</a></li>
          <li class="hover:text-gray-300"><a href="../index.php">SHOP</a></li>
          <li class="hover:text-gray-300"><a href="../pages/about.php">ABOUT</a></li>
          <li class="hover:text-gray-300"><a href="../pages/contact.php">CONTACT</a></li>
        </ul>
      </div>

      <!-- Contact Us (Right) -->
      <div class="w-1/3 text-right">
        <h4 class="font-semibold mb-2">Contact Us</h4>
        <p class="text-sm">164/3/G, Himbutana Lane, Mulleriyawa</p>
        <p class="text-sm">Email: wathmikasilva@gmail.com</p>
        <p class="text-sm">Phone: +94776892573</p>
      </div>
    </div>

    <!-- Copyright -->
    <div class="text-center text-sm border-t border-gray-700 mt-6 pt-4">
      <p>&copy; 2025 Dope Diecast. All rights reserved.</p>
    </div>
  </footer>
  </section>
</body>

</html>