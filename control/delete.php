<?php 

	include_once '../connection.php';
	if (!isset($_GET['id'])) {
		header("Location: ../homepage.php?deleteBook=success");
	}else{
		$id = $_GET['id'];
		$sql = "DELETE FROM catalog WHERE id = ". $id;
		$stmt = mysqli_stmt_init($conn);
		mysqli_stmt_prepare($stmt,$sql);
		if(mysqli_stmt_execute($stmt)){
			header("Location: ../homepage.php?deleteBook=success");
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
	}
	header("Location: ../homepage.php?deleteBook=success");