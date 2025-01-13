<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-300">
    <!-- Header Section -->
    <header class="bg-black py-4">
        <div class="container mx-auto flex flex-col items-center space-y-4 md:space-y-0 md:flex-row md:justify-between md:items-center px-4">
            <!-- Left: Search Bar -->
            <div class="flex items-start">
                <input
                    type="text"
                    placeholder="Search"
                    class="px-4 py-2 rounded-l border border-gray-400 w-full md:w-64"
                />
                <button class="px-3 py-2 bg-white rounded-r border border-gray-400 hover:bg-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.9 14.32a8 8 0 111.414-1.414l4.387 4.387a1 1 0 01-1.414 1.414l-4.387-4.387zM8 14a6 6 0 100-12 6 6 0 000 12z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <!-- Center: Logo -->
            <div class="flex justify-content:">
                <h1 class="text-lg font-bold tracking-wide text-white ">DOPE</h1>
                <h2 class="text-lg font-bold tracking-wide text-white">DIECAST</h2>
            </div>

            <!-- Right: Icons -->
            <div class="flex items-center space-x-6">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 hover:text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18M9 3v3m6-3v3m0 6v3m-6-3v3m0 0H3m0 0h18" />
                    </svg>
                </button>
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 hover:text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18M3 3v18M3 21h18m0 0H3" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="bg-black mt-4">
            <ul class="flex justify-center space-x-8 py-2 text-sm font-medium text-white">
                <li class="hover:text-gray-300"><a href="#">HOME</a></li>
                <li class="hover:text-gray-300"><a href="#">SHOP</a></li>
                <li class="hover:text-gray-300"><a href="#">ABOUT</a></li>
                <li class="hover:text-gray-300"><a href="#">CONTACT</a></li>
            </ul>
        </nav>
    </header>
</body>
</html>
