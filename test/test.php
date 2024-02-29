<?php
	session_start();
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		// Replace the following lines with your own authentication logic
		if ($username === 'admin' && $password === 'password') {
			$_SESSION['username'] = $username;
			header('Location: dashboard.php');
			exit;
		} else {
			$error_msg = 'Invalid username or password.';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="login-form">
		<h1>Admin Login</h1>
		<?php if (isset($error_msg)) { ?>
			<p class="error"><?php echo $error_msg; ?></p>
		<?php } ?>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<label for="username">Username:</label>
			<input type="text" name="username" required>
			<label for="password">Password:</label>
			<input type="password" name="password" required>
			<button type="submit">Login</button>
		</form>
	</div>
</body>
</html>
