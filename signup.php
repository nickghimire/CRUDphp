<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="dbConnection.php" method="POST">
	<div class="form-group">
	<label for="name">Name:</label>
	<input type="name" class="form-control" name="name" required>

	<div class="form-group">
	<label for="email">Email:</label>
	<input type="email" class="form-control" name="email" required>

	<div class="form-group">
	<label for="address">Address:</label>
	<input type="text" class="form-control" name="address" required>

	<div class="form-group">
	<label for="password">Password:</label>
	<input type="password" class="form-control" name="password" required>

	<input type="submit">
</form>
</body>
</html>