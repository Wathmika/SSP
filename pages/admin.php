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
                    <a href="./productmanagement.php">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded mr-4">Product Management</button>
                    </a>
                    <a href="./loginregister.php">
                        <button class="bg-red-500 text-white px-4 py-2 rounded">Logout</button>
                    </a>

                </div>
            </div>
        </nav>

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-xl font-bold mb-4">Users</h2>
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">User ID</th>
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">Password</th>
                        <th class="py-2 px-4 border-b">Phone Number</th>
                        <th class="py-2 px-4 border-b">Email</th>
                        <th class="py-2 px-4 border-b">Registration Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Include the database connection file
                    require '../utils/db.php';

                    // Fetch users from the database
                    $sql = "SELECT * FROM user";
                    $result = $conn->query($sql);

                    if ($result && $result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr class='text-center border-b'>";
                            echo "<td class='py-2 px-4'>{$row['UserID']}</td>";
                            echo "<td class='py-2 px-4'>{$row['Name']}</td>";
                            echo "<td class='py-2 px-4'>********</td>"; // Hide the password for security
                            echo "<td class='py-2 px-4'>{$row['Phone_Number']}</td>";
                            echo "<td class='py-2 px-4'>{$row['Email']}</td>";
                            echo "<td class='py-2 px-4'>{$row['RegistrationDate']}</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='py-2 px-4 text-center'>No users found</td></tr>";
                    }

                    $conn->close(); // Close the database connection
                    ?>
                </tbody>
            </table>
        </div>


        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-xl font-bold mb-4">Orders</h2>
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Order ID</th>
                        <th class="py-2 px-4 border-b">User ID</th>
                        <th class="py-2 px-4 border-b">Total Amount</th>
                        <th class="py-2 px-4 border-b">Status</th>
                        <th class="py-2 px-4 border-b">Shipping Address</th>
                        <th class="py-2 px-4 border-b">Order Date</th>
                        <th class="py-2 px-4 border-b">Delivery Fee</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Include the database connection file
                    require '../utils/db.php';

                    // Fetch orders from the database
                    $sql = "SELECT * FROM `Order`";
                    $result = $conn->query($sql);

                    if ($result && $result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr class='text-center border-b'>";
                            echo "<td class='py-2 px-4'>{$row['Order_ID']}</td>";
                            echo "<td class='py-2 px-4'>{$row['User_ID']}</td>";
                            echo "<td class='py-2 px-4'>\${$row['TotalAmount']}</td>";
                            echo "<td class='py-2 px-4'>{$row['Status']}</td>";
                            echo "<td class='py-2 px-4'>{$row['ShippingAddress']}</td>";
                            echo "<td class='py-2 px-4'>{$row['OrderDate']}</td>";
                            echo "<td class='py-2 px-4'>\${$row['Delivery_Fee']}</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='py-2 px-4 text-center'>No orders found</td></tr>";
                    }

                    $conn->close(); // Close the database connection
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>