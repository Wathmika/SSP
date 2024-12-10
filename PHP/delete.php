<?php
include 'connect.php';
$id = 1; // ID of the record to delete
$sql = "DELETE FROM users WHERE id = $id";
if ($conn->query($sql) === TRUE) {
 echo "Record deleted successfully!";
} else {
 echo "Error: " . $conn->error;
}
$conn->close();
?>