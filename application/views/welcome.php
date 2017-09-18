<html>
<head>
	<title>Login</title>
</head>
<body>
<?php
	if($this->session->flashdata("errors")) {
		echo $this->session->flashdata("errors");
	}
?>
	<h1>Welcome!</h1>
	<h2>Login</h2>
	<form action='/login/signin' method='post'>
		Email: <input type='text' name='email'><br/>
		Password: <input type='password' name='password'><br/>
		<input type='submit' value='Login'><br/>
	</form>
	<h2>Register</h2>
	<form action='/login/register' method='post'>
		Name: <input type='text' name='name'><br/>
		Email Address: <input type='text' name='email'><br/>
		Password: <input type='password' name='password'><br/>
		Confirm Password: <input type='password' name='confirm'><br/>
		<input type='submit' value='Register'>
	</form>
</body>
</html>