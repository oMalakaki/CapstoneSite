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
		<h1>Create Account</h1>
		<form id="create-account" method="POST" action="login.php" onsubmit="return validateForm()">
			<label for="email">Email</label>
			<input type="text" id="email" name="email" required>
			<label for="password">Password</label>
			<input type="password" id="password" name="password" required>
			<label for="re-password">Retype Password</label>
			<input type="password" id="re-password" name="re-password" required>
			<label for="Organization">Organization</label>
			<input type="text" id="Organization" name="org" required>
			<button type="submit" name="create-account" value="create">Create Account</button>
		</form>
		<p>Have an account? <a href="index.php"><br />Sign in</a></p>
	</div>
	<div class="noverint-text">
		<h1>Noverint</h1>
		<p>Small Business Inventory Made Easy!</p>
	</div>
	</section>
	<script src="reusableJS/modalOpen.js"></script>
	<script>
		function validateForm() {
			var password = document.getElementById("password").value;
			var confirmPassword = document.getElementById("re-password").value;
			if (password != confirmPassword) {
				alert("Passwords do not match. Please try again.");
				return false;
			}
			return true;
		}
	</script>
</body>
</html>
