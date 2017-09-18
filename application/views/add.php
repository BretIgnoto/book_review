<html>
<head>
	<title>Add Book and Review</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/add.css'); ?>">
</head>
<body>
	<div id="wrapper">
		<a href="/login/logout">Logout</a>
		<a href="/home" style="float:right">Home</a><br/>	
		<h2>Add a New Book Title and a Review:</h2>
		<form id="new" action='/books/add_new' method='post'>
			<label>Book Title:</label><input type='text' name='title' required>
			<label>Select an Author</label><select>
				<option disabled selected value> -- select an option -- </option>
			<?php
				foreach ($authors as $author) {
			?>
					<option><?= $author['name'] ?></option>
			<?php 
				}
			?>

		</select>
			<label>Or Add a New Author:</label><input type='text' name='author' required>
			Review: <textarea name='review' rows='4' cols='50' required></textarea>
			<label>Rating:</label><input type='number' name='rating' min='1' max='5' required> /5 Stars <br/>
			<input type='submit' value='Add Book and Review'>
		</form>
	</div>
</body>
</html>