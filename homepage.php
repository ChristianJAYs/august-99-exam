<?php
	include_once 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<title>Book Catalog</title>
</head>
<body>


<div class="main-container">
	<div>
		<div class="container">
		    <div class="row">
		        <div class="col-md-12 bg-light text-right">
		            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addBook">Add Book</button>
		        </div>
		    </div>
		</div>
	</div>
	<div>
		<table class="table table-bordered">
		  <thead>
		    <tr>
		      <th scope="col">TITLE</th>
		      <th scope="col">ISBN</th>
		      <th scope="col">AUTHOR</th>
		      <th scope="col">PUBLISHER</th>
		      <th scope="col">YEAR PUBLISHED</th>
		      <th scope="col">CATEGORY</th>
		      <th scope="col"> </th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php 
		  		$sqlDisplay = "SELECT * FROM catalog";
		  		$res = $conn->query($sqlDisplay);
		  		$checkres = mysqli_num_rows($res);
		  		if ($checkres > 0) {
					// insert all the data in the $row array
					while ($row = mysqli_fetch_assoc($res)) {
		  	?>
		    <tr>
		      	<td><?php echo $row['title'] ?></td>
		      	<td><?php echo $row['isbn'] ?></td>
		      	<td><?php echo $row['author'] ?></td>
		      	<td><?php echo $row['publisher'] ?></td>
		      	<td><?php echo $row['year_publish'] ?></td>
		      	<td><?php echo $row['category'] ?></td>
		      	<td> 
		      		<a href="edit.php?id=<?php echo $row['id'] ?>" class="mr-3" title="View Record" data-toggle="tooltip">
			      		<button type="button" class="btn btn-primary">Edit Book</button>
		      		</a>
		      		<a href="delete.php?id=<?php echo $row['id'] ?>" class="mr-3" title="View Record" data-toggle="tooltip">
			      		<button type="button" class="btn btn-danger">Delete Book</button>
		      			<!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteBook">Delete Book</button> -->
		      		</a>
		      	</td>		    
		  </tr>
		  <?php 
		  	}
		  }
		   ?>
		  </tbody>
		</table>
	</div>
</div>

	<!-- Add Modal -->
					<div class="modal fade" id="addBook" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="staticBackdropLabel">Add Book to the Database</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body text-left" >

					      	<form method="POST" action="control/add.php">
					        	<div class="form-add">
					        		<input type="hidden" name="pageID" id="pageID" value="<?php echo $pageID = $_GET['id']; ?>" />
					        		<div>
					        			<label>Title: </label>
					        			<input type="text" name="title" placeholder="Insert The Book Title">
					        		</div>
					        		<div>
					        			<label>ISBN: </label>
					        			<input type="text" name="isbn" placeholder="Insert The ISBN">
					        		</div>
					        		<div>
					        			<label>Author: </label>
					        			<input type="text" name="author" placeholder="Insert The Book Author">
					        		</div>
					        		<div>
					        			<label>Publisher: </label>
					        			<input type="text" name="publisher" placeholder="Insert The Book Publisher">
					        		</div>
					        		<div>
					        			<label>Year Published: </label>
					        			<input type="number" name="year_publish" placeholder="Insert The Book Year Published" maxlength="4">
					        		</div>
					        		<div>
					        			<label>Category: </label>
					        			<input type="text" name="category" placeholder="Insert The Book Category">
					        		</div>
					        	</div>
					        	<div>
					        		<button type="submit" name="submit">Submit Book!</button>
					        	</div>
											      		
					      	</form>

					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					        <button type="button" class="btn btn-primary">Understood</button>
					      </div>
					    </div>
					  </div>
					</div>
	<!-- Edit Modal -->
	<div class="modal fade" id="editBok" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Edit Book </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-left" >
					<form method="POST" action="add.php">
				  	<div class="form-add">
				  		<div>
				  			<label>Title: </label>
				  			<input type="text" name="title" placeholder="Insert The Book Title">
				  		</div>
				  		<div>
				  			<label>ISBN: </label>
				  			<input type="text" name="isbn" placeholder="Insert The ISBN">
				  		</div>
				  		<div>
				  			<label>Author: </label>
				  			<input type="text" name="author" placeholder="Insert The Book Author">
				  		</div>
				  		<div>
				  			<label>Publisher: </label>
				  			<input type="text" name="publisher" placeholder="Insert The Book Publisher">
				  		</div>
				  		<div>
				  			<label>Year Published: </label>
				  			<input type="date" name="year_publish" placeholder="Insert The Book Year Published">
				  		</div>
				  		<div>
				  			<label>Category: </label>
				  			<input type="text" name="category" placeholder="Insert The Book Category">
				  		</div>
				  	</div>
				  	<div>
				  		<button type="submit" name="submit">Submit Book!</button>
				  	</div>
					</form>
				</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				  <button type="button" class="btn btn-primary">Understood</button>
				</div>
			</div>
		</div>
	</div>


	<!-- Delete Modal -->
	<div class="modal fade" id="deleteBook" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Delete Book </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-left" >
				  	Are you sure you want to delete this book to the databse?
				</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<form method="POST" action="delete.php?">
				  		<button type="button" class="btn btn-primary">Understood</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>