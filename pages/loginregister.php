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
            <!-- <div class="space-x-4">
                <a href="#" class="text-gray-600 hover:underline">Home</a>
                <a href="#" class="text-gray-600 hover:underline">Shop</a>
                <a href="#" class="text-gray-600 hover:underline">About</a>
                <a href="#" class="text-gray-600 hover:underline">Contact</a>
            </div> -->
        </header>

        <!-- Login and Register Section -->
        <div class="mt-10 bg-white shadow-md rounded-lg p-6 w-full max-w-4xl grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Login -->
            <div>
                <h2 class="text-xl font-semibold mb-4">Login</h2>
                <form action="" method="POST">
                    <input type="hidden" name="login" value="1">
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
                <form action="" method="POST">
                    <input type="hidden" name="register" value="1">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium">Username</label>
                        <input type="text" name="name" id="name" class="w-full p-2 border rounded" required>
                    </div>
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
        <?php
        require '../utils/db.php'; // Include your database connection file

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['login']) && $_POST['login'] == 1) {
                // Login functionality
                $username = $_POST['username'];
                $password = $_POST['password'];

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $query = "SELECT * FROM user WHERE Name = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $result = $stmt->get_result();
                $user = $result->fetch_assoc();

                if ($user && password_verify($password, $user['Password'])) {
                    // Login successful
                    session_start();
                    $_SESSION['user_id'] = $user['UserID'];
                    $_SESSION['username'] = $user['Name'];
                    $_SESSION['role_id'] = $user['Role_ID'];

                    // Redirect based on Role_ID
                    if ($user['Role_ID'] == 1) {
                        header('Location: admin.php'); // Redirect to Admin Dashboard
                    } else {
                        header('Location: ../index.php'); // Redirect to normal user index
                    }
                    exit();
                } else {
                    echo 'Invalid username or password.';
                }
            } elseif (isset($_POST['register']) && $_POST['register'] == 1) {
                // Registration functionality
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $confirmPassword = $_POST['confirm_password'];
                $phone = $_POST['phone'];

                if ($password !== $confirmPassword) {
                    echo 'Passwords do not match.';
                    exit();
                }

                // Hash the password
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                // Insert the user into the database
                $query = "INSERT INTO user (Name, Email, Password, Phone_Number) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ssss", $name, $email, $hashedPassword, $phone);

                if ($stmt->execute()) {
                    // Retrieve the UserID of the newly created user
                    $userID = $stmt->insert_id;

                    // Store the UserID in session
                    $_SESSION['user_id'] = $userID;

                    // Redirect to user dashboard
                    header('Location: loginregister.php?message=registration_success');
                    exit();
                } else {
                    echo 'Error: ' . $conn->error;
                }
            }
        }
        ?>





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