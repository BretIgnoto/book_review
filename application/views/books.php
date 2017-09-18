<html>
<head>
	<title><?= $info[0]['title'] ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/books.css'); ?>">
</head>
<body>
	<div id="wrapper">
		<a href="/login/logout">Logout</a>
		<a href="/home" style="float:right">Home</a><br/>	
		<h2><?= $info[0]['title']; ?></h2>
		<h3>Author: <?= $info[0]['name']; ?></h3>
		<p><b><u>Reviews:</b></u></p>
	<?php
		foreach ($info as $review) {
	?>
			<div class="review">
	<?php
				echo $review['rating'] . ' stars<br/>';
				echo $review['content'] . '<br/>';
				echo $review['reviewer'] . '<br/>';
				echo $review['created_at'] . '<br/><br/>';
	?>
			</div>
	<?php
		}
	?>
		<div id="new">
			<form action='/books/review' method='post'>
				<input type='hidden' name='book' value='<?= $info[0]['id'] ?>' >
				Add Your Own Review: <br/><textarea name='review' rows='4' cols='50' required></textarea><br/>
				Rating: <input type='number' name='rating' min='1' max='5' required> /5 Stars <br/>
				<input type='submit' value='Add Review'>
			</form>
		</div>
	</div>
</body>
</html>