<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <!-- Navigation Bar -->
        <nav class="bg-white shadow-md rounded px-8 pt-6 pb-6 mb-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <span class="font-bold text-xl">Dope Diecast</span>
                </div>
                <div class="flex items-center">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded mr-4">Product Management</button>
                    <button class="bg-red-500 text-white px-4 py-2 rounded">Logout</button>
                </div>
            </div>
        </nav>

        <!-- Users Table -->
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-xl font-bold mb-4">Users</h2>
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2">User ID</th>
                        <th class="py-2">Name</th>
                        <th class="py-2">Password</th>
                        <th class="py-2">Pearl Number</th>
                        <th class="py-2">Email</th>
                        <th class="py-2">Flexitorion</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Row -->
                    <tr class="text-center">
                        <td class="py-2">1</td>
                        <td class="py-2">John Doe</td>
                        <td class="py-2">********</td>
                        <td class="py-2">12345</td>
                        <td class="py-2">john@example.com</td>
                        <td class="py-2">Flex123</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Orders Table -->
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-xl font-bold mb-4">Orders</h2>
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2">Order ID</th>
                        <th class="py-2">User ID</th>
                        <th class="py-2">Augurt</th>
                        <th class="py-2">Status</th>
                        <th class="py-2">Address</th>
                        <th class="py-2">Order Date</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Row -->
                    <tr class="text-center">
                        <td class="py-2">101</td>
                        <td class="py-2">1</td>
                        <td class="py-2">Aug123</td>
                        <td class="py-2">Shipped</td>
                        <td class="py-2">123 Main St</td>
                        <td class="py-2">2025-01-01</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Sales Table -->
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-xl font-bold mb-4">Sales</h2>
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2">Order ID</th>
                        <th class="py-2">Augurt</th>
                        <th class="py-2">Status</th>
                        <th class="py-2">Principleetri</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Row -->
                    <tr class="text-center">
                        <td class="py-2">101</td>
                        <td class="py-2">Aug123</td>
                        <td class="py-2">Completed</td>
                        <td class="py-2">Princ123</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>