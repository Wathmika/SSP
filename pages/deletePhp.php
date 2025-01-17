<?php
	require '../utils/db.php';
?>

<?php
	if (isset($_GET["delete"])){
		$ID = $_GET["deleteField"];

        $sql="DELETE FROM product
        WHERE ProductID=$ID";
		
		if (mysqli_query($conn, $sql)) {
            echo "<script type='text/javascript'>alert('Removed Reservation Successfully!!');</script>";
        } 
		else {
            echo "<script type='text/javascript'>alert('Error in Removing!!');</script>";
        }

		//close the connection
		mysqli_close($conn);
	}
	echo '<script>window.location.href = "productmanagement.php";</script>';
?>