<?php

	include_once "../connection.php";

	$title = mysqli_real_escape_string($conn,$_POST['title']);
	$isbn = mysqli_real_escape_string($conn,$_POST['isbn']);
	$author = mysqli_real_escape_string($conn,$_POST['author']);
	$publisher = mysqli_real_escape_string($conn,$_POST['publisher']);
	$year_publish = mysqli_real_escape_string($conn,$_POST['year_publish']);
	$category = mysqli_real_escape_string($conn,$_POST['category']);


	if (strlen($year_publish) != 4) {
		header("Location: ../homepage.php?addBook=failed");
	}else{


	$sql = "INSERT INTO catalog (title,isbn,author,publisher,year_publish,category) VALUES (?,?,?,?,?,?)";

	$stmt = mysqli_stmt_init($conn); 
	if (!mysqli_stmt_prepare($stmt,$sql)) {
		echo "Error";
	}else{
		mysqli_stmt_bind_param($stmt,"ssssss", $title, $isbn, $author, $publisher, $year_publish, $category);
		mysqli_stmt_execute($stmt);
	}


	header("Location: ../homepage.php?addBook=success");

	}
