<?php

	include_once "../connection.php";


if(!isset($_POST['update'])){
	header("Location: ../homepage.php");
}else{   
    $id = $_POST['id'];

    $title=$_POST['title'];
    $isbn=$_POST['isbn'];
    $author=$_POST['author']; 
    $publisher=$_POST['publisher']; 
    $year_publish=$_POST['year_publish']; 
    $category=$_POST['category']; 
       
    echo $title;
    // mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
    // mysqli_report(MYSQLI_REPORT_ALL);
        //updating the table
        // $result = mysqli_query($mysqli, "UPDATE users SET title='$title',age='$age',email='$email' WHERE id=$id");
	$result = mysqli_query($conn, "UPDATE catalog SET `title`=$title,`isbn`=$isbn,`author`=$author,`publisher`=$publisher,`year_publish`=$year_publish,`category`=$category WHERE `id` = $id");
        
        //redirectig to the display page. In our case, it is index.php
	header("Location: ../homepage.php");
}
	// header("Location: ../homepage.php");

	// }
