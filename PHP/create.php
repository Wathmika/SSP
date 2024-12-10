<?php
include 'connect.php';
$username = "JohnDoe";
$email = "john@example.com";
$sql = "INSERT INTO users (username, email) VALUES ('$username', '$email')";
if ($conn->query($sql) === TRUE) {
 echo "New record created successfully!";
} else {
 echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>


