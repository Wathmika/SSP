<?php
include 'connect.php';
$id = 1; // ID of the record to update
$newUsername = "JaneDoe";
$newEmail = "jane@example.com";
$sql = "UPDATE users SET username = '$newUsername', email = '$newEmail' WHERE id = $id";
if ($conn->query($sql) === TRUE) {
 echo "Record updated successfully!";
} else {
 echo "Error: " . $conn->error;
}
$conn->close();
?>