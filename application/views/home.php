<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/home.css'); ?>">
</head>
<body>
	<div id="wrapper">
		
		<a href="/login/logout">Logout</a>
		<a href="/books/add" style="float:right">Add Book and Review</a><br/>	
		<h2>Welcome, <?= $this->session->user_session['name'] ?>!</h2>	
		<div id="recent">
			<h3>Recent Book Reviews:</h3>
		<?php
			foreach ($reviews as $review) {
		?>
				<div class="review">
					<a href="/books/<?= $review['id'] ?>"> <?= $review['title'] ?> </a><br/>
		<?php
					echo $review['name'] . '<br/>';
					echo $review['rating'] . ' Stars<br/>';
					echo $review['content'] . '<br/>';
		?>		
				</div>
		<?php
			}
				
		?>
		</div>
		<div id="browse">
			<h3>Browse All Reviews:</h3>
			<div id="list">
			<?php
				foreach ($books as $book) {
			?>
				<a href="/books/<?= $book['id'] ?>"> <?= $book['title'] ?> </a><br/>
			<?php
				}
			?>
			</div>
		</div>
	</div>
</body>
</html>