<?php
require '../utils/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Page - Dope Diecast</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-900">

    <section class="max-w-screen mx-auto my-10 p-6 bg-white shadow rounded">
        <h2 class="text-2xl font-bold mb-4">About</h2>
        <p class="text-gray-700 leading-relaxed">
            Welcome to Diecast Culture, your ultimate destination for enthusiasts of 1:64 scale diecast models. At Diecast Culture, we pride ourselves on curating an extensive collection of premium diecast, catering to the diverse tastes of collectors and hobbyists alike.
            Our inventory spans a vast array of renowned brands, ensuring that every enthusiast finds something to pique their interest. From the iconic Hot Wheels and classic Matchbox to the exquisite craftsmanship of Inno64 and Tarmac Works, we offer a comprehensive selection that captures the essence of diecast culture.
            <br><br>
            But we're not just about cars – our passion extends to the finer details, including meticulously crafted dioramas and intricately designed 1:64 scale mini figures. Whether you're a seasoned collector or a newcomer to the hobby, our diverse range ensures there's something for everyone to enjoy.
            At Diecast Culture, we're more than just a retailer – we're a community united by our shared love for diecast models. Our dedication to quality, authenticity, and customer satisfaction sets us apart, making us the preferred destination for diecast enthusiasts worldwide.
            Explore our collection today and immerse yourself in the vibrant world of 1:64 diecast culture. Welcome to Diecast Culture – where passion meets precision.
        </p>
    </section>

    <section class="max-w-screen mx-auto my-10">
        <h2 class="text-2xl font-bold text-center mb-4">Gallery</h2>
        <div class="grid grid-cols-3 gap-4">
            <img src="https://i.pinimg.com/736x/51/bf/f0/51bff0a132929ec95ca226063fde7a42.jpg" alt="Diecast Model 1" class="w-full object-cover rounded shadow">
            <img src="https://i.pinimg.com/736x/ed/f0/03/edf0030365e5aff03198ef769a241165.jpg" alt="Diecast Model 2" class="w-full object-cover rounded shadow">
            <img src="https://i.pinimg.com/736x/34/95/f6/3495f6db1feb3813b7f70069094d5be0.jpg" alt="Diecast Model 3" class="w-full object-cover rounded shadow">
        </div>
    </section>
    <?php
    require '../utils/footer.php';
    ?>
</body>

</html>