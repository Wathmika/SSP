<?php
session_start();
include '../utils/db.php'; // Include the database connection

// Simulate logged-in user ID (use actual session/user logic in a real application)
$UserId = $_SESSION['user_id'];  // Example user ID

// Fetch user details function
function fetchUserDetails($conn, $UserId)
{
    $sql = "SELECT Name, Email, Phone_Number FROM user WHERE UserID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $UserId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    return ['Name' => '', 'Email' => '', 'Phone_Number' => ''];
}

// Fetch user details before processing
$user = fetchUserDetails($conn, $UserId);

// Update user details
if (isset($_POST['btnupdate'])) {
    $displayName = $_POST['Name'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phone'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if (!empty($newPassword)) {
        // Validate and hash password if changed
        if ($newPassword === $confirmPassword) {
            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
            $updateSql = "UPDATE user SET Name = ?, Email = ?, Phone_Number = ?, Password = ? WHERE UserID = ?";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bind_param('ssssi', $displayName, $email, $phoneNumber, $hashedPassword, $UserId);
        } else {
            echo "<p class='text-red-500'>Passwords do not match. Please try again.</p>";
            exit();
        }
    } else {
        // Update without changing password
        $updateSql = "UPDATE user SET Name = ?, Email = ?, Phone_Number = ? WHERE UserID = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param('sssi', $displayName, $email, $phoneNumber, $UserId);
    }

    if ($updateStmt->execute()) {
        echo "<p class='text-green-500'>Account updated successfully.</p>";
        // Fetch the updated details after successful update
        $user = fetchUserDetails($conn, $UserId);
    } else {
        echo "<p class='text-red-500'>Failed to update account: " . $conn->error . "</p>";
    }
    session_start();

    // Destroy all session data
    session_unset();
    session_destroy();

    // Redirect to login page (or homepage)
    header("Location: ./loginregister.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <header class="bg-gray-800 text-white py-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">DOPE DIECAST</h1>
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="../index.php" class="hover:underline">HOME</a></li>
                    <li><a href="./userdashboard.php" class="hover:underline">ACCOUNT</a></li>
                    <li><a href="#" class="hover:underline">ABOUT</a></li>
                    <li><a href="#" class="hover:underline">CONTACT</a></li>
                </ul>
            </nav>
            <div class="flex space-x-4">
                <button class="bg-gray-700 p-2 rounded"><i class="fa fa-search"></i></button>
                <button class="bg-gray-700 p-2 rounded"><i class="fa fa-shopping-cart"></i></button>
                <button class="bg-gray-700 p-2 rounded"><i class="fa fa-user"></i></button>
            </div>
        </div>
    </header>

    <main class="container mx-auto mt-8">
        <section class="bg-white p-6 rounded shadow">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold">My Account</h2>
                <a href="./loginregister.php">
                    <button class="bg-black text-white px-4 py-2 rounded">Logout</button>
                </a>

            </div>
            <p class="mt-2">Hello! <?php
                                    echo  $_SESSION['username'];
                                    ?></p>

        </section>

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
                    // Fetch orders from the database for the logged-in user
                    $sql = "SELECT * FROM `Order` WHERE User_ID = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('i', $UserId);
                    $stmt->execute();
                    $result = $stmt->get_result();

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

                    $stmt->close(); // Close the prepared statement
                    $conn->close(); // Close the database connection
                    ?>
                </tbody>
            </table>
        </div>

        <section class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-xl font-bold">Shipping Address</h3>
                <p class="mt-2">164/3/10, Himbutana Lane,<br>Mulleriyawa.<br>Tel:0771234567</p>
            </div>
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-xl font-bold">Billing Address</h3>
                <p class="mt-2">164/3/10, Himbutana Lane,<br>Mulleriyawa.<br>Tel:0771234567</p>
            </div>
        </section>

        <section class="mt-6 bg-white p-6 rounded shadow">
            <h3 class="text-xl font-bold">Account Details</h3>
            <form method="POST" class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block font-medium">Display Name *</label>
                    <input type="text" name="Name" value="<?php echo htmlspecialchars($user['Name']); ?>" class="w-full mt-1 p-2 border border-gray-300 rounded" required />
                </div>
                <div class="md:col-span-2">
                    <label class="block font-medium">Email Address *</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($user['Email']); ?>" class="w-full mt-1 p-2 border border-gray-300 rounded" required />
                </div>
                <div class="md:col-span-2">
                    <label class="block font-medium">New Password</label>
                    <input type="password" name="new_password" class="w-full mt-1 p-2 border border-gray-300 rounded" />
                </div>
                <div class="md:col-span-2">
                    <label class="block font-medium">Confirm Password</label>
                    <input type="password" name="confirm_password" class="w-full mt-1 p-2 border border-gray-300 rounded" />
                </div>
                <div class="md:col-span-2">
                    <label class="block font-medium">Phone Number *</label>
                    <input type="text" name="phone" value="<?php echo htmlspecialchars($user['Phone_Number']); ?>" class="w-full mt-1 p-2 border border-gray-300 rounded" required />
                </div>
                <div class="md:col-span-2">
                    <button name="btnupdate" type="submit" class="bg-black text-white px-4 py-2 rounded ">Save Changes</button>
                </div>
            </form>
        </section>
    </main>

    <footer class="bg-gray-800 text-white mt-12 py-4">
        <div class="container mx-auto flex justify-between">
            <p>© 2025 Dope Diecast. All Rights Reserved.</p>
            <div class="flex space-x-4">
                <a href="#">Use cookies</a>
                <a href="#">Explore</a>
                <a href="#">Resources</a>
            </div>
        </div>
    </footer>
</body>

</html>