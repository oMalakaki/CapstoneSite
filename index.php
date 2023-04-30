<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Page</title>
	<link rel="stylesheet" href="styles.css">


</head>
<body>
	<section class="login-page">
	<div class="login-container">
		<h1>Sign in</h1>
		<form id="login-form" method="POST" action="login.php">

			<label for="Email">Email</label>
			<input type="text" id="email" name="email" required>
			<label for="password">Password</label>
			<input type="password" id="password" name="password" required>
			<button type="submit" name="login" value="Sign in">Sign in</button>
		</form>

		<p>Don't have an account? <a href="createAccount.php"><br />Create account</a></p>
	</div>
	<div class="noverint-text">
		<h1>Noverint</h1>
		<p>Small Business Inventory Made Easy!</p>
	</div>
	</section>

</body>
</html>
