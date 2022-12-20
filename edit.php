<!DOCTYPE html>
<?php
	include_once 'connection.php';
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<title>
		Edit Book Entitled 
<?php 

	$id = $_GET['id']; 
	$sql = "SELECT * FROM catalog WHERE id = $id";
	$res = $conn->query($sql);
	while ($row = mysqli_fetch_assoc($res)){
		echo $row['title'];
	}
?>
	</title>
</head>
<body>
<h1>Current Data</h1>
<table class="table">
  <thead>
    <tr>
     	<th scope="col">TITLE</th>
		<th scope="col">ISBN</th>
		<th scope="col">AUTHOR</th>
		<th scope="col">PUBLISHER</th>
		<th scope="col">YEAR PUBLISHED</th>
		<th scope="col">CATEGORY</th>
    </tr>
  </thead>
  <tbody>
    <?php 
	  		$res = $conn->query($sql);
	  		$checkres = mysqli_num_rows($res);
				while ($row = mysqli_fetch_assoc($res)) {
	  	?>
	    <tr>
	      	<td><?php echo $row['title'] ?></td>
	      	<td><?php echo $row['isbn'] ?></td>
	      	<td><?php echo $row['author'] ?></td>
	      	<td><?php echo $row['publisher'] ?></td>
	      	<td><?php echo $row['year_publish'] ?></td>
	      	<td><?php echo $row['category'] ?></td>
	  	</tr>
	  	<?php 
	  		}
		?>
  </tbody>
</table>

<div class="main-container">
	<form name="form" method="POST" action="control/edit.php">
		<?php 
		$id = $_GET['id']; 
	$sql = "SELECT * FROM catalog WHERE id = $id";
	$res = $conn->query($sql);
	while ($row = mysqli_fetch_assoc($res)){
	
		 ?>
        <table border="0">
            <tr> 
                <td>Title</td>
                <td><input type="text" name="title" value="<?php echo $row['title'];?>"></td>
            </tr>
            <tr> 
                <td>ISBN</td>
                <td><input type="text" name="isbn" value="<?php echo $row['isbn'];?>"></td>
            </tr>
            <tr> 
                <td>Author</td>
                <td><input type="text" name="author" value="<?php echo $row['author'];?>"></td>
            </tr>
            <tr> 
                <td>Publisher</td>
                <td><input type="text" name="publisher" value="<?php echo $row['publisher'];?>"></td>
            </tr>
            <tr> 
                <td>Year Published</td>
                <td><input type="number" name="year_publish" value="<?php echo $row['year_publish'];?>"></td>
            </tr>
            <tr> 
                <td>Category</td>
                <td><input type="text" name="category" value="<?php echo $row['category'];?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
        <?php  }?>
    </form>
</div>




	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>