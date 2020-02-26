<!DOCTYPE HTML>
<!-- Search a book functionality -->
<html>
	<body>
		<form action ="<?php echo site_url('index.php/book/search_book');?>" method="POST"><br>
			<center><h5>Search a book :</h5>
				<input type="text" name="book_name" size="48">
				<br></br>
				<input type="submit" class="btn btn-dark" value="Submit">
				<input type="reset" class="btn btn-light" value="Reset">
			</center>
			<br>
		</form>
	</body>
</html>