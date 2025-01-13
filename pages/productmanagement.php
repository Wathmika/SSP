<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
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
                    <button class="bg-blue-500 text-white px-4 py-2 rounded mr-4">Admin Dashboard</button>
                    <button class="bg-red-500 text-white px-4 py-2 rounded">Logout</button>
                </div>
            </div>
        </nav>

        <!-- Add Product Form -->
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-xl font-bold mb-4">Add Product</h2>
            <form action="" method="POST" class="" enctype="multipart/form-data">
                <input type="hidden" name="addproduct" value="1" >
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="product-id">Product ID</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product-id" type="text" placeholder="Product ID">
                    </div> -->
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="product-name">Product Name</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product-name" type="text" placeholder="Product Name" name="Name">
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="product-price">Product Price</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product-price" type="text" placeholder="Product Price" name="Price">
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="product-quantity">Product Quantity</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product-quantity" type="text" placeholder="Product Quantity" name="StockQuantity">
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="product-category">Product Category</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product-category" type="text" placeholder="Product Category" name="Category">
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="product-brain">Product Brand</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product-brain" type="text" placeholder="Product Brand" name="Brand">
                    </div>
                    <div class="col-span-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="product-description">Product Description</label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product-description" placeholder="Product Description" name="Description"></textarea>
                    </div>
                    <div class="col-span-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="product-images">Product Images</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="product-images" type="file" name="Thumbnail_IMG">
                    </div>
                </div>
                <div class="mt-6">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="Addproduct">Add Product</button>
                </div>
            </form>
        </div>

        <!-- Update Product Form -->
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-xl font-bold mb-4">Update Product</h2>
            <form action="" method="POST" class="" enctype="multipart/form-data">
            <input type="hidden" name="UpdateProduct" value="1" >
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="update-product-id">Product ID</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="update-product-id" type="text" placeholder="Product ID" name="ProductID">
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="update-product-name">Product Name</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="update-product-name" type="text" placeholder="Product Name" name="Name">
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="update-product-price">Product Price</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="update-product-price" type="text" placeholder="Product Price" name="Price">
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="update-product-quantity">Product Quantity</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="update-product-quantity" type="text" placeholder="Product Quantity" name="StockQuantity">
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="update-product-category">Product Category</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="update-product-category" type="text" placeholder="Product Category" name="Category">
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="update-product-brain">Product Brand</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="update-product-brain" type="text" placeholder="Product Brand" name="Brand">
                    </div>
                    <div class="col-span-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="update-product-description">Product Description</label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="update-product-description" placeholder="Product Description" name="Description"></textarea>
                    </div>
                    <div class="col-span-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="update-product-images">Product Images</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="update-product-images" type="file" name="Thumbnail_IMG">
                    </div>
                </div>
                <div class="mt-6">
                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="UpdateProduct">Update Product</button>
                </div>
            </form>
        </div>

        <!-- Products Table -->
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-xl font-bold mb-4">Products</h2>
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2">Product ID</th>
                        <th class="py-2">Name</th>
                        <th class="py-2">Price</th>
                        <th class="py-2">Stock Quantity</th>
                        <th class="py-2">Brain</th>
                        <th class="py-2">Citriny</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Row -->
                    <tr class="text-center">
                        <td class="py-2">1</td>
                        <td class="py-2">Product A</td>
                        <td class="py-2">$19.99</td>
                        <td class="py-2">50</td>
                        <td class="py-2">Brain123</td>
                        <td class="py-2">Citriny123</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <?php
// Include the database connection file
require '../utils/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['Addproduct'])) {
        $name = $_POST['Name'] ?? '';
        $Price = $_POST['Price'] ?? '';
        $StockQuantity = $_POST['StockQuantity'] ?? '';
        $Category = $_POST['Category'] ?? '';
        $Brand = $_POST['Brand'] ?? '';
        $Description = $_POST['Description'] ?? '';
        $photo = '';
        if(isset($_FILES["Thumbnail_IMG"]) && $_FILES["Thumbnail_IMG"]["error"] == 0) {
            $target_dir = "../pages/images/";
            $photo = $target_dir . basename($_FILES["Thumbnail_IMG"]["name"]);
            move_uploaded_file($_FILES["Thumbnail_IMG"]["tmp_name"], $photo);
        }

        // Validate input
        if (empty($name) || empty($Price) || empty($StockQuantity) || empty($Category) || empty($Brand)) {
            $message = "All fields are required!";
        } else {
            // Prepare SQL statement
            $sql = "INSERT INTO Product (Name, Price, StockQuantity, Category, Brand, Description, Thumbnail_IMG) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("sdissss", $name, $Price, $StockQuantity, $Category, $Brand, $Description, $photo);

                // Execute the statement
                if ($stmt->execute()) {
                    $message = "Product added successfully!";
                } else {
                    $message = "Error adding Product: " . $stmt->error;
                }

                $stmt->close(); // Close the statement
            } else {
                $message = "Error preparing statement: " . $conn->error;
            }
        }

        // Display the message
        echo '<div class="message">' . htmlspecialchars($message) . '</div>';
    }
}

$conn->close(); // Close the database connection




// Include the database connection file
require '../utils/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['UpdateProduct'])) {
        $productID = $_POST['ProductID'] ?? '';
        $name = $_POST['Name'] ?? '';
        $Price = $_POST['Price'] ?? '';
        $StockQuantity = $_POST['StockQuantity'] ?? '';
        $Category = $_POST['Category'] ?? '';
        $Brand = $_POST['Brand'] ?? '';
        $Description = $_POST['Description'] ?? '';
        $photo = '';

        if (isset($_FILES["Thumbnail_IMG"]) && $_FILES["Thumbnail_IMG"]["error"] == 0) {
            $target_dir = "../pages/images/";
            $photo = $target_dir . basename($_FILES["Thumbnail_IMG"]["name"]);
            move_uploaded_file($_FILES["Thumbnail_IMG"]["tmp_name"], $photo);
        }

        // Validate input
        if (empty($productID)) {
            $message = "Product ID is required!";
        } elseif (empty($name) && empty($Price) && empty($StockQuantity) && empty($Category) && empty($Brand) && empty($Description) && empty($photo)) {
            $message = "No fields to update!";
        } else {
            // Dynamically prepare the SQL statement based on provided fields
            $fieldsToUpdate = [];
            $params = [];
            $types = '';

            if (!empty($name)) {
                $fieldsToUpdate[] = "Name = ?";
                $params[] = $name;
                $types .= 's';
            }
            if (!empty($Price)) {
                $fieldsToUpdate[] = "Price = ?";
                $params[] = $Price;
                $types .= 'd';
            }
            if (!empty($StockQuantity)) {
                $fieldsToUpdate[] = "StockQuantity = ?";
                $params[] = $StockQuantity;
                $types .= 'i';
            }
            if (!empty($Category)) {
                $fieldsToUpdate[] = "Category = ?";
                $params[] = $Category;
                $types .= 's';
            }
            if (!empty($Brand)) {
                $fieldsToUpdate[] = "Brand = ?";
                $params[] = $Brand;
                $types .= 's';
            }
            if (!empty($Description)) {
                $fieldsToUpdate[] = "Description = ?";
                $params[] = $Description;
                $types .= 's';
            }
            if (!empty($photo)) {
                $fieldsToUpdate[] = "Thumbnail_IMG = ?";
                $params[] = $photo;
                $types .= 's';
            }

            $params[] = $productID;
            $types .= 'i';

            $sql = "UPDATE Product SET " . implode(', ', $fieldsToUpdate) . " WHERE ProductID = ?";
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                $stmt->bind_param($types, ...$params);

                // Execute the statement
                if ($stmt->execute()) {
                    $message = "Product updated successfully!";
                } else {
                    $message = "Error updating Product: " . $stmt->error;
                }

                $stmt->close(); // Close the statement
            } else {
                $message = "Error preparing statement: " . $conn->error;
            }
        }

        // Display the message
        echo '<div class="message">' . htmlspecialchars($message) . '</div>';
    }
}

$conn->close(); // Close the database connection
?>





</body>
</html>