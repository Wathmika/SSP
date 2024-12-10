<?php
include 'connect.php';
$sql = "SELECT id, username, email FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
 while ($row = $result->fetch_assoc()) {
 echo "ID: " . $row["id"] . " - Name: " . $row["username"] . " - Email: " . $row["email"] . "<br>";
 }
} else {
 echo "No records found.";
}
$conn->close();
?>